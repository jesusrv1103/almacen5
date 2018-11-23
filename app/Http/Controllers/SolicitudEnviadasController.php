<?php
namespace Almacen\Http\Controllers;
use Illuminate\Http\Request;
use Almacen\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Almacen\Http\Controllers\Controller;
use Almacen\SolicitudEnviadas;
use DB;
use Maatwebsite\Excel\Facades\Excel;
class SolicitudEnviadasController extends Controller
{

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
        return view('solicitudEnviadas.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $solicitudes1s=SolicitudEnviadas::findOrFail($id);
       $solicitudes1s->numeroSolicitud=$request->get('numeroSolicitud');
       $solicitudes1s->fechaS=$request->get('fechaS');
       $solicitudes1s->idDireccion=$request->get('idUsuario');
       $solicitudes1s->usuario=$request->get('idDireccion');
       $solicitudes1s->UsoDestinado=$request->get('UsoDestinado');
       $solicitudes1s->update();
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
}