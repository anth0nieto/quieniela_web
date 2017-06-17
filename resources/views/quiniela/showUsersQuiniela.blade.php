@extends('layouts.admin')


@section('content')
	@include('alerts.success')
	<table class="table">
		<thead>
			<th>id_user</th>
			<th>Id_quiniela</th>
			<th>Username</th>
			<th>Status</th>
			<th>Acción</th>
			
		</thead>
		
		@foreach($users as $user)

			@if($id_quin == $user->id_quiniela)				
				<tbody>
				
				<td>{{$user->id}}</td>
				<td>{{$user->id_quiniela}}</td>
				<td><a href="/showTransaccion?id_quin=<?php echo $id_quin ?>&username=<?php echo $user->username?>">{{$user->username}}</a></td>
				<td>
				{{$user->status}}
				</td>

				<td>
				<ul class="list-inline">

				<li>
					{!!link_to_route('userquiniela.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary'])!!}
				</li>

				<li>
					{!!Form::open(['route'=>['userquiniela.destroy', $user->id], 'method' => 'DELETE'])!!}
					{!!Form::submit('Eliminar',['class'=>'btn btn-danger', 'disabled'=>'true'])!!}
					{!!Form::close()!!}
				</li>
				</ul>
					
			
				</td>
				</tbody>
			@endif
		
		@endforeach


		
	</table>

	{!! $users->render() !!}
		
@stop