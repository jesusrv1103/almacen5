<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Almacén SEZAC</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">



    {!!Html::style('css/font-awesome.css')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/animate.css')!!}
    {!!Html::style('css/admin.css')!!}
    {!!Html::style('css/MisEstilos.css')!!}
    {!!Html::style('plugins/advanced-datatable/css/demo_table.css')!!}
    {!!Html::style('plugins/advanced-datatable/css/demo_page.css')!!}
    {!!Html::style('plugins/toggle-switch/toggles.css')!!}
    <!--link href="css/select2.css" rel="stylesheet"-->
    {!!Html::style('plugins/bootstrap-editable/bootstrap-editable.css')!!}
    {!!Html::style('plugins/dropzone/dropzone.css')!!}
    {!!Html::style('plugins/data-tables/DT_bootstrap.css')!!}
    {!!Html::style('plugins/data-tables/DT_bootstrap.css')!!}
    {!!Html::style('plugins/advanced-datatable/css/demo_table.css')!!}
    {!!Html::style('plugins/advanced-datatable/css/demo_page.css')!!}
    {!!Html::style('plugins/bootstrap-fileupload/bootstrap-fileupload.min.css')!!}
    {!!Html::style('plugins/file-uploader/css/blueimp-gallery.min.css')!!}
    {!!Html::style('plugins/file-uploader/css/jquery.fileupload.css')!!}
    {!!Html::style('plugins/file-uploader/css/jquery.fileupload-ui.css')!!}
    {!!Html::style('plugins/bootstrap-datepicker/css/datepicker.css')!!}
    {!!Html::style('plugins/bootstrap-timepicker/compiled/timepicker.css')!!}
    {!!Html::style('plugins/bootstrap-colorpicker/css/colorpicker.css')!!}
    {!!Html::style('plugins/select2/dist/css/select2.css')!!}

    <!--Estilos Para radio buton y switch -->
    {!!Html::style('plugins/toggle-switch/toggles.css')!!}
    {!!Html::style('plugins/checkbox/icheck.css')!!}
    {!!Html::style('plugins/checkbox/minimal/blue.css')!!}
    {!!Html::style('plugins/checkbox/minimal/green.css')!!}
    {!!Html::style('plugins/checkbox/minimal/grey.css')!!}
    {!!Html::style('plugins/checkbox/minimal/orange.css')!!}
    {!!Html::style('plugins/checkbox/minimal/pink.css')!!}
    {!!Html::style('plugins/checkbox/minimal/purple.css')!!}
    {!!Html::style('plugins/bootstrap-fileupload/bootstrap-fileupload.min.css')!!}

    <!--Wizard  -->
    {!!Html::style('plugins/wizard/css/smart_wizard.css')!!}
    <!-- Optional SmartWizard theme -->
    {!!Html::style('plugins/wizard/css/smart_wizard_theme_dots.css')!!}
    <!-- Optional SmartWizard theme -->
    {!!Html::style('plugins/wizard/css/smart_wizard_theme_circles.css')!!}
    {!!Html::style('plugins/wizard/css/smart_wizard_theme_arrows.css')!!}
    {!!Html::style('plugins/wizard/css/smart_wizard_theme_dots.css')!!}

    {!!Html::style('plugins/calendar/fullcalendar.css')!!}
    {!!Html::style('plugins/calendar/fullcalendar.print.css')!!}
    

  </head>
  <style type="text/css">
    .disabled {
      pointer-events:none; /*This makes it not clickable*/
      opacity:0.6;         /*This grays it out to look disabled*/
    }
    .lblheader{
      color:#2196F3;
    }

    a {
      color: #FFF;
      text-decoration: none;
    }
  </style>
  <body class="light_theme  fixed_header left_nav_fixed" style="background-color: #EEEEEE" >
    <div class="wrapper">
      <!--\\\\\\\ wrapper Start \\\\\\-->
      <div class="header_bar">
        <!--\\\\\\\ header Start \\\\\\-->
        <div class="brand">
          <!--\\\\\\\ brand Start \\\\\\-->
          <!--div class="logo" style="display:block"><h2 style="margin-top: -5px;"><span class="theme_color">INSEZAC</span></h2></div-->
          <div style="display:block"><img width="100%" style=" margin-top:-15px" src="{{asset('images/sezac.png')}}"></div>

          <div class="small_logo" style="display:none"><img src="{{asset('images/s-logo.png')}}" width="50" height="47" alt="s-logo" /> <img src="{{asset('images/s-logo.png')}}" width="122" height="20" alt="r-logo" /></div>

        </div>
        <!--\\\\\\\ brand end \\\\\\-->
        <div class="header_top_bar">
          <!--\\\\\\\ header top bar start \\\\\\-->
          <a href="javascript:void(0);" class="menutoggle"> <i class="fa fa-bars"></i> </a>
          <div class="top_left_bar">
            <h1>Control Almacén</h1>
          </div>
          <div class="top_right_bar">
            <div style="margin-top: -33%;" >
              <span class="user_adminname"> <br> {{ Auth::user()->name }}   </span>
              <span  class="user_adminname" ><a  href="{{ route('logout') }}"  
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                ><i class="fa fa-power-off" style="color:#787878;"> Salir </i></span></a>
              </div>
            </div>
          </div>
          <!--\\\\\\\ header top bar end \\\\\\-->
        </div>
        <!--\\\\\\\ header end \\\\\\-->
        <div class="inner">
          <!--\\\\\\\ inner start \\\\\\-->
          <div class="left_nav">
            <!--\\\\\\\left_nav start \\\\\\-->
            <br>
            <div class="left_nav_slidebar">
             <ul>
               <li class="left_nav_active theme_border"><a href="javascript:void(0);"> <i class="fa fa-home"></i> Control de Almacen <span class="left_nav_pointer"></span> <span class="plus"><i class="fa fa-plus" ></i></span> </a>
                 <ul class="opened" style="display:block">


                   <li> <a href="{{ route('almacenes.index')}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Almacenes</b> </a> </li>



                   <li> <a href="{{url('events')}}"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b>Calendario</b> </a> </li>


                 </ul>

               </li>


               <li> <a href="javascript:void(0);"> <i class="fa fa-shopping-cart"></i> Artículos<span class="plus"><i class="fa fa-plus"></i></span> </a>

                 <ul >
                  <li> <a href="{{url('articulos')}}"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b >Artículos</b> </a> </li>
                  <li> <a href="{{url('entradas')}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Entrada de Artículos</b> </a> </li>
                  <li> <a href="{{url('proveedores')}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b >Proveedores</b> </a> </li>
                  <li> <a href="{{url('inventarios')}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Inventario</b> </a> </li>

                </ul>
              </li>

              <li > <a href="javascript:void(0);"> <i class="fa fa-users"></i> Usuarios<span class="plus"><i class="fa fa-plus"></i></span> </a>
               <ul>
                @can('users.index')
                <li> <a href="{{ route('users.index')}}"> <span>&nbsp;</span> <i class="fa fa-circle theme_color"></i> <b >Usuarios</b> </a> </li>
                @endcan
                <li> <a href="{{url('direcciones')}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Departamento</b> </a> </li>
              </ul>
            </li>

            <li > <a href="javascript:void(0);"> <i class="fa fa-money"></i> Partidas<span class="plus"><i class="fa fa-plus"></i></span> </a>
             <ul>

               <li> <a href="{{url('partidas')}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Partidas</b> </a> </li>

             </ul>
           </li>

           <li > <a href="javascript:void(0);"> <i class="fa fa-envelope"></i> Solicitudes<span class="plus"><i class="fa fa-plus"></i></span> </a>
             <ul>
              <li> <a href="{{url('solicitudes')}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Recibidas</b> </a> </li>

              <li> <a href="{{url('solicitudes1')}}"> <span>&nbsp;</span> <i class="fa fa-circle"></i> <b>Enviadas</b> </a> </li>

            </ul>
          </li>

        </ul>

      </div>
    </div>
  </div>
  <!--\\\\\\\left_nav end \\\\\\-->
  <div class="contentpanel">
    <!--\\\\\\\ contentpanel start\\\\\\-->

    @yield('contenido')

  </div>
  <!--\\\\\\\ content panel end \\\\\\-->
</div>
<!--\\\\\\\ inner end\\\\\\-->
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form>

{!!Html::script('js/jquery-2.1.0.js')!!}
{!!Html::script('js/script.js')!!}
{!!Html::script('js/jquery-2.1.0.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
{!!Html::script('js/common-script.js')!!}
{!!Html::script('js/jquery.slimscroll.min.js')!!}
{!!Html::script('plugins/toggle-switch/toggles.min.js')!!} 
{!!Html::script('plugins/checkbox/zepto.js')!!}
{!!Html::script('plugins/checkbox/icheck.js')!!}
{!!Html::script('js/icheck-init.js')!!}
{!!Html::script('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')!!} 
{!!Html::script('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')!!} 
{!!Html::script('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')!!} 
{!!Html::script('plugins/bootstrap-timepicker/js/bootstrap-timepicker.js')!!} 
{!!Html::script('js/form-components.js')!!} 
{!!Html::script('plugins/input-mask/jquery.inputmask.min.js')!!} 
{!!Html::script('plugins/input-mask/demo-mask.js')!!} 
{!!Html::script('plugins/bootstrap-fileupload/bootstrap-fileupload.min.js')!!} 
{!!Html::script('plugins/dropzone/dropzone.min.js')!!} 
{!!Html::script('plugins/ckeditor/ckeditor.js')!!}
{!!Html::script('js/jPushMenu.js')!!} 
{!!Html::script('plugins/validation/parsley.min.js')!!}
{!!Html::script('plugins/data-tables/jquery.dataTables.js')!!}
{!!Html::script('plugins/data-tables/DT_bootstrap.js')!!}
{!!Html::script('plugins/data-tables/dynamic_table_init.js')!!}
{!!Html::script('plugins/edit-table/edit-table.js')!!}
{!!Html::script('plugins/file-uploader/js/vendor/jquery.ui.widget.js')!!}
{!!Html::script('plugins/file-uploader/js/jquery.iframe-transport.js')!!}
{!!Html::script('plugins/file-uploader/js/jquery.fileupload.js')!!}
{!!Html::script('plugins/validation/parsley.min.js')!!}
{!!Html::script('plugins/select2/dist/js/select2.full.min.js')!!}
<!-- Include SmartWizard JavaScript source -->
{!!Html::script('plugins/wizard/js/jquery.smartWizard.js')!!}
<!-- Include jQuery Validator plugin -->
{!!Html::script('https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js')!!}


{!!Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js')!!}


{!!Html::script('plugins/calendar/fullcalendar.min.js')!!}
{!!Html::script('plugins/calendar/external-draging-calendar.js')!!}
</body>
</html>