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
        $empleados = Empleado::BuscarEmpleado($request->get('palabra'))->orderBy('apellido', 'DESC')
                                ->paginate(10);
        return view('empleados.index',compact('empleados'));
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
        $comprobarLegajo = $request->legajo;
        $empleados = DB::table('empleados')
        ->select('dni','legajo')
        ->where('dni', '=', $comprobarDNI)
        ->orWhere('legajo', '=', $comprobarLegajo)
        ->get();
        if(count($empleados) >= 1){
            return back()->withInput($request->all())
            ->with('warning','El Empleado ya existe, intente de nuevo con un DNI O LEGAJO distinto');
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
            $empleado->legajo = $request->legajo;
            $empleado->fk_idRolTipo = $request->roltipo;
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
        $rolTipos = RolTipo::All();
        return view('empleados.show',compact('rolTipos','empleado'));
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
        $comprobarLegajo = $request->legajo;
        $empleados = DB::table('empleados')
        ->select('dni','legajo','idempleado')
        ->where('idempleado', '!=', $id)
        ->where('dni', '=', $comprobarDNI)
        ->orWhere('legajo', '=', $comprobarLegajo)
        ->get();
        if(count($empleados) >= 1){
            return back()->withInput($request->all())
            ->with('warning','El Empleado ya existe, intente de nuevo con un DNI o LEGAJO distinto');
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
            $empleado->legajo = $request->legajo;
            $empleado->fk_idRolTipo = $request->roltipo;
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
            'legajo'=>'required',
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
            'legajo'=>'El legajo es requerido',
            'roltipo' => 'El Rol Tipo es requerido',
            //'file' => 'el archivo debe ser de tipo jpeg,png o jpg',
        ]);
        return $validado;
    }
}
