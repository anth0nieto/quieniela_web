@extends('layouts.gest_quiniela')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

@section('content')
	
	<table class="table ">
		<thead>
			<th>Usuario</th>
			<th>Puntos</th>
			<th>Aciertos Ganadores</th>
			<th>Aciertos Resultados</th>
		</thead>
		
		@foreach($puntuaciones as $puntuacio)
			<tbody>
				<td class="success" >{{$puntuacio->username}}</td>
				<td class="warning">{{$puntuacio->ptos}}</td>
				<td>{{$puntuacio->ganadores}}</td>
				<td>{{$puntuacio->resultados}}</td>
			</tbody>	
		@endforeach
		
	</table>

	<form name="form"  action="{{action('PosicionController@act_pos')}}" method="GET" >
	<br><br>
	<button class="btn btn-success">Actualizar</button>
	<br><br>
	</form>
		
@stop