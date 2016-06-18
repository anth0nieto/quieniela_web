@extends('layouts.gest_quiniela')
@section('content')

	@include('alerts.request')
	@include('alerts.success')


{!!Form::model($parti, ['route'=>['resultado_A.update',$parti->id_partido],'method'=>'PUT'])!!}

		<br><br>
		<div class="panel panel-primary">
		<div class="panel-heading">Fecha: <?php echo $partidos->fecha ?></div>
		<div class="panel-body">

		<div class="form-inline">
	
		{!!Form::label($partidos->id_local)!!}
		{!!Form::text('goles_local',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
		&nbsp;&nbsp;&nbsp;
		{!!Form::label('VS')!!}
		&nbsp;&nbsp;&nbsp;
		{!!Form::text('goles_visitante',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
		{!!Form::label($partidos->id_visitante)!!}
		</div>
		</div>
		</div>
	
<br><br>
{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
<br><br>

{!!Form::close()!!}
@stop	