<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<table class="table">
		<thead>
			<th>id_user</th>
			<th>Id_quiniela</th>
			<th>Username</th>
			<th>Status</th>
			<th>Acción</th>
			
		</thead>
		
		<?php foreach($users as $user): ?>

			<?php if($id_quin == $user->id_quiniela): ?>				
				<tbody>
				
				<td><?php echo e($user->id); ?></td>
				<td><?php echo e($user->id_quiniela); ?></td>
				<td><a href="/showTransaccion?id_quin=<?php echo $id_quin ?>&username=<?php echo $user->username?>"><?php echo e($user->username); ?></a></td>
				<td>
				<?php echo e($user->status); ?>

				</td>

				<td>
				<ul class="list-inline">

				<li>
					<?php echo link_to_route('userquiniela.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary']); ?>

				</li>

				<li>
					<?php echo Form::open(['route'=>['userquiniela.destroy', $user->id], 'method' => 'DELETE']); ?>

					<?php echo Form::submit('Eliminar',['class'=>'btn btn-danger', 'disabled'=>'true']); ?>

					<?php echo Form::close(); ?>

				</li>
				</ul>
					
			
				</td>
				</tbody>
			<?php endif; ?>
		
		<?php endforeach; ?>


		
	</table>

	<?php echo $users->render(); ?>

		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>