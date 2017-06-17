	
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
							<a target="_blank" href="<?php echo e(asset('reglas.pdf')); ?>"><button type="button" class="btn btn-success">
			  				<span class="fa fa-archive" aria-hidden="true"></span> Reglas Quiniela
							</button></a>
						</li>

						
						<li role="presentation">
							<a target="_blank" href="<?php echo e(asset('http://es.uefa.com/uefaeuro/')); ?>"><button type="button" class="btn btn-success">
			  				<span class="fa fa-futbol-o" aria-hidden="true"></span> Sitio Oficial Euro2016
							</button></a>
						</li>

						<li role="presentation">
							<a target="_blank" href="<?php echo e(asset('calendario.pdf')); ?>"><button type="button" class="btn btn-info">
			  				<span class="fa fa-calendar" aria-hidden="true"></span> Calendario Euro2016
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
										<h4>Quinielas Torneo</h4>
									</div>
									</div>
								</p>
							</div>
						</div>

		

		<table class="table table-bordered">

			<thead >
				<tr align="center" class="info">
					<td ><strong>Nombre Quiniela</strong></td>
					<td ><strong>Fecha de Inicio</strong></td>
					<td class="info"><strong>Acumulado</strong></td>
					<td ><strong>Usuarios Inscritos</strong></td>
					<td ><strong>Número de Ganadores</strong></td>
					<td ><strong>Estado</strong></td>
					<td class="danger"><strong>Acción</strong></td>
					<td class="danger"><strong>2° Fase</strong></td>
				</tr>
			</thead>

				<?php  $username = Auth::user()->username?>
				
				<?php $contador = 0?>			
			
				<?php foreach($quinielas as $quiniela): ?>
					<?php if($quiniela->tipo_quiniela == "torneo"): ?>
						<?php $num_user = 0?>
						<?php $num_user = DB::table('user_quinielas')->where('id_quiniela','=', $quiniela->id_quiniela)
																	->where('status','=','Inscrito')->count()?>
						
						
						<tbody align="center" class="warning">
						<td class="warning" ><?php echo e($quiniela->nombre); ?></td>
						<td class="warning"><?php echo e($quiniela->fecha_inicio); ?></td>
						<td class="warning"><span class="badge"><?php echo e($quiniela->costo * $num_user * 0.7); ?> Bs.</span></td>
						<td class="warning"><?php echo e($num_user); ?></td>
						<td class="warning"><?php echo e($quiniela->ganadores); ?></td>
						<td class="warning"><?php echo e($quiniela->status); ?></td>
						
						<?php if($quiniela->status == "Inscrito"): ?>
							<?php $pronosticos = DB::table('pronosticos')->where('id_user',$quiniela->id)->count()?>

							<?php if($pronosticos == 0): ?>
								<td class="warning">
								<form name="form"  action="<?php echo e(action('PronosticoController@create')); ?>" method="GET" >
								<input name="9as8d9a8sd9as8d98asd8" type="hidden" id="a87sd8as7d8asd7a8sd" size="30" maxlength="10" value=<?php echo 'asd544sad5as5d4a6sd5&sd5a3242342342%$34326#d5asd???5a=s6da5sd5as=6d56a&s6a5sd56' ?>  />
								
								<input name="gknbgjn" type="hidden" id="gknbgjn" size="30" maxlength="10" value=<?php echo $quiniela->id_quiniela ?>  />
								<input name="aasdaf" type="hidden" id="aasdaf" size="30" maxlength="10" value=<?php echo $quiniela->id ?>  />		
								<button class="btn btn-success">Comienza</button>
								</form>
								</td>
							<?php elseif($pronosticos > 0): ?>
								<td class="warning">
								<form name="form"  action="<?php echo e(action('QuinielaController@verMiQuiniela')); ?>" method="GET" >
									<input name="id" type="hidden" id="id" size="30" maxlength="10" value=<?php echo $quiniela->id_quiniela?>
									/>		
								<button class="btn btn-info">Ver Ranking</button>
								
								</form>
								</td>								
							<?php endif; ?>




							<?php $pronos = DB::table('pronosticos')->where('id_user',$quiniela->id)->where('fase',2)->count()?>

							<?php if($pronos == 0): ?>	
								<td class="warning">
									<form name="form"  action="<?php echo e(action('EliminatoriaController@create')); ?>" method="GET" >
										<input name="id_uiniela" type="hidden" id="id_uiniela" size="30" maxlength="10" value="<?php echo e($quiniela->id_quiniela); ?>"/>	
										<input name="id_ser" type="hidden" id="id_ser" size="30" maxlength="10" value="<?php echo e($quiniela->id); ?>"/>	
										<button class="btn btn-success" >Jugar</button>						
									</form>
								</td>
							<?php elseif($pronos > 0): ?>	
								<td class="warning">
									<form name="form"  action="<?php echo e(action('EliminatoriaController@create')); ?>" method="GET" >
										<input name="id_uiniela" type="hidden" id="id_uiniela" size="30" maxlength="10" value="<?php echo e($quiniela->id_quiniela); ?>"/>	
										<input name="id_ser" type="hidden" id="id_ser" size="30" maxlength="10" value="<?php echo e($quiniela->id); ?>"/>	
										<button class="btn btn-success" disabled="true">Jugar</button>						
									</form>
								</td>

							<?php endif; ?>
							
						<?php endif; ?>

						<?php if($quiniela->status != "Inscrito"): ?>
							<td class="warning"><button class="btn btn-warning">Esperando confirmación</button></td>
						<?php endif; ?>


						</tbody>
						<?php $num_user = 0?>
						<?php $contador++?>
					<?php endif; ?>
				<?php endforeach; ?>
		</table>

		<table class="table table-bordered">


			<div class="col-md-offset-4" align = "center">
				<div class="logo" >
					<p><div class="panel panel-info" >
						<div class="panel-heading ">
							<h4>Quinielas Semanales</h4>
						</div>
					</div></p>
				</div>
			</div>

			<thead >
			<tr align="center" class="info">
				<td ><strong>Nombre Quiniela</strong></td>
				<td ><strong>Fecha de Inicio</strong></td>
				<td class="info"><strong>Acumulado</strong></td>
				<td ><strong>Usuarios Inscritos</strong></td>
				<td ><strong>Número de Ganadores</strong></td>
				<td ><strong>Estado</strong></td>
				<td class="danger"><strong>Acción</strong></td>
			</tr>
			</thead>
			<?php  $username = Auth::user()->username?>
			
			<?php $contador = 0?>			
		
			<?php foreach($quinielas as $quiniela): ?>
				<?php if($quiniela->tipo_quiniela == "liga"): ?>
					<?php $num_user = 0?>
					<?php $num_user = DB::table('user_quinielas')->where('id_quiniela','=', $quiniela->id_quiniela)
																->where('status','=','Inscrito')->count()?>
					
					
					<tbody align="center" class="warning">
					<td class="warning" ><?php echo e($quiniela->nombre); ?></td>
					<td class="warning"><?php echo e($quiniela->fecha_inicio); ?></td>
					<td class="warning"><span class="badge"><?php echo e($quiniela->costo * $num_user * 0.7); ?> Bs.</span></td>
					<td class="warning"><?php echo e($num_user); ?></td>
					<td class="warning"><?php echo e($quiniela->ganadores); ?></td>
					<td class="warning"><?php echo e($quiniela->status); ?></td>
					
					<?php if($quiniela->status == "Inscrito"): ?>
						<?php $pronosticos = DB::table('pronosticos')->where('id_user',$quiniela->id)->count()?>

						<?php if($pronosticos == 0): ?>
							<td class="warning">
							<form name="form"  action="PronosticoNuevaQuiniela" method="POST" >
							<?php echo csrf_field(); ?>

							
							<input name="id_quiniela" type="hidden"  size="30" maxlength="10" value="<?php echo e($quiniela->id_quiniela); ?>"/>
							<input name="id_user" type="hidden"  size="30" maxlength="10" value="<?php echo e($quiniela->id); ?>"/>		
							<button class="btn btn-success"value="<?php echo e(csrf_token()); ?>">Jugar</button>
							</form>
							</td>
						<?php elseif($pronosticos > 0): ?>
							<td class="warning">
							<form name="form"  action="verMiQuinielaNuevo" method="POST" >
								<?php echo csrf_field(); ?>

								<input name="id_user" type="hidden"  size="30" maxlength="10" value=<?php echo e($quiniela->id); ?>  />	
								<input name="id_quiniela" type="hidden" id="id" size="30" maxlength="10" value=<?php echo e($quiniela->id_quiniela); ?>	/>		
							<button class="btn btn-info" value="<?php echo e(csrf_token()); ?>">Ver Ranking</button>
							
							</form>
							</td>
						<?php endif; ?>


						
						
					<?php endif; ?>

					<?php if($quiniela->status != "Inscrito"): ?>
						<td class="warning"><button class="btn btn-warning">Esperando confirmación</button></td>
					<?php endif; ?>


					</tbody>
					<?php $num_user = 0?>
					<?php $contador++?>
				<?php endif; ?>
			<?php endforeach; ?>
		</table>

				



	
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>