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
		<p aling ="center"><font style="font-family: ArialDejaVu Sans; color:#30456B;"  size="5" ><br>Pronósticos de {{ $quiniela->nombre }}<br><br></font></p>
	</div>
		
	
	<div class="row">
		<div class="col-md-6">
			
			<table border ="2" width="75%" align ="center" color = "#5cb85c">
			
				<?php $count = 0?>
				@foreach($jugadas as $jugada)
					<tr align="center">

							<td style="width:40%; background-color:#00695C; color:#fff;">{{$nombre_local[$count][0]->nombre}}</td>
							<td style="width:10%">{{$jugada->goles_local}}</td>
							<td style="width:10%">{{$jugada->goles_visitante}}</td>
							<td style="width:40%; background-color:#30456B; color:#fff;">{{$nombre_visitante[$count][0]->nombre}}</td>
					</tr>
				<?php $count++?>	
				@endforeach
				
			</table>
		</div>
	</div>

			
			
			
	<div style="width:100%;" align="center">
		<p aling ="center"><font style="font-family: ArialDejaVu Sans; color:#30456B;"  size="5" ><br>Resultados de la {{$quiniela->nombre}}<br><br></font></p>
	</div>
					
	
	<div class="row">		
		<div class="col-md-6">
			<table border ="2" width="75%" align ="center" color = "#5cb85c">	
					<?php $count = 0?>
					@if(!empty($resultado_local))
					@foreach($resultado_local as $resultado)
					<tr align="center">
						<td style="width:40%; background-color:#5CB85C; color:#fff;">{{$resultado[0]->nombre}}</td>
						<td style="width:10%">{{$resultados[$count]->goles_local}}</td>
						<td style="width:10%">{{$resultados[$count]->goles_visitante}}</td>
						<td style="width:40%; background-color:#5bc0de; color:#fff;">{{$resultado_visitante[$count][0]->nombre}}</td>
					</tr>
					<?php $count++?>	
					@endforeach
					@endif

			</table>
		</div>
	</div>
</body>		
</html>		
	
			

