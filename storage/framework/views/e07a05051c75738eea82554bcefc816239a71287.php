<?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo e(Session::get('message')); ?>

</div>
<?php endif; ?>


<?php $__env->startSection('content'); ?>
	
	<table class="table ">
		<thead>
			<th>Quiniela</th>
			<th>ID</th>
			<th>Nombre</th>
			<th>Grupo</th>
			<th>Operación</th>
		</thead>
		
		<?php foreach($equipos as $equipo): ?>

		<?php if($id_quin == $equipo->id_quiniela): ?>
			<tbody>
				<td><?php echo e($equipo->id_quiniela); ?></td>
				<td><?php echo e($equipo->id_equipo); ?></td>
				<td><?php echo e($equipo->nombre); ?></td>
				<td><?php echo e($equipo->grupo); ?></td>
				<td>	

				<?php echo link_to_route('equipo.edit', $title = 'Editar', $parameters = $equipo->id, $attributes = ['class'=>'btn btn-primary']);; ?>

				
				</td>
			</tbody>
		<?php endif; ?>
		<?php endforeach; ?>


		
	</table>

	<?php echo $equipos->render(); ?>


		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gest_quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>