@extends('layouts.quiniela')
	
	@section('content')
				
	
<div class="container" >
		@include('alerts.success')
		@include('alerts.errors')
		@include('alerts.request')
</div>		
			<?php $user = DB::table('users')->join('personas','personas.email','=','users.email')
						 								->where('users.email','=', Auth::user()->email)
														->select('personas.creditoDisponible')
														->get()?>


		<table class="table">
		
				<div class="row col-wrap">
				<div class="col-md-12 ">

				     <fieldset>
				 
				    <div class="panel panel-info" style=" border-color:#5cb85c;" >
					<div class="panel-heading " aling="center" style="background-color:#5cb85c; border-color:#5cb85c;">
				    <h4 align="center"><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="5">Datos Personales</font></h4></div>
				    <div class="panel-body">
				 

				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
				          	<label align="center">Nombre:</label>
				        </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"> <font style="font-family: 'Architects Daughter', cursive;" color=" #154360 " size="3">{{$usuario[0]->nombre}}</font></label>
				        </div>
				        


				         <div class="col-sm-4 col-md-offset-2">
				       		<br>
				          	<label align="center">Apellido:</label>
				        </div>
				        <div class="col-sm-6">
				        	<br>
				             <label align="center"><font style="font-family: 'Architects Daughter', cursive;" color=" #154360 " size="3">{{$usuario[0]->apellido}}</font></label>
				        </div>


				         <div class="col-sm-4 col-md-offset-2">
				       		<br>
					        <label align="center">Username:</label>
				        </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font style="font-family: 'Architects Daughter', cursive;" color=" #154360 " size="3">{{$usuario[0]->username}}</font></label>
				        </div>
									       

				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					        <label align="center">Cedula:</label>
				        </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font style="font-family: 'Architects Daughter', cursive;" color=" #154360 " size="3">{{$usuario[0]->cedula}}</font></label>
				        </div>


				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					    	<label align="center">Correo Electronico:</label>
				        </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font style="font-family: 'Architects Daughter', cursive;" color=" #154360 " size="3">{{$usuario[0]->email}}</font></label>
				        </div>
				    
				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
				       		<label align="center">Teléfono:</label>
					        
				        </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font style="font-family: 'Architects Daughter', cursive;" color="#154360 " size="3">{{$usuario[0]->telefono}}</font></label>
				        </div>


				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					        <label align="center">Fecha Nacimiento:</label>
					        
				        </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font style="font-family: 'Architects Daughter', cursive;" color=" #154360 " size="3">{{$usuario[0]->fecha_nacimiento}}</font></label>
				        </div>

				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					        <label align="center">Ubicación:</label>
					    </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font style="font-family: 'Architects Daughter', cursive;" color=" #154360 " size="3">{{$usuario[0]->ubicacion}}</font></label>
				        </div>
		
				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					       	<label align="center">Cliente desde:</label>	
					    </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font style="font-family: 'Architects Daughter', cursive;" color="#b03a2e" size="3">{{$usuario[0]->created_at}}</font></label>
				        </div>

				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					       	<label align="center">Creditos Disponibles:</label>	
					    </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font style="font-family: 'Architects Daughter', cursive;" color="#1b5e20" size="4">{{$usuario[0]->creditoDisponible}} Bsf.</font></label>
				            <form action="/getPago" method="POST" style="POSITION: absolute">
				            	{!! csrf_field() !!}	
				            	<input name="user_email" type="hidden" id="id_quiniela"  value="{{$usuario[0]->email}}" />
				            <button class="btn btn-success" value="{{ csrf_token() }}">Cobrar Creditos</button>
				        </div>
				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					       	<label align="center">Creditos Pendientes:</label>	
					    </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font style="font-family: 'Architects Daughter', cursive;" color="#e65100" size="4">{{$micredito}} Bsf.</font></label>
				        </div>

						<div class="col-md-4 col-md-offset-2">
				       		<br>
					       	<label align="center">Pago en Proceso:</label>	
					    </div>
				        <div class="col-md-6">
				        	<br>
				            <label align="center"><font style="font-family: 'Architects Daughter', cursive;" color="#154360" size="4">{{$mipago}} Bsf.</font></label>
				        </div>
				        

				       
				    </div>
				    </div>

				    </fieldset>
				 
				  
				</div>
				</div>
				</div>
				
		</table>
		

	
	@endsection