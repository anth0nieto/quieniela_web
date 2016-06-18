@extends('layouts.admin')
	
	@section('content')
	
	@include('alerts.request')

		{!!Form::model($admin,['route'=>['admin.update',$admin->id],'method'=>'PUT'])!!}
		
		@include('admin.forms.usr')
		{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
	
		{!!Form::close()!!}
		
		<br>

		{!!Form::open(['route'=>['admin.destroy', $admin], 'method' => 'DELETE'])!!}
			
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		
		{!!Form::close()!!}
	
	@stop