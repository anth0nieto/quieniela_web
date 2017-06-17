	
	<?php $__env->startSection('content'); ?>			


					<div class="container" >		
					
						<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</div>
						
						<?php $user = DB::table('users')->join('personas','personas.email','=','users.email')
						 								->where('users.email','=', Auth::user()->email)
														->select('personas.creditoDisponible')
														->get()?>

					
						<div class="col-md-12 " align = "center">
						<div class="panel panel-info" style=" border-color:#5cb85c;">
						<div class="panel-heading " style="background-color:#5cb85c; border-color:#5cb85c;"><h4 style="color:#fff"><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="5">Quinielas Torneo</font></h4></div>
						<div class="panel-body" style="padding:0px;" >
						



		<div class="col-md-12" align = "center" style="padding-right: 0px; padding-left: 0px;">
		<div class="table-responsive" style="width:100%">

		<table class="table table-bordered" style="margin-bottom: 0px;">

			<thead >
				<tr align="center" class="info">
					<td style="vertical-align:middle"><strong>Nombre Quiniela</strong></td>
					<td style="vertical-align:middle"><strong>Fecha de Inicio</strong></td>
					<td style="vertical-align:middle" class="info"><strong>Acumulado</strong></td>
					<td style="vertical-align:middle"><strong>Usuarios Inscritos</strong></td>
					<td style="vertical-align:middle"><strong>Número de Ganadores</strong></td>
					<td style="vertical-align:middle"><strong>Estado</strong></td>
					<td style="vertical-align:middle" class="danger"><strong>Acción</strong></td>
					<td style="vertical-align:middle" class="danger"><strong>2° Fase</strong></td>
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
						<td style="vertical-align:middle" class="warning" ><?php echo e($quiniela->nombre); ?></td>
						<td style="vertical-align:middle" class="warning"></td>
						<td style="vertical-align:middle" class="warning"><span class="badge" style="background-color:#428bca;"><?php echo e($quiniela->costo * $num_user * 0.7); ?> Bs.</span></td>
						<td style="vertical-align:middle" class="warning"><?php echo e($num_user); ?></td>
						<td style="vertical-align:middle" class="warning"><?php echo e($quiniela->ganadores); ?></td>
						<td style="vertical-align:middle" class="warning"><?php echo e($quiniela->status); ?></td>
						
						<?php if($quiniela->status == "Inscrito"): ?>
							<?php $pronosticos = DB::table('pronosticos')->where('id_user',$quiniela->id)->count()?>

							<?php if($pronosticos == 0): ?>
								<td style="vertical-align:middle" class="warning">
								<form name="form"  action="<?php echo e(action('PronosticoController@create')); ?>" method="GET" >
								<input name="9as8d9a8sd9as8d98asd8" type="hidden" id="a87sd8as7d8asd7a8sd" size="30" maxlength="10" value=<?php echo 'asd544sad5as5d4a6sd5&sd5a3242342342%$34326#d5asd???5a=s6da5sd5as=6d56a&s6a5sd56' ?>  />
								
								<input name="gknbgjn" type="hidden" id="gknbgjn" size="30" maxlength="10" value=<?php echo $quiniela->id_quiniela ?>  />
								<input name="aasdaf" type="hidden" id="aasdaf" size="30" maxlength="10" value=<?php echo $quiniela->id ?>  />		
								<button class="btn btn-info">Comienza</button>
								</form>
								</td>
							<?php elseif($pronosticos > 0): ?>
								<td class="warning">

									<?php echo link_to_route('user.index', $title = 'Ganadores', $parameters = null, $attributes = ['class'=>'btn btn-info']); ?>

								<!-- <form name="form"  action="<?php echo e(action('QuinielaController@verMiQuiniela')); ?>" method="GET" >
									<input name="id" type="hidden" id="id" size="30" maxlength="10" value=<?php echo $quiniela->id_quiniela?>
									/>		
								<button class="btn btn-info">Ver Ranking</button>
								 -->
								</form>
								</td>								
							<?php endif; ?>




							<?php $pronos = DB::table('pronosticos')->where('id_user',$quiniela->id)->where('fase',2)->count()?>

							<?php if($pronos == 0): ?>	
								<td style="vertical-align:middle" class="warning">
									<form name="form"  action="<?php echo e(action('EliminatoriaController@create')); ?>" method="GET" >
										<input name="id_uiniela" type="hidden" id="id_uiniela" size="30" maxlength="10" value="<?php echo e($quiniela->id_quiniela); ?>"/>	
										<input name="id_ser" type="hidden" id="id_ser" size="30" maxlength="10" value="<?php echo e($quiniela->id); ?>"/>	
										<button class="btn btn-info" >Jugar</button>						
									</form>
								</td>
							<?php elseif($pronos > 0): ?>	
								


								<td style="vertical-align:middle" class="warning">
									<form name="form"  action="<?php echo e(action('EliminatoriaController@create')); ?>" method="GET" >
										<input name="id_uiniela" type="hidden" id="id_uiniela" size="30" maxlength="10" value="<?php echo e($quiniela->id_quiniela); ?>"/>	
										<input name="id_ser" type="hidden" id="id_ser" size="30" maxlength="10" value="<?php echo e($quiniela->id); ?>"/>	
										<button class="btn btn-info" disabled="true">Jugar</button>						
									</form>
								</td>

							<?php endif; ?>
							
						<?php endif; ?>

						<?php if($quiniela->status != "Inscrito"): ?>
							<td style="vertical-align:middle" class="warning"><button class="btn btn-warning">Esperando confirmación</button></td>
						<?php endif; ?>


						</tbody>
						<?php $num_user = 0?>
						<?php $contador++?>
					<?php endif; ?>
				<?php endforeach; ?>
		</table>

		</div>
		</div>

		</div>
		</div>
		</div>

	<div class="col-md-12 " align = "center">
	<div class="panel panel-info" style="border-color:#5cb85c;" >
	<div class="panel-heading " style="background-color:#5cb85c;"><h4 style="color:#fff;"><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="5">Quinielas Semanales</font></h4></div>
	<div class="panel-body" style="padding:0px;">
	

	<div class="col-md-12" align = "center" style="padding-right: 0px; padding-left: 0px;">
	<div class="table-responsive" style="width:100%">

		<table class="table table-bordered" style="margin-bottom: 0px;">

			<thead >
			<tr align="center" class="info">
				<td style="vertical-align:middle"><strong>Nombre Quiniela</strong></td>
				<td style="vertical-align:middle"><strong>Fecha de Inicio</strong></td>
				<td style="vertical-align:middle" class="info"><strong>Acumulado</strong></td>
				<td style="vertical-align:middle"><strong>Usuarios Inscritos</strong></td>
				<td style="vertical-align:middle"><strong>Número de Ganadores</strong></td>
				<td style="vertical-align:middle"><strong>Estado</strong></td>
				<td style="vertical-align:middle" class="danger"><strong>Acción</strong></td>
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
					<td style="vertical-align:middle" class="warning" ><?php echo e($quiniela->nombre); ?></td>
					<td style="vertical-align:middle" style="vertical-align:middle" class="warning"></td>
					<td style="vertical-align:middle" class="warning"><span class="badge" style="background-color:#428bca;"><?php echo e($quiniela->costo * $num_user * 0.7); ?> Bs.</span></td>
					<td style="vertical-align:middle" class="warning"><?php echo e($num_user); ?></td>
					<td style="vertical-align:middle" class="warning"><?php echo e($quiniela->ganadores); ?></td>
					<td style="vertical-align:middle" class="warning"><?php echo e($quiniela->status); ?></td>
					
					<?php if($quiniela->status == "Inscrito"): ?>
						<?php $pronosticos = DB::table('pronosticos')->where('id_user',$quiniela->id)->count()?>

						<?php if($pronosticos == 0): ?>
							<td style="vertical-align:middle" class="warning">
							<form name="form"  action="PronosticoNuevaQuiniela" method="POST" >
							<?php echo csrf_field(); ?>

							
							<input name="id_quiniela" type="hidden"  size="30" maxlength="10" value="<?php echo e($quiniela->id_quiniela); ?>"/>
							<input name="id_user" type="hidden"  size="30" maxlength="10" value="<?php echo e($quiniela->id); ?>"/>		
							<button class="btn btn-info"value="<?php echo e(csrf_token()); ?>">Jugar</button>
							</form>
							</td>
						<?php elseif($pronosticos > 0): ?>
							<td style="vertical-align:middle" class="warning">
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
						<td style="vertical-align:middle" class="warning"><button class="btn btn-warning">Esperando confirmación</button></td>
					<?php endif; ?>


					</tbody>
					<?php $num_user = 0?>
					<?php $contador++?>
				<?php endif; ?>
			<?php endforeach; ?>
		</table>

		</div>
		</div>

		</div>
		</div>
		</div>
				



	
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>