<?session_start();?>
<!-- @Maite_Echeverry-->
<?
include('conexionBD.php');
  
$usuario=$_SESSION['usuario'];
$sala=$_SESSION['sala'];
$fecha=$_SESSION['fecha'];
$hora=$_SESSION['hora'];
$pelicula=$_SESSION['id_pelicula'];
$arrayF = array();
    if(isset($_SESSION['fila']) and ($_SESSION['columna'])){
        //unset($_SESSION['fila']);
        //unset($_SESSION['columna']);
        while (list ($key, $val) = each ($_SESSION['fila'])) { 
        $arrayF[] = $val;
        }
        $arrayC = array();
        while (list ($key, $val) = each ($_SESSION['columna'])) {  
        $arrayC[] = $val;
        }
        $j=0;
        for($i=0; $i<$numEn; $i++){	
            $sql = "DELETE from $tabla_ventas WHERE id_sala=$sala
            AND id_pelicula=$pelicula
            AND col=$arrayC[$j]
            AND fila=$arrayF[$j]
            AND fecha='$fecha'
            AND hora='$hora'";
            mysql_query($sql) or die(mysql_error());
            $j=$j+1;
        }
    }
include('cierra_conexion.php'); 
?>
<?session_destroy();?>
<html>
<head>
<title>Contenido no seguro</title>
</head>
<body>
Ahora estas fuera de la aplicacion segura.
<br>
<br>
<a href="login.php">Autenticar usuario</a>
</body>
</html>