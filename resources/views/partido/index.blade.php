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
			<th>ID Partido</th>
			<th>ID Local</th>
			<th>ID Visitante</th>
			<th>Fecha</th>
		</thead>
		
		@foreach($partidos as $partido)

		@if($partido->id_quiniela == $id_quin)
			<tbody>
				<td>{{$partido->id_partido}}</td>
				<td>{{$partido->id_local}}</td>
				<td>{{$partido->id_visitante}}</td>
				<td>{{$partido->fecha}}</td>
				<td>	

				{!!link_to_route('partido.edit', $title = 'Editar', $parameters = $partido->id_partido, $attributes = ['class'=>'btn btn-primary']);!!}
				
				</td>
			</tbody>
		
		@endif
		@endforeach


		
	</table>

	{!! $partidos->render() !!}

		
@stop