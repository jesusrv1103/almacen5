<?php

namespace Almacen\Http\Controllers;

use Illuminate\Http\Request;

use Almacen\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Almacen\Http\Controllers\Controller;
use Almacen\User;
use Almacen\Role_User;
use Caffeinated\Shinobi\Models\Role;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{

  public function index()
  {
   /*$usuarios= DB::table('users')
   ->join( 'direcciones as d', 'users.idDireccion','=','d.id')
   ->join( 'roles as r', '.idDireccion','=','d.id')
   ->select('users.*','d.nombre')
   ->where('users.estado','Activo')
   ->where('d.estado','Activo')->get();*/
   $usuarios = DB::table('role_user')
   ->join('users as u','role_user.user_id','=','u.id')
   ->join( 'roles as r', 'role_user.role_id','=','r.id')
   ->select('users.*','role_user.*','r.*')
   ->join('direcciones','u.idDireccion','=','direcciones.id')
   ->select('u.id','u.name as nombreCompleto','u.nombreusuario','r.name AS nombreRol', 'direcciones.nombre as nombreDireccion')
   ->where('u.estado','Activo')
   ->get();
   
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

     //$permissions=DB::table('permissions')
     //->get();
     $roles=DB::table('roles')
     ->get();

     return view('usuarios.create',['direcciones'=>$direcciones,'roles'=>$roles]);
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //$this->validator($request->all())->validate();

      $usuarios= new User();
      $usuarios->name=$request->get('name');
      $usuarios->nombreusuario=$request->get('nombreusuario');
      $usuarios->email=$request->get('email');
      $usuarios->password=bcrypt($request->get('password'));
      $usuarios->idDireccion=$request->get('idDireccion');
      $usuarios->estado="Activo";
      $usuarios->save();

      //Usar un model para alterar campos created_at update_at
      Role_User::create([
        'role_id' => $request->get('id'), 
        'user_id' => $usuarios->id
        ]);

      return Redirect::to('users');
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

     $permissions=DB::table('permissions')
     ->get();

     $roles= Role::get();
     return view('usuarios.edit',['usuarios'=>$usuarios,'direcciones'=>$direcciones, 'roles'=>$roles,'permissions'=>$permissions]);
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
      $usuarios->name=$request->get('name');
      $usuarios->nombreusuario=$request->get('nombreusuario');
      $usuarios->email=$request->get('email');
      $usuarios->bcrypt($request->get('password'));
      $usuarios->idDireccion=$request->get('idDireccion');
      $usuarios->estado="Activo";
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
      return Redirect::to('users');
    }



  }
