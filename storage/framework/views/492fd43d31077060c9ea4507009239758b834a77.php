	
	<?php $__env->startSection('content'); ?>
				
	<div class="header">
	<div class="top-header">
		<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<ul class="nav nav-pills" role="tablist">
  			<li role="presentation"><a href="<?php echo URL::to('/showQuinielas'); ?>"><button type="button" class="btn btn-primary"><span class="fa fa-check-square" aria-hidden="true"></span> Quinielas Disponibles</button></a></li>
  						<li role="presentation"><a href="<?php echo URL::to('/user/show'); ?>"><button type="button" class="btn btn-primary"><span class="fa fa-user" aria-hidden="true"></span> <?php echo Auth::user()->username; ?></button></a></li>
  						<li role="presentation"><a href="<?php echo URL::to('/misQuinielas'); ?>"><button type="button" class="btn btn-primary"><span class="fa fa-gamepad" aria-hidden="true"></span> Mis Quinielas</button></a></li>
  			
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


	<br>
	<div class="col-md-offset-4" align = "center">
		<div class="logo" >
			<p>
				<div class="panel panel-info" >
					<div class="panel-heading ">
						<h4>Mi Cuenta</h4>
					</div>
				</div>
			</p>
		</div>
	</div>
	

		<table class="table">
		
			<br><br><br>
			<br><br><br>
				<div class="row col-wrap">
				<div class="col-sm-6 col-md-offset-3">

				     <fieldset>
				 
				    <div class="panel panel-primary">
				    <div class="panel-heading" align="center"> <h4>Datos Personales</h4></div>
				    <div class="panel-body">
				 

				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
				          	<label align="center">Nombre:</label>
				        </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"> <font face="courier" color=" #154360 " size="3"><?php echo e($usuario[0]->nombre); ?></font></label>
				        </div>
				        


				         <div class="col-sm-4 col-md-offset-2">
				       		<br>
				          	<label align="center">Apellido:</label>
				        </div>
				        <div class="col-sm-6">
				        	<br>
				             <label align="center"><font face="courier" color=" #154360 " size="3"><?php echo e($usuario[0]->apellido); ?></font></label>
				        </div>


				         <div class="col-sm-4 col-md-offset-2">
				       		<br>
					        <label align="center">Username:</label>
				        </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font face="courier" color=" #154360 " size="3"><?php echo e($usuario[0]->username); ?></font></label>
				        </div>
									       

				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					        <label align="center">Cedula:</label>
				        </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font face="courier" color=" #154360 " size="3"><?php echo e($usuario[0]->cedula); ?></font></label>
				        </div>


				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					    	<label align="center">Correo Electronico:</label>
				        </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font face="courier" color=" #154360 " size="3"><?php echo e($usuario[0]->email); ?></font></label>
				        </div>
				    
				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
				       		<label align="center">Teléfono:</label>
					        
				        </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font face="courier" color="#154360 " size="3"><?php echo e($usuario[0]->telefono); ?></font></label>
				        </div>


				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					        <label align="center">Fecha Nacimiento:</label>
					        
				        </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font face="courier" color=" #154360 " size="3"><?php echo e($usuario[0]->fecha_nacimiento); ?></font></label>
				        </div>

				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					        <label align="center">Ubicación:</label>
					    </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font face="courier" color=" #154360 " size="3"><?php echo e($usuario[0]->ubicacion); ?></font></label>
				        </div>
		
				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					       	<label align="center">Cliente desde:</label>	
					    </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font face="courier" color="#b03a2e" size="3"><?php echo e($usuario[0]->created_at); ?></font></label>
				        </div>

				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					       	<label align="center">Creditos Disponibles:</label>	
					    </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font face="courier" color="#1b5e20" size="4"><?php echo e($usuario[0]->creditoDisponible); ?> Bsf.</font></label>
				            <form action="/getPago" method="POST" style="POSITION: absolute">
				            	<?php echo csrf_field(); ?>	
				            	<input name="user_email" type="hidden" id="id_quiniela"  value="<?php echo e($usuario[0]->email); ?>" />
				            <button class="btn btn-success" value="<?php echo e(csrf_token()); ?>">Cobrar Creditos</button>
				        </div>
				        <div class="col-sm-4 col-md-offset-2">
				       		<br>
					       	<label align="center">Creditos Pendientes:</label>	
					    </div>
				        <div class="col-sm-6">
				        	<br>
				            <label align="center"><font face="courier" color="#e65100" size="4"><?php echo e($micredito); ?> Bsf.</font></label>
				        </div>

						<div class="col-md-4 col-md-offset-2">
				       		<br>
					       	<label align="center">Pago en Proceso:</label>	
					    </div>
				        <div class="col-md-6">
				        	<br>
				            <label align="center"><font face="courier" color="#154360" size="4"><?php echo e($mipago); ?> Bsf.</font></label>
				        </div>
				        

				       
				    </div>
				    </div>

				    </fieldset>
				 
				  
				</div>
				</div>
				</div>
				
		</table>
		



	</div>
	</div>
	
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>