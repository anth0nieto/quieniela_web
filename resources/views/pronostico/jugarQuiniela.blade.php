@extends('layouts.quiniela')
	
	@section('content')
				
	<style>
		img {
		    display: inline-block;
		}
	</style>


	<div class="header">
	<div class="top-header">
						
		@include('alerts.success')
		@include('alerts.errors')
		@include('alerts.request')
		<ul class="nav nav-pills" role="tablist">
  			<li role="presentation"><a href="{!!URL::to('/showQuinielas')!!}">Quinielas Disponibles<span class="badge"></span></a></li>
  						<li role="presentation"><a href="{!!URL::to('/user/show')!!}">{!! Auth::user()->username !!}</a></li>
  						<li role="presentation"><a href="{!!URL::to('/misQuinielas')!!}">Mis Quinielas<span class="badge"></span></a></li>
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
		<div class="panel-heading" align="center"><h4>Llena Tu Quiniela! Suerte!</h4></div></div></p>
			
		</div>

		<?php $aux = 'Z'?>
		<br><br><br><br><br>
	
 
    <fieldset>

    <legend><div class="well well-sm" align="center"> Ingresar Pronóstico Fase De Grupo</div></legend>

	


	<?php $count = 0 ?>

	<div class="row col-wrap">
		
<!-- 	{!!Form::open(['route'=>'pronostico.store','method'=>'POST'])!!} -->
	<form action="/pronostico_user" method="POST">
		 {!! csrf_field() !!}

	@foreach($partidos as $partido)

		@if($partido->grupo != $aux)
			@if($aux != 'Z')
				</div>
				</div>
				</div>
			@endif

	
		<div class="col-sm-6 col">
		<div class="panel panel-info">
		<div class="panel-heading" align="center"> <b>Grupo {{$partido->grupo}}</b> </div>
		<div class="panel-body">
					
		@endif
			
				
			<!-- <input name="count" type="hidden" id="count" value=<?php echo $count?> /> -->
			<input name="id_partido_<?php echo $count ?>" type="hidden" id="id_partido_<?php echo $count ?>" value=<?php echo $partido->id_partido ?> />

			<div class="row" align="center">
				<br>
				<div class="col-xs-12 col-md-2"> <img class="img-responsive" src="{{$partidos[$count]->bandera}}" >  </div>
  				<div class="col-xs-12 col-md-2"> <div align="center"><input name="equipo_local_{{$count}}" type="hidden"  value="{!!($partidos[$count]->nombre)!!}" />{!!($partidos[$count]->nombre)!!}</div> </div>
  				<div class="col-xs-12 col-md-1"> <input name="goles_local_{{$count}}"  type="text" id="goles_local_{{$count}}"  size="2" maxlength="2" /> </div>
  				<div class="col-xs-12 col-md-2"> {!!Form::label('VS')!!} </div>
  				<div class="col-xs-12 col-md-1"> <input name="goles_visitante_{{$count}}"  type="text" id="goles_visitante_{{$count}}"  size="2" maxlength="2" /> </div>
  				<div class="col-xs-12 col-md-2"> <div align="center"><input name="equipo_visitante_{{$count}}" type="hidden"  value="{!!($partidos1[$count]->nombre)!!}" />{!!($partidos1[$count]->nombre)!!}</div> </div>
  				<div class="col-xs-12 col-md-2"> <img class="img-responsive" src="{{$partidos1[$count]->bandera}}" >  </div>
			</div>
  		



			<?php $aux = $partido->grupo?>
			<?php $count++; ?>
		



		@endforeach
		
		
		</div>
		</fieldset>


		<input name="id_user" type="hidden" id="id_user" value=<?php echo $id_user?> />

		<br>

		<div class="row" align="center">
			<button class="btn btn-success" value="{{ csrf_token() }}"><h4>Jugar</h4></button>
			<br><br>
		</div>
		

		
		</form>
<!-- 
		{!!Form::submit('Jugar',['class'=>'btn btn-success'])!!}
		{!!Form::close()!!} -->

	</div>
	</div>			

	@endsection