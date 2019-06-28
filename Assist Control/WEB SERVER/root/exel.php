<?php
 		session_start();
		$conexion = mysql_connect("localhost","root","usbw");
		mysql_select_db("registro",$conexion);

		
?>

<html >
<head >


<title>Estudiantes</title>
<style type="text/css" >
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

<body style="background: url('incc3.jpg') top left no-repeat;">

<div align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1" >


<table width="90%" border="0">
  <tr>
    <td>
      <strong>Agregar Archivo de Excel </strong>
      
      <input type="file" name="archivo" id="archivo">
      <strong>Desea Actualizar la BD</strong>
      <label><input type="radio" name="radio" value="s" checked />SI</label>
      <label><input type="radio" name="radio" value="n" />NO</label>
      
<input type="submit" name="button" class="btn" id="button" value="Actualizar Base de Datos">
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<a style="Position:Absolute; left:70%; top:120%" class="boton azul" name="atras" type="button"  href="administrador.php" >atras</a>
<?php
    ini_set ('error_reporting', E_ALL & ~E_NOTICE);
	if(isset($_POST['radio'])){
		//subir la imagen del articulo
		$nameEXCEL = $_FILES['archivo']['name'];
		$tmpEXCEL = $_FILES['archivo']['tmp_name'];
		$extEXCEL = pathinfo($nameEXCEL);
date_default_timezone_set('America/Bogota');
$nombre = date("d-m-Y H-i-s",time()).".xls";
$ar=fopen("xls/$nombre","a+") or die("problemas de creacion");
Fwrite($ar,$_REQUEST["name"].PHP_EOL);
fclose($ar);




	;
		$urlnueva = "xls/asistencia.xls";
		
		if(is_uploaded_file($tmpEXCEL)){
			copy($tmpEXCEL,$urlnueva);	
			echo '<div align="center"><strong>Datos Actualizados con Exito</strong></div>';
		}
		
	}
?>
<table border="1" width="100%">
	<thead>
    	<tr>
        	<th><center><strong>A</strong></center></th>
            <th><center><strong>B</strong></center></th>
            <th><center><strong>C</strong></center></th>
            <th><center><strong>D</strong></center></th>
			<th><center><strong>E</strong></center></th>
			<th><center><strong>F</strong></center></th>
            <th><center><strong>G</strong></center></th>
            <th><center><strong>H</strong></center></th>
            <th><center><strong>I</strong></center></th>
        </tr>
    	<tr>
        	<th>CODIGO</th>
            <th>NOMBRE</th>
            <th>APELLIDOS</th>
            <th>C.CARRERA</th>
			<th>C.ASIGNATURA</th>
			<th>DOCUMENTO</th>
            <th>TELEFONO</th>
            <th>CORREO</th>
            <th>GENERO</th>
        </tr>
	</thead>
    <tbody>
  	<?php

		if(isset($_POST['radio'])){
			require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
			
			$objPHPExcel = PHPExcel_IOFactory::load('xls/empleados.xls');
			$objHoja=$objPHPExcel->getActiveSheet()->toArray(null,true,true,true,true,true,true,true,true);
			foreach ($objHoja as $iIndice=>$objCelda) {

						echo '
							<tr>
								<td>'.$objCelda['A'].'</td>
								<td>'.$objCelda['B'].'</td>
								<td>'.$objCelda['C'].'</td>
								<td>'.$objCelda['D'].'</td>
								<td>'.$objCelda['E'].'</td>
								<td>'.$objCelda['F'].'</td>
								<td>'.$objCelda['G'].'</td>
								<td>'.$objCelda['H'].'</td>
								<td>'.$objCelda['I'].'</td>
							</tr>
						';
				$codigo=$objCelda['A'];			$nombre=$objCelda['B'];
				$apellidos=$objCelda['C'];	$cod_carrera=$objCelda['D'];
				$cod_asignatura=$objCelda['E'];	$cod_documento=$objCelda['F'];
				$cod_telefono=$objCelda['G'];
				$cod_electronico=$objCelda['H'];
				$cod_genero=$objCelda['I'];	
									
				if($_POST['radio']=='s'){
			    	$sql="INSERT INTO estudiante 
		(codigo, nombre, apellidos, cod_carrera, cod_asignatura,cod_documento, cod_telefono,cod_electronico,cod_genero) 
	 					VALUES ('$codigo','$nombre','$apellidos','$cod_carrera','$cod_asignatura','$cod_documento','$cod_telefono','cod_electronico','cod_genero')";
						mysql_query($sql);
				}
					}
			}
	?>
    
    </tbody>
</table>
</div>

</body>
</html>