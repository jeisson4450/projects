
<html>

<?php
	
	$mysqli=new mysqli("localhost","root","usbw","registro");

	if(mysqli_connect_errno())
	{
		echo'Conexion Fallida : ' ,mysqli_connect_error(); 
		exit();
	}
	
	$bandera=false;


if(!empty($_POST))
	{
		if((!empty($_POST['codigo'])))
		
		{

	$codigo=mysqli_real_escape_string($mysqli,$_POST['codigo']);


$sqluser="SELECT codigo FROM asistencia WHERE codigo='$codigo'";
$resuser=$mysqli->query($sqluser);	
$row=$resuser->num_rows;

$sqluseree="SELECT codigo FROM estudiante WHERE codigo='$codigo'";
$resuser=$mysqli->query($sqluseree);	
$rowe=$resuser->num_rows;

if($row>0)
{
	$error="<script type='text/javascript'> alert('El estudiante ya esta registrado')</script>";
}
elseif($rowe>0)
{

	$sqlwe="INSERT INTO asistencia (codigo,nombre,apellido,cod_carrera,cod_asignatura)
	SELECT  codigo,nombre,apellidos,cod_carrera,cod_asignatura
	FROM estudiante 
	where codigo='$codigo'";


	$resulwe=$mysqli->query($sqlwe);

	
	if($resulwe>0)
	{
		$bandera=true;

	}else
	{
		$error="<script type='text/javascript'> alert('Error al registrar')</script>";
	}


}

if ($rowe<=0)
{
	$error="<script type='text/javascript'> alert('El estudiante no existe')</script>";
}

}
}

	?>
<head>
<title>REGISTRO DE LOS ESTUDIANTES</title>



<CENTER><h1>REGISTRO DE LOS ESTUDIANTES DE LA UNIVERSIDAD INCCA</h1></CENTER>
<style type="text/css">
 *
 {
 	padding: 2px;
 	margin: 2px;

 }

#header{
	margin:auto;
	width: 100px;
	font-family: cursive;
}

ul ,ol{
	
	list-style:none;
}
.nav li a{
	background-color:#000;
	color:#fff;
	text-decoration:none;
}

body{
  text-align: center;
  background: #ECF0F1;
  padding-top: 20px;
}

.boton{
      text-shadow: 0px 1px rgba(0, 0, 0, 0.2);
            text-align:center;
            text-decoration: none;
      font-family: 'Helvetica Neue', Helvetica, sans-serif;
      display:inline-block;
            padding: 7px 20px;
            white-space: nowrap;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 100px;
            margin: 10px 5px;
            -webkit-transition: all 0.2s ease-in-out;
            -ms-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
            
}
   






</style> 
</head>


<script type="text/javascript">
function registros()
 {
 	document.registro.submit();
 	
}
</script>
<body>




<center>
<div class="container">
<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="registro" name="registro">	<p1  style="">CODIGO</p1>
<input id="codigo" name="codigo" class="codigo" />

</div>



<input  style="" type="button" value="REGISTRAR" class="botonazul" onClick="registros();" />

 
 </form>


<a style="" class="botonazul" name="atras" type="button2"  href="a.html">Atras</a>
</center>
</div>




<?php if ($bandera) {?>
<h1>Registro Exitoso</h1>

 <?php }else{ ?>
 <br/>
 	<div style="font-size:16px; color:oo0000;"> <?php echo isset($error) ? utf8_decode($error):'';?></div>
 	<?php }?>

</body>

</html>
