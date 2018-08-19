@extends('layouts.principal')
@section('contenido')
<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Catálogos</h1>
    <h2 class="">Solicitudes Enviadas</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
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
                    <a class="btn btn-sm btn-success tooltips" href="solicitudes/create" style="margin-right: 10px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Regist"> <i class="fa fa-plus"></i> Registrar </a>

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

                  
                  
                  <td><center><b>Ver</b></center></td>
                  <td><center><b>Editar</b></center></td>
                  <td><center><b>Borrar</b></center></td>


                </tr>
              </thead>
              <tbody>
               @foreach($solicitudes1s as $solicitud)
               <tr class="gradeA">

                <td>{{$solicitud->numeroSolicitud}}</td>
                <td>{{$solicitud->fechaS}}</td>
                <td>{{$solicitud->usuario}}</td>
                <td>{{$solicitud->areaDireccion}}</td>
                <td>{{$solicitud->UsoDestinado}}</td>
                

                <th class="center">
                  <a href="" class="btn btn-info btn-sm" role="button"><i class="fa fa-eye"></i></a>   
                </td>

                <td class="center">
                  <a href="{{URL::action('Solicitud1Controller@edit',$solicitud->id)}}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-edit"></i></a>                    
                </td>
                <td class="center">
                  <a class="btn btn-danger btn-sm" href="#modalEliminar" style="margin-right: 10px;"  
                  data-target="#modal-delete-{{$solicitud->id}}" data-toggle="modal" role="button"><i class="fa fa-eraser"></i></a></i></a>
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

                <td><center><b>Ver</b></center></td>
                <td><center><b>Editar</b></center></td>
                <td><center><b>Borrar</b></center></td>

              </tr>
            </tfoot>
          </table>
        </div><!--/table-responsive-->
      </div><!--/porlets-content-->
    </div><!--/block-web-->
  </div><!--/col-md-12-->
</div><!--/row-->



@endsection