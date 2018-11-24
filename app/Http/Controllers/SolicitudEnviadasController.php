<?php
namespace Almacen\Http\Controllers;
use Illuminate\Http\Request;
use Almacen\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Almacen\Http\Controllers\Controller;
use Almacen\SolicitudesEnviadas;
use Almacen\DetalleSolicitud;

use Almacen\Articulos;
use Carbon\Carbon;
use DB;
use Maatwebsite\Excel\Facades\Excel;
class SolicitudEnviadasController extends Controller
{


///comentario
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:solicitudes1.create')->only(['create','store']);
        $this->middleware('permission:solicitudes1.index')->only('index');
        $this->middleware('permission:solicitudes1.edit')->only(['edit','update']);
        $this->middleware('permission:solicitudes1.show')->only('show');
        $this->middleware('permission:solicitudes1.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $solicitudesEnviadas= DB::table('solicitudes_recibidas')
       ->join('users as u', 'solicitudes_recibidas.idUsuario', '=', 'u.id')
       ->join('direcciones as d', 'solicitudes_recibidas.idDireccion', '=', 'd.id')
       ->select('solicitudes_recibidas.*','u.name','solicitudes_recibidas.*','d.nombre')
       ->where('solicitudes_recibidas.estado','Activo')->get();
       return view('solicitudEnviadas.index',['solicitudesEnviadas' => $solicitudesEnviadas]);
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
      return view('solicitudEnviadas.create',['usuarios'=>$usuarios,'direcciones'=>$direcciones,'productos'=>$productos]);
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
      $solicitudesEnviadas= new SolicitudesEnviadas();
      $solicitudesEnviadas->numeroSolicitud='11';
      $solicitudesEnviadas->fechaS=$fecha;
      $solicitudesEnviadas->idUsuario=$request->get('idUsuario');
      $solicitudesEnviadas->idDireccion=$request->get('idDireccion');
      $solicitudesEnviadas->UsoDestinado=$request->get('UsoDestinado');
      $solicitudesEnviadas->estado='Activo';
      $solicitudesEnviadas->save();
      $idProducto= $request->get('idProducto');
      $cantidad= $request->get('cantidad');
      $cont = 0;
      $idSolicitudEnviada=$solicitudesEnviadas->id;
      while($cont < count($idProducto))
      {
        $detalles= new DetalleSolicitud;
        $detalles->idSolicitud=$idSolicitudEnviada;
        $detalles->idArticulo=$idProducto[$cont];
        $detalles->cantidad=$cantidad[$cont];
        $detalles->cantidadAsignada=0;
        $detalles->estado='Activo';
        $cont = $cont+1;
        $detalles->save();

      }

      DB::commit();

      return Redirect::to('solicitudesEnviadas');
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
        $solicitudesEnviadas=SolicitudEnviadas::findOrFail($id);
        $solicitudesEnviadas->numeroSolicitud=$request->get('numeroSolicitud');
        $solicitudesEnviadas->fechaS=$request->get('fechaS');
        $solicitudesEnviadas->idDireccion=$request->get('idUsuario');
        $solicitudesEnviadas->usuario=$request->get('idDireccion');
        $solicitudesEnviadas->UsoDestinado=$request->get('UsoDestinado');
        $solicitudesEnviadas->update();
        return Redirect::to('solicitudesEnviadas');




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