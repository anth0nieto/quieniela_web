@extends('layouts.user')
	
	@section('content')

	<link rel="stylesheet" type="text/css" href="../css/wow-alert.css">
			
					<div class="container" >
					@include('alerts.success')
					@include('alerts.errors')
					@include('alerts.request')
					</div>
					
	
					

					
	
		<table class="table">
		
		<div class="col-md-6 col-md-offset-3" style="margin-top:40px;">
			



	   	 <div class="panel panel-info" style=" border-color:#5cb85c;">
 		 <div class="panel-heading " align="center" style="background-color:#5cb85c; border-color:#5cb85c; "><h4 style="color:#fff"><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="5">Recuperación de Contraseña</font></h4></div>
		 <div class="panel-body" style="padding:10px;" >			

			{!! Form::open(['url'=>'/password/reset'])!!}

			<div class="col-md-6">
				<br>
				{!! Form::label('fechat', 'Correo Electronico', ['class' => 'col-lg-12 control-label']) !!}
			</div>	

				<div class="col-md-6">
					<br>
					{!! Form::hidden('token',$token,null) !!}
					{!! Form::text('email',null,['class'=>'form-control', 'placeholder'=>'Correo Electronico del usuario','value'=>"{{old('email')}}"]) !!}
				</div>

			<div class="col-md-6">
				<br>
				{!! Form::label('pass', 'Nueva Contraseña', ['class' => 'col-lg-12 control-label']) !!}
			</div>	
				<div class="col-md-6">
					<br>
					{!! Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingrese Nueva Contraseña'])!!}
				</div>
				
			<div class="col-md-6">
				<br>
				{!! Form::label('passs', 'Confirme Contraseña', ['class' => 'col-lg-12 control-label']) !!}
			</div>	
				<div class="col-md-6">
				<br>
					{!! Form::password('password_confirmation',['class'=>'form-control', 'placeholder'=>'Confirme Nueva Contraseña']) !!}
				
				</div>
				<div class="col-md-6 col-md-offset-3" align="center">
				<br>
				{!! Form::submit('Restablecer contraseña',['class'=>'btn btn-success'])!!}
				</div>

			{!! Form::close()!!}	

			</div>
			</div>
			</div>
	</table>

	
	@endsection	