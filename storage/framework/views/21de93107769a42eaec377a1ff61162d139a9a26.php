<?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo e(Session::get('message')); ?>

</div>
<?php endif; ?>


<?php $__env->startSection('content'); ?>
	
	<table class="table">
		<thead>
			<th>Id</th>
			<th>Nombre</th>
			<th>Fecha Inicio</th>
			<th>Fecha Finalización</th>
			<th>Costo</th>
			<th>Operación</th>
		</thead>
		
		<?php foreach($quinielas as $quiniela): ?>


		<tbody>
			
			<td><?php echo $quiniela->id; ?></td>
			<td>
				
				<a href="/showUsersQuiniela?id_quin=<?php echo $quiniela->id ?>"><?php echo e($quiniela->nombre); ?></a>
			

			</td>
			<td><?php echo e($quiniela->fecha_inicio); ?></td>
			<td><?php echo e($quiniela->fecha_finalizacion); ?></td>
			<td><?php echo e($quiniela->costo); ?></td>
			<td>
			
			<ul class="list-inline">
  			
			<li>
			<?php echo Form::open(['route'=>['quiniela.destroy', $quiniela->id], 'method' => 'DELETE']); ?>

			<?php echo Form::submit('Eliminar',['class'=>'btn btn-danger', 'disabled'=>'true']); ?>

			<?php echo Form::close(); ?>

			<li>

			<li>
			<?php echo link_to_route('quiniela.edit', $title = 'Editar', $parameters = $quiniela->id, $attributes = ['class'=>'btn btn-primary']);; ?>

			</li>
			<li>
				<form name="form"  action="<?php echo e(action('EquipoController@constructor')); ?>" method="GET" >
				<input name="resultado" type="hidden" id="resultado" size="30" maxlength="10" value=<?php echo $quiniela->id ?>  />
				<?php echo e(session(['idQuin' => $quiniela->id])); ?>		
				<button class="btn btn-success">Gestionar</button>
				</form>
			</li>
			<li>
				<form name="form"  action="<?php echo e(action('QuinielaController@finalizar')); ?>" method="POST" >
					<?php echo csrf_field(); ?>

				<input name="quiniela_id" type="hidden" id="quiniela_id"  value="<?php echo e($quiniela->id); ?>"  />	
				<button class="btn btn-danger" value="<?php echo e(csrf_token()); ?>">Finalizar</button>
				</form>
			</li>
			</ul>
			



			</td>
		</tbody>
		
		<?php endforeach; ?>


		
	</table>

	<?php echo $quinielas->render(); ?>


		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>