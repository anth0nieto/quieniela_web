@extends('layouts.quiniela')
  
  @section('content')     
 

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
{!!Html::style('css/font-awesome.min.css')!!}

</head>
<body>

      <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
          <div class="modal-header">
                    
          </div>
            <div class="modal-body">
              <div class="compose-grids">
                  <div class="payment-online-form-left">


                      <form>
                      <div class="panel panel-success">
                      <div class="panel-heading">
                      <div align="center"><h2><i class="fa fa-futbol-o" aria-hidden="true"></i>   Ganadores  <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></h2></div>
                      </div>
                      

                      <div class="well" style="background-color:  #f8f9f9;">
                      <ul class="ch-grid">

                      
                      <li>
                      <div class="ch-item">
                        <div class="ch-info">
                          <div class="ch-info-front ch-img-4"></div>
                          <div class="ch-info-back">
                              <h4>Primer Lugar  <i class="fa fa-certificate" aria-hidden="true"></i></h4>
                            <p>Julio César Lopez  <a>@julioc10</a></p>
                          </div>
                        </div>
                      </div>
                    </li>

                      
                      <div class="col-md-12 cap">
                      <p><h4><i class="fa fa-quote-left" aria-hidden="true"></i>  Un saludo a todos los participantes! De verdad que fue una quiniela muy divertida y bien hecha un saludo y felicitaciones a los creadores de la misma! Y ps bueno les digo que forca Portugal jajaja, gracias a todos. Att. El Campeón <i class="fa fa-quote-right" aria-hidden="true"></i></h4></p>  
                      </div>
                      
                      
                    </ul>
                  </div>

                    <div class="well" style="background-color:   #eaf2f8;">
                    <ul class="ch-grid">

                      
                      <li>
                      <div class="ch-item">
                        <div class="ch-info">
                          <div class="ch-info-front ch-img-3"></div>
                          <div class="ch-info-back">
                              <h4>Segundo Lugar  <i class="fa fa-certificate" aria-hidden="true"></i></h4>
                            <p>Charles Benitez  <a>@charlesbenitez1</a></p>
                          </div>
                        </div>
                      </div>
                    </li>

                    
                      <div class="col-md-12 cap">
                      <p><h4><i class="fa fa-quote-left" aria-hidden="true"></i>  La quiniela me pareció muy bien organizada detalle a detalle en cuanto a puntuación. La iniciativa de hacer 2 fases paralelas permitió que fuera más equilibrada y permitió seguir luchando por la quiniela independientemente de cómo le hubiera ido en la fase de grupos siempre estuvieron transparente los resultados y las actualizaciones eran rápido así uno podía sacar sus cuentas y los de los rivales mis felicitaciones a los órganizadores <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>   <i class="fa fa-quote-right" aria-hidden="true"></i></h4></p>  
                      </div>
                      

                    </ul>


                    </div>
                    </div>


                     <div class="panel panel-success">
                      <div class="panel-heading">
                      <div align="center"><h2><i class="fa fa-futbol-o" aria-hidden="true"></i>   Gracias a todos por participar!  <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></h2></div>
                      </div>
                      </div>
                      
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>
  
  @endsection