<?
	include("includes/claseRecordset.inc.php"); 
	include("includes/conexion.inc.php");
	include("includes/funciones.inc.php");
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registrar un nuevo usuario</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="js/mootools.js"></script>
<script language="JavaScript" type="text/javascript" src="js/iToolkit.js"></script>
<script language="JavaScript" type="text/javascript">
window.addEvent('load', PageLoad);
function PageLoad()
{
	//new iToolkit.ComboEnlazado(hijo, padre, servicioDeDatos);
	new iToolkit.ComboEnlazado("cboProvincia", "cboPais", "services/GetProvinciasPorPais.php");
	new iToolkit.ComboEnlazado("cboCiudad", "cboProvincia", "services/GetCiudadesPorProvincia.php");
}
</script>
</head>

<body>
<?php
if ( !empty($_GET['id']) ) {
	// traemos la noticia
	$query = "SElECT * FROM usuarios Where id={$_GET['id']} limit 1";
	$response = mysql_query($query, $oConn);
	$clientes = mysql_fetch_assoc($response);
}
?>

<h1>Actulizar datos de Usuario</h1>
<p><div align="left"><a href="index.php">Regresar al menú</a></div></p>
<form action="update.php" method="post" name="registro" id="registro">

<table width="617" border="0" cellpadding="2" cellspacing="0">
  <tr>
    <td width="153" height="30">Nombre de Usuario:</td>
    <td width="456"><label for="username"></label>
    <input type="text" name="username" id="username" style="width:250px;" value= "<? echo $clientes['username']; ?>"/></td>
  </tr>
   <tr>
    <td height="30">Contrase&ntilde;a:</td>
    <td><label for="password"></label>
     <input type="password" name="password" id="password" style="width:250px;" value= "<? echo $clientes['password']; ?>"/></td>
  </tr>
  <tr>
     <td height="30">Nombre Completo:</td>
    <td><label for="nombre"></label>
     <input type="text" name="nombre" id="nombre" style="width:250px;" value= "<? echo $clientes['nombre']; ?>"/></td>
  </tr>
   <tr>
     <td height="30">Fecha de Nacimiento:</td>
    <td><label for="fechanacimiento"></label>
     <input type="date" name="fechanacimiento" id="fechanacimiento" style="width:250px;" value= "<? echo $clientes['fechanacimiento']; ?>"/></td>
  </tr>
  <tr>
     <td height="30">Correo Electronico:</td>
    <td><label for="email"></label>
     <input type="email" name="email" id="email" style="width:250px;" value= "<? echo $clientes['email']; ?>"/></td>
  </tr>
  <tr>
  <td height="30">Sexo:</td>
    <td>
		<select name="cboSexo" id="cboSexo" style=" width:250px;">
			<? LlenarSexo(); ?>
		</select> 
		 Vuelva a elegir </td>
  </tr>
    <td height="30">Tipo de Identificaci&oacute;n:</td>
    <td>
		<select name="cboidentificacion" id="cboidentificacion" style=" width:250px;">
			<? LlenarIdentificacion(); ?>
		</select>
	  Vuelva a elegir </td>
  </tr>
  <tr>
     <td height="30">Identificación:</td>
    <td><label for="identificacion"></label>
     <input type="text" name="identificacion" id="identificacion" style="width:250px;" value= "<? echo $clientes['identificacion']; ?>"/></td>
  </tr>
  <tr>
    <td height="30">Pais:</td>
    <td>
		<select name="cboPais" id="cboPais" style=" width:250px;">
			<? LlenarPaises(); ?>
		</select>
	  Vuelva a elegir </td>
  </tr>
  <tr>
    <td height="30">Estado:</td>
    <td><select name="cboProvincia" id="cboProvincia" style="width:250px;">
      	</select>
      Vuelva a elegir </td>
  </tr>
  <tr>
    <td height="30">Ciudad:</td>
    <td><select name="cboCiudad" id="cboCiudad" style="width:250px;">
    </select>
      Vuelva a elegir </td>
  </tr>
  <tr>
    <td height="30"><input type="submit" name="actualizar" id="actualizar" value="Actualizar" /></td>
   <td><input value="<? echo $clientes['id']; ?>" name="id" type="text" id="id" readonly="readonly" />z</td>
  </tr>
</table> 
</form>
</body>
</html>
<?php mysql_close($oConn);?>