<?php if(Session::has('message1')): ?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo e(Session::get('message1')); ?>

</div>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
	
	<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<form name="form"  action="<?php echo e(action('ResultadoAdminController@buscar')); ?>" method="GET" >

<br>		
<div class="row col-wrap">
<div class="col-sm-6 col">

<div class="well">
 
     <fieldset>
 
        <legend>Ingresar Resultado</legend>


	<div class="form-inline">
	<label for="">Fecha a Actualizar: </label>
	<input name="fecha_result" type="date" value = "<?php echo e(date('Y-m-d')); ?>"id="fecha_result" class="form-control" />		
	</div>
	
	<br><br>
	<button class="btn btn-success">Buscar</button>
	</fieldset>	
	</div>
	</div>
	</div>	


	</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gest_quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>