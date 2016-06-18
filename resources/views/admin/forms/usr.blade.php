<div class="form-group">
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingresa el nombre del usuario'])!!}
		</div>

		<div class="form-group">
			{!!Form::label('Apellido:')!!}
			{!!Form::text('apellido',null,['class'=>'form-control', 'placeholder'=>'Ingresa el apellido del usuario'])!!}
		</div>
		
		<div class="form-group">
			{!!Form::label('Cedula:')!!}
			{!!Form::text('cedula',null,['class'=>'form-control', 'placeholder'=>'Ingresa la cedula del usuario'])!!}
		</div>

		<div class="form-group">
			{!!Form::label('Fecha de nacimiento:')!!}
			{!!Form::date('fecha_nacimiento',null,['class'=>'form-control', 'placeholder'=>'Ejm: 25-10-1994'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Username:')!!}
			{!!Form::text('username',null,['class'=>'form-control', 'placeholder'=>'Ingresa el Username'])!!}
		</div>

		<div class="form-group">
			{!!Form::label('E-mail:')!!}
			{!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Ingresa el email del usuario'])!!}
		</div>

		<div class="form-group">
			{!!Form::label('Password:')!!}
			{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa la contraseña'])!!}
		</div>

		