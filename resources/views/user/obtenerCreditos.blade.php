@extends('layouts.quiniela')

	
	@section('content')
			<script>
				$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
			</script>

	
				
				
					<div class="container" >		
						@include('alerts.success')
						@include('alerts.errors')
						@include('alerts.request')
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
						
							
		
		<div class="panel panel-info" style=" border-color:#5cb85c;" >
		<div class="panel-heading " aling="center" style="background-color:#5cb85c; border-color:#5cb85c;">
		<h4 align="center"><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="5">Comprar Creditos</font></h4></div>
		<div class="panel-body">


		<table>

			<div class="row">
			  
			  <div class="col-sm-6 col-md-4">
			    
			    <div class="thumbnail">
			   	  <img src="../../../images/provincial.jpg" alt="..."  >
			      <div class="caption">
			        <h3>Transferencia o Depósito</h3>
			        <p >Corriente
			        	0108 0377 2401 0005 2092<br>
						Alvaro Araujo
						C.I. 23776172<br>
						soportequinielaganadora@gmail.com
			        </p>
			        
			      </div>
			    </div>
			  
			  </div>

			  <div class="col-sm-6 col-md-4">
			    
			    <div class="thumbnail">
			   	  <img src="../../../images/banesco.jpg" alt="...">
			      <div class="caption">
			        <h3>Transferencia o Depósito</h3>
			        <p>Corriente
			        	0134 0946 3500 0117 6004<br>
						Alvaro Araujo
						C.I. 23776172<br>
						soportequinielaganadora@gmail.com
			        </p>
			      </div>
			    </div>
			  
			  </div>

			  <div class="col-sm-6 col-md-4">
			    
			    <div class="thumbnail">
			   	  <img src="../../../images/venezuela.png" alt="...">
			      <div class="caption">
			        <h3>Transferencia o Depósito</h3>
			        <p>Corriente
			        	0102 0151 9100 0030 0166<br>
						Alvaro Araujo
						C.I. 23776172<br>
						soportequinielaganadora@gmail.com
			        	</p>
			      </div>
			    </div>
			  
			  </div>


 			<div class="col-sm-6 col-md-4">
			    
			    <div class="thumbnail">
			   	  <img src="../../../images/bod2.png" alt="..."  >
			      <div class="caption">
			        <h3>Transferencia o Depósito</h3>
			        <p >Corriente
			        	0116 0046 8702 0834 8026<br>
			        	
						Jose Manuel Barrios Lacruz
						C.I. 22987320<br>
						soportequinielaganadora@gmail.com
			        </p>
			        
			      </div>
			    </div>
			  
			  </div>

			  <div class="col-sm-6 col-md-4">
			    
			    <div class="thumbnail">
			   	  <img src="../../../images/bancaribe.png" alt="...">
			      <div class="caption">
			        <h3>Transferencia o Depósito</h3>
			        <p>Corriente
			        	0114 0432 4443 2901 7538<br>
						Alvaro Araujo
						C.I. 23776172<br>
						soportequinielaganadora@gmail.com
			        </p>
			      </div>
			    </div>
			  
			  </div>

			  <div class="col-sm-6 col-md-4">
			    
			    <div class="thumbnail">
			   	  <img src="../../../images/mercantil.jpg" alt="...">
			      <div class="caption">
			        <h3>Transferencia o Depósito</h3>
			        <p>Corriente
			        	0105 0753 7607 5304 4005<br>
						Anthony Montero
						C.I. 24035265<br>
						soportequinielaganadora@gmail.com
			        	</p>
			      </div>
			    </div>
			  
			  </div>

			
			</div>
		</table>
		

	


		<form name="form"  action="{{action('UsertransaccionController@creditosTransaccion')}}" method="POST" >
			 {!! csrf_field() !!}								

		<div class="row col-wrap">
		<div class="col-md-12 ">


		     <fieldset>
		 
		    <div class="panel panel-primary">
		    <div class="panel-heading" align="center"> <h4><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="5">Formulario de Pago</font></h4></div>
		    <div class="panel-body">

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
				{!!Form::label('Transferencia o Deposito')!!}
				<select class="form-control" name="tipo_transaccion">
					<option value="Transferencia">Transferencia</option>
					<option value="Deposito">Deposito</option>
					<option value="Cupon">Cupón</option>
				</select>
				</div>


				<div class="col-sm-4">

				<br>
				{!!Form::label('Últimos 4 Números de la Transaccion')!!}
				{!!Form::text('cuantroUltimos',null,['class'=>'form-control','placeholder'=>'Ejm: 1234'])!!}
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

				{!!Form::label('Cuenta Banco Emisor')!!}
				{!!Form::text('nro_cuenta',null,['class'=>'form-control','placeholder'=>'Ejm: 01341234567890122345'])!!}
				</div>

	

			
				<div class="col-sm-4 col-md-offset-4" align="center">
				<br>
				<input name="user_email" type="hidden" value="{{Auth::user()->email}}" />
				<button class="btn btn-success" value="{{ csrf_token() }}"><h4>Enviar Pago</h4></button>
				</form>
				</div>

		</fieldset>
		</div></div></div></div>

</div>

	
			
	</div>
	</div>
	</div>

		
	@endsection