<?php $__env->startSection('content'); ?>
	
	<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo Form::open(['route'=>'quiniela.store','method'=>'POST']); ?>

		
		<?php echo $__env->make('quiniela.forms.quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo Form::submit('Crear Quiniela',['class'=>'btn btn-primary']); ?>

		
		<br><br>

	<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>