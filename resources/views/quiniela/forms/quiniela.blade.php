<br><br>
		<div class="form-group">
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre de la Quiniela'])!!}
		</div>

		<div class="form-group">
			{!!Form::label('Costo:')!!}
			{!!Form::text('costo',null,['class'=>'form-control','placeholder'=>'Ingresa el monto a pagar'])!!}
		</div>


		<div class="form-group">
			{!!Form::label('Minimo de Usuarios:')!!}
			{!!Form::number('usuarios', '50')!!}
		</div>

		<div class="form-group">
			{!!Form::label('Numero de Ganadores:')!!}
			{!!Form::selectRange('ganadores', 1, 10, 3)!!}
		</div>

		<div class="form-group">
			{!!Form::label('Competición:')!!}
			{!!Form::select('torneo_liga',array('torneo' => ' Torneo ', 'liga' => ' Liga '), 'torneo')!!}
		</div>

		<div class="form-group">
			{!!Form::label('Fecha de Inicio:')!!}
			{!!Form::date('f_inicio',null,['class'=>'form-control','placeholder'=>'Ingresa la fecha en la cual arranca '])!!}
		</div>


		<div class="form-group">
			{!!Form::label('Fecha de Oferta:')!!}
			{!!Form::date('f_oferta',\Carbon\Carbon::now(),['class'=>'form-control','placeholder'=>'Ingresa la fecha de oferta al publico '])!!}
		</div>


		<div class="form-group">
			{!!Form::label('Fecha de Inscripción:')!!}
			{!!Form::date('f_inscripcion',null,['class'=>'form-control','placeholder'=>'Ingresa la fecha tope de inscripción '])!!}
		</div>