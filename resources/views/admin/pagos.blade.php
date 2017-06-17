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
			<th>UserName</th>
			<th>Correo</th>
			<th>Cedula</th>
			<th>Banco</th>
			<th>Nro Cuenta</th>
			<th>Monto</th>
			<th>Fecha Solicitud</th>
		</thead>
		
		@foreach($pagos as $pago)


		<tbody>
			
			<td>{{$pago->nombre}}</td>
			<td>{{$pago->username}}</td>
			<td>{{$pago->email}}</td>
			<td>{{$pago->cedula}}</td>
			<td>{{$pago->banco}}</td>
			<td>#{{$pago->nroCuenta}}</td>
			<td>{{$pago->montoSolicitado}}</td>
			<td>{{$pago->fechaSolicitud}}</td>
			<td>
			
			<ul class="list-inline">
				<li>
					<form name="form"  action="{{action('UsertransaccionController@aprobarPago')}}" method="POST" >
						{!! csrf_field() !!}
					<input name="user_email" type="hidden" id="resultado" value="{{$pago->email}}"  />
					<input name="monto" type="hidden" id="resultado" value="{{$pago->montoSolicitado}}"  />
					<input name="id_pago" type="hidden" id="id_pago" value="{{$pago->id}}"  />
					<input name="fecha_pago" type="hidden" id="fecha_pago" value="{{$pago->fechaSolicitud}}"  />
					
					<button class="btn btn-success" value="{{ csrf_token() }}">Pagar</button>
					</form>
				</li>
			</ul>
			



			</td>
		</tbody>
		
		@endforeach

	</table>

@stop 