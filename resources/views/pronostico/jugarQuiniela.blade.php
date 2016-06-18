@extends('layouts.quiniela')
	
	@section('content')
				
				<div class="header">

					<div class="top-header">
						


						@include('alerts.success')
						@include('alerts.errors')
						@include('alerts.request')
						<ul class="nav nav-pills" role="tablist">
  						<li role="presentation"><a href="{!!URL::to('/showQuinielas')!!}">Home<span class="badge"></span></a></li>
  						<li role="presentation"><a href="">{!! Auth::user()->username !!}</a></li>
  						<li role="presentation"><a href="#">Messages <span class="badge"></span></a></li>
  						<li role="presentation"><a href="{!!URL::to('/misQuinielas')!!}">Mis Quinielas<span class="badge"></span></a></li>
						</ul>

						<div class="logo">
						<p>Llena tu Quiniela!!! </p>
							
							<p align="right">
								<a href="{!! URL::to('/logout')!!}"><button type="button" class="btn btn-danger">
  								<span class="glyphicon glyphicon-remove-circle" aria-hidden="true" href="/logout"></span> Salir
								</button></a></p>

							
							
							
						</div>

		

		<table class="table">
			<?php $aux = 'Z'?>

			<br><br><br><br><br>
			
			<?php $count = 0 ?>
		@foreach($partidos as $partido)
			
				<br><br>
				
				
					
					@if($partido->grupo != $aux)
						@if($aux != 'Z')
							</div>
						@endif
							<div class="panel panel-primary">
							<div class="panel-heading">Grupo {{$partido->grupo}}  </div>
							<div class="panel-body">
					@endif
						
						
							<div class="form-inline" align="center">

									<input name="count" type="hidden" id="count" value=<?php echo $count?> />
									{!!Form::open(['route'=>'pronostico.store','method'=>'POST'])!!}
									{!!Form::label($partido->id_local)!!}
									{!!Form::text('goles_local_'.$count,null,['class'=>'form-control','placeholder'=>''])!!}
									
									<input name="id_partido_<?php echo $count ?>" type="hidden" id="id_partido_<?php echo $count ?>" value=<?php echo $partido->id_partido ?> />


									&nbsp;&nbsp;&nbsp;
									{!!Form::label('VS')!!}
									&nbsp;&nbsp;&nbsp;
									{!!Form::text('goles_visitante_'.$count,null,['class'=>'form-control','placeholder'=>''])!!}
									{!!Form::label($partido->id_visitante)!!}

								
									
							
							</div>
							
					@if($partido->grupo != $aux)
						</div>
						
					@endif
					
					<?php $aux = $partido->grupo?>
			<?php $count++ ?>
		@endforeach
		<br><br>
		</div>
		
		<div align="center">

			{!!Form::submit('Jugar',['class'=>'btn btn-success'])!!}
			{!!Form::close()!!}

		</div>
			
			
		</table>
			
			
				
					</div>
			
			
				</div>

			
			
			
	
	@endsection