@extends('layouts.gest_quiniela')
@section('content')
	
	@include('alerts.request')
	@include('alerts.success')

<form action="/guardarpartido" method="POST">
{!! csrf_field() !!}		
<br>		
<div class="row col-wrap" >
<div class="col-sm-6 col">

<div class="well">
 
     <fieldset>
 
        <legend>Crear Partido</legend>



		<div class="form-group" align="center">
			<div class="col-lg-3">
				{!!Form::text('id_local',null,['class'=>'form-control','placeholder'=>'Local'])!!}
			</div>
			<div class="col-lg-1">
				{!!Form::label('VS')!!}
			</div>
			<div class="col-lg-3">
				{!!Form::text('id_visitante',null,['class'=>'form-control','placeholder'=>'Visitante'])!!}
			</div>
		</div>
			
		<br><br>
		<div class="form-group">
			<div class="col-lg-2">	
			{!!Form::label('Fecha:')!!}
			</div>
			<div class="col-lg-4">	
				{!!Form::text('fecha',null,['class'=>'form-control','placeholder'=>'2016-04-02'])!!}
			</div>
		</div>	

		<br><br>
		<div class="form-group">
			<div class="col-lg-2">	
			{!!Form::label('Fase:')!!}
			</div>
			<div class="col-lg-4">	
				{!!Form::text('fase',null,['class'=>'form-control','placeholder'=>'Fase'])!!}
			</div>
		</div>	

		<br><br>

		<button class="btn btn-primary" value="{{ csrf_token() }}">Crear</button>
		
		<br><br>
	</fieldset>	
	</div>
	</div>
	</div>	


	</form>
@stop