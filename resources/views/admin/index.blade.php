@extends('layouts.admin')

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>

@endif

@section('content')

	<form name="form" action= "/verQuiniela" method="GET" >
           {!! csrf_field() !!}
    <input name="id" type="hidden"  value="1" />
	<button class="btn btn-primary" value="{{ csrf_token() }}">Ver Posiciones</button>

	</form>
	<table class="table">
		<thead>
			<th>Username</th>
			<th>Nro de Empleado</th>
			
		</thead>
		
		@foreach($admins as $admin)

		<tbody>
			<td>{{$admin->username}}</td>
			<td>{{$admin->numeroEmpleado}}</td>
			
		</tbody>
		
		@endforeach
		
	</table>
	
	
	
	 
		{!!$admins->render()!!}
	
@stop
