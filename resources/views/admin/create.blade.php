@extends('layouts.admin')
@section('content')

	@include('alerts.request')
	
	{!!Form::open(['route'=>'admin.store','method'=>'POST'])!!}
		
		@include('admin.forms.usr')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	
	{!!Form::close()!!}
	
@stop