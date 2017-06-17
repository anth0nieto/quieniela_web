<?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo e(Session::get('message')); ?>

</div>
<?php endif; ?>


<?php $__env->startSection('content'); ?>
	
	<table class="table ">
		<thead>
			<th>Fecha</th>
			<th>Local</th>
			<th>Visitante</th>
		</thead>
		
		<?php foreach($resultados as $resultado): ?>

			<tbody>
				<td><?php echo e($resultado->id_partido); ?></td>
				<td><?php echo e($resultado->goles_local); ?></td>
				<td><?php echo e($resultado->goles_visitante); ?></td>
				<td>	

				<?php echo link_to_route('resultado_A.edit', $title = 'Editar', $parameters = $resultado->id_partido, $attributes = ['class'=>'btn btn-primary']);; ?>

				
				</td>
			</tbody>
		
		<?php endforeach; ?>
		
	</table>		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gest_quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>