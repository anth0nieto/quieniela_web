<br><br>
<div class="row col-wrap">
<div class="col-sm-8 col">

<div class="well">
 
     <fieldset>
 
        <legend>Nueva Quiniela</legend>
 

        <div class="form-group">
            {!! Form::label('nombret', 'Nombre:', ['class' => 'col-lg-4 control-label']) !!}
            <div class="col-lg-8">
           	 {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingresa el nombre del Torneo']) !!}
            </div>
        </div>

<br><br>
	<div class="form-group">
            {!! Form::label('costo', 'Costo:', ['class' => 'col-lg-4 control-label']) !!}
            <div class="col-lg-8">
           	 {!! Form::text('costo',null,['class'=>'form-control', 'placeholder'=>'Ingresa el costo de Inscripción']) !!}
            </div>
        </div>

       

<br><br>
    <div class="form-group">
            {!! Form::label('tipo_quiniela', 'Tipo Quiniela:', ['class' => 'col-lg-4 control-label']) !!}
            <div class="col-lg-8">
             {!! Form::select('tipo_quiniela', array('torneo' => 'Torneo', 'liga' => 'Liga')) !!}
            </div>
        </div>

<br><br>
    <div class="form-group">
            {!! Form::label('horaIni', 'Hora Inicio:', ['class' => 'col-lg-4 control-label']) !!}
            <div class="col-lg-8">
             {!! Form::date('horaInicio',null,['class'=>'form-control', 'placeholder'=>'Hora en la cual inicia el torneo 00:00:00']) !!}
            </div>
    </div>

       

<br><br>
	<div class="form-group">
            {!! Form::label('fechat', 'Fecha de Inicio:', ['class' => 'col-lg-4 control-label']) !!}
            <div class="col-lg-8">
           	 {!! Form::date('fecha_inicio',null,['class'=>'form-control', 'placeholder'=>'Fecha en la cual inicia el torneo AAAA-MM-DD']) !!}
            </div>
        </div>

<br><br>
	<div class="form-group">
            {!! Form::label('fechaf', 'Fecha de Finalizacion:', ['class' => 'col-lg-4 control-label']) !!}
            <div class="col-lg-8">
           	 {!! Form::date('fecha_finalizacion',null,['class'=>'form-control', 'placeholder'=>'Fecha en la cual finaliza el torneo AAAA-MM-DD']) !!}
            </div>
        </div>

<br><br>

		<div class="form-group">
			{!! Form::label('fechaf', 'Minimo de Usuarios:', ['class' => 'col-lg-4 control-label']) !!}
			 <div class="col-lg-8">
			{!!Form::number('usuarios', '10')!!}
		</div>

<br><br>
		<div class="form-group">
			{!! Form::label('fechaf', 'Número de Ganadores:', ['class' => 'col-lg-4 control-label']) !!}
			 <div class="col-lg-8">
			{!!Form::number('ganadores', '1')!!}
		</div>


    </fieldset>
 
  
</div>
</div>
</div>

