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
			<th>UserName</th>
			<th>Correo</th>
			<th>Cedula</th>
			<th>Banco</th>
			<th>Nro Cuenta</th>
			<th>Monto</th>
			<th>Fecha Solicitud</th>
		</thead>
		
		<?php foreach($pagos as $pago): ?>


		<tbody>
			
			<td><?php echo e($pago->nombre); ?></td>
			<td><?php echo e($pago->username); ?></td>
			<td><?php echo e($pago->email); ?></td>
			<td><?php echo e($pago->cedula); ?></td>
			<td><?php echo e($pago->banco); ?></td>
			<td>#<?php echo e($pago->nroCuenta); ?></td>
			<td><?php echo e($pago->montoSolicitado); ?></td>
			<td><?php echo e($pago->fechaSolicitud); ?></td>
			<td>
			
			<ul class="list-inline">
				<li>
					<form name="form"  action="<?php echo e(action('UsertransaccionController@aprobarPago')); ?>" method="POST" >
						<?php echo csrf_field(); ?>

					<input name="user_email" type="hidden" id="resultado" value="<?php echo e($pago->email); ?>"  />
					<input name="monto" type="hidden" id="resultado" value="<?php echo e($pago->montoSolicitado); ?>"  />
					<input name="id_pago" type="hidden" id="id_pago" value="<?php echo e($pago->id); ?>"  />
					<input name="fecha_pago" type="hidden" id="fecha_pago" value="<?php echo e($pago->fechaSolicitud); ?>"  />
					
					<button class="btn btn-success" value="<?php echo e(csrf_token()); ?>">Pagar</button>
					</form>
				</li>
			</ul>
			



			</td>
		</tbody>
		
		<?php endforeach; ?>

	</table>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>