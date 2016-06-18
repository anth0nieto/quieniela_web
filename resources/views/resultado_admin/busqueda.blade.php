@extends('layouts.gest_quiniela')

@if(Session::has('message1'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message1')}}
</div>
@endif

@section('content')
	
	@include('alerts.request')
	@include('alerts.success')

	<br><br>
	<form name="form"  action="{{action('ResultadoAdminController@buscar')}}" method="GET" >

	<div class="form-inline">
	<label for="">Fecha a Actualizar: </label>
	<input name="fecha_result" type="date" value = "{{ date('Y-m-d') }}"id="fecha_result" class="form-control" />		
	</div>
	
	<br><br>
	<button class="btn btn-success">Buscar</button>
	</form>

@stop