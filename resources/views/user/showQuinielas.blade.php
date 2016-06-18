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
						<p>Quinielas Disponibles</p>
							
							<p align="right">
								<a href="{!! URL::to('/logout')!!}"><button type="button" class="btn btn-danger">
  								<span class="glyphicon glyphicon-remove-circle" aria-hidden="true" href="/logout"></span> Salir
								</button></a></p>

							
							
							
						</div>

		

		<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Costo</th>
			<th>F. Inicio</th>
			<th>Torneo</th>
			<th>Acción</th>
		</thead>
		
		@foreach($quinielas as $quiniela)
			
			@if(date("Y-m-d") == $quiniela->f_oferta)
				<tbody>
				<td>{{$quiniela->nombre}}</td>
				<td>{{$quiniela->costo}}</td>
				<td>{{$quiniela->f_inscripcion}}</td>
				<td>{{$quiniela->torneo_liga}}</td>
				
				
				
				<td>{!!link_to_route('quiniela.show', $title = 'Inscribir', $parameters = $quiniela->id, $attributes = ['class'=>'btn btn-success'])!!}</td>
				
				
				</tbody>

			@endif

		@endforeach
		
		</table>

		{!!$quinielas->render()!!}
				
				
					</div>
			
				</div>

		<div class="review-slider">
			 <ul id="flexiselDemo1">
			<li><img src="images/g11.jpg" alt=""/></li>
			<li><img src="images/e3.jpg" alt=""/></li>
			<li><img src="images/g6.jpg" alt=""/></li>
			<li><img src="images/g4.jpg" alt=""/></li>
			<li><img src="images/e1.jpg" alt=""/></li>
			<li><img src="images/g2.jpg" alt=""/></li>
		</ul>
			
		</div>
	@endsection