<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	{{$conceptoPartidas->numeroPartidad}}
	{{$conceptoPartidas->concepto}}
	{{$conceptoPartidas->ano}}
	<br>

	@foreach($partidas2 as $mesPartida)
	MES {{$mesPartida->nombre_mes}} <br>
	Presupuesto Asignado	{{$mesPartida->presupuestoAsignado}}
	<br>
	Presupuesto Gastado	{{$mesPartida->presupuestoGastado}}
	@endforeach
</body>
</html>