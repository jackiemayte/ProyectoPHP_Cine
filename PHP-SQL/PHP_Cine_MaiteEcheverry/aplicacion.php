<?session_start();?>
<!-- @Maite_Echeverry-->
<?include ('bloqueDeSeguridad.php');?>
<html>
<head>
<title>Aplicación segura</title>
<LINK REL="stylesheet" TYPE="text/css" HREF="stilo/estilo.css">
<script type='text/javascript'>
	function cambiarFondo(celda){              
	    if (celda.style.backgroundColor == "LawnGreen"){
	        celda.style.backgroundColor = "transparent"
	    }else{
	        celda.style.backgroundColor = "LawnGreen"
	    }	
	}
</script>
</head>
<body>

<?php

$_SESSION['cantEn']=$_POST['entrada'];
$_SESSION['sala']=$_POST['sala'];
$_SESSION['fecha']=$_POST['fecha'];
list($fecha, $hora) =split(")", $_POST['hora'], 2);
$_SESSION['hora']=$hora;
$_SESSION['fecha']=$fecha;
$sala=$_SESSION['sala']; 
	
include('conexionBD.php');
    $sql = "SELECT $tabla_salas.nom_sala FROM $tabla_salas WHERE $tabla_salas.id_sala=$sala";
    $resultado= mysql_query($sql);
    if($fila= mysql_fetch_array($resultado)){ 
        $nom_sala=strtoupper($fila[0]);
    }
    echo  "<h1 align='center'>".$nom_sala."</h1>";
    
    $sql = "SELECT $tabla_sesiones.id_pelicula FROM $tabla_sesiones WHERE $tabla_sesiones.fecha='$fecha'
    AND $tabla_sesiones.hora='$hora' AND $tabla_sesiones.id_sala=$sala";
    $resultado= mysql_query($sql);
    if($fila= mysql_fetch_array($resultado)){ 
        $pelicula=$fila[0];
    }
    $_SESSION['id_pelicula']=$pelicula;
    
    $sql = "SELECT $tabla_sesiones.id_precio,$tabla_precios.tipo_precio,$tabla_precios.precio
    FROM $tabla_precios INNER JOIN $tabla_sesiones USING(id_precio)
    WHERE $tabla_sesiones.id_pelicula=$pelicula and
    $tabla_sesiones.id_sala=$sala and
    $tabla_sesiones.fecha='$fecha' and
    $tabla_sesiones.hora='$hora'";
    $resultado = mysql_query($sql);									
    while( $fila = mysql_fetch_array($resultado)){
        $precio_id=$fila[0];
        $precio_tipo=$fila[1];
        $precio_valor=$fila[2];
    }
    $_SESSION['precio_valor']=$precio_valor;
    $_SESSION['precio_tipo']=$precio_tipo;
    $_SESSION['precio_id']=$precio_id;
    
    $sql = "SELECT $tabla_butacas.fila FROM $tabla_butacas INNER JOIN $tabla_sesiones USING(id_sala)
    WHERE $tabla_sesiones.id_pelicula=$pelicula and
    $tabla_sesiones.id_sala=$sala and
    $tabla_sesiones.fecha='$fecha' and
    $tabla_sesiones.hora='$hora'";
    $resultado= mysql_query($sql);
    while( $fila = mysql_fetch_array($resultado)){ 
        $finFil=$fila[0];
    } 
    $sql = "SELECT $tabla_butacas.col FROM $tabla_butacas INNER JOIN $tabla_sesiones USING(id_sala)
    WHERE $tabla_sesiones.id_pelicula=$pelicula and
    $tabla_sesiones.id_sala=$sala and
    $tabla_sesiones.fecha='$fecha' and
    $tabla_sesiones.hora='$hora'";
    $resultado= mysql_query($sql);  
    while( $columna = mysql_fetch_array($resultado)){ 
        $finCol=$columna[0];
    } 
    ?> 
    <p><a href='deseleccion.php'>Volver</a></p>
    <table border="0" align="left">  
    <?      //FILAS
            for($i = 0; $i <=$finFil; $i++){
                if ($i == 0)
                echo '<tr><td><a></a></td>';
                else 
                echo '<tr><td><a>'.$i.'</a></td>';
                //OBTENGO TAMAÑO DE COLUMNAS
                $sql = "SELECT $tabla_butacas.col FROM $tabla_butacas WHERE
                $tabla_butacas.id_sala=$sala AND $tabla_butacas.fila=$i";
                
                $resultado= mysql_query($sql);  
                while( $columna = mysql_fetch_array($resultado)){ 
                    $finCol=$columna[0];
                }                     
                for($x = 1; $x <=$finCol; $x++){
                    if ($i == 0)
                        echo '<td>'.$x.'</td>';
                    else {
                        $sql = "SELECT $tabla_butacas.fila,$tabla_butacas.col FROM $tabla_butacas
                        INNER JOIN $tabla_sesiones WHERE
                        $tabla_sesiones.id_sala=$sala
                        AND $tabla_sesiones.id_pelicula=$pelicula
                        AND $tabla_butacas.fila=$i
                        AND $tabla_butacas.col=$x
                        AND $tabla_sesiones.fecha='$fecha'
                        AND $tabla_sesiones.hora='$hora'";

                        $resultado= mysql_query($sql);
                        while( $columna = mysql_fetch_array($resultado)){ 
                            $fila=$columna[0];
                            $col=$columna[1];
                        }
                        $sql="SELECT count(*) FROM $tabla_ventas WHERE id_pelicula=$pelicula
                        and id_sala=$sala
                        and fecha='$fecha'
                        and hora='$hora'
                        and fila=$i
                        and col=$x";
                        $result = mysql_query($sql);
                        while($fila=mysql_fetch_array($result)){
                            $existe=$fila[0];
                        }
                        
                        if($existe!=0){
                            echo '<td id="celda" align="center"><img src="Image/ocupada.gif"/></a></td>';
                        }else{
                            echo '<td id="celda" align="center" onclick="cambiarFondo(this);"><a href="estadoButaca.php?fila='.$i.'&columna='.$x.'"><img src="Image/vacia.gif"/></a></td>';		
                        }
                        
                    }
                }
                echo "</tr>";
            }
    ?></table><?
     
include('cierra_conexion.php');                      
?>                   
</table>
<br>
<div id="reserva" >
	<form  action="compra.php" method="POST">
	     <p><input type="submit" value="Reservar" name="B1"></p>
	</form>	
	<a href="salir.php">Salir</a>
</div>
</body>
</html>