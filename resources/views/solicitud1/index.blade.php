@extends('layouts.principal')
@section('contenido')
<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Solicitudes</h1>
    <h2 class="">Solicitudes Enviadas</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a style="color: #808080" href="?c=Inicio">Inicio</a></li>
      <li class="active">Solicitudes Enviadas</a></li>
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
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Solicitudes Enviadas</h2>
            </div>
            <div class="col-md-5">
              <div class="btn-group pull-right">
                <b>

                  <div class="btn-group" style="margin-right: 10px;">
                    <a class="btn btn-sm btn-success tooltips" href="solicitudes/create" style="margin-right: 10px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Realizar Nueva Solicitud"> <i class="fa fa-plus"></i> Realizar Solucitud </a>

                  </div>

                </b>
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

                  <th><center><b>Ver</b></center></th>
  


                </tr>
              </thead>
              <tbody>
               @foreach($solicitudes1s as $solicitud)
               <tr class="gradeA">

                <td>{{$solicitud->numeroSolicitud}}</td>
                <td>{{$solicitud->fechaS}}</td>
                <td>{{$solicitud->name}}</td>
                <td>{{$solicitud->nombre}}</td>
                <td>{{$solicitud->UsoDestinado}}</td>
                

                <th class="center">
                 <a href="{{URL::action('SolicitudController@verSolicitudes',$solicitud->id)}}" class="btn btn-info btn-sm" role="button"><i class="fa fa-eye"></i></a>    
               </td>

             
            </tr>
            @include('solicitud1.modal')
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
            
           </tr>
         </tfoot>
       </table>
     </div><!--/table-responsive-->
   </div><!--/porlets-content-->
 </div><!--/block-web-->
</div><!--/col-md-12-->
</div><!--/row-->



@endsection