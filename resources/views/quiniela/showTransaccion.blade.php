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

			@if(($transaccion->id_quiniela == $array_value['id_quin']) && ($transaccion->username == $array_value['username']))
				<tbody>
					
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

	{!! $transacciones->render() !!}

		
@stop