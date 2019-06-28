<html>

<?php
	session_start();
	require 'conexion.php';
	if(!isset($_SESSION["id_usuario"]))
	{
		header("location:login.php");
	}
	$bandera=false;
 
 
if(!empty($_POST))
	{
		if((!empty($_POST['codigo']))&& (!empty($_POST['nombres']))&& (!empty($_POST['apellidos'])) && (!empty($_POST['selectasignatura'])) && (!empty($_POST['selectcarrera'])) )
		
		{

	$codigo=mysqli_real_escape_string($mysqli,$_POST['codigo']);
$nombres=mysqli_real_escape_string($mysqli,$_POST['nombres']);
$apellidos=mysqli_real_escape_string($mysqli,$_POST['apellidos']);
$asignatura=$_POST['selectasignatura'];
$carrera=$_POST['selectcarrera'];


$sqluser="SELECT codigo FROM estudiante WHERE codigo='$codigo'";
$resuser=$mysqli->query($sqluser);	
$row=$resuser->num_rows;
if($row>0)
{
	$error="El usuario ya existe!!!!";
}
else
{
	$sqlestu="INSERT INTO estudiante (codigo,nombre,apellidos,cod_carrera,cod_asignatura)
	VALUES('$codigo','$nombres','$apellidos','$carrera','$asignatura')";
	$resulestu=$mysqli->query($sqlestu);

	

	
	
	

	if($resulestu>0)
	{
		$bandera=true;

	}else
	{
		$error="Error al registrar";
	}
	

}
}


	
}



?>

<head>
<img src="incc3.jpg">
<title>Inicio</title>
<script>
	
	
</script>
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
            color: #FFF;
            background: #7F8C8D;
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
   
.azul{
  background: #3498DB;
  box-shadow: 0px 5px 0px 0px #2980B9;

}

.azul:hover{
  background: #39a0e5;
   
}

.azul:active{
  box-shadow: 0px 2px 0px 0px #2980B9;
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

<ul class="nav">
 	  
 	  <li><input style="Position:Absolute; left:30%; top:5%" class="boton azul" name="agregar" type="button" value="Agregar" ></li>


 	  
 	  <center>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="registro" name="registro">	
<input id="codigo" name="codigo" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:200px;left:550px;"required />

<p1  style="position:absolute;top:200px;left:420px;">CODIGO</p1>

<input id="nombres"type="text"  name="nombres" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:250px;left:550px;" required />

<p1  style="position:absolute;top:250px;left:420px;">NOMBRES</p1>

<input id="apellidos" type="text"  name="apellidos" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:300px;left:550px;" required />

<p1  style="position:absolute;top:300px;left:420px;">APELLIDOS</p1>

 <select id="selectasignatura"name="selectasignatura"style="width:500px;height:22px; font-family:Verdana;position:absolute;top:350px;left:550px;">
<?php
	$sql="SELECT * FROM asignatura";
	$resu=$mysqli->query($sql);
	
	while($row=mysqli_fetch_array($resu))

	{
		echo'<option value ="'.$row["cod_asignatura"].'">';
		echo$row['nombre de la asignatura'];
		echo"</option>";
	}

		
?>
 </select>

<p1  style="position:absolute;top:350px;left:420px;">ASIGNATURA</p1>

<select id="selectcarrera" name="selectcarrera"style="width:500px;height:22px; font-family:Verdana;position:absolute;top:400px;left:550px">
<?php

	$sql="SELECT * FROM carrera";
	$resu=$mysqli->query($sql);
	
	while($row=mysqli_fetch_array($resu))

	{
		echo'<option value ="'.$row["cod_carrera"].'">';
		echo$row['nombre'];
		echo"</option>";
	}

		
?>
 </select>

<p1  style="position:absolute;top:400px;left:420px;">CARRERA</p1>

<li> <input  style="Position:Absolute; left:50%; top:70%" type="button" value="REGISTRAR" class="boton azul" onClick="registros();" /></li>
 
 </form>


<input style="Position:Absolute; left:70%; top:70%" class="boton azul" name="atras" type="button" value="Atras" onClick="ocultar1();"></li>

</center>

 	 	  

	  
	    
	  
</body>
 <?php if ($bandera) {
alert("mensaje de alerta");

  }else{ ?>
 <br/>
 	<div style="font-size:16px; color:oo0000;"> <?php echo isset($error) ? utf8_decode($error):'';?></div>
 	<?php }?>
<a style="Position:Absolute; left:80%; top:80%" class="boton azul" name="cerrar" type="button"href="login.php">Cerrar Sesion</a> 
</html>