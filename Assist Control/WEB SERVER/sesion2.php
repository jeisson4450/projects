<?
if(isset($_COOKIE["misitio_userid"]))
echo "usuario con sesion iniciada";
else
echo"no haz iniciado sesion<br/> <a href=sesion.html>iniciar sesion </a>";
?>

INSERT INTO "usuario" ("","usuario","contraseña","tipo_usuario" )
VALUES ("","jeisson",1234,"administrador");