@extends('layouts.gest_quiniela')

@section('content')

	@include('alerts.request')
	@include('alerts.success')

{!!Form::open(['route'=>'equipo.store','method'=>'POST'])!!}

<div class="panel panel-primary">
<div class="panel-heading">Grupo A</div>
<div class="panel-body">
	
		<input name="id_quiniela_1" type="hidden" id="id_quiniela_1" size="30" maxlength="10" value=<?php echo $id_quiniela ?> />
		<input name="id_grupo_1" type="hidden" id="id_grupo_1" size="30" maxlength="10" value=<?php echo "A" ?> />

		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_1A',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_1A',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
				
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_2A',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_2A',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_3A',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_3A',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_4A',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_4A',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>

		<br>
		
</div>
</div>

<br>

<div class="panel panel-success">
<div class="panel-heading">Grupo B</div>
<div class="panel-body">
	
		
		
		<input name="id_grupo_2" type="hidden" id="id_grupo_1" size="30" maxlength="10" value=<?php echo "B" ?> />

		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_1B',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_1B',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
				
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_2B',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_2B',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_3B',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_3B',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_4B',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_4B',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>

		<br>


</div>
</div>

<br>

<div class="panel panel-danger">
<div class="panel-heading">Grupo C</div>
<div class="panel-body">
	
		
		
		<input name="id_grupo_3" type="hidden" id="id_grupo_1" size="30" maxlength="10" value=<?php echo "C" ?> />

		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_1C',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_1C',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
				
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_2C',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_2C',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_3C',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_3C',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_4C',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_4C',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>

		<br>


</div>
</div>

<br>


<div class="panel panel-primary">
<div class="panel-heading">Grupo D</div>
<div class="panel-body">
	
		
		
		<input name="id_grupo_4" type="hidden" id="id_grupo_1" size="30" maxlength="10" value=<?php echo "D" ?> />

		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_1D',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_1D',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
				
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_2D',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_2D',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_3D',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_3D',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_4D',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_4D',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>

		<br>

</div>
</div>

<br>



<div class="panel panel-success">
<div class="panel-heading">Grupo E</div>
<div class="panel-body">
	
		
		
		<input name="id_grupo_5" type="hidden" id="id_grupo_1" size="30" maxlength="10" value=<?php echo "E" ?> />

		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_1E',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_1E',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
				
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_2E',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_2E',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_3E',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_3E',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_4E',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_4E',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>

		<br>


</div>
</div>

<br>

<div class="panel panel-danger">
<div class="panel-heading">Grupo F</div>
<div class="panel-body">
	
		
		
		<input name="id_grupo_6" type="hidden" id="id_grupo_6" size="30" maxlength="10" value=<?php echo "F" ?> />

		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_1F',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_1F',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
				
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_2F',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_2F',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_3F',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_3F',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>
		<br>
		<div class="form-inline">
			{!!Form::label('Id:')!!}
			{!!Form::text('id_equipo_4F',null,['class'=>'form-control','placeholder'=>'Ingresa el Id'])!!}
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre_4F',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre'])!!}
		</div>

		<br>
</div>
</div>
<br>


{!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
<br><br>

{!!Form::close()!!}

	
@stop