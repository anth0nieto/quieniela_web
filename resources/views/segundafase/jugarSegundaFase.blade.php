@extends('layouts.quiniela')
	
	@section('content')
				
	<style>
		imgfnd {
		    background-image: url(../images/euro4.png);
			background-repeat: no-repeat;
			background-attachment: fixed;
			}
	</style>



 		
	<div class="header">
	<div class="top-header">
						
		@include('alerts.success')
		@include('alerts.errors')
		@include('alerts.request')
		<ul class="nav nav-pills" role="tablist">
  			<li role="presentation"><a href="{!!URL::to('/showQuinielas')!!}">Quinielas Disponibles<span class="badge"></span></a></li>
  			<li role="presentation"><a href="{!!URL::to('/user/show')!!}">{!! Auth::user()->username !!}</a></li>
  			<li role="presentation"><a href="{!!URL::to('/misQuinielas')!!}">Mis Quinielas<span class="badge"></span></a></li>
			<li role="presentation">
				<a href="{!! URL::to('/misQuinielas')!!}"><button type="button" class="btn btn-success">
			  	<span class="fa fa-arrow-left" aria-hidden="true" href="/misQuinielas"></span> Volver
				</button></a>
			</li>

			<li role="presentation">
				<a href="{!! URL::to('/logout')!!}"><button type="button" class="btn btn-danger">
  				<span class="fa fa-paper-plane-o" aria-hidden="true" href="/logout"></span> Salir
				</button></a>
			</li>			

		</ul>

		<div class="logo">
			<p><div class="panel panel-info">
		<div class="panel-heading" align="center"><h4> Llena Tu Quiniela! Suerte!</h4></div></div></p>
			
		</div>

		<?php $aux = 'Z'?>
		<br><br><br><br><br>
	
 
    <fieldset>


	<div class="row" style="white-space: nowrap" >
		
	{!!Form::open(['route'=>'eliminatoria.store','method'=>'POST'])!!}

	<div class="col-sm-12 col">
	<div class="panel panel-info">
	<div class="panel-heading" align="center"> <b>Eliminación Directa </b> </div>
	<div class="panel-body"  style="background-repeat: no-repeat; background-image: url(../images/euro4.png); 
			background-position: 50% 0;">
		

		<input name="id_quiniela" type="hidden" id="id_quiniela" value="{{$id_quiniela}}"/>
		<input name="id_user" type="hidden" id="id_user" value="{{$id_user}}"/>	


		<div class="col-sm-12 col">

		<div class="row " align="center">
		
			<div class="col-sm-3 col">
		

			<div class="panel panel-info">
			<div class="panel-heading" align="center" style="background-color: #80cbc4; color:#fff;"> <b>Octavos A</b> </div>
			<div class="panel-body" style="background-color: #80cbc4;">

			<div class="row" align="center">												
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src="{{$partidos[0]->bandera}}" id="ban00">  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo00"> {{$partidos[0]->nombre}} </label></div>
							<div class="col-xs-12 col-md-3"> <input name="goles_local_0" type="text" id="goles_local_0" size="2" maxlength="2" class="form-control"/>
							<input name="id_local_0" type="hidden" id="id_local_0" value="{{$partidos[0]->id_local}}"/></div>
	  					</div>		
					</div>
			</div>
			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos1[0]->bandera}}" id="ban10">  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo10"> {{$partidos1[0]->nombre}} </label></div>
							<div class="col-xs-12 col-md-3"> <input name="goles_visitante_0" type="text" id="goles_visitante_0" size="2" maxlength="2" class="form-control"/>
							<input name="id_visitante_0" type="hidden" id="id_visitante_0" value="{{$partidos1[0]->id_visitante}}"/></div>
	  					</div>		
					</div>
			</div>
			
			</div>
			</div>

		
			<div class="panel panel-info">
			<div class="panel-heading" align="center" style="background-color: #80cbc4; color:#fff;"> <b>Octavos B</b> </div>
					<div class="panel-body" style="background-color: #80cbc4;">

			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos[1]->bandera}}" id="ban01">  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo01">{{$partidos[1]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_local_1" type="text" id="goles_local_1" size="2" maxlength="2" class="form-control"/>
							<input name="id_local_1" type="hidden" id="id_local_1" value="{{$partidos[1]->id_local}}" /></div>
	  					</div>		
					</div>
			</div>
			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos1[1]->bandera}}" id="ban11" >  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo11">{{$partidos1[1]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_visitante_1" type="text" id="goles_visitante_1" size="2" maxlength="2" class="form-control"/>
							<input name="id_visitante_1" type="hidden" id="id_visitante_1" value="{{$partidos1[1]->id_visitante}}" /></div>
	  					</div>		
					</div>

			</div>
			
			</div>
			</div>

			<div class="panel panel-info">
			<div class="panel-heading" align="center" style="background-color: #80cbc4; color:#fff;"> <b>Octavos C</b> </div>
			<div class="panel-body" style="background-color: #80cbc4;">

			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos[2]->bandera}}" id="ban02" >  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo02">{{$partidos[2]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_local_2" type="text" id="goles_local_2" size="2" maxlength="2" class="form-control"/>
							<input name="id_local_2" type="hidden" id="id_local_2" value="{{$partidos[2]->id_local}}" /></div>
	  					</div>		
					</div>
			</div>
			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos1[2]->bandera}}" id="ban12">  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo12">{{$partidos1[2]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_visitante_2" type="text" id="goles_visitante_2" size="2" maxlength="2" class="form-control"/>
							<input name="id_visitante_2" type="hidden" id="id_visitante_2" value="{{$partidos1[2]->id_visitante}}" /></div>
	  					</div>		
					</div>

			</div>
			
			</div>
			</div>


			<div class="panel panel-info">
			<div class="panel-heading" align="center" style="background-color: #80cbc4; color:#fff;"> <b>Octavos D</b> </div>
			<div class="panel-body" style="background-color: #80cbc4;">

			<div class="row" align="center">
					<div class="row" align="center">
					    <div class="col-sm-12 col">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos[3]->bandera}}" id="ban03" >  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo03">{{$partidos[3]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_local_3" type="text" id="goles_local_3" size="2" maxlength="2" class="form-control"/>
							<input name="id_local_3" type="hidden" id="id_local_3" value="{{$partidos[3]->id_local}}" /></div>
	  					</div>
	  				</div>		
			</div>
			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos1[3]->bandera}}" id="ban13">  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo13">{{$partidos1[3]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_visitante_3" type="text" id="goles_visitante_3" size="2" maxlength="2" class="form-control"/>
							<input name="id_visitante_3" type="hidden" id="id_visitante_3" value="{{$partidos1[3]->id_visitante}}" /></div>
	  					</div>		
					</div>

			</div>
			
			</div>
			</div>
		</div>



	<div class="col-sm-6 col">

		<div class="col-sm-7 col">
		
			<br><br><br>

			<div class="panel panel-info">
			<div class="panel-heading" align="center" style="background-color: #CCCCFF; color:#000;"> <b>Cuartos A-B</b> </div>
			<div class="panel-body" style="background-color:  #CCCCFF;">

			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban08">  </div>
							<div class="col-xs-12 col-md-4"> <label id="equipo08"> Esperando </label></div>
							<div class="col-xs-12 col-md-3"> <input name="goles_local_8" type="text" id="goles_local_8" size="2" maxlength="2" disabled class="form-control"/>
	  						<input name="id_local_8" type="hidden" id="id_local_8" value="" /></div>
	  					</div>								
					</div>
			</div>
			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban18">  </div>
							<div class="col-xs-12 col-md-4"> <label id="equipo18"> Esperando </label></div>
							<div class="col-xs-12 col-md-3"> <input name="goles_visitante_8" type="text" id="goles_visitante_8" size="2" maxlength="2" disabled class="form-control"/>
	  						<input name="id_visitante_8" type="hidden" id="id_visitante_8" value="" /></div>
	  					</div>		
					</div>

			</div>
			
			</div>
			</div>



		<div class="col-sm-12 col-md-offset-12">	
		<div class="panel panel-info">
		<div class="panel-heading" align="center" style="background-color: #80cbc4; color:#fff;"> <b>SemiFinal A</b> </div>
		<div class="panel-body" style="background-color: #80cbc4;">

			<div class="row" align="center">
				<div class="col-sm-12 ">
					<div class="row" align="center">
						<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban012">  </div>
						<div class="col-xs-12 col-md-4"> <label id="equipo012"> Esperando </label></div>
						<div class="col-xs-12 col-md-3"> <input name="goles_local_12" type="text" id="goles_local_12" size="2" maxlength="2" disabled class="form-control"/>
	  					<input name="id_local_12" type="hidden" id="id_local_12" value="" /></div>
	  				</div>		
				</div>
			</div>
			<div class="row" align="center">
				<div class="col-sm-12 ">
					<div class="row" align="center">
						<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban112">  </div>
						<div class="col-xs-12 col-md-4"> <label id="equipo112"> Esperando </label></div>
						<div class="col-xs-12 col-md-3"> <input name="goles_visitante_12" type="text" id="goles_visitante_12" size="2" maxlength="2" disabled class="form-control"/>
	  					<input name="id_visitante_12" type="hidden" id="id_visitante_12" value="" /></div>
	  				</div>		
				</div>
			</div>
			
			</div>
			</div>

			</div>	


			<br><br><br><br><br>	
			<br><br><br>	

			<div class="panel panel-info">
			<div class="panel-heading" align="center" style="background-color: #CCCCFF; color:#000;"> <b>Cuartos C-D</b> </div>
			<div class="panel-body" style="background-color: #CCCCFF;">


			<div class="row" align="center">
				<div class="col-sm-12 col">
					<div class="row" align="center">
						<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban09">  </div>
						<div class="col-xs-12 col-md-4"> <label id="equipo09"> Esperando </label></div>
						<div class="col-xs-12 col-md-3"> <input name="goles_local_9" type="text" id="goles_local_9" size="2" maxlength="2" disabled class="form-control"/>
						<input name="id_local_9" type="hidden" id="id_local_9" value="" /></div>
	  				</div>								
				</div>
			</div>
			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban19">  </div>
							<div class="col-xs-12 col-md-4"> <label id="equipo19"> Esperando </label></div>
							<div class="col-xs-12 col-md-3"> <input name="goles_visitante_9" type="text" id="goles_visitante_9" size="2" maxlength="2" disabled class="form-control"/>
							<input name="id_visitante_9" type="hidden" id="id_visitante_9" value="" /></div>
	  					</div>		
					</div>

			</div>
			
			</div>
			</div>
	
		</div>

	</div>

	</div>















<div class="col-sm-5 col-md-offset-7">	
		<div class="panel" style="background-color:#ffb74d;" >  
		<div class="panel-heading" align="center"> <b>Gran Final</b> </div>
			<div class="panel-body" style="background-color: #ffe082 ;">

			<div class="row" align="center">
					<div class="col-sm-12 ">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban014">  </div>
							<div class="col-xs-12 col-md-4"> <label id="equipo014"> Esperando </label></div>
							<div class="col-xs-12 col-md-2"> <input name="goles_local_14" type="text" id="goles_local_14" size="2" maxlength="2" disabled class="form-control"/>
							<input name="id_local_14" type="hidden" id="id_local_14" value="" /></div>
						</div>		
					</div>
			</div>
			
			<div class="row" align="center">
					<div class="col-sm-12 ">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban114">  </div>
							<div class="col-xs-12 col-md-4"> <label id="equipo114"> Esperando </label></div>
							<div class="col-xs-12 col-md-2"> <input name="goles_visitante_14" type="text" id="goles_visitante_14" size="2" maxlength="2" disabled class="form-control"/>
							<input name="id_visitante_14" type="hidden" id="id_visitante_14" value="" /></div>
	  					</div>		
					</div>

			</div>
			
			</div>
			</div>
			</div>	



			<div class="col-sm-3 col">
		

			<div class="panel panel-info">
			<div class="panel-heading" align="center" style="background-color: #80cbc4; color:#fff;"> <b>Octavos E</b> </div>
			<div class="panel-body" style="background-color: #80cbc4;">

			<div class="row" align="center">
					<div class="row" align="center">
						<div class="col-sm-12 col">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos[4]->bandera}}" id="ban04" >  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo04">{{$partidos[4]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_local_4" type="text" id="goles_local_4" size="2" maxlength="2" class="form-control"/>
							<input name="id_local_4" type="hidden" id="id_local_4" value="{{$partidos[4]->id_local}}" /></div>
	  					</div>
					</div>
			</div>

			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos1[4]->bandera}}" id="ban14">  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo14">{{$partidos1[4]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_visitante_4" type="text" id="goles_visitante_4" size="2" maxlength="2" class="form-control"/>
							<input name="id_visitante_4" type="hidden" id="id_visitante_4" value="{{$partidos1[4]->id_visitante}}" /></div>
	  					</div>		
					</div>
			</div>
			
			</div>
			</div>




		


			<div class="panel panel-info">
			<div class="panel-heading" align="center" style="background-color: #80cbc4; color:#fff;"> <b>Octavos F</b> </div>
			<div class="panel-body" style="background-color: #80cbc4;">

			<div class="row" align="center">
					<div class="row" align="center">
						<div class="col-sm-12 col">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos[5]->bandera}}" id="ban05" >  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo05">{{$partidos[5]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_local_5" type="text" id="goles_local_5" size="2" maxlength="2" class="form-control"/>
							<input name="id_local_5" type="hidden" id="id_local_5" value="{{$partidos[5]->id_local}}" /></div>
	  					</div>
					</div>
			</div>
			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos1[5]->bandera}}" id="ban15">  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo15">{{$partidos1[5]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_visitante_5" type="text" id="goles_visitante_5" size="2" maxlength="2" class="form-control"/>
							<input name="id_visitante_5" type="hidden" id="id_visitante_5" value="{{$partidos1[5]->id_visitante}}" /></div>
	  					</div>		
					</div>

			</div>
			
			</div>
			</div>

			<div class="panel panel-info">
			<div class="panel-heading" align="center" style="background-color: #80cbc4; color:#fff;"> <b>Octavos G</b> </div>
			<div class="panel-body" style="background-color: #80cbc4;">

			<div class="row" align="center">
					<div class="row" align="center">
						<div class="col-sm-12 col">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos[6]->bandera}}" id="ban06" >  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo06">{{$partidos[6]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_local_6" type="text" id="goles_local_6" size="2" maxlength="2" class="form-control"/>
							<input name="id_local_6" type="hidden" id="id_local_6" value="{{$partidos[6]->id_local}}" /></div>
	  					</div>	
					</div>
			</div>
			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos1[6]->bandera}}" id="ban16">  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo16">{{$partidos1[6]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_visitante_6" type="text" id="goles_visitante_6" size="2" maxlength="2" class="form-control"/>
							<input name="id_visitante_6" type="hidden" id="id_visitante_6" value="{{$partidos1[6]->id_visitante}}" /></div>
	  					</div>		
					</div>

			</div>
			
			</div>
			</div>


			<div class="panel panel-info">
			<div class="panel-heading" align="center" style="background-color: #80cbc4; color:#fff;"> <b>Octavos H</b> </div>
		
			<div class="panel-body" style="background-color: #80cbc4;">

			<div class="row" align="center">
					<div class="row" align="center">
						<div class="col-sm-12 col">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos[7]->bandera}}" id="ban07" >  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo07">{{$partidos[7]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_local_7" type="text" id="goles_local_7" size="2" maxlength="2" class="form-control"/>
							<input name="id_local_7" type="hidden" id="id_local_7" value="{{$partidos[7]->id_local}}" /></div>
	  					</div>		
					</div>
			</div>
			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" src= "{{$partidos1[7]->bandera}}" id="ban17">  </div>
							<div class="col-xs-12 col-md-4"> <label align="center" id="equipo17">{{$partidos1[7]->nombre}}</label> </div>
							<div class="col-xs-12 col-md-3"> <input name="goles_visitante_7" type="text" id="goles_visitante_7" size="2" maxlength="2" class="form-control" />
							<input name="id_visitante_7" type="hidden" id="id_visitante_7" value="{{$partidos1[7]->id_visitante}}" /></div>
	  					</div>			
					</div>

			</div>
			
			</div>
			</div>




		</div>



	<div class="col-sm-6 col">

		<div class="col-sm-7 col">
		
			<br><br><br><br>



			<div class="panel panel-info">
			<div class="panel-heading" align="center" style="background-color: #CCCCFF; color:#000;"> <b>Cuartos E-F</b> </div>
			<div class="panel-body" style="background-color: #CCCCFF;">

			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban010">  </div>
							<div class="col-xs-12 col-md-4"> <label id="equipo010"> Esperando </label></div>
							<div class="col-xs-12 col-md-3"> <input name="goles_local_10" type="text" id="goles_local_10" size="2" maxlength="2" disabled class="form-control"/>
	  						<input name="id_local_10" type="hidden" id="id_local_10" value="" /></div>
	  					</div>	
					</div>
			</div>
			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban110"></div>
							<div class="col-xs-12 col-md-4"> <label id="equipo110"> Esperando </label></div>
							<div class="col-xs-12 col-md-3"> <input name="goles_visitante_10" type="text" id="goles_visitante_10" size="2" maxlength="2" disabled class="form-control"/>
	  						<input name="id_visitante_10" type="hidden" id="id_visitante_10" value="" /></div>
	  					</div>		
					</div>

			</div>
			
			
			</div>
			</div>



		<div class="col-sm-12 col-md-offset-12">	
		<div class="panel panel-info">
		<div class="panel-heading" align="center" style="background-color: #80cbc4; color:#fff;"> <b>SemiFinal B</b> </div>
		<div class="panel-body" style="background-color: #80cbc4;">

		<div class="row" align="center">
			<div class="col-sm-12 ">
				<div class="row" align="center">
					<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban013">  </div>
					<div class="col-xs-12 col-md-4"> <label id="equipo013"> Esperando </label></div>
					<div class="col-xs-12 col-md-3"> <input name="goles_local_13" type="text" id="goles_local_13" size="2" maxlength="2" disabled class="form-control"/>
					<input name="id_local_13" type="hidden" id="id_local_13" value="" /></div>
				</div>
				</div>
			</div>
			<div class="row" align="center">
				<div class="col-sm-12 ">
					<div class="row" align="center">
						<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban113">  </div>
						<div class="col-xs-12 col-md-4"> <label id="equipo113"> Esperando </label></div>
						<div class="col-xs-12 col-md-3"> <input name="goles_visitante_13" type="text" id="goles_visitante_13" size="2" maxlength="2" disabled class="form-control"/>
						<input name="id_visitante_13" type="hidden" id="id_visitante_13" value="" /></div>
					</div>		
				</div>

			</div>
			
			</div>
			</div>
			</div>	


			<br><br><br><br><br>
			<br><br><br>	


			<div class="panel panel-info">
			<div class="panel-heading" align="center" style="background-color: #CCCCFF; color:#000;"> <b>Cuartos G-H</b> </div>
			<div class="panel-body" style="background-color: #CCCCFF;">

			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban011">  </div>
							<div class="col-xs-12 col-md-4"> <label id="equipo011"> Esperando </label></div>
							<div class="col-xs-12 col-md-3"> <input name="goles_local_11" type="text" id="goles_local_11" size="2" maxlength="2" disabled class="form-control"/>
	  						<input name="id_local_11" type="hidden" id="id_local_11" value="" /></div>
	  					</div>							
					</div>
			</div>
			<div class="row" align="center">
					<div class="col-sm-12 col">
						<div class="row" align="center">
							<div class="col-xs-12 col-md-4"> <img class="img-responsive" id="ban111">  </div>
							<div class="col-xs-12 col-md-4"> <label id="equipo111"> Esperando </label></div>
							<div class="col-xs-12 col-md-3"> <input name="goles_visitante_11" type="text" id="goles_visitante_11" size="2" maxlength="2" disabled class="form-control"/>
	  						<input name="id_visitante_11" type="hidden" id="id_visitante_11" value="" /></div>
	  					</div>		
					</div>
			</div>
			
			
			</div>
			</div>
	
		</div>

	</div>

	</div>
	</div>
	</div>


	</div>
	

		

		<div class="col-sm-6 col col-md-offset-3"> 

			<div class="panel panel-info">
			<div class="panel-body" >
			
				<div class="col-sm-12 col" align="center">
					<img class="img-responsive" style="width:50%;"  src= "../images/trofeo-euro.png">
				</div>	

				<div class="col-sm-12 col" align="center">
				
					<div class="well well-sm">
					<div class="form-inline">
						<label><h4> Campeon: </h4></label>
						<label id="equipo30"><h4> Esperando </h4></label>
						<input name="id_equipo30" type="hidden" id="id_equipo30" value="" />
						&nbsp;&nbsp;
						<img class="img" id="ban30">
					</div>
					</div>	
				</div>

				<br><br>
				<div class="col-xs-12 col-md-12" align="center"> 
					<button class="btn btn-success"><h4>Jugar</h4></button>	
				</div>

			</div>
			</div>
			</div>
		
			


		
		{!!Form::close()!!}

		

	
	</fieldset>


	</div>



</div>
</div>



</div>			


</fieldset>


@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <script>
    $(function(){

        $('#goles_local_0').change(function() {

	       	if(document.getElementById('goles_local_0').value != null &&
    	     document.getElementById('goles_visitante_0').value != null)
           	{	
           		if(parseInt(document.getElementById('goles_local_0').value) > parseInt(document.getElementById('goles_visitante_0').value))
           		{          
             		document.getElementById('equipo08').innerHTML = document.getElementById("equipo00").innerHTML;
             		document.getElementById('ban08').src = document.getElementById("ban00").src;
             		document.getElementById('goles_local_8').disabled = false;
             		document.getElementById('id_local_8').value = document.getElementById("id_local_0").value;
             		
             	}
             	else if(parseInt(document.getElementById('goles_local_0').value) == parseInt(document.getElementById('goles_visitante_0').value))
           		{          

             		if(confirm('¿Deseas que avance'+document.getElementById("equipo00").innerHTML+'?'))
					{
						document.getElementById('equipo08').innerHTML = document.getElementById("equipo00").innerHTML;
             			document.getElementById('ban08').src = document.getElementById("ban00").src;
             			document.getElementById('goles_local_8').disabled = false;
             			document.getElementById('id_local_8').value = document.getElementById("id_local_0").value;
					}
					else
					{
						document.getElementById('equipo08').innerHTML = document.getElementById("equipo10").innerHTML;
		             	document.getElementById('ban08').src = document.getElementById("ban10").src;
		             	document.getElementById('goles_local_8').disabled = false;
		             	document.getElementById('id_local_8').value = document.getElementById("id_visitante_0").value;
					}

             	}else{
		           	document.getElementById('equipo08').innerHTML = document.getElementById("equipo10").innerHTML;
	             	document.getElementById('ban08').src = document.getElementById("ban10").src;
	             	document.getElementById('goles_local_8').disabled = false;
	             	document.getElementById('id_local_8').value = document.getElementById("id_visitante_0").value;
	           	}
            }	
           		
        });


        $('#goles_visitante_0').change(function() {

       	if(document.getElementById('goles_local_0').value != null &&
       	   document.getElementById('goles_visitante_0').value != null)
       	{	

       		if(parseInt(document.getElementById('goles_local_0').value) > parseInt(document.getElementById('goles_visitante_0').value))
           		{          
             		document.getElementById('equipo08').innerHTML = document.getElementById("equipo00").innerHTML;
             		document.getElementById('ban08').src = document.getElementById("ban00").src;
             		document.getElementById('goles_local_8').disabled = false;
             		document.getElementById('id_local_8').value = document.getElementById("id_local_0").value;
             	}	
             	else if(parseInt(document.getElementById('goles_local_0').value) == parseInt(document.getElementById('goles_visitante_0').value))
           		{          

             		if(confirm('¿Deseas que avance'+document.getElementById("equipo00").innerHTML+'?'))
					{
						document.getElementById('equipo08').innerHTML = document.getElementById("equipo00").innerHTML;
             			document.getElementById('ban08').src = document.getElementById("ban00").src;
             			document.getElementById('goles_local_8').disabled = false;
             			document.getElementById('id_local_8').value = document.getElementById("id_local_0").value;
					}
					else
					{
						document.getElementById('equipo08').innerHTML = document.getElementById("equipo10").innerHTML;
		             	document.getElementById('ban08').src = document.getElementById("ban10").src;
		             	document.getElementById('goles_local_8').disabled = false;
		             	document.getElementById('id_local_8').value = document.getElementById("id_visitante_0").value;
					}

             	}else{
		           	document.getElementById('equipo08').innerHTML = document.getElementById("equipo10").innerHTML;
	             	document.getElementById('ban08').src = document.getElementById("ban10").src;
	             	document.getElementById('goles_local_8').disabled = false;
	             	document.getElementById('id_local_8').value = document.getElementById("id_visitante_0").value;
	           	}
           	}	
	
        });
    });
	</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

            $('#goles_local_1').change(function() {


            	if(document.getElementById('goles_local_1').value != null &&
            	   document.getElementById('goles_visitante_1').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_1').value) > parseInt(document.getElementById('goles_visitante_1').value))
              		{
	              		document.getElementById('equipo18').innerHTML = document.getElementById("equipo01").innerHTML;
	             		document.getElementById('ban18').src = document.getElementById("ban01").src;
	             		document.getElementById('goles_visitante_8').disabled = false;
	             		document.getElementById('id_visitante_8').value = document.getElementById("id_local_1").value;
	             	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_1').value) == parseInt(document.getElementById('goles_visitante_1').value))
           			{          

	             		if(confirm('¿Deseas que avance ' + document.getElementById('equipo01').innerHTML + ' ?'))
						{
							document.getElementById('equipo18').innerHTML = document.getElementById("equipo01").innerHTML;
		             		document.getElementById('ban18').src = document.getElementById("ban01").src;
		             		document.getElementById('goles_visitante_8').disabled = false;
		             		document.getElementById('id_visitante_8').value = document.getElementById("id_local_1").value;
		             	}
						else
						{
							document.getElementById('equipo18').innerHTML = document.getElementById("equipo11").innerHTML;
		             		document.getElementById('ban18').src = document.getElementById("ban11").src;
		             		document.getElementById('goles_visitante_8').disabled = false;
		             		document.getElementById('id_visitante_8').value = document.getElementById("id_visitante_1").value;
		             	}

	             	}else{
	             		document.getElementById('equipo18').innerHTML = document.getElementById("equipo11").innerHTML;
	             		document.getElementById('ban18').src = document.getElementById("ban11").src;
	             		document.getElementById('goles_visitante_8').disabled = false;
	             		document.getElementById('id_visitante_8').value = document.getElementById("id_visitante_1").value;
	             	}	
             	}	
            });

            $('#goles_visitante_1').change(function() {


            	if(document.getElementById('goles_local_1').value != null &&
            	   document.getElementById('goles_visitante_1').value != null)
              	{	

              		if(parseInt(document.getElementById('goles_local_1').value) > parseInt(document.getElementById('goles_visitante_1').value))
              		{
	              		document.getElementById('equipo18').innerHTML = document.getElementById("equipo01").innerHTML;
	             		document.getElementById('ban18').src = document.getElementById("ban01").src;
	             		document.getElementById('goles_visitante_8').disabled = false;
	             		document.getElementById('id_visitante_8').value = document.getElementById("id_local_1").value;
	             	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_1').value) == parseInt(document.getElementById('goles_visitante_1').value))
           			{          

	             		if(confirm('¿Deseas que avance ' + document.getElementById("equipo01").innerHTML + ' ?'))
						{
							document.getElementById('equipo18').innerHTML = document.getElementById("equipo01").innerHTML;
		             		document.getElementById('ban18').src = document.getElementById("ban01").src;
		             		document.getElementById('goles_visitante_8').disabled = false;
		             		document.getElementById('id_visitante_8').value = document.getElementById("id_local_1").value;
		             	}
						else
						{
							document.getElementById('equipo18').innerHTML = document.getElementById("equipo11").innerHTML;
		             		document.getElementById('ban18').src = document.getElementById("ban11").src;
		             		document.getElementById('goles_visitante_8').disabled = false;
		             		document.getElementById('id_visitante_8').value = document.getElementById("id_visitante_1").value;
		             	}

	             	}else{
	             		document.getElementById('equipo18').innerHTML = document.getElementById("equipo11").innerHTML;
	             		document.getElementById('ban18').src = document.getElementById("ban11").src;
	             		document.getElementById('goles_visitante_8').disabled = false;
	             		document.getElementById('id_visitante_8').value = document.getElementById("id_visitante_1").value;
	             	}	
             	}	
            });
        });
		</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

             $('#goles_visitante_2').change(function() {

        
            	if(document.getElementById('goles_local_2').value != null &&
            	   document.getElementById('goles_visitante_2').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_2').value) > parseInt(document.getElementById('goles_visitante_2').value))
              		{
	              		document.getElementById('equipo09').innerHTML = document.getElementById("equipo02").innerHTML;
	             		document.getElementById('ban09').src = document.getElementById("ban02").src;
	             		document.getElementById('goles_local_9').disabled = false;
	             		document.getElementById('id_local_9').value = document.getElementById("id_local_2").value;
	             	}	
             		else if(parseInt(document.getElementById('goles_local_2').value) == parseInt(document.getElementById('goles_visitante_2').value))
           			{          

	             		if(confirm('¿Deseas que avance ' + document.getElementById("equipo02").innerHTML + ' ?'))
						{
							document.getElementById('equipo09').innerHTML = document.getElementById("equipo02").innerHTML;
	             			document.getElementById('ban09').src = document.getElementById("ban02").src;
	             			document.getElementById('goles_local_9').disabled = false;
	             			document.getElementById('id_local_9').value = document.getElementById("id_local_2").value;
		             	}
						else
						{
							document.getElementById('equipo09').innerHTML = document.getElementById("equipo12").innerHTML;
		             		document.getElementById('ban09').src = document.getElementById("ban12").src;
		             		document.getElementById('goles_local_9').disabled = false;
		             		document.getElementById('id_local_9').value = document.getElementById("id_visitante_2").value;
		             	}

	             	}else{
	             		document.getElementById('equipo09').innerHTML = document.getElementById("equipo12").innerHTML;
	             		document.getElementById('ban09').src = document.getElementById("ban12").src;
	             		document.getElementById('goles_local_9').disabled = false;
	             		document.getElementById('id_local_9').value = document.getElementById("id_visitante_2").value;
	             	}	
             	}	
            });


             $('#goles_local_2').change(function() {

        
            	if(document.getElementById('goles_local_2').value != null &&
            	   document.getElementById('goles_visitante_2').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_2').value) > parseInt(document.getElementById('goles_visitante_2').value))
              		{
	              		document.getElementById('equipo09').innerHTML = document.getElementById("equipo02").innerHTML;
	             		document.getElementById('ban09').src = document.getElementById("ban02").src;
	             		document.getElementById('goles_local_9').disabled = false;
	             		document.getElementById('id_local_9').value = document.getElementById("id_local_2").value;
	             	}	
             		else if(parseInt(document.getElementById('goles_local_2').value) == parseInt(document.getElementById('goles_visitante_2').value))
           			{          

	             		if(confirm('¿Deseas que avance ' + document.getElementById("equipo02").innerHTML + ' ?'))
						{
							document.getElementById('equipo09').innerHTML = document.getElementById("equipo02").innerHTML;
	             			document.getElementById('ban09').src = document.getElementById("ban02").src;
	             			document.getElementById('goles_local_9').disabled = false;
	             			document.getElementById('id_local_9').value = document.getElementById("id_local_2").value;
		             	}
						else
						{
							document.getElementById('equipo09').innerHTML = document.getElementById("equipo12").innerHTML;
		             		document.getElementById('ban09').src = document.getElementById("ban12").src;
		             		document.getElementById('goles_local_9').disabled = false;
		             		document.getElementById('id_local_9').value = document.getElementById("id_visitante_2").value;
		             	}

	             	}else{
	             		document.getElementById('equipo09').innerHTML = document.getElementById("equipo12").innerHTML;
	             		document.getElementById('ban09').src = document.getElementById("ban12").src;
	             		document.getElementById('goles_local_9').disabled = false;
	             		document.getElementById('id_local_9').value = document.getElementById("id_visitante_2").value;
	             	}	
             	}	
            });


        });
		</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

             $('#goles_visitante_3').change(function() {

        
            	if(document.getElementById('goles_local_3').value != null &&
            	   document.getElementById('goles_visitante_3').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_3').value) > parseInt(document.getElementById('goles_visitante_3').value))
              		{
	              		document.getElementById('equipo19').innerHTML = document.getElementById("equipo03").innerHTML;
	             		document.getElementById('ban19').src = document.getElementById("ban03").src;
	             		document.getElementById('goles_visitante_9').disabled = false;
	             		document.getElementById('id_visitante_9').value = document.getElementById("id_local_3").value;
	             	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_3').value) == parseInt(document.getElementById('goles_visitante_3').value))
           			{          

	             		if(confirm('¿Deseas que avance ' + document.getElementById("equipo03").innerHTML + ' ?'))
						{
							document.getElementById('equipo19').innerHTML = document.getElementById("equipo03").innerHTML;
		             		document.getElementById('ban19').src = document.getElementById("ban03").src;
		             		document.getElementById('goles_visitante_9').disabled = false;
		             		document.getElementById('id_visitante_9').value = document.getElementById("id_local_3").value;
		             	}
						else
						{
							document.getElementById('equipo19').innerHTML = document.getElementById("equipo13").innerHTML;
		             		document.getElementById('ban19').src = document.getElementById("ban13").src;
		             		document.getElementById('goles_visitante_9').disabled = false;
		             		document.getElementById('id_visitante_9').value = document.getElementById("id_visitante_3").value;
		             	}

	             	}else{
	             		document.getElementById('equipo19').innerHTML = document.getElementById("equipo13").innerHTML;
	             		document.getElementById('ban19').src = document.getElementById("ban13").src;
	             		document.getElementById('goles_visitante_9').disabled = false;
	             		document.getElementById('id_visitante_9').value = document.getElementById("id_visitante_3").value;
	             	}	
             	}	
            });


			$('#goles_local_3').change(function() {

        
            	if(document.getElementById('goles_local_3').value != null &&
            	   document.getElementById('goles_visitante_3').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_3').value) > parseInt(document.getElementById('goles_visitante_3').value))
              		{
	              		document.getElementById('equipo19').innerHTML = document.getElementById("equipo03").innerHTML;
	             		document.getElementById('ban19').src = document.getElementById("ban03").src;
	             		document.getElementById('goles_visitante_9').disabled = false;
	             		document.getElementById('id_visitante_9').value = document.getElementById("id_local_3").value;
	             	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_3').value) == parseInt(document.getElementById('goles_visitante_3').value))
           			{          

	             		if(confirm('¿Deseas que avance ' + document.getElementById("equipo03").innerHTML + ' ?'))
						{
							document.getElementById('equipo19').innerHTML = document.getElementById("equipo03").innerHTML;
		             		document.getElementById('ban19').src = document.getElementById("ban03").src;
		             		document.getElementById('goles_visitante_9').disabled = false;
		             		document.getElementById('id_visitante_9').value = document.getElementById("id_local_3").value;
		             	}
						else
						{
							document.getElementById('equipo19').innerHTML = document.getElementById("equipo13").innerHTML;
		             		document.getElementById('ban19').src = document.getElementById("ban13").src;
		             		document.getElementById('goles_visitante_9').disabled = false;
		             		document.getElementById('id_visitante_9').value = document.getElementById("id_visitante_3").value;
		             	}

	             	}else{
	             		document.getElementById('equipo19').innerHTML = document.getElementById("equipo13").innerHTML;
	             		document.getElementById('ban19').src = document.getElementById("ban13").src;
	             		document.getElementById('goles_visitante_9').disabled = false;
	             		document.getElementById('id_visitante_9').value = document.getElementById("id_visitante_3").value;
	             	}	
             	}	
            });
 			});
	</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <script>
    $(function(){

        $('#goles_local_4').change(function() {

          	if(document.getElementById('goles_local_4').value != null &&
         	   document.getElementById('goles_visitante_4').value != null)
           	{	
           		if(parseInt(document.getElementById('goles_local_4').value) > parseInt(document.getElementById('goles_visitante_4').value))
           		{
             		document.getElementById('equipo010').innerHTML = document.getElementById("equipo04").innerHTML;
             		document.getElementById('ban010').src = document.getElementById("ban04").src;
             		document.getElementById('goles_local_10').disabled = false;
             		document.getElementById('id_local_10').value = document.getElementById("id_local_4").value;
             	
             	}	
             	else if(parseInt(document.getElementById('goles_local_4').value) == parseInt(document.getElementById('goles_visitante_4').value))
           		{          

	             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo04").innerHTML + ' ?'))
					{
						document.getElementById('equipo010').innerHTML = document.getElementById("equipo04").innerHTML;
             			document.getElementById('ban010').src = document.getElementById("ban04").src;
             			document.getElementById('goles_local_10').disabled = false;
             			document.getElementById('id_local_10').value = document.getElementById("id_local_4").value;
		            }
					else
					{
						document.getElementById('equipo010').innerHTML = document.getElementById("equipo14").innerHTML;
             			document.getElementById('ban010').src = document.getElementById("ban14").src;
             			document.getElementById('goles_local_10').disabled = false;
             			document.getElementById('id_local_10').value = document.getElementById("id_visitante_4").value;
		            }	

             	}else{
             		document.getElementById('equipo010').innerHTML = document.getElementById("equipo14").innerHTML;
             		document.getElementById('ban010').src = document.getElementById("ban14").src;
             		document.getElementById('goles_local_10').disabled = false;
             		document.getElementById('id_local_10').value = document.getElementById("id_visitante_4").value;
             	}	
           	}	
        });


        $('#goles_visitante_4').change(function() {

   
      	if(document.getElementById('goles_local_4').value != null &&
           document.getElementById('goles_visitante_4').value != null)
       	{	
   			if(parseInt(document.getElementById('goles_local_4').value) > parseInt(document.getElementById('goles_visitante_4').value))
           		{
             		document.getElementById('equipo010').innerHTML = document.getElementById("equipo04").innerHTML;
             		document.getElementById('ban010').src = document.getElementById("ban04").src;
             		document.getElementById('goles_local_10').disabled = false;
             		document.getElementById('id_local_10').value = document.getElementById("id_local_4").value;
             	
             	}	
             	else if(parseInt(document.getElementById('goles_local_4').value) == parseInt(document.getElementById('goles_visitante_4').value))
           		{          

	             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo04").innerHTML + ' ?'))
					{
						document.getElementById('equipo010').innerHTML = document.getElementById("equipo04").innerHTML;
             			document.getElementById('ban010').src = document.getElementById("ban04").src;
             			document.getElementById('goles_local_10').disabled = false;
             			document.getElementById('id_local_10').value = document.getElementById("id_local_4").value;
		            }
					else
					{
						document.getElementById('equipo010').innerHTML = document.getElementById("equipo14").innerHTML;
             			document.getElementById('ban010').src = document.getElementById("ban14").src;
             			document.getElementById('goles_local_10').disabled = false;
             			document.getElementById('id_local_10').value = document.getElementById("id_visitante_4").value;
		            }	

             	}else{
             		document.getElementById('equipo010').innerHTML = document.getElementById("equipo14").innerHTML;
             		document.getElementById('ban010').src = document.getElementById("ban14").src;
             		document.getElementById('goles_local_10').disabled = false;
             		document.getElementById('id_local_10').value = document.getElementById("id_visitante_4").value;
             	}	
        }		
       		
        });
    });
	</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

            $('#goles_local_5').change(function() {


            	if(document.getElementById('goles_local_5').value != null &&
            	   document.getElementById('goles_visitante_5').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_5').value) > parseInt(document.getElementById('goles_visitante_5').value))
              		{
	              		document.getElementById('equipo110').innerHTML = document.getElementById("equipo05").innerHTML;
	             		document.getElementById('ban110').src = document.getElementById("ban05").src;
	             		document.getElementById('goles_visitante_10').disabled = false;
	             		document.getElementById('id_visitante_10').value = document.getElementById("id_local_4").value;
	             	

	             	}	
             		else if(parseInt(document.getElementById('goles_local_5').value) == parseInt(document.getElementById('goles_visitante_5').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo05").innerHTML + ' ?'))
						{
							document.getElementById('equipo110').innerHTML = document.getElementById("equipo05").innerHTML;
	             			document.getElementById('ban110').src = document.getElementById("ban05").src;
	             			document.getElementById('goles_visitante_10').disabled = false;
	             			document.getElementById('id_visitante_10').value = document.getElementById("id_local_4").value;
			            }
						else
						{
							document.getElementById('equipo110').innerHTML = document.getElementById("equipo15").innerHTML;
	             			document.getElementById('ban110').src = document.getElementById("ban15").src;
	             			document.getElementById('goles_visitante_10').disabled = false;
	             			document.getElementById('id_visitante_10').value = document.getElementById("id_visitante_4").value;
			            }	

	             	}else{
	             		document.getElementById('equipo110').innerHTML = document.getElementById("equipo15").innerHTML;
	             		document.getElementById('ban110').src = document.getElementById("ban15").src;
	             		document.getElementById('goles_visitante_10').disabled = false;
	             		document.getElementById('id_visitante_10').value = document.getElementById("id_visitante_4").value;
	             	}	
             	}	
            });

            $('#goles_visitante_5').change(function() {


            	if(document.getElementById('goles_local_5').value != null &&
            	   document.getElementById('goles_visitante_5').value != null)
              	{	

              		if(parseInt(document.getElementById('goles_local_5').value) > parseInt(document.getElementById('goles_visitante_5').value))
              		{
	              		document.getElementById('equipo110').innerHTML = document.getElementById("equipo05").innerHTML;
	             		document.getElementById('ban110').src = document.getElementById("ban05").src;
	             		document.getElementById('goles_visitante_10').disabled = false;
	             		document.getElementById('id_visitante_10').value = document.getElementById("id_local_4").value;
	             	

	             	}	
             		else if(parseInt(document.getElementById('goles_local_5').value) == parseInt(document.getElementById('goles_visitante_5').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo05").innerHTML + ' ?'))
						{
							document.getElementById('equipo110').innerHTML = document.getElementById("equipo05").innerHTML;
	             			document.getElementById('ban110').src = document.getElementById("ban05").src;
	             			document.getElementById('goles_visitante_10').disabled = false;
	             			document.getElementById('id_visitante_10').value = document.getElementById("id_local_4").value;
			            }
						else
						{
							document.getElementById('equipo110').innerHTML = document.getElementById("equipo15").innerHTML;
	             			document.getElementById('ban110').src = document.getElementById("ban15").src;
	             			document.getElementById('goles_visitante_10').disabled = false;
	             			document.getElementById('id_visitante_10').value = document.getElementById("id_visitante_4").value;
			            }	

	             	}else{
	             		document.getElementById('equipo110').innerHTML = document.getElementById("equipo15").innerHTML;
	             		document.getElementById('ban110').src = document.getElementById("ban15").src;
	             		document.getElementById('goles_visitante_10').disabled = false;
	             		document.getElementById('id_visitante_10').value = document.getElementById("id_visitante_4").value;
	             	}	
             	}	
            });
        });
		</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

            $('#goles_local_6').change(function() {


            	if(document.getElementById('goles_local_6').value != null &&
            	   document.getElementById('goles_visitante_6').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_6').value) > parseInt(document.getElementById('goles_visitante_6').value))
              		{
	              		document.getElementById('equipo011').innerHTML = document.getElementById("equipo06").innerHTML;
	             		document.getElementById('ban011').src = document.getElementById("ban06").src;
	             		document.getElementById('goles_local_11').disabled = false;
	             		document.getElementById('id_local_11').value = document.getElementById("id_local_6").value;
	             	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_6').value) == parseInt(document.getElementById('goles_visitante_6').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo06").innerHTML + ' ?'))
						{
							document.getElementById('equipo011').innerHTML = document.getElementById("equipo06").innerHTML;
	             			document.getElementById('ban011').src = document.getElementById("ban06").src;
	             			document.getElementById('goles_local_11').disabled = false;
	             			document.getElementById('id_local_11').value = document.getElementById("id_local_6").value;
			            }
						else
						{
							document.getElementById('equipo011').innerHTML = document.getElementById("equipo16").innerHTML;
	             			document.getElementById('ban011').src = document.getElementById("ban16").src;
	             			document.getElementById('goles_local_11').disabled = false;
							document.getElementById('id_local_11').value = document.getElementById("id_visitante_6").value;
			            }	

	             	}else{
	             		document.getElementById('equipo011').innerHTML = document.getElementById("equipo16").innerHTML;
	             		document.getElementById('ban011').src = document.getElementById("ban16").src;
	             		document.getElementById('goles_local_11').disabled = false;
						document.getElementById('id_local_11').value = document.getElementById("id_visitante_6").value;
	             	}	
             	}	
            });

            $('#goles_visitante_6').change(function() {


            	if(document.getElementById('goles_local_6').value != null &&
            	   document.getElementById('goles_visitante_6').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_6').value) > parseInt(document.getElementById('goles_visitante_6').value))
              		{
	              		document.getElementById('equipo011').innerHTML = document.getElementById("equipo06").innerHTML;
	             		document.getElementById('ban011').src = document.getElementById("ban06").src;
	             		document.getElementById('goles_local_11').disabled = false;
	             		document.getElementById('id_local_11').value = document.getElementById("id_local_6").value;
	             	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_6').value) == parseInt(document.getElementById('goles_visitante_6').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo06").innerHTML + ' ?'))
						{
							document.getElementById('equipo011').innerHTML = document.getElementById("equipo06").innerHTML;
	             			document.getElementById('ban011').src = document.getElementById("ban06").src;
	             			document.getElementById('goles_local_11').disabled = false;
	             			document.getElementById('id_local_11').value = document.getElementById("id_local_6").value;
			            }
						else
						{
							document.getElementById('equipo011').innerHTML = document.getElementById("equipo16").innerHTML;
	             			document.getElementById('ban011').src = document.getElementById("ban16").src;
	             			document.getElementById('goles_local_11').disabled = false;
							document.getElementById('id_local_11').value = document.getElementById("id_visitante_6").value;
			            }	

	             	}else{
	             		document.getElementById('equipo011').innerHTML = document.getElementById("equipo16").innerHTML;
	             		document.getElementById('ban011').src = document.getElementById("ban16").src;
	             		document.getElementById('goles_local_11').disabled = false;
						document.getElementById('id_local_11').value = document.getElementById("id_visitante_6").value;
	             	}	
             	}

            });
        });
		</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

             $('#goles_visitante_7').change(function() {

        
            	if(document.getElementById('goles_local_7').value != null &&
            	   document.getElementById('goles_visitante_7').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_7').value) > parseInt(document.getElementById('goles_visitante_7').value))
              		{
	       				document.getElementById('equipo111').innerHTML = document.getElementById("equipo07").innerHTML;
	             		document.getElementById('ban111').src = document.getElementById("ban07").src;
	             		document.getElementById('goles_visitante_11').disabled = false;
	             		document.getElementById('id_visitante_11').value = document.getElementById("id_local_7").value;
			      	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_7').value) == parseInt(document.getElementById('goles_visitante_7').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo07").innerHTML + ' ?'))
						{
							document.getElementById('equipo111').innerHTML = document.getElementById("equipo07").innerHTML;
	             			document.getElementById('ban111').src = document.getElementById("ban07").src;
	             			document.getElementById('goles_visitante_11').disabled = false;
	             			document.getElementById('id_visitante_11').value = document.getElementById("id_local_7").value;
			            }
						else
						{
							document.getElementById('equipo111').innerHTML = document.getElementById("equipo17").innerHTML;
	             			document.getElementById('ban111').src = document.getElementById("ban17").src;
	             			document.getElementById('goles_visitante_11').disabled = false;
	             			document.getElementById('id_visitante_11').value = document.getElementById("id_visitante_7").value;
			            }	


			      	}else{
	             		document.getElementById('equipo111').innerHTML = document.getElementById("equipo17").innerHTML;
	             		document.getElementById('ban111').src = document.getElementById("ban17").src;
	             		document.getElementById('goles_visitante_11').disabled = false;
	             		document.getElementById('id_visitante_11').value = document.getElementById("id_visitante_7").value;
	             	}	
             	}	
            });


			$('#goles_local_7').change(function() {

        
            	if(document.getElementById('goles_local_7').value != null &&
            	   document.getElementById('goles_visitante_7').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_7').value) > parseInt(document.getElementById('goles_visitante_7').value))
              		{
	       				document.getElementById('equipo111').innerHTML = document.getElementById("equipo07").innerHTML;
	             		document.getElementById('ban111').src = document.getElementById("ban07").src;
	             		document.getElementById('goles_visitante_11').disabled = false;
	             		document.getElementById('id_visitante_11').value = document.getElementById("id_local_7").value;
			      	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_7').value) == parseInt(document.getElementById('goles_visitante_7').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo07").innerHTML + ' ?'))
						{
							document.getElementById('equipo111').innerHTML = document.getElementById("equipo07").innerHTML;
	             			document.getElementById('ban111').src = document.getElementById("ban07").src;
	             			document.getElementById('goles_visitante_11').disabled = false;
	             			document.getElementById('id_visitante_11').value = document.getElementById("id_local_7").value;
			            }
						else
						{
							document.getElementById('equipo111').innerHTML = document.getElementById("equipo17").innerHTML;
	             			document.getElementById('ban111').src = document.getElementById("ban17").src;
	             			document.getElementById('goles_visitante_11').disabled = false;
	             			document.getElementById('id_visitante_11').value = document.getElementById("id_visitante_7").value;
			            }	


			      	}else{
	             		document.getElementById('equipo111').innerHTML = document.getElementById("equipo17").innerHTML;
	             		document.getElementById('ban111').src = document.getElementById("ban17").src;
	             		document.getElementById('goles_visitante_11').disabled = false;
	             		document.getElementById('id_visitante_11').value = document.getElementById("id_visitante_7").value;
	             	}	
             	}	
            });
 			});
	</script>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

             $('#goles_visitante_8').change(function() {

        
            	if(document.getElementById('goles_local_8').value != null &&
            	   document.getElementById('goles_visitante_8').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_8').value) > parseInt(document.getElementById('goles_visitante_8').value))
              		{
	       				document.getElementById('equipo012').innerHTML = document.getElementById("equipo08").innerHTML;
	             		document.getElementById('ban012').src = document.getElementById("ban08").src;
	             		document.getElementById('goles_local_12').disabled = false;
	             		document.getElementById('id_local_12').value = document.getElementById("id_local_8").value;
			      	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_8').value) == parseInt(document.getElementById('goles_visitante_8').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo08").innerHTML + ' ?'))
						{
							document.getElementById('equipo012').innerHTML = document.getElementById("equipo08").innerHTML;
	             			document.getElementById('ban012').src = document.getElementById("ban08").src;
	             			document.getElementById('goles_local_12').disabled = false;
	             			document.getElementById('id_local_12').value = document.getElementById("id_local_8").value;
			            }
						else
						{
							document.getElementById('equipo012').innerHTML = document.getElementById("equipo18").innerHTML;
	             			document.getElementById('ban012').src = document.getElementById("ban18").src;
	             			document.getElementById('goles_local_12').disabled = false;
	             			document.getElementById('id_local_12').value = document.getElementById("id_visitante_8").value;
			            }

			      	}else{
	             		document.getElementById('equipo012').innerHTML = document.getElementById("equipo18").innerHTML;
	             		document.getElementById('ban012').src = document.getElementById("ban18").src;
	             		document.getElementById('goles_local_12').disabled = false;
	             		document.getElementById('id_local_12').value = document.getElementById("id_visitante_8").value;
	             	}	
             	}	
            });


			$('#goles_local_8').change(function() {

        
            	if(document.getElementById('goles_local_8').value != null &&
            	   document.getElementById('goles_visitante_8').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_8').value) > parseInt(document.getElementById('goles_visitante_8').value))
              		{
	       				document.getElementById('equipo012').innerHTML = document.getElementById("equipo08").innerHTML;
	             		document.getElementById('ban012').src = document.getElementById("ban08").src;
	             		document.getElementById('goles_local_12').disabled = false;
	             		document.getElementById('id_local_12').value = document.getElementById("id_local_8").value;
			      	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_8').value) == parseInt(document.getElementById('goles_visitante_8').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo08").innerHTML + ' ?'))
						{
							document.getElementById('equipo012').innerHTML = document.getElementById("equipo08").innerHTML;
	             			document.getElementById('ban012').src = document.getElementById("ban08").src;
	             			document.getElementById('goles_local_12').disabled = false;
	             			document.getElementById('id_local_12').value = document.getElementById("id_local_8").value;
			            }
						else
						{
							document.getElementById('equipo012').innerHTML = document.getElementById("equipo18").innerHTML;
	             			document.getElementById('ban012').src = document.getElementById("ban18").src;
	             			document.getElementById('goles_local_12').disabled = false;
	             			document.getElementById('id_local_12').value = document.getElementById("id_visitante_8").value;
			            }

			      	}else{
	             		document.getElementById('equipo012').innerHTML = document.getElementById("equipo18").innerHTML;
	             		document.getElementById('ban012').src = document.getElementById("ban18").src;
	             		document.getElementById('goles_local_12').disabled = false;
	             		document.getElementById('id_local_12').value = document.getElementById("id_visitante_8").value;
	             	}
             	}	
            });
 			});
	</script>








		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

             $('#goles_visitante_9').change(function() {

        
            	if(document.getElementById('goles_local_9').value != null &&
            	   document.getElementById('goles_visitante_9').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_9').value) > parseInt(document.getElementById('goles_visitante_9').value))
              		{
	       				document.getElementById('equipo112').innerHTML = document.getElementById("equipo09").innerHTML;
	             		document.getElementById('ban112').src = document.getElementById("ban09").src;
	             		document.getElementById('goles_visitante_12').disabled = false;
	             		document.getElementById('id_visitante_12').value = document.getElementById("id_local_9").value;
			      	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_9').value) == parseInt(document.getElementById('goles_visitante_9').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo09").innerHTML + ' ?'))
						{
							document.getElementById('equipo112').innerHTML = document.getElementById("equipo09").innerHTML;
	             			document.getElementById('ban112').src = document.getElementById("ban09").src;
	             			document.getElementById('goles_visitante_12').disabled = false;
	             			document.getElementById('id_visitante_12').value = document.getElementById("id_local_9").value;
			            }
						else
						{
							document.getElementById('equipo112').innerHTML = document.getElementById("equipo19").innerHTML;
	             			document.getElementById('ban112').src = document.getElementById("ban19").src;
	             			document.getElementById('goles_visitante_12').disabled = false;
	             			document.getElementById('id_visitante_12').value = document.getElementById("id_visitante_9").value;
			            }

			      	}else{
	             		document.getElementById('equipo112').innerHTML = document.getElementById("equipo19").innerHTML;
	             		document.getElementById('ban112').src = document.getElementById("ban19").src;
	             		document.getElementById('goles_visitante_12').disabled = false;
	             		document.getElementById('id_visitante_12').value = document.getElementById("id_visitante_9").value;
	             	}	
             	}	
            });


			$('#goles_local_9').change(function() {

        
            	if(document.getElementById('goles_local_9').value != null &&
            	   document.getElementById('goles_visitante_9').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_9').value) > parseInt(document.getElementById('goles_visitante_9').value))
              		{
	       				document.getElementById('equipo112').innerHTML = document.getElementById("equipo09").innerHTML;
	             		document.getElementById('ban112').src = document.getElementById("ban09").src;
	             		document.getElementById('goles_visitante_12').disabled = false;
	             		document.getElementById('id_visitante_12').value = document.getElementById("id_local_9").value;
			      	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_9').value) == parseInt(document.getElementById('goles_visitante_9').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo09").innerHTML + ' ?'))
						{
							document.getElementById('equipo112').innerHTML = document.getElementById("equipo09").innerHTML;
	             			document.getElementById('ban112').src = document.getElementById("ban09").src;
	             			document.getElementById('goles_visitante_12').disabled = false;
	             			document.getElementById('id_visitante_12').value = document.getElementById("id_local_9").value;
			            }
						else
						{
							document.getElementById('equipo112').innerHTML = document.getElementById("equipo19").innerHTML;
	             			document.getElementById('ban112').src = document.getElementById("ban19").src;
	             			document.getElementById('goles_visitante_12').disabled = false;
	             			document.getElementById('id_visitante_12').value = document.getElementById("id_visitante_9").value;
			            }

			      	}else{
	             		document.getElementById('equipo112').innerHTML = document.getElementById("equipo19").innerHTML;
	             		document.getElementById('ban112').src = document.getElementById("ban19").src;
	             		document.getElementById('goles_visitante_12').disabled = false;
	             		document.getElementById('id_visitante_12').value = document.getElementById("id_visitante_9").value;
	             	}	
             	}	
            });
 			});
	</script>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

             $('#goles_visitante_10').change(function() {

        
            	if(document.getElementById('goles_local_10').value != null &&
            	   document.getElementById('goles_visitante_10').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_10').value) > parseInt(document.getElementById('goles_visitante_10').value))
              		{
	       				document.getElementById('equipo013').innerHTML = document.getElementById("equipo010").innerHTML;
	             		document.getElementById('ban013').src = document.getElementById("ban010").src;
	             		document.getElementById('goles_local_13').disabled = false;
	             		document.getElementById('id_local_13').value = document.getElementById("id_local_10").value;
			      	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_10').value) == parseInt(document.getElementById('goles_visitante_10').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo010").innerHTML + ' ?'))
						{
							document.getElementById('equipo013').innerHTML = document.getElementById("equipo010").innerHTML;
	             			document.getElementById('ban013').src = document.getElementById("ban010").src;
	             			document.getElementById('goles_local_13').disabled = false;
	             			document.getElementById('id_local_13').value = document.getElementById("id_local_10").value;
			            }
						else
						{
							document.getElementById('equipo013').innerHTML = document.getElementById("equipo110").innerHTML;
	             			document.getElementById('ban013').src = document.getElementById("ban110").src;
	             			document.getElementById('goles_local_13').disabled = false;
	             			document.getElementById('id_local_13').value = document.getElementById("id_visitante_10").value;
			            }

			      	}else{
	             		document.getElementById('equipo013').innerHTML = document.getElementById("equipo110").innerHTML;
	             		document.getElementById('ban013').src = document.getElementById("ban110").src;
	             		document.getElementById('goles_local_13').disabled = false;
	             		document.getElementById('id_local_13').value = document.getElementById("id_visitante_10").value;
	             	}	
             	}	
            });


			$('#goles_local_10').change(function() {

        
            	if(document.getElementById('goles_local_10').value != null &&
            	   document.getElementById('goles_visitante_10').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_10').value) > parseInt(document.getElementById('goles_visitante_10').value))
              		{
	       				document.getElementById('equipo013').innerHTML = document.getElementById("equipo010").innerHTML;
	             		document.getElementById('ban013').src = document.getElementById("ban010").src;
	             		document.getElementById('goles_local_13').disabled = false;
	             		document.getElementById('id_local_13').value = document.getElementById("id_local_10").value;
			      	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_10').value) == parseInt(document.getElementById('goles_visitante_10').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo010").innerHTML + ' ?'))
						{
							document.getElementById('equipo013').innerHTML = document.getElementById("equipo010").innerHTML;
	             			document.getElementById('ban013').src = document.getElementById("ban010").src;
	             			document.getElementById('goles_local_13').disabled = false;
	             			document.getElementById('id_local_13').value = document.getElementById("id_local_10").value;
			            }
						else
						{
							document.getElementById('equipo013').innerHTML = document.getElementById("equipo110").innerHTML;
	             			document.getElementById('ban013').src = document.getElementById("ban110").src;
	             			document.getElementById('goles_local_13').disabled = false;
	             			document.getElementById('id_local_13').value = document.getElementById("id_visitante_10").value;
			            }

			      	}else{
	             		document.getElementById('equipo013').innerHTML = document.getElementById("equipo110").innerHTML;
	             		document.getElementById('ban013').src = document.getElementById("ban110").src;
	             		document.getElementById('goles_local_13').disabled = false;
	             		document.getElementById('id_local_13').value = document.getElementById("id_visitante_10").value;
	             	}
             	}	
            });
 			});
	</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

             $('#goles_visitante_11').change(function() {

        
            	if(document.getElementById('goles_local_11').value != null &&
            	   document.getElementById('goles_visitante_11').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_11').value) > parseInt(document.getElementById('goles_visitante_11').value))
              		{
	       				document.getElementById('equipo113').innerHTML = document.getElementById("equipo011").innerHTML;
	             		document.getElementById('ban113').src = document.getElementById("ban011").src;
	             		document.getElementById('goles_visitante_13').disabled = false;
	             		document.getElementById('id_visitante_13').value = document.getElementById("id_local_11").value;
			      	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_11').value) == parseInt(document.getElementById('goles_visitante_11').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo011").innerHTML + ' ?'))
						{
							document.getElementById('equipo113').innerHTML = document.getElementById("equipo011").innerHTML;
	             			document.getElementById('ban113').src = document.getElementById("ban011").src;
	             			document.getElementById('goles_visitante_13').disabled = false;
	             			document.getElementById('id_visitante_13').value = document.getElementById("id_local_11").value;
			            }
						else
						{
							document.getElementById('equipo113').innerHTML = document.getElementById("equipo111").innerHTML;
	             			document.getElementById('ban113').src = document.getElementById("ban111").src;
	             			document.getElementById('goles_visitante_13').disabled = false;
	             			document.getElementById('id_visitante_13').value = document.getElementById("id_visitante_11").value;
			            }	

			      	}else{
	             		document.getElementById('equipo113').innerHTML = document.getElementById("equipo111").innerHTML;
	             		document.getElementById('ban113').src = document.getElementById("ban111").src;
	             		document.getElementById('goles_visitante_13').disabled = false;
	             		document.getElementById('id_visitante_13').value = document.getElementById("id_visitante_11").value;
	             	}	
             	}	
            });


			$('#goles_local_11').change(function() {

        
            	if(document.getElementById('goles_local_11').value != null &&
            	   document.getElementById('goles_visitante_11').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_11').value) > parseInt(document.getElementById('goles_visitante_11').value))
              		{
	       				document.getElementById('equipo113').innerHTML = document.getElementById("equipo011").innerHTML;
	             		document.getElementById('ban113').src = document.getElementById("ban011").src;
	             		document.getElementById('goles_visitante_13').disabled = false;
	             		document.getElementById('id_visitante_13').value = document.getElementById("id_local_11").value;
			      	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_11').value) == parseInt(document.getElementById('goles_visitante_11').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo011").innerHTML + ' ?'))
						{
							document.getElementById('equipo113').innerHTML = document.getElementById("equipo011").innerHTML;
	             			document.getElementById('ban113').src = document.getElementById("ban011").src;
	             			document.getElementById('goles_visitante_13').disabled = false;
	             			document.getElementById('id_visitante_13').value = document.getElementById("id_local_11").value;
			            }
						else
						{
							document.getElementById('equipo113').innerHTML = document.getElementById("equipo111").innerHTML;
	             			document.getElementById('ban113').src = document.getElementById("ban111").src;
	             			document.getElementById('goles_visitante_13').disabled = false;
	             			document.getElementById('id_visitante_13').value = document.getElementById("id_visitante_11").value;
			            }	

			      	}else{
	             		document.getElementById('equipo113').innerHTML = document.getElementById("equipo111").innerHTML;
	             		document.getElementById('ban113').src = document.getElementById("ban111").src;
	             		document.getElementById('goles_visitante_13').disabled = false;
	             		document.getElementById('id_visitante_13').value = document.getElementById("id_visitante_11").value;
	             	}	
             	}	
            });
 			});
	</script>






		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

             $('#goles_visitante_12').change(function() {

        
            	if(document.getElementById('goles_local_12').value != null &&
            	   document.getElementById('goles_visitante_12').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_12').value) > parseInt(document.getElementById('goles_visitante_12').value))
              		{
	       				document.getElementById('equipo014').innerHTML = document.getElementById("equipo012").innerHTML;
	             		document.getElementById('ban014').src = document.getElementById("ban012").src;
	             		document.getElementById('goles_local_14').disabled = false;
	             		document.getElementById('id_local_14').value = document.getElementById("id_local_12").value;
			      	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_12').value) == parseInt(document.getElementById('goles_visitante_12').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo012").innerHTML + ' ?'))
						{
							document.getElementById('equipo014').innerHTML = document.getElementById("equipo012").innerHTML;
	             			document.getElementById('ban014').src = document.getElementById("ban012").src;
	             			document.getElementById('goles_local_14').disabled = false;
	             			document.getElementById('id_local_14').value = document.getElementById("id_local_12").value;
			            }
						else
						{
							document.getElementById('equipo014').innerHTML = document.getElementById("equipo112").innerHTML;
	             			document.getElementById('ban014').src = document.getElementById("ban112").src;
	             			document.getElementById('goles_local_14').disabled = false;
	             			document.getElementById('id_local_14').value = document.getElementById("id_visitante_12").value;
			            }

			      	}else{
	             		document.getElementById('equipo014').innerHTML = document.getElementById("equipo112").innerHTML;
	             		document.getElementById('ban014').src = document.getElementById("ban112").src;
	             		document.getElementById('goles_local_14').disabled = false;
	             		document.getElementById('id_local_14').value = document.getElementById("id_visitante_12").value;
	             	}	
             	}	
            });


			$('#goles_local_12').change(function() {

        
            	if(document.getElementById('goles_local_12').value != null &&
            	   document.getElementById('goles_visitante_12').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_12').value) > parseInt(document.getElementById('goles_visitante_12').value))
              		{
	       				document.getElementById('equipo014').innerHTML = document.getElementById("equipo012").innerHTML;
	             		document.getElementById('ban014').src = document.getElementById("ban012").src;
	             		document.getElementById('goles_local_14').disabled = false;
	             		document.getElementById('id_local_14').value = document.getElementById("id_local_12").value;
			      	
	             	}	
             		else if(parseInt(document.getElementById('goles_local_12').value) == parseInt(document.getElementById('goles_visitante_12').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo012").innerHTML + ' ?'))
						{
							document.getElementById('equipo014').innerHTML = document.getElementById("equipo012").innerHTML;
	             			document.getElementById('ban014').src = document.getElementById("ban012").src;
	             			document.getElementById('goles_local_14').disabled = false;
	             			document.getElementById('id_local_14').value = document.getElementById("id_local_12").value;
			            }
						else
						{
							document.getElementById('equipo014').innerHTML = document.getElementById("equipo112").innerHTML;
	             			document.getElementById('ban014').src = document.getElementById("ban112").src;
	             			document.getElementById('goles_local_14').disabled = false;
	             			document.getElementById('id_local_14').value = document.getElementById("id_visitante_12").value;
			            }

			      	}else{
	             		document.getElementById('equipo014').innerHTML = document.getElementById("equipo112").innerHTML;
	             		document.getElementById('ban014').src = document.getElementById("ban112").src;
	             		document.getElementById('goles_local_14').disabled = false;
	             		document.getElementById('id_local_14').value = document.getElementById("id_visitante_12").value;
	             	}
             	}	
            });
 			});
	</script>





	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

             $('#goles_visitante_13').change(function() {

        
            	if(document.getElementById('goles_local_13').value != null &&
            	   document.getElementById('goles_visitante_13').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_13').value) > parseInt(document.getElementById('goles_visitante_13').value))
              		{
	       				document.getElementById('equipo114').innerHTML = document.getElementById("equipo013").innerHTML;
	             		document.getElementById('ban114').src = document.getElementById("ban013").src;
	             		document.getElementById('goles_visitante_14').disabled = false;
			      		document.getElementById('id_visitante_14').value = document.getElementById("id_local_13").value;
			      	}	
             		else if(parseInt(document.getElementById('goles_local_13').value) == parseInt(document.getElementById('goles_visitante_13').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo013").innerHTML + ' ?'))
						{
							document.getElementById('equipo114').innerHTML = document.getElementById("equipo013").innerHTML;
	             			document.getElementById('ban114').src = document.getElementById("ban013").src;
	             			document.getElementById('goles_visitante_14').disabled = false;
			      			document.getElementById('id_visitante_14').value = document.getElementById("id_local_13").value;
			            }
						else
						{
							document.getElementById('equipo114').innerHTML = document.getElementById("equipo113").innerHTML;
	             			document.getElementById('ban114').src = document.getElementById("ban113").src;
	             			document.getElementById('goles_visitante_14').disabled = false;
	             			document.getElementById('id_visitante_14').value = document.getElementById("id_visitante_13").value;
			            }			

			      	}else{
	             		document.getElementById('equipo114').innerHTML = document.getElementById("equipo113").innerHTML;
	             		document.getElementById('ban114').src = document.getElementById("ban113").src;
	             		document.getElementById('goles_visitante_14').disabled = false;
	             		document.getElementById('id_visitante_14').value = document.getElementById("id_visitante_13").value;
	             	}	
             	}	
            });





			$('#goles_local_13').change(function() {

        
            	if(document.getElementById('goles_local_13').value != null &&
            	   document.getElementById('goles_visitante_13').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_13').value) > parseInt(document.getElementById('goles_visitante_13').value))
              		{
	       				document.getElementById('equipo114').innerHTML = document.getElementById("equipo013").innerHTML;
	             		document.getElementById('ban114').src = document.getElementById("ban013").src;
	             		document.getElementById('goles_visitante_14').disabled = false;
			      		document.getElementById('id_visitante_14').value = document.getElementById("id_local_13").value;
			      	}	
             		else if(parseInt(document.getElementById('goles_local_13').value) == parseInt(document.getElementById('goles_visitante_13').value))
           			{	          

		             	if(confirm('¿Deseas que avance ' + document.getElementById("equipo013").innerHTML + ' ?'))
						{
							document.getElementById('equipo114').innerHTML = document.getElementById("equipo013").innerHTML;
	             			document.getElementById('ban114').src = document.getElementById("ban013").src;
	             			document.getElementById('goles_visitante_14').disabled = false;
			      			document.getElementById('id_visitante_14').value = document.getElementById("id_local_13").value;
			            }
						else
						{
							document.getElementById('equipo114').innerHTML = document.getElementById("equipo113").innerHTML;
	             			document.getElementById('ban114').src = document.getElementById("ban113").src;
	             			document.getElementById('goles_visitante_14').disabled = false;
	             			document.getElementById('id_visitante_14').value = document.getElementById("id_visitante_13").value;
			            }			

			      	}else{
	             		document.getElementById('equipo114').innerHTML = document.getElementById("equipo113").innerHTML;
	             		document.getElementById('ban114').src = document.getElementById("ban113").src;
	             		document.getElementById('goles_visitante_14').disabled = false;
	             		document.getElementById('id_visitante_14').value = document.getElementById("id_visitante_13").value;
	             	}
             	}	
            });
 			});
	</script>






	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

             $('#goles_visitante_14').change(function() {

        
            	if(document.getElementById('goles_local_14').value != null &&
            	   document.getElementById('goles_visitante_14').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_14').value) > parseInt(document.getElementById('goles_visitante_14').value))
              		{
	       				document.getElementById('equipo30').innerHTML = document.getElementById("equipo014").innerHTML;
	             		document.getElementById('ban30').src = document.getElementById("ban014").src;
	             		document.getElementById('id_equipo30').value = document.getElementById("id_local_14").value;
	             	}	
             		else if(parseInt(document.getElementById('goles_local_14').value) == parseInt(document.getElementById('goles_visitante_14').value))
           			{	          

		             	if(confirm('¿Deseas que el Campeon sea ' + document.getElementById("equipo014").innerHTML + ' ?'))
						{
							document.getElementById('equipo30').innerHTML = document.getElementById("equipo014").innerHTML;
	             			document.getElementById('ban30').src = document.getElementById("ban014").src;
	             			document.getElementById('id_equipo30').value = document.getElementById("id_local_14").value;
			            }
						else
						{
							document.getElementById('equipo30').innerHTML = document.getElementById("equipo114").innerHTML;
	             			document.getElementById('ban30').src = document.getElementById("ban114").src;
	             			document.getElementById('id_equipo30').value = document.getElementById("id_visitante_14").value;
			            }			

			      	}else{
	             		document.getElementById('equipo30').innerHTML = document.getElementById("equipo114").innerHTML;
	             		document.getElementById('ban30').src = document.getElementById("ban114").src;
	             		document.getElementById('id_equipo30').value = document.getElementById("id_visitante_14").value;
	             	}	
             	}	
            });





			$('#goles_local_14').change(function() {

        
            	if(document.getElementById('goles_local_14').value != null &&
            	   document.getElementById('goles_visitante_14').value != null)
              	{	
              		if(parseInt(document.getElementById('goles_local_14').value) > parseInt(document.getElementById('goles_visitante_14').value))
              		{
	       				document.getElementById('equipo30').innerHTML = document.getElementById("equipo014").innerHTML;
	             		document.getElementById('ban30').src = document.getElementById("ban014").src;
	             		document.getElementById('id_equipo30').value = document.getElementById("id_local_14").value;
	             	}	
             		else if(parseInt(document.getElementById('goles_local_14').value) == parseInt(document.getElementById('goles_visitante_14').value))
           			{	          

		             	if(confirm('¿Deseas que el Campeon sea ' + document.getElementById("equipo014").innerHTML + ' ?'))
						{
							document.getElementById('equipo30').innerHTML = document.getElementById("equipo014").innerHTML;
	             			document.getElementById('ban30').src = document.getElementById("ban014").src;
	             			document.getElementById('id_equipo30').value = document.getElementById("id_local_14").value;
			            }
						else
						{
							document.getElementById('equipo30').innerHTML = document.getElementById("equipo114").innerHTML;
	             			document.getElementById('ban30').src = document.getElementById("ban114").src;
	             			document.getElementById('id_equipo30').value = document.getElementById("id_visitante_14").value;
			            }			

			      	}else{
	             		document.getElementById('equipo30').innerHTML = document.getElementById("equipo114").innerHTML;
	             		document.getElementById('ban30').src = document.getElementById("ban114").src;
	             		document.getElementById('id_equipo30').value = document.getElementById("id_visitante_14").value;
	             	}	
             	}		
            });
 			});
	</script>