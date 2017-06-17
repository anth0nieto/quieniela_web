<?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo e(Session::get('message')); ?>

</div>
<?php endif; ?>


<?php $__env->startSection('content'); ?>
	
	<table class="table ">
		<thead>
			<th>Id Quiniela</th>
			<th>ID Local</th>
			<th>ID Visitante</th>
			<th>Fecha</th>
			<th>Fase</th>
			<th>Operación</th>
		</thead>
		
		<?php foreach($partidos as $partido): ?>

		<?php if($partido->id_quiniela == $id_quin): ?>
			<tbody>
				<td><?php echo e($partido->id_quiniela); ?></td>
				<td><?php echo e($partido->id_local); ?></td>
				<td><?php echo e($partido->id_visitante); ?></td>
				<td><?php echo e($partido->fecha); ?></td>
				<td><?php echo e($partido->fase_grupo); ?></td>
				<td>	

				<?php echo link_to_route('partido.edit', $title = 'Editar', $parameters = $partido->id_local.$partido->id_visitante.$partido->fecha, $attributes = ['class'=>'btn btn-primary']);; ?>

				
				</td>
			</tbody>
		
		<?php endif; ?>
		<?php endforeach; ?>


		
	</table>

	<?php echo $partidos->render(); ?>


		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gest_quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>