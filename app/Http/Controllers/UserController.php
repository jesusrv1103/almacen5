<?php

namespace Almacen\Http\Controllers;

use Illuminate\Http\Request;

use Almacen\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Almacen\Http\Controllers\Controller;
use Almacen\User;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $usuarios= DB::table('users')
     ->join( 'direcciones as d', 'users.idDireccion','=','d.id')
     ->select('users.*','d.nombre')
     ->where('users.estado','Activo')
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


       echo "hola";
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
       $usuarios=User::findOrFail($id);
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
      $usuarios=User::findOrFail($id);
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
        $usuarios=User::findOrFail($id);
        $usuarios->estado="Inactivo";
        $usuarios->update();
        return Redirect::to('usuarios');
    }
}
