@extends('layouts.quiniela')
	
	@section('content')
				
	<style>
		img {
		    display: inline-block;
		}
	</style>

		<div class="container" >

			@include('alerts.success')
			@include('alerts.errors')
			@include('alerts.request')
		
		</div>

						
		<fieldset>
	   	<legend > <div class="well well-md" align="center"><font style="font-family: 'Architects Daughter', cursive;" color="#000" size="6"> Llena Tu Quiniela, Suerte</font> </div></legend>
			
	
	<div class="col-md-12 col">

	<?php $count = 0 ?>

	<div class="row col-wrap">
		
	<form action="pronostico_user_nuevo" method="POST">
		 {!! csrf_field() !!}
		<div class="col-md-12 " >
		
	
		<div class="panel panel-info" style=" border-color:#5cb85c;" >
		<div class="panel-heading " aling="center" style="background-color:#5cb85c; border-color:#5cb85c;">
		<h4 align="center"><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="5"> Partidos
                                                 </font></h4></div>
		<div class="panel-body">




			@foreach($partidos as $partido)
			<input name="id_partido_<?php echo $count ?>" type="hidden" id="id_partido_{{$count}}" value="{{$partido->id_partido}}" />
			<div class="row" align="center">
				<br>
				<div class="col-md-1"> <img class="img-responsive" src="../images/{{$partido->id_local}}.png"></div>
  				<div class="col-md-2"> <div align="center"><input name="equipo_local_{{$count}}" type="hidden"  value="{{$partido->nom_local}}" /><label>{{$partido->id_local}}</label></div> </div>
  				<div class="col-md-1"> <input name="goles_local_{{$count}}"  type="text" id="goles_local_{{$count}}"  size="2" maxlength="2" pattern="[0-9]*"/> </div>
  				<div class="col-md-1"> <label>VS</label></div>
  				<div class="col-md-1"> <input name="goles_visitante_{{$count}}"  type="text" id="goles_visitante_{{$count}}"  size="2" maxlength="2" pattern="[0-9]*"/> </div>
  				<div class="col-md-2"> <div align="center"><input name="equipo_visitante_{{$count}}" type="hidden"  value="{{$partido->nom_visitante}}" /><label>{{$partido->id_visitante}}</label></div> </div>
  				<div class="col-md-1"> <img class="img-responsive" src="../images/{{$partido->id_visitante}}.png"></div>
  				<div class="col-md-2"> <div align="center"><label >Fecha: {{$partido->fecha}}</label></div> </div>
			</div>
			<input name="id_partido_{{$count}}" type="hidden" id="id_partido_{{$count}}" value="{{$partido->id_partido}}" />
			<?php $count++; ?>
				<legend ><br></legend>
			@endforeach


	<input name="id_user" type="hidden" id="id_user" value="{{$id_user}}" />

		<input name="id_quiniela" type="hidden" id="id_quiniela" value="{{$id_quiniela}}" />

		<br>

		<div class="row" align="center">
			<button class="btn btn-success" value="{{ csrf_token() }}"><h4>Jugar</h4></button>
			<br><br>
		</div>

		</div>
		</fieldset>
		


	
		

		
		</form>
	

	</div>
	</div>			
</div>
	@endsection