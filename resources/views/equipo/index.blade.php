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
			<th>Quiniela</th>
			<th>ID</th>
			<th>Nombre</th>
			<th>Grupo</th>
			<th>Operación</th>
		</thead>
		
		@foreach($equipos as $equipo)

		@if($id_quin == $equipo->id_quiniela)
			<tbody>
				<td>{{$equipo->id_quiniela}}</td>
				<td>{{$equipo->id_equipo}}</td>
				<td>{{$equipo->nombre}}</td>
				<td>{{$equipo->grupo}}</td>
				<td>	

				{!!link_to_route('equipo.edit', $title = 'Editar', $parameters = $equipo->id, $attributes = ['class'=>'btn btn-primary']);!!}
				
				</td>
			</tbody>
		@endif
		@endforeach


		
	</table>

	{!! $equipos->render() !!}

		
@stop