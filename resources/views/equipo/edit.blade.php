@extends('layouts.gest_quiniela')

@section('content')
	
	@include('alerts.request')
	@include('alerts.success')

	{!!Form::model($equipo, ['route'=>['equipo.update',$equipo->id_equipo],'method'=>'PUT'])!!}

<br>		
<div class="row col-wrap">
<div class="col-sm-6 col">

<div class="well">
 
     <fieldset>
 
        <legend>Editar Equipo</legend>

        <div class="form-group">
			{!!Form::label('id','Id:', ['class' => 'col-lg-2 control-label'])!!}
			<div class="col-lg-6">
			{!!Form::text('id_equipo',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			</div>
		</div>
		<br><br>
		<div class="form-group">
			{!!Form::label('nomb','Nombre:', ['class' => 'col-lg-2 control-label'])!!}
			<div class="col-lg-6">
			{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
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