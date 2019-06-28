
<?php
error_reporting(0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
	require('conexion.php');
	session_start();
	if(!empty($_POST))
	{
		 $usuario=mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$password=mysqli_real_escape_string($mysqli,$_POST['password']);
		$error='';
	
		$sql="SELECT * FROM usuario where usuario='$usuario'AND contrasena='$password'";
		$result=$mysqli->query($sql);
		$rows=$result->num_rows;
	

	
		if($rows > 0)
		{

			$row=$result->fetch_assoc();
			$_SESSION['id_usuario']=$row['id_usuario'];
			$_SESSION['tipo_usuario']=$row['tipo_usuario'];
			$_SESSION['usuario']=$row['usuario'];
			header("location:filtro.php");
		
			
		}
		else{
				$error="El nombre o la contraseña son incorrectos";
			}
		}
		
	

	


?>

<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
<body>
<script>
function useres()
{
  document.we.submit();
}
</script>

 



  <div class="page-container">
            <h1>Login</h1>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="we" name="we">
                <input type="text" name="usuario" id="usuario" class="username" placeholder="Username">
                <input type="password" name="password" id="password" class="password" placeholder="Password">
                <button type="submit" neme="entrar" onClick="useres();">Sign me in</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p>Or connect with:</p>
                <p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p>
            </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>
	<br>
</div>	
	<div style="font-size:16px; color:oo0000;"> <?php echo isset($error) ? utf8_decode($error):'';?></div>
</html>