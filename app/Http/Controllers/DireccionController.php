<?php

namespace Almacen\Http\Controllers;

use Illuminate\Http\Request;

use Almacen\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Almacen\Http\Controllers\Controller;
use Almacen\Direccion;
use DB;
use Maatwebsite\Excel\Facades\Excel;


class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direcciones= DB::table('direcciones')->where('estado','Activo')->get();
        return view('direccion.index',['direcciones' => $direcciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view("direccion.create");
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $direcciones= new Direccion();
        $direcciones->nombre=$request->get('nombre');
        $direcciones->estado='Activo';
        $direcciones->save();
        return Redirect::to('direcciones');
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
     return view("direccion.edit",["direcciones"=>Direccion::findOrFail($id)]);
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
        $direcciones=Direccion::findOrFail($id);
        $direcciones->nombre=$request->get('nombre');
        
        $direcciones->update();
        return Redirect::to('direcciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $direcciones=Direccion::findOrFail($id);
        $direcciones->estado="Inactivo";
        $direcciones->update();
        return Redirect::to('direcciones');
    }
}
