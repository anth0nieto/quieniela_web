@extends('layouts.admin')



@section('content')

@include('alerts.success')
@include('alerts.errors')
@include('alerts.request')
	
	<table class="table">
		<thead>
			<th>Id Transacción</th>
			<th>Id_quiniela</th>
			<th>Username</th>
			<th>Tipo Trans.</th>
			<th>Banco Emisor</th>
			<th>Nro Cuenta</th>
			<th>Monto</th>
			<th>Fecha</th>
			<th>Nro Trans.</th>
		</thead>
		
		@foreach($transacciones as $transaccion)

			@if($_GET['id_quin'] == $transaccion->id_quiniela && $_GET['username'] == $transaccion->username)
				<tbody>
					<td>{{$transaccion->id}}</td>
					<td>{{$transaccion->id_quiniela}}</td>
					<td>{{$transaccion->username}}</td>
					<td>{{$transaccion->tipo_transaccion}}</td>
					<td>{{$transaccion->banco_emisor}}</td>
					<td>{{$transaccion->nro_cuenta}}</td>
					<td>{{$transaccion->monto}}</td>
					<td>{{$transaccion->fecha}}</td>
					<td>{{$transaccion->nro_transaccion}}</td>

				</tbody>
			@endif
		
		@endforeach


		
	</table>


		
@stop