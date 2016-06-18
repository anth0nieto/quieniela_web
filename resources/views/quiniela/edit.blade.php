@extends('layouts.admin')

@section('content')
	
	@include('alerts.request')
	@include('alerts.success')

	{!!Form::model($quiniela, ['route'=>['quiniela.update',$quiniela->id],'method'=>'PUT'])!!}
		@include('quiniela.forms.quiniela')

		{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
		
		<br><br>

	{!!Form::close()!!}
@stop