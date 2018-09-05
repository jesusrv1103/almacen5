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
use Almacen\Articulos;

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
      return Redirect::to('entradas')->with('info','Entrada guardada con exito');
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


      $cantidadObtenida= $request->get('cantidad');

      $entradas=Entradas::findOrFail($id);
      $cantidad_a_Actualizar=0;

      $cantidadActual= $entradas->cantidad;

      $cantidad_a_Actualizar = $cantidadObtenida -$cantidadActual;
      $entradas->fechaEntrada=$request->get('fechaEntrada');
      $entradas->idArticulos=$request->get('idArticulos');
      $entradas->cantidad=$request->get('cantidad');
      $entradas->fechaCaducidad=$request->get('fechaCaducidad');

      $entradas->update();
      if($cantidadObtenida >$cantidadActual)
      {
        $cantidad_a_Actualizar = $cantidadObtenida - $cantidadActual;
        $articulos=Articulos::findOrFail($request->get('idArticulos'));
        $cantidad =$articulos->cantidad;

        $articulos->cantidad=$cantidad+$cantidad_a_Actualizar;
        $articulos->update();

      } elseif ($cantidadObtenida < $cantidadActual) {

       $articulos=Articulos::findOrFail($request->get('idArticulos'));
       $cantidad =$articulos->cantidad;
       $cantidad_a_Actualizar = $cantidadActual -$cantidadObtenida;
       $articulos->cantidad = $cantidad- $cantidad_a_Actualizar;

       $articulos->update();

     } else {

       $articulos=Articulos::findOrFail($request->get('idArticulos'));
       $cantidad =$articulos->cantidad;
       $cantidadtotal=$cantidad+$request->get('cantidad');
       $articulos->cantidad=$cantidadtotal;
       $articulos->update();
     }


     return Redirect::to('entradas')->with('info','Entrada Editada con exito');

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

      $idArticulos= $entradas->idArticulos;
      $cantidadEliminar= $entradas->cantidad;

      $entradas->estado="Inactivo";
      $entradas->update();

      $articulos=Articulos::findOrFail($idArticulos);
      $cantidadExistente= $articulos->cantidad;

      $cantidadActualizada= $cantidadExistente-$cantidadEliminar;
      $articulos->cantidad =  $cantidadActualizada;
      $articulos->update();






      return Redirect::to('entradas')->with('info','Entrada eliminada con exito');
    }
  }
