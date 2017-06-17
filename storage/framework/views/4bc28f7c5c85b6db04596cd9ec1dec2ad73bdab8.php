<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Quiniela Ganadora</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Good Food Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<link href='//fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
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
	<div class="header ">
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>				  
						<div class="navbar-brand">
						
							<p class="bg-success">
							
								<div class="panel panel-info">
								<div class="panel-body">
								<h1>Quiniela Ganadora</h1>
								</div>
								</div>
							</p>
						</div>
					</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="active"><a href=""><h3>Home</h3> <span class="sr-only">(current)</span></a></li>
							<li><a href="#menu" class="scroll"><h3>Iniciar Sesión</h3></a></li>
							
								
								<!-- <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gallery <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="gallery.html">Gallery 1</a></li>
										<li><a href="gallery.html">Gallery 2</a></li>
										<li><a href="gallery.html">Gallery 3</a></li>
									</ul>
								</li>
							
							<li><a href="codes.html">Codes</a></li>
							<li><a href="contact.html">Contact</a></li> -->
						
						</ul>
								  
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
			<div class="slider">
				<div class="callbacks_container">
					<ul class="rslides" id="slider">
						 <li>	 
							<div class="caption">
							<div class="col-md-6 cap-img">
							<img src="images/p.png"  class="img-responsive" alt="/">
							</div>
							<div class="col-md-6 cap">
								<h3>¡Comienza a Ganar! </h3>  
								<p>Sigue tus torneos favoritos con mas emoción que nunca, vive los torneos día a día, partido a partido, pronostica, gana y diviértete.</p>
								<!-- <a class="button" data-toggle="modal" data-target="#myModal1" href="#">Regístrate</a> -->
								<?php echo link_to_route('user.create', $title = '¡Registrate Ya!', $parameters = null, $attributes = ['class'=>'btn btn-primary']); ?>


							</div>
							</div>
							<div class="clearfix"></div>
						 </li>
						 <li>
							<div class="caption">
							<div class="col-md-6 cap-img">
								<img src="images/p1.png"  class="img-responsive" alt="/">
							</div>
							<div class="col-md-6 cap">
								<h3>Sigue Los Mejores Torneos</h3> 
								<p>Sigue tus torneos favoritos con mas emoción que nunca, vive los torneos día a día, partido a partido, pronostica, gana y diviértete.</p>
								<?php echo link_to_route('user.create', $title = '¡Registrate Ya!', $parameters = null, $attributes = ['class'=>'btn btn-primary']); ?>

							</div>
							</div>
							<div class="clearfix"></div>
						</li>
						 <li>	          
							<div class="caption">
							<div class="col-md-6 cap-img">
							<img src="images/p2.png"  class="img-responsive" alt="/">
							</div>
							<div class="col-md-6 cap">
								<h3>¡Juega Seguro!</h3>
								<p>Sigue tus torneos favoritos con mas emoción que nunca, vive los torneos día a día, partido a partido, pronostica, gana y diviértete.</p>
								<?php echo link_to_route('user.create', $title = '¡Registrate Ya!', $parameters = null, $attributes = ['class'=>'btn btn-primary']); ?>

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
<!--header-->
			<!--content-->
				<div class="content">
				<!--high-->
					<div class="high-quality">
						<div class="container">
							<h3>El Torneo Del Momento</h3>
							<h2>UEFA <span>EUROCOPA</span> 2016</h2>
							<p>La Eurocopa 2016 (oficialmente, Campeonato Europeo de Fútbol de la UEFA de 2016 o UEFA EURO 2016™), o simplemente Euro 2016, será la decimoquinta edición del torneo de selecciones nacionales europeas. Comenzará el 10 de junio y acabará el 10 de julio en Francia y estará organizada por la UEFA. España es, y por dos veces consecutivas, el campeón defensor.</p>
						</div>
					</div>
					<!--high-->



					<!--post-->
					<div class="last-post" id="menu">
						<div class="container" >
							
							<div class="header-info">
								<div class="row col-wrap">
								<div class="col-sm-4 col col-md-offset-4" >
								<div class="well">

									<h2><font color="#585858">Comienza a ganar</font></h2>
									<br><br>
										
									<?php echo Form::open(['route'=>'log.store','method'=>'POST']); ?>

							
										<div>
										<?php echo $__env->make('alerts.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
										<?php echo $__env->make('alerts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
										<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
										</div>

										<div class="panel panel-success">
											<div class="panel-heading">Inicio de Sesión</div>
											<div class="panel-body">
												<div class="form-group">
													<h4><font color = "#585858">Nombre de Usuario:</font></h4>
													<?php echo Form::text('username',null,['class'=>'form-control', 'placeholder'=>'Ingresa el Username']); ?>

												</div>

												<div class="form-group">
													<h4><font color = "#585858">Contraseña:</font></h4>
													<?php echo Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa la contraseña']); ?>

												</div>

													<?php echo Form::submit('Ingresar',['class'=>'btn btn-info']); ?>

											</div>
											</div>	

											<br>
												<h4><font color = "#585858">¿No Posees Cuenta?</font></h4>
											<br>
											
											<?php echo link_to_route('user.create', $title = '¡Registrate Ya!', $parameters = null, $attributes = ['class'=>'btn btn-primary']); ?>

											<br><br>
											<?php echo link_to('password/email', $title = '¿Olvidaste tu contraseña?', $attributes = ['class'=>'btn btn-warning'], $secure = null); ?>

											
											<?php echo Form::close(); ?>

										</div>	
									
								</div>
								</div>	
								</div>
								</div>



						</div>
					</div>











					<!--menu-->



						<div class="feature-menu" id="menu1">
							<div class="container">
								<h3><span>Variedad</span> de Precios</h3>
								<div class="feature-grids">
									<div class="col-md-4 feature-grid">
										<img src="images/p2.png" class="img-responsive" alt="/">
										<div class="rate rate1">
											<h5>900 Bs</h5>
										</div>
									</div>
									<div class="col-md-4 feature-grid">
									<img src="images/p2.png" class="img-responsive" alt="/">
									<div class="rate">
											<h5>800 Bs</h5>
										</div>
									</div>
									<div class="col-md-4 feature-grid">
									<img src="images/p2.png" class="img-responsive" alt="/">
									<div class="rate">
											<h5>700 Bs</h5>
										</div>
									</div>
									<div class="col-md-4 feature-grid">
									<img src="images/p2.png" class="img-responsive" alt="/">
									<div class="rate">
											<h5>600 Bs</h5>
										</div>
									</div>
									<div class="col-md-4 feature-grid">
									<img src="images/p2.png" class="img-responsive" alt="/">
									<div class="rate">
											<h5>500 Bs</h5>
										</div>
									</div>
									<div class="col-md-4 feature-grid">
									<img src="images/p2.png" class="img-responsive" alt="/">
									<div class="rate">
											<h5>400 Bs</h5>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>




					<!--menu-->
					
						<!--post-->
						<!--news-->
							<div class="new-section">
								<div class="container">
									<h3><span>Últimas</span> Ofertas</h3>
										<div class="news-grids">
											<div align="center" class="col-md-4 new-grid">
												 <a href="#" class="mask"><img src="images/euro1.jpg" alt="image" class="img-responsive zoom-img"></a>
												 <h4><a href="#">Quiniela Torneo Completo</a></h4>
												
											</div>
											<div align="center" class="col-md-4 new-grid">
											<a href="#" class="mask"><img src="images/usa.jpg" alt="image" class="img-responsive zoom-img"></a>
												 <h4><a href="#">Quiniela Cuartos en Adelante</a></h4>
												
											</div>
											<div align="center" class="col-md-4 new-grid">
											<a href="#" class="mask"><img src="images/euro1.jpg" alt="image" class="img-responsive zoom-img"></a>
												 <h4><a href="#">Quiniela Octavos en Adelante</a></h4>
												</div>
											<div class="clearfix"></div>
										</div>
								</div>
							</div>
						<!--news-->



						





						<!--footer-->
					<div class="footer-section">
						<div class="container">
							<div class="footer-grids">
								<div class="col-md-3 footer-grid">
									<h4>Atención Al Cliente</h4>
									<p>Teléfono : 0414-7361767</p>
									<p>Teléfono : 0414-1725145</p>
									<p>Teléfono : 0424-9417796</p>
									<p>E-mails : <a href="mailto:soportequinielaganadora@gmail.com"> soportequinielaganadora@gmail.com</a>
									<a href="mailto:soportequinielaganadora@gmail.com"> support@quinielaganadora.com.ve	</a></p>

								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
			<!--footer-->	

				</div>
				<!--copy-->
					<div class="copy-section">
						<div class="container">
							<p>&copy; 2016 All rights reserved | Design by <a href="">Ternary Software House</a></p>
						</div>
					</div>
				<!--copy-->
		<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-info">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
					</div>
						<div class="modal-body">
							<div class="compose-grids">
									<div class="payment-online-form-left">
											<form>
												<h4><span class="shipping"> </span>Shipping Details</h4>
												<ul>
													<li><input class="text-box-dark" type="text" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}"></li>
													<li><input class="text-box-dark" type="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}"></li>
												</ul>
												<ul>
													<li><input class="text-box-dark" type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"></li>
													<li><input class="text-box-dark" type="text" value="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}"></li>
												</ul>
												<ul>
													<li><input class="text-box-dark" type="text" value="Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Address';}"></li>
													<li><input class="text-box-dark" type="text" value="Pin Code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Pin Code';}"></li>
													
												</ul>
												<div class="clearfix"></div>
												<h4 class="paymenthead"><span class="payment"></span>Payment Details</h4>
												<div class="clearfix"></div>
											<ul class="payment-type">
												<li><span class="col_checkbox">
													<input id="3" class="css-checkbox1" type="checkbox">
													<label for="3" class="css-label1"></label>
													<a class="visa" href="#"></a>
													</span>												
												</li>
												<li>
													<span class="col_checkbox">
														<input id="4" class="css-checkbox2" type="checkbox">
														<label for="4" class="css-label2"></label>
														<a class="paypal" href="#"></a>
													</span>
												</li>
											</ul>
												<ul>
													<li><input class="text-box-dark" type="text" value="Card Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Card Number';}"></li>
													<li><input class="text-box-dark" type="text" value="Name on card" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name on card';}"></li>
												
												</ul>
												<ul>
													<li><input class="text-box-light hasDatepicker" type="text" id="datepicker" value="Expiration Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Expiration Date';}"><em class="pay-date"> </em></li>
													<li><input class="text-box-dark" type="text" value="Security Code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Security Code';}"></li>
												
												</ul>

									  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-success">Process order</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</body>
</html>
