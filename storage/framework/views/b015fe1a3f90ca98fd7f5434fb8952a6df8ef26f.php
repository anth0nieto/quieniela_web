<?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo e(Session::get('message')); ?>

</div>

<?php endif; ?>

<?php $__env->startSection('content'); ?>

	<form name="form" action= "/verQuiniela" method="GET" >
           <?php echo csrf_field(); ?>

    <input name="id" type="hidden"  value="1" />
	<button class="btn btn-primary" value="<?php echo e(csrf_token()); ?>">Ver Posiciones</button>

	</form>
	<table class="table">
		<thead>
			<th>Username</th>
			<th>Nro de Empleado</th>
			
		</thead>
		
		<?php foreach($admins as $admin): ?>

		<tbody>
			<td><?php echo e($admin->username); ?></td>
			<td><?php echo e($admin->numeroEmpleado); ?></td>
			
		</tbody>
		
		<?php endforeach; ?>
		
	</table>
	
	
	
	 
		<?php echo $admins->render(); ?>

	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>