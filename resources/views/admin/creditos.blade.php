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
			<th>Correo</th>
			<th>Monto</th>
			<th>4 Ultimos</th>
			<th>Banco</th>
			<th>Fecha</th>
		</thead>
		
		@foreach($creditos as $credito)


		<tbody>
			
			<td>{{$credito->nombre}} {{$credito->apellido}}</td>
			<td>{{$credito->email}}</td>
			<td>{{$credito->creditoPendiente}} Bsf</td>
			<td>#{{$credito->ultimosCuatro}}</td>
			<td>{{$credito->banco}}</td>
			<td>{{$credito->fecha}}</td>
			<td>
			
			<ul class="list-inline">
				<li>
					<form name="form"  action="{{action('UsertransaccionController@aprobarCredito')}}" method="POST" >
						{!! csrf_field() !!}
					<input name="user_email" type="hidden" id="resultado" value="{{$credito->email}}"  />
					<input name="monto" type="hidden" id="resultado" value="{{$credito->creditoPendiente}}"  />
					<input name="ultimosCuatro" type="hidden" id="resultado" value="{{$credito->ultimosCuatro}}"  />
					<input name="credito_id" type="hidden" id="credito_id" value="{{$credito->id}}"  />
					
					<button class="btn btn-success" value="{{ csrf_token() }}">Aprobar</button>
					</form>
				</li>
			</ul>
			



			</td>
		</tbody>
		
		@endforeach

	</table>

@stop 