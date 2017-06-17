<div class="col-sm-8 col-md-offset-2">


     <fieldset>
 
  
 <div class="panel panel-info" style=" border-color:#5cb85c;">
 <div class="panel-heading " align="center" style="background-color:#5cb85c; border-color:#5cb85c; "><h4 style="color:#fff"><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="5">Registro de Nuevo Usuario</font></h4></div>
 <div class="panel-body" style="padding:10px;" >

        
        <div class="col-sm-6">
        <br>
            {!! Form::label('nombret', 'Nombre', ['class' => 'col-lg-8 control-label']) !!}
            {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingrese su Nombre']) !!}
            
        </div>



	<div class="col-sm-6">
    <br>
        {!! Form::label('apellidot', 'Apellido', ['class' => 'col-lg-8 control-label']) !!}
        {!! Form::text('apellido',null,['class'=>'form-control', 'placeholder'=>'Ingrese su Apellido']) !!}
    </div>
    

    <div class="col-sm-6">
    <br>
        {!! Form::label('usernamet', 'Nombre de Usuario', ['class' => 'col-lg-8 control-label']) !!}
        {!! Form::text('username',null,['class'=>'form-control', 'placeholder'=>'Nombre de Usuario']) !!}
    </div>

    <div class="col-sm-6">
    <br>
        {!! Form::label('cedulat', 'Cedula', ['class' => 'col-lg-8 control-label']) !!}
        {!! Form::text('cedula',null,['class'=>'form-control', 'placeholder'=>'Cedula del usuario']) !!}
    </div>
    
    <div class="col-sm-6">
    <br>
        {!! Form::label('emailt', 'E-mail', ['class' => 'col-lg-8 control-label']) !!}
        {!! Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Email del usuario'] ) !!}
    </div>


    <div class="col-sm-6">
    <br>
        {!! Form::label('telefonot', 'Teléfono', ['class' => 'col-lg-8 control-label']) !!}
        {!! Form::text('telefono',null,['class'=>'form-control', 'placeholder'=>'Ejm: 0274-1234567']) !!}
    </div>

    <div class="col-sm-6">
    <br>
        {!! Form::label('passwordt', 'Contraseña', ['class' => 'col-lg-12 control-label']) !!}
        <input name="password" type="password" id="password" class="form-control" placeholder="Introduzca su contraseña" />
    </div>


    <div class="col-sm-6">
    <br>
        {!! Form::label('passconfirm', 'Confirme Contraseña', ['class' => 'col-lg-12 control-label']) !!}
        <input name="passwordconf" type="password" id="passwordconf" class="form-control" placeholder="Confirme su contraseña" />
    </div>



    <div class="col-sm-6">
    <br>
        {!! Form::label('fechat', 'Fecha de Nacimiento', ['class' => 'col-lg-12 control-label']) !!}
        {!! Form::date('fecha_nacimiento',null,['class'=>'form-control', 'placeholder'=>'Ejm: 25-10-1994']) !!}
    </div>
    

    <div class="col-sm-6">
    <br>
        {!! Form::label('ubicacion', 'Estado - Ciudad', ['class' => 'col-lg-8 control-label']) !!}
        {!! Form::text('ubicacion',null,['class'=>'form-control', 'placeholder'=>'Ejm: Barquisimeto - Lara']) !!}
    </div>

    <div class="col-sm-12">
    <br>
        <label class="checkbox-inline">
            <input type="checkbox" id="terminos" value="agree">Declaro ser mayor de edad y acepto los <a style="color:#337ab7;" target="_blank" href="{{ asset('terminosycondiciones.pdf') }}">TERMINOS Y CONDICIONES</a> de QuinielaGanadora.com.ve
        </label>
    </div>


    <div class="col-lg-4 col-md-offset-4" align="center">
        <br><br>
        <input id="registrar" type="submit" value="Registrar" class="btn btn-primary" disabled="true" />
    </div> 


    </div>
    </div>

    </fieldset>
 
  
</div>


		
		
		
	
		