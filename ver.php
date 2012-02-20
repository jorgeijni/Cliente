<?
	include("includes/claseRecordset.inc.php"); 
	include("includes/conexion.inc.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Listar los datos de los Usuarios Registrados</title>
<style type="text/css">
#form1 table {
	text-align: left;
}
</style>
</head>

<body>
<H1>Lista de Todos los clientes </H1>
<div align="left"><a href="index.php">Regresar al menú</a></div>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <?
	$result=mysql_query("SELECT id,username,email,nombre,identificacion FROM usuarios ORDER by nombre",
	  $oConn);
	echo"<table width=800 border=2>
		<tr>
		<td><b>ID</b></td><td><b>username</b></td><td><b>email</b></td><td><b>nombre</b></td><td><b>Identificación</b></td>
		</tr>";
		while($row=mysql_fetch_row($result)){
		  echo"<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td>
			</tr>";
		}
	echo"</table>";
	mysql_close($oConn);
?>
</form>
</body>
</html>