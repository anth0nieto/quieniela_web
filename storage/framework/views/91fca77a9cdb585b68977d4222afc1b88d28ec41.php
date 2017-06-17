	
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
  						
  						

						<li>
							<a>	
							<div align = "center">
								<form name="form"  action="<?php echo e(action('UserController@miJugadaPDF')); ?>" method="GET" >
									<input name="id_user" type="hidden" id="id_user" size="30" maxlength="10" value="<?php echo e($id_user); ?>"  />
									<button class="btn btn-primary"> <span class="fa fa-download" aria-hidden="true"></span> Descargar PDF</button>
								</form>	
							</div>
							</a>
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
							<br>
							<div class="col-md-offset-4" align = "center">
							<div class="logo" >
								<p><div class="panel panel-info" >
									<div class="panel-heading ">
										<h4>Verifica Tus Resultados</h4>
									</div>
									</div>
								</p>
							</div>
						</div>
						<br><br><br><br><br>


	   	<fieldset>
	   	<legend > <div class="well well-sm" align="center"> Resultados de la Quiniela </div></legend>

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"><b>Resultados de la <?php echo e($user_name[0]->username); ?><b> </div>
		<div class="panel-body">
			<table class="table">
				<thead >
					<th class="info">Equipo local</th>
					<th class="info">Goles local</th>
					<th class="info">Goles visitante</th>
					<th class="info">Equipo visitante</th>
				</thead>

				<?php $count = 0?>
				<?php if(!empty($jugadas)): ?>
				<?php foreach($jugadas as $jugada): ?>
				<tbody align="center">
						<td class="success"><?php echo e($jugada->id_local); ?></td>
						<td class="warning"><?php echo e($jugada->goles_local); ?></td>
						<td class="warning"><?php echo e($jugada->goles_visitante); ?></td>
						<td class="success"><?php echo e($jugada->id_visitante); ?></td>
				</tbody>
				<?php $count++?>	
				<?php endforeach; ?>
				<?php endif; ?>
			</table>

		</div>
		</div>
		</div>			

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"><b>Resultados de la <?php echo e($quiniela->nombre); ?><b> </div>
		<div class="panel-body">
			<table class="table">
				<thead >
					<th class="info">Equipo local</th>
					<th class="info">Goles local</th>
					<th class="info">Goles visitante</th>
					<th class="info">Equipo visitante</th>
				</thead>

				<?php $count = 0?>
				<?php if(!empty($resultados)): ?>
				<?php foreach($resultados as $resultado): ?>
				<tbody align="center">
					<td class="success"><?php echo e($resultado_local[$count][0]->nombre); ?></td>
					<td class="warning"><?php echo e($resultado->goles_local); ?></td>
					<td class="warning"><?php echo e($resultado->goles_visitante); ?></td>
					<td class="success"><?php echo e($resultado_visitante[$count][0]->nombre); ?></td>
				</tbody>
				<?php $count++?>	
				<?php endforeach; ?>
				<?php endif; ?>
			</table>

		</div>
		</div>
		</div>

		</fieldset>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>