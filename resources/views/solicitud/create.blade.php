@extends('layouts.principal')
@section('contenido')

<div class="pull-left breadcrumb_admin clear_both">
  <div class="pull-left page_title theme_color">
    <h1>Inicio</h1>
    <h2 class="">Partidas</h2>
  </div>
  <div class="pull-right">
    <ol class="breadcrumb">
      <li><a href="?c=Inicio">Inicio</a></li>
      <li><a href="?c=localidad">Registrar Solicitud</a></li>

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
              <h2 class="content-header theme_color" style="margin-top: -5px;">Hacer Solicitud</h2>
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
          <form action="{{route('solicitudes.store')}}" method="POST" class="form-horizontal row-border"  parsley-validate novalidate>
           {{csrf_field()}}


           <div class="form-group">
             <label class="col-sm-3 control-label">Nombre: <strog class="theme_color">*</strog></label>
             <div class="col-sm-6">
               <select name="idUsuario" class="form-control" required>
                @foreach($usuarios as $usuario)
                <option value="{{$usuario->id}}">
                  {{$usuario->nombreCompleto}} {{$usuario->apellido}}
                </option>
                @endforeach
              </select>
              <div class="help-block with-errors"></div>
            </div>
          </div><!--/form-group-->


          <div class="form-group">
            <label class="col-sm-3 control-label">Area: <strog class="theme_color">*</strog></label>
            <div class="col-sm-6">
              <select name="idDireccion" class="form-control" required>
               @foreach($direcciones as $direccion)
               <option value="{{$direccion->id}}">
                {{$direccion->nombre}} 
              </option>
              @endforeach
            </select>
            <div class="help-block with-errors"></div>
          </div>
        </div><!--/form-group-->


        <div class="form-group">
          <label class="col-sm-3 control-label">Uso destinado:<strog class="theme_color">*</strog></label>
          <div class="col-sm-6">

           <input onchange="mayus(this);" type="text" class="form-control"  autofocus name="UsoDestinado" id="UsoDestinado" 
           maxlength="70" required value="" placeholder="Atencion  a empresarios  y publico  en reuniones">
         </div>
       </div><!--/form-group-->




       <div class="form-group">
         <label class="col-lg-2 control-label">Producto: <strog class="theme_color">*</strog></label>
         <div class="col-sm-3">
           <select name="idProducto" id="idProducto" class="form-control" required>
             @foreach($productos as $producto)

             <option value="{{$producto->id}}">

              {{$producto->nombre}} 
            </option>
            @endforeach
          </select>
          <div class="help-block with-errors"></div>
        </div>

        <label class="col-sm-3 control-label">Cantidad:<strog class="theme_color">*</strog></label>
        <div class="col-sm-2">

          <input onchange="mayus(this);" type="text" class="form-control"  autofocus name="cantidad" id="cantidad" 
          maxlength="70" S value="" placeholder="Cantidad" onblur="validarCantidad();" onkeypress="return soloNumeros(event);">
          <span id="errorcantidad" style="color:#FF0000;"></span>


        </div>
        <button type="button"  onclick="myCreateFunction();" class="btn btn-success btn-icon"> Agregar <i class="fa fa-plus"></i> </button>
      </div><!--/form-group-->




      <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group"> 
          <table id="detalles" name="detalles[]" value="" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background-color:#A9D0F5">
              <th>Opciones</th>
              <th>Descripcion</th>
              <th>Cantidad</th>
              <th>Unidad de Medida</th>


            </thead>

            <tbody>

            </tbody id="detalles">

            <tfoot style="background-color:#A9D0F5">
             <th>Opciones</th>
             <th>Descripcion</th>
             <th>Cantidad</th>
             <th>Unidad de Medida</th>            
           </tfoot>

         </table>


         <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
           <div class="form-group"> 
            <label for="total">Total de Elementos </label>
            <input name="total" id="total" type="number"  class="form-control"  readonly/>
          </div>    
        </div>  



        <div class="form-group">
          <div class="col-sm-6">
            <input  id="codigo2" value="" name="codigo2[]" type="hidden"  maxlength="50"  class="form-control"  placeholder="Ingrese el Codigo de Barras"/>
          </div>
        </div>

      </div>

    </div>

    <div id="loco"></div>

    <div class="form-group">
      <div class="col-sm-offset-7 col-sm-5">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{url('/partidas')}}" class="btn btn-default"> Cancelar</a>


      </div>
    </div><!--/form-group-->
  </form>
</div><!--/porlets-content-->
</div><!--/block-web-->
</div><!--/col-md-12-->
</div><!--/row-->
</div><!--/container clear_both padding_fix--> 


<script type="text/javascript">
  function myCreateFunction() {

    var select = document.getElementById("idProducto");

    var options=document.getElementsByTagName("option");
    var idProducto= select.value;

    var cantidad = document.getElementById("cantidad").value;
    var route = "http://localhost:8000/tipoUnidad/"+idProducto;



    if(!resultado(idProducto)){


      $.get(route,function(res){

        if(cantidad <= 0  ){

          document.getElementById("errorcantidad").innerHTML= "La cantidad deve ser mayor  a cero ";

        } else if  (res[0].cantidad < cantidad){
         document.getElementById("errorcantidad").innerHTML= "La cantidad no puede ser mayor ala existente en almacen.";
       }  else {
        document.getElementById("errorcantidad").innerHTML= "";

        var x = select.options[select.selectedIndex].text;

        var fila="<tr><td style=\"display:none;\"><input name=\"idProducto[]\"  readonly style=\"border:none\" value=\""+idProducto+"\"></td>"+
        "<td >"+" <button type=\"button\"  onclick=\"myDeleteFunction(this)\" class=\"btn btn-danger btn-icon\"> Quitar<i class=\"fa fa-times\"></i> </button>"+"</td>"+ x 
        +"<td>"+  "<input name=\"cantidad[]\" readonly value=\""+cantidad+"\">"
        +"</td>"
        +"<td>"+res[0].unidad+"</td>";
        var btn = document.createElement("TR");
        btn.innerHTML=fila;
        document.getElementById("detalles").appendChild(btn);


        document.getElementById("total").value=suma();

      }

    });

    }
    else {
      alert("producto ya existe");
    }

  }

  function resultado(idProducto){
    var filas = $("#detalles").find("tr"); //devulve las filas del body de tu tabla segun el ejemplo que brindaste
    var resultado = false;
    for(i=2; i<filas.length; i++){ 

    var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
    id = $($(celdas[0]).children("input")[0]).val();

    if(idProducto== id){
      resultado =true;
      break;
    }else {
      resultado =false;
    }

  }

  return resultado;
}

function suma(){
 var filas = $("#detalles").find("tr"); //devulve las filas del body de tu tabla segun el ejemplo que brindaste
 var resultado = parseInt(0);
 for(i=2; i<filas.length; i++){ 

    var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
    valor = parseInt($($(celdas[2]).children("input")[0]).val());
    resultado+= valor;  

  }

  return resultado;

}


function eliminarFila($id){

  var $id=   document.getElementById("detalles").value;
  document.getElementById("detalles").removeChild($id);

}


function myDeleteFunction(t) {
  var td = t.parentNode;
  var tr = td.parentNode;
  var table = tr.parentNode;
  table.removeChild(tr);
  
  document.getElementById("total").value=suma();

}
function  validarCantidad(){

  var cantidad = document.getElementById("cantidad").value;

  if(cantidad <= 0){

    document.getElementById("errorcantidad").innerHTML= "La cantidad deve ser mayor  a cero ";

  } else {
    document.getElementById("errorcantidad").innerHTML= "";
  }

}




</script>


@endsection