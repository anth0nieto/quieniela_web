<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::open(['route'=>'resultado_A.store','method'=>'POST']); ?>


	<?php $contador = 0; ?>

	<?php foreach($partidos as $partido): ?>

	<?php if($partido->id_quiniela == $id_quin): ?>

		<?php $contador++; ?>
		<br><br>
		<div class="panel panel-primary">
		<div class="panel-heading">Fecha: <?php echo $partido->fecha ?></div>
		<div class="panel-body">

		<div class="form-inline">
		<input name="id_partido_<?php echo $contador?>" type="hidden" id="id_partido_<?php echo $contador?>" value=<?php echo $partido->id_partido ?> />
		<?php echo Form::label($partido->id_local); ?>

		<?php echo Form::text('local_'.$contador,null,['class'=>'form-control','placeholder'=>'Id Local']); ?>

		&nbsp;&nbsp;&nbsp;
		<?php echo Form::label('VS'); ?>

		&nbsp;&nbsp;&nbsp;
		<?php echo Form::text('visitante_'.$contador,null,['class'=>'form-control','placeholder'=>'Id Visitante']); ?>

		<?php echo Form::label($partido->id_visitante); ?>

		</div>
		</div>
		</div>
	
		
	<?php endif; ?>
	<?php endforeach; ?>

	<input name="contador" type="hidden" id="contador" value=<?php echo $contador ?> />

<br><br>
<?php echo Form::submit('Actualizar',['class'=>'btn btn-primary']); ?>

<br><br>

<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>	
<?php echo $__env->make('layouts.gest_quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>