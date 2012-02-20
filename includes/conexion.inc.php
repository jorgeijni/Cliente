<?php
   $rs = new RecordSet();
   $host = "localhost";
   $user = "root";
   $password = "jorge";
     
   $oConn = mysql_connect($host, $user, $password)
   	or die("Error conectando a la base de datos....");
   mysql_select_db("clientes",$oConn)
   	or die("Error seleccionando la base de datos.");
?>