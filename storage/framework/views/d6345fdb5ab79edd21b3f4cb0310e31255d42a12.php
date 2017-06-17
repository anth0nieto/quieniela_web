<?php if(Session::has('message')): ?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <?php echo e(Session::get('message')); ?>

</div>
<?php endif; ?>


<?php $__env->startSection('content'); ?>
	
	<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Monto</th>
			<th>4 Ultimos</th>
			<th>Banco</th>
			<th>Fecha</th>
		</thead>
		
		<?php foreach($creditos as $credito): ?>


		<tbody>
			
			<td><?php echo e($credito->nombre); ?> <?php echo e($credito->apellido); ?></td>
			<td><?php echo e($credito->email); ?></td>
			<td><?php echo e($credito->creditoPendiente); ?> Bsf</td>
			<td>#<?php echo e($credito->ultimosCuatro); ?></td>
			<td><?php echo e($credito->banco); ?></td>
			<td><?php echo e($credito->fecha); ?></td>
			<td>
			
			<ul class="list-inline">
				<li>
					<form name="form"  action="<?php echo e(action('UsertransaccionController@aprobarCredito')); ?>" method="POST" >
						<?php echo csrf_field(); ?>

					<input name="user_email" type="hidden" id="resultado" value="<?php echo e($credito->email); ?>"  />
					<input name="monto" type="hidden" id="resultado" value="<?php echo e($credito->creditoPendiente); ?>"  />
					<input name="ultimosCuatro" type="hidden" id="resultado" value="<?php echo e($credito->ultimosCuatro); ?>"  />
					<input name="credito_id" type="hidden" id="credito_id" value="<?php echo e($credito->id); ?>"  />
					
					<button class="btn btn-success" value="<?php echo e(csrf_token()); ?>">Aprobar</button>
					</form>
				</li>
			</ul>
			



			</td>
		</tbody>
		
		<?php endforeach; ?>

	</table>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>