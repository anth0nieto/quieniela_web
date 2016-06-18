@extends('layouts.gest_quiniela')
@section('content')

	@include('alerts.request')
	@include('alerts.success')

{!!Form::open(['route'=>'resultado_A.store','method'=>'POST'])!!}

	<?php $contador = 0; ?>

	@foreach($partidos as $partido)

	@if($partido->id_quiniela == $id_quin)

		<?php $contador++; ?>
		<br><br>
		<div class="panel panel-primary">
		<div class="panel-heading">Fecha: <?php echo $partido->fecha ?></div>
		<div class="panel-body">

		<div class="form-inline">
		<input name="id_partido_<?php echo $contador?>" type="hidden" id="id_partido_<?php echo $contador?>" value=<?php echo $partido->id_partido ?> />
		{!!Form::label($partido->id_local)!!}
		{!!Form::text('local_'.$contador,null,['class'=>'form-control','placeholder'=>'Id Local'])!!}
		&nbsp;&nbsp;&nbsp;
		{!!Form::label('VS')!!}
		&nbsp;&nbsp;&nbsp;
		{!!Form::text('visitante_'.$contador,null,['class'=>'form-control','placeholder'=>'Id Visitante'])!!}
		{!!Form::label($partido->id_visitante)!!}
		</div>
		</div>
		</div>
	
		
	@endif
	@endforeach

	<input name="contador" type="hidden" id="contador" value=<?php echo $contador ?> />

<br><br>
{!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
<br><br>

{!!Form::close()!!}
@stop	