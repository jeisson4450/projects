<html>
<meta charset="utf-8">
  <title>Empleado</title>
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
 $hola=$_SESSION["id_usuario"];
if (!empty($_POST['informe']))
{


header("location:reporteexcel.php");
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
    $error="<script type='text/javascript'> alert('El ESTUDIANTE SE REGISTRO CON EXITO')</script>";
    
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
    $error="ERROR AL BORRAR";
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

  else if (!empty($_POST['codigomodificar']))

  {
$codigo=mysqli_real_escape_string($mysqli,$_POST['codigomodificar']);
    $sqluser="SELECT codigo FROM estudiante WHERE codigo='$codigo'";
$resuser=$mysqli->query($sqluser);  
$row=$resuser->num_rows;
if($row>0)
{
  
  $nombres=mysqli_real_escape_string($mysqli,$_POST['nombresmodificar']); 
  $apellidos=mysqli_real_escape_string($mysqli,$_POST['apellidosmodificar']); 
  $asignatura=mysqli_real_escape_string($mysqli,$_POST['selectasignaturamodificar']); 
  $carrera=mysqli_real_escape_string($mysqli,$_POST['selectcarreramodificar']); 

  $sqlborr="UPDATE `registro`.`estudiante` SET nombre='$nombres' ,apellidos='$apellidos' ,  cod_carrera='$carrera'  , cod_asignatura='$asignatura'WHERE codigo='$codigo'" ;
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
    VALUES ('$codigo','$nombre','apellido','correo','')";
$resuasig=$mysqli->query($sqlasig); 
$error="<script type='text/javascript'> alert('Se agrego al profesor con exito')</script>";
}

}else if ((!empty($_POST['selectuserprof']))&& (!empty($_POST['user']))&& (!empty($_POST['pass'])) )

{
  $codigoa=mysqli_real_escape_string($mysqli,$_POST['selectuserprof']);
  $user=mysqli_real_escape_string($mysqli,$_POST['user']);
  $pass=mysqli_real_escape_string($mysqli,$_POST['pass']);
  
   $sqlprofc="INSERT  INTO usuario (id_usuario,usuario,contrasena,tipo_usuario)
   VALUES ('$codigoa' ,'$user','$pass','profesor')";


$error="<script type='text/javascript'> alert('Ya existe un profesor con el mismo codigo')</script>";  


}else if ((!empty($_POST['codigowe'])))
    
    {
      $bandera=false;

  $codigowe=mysqli_real_escape_string($mysqli,$_POST['codigowe']);


$sqluser="SELECT codigo FROM asistencia WHERE codigo='$codigowe'";
$resuser=$mysqli->query($sqluser);  
$row=$resuser->num_rows;

$sqluseree="SELECT codigo FROM estudiante WHERE nombre='$codigowe'";
$resuser=$mysqli->query($sqluseree);  
$rowe=$resuser->num_rows;

if($row>0)
{
  $error="<script type='text/javascript'> alert('El estudiante ya esta registrado')</script>";
}
elseif($rowe>0)
{

  // $sqlwe="INSERT INTO asistencia (codigo,nombre,apellido,cod_carrera,cod_asignatura,cod_electronico)
  // SELECT  codigo,nombre,apellidos,cod_carrera,cod_asignatura,cod_electronico
  // FROM estudiante
  // where codigo='$codigowe'";
  // $resulwe=$mysqli->query($sqlwe);  
  // if($resulwe>0)
  // {
  //   $bandera=true;

  // }else
  // {
  //   $error="<script type='text/javascript'> alert('Error al registrar')</script>";
  // }


}

if ($rowe<=0)
{
  $error="<script type='text/javascript'> alert($codigowe)</script>";
}

}
}





?>
<script type="text/javascript">
   function eliminares()
 {
  document.eliminar.submit();

  
}
 </script>
<?php

if (isset($_POST["codigoyqr"]))
{
  $codigom=mysqli_real_escape_string($mysqli,$_POST['codigoyqr']);
//Se almacena en una variable el id del registro a eliminar


//Preparar la consulta
$consulta = "DELETE FROM asistencia WHERE codigo=$codigom";

//Ejecutar la consulta
  $resu=$mysqli->query($consulta); 
$error="<script type='text/javascript'> alert('se elimino con EXITO')</script>";
//redirigir nuevamente a la página para ver el resultado
$bandera=true;
?>

<?php
}
?>

<head>
<link rel="stylesheet" href="estilos.css">
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
  width: 20%;
  margin:60px 0px 0px 350px;
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
  
<ul>
<li><a href="#"   name="agreagarprofe"   onClick="agregar6  ();">Agregrar Profesor </a></li> 

</ul>
</li>
 
 
  <ul>
   <li><a href="#"  name="agreagarasig"   onClick="agregar5();">Agregar asignatura</a></li> 
   
  </ul>
 </li>
 <li><a href="#" name="clase" onClick="claseiniciar();" >TIENDAS</a>
 </li>
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
document.getElementById('pantalla').style.display = 'block';




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

function claseiniciar()
{
  document.getElementById('agregar7').style.display = 'none';
  document.getElementById('pantalla').style.display = 'block';

}


function planilla()
 {
  document.ingreso.submit();

  
}

function nota()
 {


document.informe.submit();
  
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
</script> 

<?php
$profsql="SELECT cod_profesor FROM profesor WHERE $hola=id_usuario";
  $resz=$mysqli->query($profsql);


$extraido= mysqli_fetch_array($resz);

 
?>







<div id="header">
<ul class="nav">
    
   


    <div id='agregar1' style='display:none;'>
  

    <center>




<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="registro" name="registro"> 
<div class="form-input"> 



</div>

</select>

<p1  style="position:absolute;top:560px;left:420px;"> 
<?php

$slk="SELECT * FROM asistencia";
$resu=$mysqli->query($slk); 



echo "<table WIDTH='900' border ='2'style='Position:Absolute; left:20%; top:60%' background='r.png'>";  
echo "<tr>";  
echo "<th>CODIGO</th>";  
echo "<th>NOMBRE</th>";  
echo "<th>DIRECCION</th>";
echo "<th>HORARIO</th>";
echo "<th>ENCARGADO</th>"; 
echo "<th>CORREO</th>"; 
echo "<th>TELEFONO</th>";  
echo "</tr>"; 

 while ($fila=mysqli_fetch_array($resu))
 {

 echo "<tr>";  
    echo "<td>$fila[codigo]     </td>";  
    echo "<td>$fila[nombre]       </td>";  
    echo "<td>$fila[apellido]    </td>";
    echo "<td>$fila[cod_carrera]  </td>";
    echo "<td>$fila[cod_asignatura]    </td>"; 
    echo "<td>$fila[cod_electronico]  </td>";
    echo "<input type='hidden' id='codigoyqr' name='codigoyqr' value='".$fila["codigo"]."'>";
    echo "<td>$fila[cod_electronico]</td>"; 

    echo "</tr>";  
} 
echo "</table>"; 
    ?></p1>




 <select id="selectasignatura" name="selectasignatura" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:350px;left:550px;">
<?php
  $sql="SELECT * FROM asignatura";
  $resu=$mysqli->query($sql);
  
  while($row=mysqli_fetch_array($resu))

  {
    echo'<option value ="'.$row["cod_asignatura"].'">';
    echo$row['nombre_asignatura'];
    echo"</option>";
  }

    
?>
 </select>

<p1  style="position:absolute;top:350px;left:420px;">Sede</p1>

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

<li> <input  style="Position:Absolute; left:40%; top:120%" type="button" value="REGISTRAR" class="btn" onClick="registros();" /></li>
 
 </form>


<input style="Position:Absolute; left:60%; top:120%" class="btn" name="atras" type="button" value="Atras" onClick="ocultar1();"></li>

</center>

    </div>
    <div id='agregar2' style='display:none;'>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="borron" name="borron">
    <li> <input  style="Position:Absolute; left:35%; top:70%" type="button" value="BORRAR" class="btn" onClick="borrar();" /></li>
    <input id="codigoborrar" name="codigoborrar" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:200px;left:550px;"required/>

<p1  style="position:absolute;top:200px;left:420px;">CODIGO</p1>
    <input style="Position:Absolute; left:60%; top:70%" class="btn" name="atras" type="button" value="Atras" onClick="ocultar2();"></li>
      </form>
      </div>  
    

    
    
  <div id='agregar3' style='display:none;'>






  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="modifi" name="modifi"> 
<input id="codigomodificar" type="text" name="codigomodificar" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:200px;left:550px;"required />

<p1  style="position:absolute;top:200px;left:420px;">CODIGO</p1>

<input id="nombresmodificar" type="text"  name="nombresmodificar" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:250px;left:550px;" required />

<p1  style="position:absolute;top:250px;left:420px;">NOMBRES</p1>

<input id="apellidosmodificar" type="text"  name="apellidosmodificar" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:300px;left:550px;" required />

<p1  style="position:absolute;top:300px;left:420px;">APELLIDOS</p1>

 <select id="selectasignaturamodificar"name="selectasignaturamodificar"style="width:500px;height:22px; font-family:Verdana;position:absolute;top:350px;left:550px;">
<?php
  $sql="SELECT * FROM asignatura";
  $resu=$mysqli->query($sql);
  
  while($row=mysqli_fetch_array($resu))

  {
    echo'<option value ="'.$row["cod_asignatura"].'">';
    echo$row['nombre_asignatura'];
    echo"</option>";


  }

    
?>
 </select>

<p1  style="position:absolute;top:350px;left:420px;">ASIGNATURA</p1>

<select id="selectcarreramodificar" name="selectcarreramodificar"style="width:500px;height:22px; font-family:Verdana;position:absolute;top:400px;left:550px">
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

<li> <input  style="Position:Absolute; left:30%; top:70%" type="button" value="MODIFICAR" class="btn" onClick="modificar();" /></li>
<p1  style="position:absolute;top:650px;left:420px;">ASIGNATURA
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
</p1>
 </form>











<p1  style="position:absolute;top:200px;left:420px;">CODIGO</p1>
  <input style="Position:Absolute; left:60%; top:70%" class="btn" name="atras" type="button" value="Atras" onClick="ocultar3();"></li>
      </div>

    
      <div id='agregar4' style='display:none;'>
      <input id="codigobuacar" name="codigo" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:200px;left:550px;"required/>
 
<p1  style="position:absolute;top:200px;left:420px;">CODIGO</p1>
      <input style="Position:Absolute; left:60%; top:70%" class="btn" name="atras" type="button" value="Atras" onClick="ocultar4();"></li>
      </div>
      <div id='agregar5' style='display:none;'>
      <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="asignaturas" name="asignaturas">
      <input id="asig" name="asig" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:250px;left:550px;"required/>
      <input id="asigcod" name="asigcod" style="width:500px;height:22px; font-family:Verdana;position:absolute;top:200px;left:550px;"required/>
 

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

<p1  style="position:absolute;top:200px;left:300px;">CODIGO DEL PROFESOR</p1>
<p1  style="position:absolute;top:250px;left:300px;">NOMBRES </p1>
<p1  style="position:absolute;top:300px;left:300px;">APELLIDOS</p1>
<p1  style="position:absolute;top:350px;left:300px;">CORREO</p1>




<li> <input  style="Position:Absolute; left:35%; top:70%" type="button" value="AGREGAR" class="btn" onClick="profe();" /></li>

      <input style="Position:Absolute; left:60%; top:70%" class="btn" name="atras" type="button" value="Atras" onClick="ocultar6();"></li>
      </form> 
      </div>




<div id='agregar7' style='display:none;'>
      <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="clase" name="clase">
<p1  style="position:absolute;top:200px;left:300px;" required>SELECCIONE LA MATERIA</p1>

<select id="selectuserprof" name="selectuserprof"style="width:500px;height:22px; font-family:Verdana;position:absolute;top:200px;left:550px;">
<?php


$sa=$extraido['cod_profesor'];
  $sql="SELECT  a.nombre_asignatura FROM profesor p INNER JOIN control1 c on(p.cod_profesor=c.cod_profesor)
  INNER JOIN asignatura a on (a.cod_asignatura=c.cod_asignatura )
  where c.cod_profesor=$sa";
  $resu=$mysqli->query($sql);
  
  while($row=mysqli_fetch_array($resu))

  {
    echo'<option value ="'.$row["cod_asignatura"].'">';
    echo$row['nombre_asignatura'];
    echo"</option>";
    echo $usuario;


  }

    
?>
 </select>





<li> <input  style="Position:Absolute; left:35%; top:70%" type="button" value="INICIAR" class="btn" onClick="claseiniciar();" /></li>

      <input style="Position:Absolute; left:60%; top:70%" class="btn" name="atras" type="button" value="Atras" onClick="ocultar7();">
      </form> 
      </div>




    <div id='pantalla' style='display:block;'>

<form action="empleado.php" method="POST" id="ingreso" name="ingreso" required> <p1  style="">Sede</p1>

<select id="codigowe" name="codigowe" class="codigo">
<?php

  $sql="SELECT * FROM asignatura";
  $resu=$mysqli->query($sql);
  
  while($row=mysqli_fetch_array($resu))

  {
    echo'<option value ="'.$row["nombre_asignatura"].'">';
    echo$row['nombre_asignatura'];
    echo"</option>";
  }

  $select = $_POST['codigowe'];
?>
 </select>





<input  style="" type="submit" value="Consultar" class="btn"   />

 





 


 
<?php

$slk="SELECT * FROM estudiante WHERE nombre='$select'";
$resu=$mysqli->query($slk);
echo "<table WIDTH='900' border ='2'style='Position:Absolute; left:20%; top:60%' background='r.png'>";  
echo "<tr>";  
echo "<th>CODIGO</th>";  
echo "<th>NOMBRE</th>";  
echo "<th>ENCARGADO</th>";
echo "<th>TELEFONO</th>";
echo "<th>DIRECCION</th>"; 
echo "<th>CORREO</th>"; 
echo "<th>HORARIO</th>";  
echo "</tr>"; 

 while ($fila=mysqli_fetch_array($resu))
 {

 echo "<tr>";  
    echo "<td>$fila[codigo]     </td>";  
    echo "<td>$fila[nombre]       </td>";  
    echo "<td>$fila[encargado]    </td>";
    echo "<td>$fila[telefono]  </td>";
    echo "<td>$fila[direccion]    </td>"; 
    echo "<td>$fila[correo]  </td>";
    echo"       <input type='hidden' id='codigoyqr' name='codigoyqr' value='".$fila["codigo"]."'>";
    echo "<td>$fila[horario]</td>"; 

    echo "</tr>";  
} 
echo "</table>"; 
    ?>
</center>


    </div>

</form>
 

















  <div class="wrap" style="position:absolute; top: 10px; left:10px;">
    <div class="widget">
      <div class="fecha">
        <p id="diaSemana" class="diaSemana"></p>
        <p id="dia" class="dia"></p>
        <p>de </p>
        <p id="mes" class="mes"></p>
        <p>del </p>
        <p id="year" class="year"></p>
      </div>
  
      <div class="reloj">
        <p id="horas" class="horas"></p>
        <p>:</p>
        <p id="minutos" class="minutos"></p>
        <p>:</p>
        <div class="caja-segundos">
          <p id="ampm" class="ampm"></p>
          <p id="segundos" class="segundos"></p>
        </div>
      </div>
    </div>
  </div>

<script src="reloj.js"></script>




</body>
 <?php if ($bandera) {?>
<h1><script> 



document.getElementById('pantalla').style.display = 'block';
</script></h1>

 <?php }else{ ?>
 <br/>
  <div style="font-size:16px; color:oo0000;"> <?php echo isset($error) ? utf8_decode($error):'';?></div>
  <?php }?>
<a style="Position:Absolute; left:80%; top:120%" class="btn" name="cerrar" type="button"href="login.php">Cerrar Sesion</a> 
</html>