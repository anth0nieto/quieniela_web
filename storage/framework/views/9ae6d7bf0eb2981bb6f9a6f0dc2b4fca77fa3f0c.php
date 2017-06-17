<?php $__env->startSection('content'); ?>
	
	<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo Form::model($partido, ['route'=>['partido.update',$partido->id_partido],'method'=>'PUT']); ?>

		
<br>		
<div class="row col-wrap" >
<div class="col-sm-6 col">

<div class="well">
 
     <fieldset>
 
        <legend>Editar Partido</legend>



		<div class="form-group" align="center">
			<div class="col-lg-3">
				<?php echo Form::text('id_local',null,['class'=>'form-control','placeholder'=>'Ingresa el Id Local']); ?>

			</div>
			<div class="col-lg-1">
				<?php echo Form::label('VS'); ?>

			</div>
			<div class="col-lg-3">
				<?php echo Form::text('id_visitante',null,['class'=>'form-control','placeholder'=>'Ingresa el Id Visitante']); ?>

			</div>
		</div>
			
		<br><br>
		<div class="form-group">
			<div class="col-lg-2">	
			<?php echo Form::label('Fecha:'); ?>

			</div>
			<div class="col-lg-4">	
				<?php echo Form::text('fecha',null,['class'=>'form-control','placeholder'=>'Ingresa la Fecha:']); ?>

			</div>
		</div>	

		<br><br>

	<?php echo Form::submit('Editar',['class'=>'btn btn-primary']); ?>

		
		<br><br>
	</fieldset>	
	</div>
	</div>
	</div>	


	<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gest_quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>