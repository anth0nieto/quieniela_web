	


	<?php $__env->startSection('content'); ?>

		
				
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
										<h4>Quinielas Disponibles, Juega y Diviertete</h4>

									</div>
									</div>
								</p>
							</div>
						</div>

		

		<table class="table" >
		<thead>
		<tr align="center" class="info">
			<td class="info"><strong>Nombre de la Quiniela</strong></td>
			<td class="info"><strong>Costo</strong></td>
			<td class="info"><strong>Acumulado</strong></td>
			
			<td class="info"><strong>F. Inicio</strong></td>
			<td class="info"><strong>Acción</strong></td>
			</tr>
		</thead>

		
		<?php $hoy = date("Y-m-d");?>
		<?php $id_quiniela = 1?>
		<?php foreach($quinielas as $quiniela): ?>
		
			<?php $num_user = 0?>
			<?php $num_user = DB::table('user_quinielas')->where('id_quiniela','=', $quiniela->id)
															->where('status','=','Inscrito')
															->count()?>

				<?php 
					$disponible = '';
					if ($hoy > $quiniela->fecha_inicio) 
					{
						$disponible = 'disabled';
					} ?>

				<form name="form"  action="<?php echo e(action('QuinielaController@inscripcion')); ?>" method="POST" >
				 <?php echo csrf_field(); ?>								


				<tbody align="center">
				<td class="warning"> 
					<!-- Trigger the modal with a button -->
 					 <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#<?php echo e($id_quiniela); ?>"><?php echo e($quiniela->nombre); ?></button>
 				</td>
				<!-- AQUI SE MOSTRARA LA LISTA DE PARTIDOS POR QUINIELA -->
				
				<!-- Modal -->
				  <div class="modal fade" id="<?php echo e($id_quiniela); ?>" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content LISTA DE PARTIDOS-->
				     <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h3 class="modal-title" align="center"><strong>Lista de Partidos - <?php echo e($quiniela->nombre); ?></strong></h3>
				        </div>
				        <div class="modal-body">
					        <div align="center">

					        	<?php $lista_partidos = DB::table('partidos')
					        								->where('partidos.id_quiniela','=', $quiniela->id)
                                                            ->select('partidos.*')
                                                            ->get();

                                  ?>

						        <ul class="list-unstyled" >
						        <?php $i=0 ?>
						      	<?php foreach($lista_partidos as $partidos): ?>
								  <li align="center"> 
								  	<div class="row">
								  		<div class="col-md-3"><img class="img-responsive" src="../images/<?php echo e($partidos->id_local); ?>.png"></div>
								  		<div class="col-md-6"><h4><?php echo e($partidos->nom_local); ?> - <?php echo e($partidos->nom_visitante); ?> <P> <?php echo e($partidos->fecha); ?></h4></div>
								  		<div class="col-md-3"><img class="img-responsive" src="../images/<?php echo e($partidos->id_visitante); ?>.png"></div>
								  	</div>
								  </li><br>
								<?php $i++ ?>
								<?php endforeach; ?>
								</ul>
							</div>
				        </div>
				        <div class="modal-footer">
				        <div class="row">
					        <div class="col-xs-6" align="left">
						        <button class="btn btn-success" value="<?php echo e(csrf_token()); ?>" <?php echo e($disponible); ?> aling="left">Inscribir</button>
						    </div>
						    <div class="col-xs-6" align="rigth">
						        <button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
						     </div> 
				        </div>
				        </div>
				      </div>
				  </div>
				</div>	

				    
				<?php $id_quiniela ++?>

				<td class="warning"><?php echo e($quiniela->costo); ?></td>
				<td class="warning"><span class="badge"><?php echo e($quiniela->costo * $num_user * 0.7); ?> Bs.</span></td>
								

				<td class="warning"><?php echo e($quiniela->fecha_inicio); ?></td>
				<input name="user_nombre" type="hidden" id="user_nombre"  value="<?php echo Auth::user()->username; ?>" />
				<input name="quiniela_id" type="hidden" id="quiniela_id"  value="<?php echo e($quiniela->id); ?>" />
				<input name="quiniela_costo" type="hidden" id="quiniela_costo"  value="<?php echo e($quiniela->costo); ?>" />
				
				<td class="warning">
					<button type="button" class="btn btn-success " data-toggle="modal" <?php echo e($disponible); ?> data-target="#<?php echo e($id_quiniela); ?>">Inscribir</button>
				</td>

				  <!-- Modal content ACEPTR INSCRIPCION-->
				   <div class="modal fade" id="<?php echo e($id_quiniela); ?>" role="dialog">
				    <div class="modal-dialog">
				     <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h3 class="modal-title" align="center"><strong>¿ Desea Inscribir - <?php echo e($quiniela->nombre); ?> ?</strong></h3>
				        </div>
				        <div class="modal-body">
					        <div align="center">
					        	<?php $lista_partidos = DB::table('partidos')
					        								->where('partidos.id_quiniela','=', $quiniela->id)
                                                            ->select('partidos.*')
                                                            ->get();

                                  ?>

						        <ul class="list-unstyled" >
						        <?php $i=0 ?>
						      	<?php foreach($lista_partidos as $partidos): ?>
								  <li align="center"> 
								  	<div class="row">
								  		<div class="col-md-3"><img class="img-responsive" src="../images/<?php echo e($partidos->id_local); ?>.png"></div>
								  		<div class="col-md-6"><h4><?php echo e($partidos->nom_local); ?> - <?php echo e($partidos->nom_visitante); ?> <P> <?php echo e($partidos->fecha); ?></h4></div>
								  		<div class="col-md-3"><img class="img-responsive" src="../images/<?php echo e($partidos->id_visitante); ?>.png"></div>
								  	</div>
								  </li><br>
								<?php $i++ ?>
								<?php endforeach; ?>
								</ul>
							</div>
				        </div>
				        <div class="modal-footer">
					        <div class="row">
						        <div class="col-md-12" align="center">
							        <button class="btn btn-success btn-lg btn-block" value="<?php echo e(csrf_token()); ?>" <?php echo e($disponible); ?> aling="left">Inscribir</button>
							    </div>
					        </div>
				      	</div>
				    </div>
				  </div>
				</div>

				</form>
				</tbody>

				

			
		<?php endforeach; ?>
		
		</table>


		</div>	
	 </div>


	
		
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>