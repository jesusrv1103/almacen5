@extends('layouts.principal')
@section('contenido')

<!--\\\\\\\ contentpanel start\\\\\\-->
<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Departamentos</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li class="active">Departamentos</a></li>
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
              <h2 class="content-header theme_color" style="margin-top: -5px;">&nbsp;&nbsp;Departamentos</h2>
            </div>
            <div class="col-md-5">
              <div class="btn-group pull-right">
                <b>

                  @can('direcciones.create')
                  <div class="btn-group" style="margin-right: 10px;">
                    <a class="btn btn-sm btn-success tooltips" href="{{URL::action('DireccionController@create')}}" style="margin-right: 10px;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Registrar Nuevo Departamento"> <i class="fa fa-plus"></i> Registrar </a>
                  </div>
                  @endcan

                </b>
              </div>
            </div>
          </div>
        </div>
           @if(session('info'))
        <div class="alert alert-success">
          <strong>{{ session('info')}}</strong> 
        </div>
        @endif


        <div class="porlets-content">
          <div class="table-responsive">
            <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
                <tr>
                  <th>Nombre</th>

                  @can('direcciones.edit')
                  <td><center><b>Editar</b></center></td>
                  @endcan
                  @can('direcciones.destroy')
                  <td><center><b>Borrar</b></center></td>
                  @endcan
                </tr>
              </thead>
              <tbody>
              @foreach($direcciones as $direccion)
                <tr class="gradeA">
                  <td> {{$direccion->nombre}}</td>
                   @can('direcciones.edit')
                  <td class="center">
                    <a href="{{URL::action('DireccionController@edit',$direccion->id)}}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-edit"></i></a>                    
                  </td>
                  @endcan
                  @can('direcciones.destroy')
                  <td class="center">
                    <a class="btn btn-danger btn-sm" href="#modalEliminar" style="margin-right: 10px;"  
                    data-target="#modal-delete-{{$direccion->id}}" data-toggle="modal" role="button"><i class="fa fa-eraser"></i></a></i></a>
                  </td>
                  @endcan

                </tr>
                @include('direccion.modal')
                @endforeach


              </tbody>
              <tfoot>
                <tr>
                  <th>Nombre</th>
                  @can('direcciones.edit')
                  <td><center><b>Editar</b></center></td>
                  @endcan
                  @can('direcciones.destroy')
                  <td><center><b>Borrar</b></center></td>
                  @endcan

                </tr>
              </tfoot>
            </table>
          </div><!--/table-responsive-->
        </div><!--/porlets-content-->
      </div><!--/block-web-->
    </div><!--/col-md-12-->
  </div><!--/row-->



  @endsection