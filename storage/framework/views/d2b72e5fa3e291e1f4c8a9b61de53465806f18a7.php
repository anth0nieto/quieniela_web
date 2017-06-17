	
	<?php $__env->startSection('content'); ?>
			<script>
				$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
			</script>

	
				
					<div class="header">
					<div class="top-header">
						
					<div class="container" >		
					
						<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
						
					<?php if(Session::has('message')): ?>
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo e(Session::get('message')); ?>

					</div>
					<?php endif; ?>
					<?php if(Session::has('error')): ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo e(Session::get('error')); ?>

					</div>
					<?php endif; ?>
						
						<ul class="nav nav-pills" role="tablist">
  						<li role="presentation"><a href="<?php echo URL::to('/showQuinielas'); ?>"><button type="button" class="btn btn-primary active"><span class="fa fa-check-square" aria-hidden="true"></span> Quinielas Disponibles</button></a></li>
  						<li role="presentation"><a href="<?php echo URL::to('/user/show'); ?>"><button type="button" class="btn btn-primary active"><span class="fa fa-user" aria-hidden="true"></span> <?php echo Auth::user()->username; ?></button></a></li>
  						<li role="presentation"><a href="<?php echo URL::to('/misQuinielas'); ?>"><button type="button" class="btn btn-primary active"><span class="fa fa-gamepad" aria-hidden="true"></span> Mis Quinielas</button></a></li>
			
  						<li role="presentation">
							<a href="<?php echo URL::to('/showQuinielas'); ?>"><button type="button" class="btn btn-success">
			  				<span class="fa fa-arrow-left" aria-hidden="true" href="/showQuinielas"></span> Volver
							</button></a>
						</li>

						<li role="presentation">
							<a href="<?php echo URL::to('/logout'); ?>"><button type="button" class="btn btn-danger">
			  				<span class="fa fa-paper-plane-o" aria-hidden="true" href="/logout"></span> Salir
							</button></a>
						</li>

						</ul>
						<div class="row  col-md-offset-4" align = "center">
							<div class="logo" >
								<p><div class="panel panel-info" >
									<div class="panel-heading "><h4> Obtén tus Creditos para Jugar </h4>
									</div>
								</div></p>
							</div>
						</div>

		
		<div class="row well" align="center">
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

	


		<form name="form"  action="<?php echo e(action('UsertransaccionController@creditosTransaccion')); ?>" method="POST" >
			 <?php echo csrf_field(); ?>								

		<div class="row col-wrap">
		<div class="col-sm-8 col-md-offset-2">


		     <fieldset>
		 
		    <div class="panel panel-primary">
		    <div class="panel-heading" align="center"> <h4>Formulario de Pago  <span class="fa fa-money" aria-hidden="true"></h4></div>
		    <div class="panel-body">

			<div class="col-sm-4">	
			<br>	
			<?php echo Form::label('Banco Receptor'); ?>

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
				<?php echo Form::label('Transferencia o Deposito'); ?>

				<select class="form-control" name="tipo_transaccion">
					<option value="Transferencia">Transferencia</option>
					<option value="Deposito">Deposito</option>
					<option value="Cupon">Cupón</option>
				</select>
				</div>


				<div class="col-sm-4">

				<br>
				<?php echo Form::label('Últimos 4 Números de la Transaccion'); ?>

				<?php echo Form::text('cuantroUltimos',null,['class'=>'form-control','placeholder'=>'Ejm: 1234']); ?>

				</div>



				<div class="col-sm-4">
				<br>

				<?php echo Form::label('Monto(Bsf.):'); ?>

				<?php echo Form::text('monto',null,['class'=>'form-control','placeholder'=>'1.000']); ?>

				</div>

				<div class="col-sm-4">
				<br>


				<?php echo Form::label('Fecha'); ?>

				<?php echo Form::date('fecha',\Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control','placeholder'=>'Fecha']); ?>

				</div>
				
		
				<div class="col-sm-4">
				<br>

				<?php echo Form::label('Cuenta Banco Emisor'); ?>

				<?php echo Form::text('nro_cuenta',null,['class'=>'form-control','placeholder'=>'Ejm: 01341234567890122345']); ?>

				</div>

	

			
				<div class="col-sm-4 col-md-offset-4" align="center">
				<br>
				<input name="user_email" type="hidden" value="<?php echo e(Auth::user()->email); ?>" />
				<button class="btn btn-success" value="<?php echo e(csrf_token()); ?>"><h4>Enviar Pago</h4></button>
				</form>
				</div>

		</fieldset>
		</div></div></div></div>



	
			
	</div>

		
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>