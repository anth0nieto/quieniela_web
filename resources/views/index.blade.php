@extends('layouts.principal')
	
	@section('content')
	
	<script src="js/modernizr.custom.js"></script>
	
			
	
				<div class="header">

			
				<ul id="cbp-bislideshow" class="cbp-bislideshow">
					<li><img src="images/salo1.jpg"/></li>
					<li><img src="images/morgan.jpg"/></li>
					<li><img src="images/Paul1.jpg"/></li>
					<li><img src="images/deyna2.JPG"/></li>
					<li><img src="images/messi.jpg"/></li>
					<li><img src="images/marta.jpg"/></li>
					<li><img src="images/msn.jpg"/></li>
					<li><img src="images/crmadridd.jpg"/></li>
					<li><img src="images/alex.jpg"/></li>
				</ul>

						  
					
			<div class="top-header">


				<div class="logo">
					<p>Tu Quiniela Ganadora</p>
				</div>
				
				<div>
					@include('alerts.success')
					@include('alerts.errors')
					@include('alerts.request')
				</div>
				
				
				
				<div class="clearfix">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!!link_to_route('user.create', $title = '¡Registrate Ya!', $parameters = null, $attributes = ['class'=>'btn btn-primary'])!!}
					
				</div>
			</div>
			 <div class="header-info">
				<h1>Comienza a ganar</h1>
				{!!Form::open(['route'=>'log.store','method'=>'POST'])!!}
					
					<div class="form-group">
					<h2>Username:</h2>
					{!!Form::text('username',null,['class'=>'form-control', 'placeholder'=>'Ingresa el Username'])!!}
					</div>

					<div class="form-group">
					<h2>Password:</h2>
					{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa la contraseña'])!!}
				</div>

					{!!Form::submit('Ingresar',['class'=>'btn btn-success'])!!}

				{!!Form::close()!!}
			</div>

			</div>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- imagesLoaded jQuery plugin by @desandro : https://github.com/desandro/imagesloaded -->
<script src="js/jquery.imagesloaded.min.js"></script>
<script src="js/cbpBGSlideshow.min.js"></script>
<script>
	$(function() {
		cbpBGSlideshow.init();
	});
</script>
	@endsection