<?php
//Exportar datos de php a Excel
header("Content-Type: application/vnd.ms-excel" );
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0" );
date_default_timezone_set('America/Bogota');
$nombre=date("d-m-Y H-i-s",time()).".xls";
header("content-disposition: attachment;filename=$nombre");

?>
<HTML LANG="es">
<TITLE>::. Exportacion de Datos .::</TITLE>
</head>
<body>
<?php
session_start();
  require 'conexion.php';

$sql = "SELECT * FROM asistencia";
  $result=$mysqli->query($sql);

?>

<TABLE BORDER=1 align="center" CELLPADDING=1 CELLSPACING=1>
<TR>
<TD>CODIGO</TD>
<TD>ENOMBRE</TD>
<TD>APELLIDO</TD>
<TD>CODIGO DE CARRERA</TD>
<TD>CODIGO ASIGNATURA</TD>
<TD>CORREO</TD>
<TD>FECHA</TD>

</TR>
<?php
while($row = mysqli_fetch_array($result)) {
printf("<tr>
<td>&nbsp;%s</td>
<td>&nbsp;%s&nbsp;</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
<td>&nbsp;%s</td>
</tr>", $row["codigo"],$row["nombre"],$row["apellido"],$row["cod_carrera"],$row["cod_asignatura"],$row["cod_electronico"],$row["fecha"]);
}
mysqli_free_result($result);
 //Cierras la Conexión
$sqlr = "DELETE FROM asistencia";
  $result=$mysqli->query($sqlr);
?>
</table>
</body>
</html>