<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<table class="table">
		<thead>
			<th>id_user</th>
			<th>Id_quiniela</th>
			<th>Username</th>
			<th>Correo</th>
			
		</thead>
		
		<?php foreach($users as $user): ?>
			<?php $correo = DB::table('users')->where('username','=',$user->username)->get()?>
			<?php if($id_quiniela == $user->id_quiniela && $user->status == 'Inscrito'): ?>				
				<tbody>
				
				<td><?php echo e($user->id); ?></td>
				<td><?php echo e($user->id_quiniela); ?></td>
				<td><?php echo e($user->username); ?></td>
				<td><?php echo e($correo[0]->email); ?></td>
				</tbody>
			<?php endif; ?>
		
		<?php endforeach; ?>


		
	</table>
	
	<div align = "center">
		<form name="form"  action="<?php echo e(action('UserquinielaController@generarPDF')); ?>" method="GET" >
							<input name="id_quiniela" type="hidden" id="id_quiniela" size="30" maxlength="10" value=<?php echo $id_quiniela ?>  />
								
							<button class="btn btn-danger">Generar PDF</button>
		</form>
		
		<br>
		
		<form name="form"  action="<?php echo e(action('UserquinielaController@enviarPDF')); ?>" method="GET" >
							<input name="id_q" type="hidden" id="id_q" size="30" maxlength="10" value=<?php echo $id_quiniela ?>  />
								
							<button class="btn btn-danger">Enviar PDF</button>
		</form>		
		
	</div>

	<?php echo $users->render(); ?>

		
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.gest_quiniela', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>