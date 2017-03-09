<?session_start();?>
<!-- @Maite_Echeverry-->
<?include ('bloqueDeSeguridad.php');?>
<html>
<head>
<title>seleccion cartel</title>
<LINK REL="stylesheet" TYPE="text/css" HREF="stilo/sesiones.css">
</head>
<body> 
<h2 align="center">Estas a punto de realizar una compra, confirme que los datos y su compra es correcta!!!</h2>
<? 
include('conexionBD.php');

$usuario=$_SESSION['usuario'];
$sala=$_SESSION['sala'];
$fila=$_SESSION['fila'];
$columna=$_SESSION['columna'];
$sesion=$_SESSION['sesion'];
$fecha=$_SESSION['fecha'];
$hora=$_SESSION['hora'];
$numEn=$_SESSION['cantEn'];
$pelicula=$_SESSION['id_pelicula'];
$precio_valor=$_SESSION['precio_valor'];
$precio_tipo=$_SESSION['precio_tipo'];

$e='euros';
$arrayF = array();
while (list ($key, $val) = each ($_SESSION['fila'])) {  
  $arrayF[] = $val;
}
$arrayC = array();
while (list ($key, $val) = each ($_SESSION['columna'])) { 
  $arrayC[] = $val;
}    	 
?>
<p><a href='deseleccion.php'>Volver</a></p>
<div align="center">
      <table border="1" cellpadding='0' cellspacing='0' width="600" bgcolor="#F6F6F6" bordercolor="#FFFFFF">
			<tr>
				<td align='center'>Titulo</td>
				<td align='center'>Fecha</td>
				<td align='center'>Hora</td>
				<td align='center'>Sala</td>
				<td align='center'>Numero de Entradas</td>
			</tr>	                                                                                                              
            <?
			  $sql = "SELECT $tabla_peliculas.titulo FROM $tabla_peliculas
              INNER JOIN $tabla_sesiones USING(id_pelicula) WHERE
              $tabla_sesiones.id_pelicula=$pelicula and
              $tabla_sesiones.id_sala=$sala and
              $tabla_sesiones.fecha='$fecha' and
              $tabla_sesiones.hora='$hora'";
			  $resultado = mysql_query($sql);									
			  while( $fila = mysql_fetch_array($resultado)){
		          $titulo=$fila[0];
		      }					       
			  echo "<tr>";
			  echo "<td align='center'>".$titulo."</td>";
			  echo "<td align='center'>".$fecha."</td>";
			  echo "<td align='center'>".$hora."</td>";
			  echo "<td align='center'>".$sala."</td>";
			  echo "<td align='center'>".$numEn."</td>";                        
			  echo "<tr>";
	        ?>
		</table>
		<br><br><br>
		<table border="1" cellpadding='0' cellspacing='0' width="600" bgcolor="#F6F6F6" bordercolor="#FFFFFF">
			<tr>
				<td align='center'>Fila</td>
				<td align='center'>Butaca</td>
				<td align='center'>Precio</td>
                <td align='center'>Tipo</td>
			</tr>
			<br>
			<?
			$j=0;
			for($i=0; $i<$numEn; $i++){
				echo "<tr>";	
				echo "<td align='center'>$arrayF[$j]</td>"; 
				echo "<td align='center'>$arrayC[$j]</td>"; 
				echo "<td align='center'>$precio_valor $e</td>";
                echo "<td align='center'>$precio_tipo</td>";
				echo "<tr>";
				$j=$j+1;
		    }
			?>
		</table>
<br><br><br>	  
	  <table border="1" cellpadding='0' cellspacing='0' width="600" bgcolor="#F6F6F6" bordercolor="#FFFFFF">
			<tr>
			<!--TABLA DE INFORMACI�N DATOS DEL USUARIO-->
				<td align='center'>Documento Identidad</td>
				<td align='center'>Nombre</td>
				<td align='center'>Apellido</td>
				<td align='center'>Numero de tarjeta</td>
			</tr>                                                                                                          
            <?
              $sql = "SELECT $tabla_usuarios.dni,$tabla_usuarios.nombre,$tabla_usuarios.apellido,$tabla_usuarios.numTarjeta
                     FROM $tabla_usuarios WHERE $tabla_usuarios.id_cliente=$usuario";
	          $resultado = mysql_query($sql);									
			  while( $fila = mysql_fetch_array($resultado)){							       
			    echo "<tr>";
		        echo "<td align='center'>".$fila[0]."</td>";
		        echo "<td align='center'>".$fila[1]."</td>";
		        echo "<td align='center'>".$fila[2]."</td>";
		        echo "<td align='center'>".$fila[3]."</td>";                       
		        echo "<tr>";
		      }
		        "<br>"   
	        ?>
		
	  </table>
	  <br><br>
      <form method="POST" action="ticket.php"> 
	        <div align="center" >
		       <input type="submit" name="ticket" size="20" value="Aceptar Compra"> 
		    </div>      
      </form>
	  <br/>
	  <a href="salir.php">Salir</a>                                                                                                                       
</div>
<?include('cierra_conexion.php');?>
</body>  
</html> 