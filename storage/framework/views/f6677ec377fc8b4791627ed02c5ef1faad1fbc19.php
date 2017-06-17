<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form name="form"  action="<?php echo e(action('ResultadoAdminController@store')); ?>" method="POST" >
				 <?php echo csrf_field(); ?>								

	<?php $contador = 0; ?>

	<?php foreach($partidos as $partido): ?>

		<?php $contador++; ?>
		<br><br>
		<div class="panel panel-primary">
		<div class="panel-heading">Fecha: <?php echo e($partido->fecha); ?></div>
		<div class="panel-body">

		<div class="form-inline">
		<input name="id_partido_<?php echo e($contador); ?>" type="hidden" id="id_partido_<?php echo e($contador); ?>" value="<?php echo e($partido->id_partido); ?>" />
		<?php echo Form::label($partido->id_local); ?>


		<?php $partido_aux = DB::table('resultado_admins')
                            ->where('resultado_admins.id_partido', '=', $partido->id_partido)
                            ->select('resultado_admins.goles_local','resultado_admins.goles_visitante')
                            ->get(); ?>
		
		<?php if(!empty($partido_aux)  ): ?>
		<input type="text" name="local_<?php echo e($contador); ?>" placeholder="Id Local" value="<?php echo e($partido_aux[0]->goles_local); ?>" />
		<?php else: ?>
		<input type="text" name="local_<?php echo e($contador); ?>" placeholder="Id Local"  />
		<?php endif; ?>
		
		<?php echo Form::label('VS'); ?>


		<?php if(!empty($partido_aux) ): ?>
		<input type="text" name="visitante_<?php echo e($contador); ?>" placeholder="Id Visitante" value="<?php echo e($partido_aux[0]->goles_visitante); ?>" /> 
		<?php else: ?>
		<input type="text" name="visitante_<?php echo e($contador); ?>" placeholder="Id Visitante"  /> 
		<?php endif; ?>
		
		<?php echo Form::label($partido->id_visitante); ?>

		</div>
		</div>
		</div>
	<?php endforeach; ?>

	<input name="contador" type="hidden" id="contador" value="<?php echo e($contador); ?>" />

<br>
<button class="btn btn-primary" value="<?php echo e(csrf_token()); ?>"  aling="center">Actualizar</button>
</form>

<br><br>

<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>	
<?php echo $__env->make('layouts.gest_quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>