@extends('layouts.principal')
@section('contenido')
<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Solicitudes</h1>
    <h2 class="">Solicitudes Recibidas</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li class="active">Solicitudes Recibidas</a></li>
    </ol>
  </div>
</div>
<div class="container clear_both padding_fix">
  <div class="row">
    <div class="col-md-12">
      <div class="block-web">
        <div class="header">
          <div class="row" style="margin-top: 15px; margin-bottom: 12px;">
            <div class="col-sm-7">
              <div class="actions"> </div>
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Solicitudes Recibidas</h2>
            </div>
            <div class="col-md-5">
              <div class="btn-group pull-right">

              </div>
            </div>
          </div>
        </div>


        <div class="porlets-content">
          <div class="table-responsive">
            <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
                <tr>
                  <th>No. Vale</th>
                  <th>Fecha</th>
                  <th>Nombre</th>
                  <th>Área o Dirección</th>
                  <th>Uso Destinado</th>
                  
                  <td><center><b>Ver</b></center></td>

                  
                  <td></td>

                </tr>
              </thead>
              <tbody>
               @foreach($solicitudes as $solicitud)
               <tr class="gradeA">

                <td>{{$solicitud->numeroSolicitud}}</td>
                <td>{{$solicitud->fechaS}}</td>
                <td>{{$solicitud->name}}</td>
                <td>{{$solicitud->nombre}}</td>
                <td>{{$solicitud->UsoDestinado}}</td>


                <td class="center">
                  <a href="{{URL::action('SolicitudController@verSolicitudes',$solicitud->id)}}" class="btn btn-info btn-sm" role="button"><i class="fa fa-eye"></i></a>   
                </td>


                <td>      <a href="{{URL::action('SolicitudController@pdf',$solicitud->id)}}" class="btn btn-warning btn-sm" role="button"><i class="fa fa-download"></i></a>
                </center></td>

              </tr>
              @include('solicitud.modal')
              @endforeach



            </tbody>
            <tfoot>
              <tr>
               <th>No. Vale</th>
               <th>Fecha</th>
               <th>Nombre</th>
               <th>Área o Dirección</th>
               <th>Uso Destinado</th>

               <td><center><b>Ver</b></center></td>
               <td></td>



             </tr>
           </tfoot>
         </table>
       </div><!--/table-responsive-->
     </div><!--/porlets-content-->
   </div><!--/block-web-->
 </div><!--/col-md-12-->
</div><!--/row-->



@endsection