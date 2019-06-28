<html>
<meta charset="utf-8">
  <title>usuarios</title>
  <link rel="shortcut icon" href="facil.jpg">
  <link rel="stylesheet" type="text/css" href="administra.css">
<?php
	session_start();
	require 'conexion.php';
	if(!isset($_SESSION["id_usuario"]))
	{
		header("location:login.php");
	}
	$bandera=false;
  if((!empty($_POST['codigo']))&& (!empty($_POST['nombre']))&& (!empty($_POST['encargado'])) && (!empty($_POST['telefono'])) && (!empty($_POST['direccion'])) &&  (!empty($_POST['horario'])) && (!empty($_POST['electronico'])))
  {
    $codigo=mysqli_real_escape_string($mysqli,$_POST['codigo']);
    $nombre=mysqli_real_escape_string($mysqli,$_POST['nombre']);
    $encargado=mysqli_real_escape_string($mysqli,$_POST['encargado']);
    $telefono=mysqli_real_escape_string($mysqli,$_POST['telefono']);
    $direccion=mysqli_real_escape_string($mysqli,$_POST['direccion']);
    $correo=mysqli_real_escape_string($mysqli,$_POST['electronico']);
    $horario=mysqli_real_escape_string($mysqli,$_POST['horario']);
    $sqlestu="INSERT INTO estudiante (codigo,nombre,encargado,telefono,direccion,correo,horario)
    VALUES('$codigo','$nombre','$encargado','$telefono','$direccion','$correo','$horario')";
  
    $resulestu=$mysqli->query($sqlestu);
  

    
    if($resulestu>0)
    {
      $bandera=true;
  
    }
    else
    {
     
      $error="<script type='text/javascript'> alert('$resulestu')</script>";
      
    }
  }

 
if(!empty($_POST))
	{
		if((!empty($_POST['codigo']))&& (!empty($_POST['nombres']))&& (!empty($_POST['apellidos'])) && (!empty($_POST['selectasignatura'])) && (!empty($_POST['selectcarrera'])) &&  (!empty($_POST['electronicos'])))
		{
$codigo=mysqli_real_escape_string($mysqli,$_POST['codigo']);
$nombres=mysqli_real_escape_string($mysqli,$_POST['nombres']);
$apellidos=mysqli_real_escape_string($mysqli,$_POST['apellidos']);
$asignatura=$_POST['selectasignatura'];
$carrera=$_POST['selectcarrera'];
$electronico=mysqli_real_escape_string($mysqli,$_POST['electronicos']);

$sqluser="SELECT codigo FROM estudiante WHERE codigo='$codigo'";
$resuser=$mysqli->query($sqluser);	
$row=$resuser->num_rows;
if($row>0)
{
	$error="<script type='text/javascript'> alert('EL USUARIO YA EXISTE!!!!')</script>";
	
}
else
{
	$sqlestu="INSERT INTO estudiante (codigo,nombre,apellidos,cod_carrera,cod_asignatura,cod_electronico)
	VALUES('$codigo','$nombres','$apellidos','$carrera','$asignatura','$electronico')";

	$resulestu=$mysqli->query($sqlestu);

	$sqlestu="INSERT INTO control2(cod_asignatura,codigo)
	VALUES('$asignatura','$codigo')";

	$resulestu=$mysqli->query($sqlestu);
	
	if($resulestu>0)
	{
		$bandera=true;

	}else
	{
		$error="<script type='text/javascript'> alert('ERROR AL REGISTRAR')</script>";
		
	}
	

}
} else if (!empty($_POST['codigoborrar']))
	{
		$codigo=mysqli_real_escape_string($mysqli,$_POST['codigoborrar']);

		$sqluser="SELECT codigo FROM estudiante WHERE codigo='$codigo'";
		$resuser=$mysqli->query($sqluser);	
$row=$resuser->num_rows;
	
	if($row>0)
{
		$sqlborr="DELETE FROM `registro`.`estudiante` WHERE `estudiante`.`codigo` = '$codigo'";
		$resborr=$mysqli->query($sqlborr);
		
		
		
		if($resborr>0)
	{
		$bandera=true;

	}else
	{
		$error="ERRO AL BORRAR";
	}	

}
else 
{
	$error="EL USUARIO NO EXISTE!!!!";
}



	}else if (!empty($_POST['codigobuscar']))
	
	{
		$codigo=mysqli_real_escape_string($mysqli,$_POST['codigobuscar']);	
	}

	else if (!empty($_POST['codigo']))

	{
$codigo=mysqli_real_escape_string($mysqli,$_POST['codigo']);
    $sqluser="SELECT codigo FROM estudiante WHERE codigo='$codigo'";
     
$resuser=$mysqli->query($sqluser);	
$row=$resuser->num_rows;
if($row>0)
{
	$codigo=mysqli_real_escape_string($mysqli,$_POST['codigo']);	
  $nombres=mysqli_real_escape_string($mysqli,$_POST['nombresmodificar']);
  $direccion=mysqli_real_escape_string($mysqli,$_POST['direccion']);	
  $telefono=mysqli_real_escape_string($mysqli,$_POST['telefono']);	
  $horario=mysqli_real_escape_string($mysqli,$_POST['horario']);	
  $correo=mysqli_real_escape_string($mysqli,$_POST['correo']);
  $encargado=mysqli_real_escape_string($mysqli,$_POST['encargado']);
	$sqlborr="UPDATE `registro`.`estudiante` SET nombre='$nombres' ,encargado='$encargado' , telefono='$telefono'  , direccion='$direccion',correo='$correo',horario='$horario' WHERE codigo='$codigo'";
		$resborr=$mysqli->query($sqlborr);
		
  


			if($resborr>0)
	{
		$bandera=true;

	}else
	{
		$error="ERROR AL MODIFICAR";
	}	
}else 
{
	$error="EL USUARIO NO EXISTE";
}
	}else if ((!empty($_POST['asig']))&& (!empty($_POST['asigcod'])))
	{
	
	$asig=mysqli_real_escape_string($mysqli,$_POST['asig']);
	$asigcod=mysqli_real_escape_string($mysqli,$_POST['asigcod']);	
  $selectprofeq=mysqli_real_escape_string($mysqli,$_POST['selectprofe']);
$sqlasiga="SELECT cod_asignatura FROM asignatura WHERE cod_asignatura='$asigcod'";
$resuasiga=$mysqli->query($sqlasiga);
$rowa=$resuasiga->num_rows;

if($rowa>0)
{
$error="<script type='text/javascript'> alert('Ya existe una asignatura con el mismo codigo')</script>";	
}

else
{
		$sqlasig="INSERT INTO asignatura (cod_asignatura,nombre_asignatura)
		VALUES ('$asigcod','$asig')";
    $resuasig=$mysqli->query($sqlasig); 

$sqlasigt="SELECT cod_asignatura FROM asignatura WHERE cod_asignatura='$asigcod'";
$resuasigt=$mysqli->query($sqlasigt);



$control="INSERT INTO control1 (id_control,cod_asignatura,cod_profesor)
VALUES('','$asigcod','$selectprofeq')";
$cont=$mysqli->query($control);





$error="<script type='text/javascript'> alert('La asignatura se ingreso con exito')</script>";
	}

}else if ((!empty($_POST['profnom']))&& (!empty($_POST['profcod']))&& (!empty($_POST['profape']))&& (!empty($_POST['profcorr'])) )
{
  $codigo=mysqli_real_escape_string($mysqli,$_POST['profcod']);
  $nombre=mysqli_real_escape_string($mysqli,$_POST['profnom']);
  $apellido=mysqli_real_escape_string($mysqli,$_POST['profape']);
  $correo=mysqli_real_escape_string($mysqli,$_POST['profcorr']);
  $sqlprof="SELECT cod_profesor FROM profesor WHERE cod_profesor='$codigo'";
  $resuprofa=$mysqli->query($sqlprof);
  $rowb=$resuprofa->num_rows;
  if($rowb>0)
{
$error="<script type='text/javascript'> alert('Ya existe un profesor con el mismo codigo')</script>";  
}

else 
{
  
    $sqlasig="INSERT INTO profesor (cod_profesor,nombres, apellidos, correo,id_usuario)
    VALUES ('$codigo','$nombre','$apellido','$correo','')";
$resuasig=$mysqli->query($sqlasig); 
$error="<script type='text/javascript'> alert('Se agrego el empleado con exito')</script>";
}

}else if ((!empty($_POST['selectuserprof']))&& (!empty($_POST['user']))&& (!empty($_POST['pass'])) )
{
	$codigoa=mysqli_real_escape_string($mysqli,$_POST['selectuserprof']);
  $user=mysqli_real_escape_string($mysqli,$_POST['user']);
  $pass=mysqli_real_escape_string($mysqli,$_POST['pass']);
   $hash = sha1($pass);
   $sqlprofc="INSERT  INTO usuario (id_usuario,usuario,contrasena,tipo_usuario)
   VALUES ('$codigoa' ,'$user','$hash','profesor')";   
   $cont=$mysqli->query($sqlprofc);


$error="<script type='text/javascript'> alert('se creo el usuario correctamente')</script>";  


}
}



?>

<head>

<title>Inicio</title>

<script>
	
	
		function agregar();

		{
			document.registro.submit();
		
	}
</script>


<style type="text/css">
*
{
	list-style:none;

}
.btn {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
#menu-bar {
  width: 65%;
  margin:30px 0px 0px 240px;
  padding: 6px 6px 2px 25px;
  height: 40px;
  line-height: 100%;
  border-radius: 400px;
  -webkit-border-radius: 50px;
  -moz-border-radius: 50px;
  box-shadow: 0px -15px 20px #666666;
  -webkit-box-shadow: 0px -15px 20px #666666;
  -moz-box-shadow: 0px -15px 20px #666666;
  background: #14ADFA;
  border: double 0px #6D6D6D;
  position:relative;
  z-index:999;
}
#menu-bar li {
  margin: 0px 9px 19px 25px;
  padding: 0px 24px 0px 25px;
  float: left;
  position: relative;
  list-style: none;
}
#menu-bar a {
  font-weight: bold;
  font-family: 'comic sans ms';
  font-style: normal;
  font-size: 17px;
  color: #E7E5E5;
  text-decoration: none;
  display: block;
  padding: 6px 20px 6px 20px;
  margin: 0;
  margin-bottom: 19px;
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  text-shadow: 2px 2px 3px #000000;
}
#menu-bar li ul li a {
  margin: 0;
}
#menu-bar .active a, #menu-bar li:hover > a {
  background: #196EFF;
  color: #F5F1F0;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
  -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
  box-shadow: 0 1px 1px rgba(0, 0, 0, .2);
  text-shadow: 0px 0px 25px #FFFFFF;
}
#menu-bar ul li:hover a, #menu-bar li:hover li a {
  background: none;
  border: none;
  color: #666;
  -box-shadow: none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
}
#menu-bar ul a:hover {
  background: #0399D4 !important;
  background: linear-gradient(top,  #04ACEC,  #0186BA) !important;
  background: -ms-linear-gradient(top,  #04ACEC,  #0186BA) !important;
  background: -webkit-gradient(linear, left top, left bottom, from(#04ACEC), to(#0186BA)) !important;
  background: -moz-linear-gradient(top,  #04ACEC,  #0186BA) !important;
  color: #FFFFFF !important;
  border-radius: 0;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  text-shadow: 2px 2px 3px #FFFFFF;
}
#menu-bar li:hover > ul {
  display: block;
}
#menu-bar ul {
  background: #000000;
  display: none;
  margin: 0;
  padding: 0;
  width: 185px;
  position: absolute;
  top: 30px;
  left: 0;
  border: solid 4px #FFFFFF;
  border-radius: 10px;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-box-shadow: 9px 16px 18px #222222;
  -moz-box-shadow: 9px 16px 18px #222222;
  box-shadow: 9px 16px 18px #222222;
}
#menu-bar ul li {
  float: none;
  margin: 0;
  padding: 0;
}
#menu-bar ul a {
  padding:21px 0px 6px 23px;
  color:#FFFFFF !important;
  font-size:12px;
  font-style:normal;
  font-family:'comic sans ms';
  font-weight: normal;
  text-shadow: 0px 2px 3px #FFFFFF;
}
#menu-bar ul li:first-child > a {
  border-top-left-radius: 10px;
  -webkit-border-top-left-radius: 10px;
  -moz-border-radius-topleft: 10px;
  border-top-right-radius: 10px;
  -webkit-border-top-right-radius: 10px;
  -moz-border-radius-topright: 10px;
}
#menu-bar ul li:last-child > a {
  border-bottom-left-radius: 10px;
  -webkit-border-bottom-left-radius: 10px;
  -moz-border-radius-bottomleft: 10px;
  border-bottom-right-radius: 10px;
  -webkit-border-bottom-right-radius: 10px;
  -moz-border-radius-bottomright: 10px;
}
#menu-bar:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
#menu-bar {
  display: inline-block;
}
  html[xmlns] #menu-bar {
  display: block;
}
* html #menu-bar {
  height: 1%;
}

</style>
</head>
<body >
<ul id="menu-bar">
 <li><a href="#">Empleado</a> 
<ul>
<li><a href="#"   name="agreagarprofe"   onClick="agregar6  ();">Crear encargado </a></li> 

</ul>
</li>
 <li><a href="#">Tiendas</a>
  <ul>
<li><a href="#" name="agregar"   onClick="agregar1();">Agregar Tienda</a></li>
<li><a href="#" name="modificar"   onClick="agregar3();">Modificar Tienda</a></li>
   <li><a href="#"   name="borrar"   onClick="agregar2();">Borrar Tienda </a></li>  
   
   
   
  </ul>
 </li>
 
 <li><a href="#"  >Usuario</a>
 <ul>
  <li><a href="#" name="agreagaruser"   onClick="agregar7();" >Agregar Usuario</a></li> 
 </ul>
 </li>
 <li><a href="#">Informe</a></li>
</ul>



 		
 		

 	
 		

<script type="text/javascript">
function agregar1(){
	if(  document.getElementById('agregar2').style.display == 'none' && document.getElementById('agregar3').style.display == 'none'&& document.getElementById('agregar4').style.display == 'none' && document.getElementById('agregar5').style.display == 'none' && document.getElementById('agregar6').style.display == 'none'&& document.getElementById('agregar7').style.display == 'none')
	{
document.getElementById('agregar1').style.display = 'block';
}
}

function ocultar1(){
document.getElementById('agregar1').style.display = 'none';

}

function agregar2(){

if( document.getElementById('agregar1').style.display == 'none' && document.getElementById('agregar3').style.display == 'none'&& document.getElementById('agregar4').style.display == 'none' && document.getElementById('agregar5').style.display == 'none' && document.getElementById('agregar6').style.display == 'none' && document.getElementById('agregar7').style.display == 'none')
{
document.getElementById('agregar2').style.display = 'block';
}
}

function ocultar2(){

document.getElementById('agregar2').style.display = 'none';


}
function agregar3(){
if( document.getElementById('agregar1').style.display == 'none'&& document.getElementById('agregar2').style.display == 'none' && document.getElementById('agregar4').style.display == 'none' && document.getElementById('agregar5').style.display == 'none' && document.getElementById('agregar6').style.display == 'none' && document.getElementById('agregar7').style.display == 'none')
{
document.getElementById('agregar3').style.display = 'block';
}
}

function ocultar3(){

document.getElementById('agregar3').style.display = 'none';


}
function agregar4(){
if( document.getElementById('agregar1').style.display == 'none'&& document.getElementById('agregar2').style.display == 'none' && document.getElementById('agregar3').style.display == 'none'&& document.getElementById('agregar5').style.display == 'none'&& document.getElementById('agregar6').style.display == 'none' && document.getElementById('agregar7').style.display == 'none')
{
document.getElementById('agregar4').style.display = 'block';
}
}

function ocultar4(){

document.getElementById('agregar4').style.display = 'none';


}
function agregar5(){
if( document.getElementById('agregar1').style.display == 'none'&& document.getElementById('agregar2').style.display == 'none' && document.getElementById('agregar3').style.display == 'none'&& document.getElementById('agregar4').style.display == 'none'&& document.getElementById('agregar6').style.display == 'none' && document.getElementById('agregar7').style.display == 'none')
{
document.getElementById('agregar5').style.display = 'block';
}
}

function ocultar5(){

document.getElementById('agregar5').style.display = 'none';


}

function agregar6(){
if( document.getElementById('agregar1').style.display == 'none'&& document.getElementById('agregar2').style.display == 'none' && document.getElementById('agregar3').style.display == 'none'&& document.getElementById('agregar4').style.display == 'none'&& document.getElementById('agregar5').style.display == 'none'&& document.getElementById('agregar7').style.display == 'none' )
{
document.getElementById('agregar6').style.display = 'block';
}
}

function ocultar6(){

document.getElementById('agregar6').style.display = 'none';


}
function agregar7(){
if( document.getElementById('agregar1').style.display == 'none'&& document.getElementById('agregar2').style.display == 'none' && document.getElementById('agregar3').style.display == 'none'&& document.getElementById('agregar4').style.display == 'none'&& document.getElementById('agregar5').style.display == 'none' && document.getElementById('agregar6').style.display == 'none' )
{
document.getElementById('agregar7').style.display = 'block';
}
}

function ocultar7(){

document.getElementById('agregar7').style.display = 'none';


}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 function registros()
 {
 	document.registro.submit();
 	
}
 function borrar()
 {
 	document.borron.submit();
 	
}

function modificar()
 {
 	document.modifi.submit();
 	
}
function buscar()
 {
 	document.busc.submit();
 	
}

function nevasig()
 {
 	document.asignaturas.submit();
 	
}

function profe()
 {
 	document.profesor.submit();
 	
}

function useres()
{
  document.user.submit();
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
</script> 









<div id="header">
<ul class="nav">
 	  
 	 


 	  <div id='agregar1' style='display:none;'>
 	  <center>




<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="registro" name="registro">	
<div class="form-input"> 


<input id="codigo" name="codigo" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:200px;left:550px;"required />

<p1  style="position:absolute;top:200px;left:420px;">CODIGO</p1>

<input id="nombre"type="text"  name="nombre" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:250px;left:550px;" required />

<p1  style="position:absolute;top:250px;left:420px;">NOMBRE</p1>

<input id="direccion" type="text"  name="direccion" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:300px;left:550px;" required />

<p1  style="position:absolute;top:300px;left:420px;">DIRECCION</p1>


<input id="electronico" type="text"  name="electronico" style="width:430px;height:22px; font-family:Verdana;position:absolute;top:450px;left:550px;" required />
<p1  style="position:absolute;top:450px;left:420px;">CORREO</p1>

<input id="telefono" type="text"  name="telefono" style="width:430px;height:22px; font-family:Verdana;position:absolute;top:500px;left:550px;" required />
<p1  style="position:absolute;top:500px;left:420px;">TELEFONO</p1>


</div>

</select>







<p1  style="position:absolute;top:350px;left:420px;">ENCARGADO</p1>

<select id="encargado" name="encargado" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:350px;left:550px;">
<?php
  $sql="SELECT * FROM profesor
  where cod_profesor != 0 ";
  $resu=$mysqli->query($sql);
  
  while($row=mysqli_fetch_array($resu))

  {
    echo'<option value ="'.$row["cod_profesor"].'">';
    echo$row['cod_profesor'];
    echo"</option>";


  }

    
?>
</select>
<input id="horario" type="text"  name="horario" style="width:430px;height:22px; font-family:Verdana;position:absolute;top:400px;left:550px;" required />
<p1  style="position:absolute;top:400px;left:420px;">HORARIO</p1>

<li> <input  style="Position:Absolute; left:40%; top:120%" type="button" value="Crear" class="btn" onClick="registros();" /></li>
 
 </form>


<input style="Position:Absolute; left:60%; top:120%" class="btn" name="atras" type="button" value="Atras" onClick="ocultar1();"></li>

</center>

 	  </div>
	  

	 

	  <div id='agregar2' style='display:none;'>
	  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="borron" name="borron">
	  <li> <input  style="Position:Absolute; left:35%; top:70%" type="button" value="BORRAR" class="btn" onClick="borrar();" /></li>
	  
    <select id="selectasignaturamodificar"name="selectasignaturamodificar"style="width:500px;height:22px; font-family:Verdana;position:absolute;top:200px;left:550px;">
<?php
	$sql="SELECT * FROM estudiante";
	$resu=$mysqli->query($sql);
	
	while($row=mysqli_fetch_array($resu))

	{
		echo'<option value ="'.$row["nombre"].'">';
		echo$row['codigo'];
		echo"</option>";


	}

		
?>
 </select>
<p1  style="position:absolute;top:200px;left:420px;">CODIGO</p1>
	  <input style="Position:Absolute; left:60%; top:70%" class="btn" name="atras" type="button" value="Atras" onClick="ocultar2();"></li>
	    </form>
	    </div>	
	  

	  
	  
  <div id='agregar3' style='display:none;'>






  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="modifi" name="modifi">	
  <select id="codigo"name="codigo"style="width:500px;height:22px; font-family:Verdana;position:absolute;top:200px;left:550px;">
<?php
	$sql="SELECT * FROM estudiante";
	$resu=$mysqli->query($sql);
	
	while($row=mysqli_fetch_array($resu))

	{
		echo'<option value ="'.$row["codigo"].'">';
		echo$row['codigo'];
		echo"</option>";


	}

		
?>
 </select>

  
<p1  style="position:absolute;top:200px;left:420px;">CODIGO</p1>
<input id="nombresmodificar" type="text"  name="nombresmodificar" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:250px;left:550px;" required />

<p1  style="position:absolute;top:250px;left:420px;">NOMBRE</p1>

<input id="direccion" type="text"  name="direccion" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:300px;left:550px;" required />

<p1  style="position:absolute;top:300px;left:420px;">DIRECCION</p1>

 <select id="encargado"name="encargado"style="width:500px;height:22px; font-family:Verdana;position:absolute;top:350px;left:550px;">
<?php
	$sql="SELECT * FROM profesor";
	$resu=$mysqli->query($sql);
	
	while($row=mysqli_fetch_array($resu))

	{
		echo'<option value ="'.$row["cod_profesor"].'">';
		echo$row['nombres'];
		echo"</option>";


	}

		
?>
 </select>

<p1  style="position:absolute;top:350px;left:420px;">ENCARGADO</p1>



<input id="correo" type="text"  name="correo" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:400px;left:550px;" required />
<p1  style="position:absolute;top:450px;left:420px;">CORREO</p1>
<input id="telefono" type="text"  name="telefono" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:450px;left:550px;" required />

<p1  style="position:absolute;top:500px;left:420px;">TELEFONO</p1>
<input id="horario" type="text"  name="horario" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:500px;left:550px;" required />

<p1  style="position:absolute;top:400px;left:420px;">HORARIO</p1>

<li> <input  style="Position:Absolute; left:40%; top:120%" type="button" value="MODIFICAR" class="btn" onClick="modificar();" /></li>
 
 </form>












  <input style="Position:Absolute; left:60%; top:120%" class="btn" name="atras" type="button" value="Atras" onClick="ocultar3();"></li>
	    </div>

	  
	    <div id='agregar4' style='display:none;'>
	    <input id="codigobuacar" name="codigo" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:200px;left:550px;"required/>
 
<p1  style="position:absolute;top:200px;left:420px;">CODIGO</p1>
	    <input style="Position:Absolute; left:60%; top:70%" class="btn" name="atras" type="button" value="Atras" onClick="ocultar4();"></li>
	    </div>
	    <a style="Position:Absolute; left:70%; top:120%" class="btn" name="atras" type="button"  href="exel.php" >Cargar</a>






	    <div id='agregar5' style='display:none;'>
	    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="asignaturas" name="asignaturas">
	    <input id="asig" name="asig" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:250px;left:550px;"required/>
	    <input id="asigcod" name="asigcod" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:200px;left:550px;"required/>
 
<select id="selectprofe" name="selectprofe" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:150px;left:550px;">
<?php
  $sql="SELECT * FROM profesor
  where cod_profesor != 0 ";
  $resu=$mysqli->query($sql);
  
  while($row=mysqli_fetch_array($resu))

  {
    echo'<option value ="'.$row["cod_profesor"].'">';
    echo$row['cod_profesor'];
    echo"</option>";


  }

    
?>
</select>
<p1  style="position:absolute;top:150px;left:300px;">CODIGO DEL ENCARGADO</p1>
<p1  style="position:absolute;top:200px;left:300px;">CODIGO DE LA ASIGNATURA</p1>
<p1  style="position:absolute;top:250px;left:300px;">NOMBRE DE LA ASIGNATURA</p1>
<li> <input  style="Position:Absolute; left:35%; top:70%" type="button" value="AGREGAR" class="btn " onClick="nevasig();" /></li>

	    <input style="Position:Absolute; left:60%; top:70%" class="btn" name="atras" type="button" value="Atras" onClick="ocultar5();"></li>
	    </form> 
	    </div>



      <div id='agregar6' style='display:none;'>
	    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="profesor" name="profesor">

	    <input id="profcod" name="profcod" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:200px;left:550px;"required/>
	    <input id="profnom" name="profnom" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:250px;left:550px;"required/>
      <input id="profape" name="profape" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:300px;left:550px;"required/>
      <input id="profcorr" name="profcorr" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:350px;left:550px;"required/>

<p1  style="position:absolute;top:200px;left:300px;">CODIGO DEL ENCARGADO</p1>
<p1  style="position:absolute;top:250px;left:300px;">NOMBRES </p1>
<p1  style="position:absolute;top:300px;left:300px;">APELLIDOS</p1>
<p1  style="position:absolute;top:350px;left:300px;">CORREO</p1>




<li> <input  style="Position:Absolute; left:35%; top:70%" type="button" value="AGREGAR" class="btn" onClick="profe();" /></li>

	    <input style="Position:Absolute; left:60%; top:70%" class="btn" name="atras" type="button" value="Atras" onClick="ocultar6();"></li>
	    </form> 
	    </div>




<div id='agregar7' style='display:none;'>
      <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="user" name="user">

     
      <input id="user" name="user" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:250px;left:550px;" required/>
      <input id="pass" name="pass" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:300px;left:550px;" required/>
      





<select id="selectuserprof" name="selectuserprof" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:200px;left:550px;">
<?php
  $sql="SELECT * FROM profesor
  where cod_profesor != 0 ";
  $resu=$mysqli->query($sql);
  
  while($row=mysqli_fetch_array($resu))

  {
    echo'<option value ="'.$row["id_usuario"].'">';
    echo$row['cod_profesor'];
    echo"</option>";


  }

  echo  $row["id_usuario"];
?>
 </select>
<p1  style="position:absolute;top:200px;left:300px;">EMPLEADO</p1>
<p1  style="position:absolute;top:250px;left:300px;">USUARIO</p1>
<p1  style="position:absolute;top:300px;left:300px;">CONTRASEÑA</p1>





<li> <input  style="Position:Absolute; left:35%; top:70%" type="button" value="AGREGAR" class="btn" onClick="useres();" /></li>

      <input style="Position:Absolute; left:60%; top:70%" class="btn" name="atras" type="button" value="Atras" onClick="ocultar7();"></li>
      </form> 
      </div>
































</body>
 <?php if ($bandera) {?>
<h1><script> alert('USTED A ECHO LA OPERACION EXITOSAMENTE')</script></h1>

 <?php }else{ ?>
 <br/>
 	<div style="font-size:16px; color:oo0000;"> <?php echo isset($error) ? utf8_decode($error):'';?></div>
 	<?php }?>
<a style="Position:Absolute; left:80%; top:120%" class="btn" name="cerrar" type="button"href="login.php">Cerrar Sesion</a> 
</html>