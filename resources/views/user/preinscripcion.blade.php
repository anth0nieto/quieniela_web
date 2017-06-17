@extends('layouts.user')

	
	@section('content')
			<script>
				$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
			</script>

	
				
					<div class="header">
					<div class="top-header">
						
						@include('alerts.success')
						@include('alerts.errors')
						@include('alerts.request')
						
						<ul class="nav nav-pills" role="tablist">
  						<li role="presentation"><a href="{!!URL::to('/showQuinielas')!!}">Quinielas Disponibles<span class="badge"></span></a></li>
  						<li role="presentation"><a href="{!!URL::to('/user/show')!!}">{!! Auth::user()->username !!}</a></li>
  						<li role="presentation"><a href="{!!URL::to('/misQuinielas')!!}">Mis Quinielas<span class="badge"></span></a></li><li role="presentation">
							<a href="{!! URL::to('/showQuinielas')!!}"><button type="button" class="btn btn-success">
			  				<span class="fa fa-arrow-left" aria-hidden="true" href="/showQuinielas"></span> Volver
							</button></a>
						</li>

						<li role="presentation">
							<a href="{!! URL::to('/logout')!!}"><button type="button" class="btn btn-danger">
			  				<span class="fa fa-paper-plane-o" aria-hidden="true" href="/logout"></span> Salir
							</button></a>
						</li>

						</ul>
						<div class="col-md-offset-4" align = "center">
							<div class="logo" >
								<p><div class="panel panel-info" >
									<div class="panel-heading "><h4> Inscripción </h4>
									</div>
								</div></p>
							</div>
						</div>

		

		<table class="table" >
		<thead >
			

			<tr align="center" class="info">
				<td class="info"><strong>Nombre</strong></td>
				<td class="info"><strong>Costo</strong></td>
				<td class="info"><strong>Fecha de Inicio</strong></td>
				<td class="info"><strong>Fecha de Culminacion</strong></td>
			</tr>
			
		</thead>
		
		
			
			
		<tbody align = "center">
				<td class="warning">{{$quiniela->nombre}}</td>
				<td class="warning">{{$quiniela->costo}}</td>
				<td class="warning">{{$quiniela->fecha_inicio}}</td>
				<td class="warning">{{$quiniela->fecha_finalizacion}}</td>
		</tbody>

		</table>		
		
		<div class="well" align="center">
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
			        	0116 0183 9802 0172 0540<br>
						Katherine Andrade
						C.I. 20199494<br>
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
			        	0105 0065 6400 6580 7332<br>
						Katherine Andrade
						C.I. 20199494<br>
						soportequinielaganadora@gmail.com
			        	</p>
			      </div>
			    </div>
			  
			  </div>

			
			</div>
		</table>
		</div>

	


		{!! Form::open(['route'=>'usertransaccion.store', 'method'=>'POST']) !!}	
		

		<div class="row col-wrap">
		<div class="col-sm-8 col-md-offset-2">


		     <fieldset>
		 
		    <div class="panel panel-primary">
		    <div class="panel-heading" align="center"> <h4>Formulario de Pago  <span class="fa fa-money" aria-hidden="true"></h4></div>
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
				
				{!!Form::label('Número de Transaccion')!!}
				{!!Form::text('nro_transaccion',null,['class'=>'form-control','placeholder'=>'Ejm: 123456789'])!!}
				</div>



				<div class="col-sm-4">
				<br>
				{!!Form::label('Monto(Bs):')!!}
				{!!Form::text('monto',$quiniela->costo,['class'=>'form-control'])!!}
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
				{!! Form::submit('Enviar Pago',['class'=>'btn btn-success']) !!}
				{!! Form::close() !!}
				</div>

		</fieldset>
		</div></div></div></div>


		{!! session(['id_qf'=>$quiniela->id])!!}
		{!! session(['user'=>Auth::user()])!!}

	
			
	</div>

		
	@endsection