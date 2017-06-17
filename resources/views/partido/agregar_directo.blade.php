@extends('layouts.gest_quiniela')
@section('content')
	
	@include('alerts.request')
	@include('alerts.success')
	@include('alerts.errors')


<?php $equipos = DB::table('equipos')
				->where('id_quiniela','=', 0)
				->get();

$equipo_a = '<select class="form-control" name="equipo_a">';
$equipo_b = '<select class="form-control" name="equipo_b">';
foreach ($equipos as $equipo) 
{
	$equipo_a.= '<option value="'.$equipo->nombre.'">'.$equipo->nombre.'</option>';
	$equipo_b.= '<option value="'.$equipo->nombre.'">'.$equipo->nombre.'</option>';
}
$equipo_a.='</select>';
$equipo_b.='</select>';
?>

<form action="/partido_directo" method="POST">
{!! csrf_field() !!}		
<br>		
<div class="row col-wrap" >
<div class="col-sm-6 col">

<div class="well">
 
     <fieldset>
 		<div align = "center">
        	<legend>Agregar Partido</legend>
        </div>

        <div class="row">
			<div class="form-group" align="center">
			

				<div class="col-lg-3">

					{!!$equipo_a!!}
				</div>
				<div class="col-lg-1">
					{!!Form::label('VS')!!}
				</div>
				

				<div class="col-lg-3">
					{!!$equipo_b!!}
				</div>
			
				

				<div class="col-lg-2">	
				{!!Form::label('Fecha:')!!}
				</div>
				<div class="col-lg-3">	
					{!!Form::text('fecha',null,['class'=>'form-control','placeholder'=>'aaaa-mm-dd'])!!}
				</div>
		
			</div>
		</div>

		<br>

		<div class="row" align= "center">
			<button class="btn btn-primary" value="{{ csrf_token() }}">Agregar</button>
		</div>
		
		<br><br>
	</fieldset>	
	</div>
	</div>
	</div>	


	</form>
@stop