	
	<?php $__env->startSection('content'); ?>
				
	<style>
		img {
		    display: inline-block;
		}
	</style>


	<div class="header">
	<div class="top-header">
						
		<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<ul class="nav nav-pills" role="tablist">
  			<li role="presentation"><a href="<?php echo URL::to('/showQuinielas'); ?>"><button type="button" class="btn btn-primary active" ><span class="fa fa-check-square" aria-hidden="true"></span> Quinielas Disponibles</button></a></li>
  			<li role="presentation"><a href="<?php echo URL::to('/user/show'); ?>"><button type="button" class="btn btn-primary active"><span class="fa fa-user" aria-hidden="true"></span> <?php echo Auth::user()->username; ?></button></a></li>
  			<li role="presentation"><a href="<?php echo URL::to('/misQuinielas'); ?>"><button type="button" class="btn btn-primary active"><span class="fa fa-gamepad" aria-hidden="true"></span> Mis Quinielas</button></a></li>
			
			<li role="presentation">
					<a target="_blank" href="<?php echo e(asset('reglas.pdf')); ?>"><button type="button" class="btn btn-success">
			  		<span class="fa fa-archive" aria-hidden="true"></span> Reglas Quiniela
					</button></a>
			</li>


			<li role="presentation">
					<a href="/getCreditos"><button type="button" class="btn btn-warning">
			  		<span class="glyphicon glyphicon-star" aria-hidden="true" href="/logout"></span> Obtener Creditos
					</button></a>
			</li>

			<li role="presentation">
				<a href="<?php echo URL::to('/misQuinielas'); ?>"><button type="button" class="btn btn-success">
  				<span class="fa fa-arrow-left" aria-hidden="true" href="/misQuinielas"></span> Volver
				</button></a>
			</li>

			<li role="presentation">
				<a href="<?php echo URL::to('/logout'); ?>"><button type="button" class="btn btn-danger">
  				<span class="fa fa-paper-plane-o" aria-hidden="true" href="/logout"></span> Salir
				</button></a>
			</li>

		</ul>

		<div class="col-md-offset-4" align = "center">
							<div class="logo" >
								<p><div class="panel panel-info" >
									<div class="panel-heading "><h4>Llena Tu Quiniela, Suerte</h4>
									</div>
								</div></p>
							</div>
						</div>

		<br><br><br><br><br>
	
 
    <fieldset>

    <legend><div class="well well-sm" align="center"> Ingrese Su Pronóstico </div></legend>

	


	<?php $count = 0 ?>

	<div class="row col-wrap">
		
	<form action="pronostico_user_nuevo" method="POST">
		 <?php echo csrf_field(); ?>

		<div class="col-sm-6 col-md-offset-3" >
		<div class="panel panel-info" >
		<div class="panel-heading" align="center"> <b>Partidos</b> </div>
		<div class="panel-body" >






			<?php foreach($partidos as $partido): ?>
			<input name="id_partido_<?php echo $count ?>" type="hidden" id="id_partido_<?php echo e($count); ?>" value="<?php echo e($partido->id_partido); ?>" />
			<div class="row" align="center">
				<br>
				<div class="col-md-1"> <img class="img-responsive" src="../images/<?php echo e($partido->id_local); ?>.png"></div>
  				<div class="col-md-2"> <div align="center"><input name="equipo_local_<?php echo e($count); ?>" type="hidden"  value="<?php echo e($partido->nom_local); ?>" /><label><?php echo e($partido->id_local); ?></label></div> </div>
  				<div class="col-md-1"> <input name="goles_local_<?php echo e($count); ?>"  type="text" id="goles_local_<?php echo e($count); ?>"  size="2" maxlength="2" /> </div>
  				<div class="col-md-1"> <label>VS</label></div>
  				<div class="col-md-1"> <input name="goles_visitante_<?php echo e($count); ?>"  type="text" id="goles_visitante_<?php echo e($count); ?>"  size="2" maxlength="2" /> </div>
  				<div class="col-md-2"> <div align="center"><input name="equipo_visitante_<?php echo e($count); ?>" type="hidden"  value="<?php echo e($partido->nom_visitante); ?>" /><label><?php echo e($partido->id_visitante); ?></label></div> </div>
  				<div class="col-md-1"> <img class="img-responsive" src="../images/<?php echo e($partido->id_visitante); ?>.png"></div>
  				<div class="col-md-2"> <div align="center"><label >Fecha: <?php echo e($partido->fecha); ?></label></div> </div>
			</div>
			<input name="id_partido_<?php echo e($count); ?>" type="hidden" id="id_partido_<?php echo e($count); ?>" value="<?php echo e($partido->id_partido); ?>" />
			<?php $count++; ?>
		
			<?php endforeach; ?>
		</div>
		</fieldset>
		


		<input name="id_user" type="hidden" id="id_user" value="<?php echo e($id_user); ?>" />

		<input name="id_quiniela" type="hidden" id="id_quiniela" value="<?php echo e($id_quiniela); ?>" />

		<br>

		<div class="row" align="center">
			<button class="btn btn-success" value="<?php echo e(csrf_token()); ?>"><h4>Jugar</h4></button>
			<br><br>
		</div>
		

		
		</form>
	

		

	</div>
	</div>			

	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>