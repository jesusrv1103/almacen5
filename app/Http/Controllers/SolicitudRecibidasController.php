<?php

namespace Almacen\Http\Controllers;

use Illuminate\Http\Request;

use Almacen\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Almacen\Http\Controllers\Controller;
use Almacen\SolicitudRecibidas;
use Almacen\DetalleSolicitud;
use Almacen\Articulos;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

use Illuminate\Http\Resources\Json\Resource;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SolicitudRecibidasController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('permission:solicitudes.create')->only(['create','store']);
      $this->middleware('permission:solicitudes.index')->only('index');
      $this->middleware('permission:solicitudes.edit')->only(['edit','update']);
      $this->middleware('permission:solicitudes.show')->only('show');
      $this->middleware('permission:solicitudes.destroy')->only('destroy');

      $this->middleware('permission:solicitud.pdf')->only('solicitud.pdf');
      $this->middleware('permission:solicitud.verSolicitudes')->only('solicitud.verSolicitudes');
      $this->middleware('permission:solicitud.solicitud.tipo')->only('solicitud.tipo');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $solicitudes= DB::table('solicitudes')
        ->join('usuarios as u', 'solicitudes.idUsuario', '=', 'u.id')
        ->join('direcciones as d', 'solicitudes.idDireccion', '=', 'd.id')
        ->select('solicitudes.*','u.nombreCompleto','solicitudes.*','d.nombre')
        ->where('solicitudes.estado','Activo')->get();
        return view('solicitud.index',['solicitudes' => $solicitudes]);


        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $usuarios= DB::table('users')->where('estado','Activo')->get();
      $direcciones= DB::table('direcciones')->where('estado','Activo')->get();

      $productos= DB::table('articulos')->where('estado','Activo')->get();
      return view('solicitud.create',['usuarios'=>$usuarios,'direcciones'=>$direcciones,'productos'=>$productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $date = Carbon::now();
      $fecha = $date->format('d-m-Y');

      echo $request->get('UsoDestinado');
      DB::beginTransaction();
      $solicitudes= new Solicitud();
      $solicitudes->numeroSolicitud='11';
      $solicitudes->fechaS=$fecha;
      $solicitudes->idUsuario=$request->get('idUsuario');
      $solicitudes->idDireccion=$request->get('idDireccion');
      $solicitudes->UsoDestinado=$request->get('UsoDestinado');
      $solicitudes->estado='Activo';
      $solicitudes->save();
      $idProducto= $request->get('idProducto');
      $cantidad= $request->get('cantidad');
      $cont = 0;
      $idSolicitud=$solicitudes->id;
      while($cont < count($idProducto))
      {
        $detalles= new DetalleSolicitud;
        $detalles->idSolicitud=$idSolicitud;
        $detalles->idArticulo=$idProducto[$cont];
        $detalles->cantidad=$cantidad[$cont];
        $detalles->cantidadAsignada=0;
        $detalles->estado='Activo';
        $cont = $cont+1;
        $detalles->save();

      }

      DB::commit();

      return Redirect::to('solicitudes');
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
        //
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
      $solicitudes=Solicitud::findOrFail($id);
      $solicitudes->numeroSolicitud=$request->get('numeroSolicitud');
      $solicitudes->fechaS=$request->get('fechaS');
      $solicitudes->idUsuario=$request->get('idUsuario');
      $solicitudes->idDireccion=$request->get('idDireccion');
      $solicitudes->UsoDestinado=$request->get('UsoDestinado');
      $solicitudes->update(); 
      return Redirect::to('solicitudes');
    }




    public function verSolicitudes($id)

    {

      $solicitudes=Solicitud::findOrFail($id);
      $idSolicitud=$solicitudes->id;

      $verSolicitud=DB::table('detalle_solicitud')
      ->join('articulos','detalle_solicitud.idArticulo','=','articulos.id')
      ->select('detalle_solicitud.*','articulos.nombre','articulos.idUnidad')
      ->join('unidad_de_medidas','unidad_de_medidas.id','=','articulos.id')
      ->select('detalle_solicitud.id as idDetalleSolicitud','detalle_solicitud.idSolicitud','detalle_solicitud.idArticulo',
        'detalle_solicitud.cantidad as cantidadDetalleSolicitud',
        'detalle_solicitud.cantidadAsignada','articulos.id as idMaterial',
        'articulos.nombre','unidad_de_medidas.nombre as unidad')
      ->where('articulos.estado','=','Activo')
      ->where('idSolicitud','=',$idSolicitud)
      ->get();
      return view('solicitud.verSolicitudes',["solicitudes"=>$solicitudes,"verSolicitud"=>$verSolicitud]);   
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function pdf($id)
    {

     $solicitudes=Solicitud::findOrFail($id);
     $idSolicitud=$solicitudes->id;

     $verSolicitud=DB::table('detalle_solicitud')
     ->join('articulos','detalle_solicitud.idArticulo','=','articulos.id')
     ->select('detalle_solicitud.*','articulos.nombre','articulos.idUnidad')
     ->join('unidad_de_medidas','unidad_de_medidas.id','=','articulos.id')
     ->select('detalle_solicitud.*','articulos.nombre','unidad_de_medidas.nombre as unidad')
     ->where('articulos.estado','=','Activo')
     ->where('idSolicitud','=',$idSolicitud)
     ->get();
     $pdf=PDF::loadView("solicitud.invoice",['solicitudes'=>$solicitudes, "verSolicitud"=>$verSolicitud]);
     return $pdf->download("archivo.pdf");
   }






   public function tipoUnidad($id)
   {

    $tipoEmpaque=  Articulos::join('unidad_de_medidas as u','articulos.idUnidad','=','u.id')
    ->select('articulos.*', 'u.nombre as unidad')
    ->where('articulos.id','=',$id)
    ->get();
    return response()->json(
      $tipoEmpaque->toArray());

  }

  public function asignarCantidad($id){
    echo "string";
  }


}
