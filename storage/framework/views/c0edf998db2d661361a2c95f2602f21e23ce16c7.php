<?php $__env->startSection('content'); ?>
	
	<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $equipos = DB::table('equipos')
				->where('id_quiniela','=', 0)
				->get();

$equipo_a = '<select class="form-control" name="equipo_a">';
$equipo_b = '<select class="form-control" name="equipo_b">';
foreach ($equipos as $equipo) 
{
	$equipo_a.= '<option value="'.$equipo->nombre.'">'.$equipo->nombre.'</option>';
	$equipo_b.= '<option value="'.$equipo->nombre.'">'.$equipo->nombre.'</option>';
}
$equipo_a.='</select>';
$equipo_b.='</select>';
?>

<form action="/partido_directo" method="POST">
<?php echo csrf_field(); ?>		
<br>		
<div class="row col-wrap" >
<div class="col-sm-6 col">

<div class="well">
 
     <fieldset>
 		<div align = "center">
        	<legend>Agregar Partido</legend>
        </div>

        <div class="row">
			<div class="form-group" align="center">
			

				<div class="col-lg-3">

					<?php echo $equipo_a; ?>

				</div>
				<div class="col-lg-1">
					<?php echo Form::label('VS'); ?>

				</div>
				

				<div class="col-lg-3">
					<?php echo $equipo_b; ?>

				</div>
			
				

				<div class="col-lg-2">	
				<?php echo Form::label('Fecha:'); ?>

				</div>
				<div class="col-lg-3">	
					<?php echo Form::text('fecha',null,['class'=>'form-control','placeholder'=>'aaaa-mm-dd']); ?>

				</div>
		
			</div>
		</div>

		<br>

		<div class="row" align= "center">
			<button class="btn btn-primary" value="<?php echo e(csrf_token()); ?>">Agregar</button>
		</div>
		
		<br><br>
	</fieldset>	
	</div>
	</div>
	</div>	


	</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gest_quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>