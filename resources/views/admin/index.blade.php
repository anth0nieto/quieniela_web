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
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Cedula</th>
			<th>Username</th>
			<<th>Operacion</th>
		</thead>
		
		@foreach($admins as $admin)

		<tbody>
			<td>{{$admin->nombre}}</td>
			<td>{{$admin->apellido}}</td>
			<td>{{$admin->cedula}}</td>
			<td>{{$admin->username}}</td>
			<td>{!!link_to_route('admin.edit', $title = 'Editar', $parameters = $admin->id, $attributes = ['class'=>'btn btn-primary'])!!}</td>
		</tbody>
		
		@endforeach
		
	</table>

		{!!$admins->render()!!}
	
@stop