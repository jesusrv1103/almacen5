<?php

namespace Almacen\Http\Controllers;

use Illuminate\Http\Request;

use Almacen\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Almacen\Http\Controllers\Controller;
use Almacen\Proveedor;
use DB;
use Maatwebsite\Excel\Facades\Excel;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $proveedores= DB::table('proveedores')->where('estado','Activo')->get();
       return view('proveedor.index',['proveedores' => $proveedores]);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedores= new Proveedor();
        $proveedores->nombre=$request->get('nombre');
        $proveedores->rfc=$request->get('rfc');
        $proveedores->direccion=$request->get('direccion');
        $proveedores->estado='Activo';
        $proveedores->save();
        return Redirect::to('proveedores');
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
         return view("proveedor.edit",["proveedores"=>Proveedor::findOrFail($id)]);
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
        $proveedores=Proveedor::findOrFail($id);
        $proveedores->nombre=$request->get('nombre');
        $proveedores->rfc=$request->get('rfc');
        $proveedores->direccion=$request->get('direccion');
        $proveedores->update();
        return Redirect::to('proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedores=Proveedor::findOrFail($id);
        $proveedores->estado="Inactivo";
        $proveedores->update();
        return Redirect::to('proveedores');
    }
}
