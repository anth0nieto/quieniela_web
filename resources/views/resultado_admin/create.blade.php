@extends('layouts.gest_quiniela')
@section('content')

	@include('alerts.request')
	@include('alerts.success')

<form name="form"  action="{{action('ResultadoAdminController@store')}}" method="POST" >
				 {!! csrf_field() !!}								

	<?php $contador = 0; ?>

	@foreach($partidos as $partido)

		<?php $contador++; ?>
		<br><br>
		<div class="panel panel-primary">
		<div class="panel-heading">Fecha: {{$partido->fecha}}</div>
		<div class="panel-body">

		<div class="form-inline">
		<input name="id_partido_{{$contador}}" type="hidden" id="id_partido_{{$contador}}" value="{{$partido->id_partido}}" />
		{!!Form::label($partido->id_local)!!}

		<?php $partido_aux = DB::table('resultado_admins')
                            ->where('resultado_admins.id_partido', '=', $partido->id_partido)
                            ->select('resultado_admins.goles_local','resultado_admins.goles_visitante')
                            ->get(); ?>
		
		@if(!empty($partido_aux)  )
		<input type="text" name="local_{{$contador}}" placeholder="Id Local" value="{{$partido_aux[0]->goles_local}}" />
		@else
		<input type="text" name="local_{{$contador}}" placeholder="Id Local"  />
		@endif
		
		{!!Form::label('VS')!!}

		@if(!empty($partido_aux) )
		<input type="text" name="visitante_{{$contador}}" placeholder="Id Visitante" value="{{$partido_aux[0]->goles_visitante}}" /> 
		@else
		<input type="text" name="visitante_{{$contador}}" placeholder="Id Visitante"  /> 
		@endif
		
		{!!Form::label($partido->id_visitante)!!}
		</div>
		</div>
		</div>
	@endforeach

	<input name="contador" type="hidden" id="contador" value="{{$contador}}" />

<br>
<button class="btn btn-primary" value="{{ csrf_token() }}"  aling="center">Actualizar</button>
</form>

<br><br>

{!!Form::close()!!}
@stop	