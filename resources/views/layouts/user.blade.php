<!DOCTYPE html>
<html>

<head>


    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}


    <title>Tu Quiniela Ganadora</title>

    <meta charset="utf-8">

    <!-- Custom Theme files -->
    <link href="css/style.quiniela.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="shortcut icon" href="images/logo11.png" type="image/png" />
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





    <div class="container" align="center" style="padding-right: 14px; padding-left: 14px; background: transparent url(/images/man1.jpg) no-repeat scroll 0px 0px / cover; min-height: 100%; ">
            
   
            <div class="navbar-form navbar-center wow fadeInRight animated" data-wow-delay=".6s" style="visibility: visible; -webkit-animation-delay: .6s;">
                             
            <div class="col-md-2  col-sm-offset-2" align="center"> 
              <img src="/images/logo11.png"  class="img-responsive" alt="/">
            </div>                         

                        <div class="col-md-6 col-sm-offset-2" align="right" style="padding-top: 15px;"> 


                        <div class="col-md-12" align="right"> 





                        <div class="col-md-12" align="center" >


                            <h3 style ="font-size: 1.5em; color: #fff;"><font style="font-family: 'Architects Daughter', cursive;" color="#fff" size="6">¡Bienvenido! </font></h3>
                            <br>
                        </div>


                        <div class="col-md-12" align="center" >
    
                        <div style="min-width:220px; width: 100%;" align="center">


                      
                                 <div class="col-md-6" align="center" style="padding-right: 2px; padding-left: 2px; padding-top:4px;" >
                                    <div class="input-group" style="width: 100%; min-width:60%;">
                                       
                                        
                                    </div>
                           
                                   </div>
                             

                                <div class="col-md-4" align="center" style="padding-right: 2px; padding-left: 2px; padding-top:4px;" >
                                    <div class="input-group" style="width: 100%; min-width:60%;">

                                    
                               

                                </div>
                                </div>

                                 <div class="col-md-2" align="center" style="padding-right: 2px; padding-left: 2px; padding-top:4px;" >
                                    <div class="input-group" style="width: 100%; min-width:60%;">

                                    
                                    <a href="{!! URL::to('/')!!}"><button type="button" style="width: 100%; min-width:60%;" class="btn btn-default" style="border-color:transparent;">
                                        <span style="color:#5cb85c" class="fa fa-reply" aria-hidden="true" href="/logout"></span> Volver
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
                                    
                                        
         
        

    

   

    
          @yield('content')
    
 

        <script type="text/javascript" src="js/jquery.flexisel.js"></script>
    
        {!!Html::script('js/jquery.min.js')!!}
        {!!Html::script('js/bootstrap.min.js')!!}
        {!!Html::script('js/metisMenu.min.js')!!}
        {!!Html::script('js/sb-admin-2.js')!!}


</body>
</html>