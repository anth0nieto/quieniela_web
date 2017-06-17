@extends('layouts.quiniela')
	
	@section('content')
				
					<div class="container" >

						@include('alerts.success')
						@include('alerts.errors')
						@include('alerts.request')
					</div>

						
						


	   	<fieldset>
	   	<legend > <div class="well well-md" align="center"><font style="font-family: 'Architects Daughter', cursive;" color="#000" size="6"> Resultados de la Quiniela</font> <a>	
							<div align = "center">
								<form name="form"  action="{{action('UserController@miJugadaPDF')}}" method="GET" >
									<input name="id_user" type="hidden" id="id_user" size="30" maxlength="10" value="{{$id_user}}"  />
									<button class="btn btn-primary"> <span class="fa fa-download" aria-hidden="true"></span> Descargar PDF</button>
								</form>	
							</div>
							</a></div></legend>

		<div class="col-md-6 col">




	<div class="panel panel-info" style=" border-color:#5cb85c; " >
	<div class="panel-heading " style="background-color:#5cb85c; border-color:#5cb85c;">
	<h4 style="color:#fff" align="center">Resultados de la {{$user_name[0]->username}}</h4>
	</div>
	<div class="panel-body" >

		<div class="table-responsive" style="width:100%">
			<table class="table" style="margin-bottom: 0px;">
				<thead >
					<th style="vertical-align:middle;" class="info">Equipo local</th>
					<th style="vertical-align:middle;" class="info">Goles local</th>
					<th style="vertical-align:middle;" class="info">Goles visitante</th>
					<th style="vertical-align:middle;" class="info">Equipo visitante</th>
				</thead>


				@if(!empty($jugadas))
				@foreach($jugadas as $jugada)
				<tbody align="center">
						<td style="vertical-align:middle;" class="success">{{$jugada->nom_local}}</td>
						<td style="vertical-align:middle;" class="warning">{{$jugada->goles_local}}</td>
						<td style="vertical-align:middle;" class="warning">{{$jugada->goles_visitante}}</td>
						<td style="vertical-align:middle;" class="success">{{$jugada->nom_visitante}}</td>
				</tbody>
				@endforeach
				@endif
			</table>

		</div>
		</div>
		</div>
		</div>			

	<div class="col-md-6 col">	
	<div class="panel panel-info" style=" border-color:#5cb85c; " >
	<div class="panel-heading " style="background-color:#5cb85c; border-color:#5cb85c;">
	<h4 style="color:#fff" align="center">Resultados de la {{$quiniela->nombre}}</h4>
	</div>
	<div class="panel-body" >

		<div class="table-responsive" style="width:100%">

			<table class="table" style="margin-bottom: 0px;">
				<thead >
					<th style="vertical-align:middle;" class="info">Equipo local</th>
					<th style="vertical-align:middle;" class="info">Goles local</th>
					<th style="vertical-align:middle;" class="info">Goles visitante</th>
					<th style="vertical-align:middle;" class="info">Equipo visitante</th>
				</thead>

				@if(!empty($resultados))
				@foreach($resultados as $resultado)
				<tbody align="center">
					<td style="vertical-align:middle;" class="success">{{$resultado->nom_local}}</td>
					<td style="vertical-align:middle;" class="warning">{{$resultado->goles_local}}</td>
					<td style="vertical-align:middle;" class="warning">{{$resultado->goles_visitante}}</td>
					<td style="vertical-align:middle;" class="success">{{$resultado->nom_visitante}}</td>
				</tbody>
				@endforeach
				@endif
			</table>

		</div>
		</div>
		</div>
		</div>

		</fieldset>

@endsection
