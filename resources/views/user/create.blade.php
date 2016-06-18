@extends('layouts.quiniela')
	
	@section('content')

			@include('alerts.success')
			@include('alerts.errors')
			@include('alerts.request')
	
			<div class="header">
					
					<div class="top-header">
				
						<div class="logo">
						<p>Registro de ususarios</p>
							
							<p align="right">

							@if(Auth::check())
								<a href="{!! URL::to('/logout')!!}"><button type="button" class="btn btn-danger">
  								<span class="glyphicon glyphicon-remove-circle" aria-hidden="true" href="/logout"></span> Salir
								</button></a></p>
							@endif
							
							
							
						</div>

		

		<table class="table">
		
		
		<br><br><br>
		{!!Form::open(['route'=>'user.store','method'=>'POST'])!!}
		
		@include('admin.forms.usr')
		{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
	
		{!!Form::close()!!}
		
		</table>

				
				
					</div>
			
		</div>

		
	@endsection