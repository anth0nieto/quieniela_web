@extends('layouts.gest_quiniela')

@section('content')
	
	@include('alerts.request')
	@include('alerts.success')

	{!!Form::model($partido, ['route'=>['partido.update',$partido->id_partido],'method'=>'PUT'])!!}
		
		{!!Form::text('id_local',null,['class'=>'form-control','placeholder'=>'Ingresa el Id Local'])!!}
		{!!Form::label('VS')!!}
		{!!Form::text('id_visitante',null,['class'=>'form-control','placeholder'=>'Ingresa el Id Visitante'])!!}
		&nbsp;
		{!!Form::label('Fecha:')!!}
		{!!Form::text('fecha',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha:'])!!}
		

		<br><br>

	{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
		
		<br><br>

	{!!Form::close()!!}
@stop