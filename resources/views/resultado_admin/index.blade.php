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
			<th>Fecha</th>
			<th>Local</th>
			<th>Visitante</th>
		</thead>
		
		@foreach($resultados as $resultado)

			<tbody>
				<td>{{$resultado->id_partido}}</td>
				<td>{{$resultado->goles_local}}</td>
				<td>{{$resultado->goles_visitante}}</td>
				<td>	

				{!!link_to_route('resultado_A.edit', $title = 'Editar', $parameters = $resultado->id_partido, $attributes = ['class'=>'btn btn-primary']);!!}
				
				</td>
			</tbody>
		
		@endforeach
		
	</table>		
@stop