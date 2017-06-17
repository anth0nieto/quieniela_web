@extends('layouts.quiniela')
	
	@section('content')
				
				<div class="header">
					<div class="top-header">
						@include('alerts.success')
						@include('alerts.errors')
						@include('alerts.request')
						<ul class="nav nav-pills" role="tablist">
  						
  						<li role="presentation"><a href="{!!URL::to('/showQuinielas')!!}"><button type="button" class="btn btn-primary"><span class="fa fa-check-square" aria-hidden="true"></span> Quinielas Disponibles</button></a></li>
  						<li role="presentation"><a href="{!!URL::to('/user/show')!!}"><button type="button" class="btn btn-primary"><span class="fa fa-user" aria-hidden="true"></span> {!! Auth::user()->username !!}</button></a></li>
  						<li role="presentation"><a href="{!!URL::to('/misQuinielas')!!}"><button type="button" class="btn btn-primary"><span class="fa fa-gamepad" aria-hidden="true"></span> Mis Quinielas</button></a></li>
  						<li role="presentation">
							<a href="{!! URL::to('/misQuinielas')!!}"><button type="button" class="btn btn-success">
			  				<span class="fa fa-arrow-left" aria-hidden="true" href="/misQuinielas"></span> Volver
							</button></a>
						</li>

						<li role="presentation">
							<a href="{!! URL::to('/logout')!!}"><button type="button" class="btn btn-danger">
			  				<span class="fa fa-paper-plane-o" aria-hidden="true" href="/logout"></span> Salir
							</button></a>
						</li>

							</ul>

						<div class="logo">
						<p><div class="panel panel-info">
		<div class="panel-heading" align="center"><h4> Tabla de posiciones de la <?php echo $quiniela->nombre?></h4></div></div></p>
							
													
		</div>

		

		<table class="table" >
			<thead >
				<tr align="center" class="info">
				<td class="info"><strong>Listado de Usuarios</strong></td>
				<td class="info"><strong>Puntos Totales</strong></td>
				<td class="info"><strong>Aciertos de Ganadores</strong></td>
				<td class="info"><strong>Aciertos de Resultados</strong></td>
				<td class="info"><strong>Puntos Por Equipos Oct</strong></td>
				<td class="info"><strong>Aciertos Equipos Oct</strong></td>
				</tr>
		    </thead>
			
			<tbody>	
			@for ($i = 0; $i < count($ranking); $i++)
			    <td  class="warning" align="center"><a href="/verPerfil?id_user={{$ranking[$i][2] }}"><button type="button" class="btn btn-success btn-lg btn-block">{{$ranking[$i][0]}}</button></a></td>
				<td class="info" align="center">{{$ranking[$i][1]}}</td>
				<td   class="warning" align="center">{{$ranking[$i][3]}}</td>
				<td   class="warning" align="center">{{$ranking[$i][4]}}</td>
				<td class="success" align="center">{{$ranking[$i][5]}}</td>
				<td  class="warning" align="center">{{$ranking[$i][6]}}</td>

			</tbody>
			@endfor
		</table>

		<table class="table" >
			<thead >
				<tr align="center">
				<td class="info"><strong>Usuario</strong></td>
				<td class="info"><strong>Puntos Equipos en Octavos</strong></td>
				<td class="info"><strong>Equipos en Octavos</strong></td>
				<td class="info"><strong>Puntos Equipos en Cuartos</strong></td>
				<td class="info"><strong>Equipos en Cuartos</strong></td>
				<td class="info"><strong>Equipos en SemiFinal</strong></td>
				<td class="info"><strong>Equipos en SemiFinal</strong></td>
				<td class="info"><strong>Puntos Equipos en la Final</strong></td>
				<td class="info"><strong>Equipos en la Final</strong></td>				
				<td class="info"><strong>Puntos Campeon</strong></td>
				</tr>
		    </thead>
			
			<tbody>	
			@for ($i = 0; $i < count($ranking); $i++)
			    <td  class="warning" align="center"><a href="/verPerfil?id_user={{$ranking[$i][2] }}"><button type="button" class="btn btn-info btn-lg btn-block">{{$ranking[$i][0]}}</button></a></td>
				<td class="success" align="center">{{$ranking[$i][5]}}</td>
				<td  class="warning" align="center">{{$ranking[$i][6]}}</td>
				<td class="success" align="center">{{$ranking[$i][7]}}</td>
				<td  class="warning" align="center">{{$ranking[$i][8]}}</td>
				<td class="success" align="center">{{$ranking[$i][9]}}</td>
				<td  class="warning" align="center">{{$ranking[$i][10]}}</td>
				<td class="success" align="center">{{$ranking[$i][11]}}</td>
				<td  class="warning" align="center">{{$ranking[$i][12]}}</td>
				<td class="success" align="center">{{$ranking[$i][13]}}</td>

			</tbody>
			@endfor
		</table>

		
		
		</div>
			
		</div>

		
	@endsection