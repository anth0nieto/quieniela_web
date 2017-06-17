	
	<?php $__env->startSection('content'); ?>
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
  						<li role="presentation"><a href="<?php echo URL::to('/showQuinielas'); ?>">Quinielas Disponibles<span class="badge"></span></a></li>
  						<li role="presentation"><a href="<?php echo URL::to('/user/show'); ?>"><?php echo Auth::user()->username; ?></a></li>
  						<li role="presentation"><a href="<?php echo URL::to('/misQuinielas'); ?>">Mis Quinielas<span class="badge"></span></a></li><li role="presentation">
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
									<div class="panel-heading "><h4> Cobra tus Creditos </h4>
									</div>
								</div></p>
							</div>
						</div>


		<form name="form"  action="<?php echo e(action('UsertransaccionController@pagosTransaccion')); ?>" method="POST" >
			 <?php echo csrf_field(); ?>								

		<div class="row col-wrap">
		<div class="col-sm-8 col-md-offset-2">

				<div class="row  col-md-offset-4" >
						<div class="logo" >
								<p>
									<div class="panel panel-success" >
										<div class="panel-heading "><h4>Creditos Disponibles: <?php echo e($usuario->creditoDisponible); ?> Bsf. </h4></div>
									</div>
								</p>
						</div>
				</div>

				<div class="row  col-md-offset-4" align = "center" >
						<div class="logo" id="errorCont">
								<p>
									<div class="panel panel-danger" >
										<div class="panel-heading "><h4 id="exceso"></h4></div>
									</div>
								</p>
						</div>
				</div>


		     <fieldset>
		 
		    <div class="panel panel-primary">
		    <div class="panel-heading" align="center"> <h4>Formulario de Pago  <span class="fa fa-money" aria-hidden="true"></h4></div>
		    <div class="panel-body">

			<div class="row" align="center">
				<div class="col-md-8 col-md-offset-2">	
					<?php echo Form::label('Nombre Completo Propietario Cuenta Bancaria'); ?>

					<?php echo Form::text('nombre_usuario',null,['class'=>'form-control','placeholder'=>'Mi Nombre']); ?>

				</div>
			</div>

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
				<?php echo Form::label('C.I. Propietario Cuenta Bancaria '); ?>

				<?php echo Form::text('cedula',null,['class'=>'form-control','placeholder'=>'V-00000000']); ?>

				
				</div>


				<div class="col-sm-4">

				<br>
				<?php echo Form::label('Numero de Cuenta'); ?>

				<?php echo Form::text('nroCuenta',null,['class'=>'form-control','placeholder'=>'Ej: 01341234567890122345']); ?>

				</div>



				<div class="col-sm-4">
				<br>

				<?php echo Form::label('Monto(Bsf.):'); ?>

				<input class="form-control" type="text" id="monto" name="monto" placeholder="1000">
				</div>

				<div class="col-sm-4">
				<br>


				<?php echo Form::label('Fecha'); ?>

				<?php echo Form::date('fecha',\Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control','placeholder'=>'Fecha']); ?>

				</div>
				
		
				<div class="col-sm-4">
				<br>

				<?php echo Form::label('Correo Electronico'); ?>

				<input class="form-control" type="text" name="email" value="<?php echo e($email); ?>">
				</div>

				<div class="col-sm-4 col-md-offset-4" align="center">
				<br>
					<input name="user_id_nombre" type="hidden" id="user_id_nombre"  value="<?php echo Auth::user()->username; ?>" />

					<input name="montoMax" type="hidden" id="montoMax"  value="<?php echo e($usuario->creditoDisponible); ?>" />
				            
				<button class="btn btn-success" value="<?php echo e(csrf_token()); ?>" id="Pago"><h4>Solicitar Pago</h4></button>
			</form>
			</div>

		</fieldset>
		</div></div></div></div>

	</div>


		
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>