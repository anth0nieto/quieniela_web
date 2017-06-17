@extends('layouts.quiniela')
	
	@section('content')
				<div class="container" >
						@include('alerts.success')
						@include('alerts.errors')
						@include('alerts.request')
				</div>


					
		<div class="col-md-12" align = "center">
		<div class="panel panel-info" style=" border-color:#5cb85c; margin-bottom:0px;" >
		<div class="panel-heading " style="background-color:#5cb85c; border-color:#5cb85c;">
				<h4 style="color:#fff"><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="5">Tabla de posiciones de la {{$quiniela[0]->nombre}}</font></h4></div>
		<div class="panel-body" style="padding:0px;">


		<div class="table-responsive" style="width:100%">
		<table class="table" style="margin-bottom: 0px;">
			<thead >
				<tr align="center" class="info">
				<td style="vertical-align:middle;" class="info"><strong>N° </strong></td>
				<td style="vertical-align:middle;" class="info"><strong>Nombre Usuario</strong></td>
				<td style="vertical-align:middle;" class="info"><strong>Puntos Totales</strong></td>
				<td style="vertical-align:middle;" class="info"><strong>Aciertos de Ganadores</strong></td>
				<td style="vertical-align:middle;" class="info"><strong>Aciertos de Resultados</strong></td>
				</tr>
		    </thead>
			
			<tbody>	
			@for ($i = 0; $i < count($ranking); $i++)
			    <td style="vertical-align:middle;" class="info" align="center"><h4>{{$i+1}}</h4></td>
			    <td style="vertical-align:middle;" class="info" align="center"><a href="/verPerfilLiga?id_user={{$ranking[$i][1] }}"><button type="button" class="btn btn-success btn-lg btn-block">{{$ranking[$i][0]}}</button></a></td>
				<td style="vertical-align:middle;" class="info" align="center"><h4>{{$ranking[$i][2]}}</h4></td>
				<td style="vertical-align:middle;" class="warning" align="center"><h4>{{$ranking[$i][3]}}</h4></td>
				<td style="vertical-align:middle;" class="warning" align="center"><h4>{{$ranking[$i][4]}}</h4></td>
			</tbody>
			@endfor
		</table>
		</div>
		

		</div>
		</div>
		</div>

		
	@endsection