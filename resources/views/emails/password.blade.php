<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document Email</title>
	<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
</head>
<body>

<div style="width:100%;" align="center">
		<a align="center" style="width:100%;" href="http://www.quinielaganadora.com.ve"><img align="center" src="http://www.quinielaganadora.com.ve/images/logo11.png" style="display:block; max-width:25%; height: auto;"></a>
	</div>
<div style="width:100%;" align="center">

<h3><font style="font-family: 'Permanent Marker',cursive,Arial;"  size="5">¡Recuperación de Contraseña!</font></h3>
<h5><font style="font-family: 'Permanent Marker',cursive,Arial;"  size="5">Pulse el botón para iniciar el proceso de establecimiento de una nueva contraseña</font></h5>

<br><br>

<a href="{!! url('password/reset/'.$token) !!}" class="myButton" style="
	-moz-box-shadow: 0px 0px 0px 2px #5cb85c;
	-webkit-box-shadow: 0px 0px 0px 2px #5cb85c;
	box-shadow: 0px 0px 0px 2px #5cb85c;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #5cb85c), color-stop(1, #5cb85c));
	background:-moz-linear-gradient(top, #5cb85c 5%, #5cb85c 100%);
	background:-webkit-linear-gradient(top, #5cb85c 5%, #5cb85c 100%);
	background:-o-linear-gradient(top, #5cb85c 5%, #5cb85c 100%);
	background:-ms-linear-gradient(top, #5cb85c 5%, #5cb85c 100%);
	background:linear-gradient(to bottom, #5cb85c 5%, #5cb85c 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#5cb85c', endColorstr='#5cb85c',GradientType=0);
	background-color:#5cb85c;
	-moz-border-radius:10px;
	-webkit-border-radius:10px;
	border-radius:10px;
	border:1px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:19px;
	font-weight:bold;
	padding:12px 37px;
	text-decoration:none;
	text-shadow:0px 1px 0px #283966;">Recuperar Contraseña</a>


</div>

</body>
</html>