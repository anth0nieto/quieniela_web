<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document Email</title>
</head>
<body>
	
	<div style="width:100%;" align="center">
		<a align="center" style="width:100%;" href="http://www.quinielaganadora.com.ve"><img align="center" src="http://www.quinielaganadora.com.ve/images/logo11.png" style="display:block; max-width:25%; height: auto;"></a>
	</div>
	
	<div style="width:100%;" align="center">
		<p aling ="center"><font style="font-family: ArialDejaVu Sans; color:#30456B;"  size="5" ><br>Pronósticos de <?php echo e($quiniela[0]->nombre); ?><br><br></font></p>
	</div>
		
	
	<div class="row">
		<div class="col-md-6">
			<?php $id_user = 0?>
			<?php $i = 0?>
			<table border ="2" width="75%" align ="center" color = "#5cb85c">
			<?php $count = 0?>
			<?php $tam = count($equipos)?>
			<?php $b = TRUE?>
			<?php foreach($jugadas as $jugada): ?>	
				<?php if($jugada->id_user != $id_user): ?>

					<?php $user = DB::table('user_quinielas')
                    	->where('id_quiniela',$id_quiniela)
                    	->where('id','=',$jugada->id_user)
                    	->first()?>

					<tr algin="center">
					<td colspan="4" align ="center" style="background-color:#5cb85c;">
						<b style="color:#fff;">Pronósticos de <?php echo e($user->username); ?></b>
					</td>
					</tr>
						
					<?php $i++?>
				
					<?php endif; ?>

					<?php if($count == $tam): ?>
						<?php $count = 0?>
					<?php endif; ?>
					
					<tr align="center">
						<td style="width:40%"><?php echo e($equipos[$count]->nom_local); ?></td>
						<td style="width:10%"><?php echo e($jugada->goles_local); ?></td>
						<td style="width:10%"><?php echo e($jugada->goles_visitante); ?></td>
						<td style="width:40%"><?php echo e($equipos[$count]->nom_visitante); ?></td>
					</tr>
				
					<?php $count++?>	
					<?php $id_user = $jugada->id_user?>
					<?php endforeach; ?>

			</table>
		</div>
	</div>		
</body>		
</html>				
