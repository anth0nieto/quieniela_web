@extends('layouts.gest_quiniela')

@section('content')
	
	@include('alerts.request')
	@include('alerts.success')

	{!!Form::model($partido, ['route'=>['partido.update',$partido->id_partido],'method'=>'PUT'])!!}
		
<br>		
<div class="row col-wrap" >
<div class="col-sm-6 col">

<div class="well">
 
     <fieldset>
 
        <legend>Editar Partido</legend>



		<div class="form-group" align="center">
			<div class="col-lg-3">
				{!!Form::text('id_local',null,['class'=>'form-control','placeholder'=>'Ingresa el Id Local'])!!}
			</div>
			<div class="col-lg-1">
				{!!Form::label('VS')!!}
			</div>
			<div class="col-lg-3">
				{!!Form::text('id_visitante',null,['class'=>'form-control','placeholder'=>'Ingresa el Id Visitante'])!!}
			</div>
		</div>
			
		<br><br>
		<div class="form-group">
			<div class="col-lg-2">	
			{!!Form::label('Fecha:')!!}
			</div>
			<div class="col-lg-4">	
				{!!Form::text('fecha',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha:'])!!}
			</div>
		</div>	

		<br><br>

	{!!Form::submit('Editar',['class'=>'btn btn-primary'])!!}
		
		<br><br>
	</fieldset>	
	</div>
	</div>
	</div>	


	{!!Form::close()!!}
@stop