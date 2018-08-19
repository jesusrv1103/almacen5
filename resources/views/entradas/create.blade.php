@extends('layouts.principal')
@section('contenido')

<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Entrada</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=localidad">Articulo</a></li>
      <li class="active">Alta de Entrada de Artículo</li>
    </ol>
  </div>
</div>
<div class="container clear_both padding_fix">
  <div class="row">
    <div class="col-md-12">
      <div class="block-web">
        <div class="header">
          <div class="row" style="margin-top: 15px; margin-bottom: 12px;">
            <div class="col-sm-8">
              <div class="actions"> </div>
              <h2 class="content-header theme_color" style="margin-top: -5px;">Registrar Entrada</h2>
            </div>
            <div class="col-md-4">
              <div class="btn-group pull-right">
                <div class="actions"> 
                </div>
              </div>
            </div>    
          </div>
        </div>
        <div class="porlets-content">
          <div class="porlets-content">
            <form action="{{route('entradas.store')}}" method="post" class="form-horizontal row-border" parsley-validate novalidate>
              {{csrf_field()}}
              <!--este  no esta  agregarlo en todos -->

              <div class="form-group">
                <label class="col-sm-3 control-label">Fecha de Entrada del Artículo:<strog class="theme_color">*</strog></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control mask" name="fechaEntrada" 
                   data-inputmask="'alias': 'date'">
                </div>
              </div><!--/form-group-->


           <div class="form-group">
            <label class="col-sm-3 control-label">Nombre del Artículo<strog class="theme_color">*</strog></label>
            <div class="col-sm-6">
              <select name="idArticulos" class="form-control" required>
                @foreach($articulos as $articulos)
                <option value="{{$articulos->id}}">
                  {{$articulos->nombre}}
                </option>
                @endforeach
              </select>
              <div class="help-block with-errors"></div>
            </div>
          </div><!--/form-group-->

              


              <div class="form-group">
                <label class="col-sm-3 control-label">Cantidad artículo: <strog class="theme_color">*</strog></label>
                <div class="col-sm-6">
                 <input onkeypress="return soloNumeros(event);" required value="" type="text" class="form-control"  autofocus name="cantidad" maxlength="6" placeholder="Ingrese la cantidad del Articulo">
               </div>
             </div><!--/form-group-->


             <div class="form-group">
              <label class="col-sm-3 control-label">Fecha de Caducidad: <strog class="theme_color">*</strog></label>
              <div class="col-sm-6">
                <input type="text" class="form-control mask" name="fechaCaducidad"
                data-inputmask="'alias': 'date'">
              </div>
            </div><!--/form-group-->


            <div class="form-group">
              <div class="col-sm-offset-7 col-sm-5">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{url('/entradas')}}" class="btn btn-default"> Cancelar</a>
              </div>
            </div><!--/form-group-->
          </form>
        </div><!--/porlets-content-->
      </div><!--/block-web-->
    </div><!--/col-md-12-->
  </div><!--/row-->
</div><!--/container clear_both padding_fix--> 


@endsection