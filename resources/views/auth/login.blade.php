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
  body{
  background-color: #FAFAFA;  
}

#logosezac{
max-width: 100%; 

}
#titulo{
margin-bottom: -120px;
margin-top: 0px;
}
</style>
<body>

  <div class="row">
    <div class="col-md-3 col-sm-12">
     <center><img src="assets/images/sezac.png" style="" id="logosezac"></center>
   </div>
   <div class="col-md-9">
   </div>
 </div>
 
 <div id="titulo">
  <center><h2> Bienvenido a <b>INSEZAC</b></h2></center>
  <h5 id="intro" align="center">Sistema para el control del padrón de beneficiarios</h5>

</div>

<div class="login_content">
  <div class="panel-heading border login_heading">INICIAR SESIÓN</div>  
  <div id="div-error"></div>
  <form role="form" action="index.php?c=Login&a=Acceder" class="form-horizontal" method="post" id="form-login">
    <div class="form-group">
      <div class="col-sm-10">
        <input type="text" placeholder="Usuario" name="usuario" id="inputEmail3" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        <input type="password" placeholder="Password" name="password" id="inputPassword3" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <div class=" col-sm-10">
        <button class="btn btn-success" style="width: 100%;">Acceder</button>
      </div>
    </div>
  </form>
</div>
<br><hr style="color:black">
<center><h4>Visitar sitio oficial de <a href="http://sezac.org.mx/">SEZAC</a></h4></center>

</body>


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
<script type="text/javascript">
 $('#form-login').submit(function() {
  $.ajax({
    type: 'POST',
    url: $(this).attr('action'),
    data: $(this).serialize(),
    success: function(respuesta) {
      console.log(respuesta);
      if(respuesta == "ok"){
       location.href = "?c=inicio";
     }else{
      $('#div-error').html('<div class="alert alert-danger"><i class="fa fa-warning"></i>'+respuesta+'</div>');
    }
  }
})      
  return false;
}); 
</script>

</html>