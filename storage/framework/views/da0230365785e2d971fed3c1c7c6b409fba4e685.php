<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form action="/store_solo" method="POST">
<?php echo csrf_field(); ?>	

<br><br>
<div class="row col-wrap">
<div class="col-sm-12 col">
<div class="panel panel-primary">
<div class="panel-heading" align = "center">AGREGAR EQUIPOS</div>
<div class="panel-body">
	
		<input name="id_quiniela_1" type="hidden" id="id_quiniela_1" size="30" maxlength="10" value=<?php echo $id_quiniela ?> />

<div class="well well-sm">
		<div class="row">
			<div class="col-md-6">
				<?php echo Form::text('id_equipo_1',null,['class'=>'form-control','placeholder'=>'Ingresa el Id']); ?>

			
			</div>
			<div class="col-md-6">
				<?php echo Form::text('nombre_1',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre']); ?>		
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">
				<?php echo Form::text('id_equipo_2',null,['class'=>'form-control','placeholder'=>'Ingresa el Id']); ?>

			
			</div>
			<div class="col-md-6">
				<?php echo Form::text('nombre_2',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre']); ?>		
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">
				<?php echo Form::text('id_equipo_3',null,['class'=>'form-control','placeholder'=>'Ingresa el Id']); ?>

			
			</div>
			<div class="col-md-6">
				<?php echo Form::text('nombre_3',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre']); ?>		
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">
				<?php echo Form::text('id_equipo_4',null,['class'=>'form-control','placeholder'=>'Ingresa el Id']); ?>

			
			</div>
			<div class="col-md-6">
				<?php echo Form::text('nombre_4',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre']); ?>		
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6">
				<?php echo Form::text('id_equipo_5',null,['class'=>'form-control','placeholder'=>'Ingresa el Id']); ?>

			
			</div>
			<div class="col-md-6">
				<?php echo Form::text('nombre_5',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre']); ?>		
			</div>
		</div>
</div>
		
</div>
</div>
</div>


<div class="row">
	<div class="col-md-12" align = "center">

		<button class="btn btn-primary" value="<?php echo e(csrf_token()); ?>">Agregar</button>
	</div>
</div>


<?php echo Form::close(); ?>


	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gest_quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>