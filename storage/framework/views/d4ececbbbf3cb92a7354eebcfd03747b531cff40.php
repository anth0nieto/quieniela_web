	
	<?php $__env->startSection('content'); ?>
				
				<div class="header">
					<div class="top-header">
						<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<ul class="nav nav-pills" role="tablist">
  						
  						<li role="presentation"><a href="<?php echo URL::to('/showQuinielas'); ?>"><button type="button" class="btn btn-primary active"><span class="fa fa-check-square" aria-hidden="true"></span> Quinielas Disponibles</button></a></li>
  						<li role="presentation"><a href="<?php echo URL::to('/user/show'); ?>"><button type="button" class="btn btn-primary active"><span class="fa fa-user" aria-hidden="true"></span> <?php echo Auth::user()->username; ?></button></a></li>
  						<li role="presentation"><a href="<?php echo URL::to('/misQuinielas'); ?>"><button type="button" class="btn btn-primary active"><span class="fa fa-gamepad" aria-hidden="true"></span> Mis Quinielas</button></a></li>
			
  						<li role="presentation">
							<a target="_blank" href="<?php echo e(asset('reglas.pdf')); ?>"><button type="button" class="btn btn-success">
			  				<span class="fa fa-archive" aria-hidden="true"></span> Reglas Euro 2016
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
						<br>

						<div class="col-md-offset-4" align = "center">
							<div class="logo" >
								<p><div class="panel panel-info" >
									<div class="panel-heading ">
										<h4>Tabla de posiciones de la <?php echo e($quiniela[0]->nombre); ?></h4>
									</div>
									</div>
								</p>
							</div>
						</div>

		

		<table class="table" >
			<thead >
				<tr align="center" class="info">
				<td class="info"><strong>N° </strong></td>
				<td class="info"><strong>Nombre Usuario</strong></td>
				<td class="info"><strong>Puntos Totales</strong></td>
				<td class="info"><strong>Aciertos de Ganadores</strong></td>
				<td class="info"><strong>Aciertos de Resultados</strong></td>
				</tr>
		    </thead>
			
			<tbody>	
			<?php for($i = 0; $i < count($ranking); $i++): ?>
			    <td class="info" align="center"><h4><?php echo e($i+1); ?></h4></td>
			    <td class="info" align="center"><a href="/verPerfilLiga?id_user=<?php echo e($ranking[$i][1]); ?>"><button type="button" class="btn btn-success btn-lg btn-block"><?php echo e($ranking[$i][0]); ?></button></a></td>
				<td class="info" align="center"><h4><?php echo e($ranking[$i][2]); ?></h4></td>
				<td class="warning" align="center"><h4><?php echo e($ranking[$i][3]); ?></h4></td>
				<td class="warning" align="center"><h4><?php echo e($ranking[$i][4]); ?></h4></td>
			</tbody>
			<?php endfor; ?>
		</table>

		
		
		</div>
			
		</div>

		
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>