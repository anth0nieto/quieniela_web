<!DOCTYPE HTML>
<html>
<head>
<title>Quiniela Ganadora</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="shortcut icon" href="images/logo11.png" type="image/png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="quiniela ganadora" content="Quiniela, quiniela ganadora, quinielaganadora.com.ve, jugar quiniela, quiniela venezuela"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<link href='//fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet">  
<script src="js/responsiveslides.min.js"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
  <!--startsmothscrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
 <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
<!--endsmothscrolling-->

</head>
<body>

    
  

<!--header-->
	<div class="header">

<div class="container-fluid11" > 

       			



<div class="container-fluid12" > 

    <div class="container" align="center" style="padding-right: 14px; padding-left: 14px;">
            
   
            <div class="navbar-form navbar-center wow fadeInRight animated" data-wow-delay=".6s" style="visibility: visible; -webkit-animation-delay: .6s;">
                             
            <div class="col-md-2  col-sm-offset-2" align="center"> 
              <img src="images/logo11.png"  class="img-responsive" alt="/">
            </div>                         

                        {!!Form::open(['route'=>'log.store','method'=>'POST'])!!}
                        {!!Form::open(['route'=>'log.store','method'=>'POST'])!!}                

                        <div class="col-md-6 col-sm-offset-2" align="right" style="padding-top: 15px;"> 


                        <div class="col-md-12" align="right"> 

                        <div class="col-md-12" align="center" >
							<h3 style ="font-size: 1.5em; color: #30456b; padding: 0.5em 0px; font-weight: 600; font-family: "Ubuntu Condensed",sans-serif;"><font style="font-family: 'Permanent Marker', cursive;"  size="6.5">¡Juega, diviértete y gana!</font></h3>
							<br>
						</div>


                        <div class="col-md-12" align="center" >
                        	<div>
										@include('alerts.success')
										@include('alerts.errors')
										@include('alerts.request')
								</div>
                        <div style="min-width:220px; width: 100%;" align="center">


                       
                       		         <div class="col-md-6" align="center" style="padding-right: 1px; padding-left: 1px;" >
                                    <div class="input-group" style="width: 100%; min-width:60%;">
                                        {!!Form::text('username',null,['class'=>'form-control', 'placeholder'=>'Ingresa el usuario'])!!}
                                    </div>
                           
                            	   </div>
                             	
                                	<div class="col-md-6" align="center"  style="padding-right: 1px; padding-left: 1px;">
                                    <div class="input-group" style="width: 100%; min-width:60%;">
                                        {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa la contraseña'])!!}
                                    </div>
                               </div>
                        </div>
                        </div>         
                        </div>
                        <div class="col-md-12" align="center" style="padding-right: 15px;">
 						         
                               
 							<div class="col-md-12" align="center" >
                        	<div style="min-width:220px; width: 100%; margin-bottom: 45px;" align="center">

 						        <div class="col-md-4  " align="center" style="padding-right: 1px; padding-left: 1px; padding-top: 4px;" >
                              		{!!link_to('password/email', $title = '¿Olvidó su contraseña?', $attributes = ['class'=>'btn btn-warning', 'style'=>'padding-right: 0px; width: 100%; padding-left: 0px; font-size: 13px;  background-color: transparent; border-color:transparent;'], $secure = null)!!}
                                </div>

								<div class="col-md-4" align="center" style="padding-right: 1px; padding-left: 1px; padding-top: 4px;" >                                    
                                	{!!link_to_route('user.create', $title = 'Registrarse', $parameters = null, $attributes = ['class'=>'btn btn-primary', 'style'=>' width: 100%; padding-right: 15px; font-size: 13px;  background-color: #00695C; border-color:#00695C;'])!!}
                                </div>
                                                    

                                <div class="col-md-4" align="center" style="padding-right: 1px; padding-left: 1px; padding-top: 4px;" >                                    
                                	{!!Form::submit('Ingresar',['class'=>'btn btn-primary', 'style'=>'width: 100%; padding-right: 15px; font-size: 13px; background-color: #30456b; border-color: #30456b;'])!!}
                                </div>
                                
                                </div>

                                                             
                                    {!!Form::close()!!}
                        </div>
						</div>

                        </div>

                        </div>
                        
                        
                                    </div>
                                    
                                        
            </div> 
        
  

        



	
			<div class="slider" style="margin-bottom: 0;">
				<div class="callbacks_container">
					<ul class="rslides" id="slider">
						 <li>	 
							<div class="caption" style='margin-top: 2em;'>
							<div class="col-md-4 cap-img col-md-offset-2">
								<img src="images/p.png"  class="img-responsive" alt="/">
							</div>
							<div class="col-md-6 cap">
								<br><br><br>

								<h3><font style="font-family: 'Permanent Marker', cursive;" size="6.5">New way to win! </font></h3>  
								<p style="font-size: 1.6em;"><font style="font-family:'Boogaloo', cursive;">Sigue tus torneos favoritos con mas emoción que nunca, vive los torneos día a día, partido a partido, pronostica, gana y diviértete.</font></p>
								<!-- <a class="button" data-toggle="modal" data-target="#myModal1" href="#">Regístrate</a> -->
								{!!link_to_route('user.create', $title = '¡Regístrate Ahora!', $parameters = null, $attributes = ['class'=>'btn btn-primary', 'style'=> 'background-color: #00695C;border-color: #30456b;'])!!}

							</div>
							</div>
							<div class="clearfix"></div>
						 </li>
						 <li>
							<div class="caption" style='margin-top: 2em;'>
							<div class="col-md-4 cap-img col-md-offset-2">
								<img src="images/p1.png"  class="img-responsive" alt="/">
							</div>
							<div class="col-md-6 cap">
								<br><br><br>
								<h3><font style="font-family: 'Permanent Marker', cursive;" size="6.5">¡Comienza a Ganar!</font></h3> 
								<p style="font-size: 1.6em;"><font style="font-family:'Boogaloo', cursive;">Sigue tus torneos favoritos con mas emoción que nunca, vive los torneos día a día, partido a partido, pronostica, gana y diviértete.</font></p>
								{!!link_to_route('user.create', $title = '¡Regístrate Ahora!', $parameters = null, $attributes = ['class'=>'btn btn-primary', 'style'=> 'background-color: #00695C;border-color: #30456b;'])!!}
							</div>
							</div>
							<div class="clearfix"></div>
						</li>
						 <li>	          
							<div class="caption" style='margin-top: 2em;'>
							<div class="col-md-4 cap-img col-md-offset-2">
							<img src="images/p2.png"  class="img-responsive" alt="/">
							</div>
							<div class="col-md-6 cap">
								<br><br><br>
								<h3><font style="font-family: 'Permanent Marker', cursive;" size="6.5">Inizia a guadagnare</font></h3>
								<p style="font-size: 1.6em;"><font style="font-family:'Boogaloo', cursive;">Sigue tus torneos favoritos con mas emoción que nunca, vive los torneos día a día, partido a partido, pronostica, gana y diviértete.</font></p>
								{!!link_to_route('user.create', $title = '¡Regístrate Ahora!', $parameters = null, $attributes = ['class'=>'btn btn-primary', 'style'=> 'background-color: #00695C;border-color: #30456b;'])!!}
							</div>
							</div>
							<div class="clearfix"></div>
						 </li>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
  </div>
 </div> 
        </div>
<!--header-->


				</div>
				<!--copy-->
					<div class="copy-section" style="background:#212121;">
						<div class="container">
							<p>&copy; 2016 Todos los derechos reservados | Diseñado por <a href="">Ternary Software House</a></p>
							<p>Teléfonos: 0414-7361767, 0424-1725145, 0424-9417796 </p>
							<p>E-mail: <a href="mailto:soportequinielaganadora@gmail.com"> soportequinielaganadora@gmail.com</a>
						</div>
					</div>
			
			
			
</body>
</html>
