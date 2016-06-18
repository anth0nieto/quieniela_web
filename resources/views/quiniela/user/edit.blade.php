@extends('layouts.admin')
	
	@section('content')
	
	@include('alerts.request')
	

		{!!Form::model($user,['route'=>['userquiniela.update',$user->id],'method'=>'PUT'])!!}
		
		{!!Form::label('Status')!!}
		<select class="form-control" name="status">
				<option value="En proceso">En proceso</option>
				<option value="Inscrito">Inscrito</option>
				<option value="Rechazado">Rechazado</option>
				<option value="Finalizado">Finalizado</option>
		</select>
		<br>	
		{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
	
		{!!Form::close()!!}
	
	@stop