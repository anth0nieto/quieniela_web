<br><br>
<div class="row col-wrap">
<div class="col-sm-8 col">

<div class="well">
 
     <fieldset>
 
        <legend>Nueva Quiniela</legend>
 

        <div class="form-group">
            <?php echo Form::label('nombret', 'Nombre:', ['class' => 'col-lg-4 control-label']); ?>

            <div class="col-lg-8">
           	 <?php echo Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Ingresa el nombre del Torneo']); ?>

            </div>
        </div>

<br><br>
	<div class="form-group">
            <?php echo Form::label('costo', 'Costo:', ['class' => 'col-lg-4 control-label']); ?>

            <div class="col-lg-8">
           	 <?php echo Form::text('costo',null,['class'=>'form-control', 'placeholder'=>'Ingresa el costo de Inscripción']); ?>

            </div>
        </div>

       

<br><br>
    <div class="form-group">
            <?php echo Form::label('tipo_quiniela', 'Tipo Quiniela:', ['class' => 'col-lg-4 control-label']); ?>

            <div class="col-lg-8">
             <?php echo Form::select('tipo_quiniela', array('torneo' => 'Torneo', 'liga' => 'Liga')); ?>

            </div>
        </div>

       

<br><br>
	<div class="form-group">
            <?php echo Form::label('fechat', 'Fecha de Inicio:', ['class' => 'col-lg-4 control-label']); ?>

            <div class="col-lg-8">
           	 <?php echo Form::date('fecha_inicio',null,['class'=>'form-control', 'placeholder'=>'Fecha en la cual inicia el torneo AAAA-MM-DD']); ?>

            </div>
        </div>

<br><br>
	<div class="form-group">
            <?php echo Form::label('fechaf', 'Fecha de Finalizacion:', ['class' => 'col-lg-4 control-label']); ?>

            <div class="col-lg-8">
           	 <?php echo Form::date('fecha_finalizacion',null,['class'=>'form-control', 'placeholder'=>'Fecha en la cual finaliza el torneo AAAA-MM-DD']); ?>

            </div>
        </div>

<br><br>

		<div class="form-group">
			<?php echo Form::label('fechaf', 'Minimo de Usuarios:', ['class' => 'col-lg-4 control-label']); ?>

			 <div class="col-lg-8">
			<?php echo Form::number('usuarios', '10'); ?>

		</div>

<br><br>
		<div class="form-group">
			<?php echo Form::label('fechaf', 'Número de Ganadores:', ['class' => 'col-lg-4 control-label']); ?>

			 <div class="col-lg-8">
			<?php echo Form::number('ganadores', '1'); ?>

		</div>


    </fieldset>
 
  
</div>
</div>
</div>

