					
	<div class="row">
		<div class="col-md-6">
			<div class="logo">
				<p aling ="center">Resultados de <?php echo e($user_name[0]->username); ?></p>
			</div>
		</div>
			<div class="col-md-6">
			<table border ="0.5" width="75%" align ="center" color = "#0077EE">
			
				<?php $count = 0?>
				<?php if(!empty($jugadas)): ?>
				<?php foreach($jugadas as $jugada): ?>
					<tr align="center">

							<td><?php echo e($nombre_local[$count][0]->nombre); ?></td>
							<td><?php echo e($jugada->goles_local); ?></td>
							<td><?php echo e($jugada->goles_visitante); ?></td>
							<td><?php echo e($nombre_visitante[$count][0]->nombre); ?></td>
							<td><?php echo e($nombre_local[$count][0]->grupo); ?></td>
					</tr>
				<?php $count++?>	
				<?php endforeach; ?>
				<?php endif; ?>
			</table>
			</div>
	</div>
		
	</div>
		<div class="col-md-6">
			<div class="logo">

						<p aling ="center">Resultados de la <?php echo e($quiniela->nombre); ?></p>

			</div>
		</div>	
				<div class="col-md-6">
				<table border = "0.5" width="75%" align="center" color = "#0077EE">
				

					<?php $count = 0?>
					<?php if(!empty($resultado_local)): ?>
					<?php foreach($resultado_local as $resultado): ?>
					<tr align="center">
						<td><?php echo e($resultado[0]->nombre); ?></td>
						<td><?php echo e($resultados[$count]->goles_local); ?></td>
						<td><?php echo e($resultados[$count]->goles_visitante); ?></td>
						<td><?php echo e($resultado_visitante[$count][0]->nombre); ?></td>
						<td><?php echo e($resultado[0]->grupo); ?></td>
					</tr>
					<?php $count++?>	
					<?php endforeach; ?>
					<?php endif; ?>

				</table>
			</div>

	</div>

	
			
