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
						<p>Mis Quinielas</p>
							
							<p align="right">
								<a href="{!! URL::to('/logout')!!}"><button type="button" class="btn btn-danger">
  								<span class="glyphicon glyphicon-remove-circle" aria-hidden="true" href="/logout"></span> Salir
								</button></a></p>

							
							
							
						</div>

		

		<table class="table">
		<thead>
			<th>Nombre</th>
			<th>Fecha de inicio</th>
			<th>Usuarios inscritos</th>
			<th>Número de Ganadores</th>
			<th>Estado</th>
			<th>Acción</th>
			
		</thead>
			<?php  $username = Auth::user()->username?>

		@foreach($quinielas as $quiniela)
				<?php $num_user = 0?>
				<?php $num_user = DB::table('user_quinielas')->where('id_quiniela','=', $quiniela->id)
															->where('status','=','Inscrito')->count() ?>
				<tbody>
				<td>{{$quiniela->nombre}}</td>
				<td>{{$quiniela->f_inicio}}</td>
				<td>{{$num_user}}</td>
				<td>{{$quiniela->ganadores}}</td>
				<td>{{$quiniela->status}}</td>
				
				@if($quiniela->status == "Inscrito")
					<td>
					<form name="form"  action="{{action('PronosticoController@create')}}" method="GET" >
					<input name="id_user" type="hidden" id="id_user" size="30" maxlength="10" value=<?php echo $quiniela->id ?>  />		
					<button class="btn btn-success">Comienza</button>
					</form>
					</td>
					<?php $pronosticos = DB::table('pronosticos')->join('user_quinielas','user_quinielas.id','=','pronosticos.id_user')->where('user_quinielas.username','=',$username)->where('pronosticos.id_quiniela','=',$quiniela->id)->count()?>
					
					@if($pronosticos > 0)
						<td>
						<form name="form"  action="{{action('QuinielaController@verMiQuiniela')}}" method="GET" >
							<input name="id" type="hidden" id="id" size="30" maxlength="10" value=<?php echo $quiniela->id?>
							/>		
						<button class="btn btn-primary">Abrir</button>
						</form>
						</td>
					@endif
					
				@endif

				@if($quiniela->status != "Inscrito")
					<td>{!!link_to_route('quiniela.show', $title = 'Esperando Confirmación', $parameters = null, $attributes = ['class'=>'btn btn-info'])!!}</td>
				@endif


				</tbody>
				<?php $num_user = 0?>

		@endforeach
		
		</table>

				
					</div>
			
				</div>

		
	@endsection