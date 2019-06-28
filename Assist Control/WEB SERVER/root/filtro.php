<?php
	session_start();
	require 'conexion.php';
	if(!isset($_SESSION["id_usuario"]))
	{
		header("location:login.php");
	}

	$Usuario=$_SESSION['usuario'];
	$sqlq="SELECT u.id_usuario,p.nombres FROM usuario AS u INNER JOIN  profesor AS p
	ON u.id_usuario=p.id_usuario WHERE u.usuario='$Usuario'";
	$resu=$mysqli->query($sqlq);
	$row = $resu->fetch_assoc();

	


?>
<html>
	<head>
	<title>Inicio</title>
	</head>

	<body>
	<h1><?php echo 'Bienvenido/a  '.$row['nombres']; ?></h1>
	<?php if($_SESSION['tipo_usuario']=='administrador') 
		{
			header("location:administrador.php");
		}
		else 
				header("location:empleado.php");
	?>
		<a href="logout.php">Cerrar Sesion</a>
	</body>
</html>