@extends('layouts.gest_quiniela')
@section('content')

	@include('alerts.request')
	@include('alerts.success')

{!!Form::open(['route'=>'partido.store','method'=>'POST'])!!}

<br>
<div class="row col-wrap">
<div class="col-sm-12 col">
<div class="well">
 
     <fieldset>
         <legend>Ingresar Partidos</legend>

<div class="row col-wrap">
<div class="col-sm-9 col">
<div class="panel panel-primary">
<div class="panel-heading">Partidos Grupo A</div>
<div class="panel-body">
	
		<input name="id_quiniela_1" type="hidden" id="id_quiniela_1" size="30" maxlength="10" value=<?php echo $id_quiniela ?> />
	
		<div class="form-inline">
			{!!Form::text('local_1A',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_1A',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_1A',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha:'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_2A',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_2A',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_2A',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_3A',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_3A',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_3A',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_4A',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_4A',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_4A',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>

		<div class="form-inline">
			{!!Form::text('local_5A',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_5A',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_5A',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_6A',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_6A',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_6A',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
</div>
</div>
</div>
</div>
<br>

<div class="row col-wrap">
<div class="col-sm-9 col">
<div class="panel panel-success">
<div class="panel-heading">Grupo B</div>
<div class="panel-body">
	
		<div class="form-inline">
			{!!Form::text('local_1B',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_1B',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_1B',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_2B',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_2B',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_2B',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_3B',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_3B',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_3B',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_4B',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_4B',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_4B',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_5B',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_5B',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_5B',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_6B',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_6B',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_6B',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
</div>
</div>
</div>
</div>
<br>


<div class="row col-wrap">
<div class="col-sm-9 col">
<div class="panel panel-primary">
<div class="panel-heading">Grupo C</div>
<div class="panel-body">
	
	<div class="form-inline">
			{!!Form::text('local_1C',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_1C',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_1C',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_2C',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_2C',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_2C',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_3C',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_3C',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_3C',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_4C',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_4C',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_4C',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_5C',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_5C',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_5C',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_6C',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_6C',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_6C',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
</div>
</div>
</div>
</div>
<br>

<div class="row col-wrap">
<div class="col-sm-9 col">
<div class="panel panel-success">
<div class="panel-heading">Grupo D</div>
<div class="panel-body">
	
	<div class="form-inline">
			{!!Form::text('local_1D',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_1D',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_1D',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_2D',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_2D',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_2D',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_3D',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_3D',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_3D',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_4D',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_4D',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_4D',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_5D',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_5D',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_5D',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_6D',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_6D',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_6D',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
</div>
</div>
</div>
</div>
<br>

<div class="row col-wrap">
<div class="col-sm-9 col">
<div class="panel panel-primary">
<div class="panel-heading">Grupo E</div>
<div class="panel-body">
			
	<div class="form-inline">
			{!!Form::text('local_1E',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_1E',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_1E',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_2E',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_2E',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_2E',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_3E',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_3E',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_3E',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_4E',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_4E',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_4E',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_5E',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_5E',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_5E',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_6E',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_6E',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_6E',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
</div>
</div>
</div>
</div>
<br>

<div class="row col-wrap">
<div class="col-sm-9 col">
<div class="panel panel-success">
<div class="panel-heading">Grupo F</div>
<div class="panel-body">
	
	<div class="form-inline">
			{!!Form::text('local_1F',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_1F',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_1F',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_2F',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_2F',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_2F',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_3F',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_3F',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_3F',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_4F',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_4F',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_4F',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_5F',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_5F',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_5F',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::text('local_6F',null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
			{!!Form::label('VS')!!}
			{!!Form::text('visitante_6F',null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
			&nbsp;
			{!!Form::label('Fecha:')!!}
			{!!Form::date('fecha_6F',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha'])!!}
		</div>
		<br>
</div>
</div>
</div>
</div>
<br>

{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
<br><br>
    </fieldset>
 
  
</div>
</div></div>

{!!Form::close()!!}
@stop