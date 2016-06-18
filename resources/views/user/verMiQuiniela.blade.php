@extends('layouts.quiniela')
	
	@section('content')
				
				<div class="header">
					<div class="top-header">
						@include('alerts.success')
						@include('alerts.errors')
						@include('alerts.request')
						<ul class="nav nav-pills" role="tablist">
  						<li role="presentation"><a href="{!!URL::to('/showQuinielas')!!}">Home<span class="badge"></span></a></li>
  						<li role="presentation"><a href="">{!! Auth::user()->username !!}</a></li>
  						<li role="presentation"><a href="#">Messages <span class="badge"></span></a></li>
  						<li role="presentation"><a href="{!!URL::to('/misQuinielas')!!}">Mis Quinielas<span class="badge"></span></a></li>
						</ul>

						<div class="logo">
						<p>Mis Quinielas</p>
							
							<p align="right">
								<a href="{!! URL::to('/logout')!!}"><button type="button" class="btn btn-danger">
  								<span class="glyphicon glyphicon-remove-circle" aria-hidden="true" href="/logout"></span> Salir
								</button></a></p>

							
							
							
						</div>

		

		<table class="table">
		<thead>
			<th>Usuario</th>
			<th>Puntos</th>
			<th>Aciertos Ganadores</th>
			<th>Aciertos Resultados</th>
		</thead>
		
		@foreach($puntuaciones as $puntuacio)
			<tbody>
				<td class="success" >{{$puntuacio->username}}</td>
				<td class="warning">{{$puntuacio->ptos}}</td>
				<td>{{$puntuacio->ganadores}}</td>
				<td>{{$puntuacio->resultados}}</td>
			</tbody>	
		@endforeach

		
		</table>

				
					</div>
			
				</div>

		
	@endsection