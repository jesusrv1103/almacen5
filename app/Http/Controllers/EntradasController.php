<?php

namespace Almacen\Http\Controllers;

use Illuminate\Http\Request;

use Almacen\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Almacen\Http\Controllers\Controller;
use Almacen\Entradas;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $entradas= DB::table('entradas')
       ->join( 'articulos', 'entradas.idArticulos','=','articulos.id')
       ->select('articulos.nombre as nomArticulo','entradas.*')
       ->where('articulos.estado','=','Activo')
       ->where('entradas.estado','Activo')->get();
       return view('entradas.index',['entradas' => $entradas]);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $articulos= DB::table('articulos')->where('estado','Activo')->get();
        return view('entradas.create',['articulos' => $articulos]);


        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entradas= new Entradas();
        $entradas->fechaEntrada=$request->get('fechaEntrada');

        $entradas->idArticulos=$request->get('idArticulos');
        $entradas->cantidad=$request->get('cantidad');
        $entradas->fechaCaducidad=$request->get('fechaCaducidad');
        $entradas->estado='Activo';
        $entradas->save();
        return Redirect::to('entradas');
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
       $entradas=Entradas::findOrFail($id);
       $articulos=DB::table('articulos')
       ->where('estado','=','Activo')
       ->get();
       return view('entradas.edit',['entradas'=>$entradas,'articulos'=>$articulos]);
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

        $entradas=Entradas::findOrFail($id);
        $entradas->fechaEntrada=$request->get('fechaEntrada');
        $entradas->idArticulos=$request->get('idArticulos');
        $entradas->cantidad=$request->get('cantidad');
        $entradas->fechaCaducidad=$request->get('fechaCaducidad');

        $entradas->update();
        return Redirect::to('entradas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entradas=Entradas::findOrFail($id);
        $entradas->estado="Inactivo";
        $entradas->update();
        return Redirect::to('entradas');
    }
}
