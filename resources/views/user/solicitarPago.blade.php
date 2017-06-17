@extends('layouts.quiniela')

	
	@section('content')
 	<script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

			<script>
			$('#myModal').on('shown.bs.modal', function () {
  			$('#myInput').focus()
			});
			</script>


	<script type = "text/javascript">
         $(document).ready(function(){
         	$("#errorCont").hide();
         	//$("#Pago").attr("disabled", true);
         	$("#monto").keyup(function(){
         		var valor = $('#monto').val();
         		if(parseInt(valor) !=null && parseInt(valor) > parseInt($("#montoMax").val()))
         		{
         			$("#errorCont").show();
         			$("#exceso").text( "Lo sentimos, el monto solicitado no puede ser mayor a tus Creditos" );
         		}
         		else $("#errorCont").hide();
         	});

         });
    </script>

	

	
				
						
					<div class="container" >		
					
						@include('alerts.success')
						@include('alerts.errors')
						@include('alerts.request')
						<div class="container" id="errorCont">
								<p>
									<div class="panel panel-danger" >
										<div class="panel-heading "><h4 id="exceso"></h4></div>
									</div>
								</p>
						</div>
					</div>
						
					@if(Session::has('message'))
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  {{Session::get('message')}}
					</div>
					@endif
					@if(Session::has('error'))
					<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  {{Session::get('error')}}
					</div>
					@endif
						
					

		<form name="form"  action="{{action('UsertransaccionController@pagosTransaccion')}}" method="POST" >
			 {!! csrf_field() !!}								


	
		<div class="panel panel-info" style=" border-color:#5cb85c;" >
		<div class="panel-heading " aling="center" style="background-color:#5cb85c; border-color:#5cb85c;">
		<h4 align="center"><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="5">Retirar Creditos 
                                                 </font></h4></div>
		<div class="panel-body">	





		     <fieldset>
		 
		    <div class="panel panel-primary">
		    <div class="panel-heading" align="center"> <h4><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="5">Formulario de retiro </font></h4></div>
		    <div class="panel-body">

			<div class="row" align="center">
				<div class="col-md-8 col-md-offset-2">	
					{!!Form::label('Nombre Completo Propietario Cuenta Bancaria')!!}
					{!!Form::text('nombre_usuario',null,['class'=>'form-control','placeholder'=>'Mi Nombre'])!!}
				</div>
			</div>

			<div class="col-sm-4">	
			<br>	
			{!!Form::label('Banco Receptor')!!}
			<select class="form-control" name="banco_emisor">

					<option value="Banco BBVA Provincial">Banco BBVA Provincial</option>
					<option value="Banco Banesco">Banco Banesco</option>
					<option value="Banco BBVA Provincial">Banco de Venezuela</option>
					<option value="Banco Banesco">Banco BOD</option>
					<option value="Banco Mercantil">Banco Bancaribe</option>
					<option value="Banco Mercantil">Banco Mercantil</option>

			</select>
			</div>
				

				<div class="col-sm-4">
				<br>	
				{!!Form::label('C.I. Propietario Cuenta Bancaria ')!!}
				{!!Form::text('cedula',null,['class'=>'form-control','placeholder'=>'V-00000000'])!!}
				
				</div>


				<div class="col-sm-4">

				<br>
				{!!Form::label('Numero de Cuenta')!!}
				{!!Form::text('nroCuenta',null,['class'=>'form-control','placeholder'=>'Ej: 01341234567890122345'])!!}
				</div>



				<div class="col-sm-4">
				<br>

				{!!Form::label('Monto(Bsf.):')!!}
				{!!Form::text('monto',null,['class'=>'form-control','pattern'=>'[0-9]*','placeholder'=>'1000'])!!}
			
				</div>

				<div class="col-sm-4">
				<br>


				{!!Form::label('Fecha')!!}
				{!!Form::date('fecha',\Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control','placeholder'=>'Fecha'])!!}
				</div>
				
		
				<div class="col-sm-4">
				<br>

				{!!Form::label('Correo Electronico')!!}
				<input class="form-control" type="text" name="email" value="{{$email}}">
				</div>

				<div class="col-sm-4 col-md-offset-4" align="center">
				<br>
					<input name="user_id_nombre" type="hidden" id="user_id_nombre"  value="{!! Auth::user()->username !!}" />

					<input name="montoMax" type="hidden" id="montoMax"  value="{{ $usuario->creditoDisponible }}" />
				            
				<button class="btn btn-success" value="{{ csrf_token() }}" id="Pago"><h4>Solicitar Pago</h4></button>
			</form>
			</div>

		</fieldset>
		</div></div></div></div>

	</div>
	</div>
	

		
	@endsection