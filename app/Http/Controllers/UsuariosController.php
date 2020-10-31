<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = User::BuscarUser($request->get('name'))
        ->orderBy('name', 'DESC')
        ->paginate(10);
        return view('usuarios.index',compact('usuarios'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name');
        
        return view('usuarios.create',compact('roles'));
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
        $u = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $u->assignRole($request->rol);
        return redirect()->route('usuarios.index')->with('success','Usuario Cargado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $u = User::find($id);
        $roles = Role::all()->pluck('name');
        return view('usuarios.edit',compact('roles','u'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
        $u = User::find($id);
        $u->name = $request->name;
        $u->email = $request->email;
        if ($request->password != null) {
            $u->password = Hash::make($request->password);
        }
        $u->save();
        return redirect()->route('usuarios.index')->with('success','Usuario Editado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
        $User->delete();
        return redirect()->route('usuarios.index')->with('success','Usuario eliminado correctamente');
    }
    public function validarRequest(Request $request)
    {
        $validado = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password'=>'required|string|min:8',
        ],[
            'name' => 'required',
            'email' => 'required',
            'password'=>'required',
        ]);
        return $validado;
    }
}
