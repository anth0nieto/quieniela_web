@extends('layouts.admin')

@section('content')
	
	@include('alerts.request')
	@include('alerts.success')

	{!!Form::open(['route'=>'quiniela.store','method'=>'POST'])!!}
		
		@include('quiniela.forms.quiniela')

		{!!Form::submit('Crear Quiniela',['class'=>'btn btn-primary'])!!}
		
		<br><br>

	{!!Form::close()!!}
@stop