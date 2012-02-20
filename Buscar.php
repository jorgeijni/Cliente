<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<h1><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Buscador </a></h1>
<form name="buscar" action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
    Buscar: <input type="text" size="50" value="<?php echo $_GET['frase']; ?>" name="frase" />
    <input type="submit" name="buscar" value="Buscar" />
</form>
<div align="left"><a href="index.php">Regresar al menú</a></div>

<?php

	include("includes/claseRecordset.inc.php"); 
	include("includes/conexion.inc.php");
// varificamos que el formulario halla sido enviado
if(isset($_GET['buscar']) && $_GET['buscar'] == 'Buscar'){
    $frase = addslashes($_GET['frase']);
    // hacemos la consulta de busqueda
   $sqlBuscar = mysql_query("SELECT id, username, nombre, identificacion, fechanacimiento, email, idpais ,
                            MATCH (username, nombre, identificacion)
                            AGAINST ('$frase' IN BOOLEAN MODE) AS coincidencias
                            FROM usuarios WHERE MATCH (username, nombre, identificacion)
                            AGAINST ('$frase' IN BOOLEAN MODE)
                            ORDER BY coincidencias DESC", $oConn)
                            or die(mysql_error());
   
    $totalRows = mysql_num_rows($sqlBuscar);
    // Enviamos un mensaje
    // indicando la cantidad de resultados ($totalRows)
    // para la frase busada ($frase)
    if(!empty($totalRows)){
        echo stripslashes("<p>Su b&uacute;squeda arroj&oacute; <strong>$totalRows</strong> resultados para <strong>$frase</strong></p>");
        // mostramos los nombre de los campos a mostrar dependiendo que querenos ver
		echo"<table width=900 border=2>
		<tr>
			<td><b>ID</b></td>
			<td><b>username</b></td>
			<td><b>Nombre</b></td>
			<td><b>Identificación</b></td>
			<td><b>Fecha de Nacimiento</b></td>
			<td><b>Email</b></td>
			<td><b>País</b></td>
			<td><b>Actualizar</b></td>
			<td><b>Eliminar</b></td>
		</tr>";
		//mostramos los resultados obtenidos
		while($row = mysql_fetch_array($sqlBuscar)){
		 	echo"<tr>
			<td>$row[0]</td>
			<td>$row[1]</td>
			<td>$row[2]</td>
			<td>$row[3]</td>
			<td>$row[4]</td>
			<td>$row[5]</td>
			<td>$row[6]</td>
			<td>$row[8]<a href=Actualizar.php?id=$row[0]>Actualizar</a></td>
			<td>$row[9]<a href=Eliminar.php?id=$row[0]>Eliminar</a></td>
			</tr>";
		}
		echo"</table>";      
    }
    // si se ha enviado vacio el formulario
    // mostramos un mensaje del tipo Oops...!
    elseif(empty($_GET['frase'])){
        echo "Debe introducir una palabra o frase.";
    }
    // si no hay resultados //
    elseif($totalRows == 0){
        echo stripslashes("Su busqueda no arrojo resultados para <strong>$frase</strong>");
    }
}
mysql_close($oConn);
?>
</body>
</html>