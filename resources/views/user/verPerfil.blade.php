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
  						
  						

						<li>
							<a>	
							<div align = "center">
								<form name="form"  action="{{action('UserController@miJugadaPDF')}}" method="GET" >
									<input name="id_user" type="hidden" id="id_user" size="30" maxlength="10" value="{{$id_user}}"  />
									<button class="btn btn-primary"> <span class="fa fa-download" aria-hidden="true"></span> Descargar PDF</button>
								</form>	
							</div>
							</a>
						</li>
						
						
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
							<div class="panel-heading" align="center"><h4>Verifica Tus Resultados</h4></div></div></p>
									


							</div>
						

					
	
						<br><br><br><br><br><br><br><br>

		 <fieldset>
	   	<fieldset>
	   	<legend > <div class="well well-sm" align="center"> Resultados Fase de Grupos </div></legend>

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"> <b>Resultados de {{$user_name[0]->username}}</b> </div>
		<div class="panel-body">

		<table class="table">
			<thead>
					<th class="info">Equipo local</th>
					<th class="info">Goles local</th>
					<th class="info">Goles visitante</th>
					<th class="info">Equipo visitante</th>
					<th class="info">Grupo</th>
		    </thead>

			<?php $count = 0?>
			@if(!empty($jugadas))
			@foreach($jugadas as $jugada)
				<tbody align="center">

						<td class="success">{{$nombre_local[$count][0]->nombre}}</td>
						<td class="warning">{{$jugada->goles_local}}</td>
						<td class="warning">{{$jugada->goles_visitante}}</td>
						<td class="success">{{$nombre_visitante[$count][0]->nombre}}</td>
						<td class="danger">{{$nombre_local[$count][0]->grupo}}</td>
				</tbody>
			<?php $count++?>	
			@endforeach
			@endif
		</table>
	</div>
	</div>
	</div>
			

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"><b>Resultados de la {{$quiniela->nombre}}<b> </div>
		<div class="panel-body">
			<table class="table">
				<thead >
					<th class="info">Equipo local</th>
					<th class="info">Goles local</th>
					<th class="info">Goles visitante</th>
					<th class="info">Equipo visitante</th>
					<th class="info">Grupo</th>
				</thead>

				<?php $count = 0?>
				@if(!empty($resultado_local))
				@foreach($resultado_local as $resultado)
				<tbody align="center">
					<td class="success">{{$resultado[0]->nombre}}</td>
					<td class="warning">{{$resultados[$count]->goles_local}}</td>
					<td class="warning">{{$resultados[$count]->goles_visitante}}</td>
					<td class="success">{{$resultado_visitante[$count][0]->nombre}}</td>
					<td class="danger">{{$resultado[0]->grupo}}</td>
				</tbody>
				<?php $count++?>	
				@endforeach
				@endif
			</table>

		</div>
	</div>

	</fieldset>


	<fieldset>
	   	<legend > <div class="well well-sm" align="center"> Equipos en 8vos </div></legend>

	

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"> <b>Equipos de {{$user_name[0]->username}}</b> </div>
		<div class="panel-body">

		<table class="table">
			<thead>
			</thead>

			@if(!empty($resultados_usuarios))
			@foreach($resultados_usuarios as $resultados)
				<tbody align="center">

						<td class="success">{{$resultados->id_partido}}</td>

				</tbody>

			@endforeach
			@endif
		</table>
	</div>
	</div>
	</div>
			

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"><b>Equipos de la {{$quiniela->nombre}}<b> </div>
		<div class="panel-body">
			<table class="table">
				<thead >
				</thead>

				@if(!empty($equipos_octavos_local))
				@foreach($equipos_octavos_local as $resultado)
				<tbody align="center">
					<td class="success">{{$resultado->nombre}}</td>
				</tbody>
				@endforeach
				@endif

				@if(!empty($equipos_octavos_visitante))
				@foreach($equipos_octavos_visitante as $resultado)

					<td class="success" align="center">{{$resultado->nombre}}</td>
				</tbody>
				@endforeach
				@endif
			</table>

		</div>
	</div>

	</fieldset>

	<fieldset>
	   	<legend > <div class="well well-sm" align="center"> Resultados 8vos de Final </div></legend>

	

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"> <b>Resultados de {{$user_name[0]->username}}</b> </div>
		<div class="panel-body">

		<table class="table">
			<thead>
					<th class="info">Equipo local</th>
					<th class="info">Goles local</th>
					<th class="info">Goles visitante</th>
					<th class="info">Equipo visitante</th>
		    </thead>

			<?php $count = 0?>
			@if(!empty($resultados_usuarios_8vos))
			@foreach($resultados_usuarios_8vos as $jugada)
				<tbody align="center">

						<td class="success">{{$nombre_local_8vos[$count][0]->nombre}}</td>
						<td class="warning">{{$jugada->goles_local}}</td>
						<td class="warning">{{$jugada->goles_visitante}}</td>
						<td class="success">{{$nombre_visitante_8vos[$count][0]->nombre}}</td>
				</tbody>
			<?php $count++?>	
			@endforeach
			@endif
		</table>
	</div>
	</div>
	</div>
			

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"><b>Resultados de la {{$quiniela->nombre}}<b> </div>
		<div class="panel-body">
			<table class="table">
				<thead >
					<th class="info">Equipo local</th>
					<th class="info">Goles local</th>
					<th class="info">Goles visitante</th>
					<th class="info">Equipo visitante</th>
				</thead>

				<?php $count = 0?>
				@if(!empty($resultado_local_8vos))
				@foreach($resultado_local_8vos as $resultado)
				<tbody align="center">
					<td class="success">{{$resultado_local_8vos[$count][0]->nombre}}</td>
					<td class="warning">{{$resultados_8vos[$count]->goles_local}}</td>
					<td class="warning">{{$resultados_8vos[$count]->goles_visitante}}</td>
					<td class="success">{{$resultado_visitante_8vos[$count][0]->nombre}}</td>
				</tbody>
				<?php $count++?>	
				@endforeach
				@endif
			</table>

		</div>
	</div>

	</fieldset>
	
	<fieldset>
	   	<legend > <div class="well well-sm" align="center"> Resultados 4tos de Final </div></legend>

	

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"> <b>Resultados de {{$user_name[0]->username}}</b> </div>
		<div class="panel-body">

		<table class="table">
			<thead>
					<th class="info">Equipo local</th>
					<th class="info">Goles local</th>
					<th class="info">Goles visitante</th>
					<th class="info">Equipo visitante</th>
		    </thead>

			<?php $count = 0?>
			@if(!empty($resultados_usuarios_4tos))
			@foreach($resultados_usuarios_4tos as $jugada)
				<tbody align="center">

						<td class="success">{{$nombre_local_4tos[$count][0]->nombre}}</td>
						<td class="warning">{{$jugada->goles_local}}</td>
						<td class="warning">{{$jugada->goles_visitante}}</td>
						<td class="success">{{$nombre_visitante_4tos[$count][0]->nombre}}</td>
				</tbody>
			<?php $count++?>	
			@endforeach
			@endif
		</table>
	</div>
	</div>
	</div>
			

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"><b>Resultados de la {{$quiniela->nombre}}<b> </div>
		<div class="panel-body">
			<table class="table">
				<thead >
					<th class="info">Equipo local</th>
					<th class="info">Goles local</th>
					<th class="info">Goles visitante</th>
					<th class="info">Equipo visitante</th>
				</thead>

				<?php $count = 0?>
				@if(!empty($resultado_local_4tos))
				@foreach($resultado_local_4tos as $resultado)
				<tbody align="center">
					<td class="success">{{$resultado_local_4tos[$count][0]->nombre}}</td>
					<td class="warning">{{$resultados_4tos[$count]->goles_local}}</td>
					<td class="warning">{{$resultados_4tos[$count]->goles_visitante}}</td>
					<td class="success">{{$resultado_visitante_4tos[$count][0]->nombre}}</td>
				</tbody>
				<?php $count++?>	
				@endforeach
				@endif
			</table>

		</div>
	</div>

	</fieldset>

	<fieldset>
	   	<legend > <div class="well well-sm" align="center"> Resutaldos Semi-Final </div></legend>

	

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"> <b>Resultados de {{$user_name[0]->username}}</b> </div>
		<div class="panel-body">

		<table class="table">
			<thead>
					<th class="info">Equipo local</th>
					<th class="info">Goles local</th>
					<th class="info">Goles visitante</th>
					<th class="info">Equipo visitante</th>
		    </thead>

			<?php $count = 0?>
			@if(!empty($resultados_usuarios_semi))
			@foreach($resultados_usuarios_semi as $jugada)
				<tbody align="center">

						<td class="success">{{$nombre_local_semi[$count][0]->nombre}}</td>
						<td class="warning">{{$jugada->goles_local}}</td>
						<td class="warning">{{$jugada->goles_visitante}}</td>
						<td class="success">{{$nombre_visitante_semi[$count][0]->nombre}}</td>
				</tbody>
			<?php $count++?>	
			@endforeach
			@endif
		</table>
	</div>
	</div>
	</div>
			

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"><b>Resultados de la {{$quiniela->nombre}}<b> </div>
		<div class="panel-body">
			<table class="table">
				<thead >
					<th class="info">Equipo local</th>
					<th class="info">Goles local</th>
					<th class="info">Goles visitante</th>
					<th class="info">Equipo visitante</th>
				</thead>

				<?php $count = 0?>
				@if(!empty($resultado_local_semi))
				@foreach($resultado_local_semi as $resultado)
				<tbody align="center">
					<td class="success">{{$resultado_local_semi[$count][0]->nombre}}</td>
					<td class="warning">{{$resultados_semi[$count]->goles_local}}</td>
					<td class="warning">{{$resultados_semi[$count]->goles_visitante}}</td>
					<td class="success">{{$resultado_visitante_semi[$count][0]->nombre}}</td>
				</tbody>
				<?php $count++?>	
				@endforeach
				@endif
			</table>

		</div>
	</div>

	</fieldset>

	<fieldset>
	   	<legend > <div class="well well-sm" align="center"> Resutaldos de la Gran Final </div></legend>

	

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"> <b>Resultados de {{$user_name[0]->username}}</b> </div>
		<div class="panel-body">

		<table class="table">
			<thead>
					<th class="info">Equipo local</th>
					<th class="info">Goles local</th>
					<th class="info">Goles visitante</th>
					<th class="info">Equipo visitante</th>
		    </thead>

			<?php $count = 0?>
			@if(!empty($resultados_usuarios_final))
			@foreach($resultados_usuarios_final as $jugada)
				<tbody align="center">

						<td class="success">{{$nombre_local_final[$count][0]->nombre}}</td>
						<td class="warning">{{$jugada->goles_local}}</td>
						<td class="warning">{{$jugada->goles_visitante}}</td>
						<td class="success">{{$nombre_visitante_final[$count][0]->nombre}}</td>
				</tbody>
			<?php $count++?>	
			@endforeach
			@endif
		</table>
	</div>
	</div>
	</div>
			

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"><b>Resultados de la {{$quiniela->nombre}}<b> </div>
		<div class="panel-body">
			<table class="table">
				<thead >
					<th class="info">Equipo local</th>
					<th class="info">Goles local</th>
					<th class="info">Goles visitante</th>
					<th class="info">Equipo visitante</th>
				</thead>

				<?php $count = 0?>
				@if(!empty($resultado_local_final))
				@foreach($resultado_local_final as $resultado)
				<tbody align="center">
					<td class="success">{{$resultado_local_final[$count][0]->nombre}}</td>
					<td class="warning">{{$resultados_final[$count]->goles_local}}</td>
					<td class="warning">{{$resultados_final[$count]->goles_visitante}}</td>
					<td class="success">{{$resultado_visitante_final[$count][0]->nombre}}</td>
				</tbody>
				<?php $count++?>	
				@endforeach
				@endif
			</table>

		</div>
	</div>

	</fieldset>

	<fieldset>
	   	<legend > <div class="well well-sm" align="center"> Campeon del Torneo </div></legend>

	

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"> <b>Campeon de {{$user_name[0]->username}}</b> </div>
		<div class="panel-body">

		<table class="table">
			<thead>
		    </thead>

			<?php $count = 0?>
			@if(!empty($campeon_usuario))
			@foreach($campeon_usuario as $jugada)
				<tbody align="center">

						<td class="success">{{$nombre_local_campeon[$count][0]->nombre}}</td>
				</tbody>
			<?php $count++?>	
			@endforeach
			@endif
		</table>
	</div>
	</div>
	</div>
			

		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"><b>Campeon de la {{$quiniela->nombre}}<b> </div>
		<div class="panel-body">
			<table class="table">
				<thead >
				</thead>

				<?php $count = 0?>
				@if(!empty($campeon_final))
				@foreach($campeon_final as $resultado)
				<tbody align="center">
					<td class="success">{{$resultado_local_campeon[$count][0]->nombre}}</td>
				</tbody>
				<?php $count++?>	
				@endforeach
				@endif
			</table>

		</div>
	</div>

	</fieldset>

	

</div>
@endsection
