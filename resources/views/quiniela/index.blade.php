@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif


@section('content')
	
	<table class="table">
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Fecha Inicio</th>
			<th>Fecha Oferta</th>
		
			<th>Competición</th>
			<th>Costo</th>
			<th>Operación</th>
		</thead>
		
		@foreach($quinielas as $quiniela)


		<tbody>
			
			<td>{!!$quiniela->id!!}</td>
			<td>
				
				<a href="/showUsersQuiniela?id_quin=<?php echo $quiniela->id ?>">{{$quiniela->nombre}}</a>
			

			</td>
			<td>{{$quiniela->f_inicio}}</td>
			<td>{{$quiniela->f_oferta}}</td>
			
			<td>{{$quiniela->torneo_liga}}</td>
			<td>{{$quiniela->costo}}</td>
			<td>
			
		
			
		


			<ul class="list-inline">
  			
			<li>
			{!!Form::open(['route'=>['quiniela.destroy', $quiniela->id], 'method' => 'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
			{!!Form::close()!!}
			<li>

			<li>
			{!!link_to_route('quiniela.edit', $title = 'Editar', $parameters = $quiniela->id, $attributes = ['class'=>'btn btn-primary']);!!}
			</li>
			<li>
				<form name="form"  action="{{action('EquipoController@constructor')}}" method="GET" >
				<input name="resultado" type="hidden" id="resultado" size="30" maxlength="10" value=<?php echo $quiniela->id ?>  />		
				<button class="btn btn-success">Gestionar</button>
				</form>
			</li>
			</ul>
			



			</td>
		</tbody>
		
		@endforeach


		
	</table>

	{!! $quinielas->render() !!}

		
@stop