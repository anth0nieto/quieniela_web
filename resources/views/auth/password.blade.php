@extends('layouts.user')
	
	@section('content')

	<link rel="stylesheet" type="text/css" href="../css/wow-alert.css">
			
					<div class="container" >
					@include('alerts.success')
					@include('alerts.errors')
					@include('alerts.request')
					</div>
					
	
		
		<br><br><br><br><br><br>
		<div class="col-sm-8 col-md-offset-2">



    	 <div class="panel panel-info" style=" border-color:#5cb85c;">
 		 <div class="panel-heading " align="center" style="background-color:#5cb85c; border-color:#5cb85c; "><h4 style="color:#fff"><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="5">Recuperación de Contraseña</font></h4></div>
		 <div class="panel-body" style="padding:10px;" >	

			{!! Form::open(['url'=>'/password/email'])!!}
			
				<div class="col-md-6 col-md-offset-2">
					{!! Form::text('email',null,['class'=>'form-control', 'placeholder'=>'Correo Electronico del usuario']) !!}
				</div>
				<div class="col-md-2">
					{!! Form::submit('Enviar Link',['class'=>'btn btn-success'])!!}
					{!! Form::close()!!}	

				</div>

	 </div>
	 </div>
	 </div>





	@endsection	