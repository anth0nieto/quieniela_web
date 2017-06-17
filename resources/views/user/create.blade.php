@extends('layouts.user')
	
	@section('content')

	<link rel="stylesheet" type="text/css" href="../css/wow-alert.css">
			
					<div class="container" >
					@include('alerts.success')
					@include('alerts.errors')
					@include('alerts.request')
					</div>
					

		
		<table class="table">
		
		<br>
		{!!Form::open(['route'=>'user.store','method'=>'POST','class' => 'form-horizontal'])!!}
		@include('admin.forms.usr')
		

		
		{!!Form::close()!!}
		

				
				</table>
		
		</div>	
		</div>

		
	@endsection

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script>
        $(function(){

             $('#passwordconf').change(function() {

             		if(document.getElementById('passwordconf').value == document.getElementById('password').value)
              		{
	       				    var espacios = false;
						    var cont = 0;
						    var p1 = document.getElementById('passwordconf').value;
						    var p2 = document.getElementById('password').value;
						     
						    while (!espacios && (cont < p1.length)) 
						    {
						      if (p1.charAt(cont) == ' ')
						        espacios = true;
						      cont++;
						    }
						     
						    if (espacios) 
						    {
						      alert("La Contraseña no puede contener espacios en blanco","Ok");
						      document.getElementById('registrar').disabled = true;
						    }	
						    else 
							    if (p1.length < 6 || p2.length < 6) 
							    {
				     				alert("La Contraseña debe poseer por lo menos 6 caracteres!");
				     				document.getElementById('registrar').disabled = true;
				      			}else
				      			{
					    			if(document.getElementById('terminos').checked == true)
					    				document.getElementById('registrar').disabled = false;
				      			}

					}	    
             		else 
           			{	   
           				
           				
           				alert("Las Contraseñas No Coinciden","Ok");

           				document.getElementById('registrar').disabled = true;       
           			}	
            });


 			});
	</script>


	<script>
        $(function(){

            $('#terminos').change(function(){

            	if(document.getElementById('terminos').checked == true)
            	{
            		document.getElementById('registrar').disabled = false;
            	}	
            	else
            	{
            		alert("Debes Aceptar los Terminos y Condiciones para poder Registrarte","Ok");
            		document.getElementById('registrar').disabled = false;
            	}
            });

         });
    </script>



	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.js"></script>
	<script type="text/javascript" src="../js/wow-alert.js"></script>
	