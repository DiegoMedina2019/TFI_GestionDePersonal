<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\RolTipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->user()->hasRole('Administrador')) {
            $empleados = Empleado::BuscarEmpleado($request->get('palabra'))
                ->orderBy('apellido', 'DESC')
                ->paginate(10);
        }else{
            $e = DB::table('empleados')
            ->where('correo', '=', auth()->user()->email)
            ->get();

            if ($request->get('palabra')!=null) {
                $empleados = Empleado::BuscarEmpleado($request->get('palabra'))
                ->orderBy('apellido', 'DESC')
                ->paginate(10);
            } else {
                $empleados = Empleado::find($e[0]->idempleado)->misEmpleados()
                ->orderBy('apellido', 'DESC')
                ->paginate(10);
            }
            
            
        }
        $supervisores = Empleado::All()->where('fk_idRolTipo',1);
        return view('empleados.index',compact('empleados','supervisores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolTipos = RolTipo::All();
        return view('empleados.create',compact('rolTipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validado = $this->validarRequest($request);
        if ($validado->fails()) {
            return back()
                        ->withErrors($validado)
                        ->withInput($request->all());
        }
        $comprobarDNI = $request->dni;
        $empleados = DB::table('empleados')
        ->select('dni')
        ->where('dni', '=', $comprobarDNI)
        ->get();
        if(count($empleados) >= 1){
            return back()->withInput($request->all())
            ->with('warning','El Empleado ya existe, intente de nuevo con un DNI distinto');
        }
        else{
            $empleado = new Empleado();
            $empleado->nombre = $request->nombre;
            $empleado->apellido = $request->apellido;
            $empleado->correo = $request->correo;
            $empleado->dni = $request->dni;
            $empleado->telefono = $request->telefono;
            $empleado->direccion = $request->direccion;
            $empleado->sector = $request->sector;
            $empleado->fk_idRolTipo = $request->roltipo;
            $empleado->productividad = $request->productividad;
            $empleado->antiguedad = $request->antiguedad;
            switch (true) {
                case ($request->productividad == 33):
                    $empleado->insentivo = 5;
                    break;
                case ($request->productividad > 33) :
                    $empleado->insentivo = ($request->productividad*15)/100 ;
                    break;
                default:
                    $empleado->insentivo = 0;
                    break;
            }
            $empleado->save();
            return redirect()->route('empleados.index')->with('success','Empleado Cargado Correctamente');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        $supervisor = $empleado->miSupervisores;

        $rolTipos = RolTipo::All();
        return view('empleados.show',compact('rolTipos','empleado','supervisor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $rolTipos = RolTipo::All();
        return view('empleados.edit',compact('rolTipos','empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validado = $this->validarRequest($request);
        if ($validado->fails()) {
            return back()
                        ->withErrors($validado)
                        ->withInput($request->all());
        }
        $comprobarDNI = $request->dni;
        $empleados = DB::table('empleados')
        ->select('dni','idempleado')
        ->where('dni', '=', $comprobarDNI)
        ->where('idempleado', '!=', $id)
        ->get();
        if(count($empleados) >= 1){
            return back()->withInput($request->all())
            ->with('warning','El Empleado ya existe, intente de nuevo con un DNI distinto');
        }
        else{
            $empleado = Empleado::find($id);
            $empleado->nombre = $request->nombre;
            $empleado->apellido = $request->apellido;
            $empleado->correo = $request->correo;
            $empleado->dni = $request->dni;
            $empleado->telefono = $request->telefono;
            $empleado->direccion = $request->direccion;
            $empleado->sector = $request->sector;
            $empleado->fk_idRolTipo = $request->roltipo;
            $empleado->productividad = $request->productividad;
            $empleado->antiguedad = $request->antiguedad;
            switch (true) {
                case ($request->productividad == 33):
                    $empleado->insentivo = 5;
                    break;
                case ($request->productividad > 33) :
                    $empleado->insentivo = ($request->productividad*15)/100 ;
                    break;
                default:
                    $empleado->insentivo = 0;
                    break;
            }
            $empleado->save();
            return redirect()->route('empleados.index')->with('success','Empleado Editado Correctamente');
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success','Empleado eliminado correctamente');
    }
    
    public function addSupervisor(Request $request)
    {
        $request->validate([
            'idsupervisor' => 'required',
        ],[
            'idsupervisor' => 'Debe seleccionar un supervisor',
        ]);
        $supervisor = Empleado::find($request->idsupervisor);
        $supervisor->misEmpleados()->attach($request->idempleado);
        //$supervisor->misEmpleados()->sync($request->idempleado);
        return redirect()->route('empleados.index')->with('success','Supervisor asignado correctamente');
    }
    public function reporte($id)
    {
        $empleado = Empleado::find($id);
        $rolTipos = RolTipo::All();
        $supervisor = $empleado->miSupervisores;
        return view('empleados.reporte',compact('rolTipos','empleado','supervisor'));
    }

    public function validarRequest(Request $request)
    {
        $validado = Validator::make($request->all(), [
            'nombre' => 'required',
            'apellido' => 'required',
            'correo'=>'required',
            'dni'=>'required|numeric',
            'telefono'=>'required|numeric',
            'direccion' => 'required',
            'sector'=>'required',
            'roltipo' => 'required',
            //'file' => 'mimes:jpeg,png,jpg,gif',
        ],[
            'nombre' => 'El nombre es requerido',
            'apellido' => 'El apellido es requerido',
            'correo'=>'El correo es requerido',
            'dni'=>'El DNI es requerido',
            'telefono'=>'El telefono es requerido',
            'direccion' => 'La direccion es requerida',
            'sector'=>'La sector es requerido',
            'roltipo' => 'El Rol Tipo es requerido',
            //'file' => 'el archivo debe ser de tipo jpeg,png o jpg',
        ]);
        return $validado;
    }
}
