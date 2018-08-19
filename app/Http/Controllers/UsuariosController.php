<?php

namespace Almacen\Http\Controllers;

use Illuminate\Http\Request;

use Almacen\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Almacen\Http\Controllers\Controller;
use Almacen\Usuarios;
use DB;
use Maatwebsite\Excel\Facades\Excel;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios= DB::table('usuarios')
        ->join( 'direcciones as d', 'usuarios.idDireccion','=','d.id')
        ->select('usuarios.*','d.nombre')
        ->where('usuarios.estado','Activo')
        ->where('d.estado','Activo')->get();
        return view('usuarios.index',['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direcciones=DB::table('direcciones')
        ->where('estado','=','Activo')
        ->get();
        return view('usuarios.create',['direcciones'=>$direcciones]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarios= new Usuarios();
        $usuarios->nombreCompleto=$request->get('nombreCompleto');
        $usuarios->apellido=$request->get('apellido');
        $usuarios->nombreusuario=$request->get('nombreusuario');
        $usuarios->contraseña=$request->get('contraseña');
        $usuarios->tipoUsuario=$request->get('tipoUsuario');
        $usuarios->idDireccion=$request->get('idDireccion');
        $usuarios->estado='Activo';
        $usuarios->save();
        return Redirect::to('usuarios');


        
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
        $usuarios=Usuarios::findOrFail($id);
        $direcciones=DB::table('direcciones')
        ->where('estado','=','Activo')
        ->get();
        return view('usuarios.edit',['usuarios'=>$usuarios,'direcciones'=>$direcciones]);

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
        $usuarios=Usuarios::findOrFail($id);
        $usuarios->nombreCompleto=$request->get('nombreCompleto');
        $usuarios->apellido=$request->get('apellido');
        $usuarios->nombreusuario=$request->get('nombreusuario');
        $usuarios->tipoUsuario=$request->get('tipoUsuario');
        $usuarios->contraseña=$request->get('contraseña');
        $usuarios->idDireccion=$request->get('idDireccion');

        $usuarios->update();
        return Redirect::to('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios=Usuarios::findOrFail($id);
        $usuarios->estado="Inactivo";
        $usuarios->update();
        return Redirect::to('usuarios');
    }
}
