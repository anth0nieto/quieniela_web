<!DOCTYPE html>
<html>

<head>

<link rel="shortcut icon" href="images/logo11.png" type="image/png" />
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}


	<title>Tu Quiniela Ganadora</title>

	<meta charset="utf-8">

	<!-- Custom Theme files -->
	<link href="css/style.quiniela.css" rel="stylesheet" type="text/css" media="all" />
	
	<!-- Custom Theme files -->
	<script src="js/jquery.min.js"></script>
	
	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--webfont-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet">  
</head>

	{!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::style('css/style.quiniela.css')!!}

	

<body>

    <?php 
    $usuario_nombre = DB::table('personas')
        ->where('personas.email','=',Auth::user()->email)
        ->get();
    ?>



    <div class="container" align="center" style="padding-right: 14px; padding-left: 14px; background: transparent url(/images/man1.jpg) no-repeat scroll 0px 0px / cover; min-height: 100%;">
            
   
            <div class="navbar-form navbar-center wow fadeInRight animated" data-wow-delay=".6s" style="visibility: visible; -webkit-animation-delay: .6s;">
                             
            <div class="col-md-2  col-sm-offset-2" align="center"> 
              <img src="/images/logo11.png"  class="img-responsive" alt="/">
            </div>                         

                        <div class="col-md-6 col-sm-offset-2" align="right" style="padding-top: 15px;"> 


                        <div class="col-md-12" align="right"> 





                        <div class="col-md-12" align="center" >


							<h3 style ="font-size: 1.5em; color: #fff;"><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="6">¡Bienvenido  {{$usuario_nombre[0]->nombre}}! </font></h3>
							<br>
						</div>


                        <div class="col-md-12" align="center" >
    
                        <div style="min-width:220px; width: 100%;" align="center">


                      
                   		         <div class="col-md-6" align="center" style="padding-right: 2px; padding-left: 2px; padding-top:4px;" >
                                    <div class="input-group" style="width: 100%; min-width:60%;">
                                       
                                       <a href="{!!URL::to('/user/show')!!}"><button type="button" style="width: 100%; min-width:60%;" class="btn btn-default" style="border-color:transparent;"><span class="fa fa-user" aria-hidden="true"></span> {!! Auth::user()->username !!}     <span class="badge" style="background-color:#5cb85c;">
                                                   {{$usuario_nombre[0]->creditoDisponible}} Bs.
                                                </span></button></a>
                                        
                                    </div>
                           
                            	   </div>
                             

                                <div class="col-md-4" align="center" style="padding-right: 2px; padding-left: 2px; padding-top:4px;" >
                                    <div class="input-group" style="width: 100%; min-width:60%;">

                                    
                                    <a href="/getCreditos"><button type="button" style="width: 100%; min-width:60%;" class="btn btn-default" style="border-color:transparent;">
                                    <span style="color:#5cb85c" class="fa fa-shopping-cart" aria-hidden="true" href="/logout"></span> Obtener Creditos
                                    </button></a>
                        

                                </div>
                                </div>

                                 <div class="col-md-2" align="center" style="padding-right: 2px; padding-left: 2px; padding-top:4px;" >
                                    <div class="input-group" style="width: 100%; min-width:60%;">

                                    
                                    <a href="{!! URL::to('/logout')!!}"><button type="button" style="width: 100%; min-width:60%;" class="btn btn-default" style="border-color:transparent;">
                                        <span style="color:#d9534f" class="fa fa-power-off" aria-hidden="true" href="/logout"></span> Salir
                                    </button></a>

                                </div>
                                </div>
                             

                                


                        </div>
                        </div>         
                        </div>
                        <div class="col-md-12" align="center" style="padding-right: 15px;">
 						         
                               
 							<div class="col-md-12" align="center" >
                        	<div style="min-width:220px; width: 100%; margin-bottom: 45px;" align="center">

 						        <div class="col-md-4  " align="center" style="padding-right: 1px; padding-left: 1px;" >
                                
                                </div>

								<div class="col-md-4" align="center" style="padding-right: 1px; padding-left: 1px;" >

                                </div>
                                                    

                                <div class="col-md-4" align="center" style="padding-right: 1px; padding-left: 1px;" >                                    
                                
                                </div>
                                
                                </div>

                                                             
                                
                        </div>
						</div>

                        </div>

                        </div>
                        
                        
                                    </div>
                                    
                                        
         
        

	<!-- header-section-starts -->

 <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; border-color: transparent; background-color:transparent;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
             
            </div>
           

     

            <div class="navbar-default sidebar" role="navigation" style="background-color:transparent;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a style="color:#fff" href="#"><i class="fa fa-futbol-o fa-fw"></i> Quinielas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a style="color:#fff" href="{!!URL::to('/misQuinielas')!!}"><i class="fa fa-gamepad"></i> Mis Quinielas</a>
                                </li>
                                <li>
                                    <a style="color:#fff" href="{!!URL::to('/showQuinielas')!!}"><i class="fa fa-newspaper-o"></i> Quinielas Disponibles</a>
                                </li>
                            </ul>
                        </li>
                      
                        <li>
                            <a style="color:#fff" href="#"><i class="fa fa-university"></i> Creditos <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a style="color:#fff" href="/getCreditos"><i class='fa fa-shopping-cart'></i> Comprar Creditos</a>
                                </li>
                                <li>
                                    <a style="color:#fff" href="/getPago"><i class='fa fa-money'></i> Retirar creditos</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a style="color:#fff" href="#"><i class="fa fa-archive"></i> Reglas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a style="color:#fff" target="_blank" href="{{ asset('reglas.pdf') }}"><i class='fa fa-gavel'></i> Quinielas por fecha</a>
                                </li>
                              
                            </ul>
                        </li>


                        <li>
                            <a style="color:#fff" href="#"><i class="fa fa-user"></i> Mi Cuenta <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a style="color:#fff" href="{!! URL::to('/user/show') !!}"><i class='fa fa-book'></i> Datos personales</a>
                                </li>
                                
                            </ul>
                        </li>
                       

                    </ul>
                </div>
            </div>

            

     </nav>

    

        <div id="page-wrapper" style="background-color:transparent; border-left: 0px;">

	
		  @yield('content')
		

	   </div> 
		
	
 

		<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	
		{!!Html::script('js/jquery.min.js')!!}
    	{!!Html::script('js/bootstrap.min.js')!!}
    	{!!Html::script('js/metisMenu.min.js')!!}
    	{!!Html::script('js/sb-admin-2.js')!!}


</body>
</html>