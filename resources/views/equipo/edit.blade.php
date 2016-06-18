@extends('layouts.gest_quiniela')

@section('content')
	
	@include('alerts.request')
	@include('alerts.success')

	{!!Form::model($equipo, ['route'=>['equipo.update',$equipo->id_equipo],'method'=>'PUT'])!!}
		
		{!!Form::label('Id:')!!}
		{!!Form::text('id_equipo',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
		{!!Form::label('Nombre:')!!}
		{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}

	{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
		
		<br><br>

	{!!Form::close()!!}
@stop