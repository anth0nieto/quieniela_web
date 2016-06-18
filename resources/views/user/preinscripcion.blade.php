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
  						<li role="presentation"><a href="{!!URL::to('/showQuinielas')!!}">Home<span class="badge"></span></a></li>
  						<li role="presentation"><a href="">{!! Auth::user()->username !!}</a></li>
  						<li role="presentation"><a href="#">Messages <span class="badge"></span></a></li>
  						<li role="presentation"><a href="{!!URL::to('/misQuinielas')!!}">Mis Quinielas<span class="badge"></span></a></li>
						</ul>
				
						<div class="logo">
						<p>Pre-inscripcion</p>
							
							<p align="right">
								<a href="{!! URL::to('/logout')!!}"><button type="button" class="btn btn-danger">
  								<span class="glyphicon glyphicons-user" aria-hidden="true" href="/logout"></span> Salir
								</button></a></p>

							
							<span class="glyphicons glyphicons-user"></span>
							
						</div>

		

		<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Costo</th>
			<th>F. Inicio</th>
			<th>Torneo</th>
			
		</thead>
		
		
			
			
		<tbody>
				<td>{{$quiniela->nombre}}</td>
				<td>{{$quiniela->costo}}</td>
				<td>{{$quiniela->f_inscripcion}}</td>
				<td>{{$quiniela->torneo_liga}}</td>
		</tbody>

		</table>		
		
		<table>
			<div class="row">
			  
			  <div class="col-sm-6 col-md-4">
			    
			    <div class="thumbnail">
			   	  <img src="../../../images/provincial.jpg" alt="..."  >
			      <div class="caption">
			        <h3>Transferencia o Depósito</h3>
			        <p >Corriente
			        	1057-1231-23242-2000
						THS SOCIAL
						ths_social@gmail.com
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
			        	1057-1231-23242-2000
						THS SOCIAL
						ths_social@gmail.com
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
			        	1057-1231-23242-2000
						THS SOCIAL
						ths_social@gmail.com
			        	</p>
			      </div>
			    </div>
			  
			  </div>


			
			</div>
		</table>


		<table>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			{!! Form::open(['route'=>'usertransaccion.store', 'method'=>'POST']) !!}
			
			{!!Form::label('Banco Emisor')!!}	
			<select class="form-control" name="banco_emisor">

					<option value="Banco BBVA Provincial">Banco BBVA Provincial</option>
					<option value="Banco Banesco">Banco Banesco</option>
					<option value="Banco Mercantil">Banco Mercantil</option>
			
			</select>
				

				{!!Form::label('Transferencia o Deposito')!!}	
				<select class="form-control" name="tipo_transaccion">
					<option value="Transferencia">Transferencia</option>
					<option value="Deposito">Deposito</option>
				</select>
				

				{!!Form::label('Monto(Bs):')!!}
				{!!Form::text('monto',$quiniela->costo,['class'=>'form-control'])!!}
			</div>
		</div>
		
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">	
			<div class="form-group">
				{!!Form::label('Nro de Cuenta Bancaria del Banco Emisor')!!}
				{!!Form::text('nro_cuenta',null,['class'=>'form-control','placeholder'=>'Ejm: 0134-1234-56-789-0-12345'])!!}


			{!!Form::label('Fecha')!!}
			{!!Form::date('fecha',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Numero de Cuenta'])!!}
			</div>
		</div>
	
	

		<div class="row">
			
			<div class="form-inline ">
				{!!Form::label('Número de Transaccion')!!}
				{!!Form::text('nro_transaccion',null,['class'=>'form-control','placeholder'=>'Ejm: 123456789'])!!}
			</div>

			<div class="form-inline ">
				<br><br>

				<!-- Button trigger modal -->
				{!! Form::submit('Enviar',['class'=>'btn btn-success']) !!}
				{!! Form::close() !!}
			</div>

		</div>
			

				
			
		</table>

		{!! session(['id_qf'=>$quiniela->id])!!}
		{!! session(['user'=>Auth::user()])!!}

				
		</div>
			
	</div>

		
	@endsection