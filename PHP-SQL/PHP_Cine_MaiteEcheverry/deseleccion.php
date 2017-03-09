<?session_start();?>
<!-- @Maite_Echeverry-->
<?  
$usuario=$_SESSION['usuario'];
$sala=$_SESSION['sala'];
$fecha=$_SESSION['fecha'];
$hora=$_SESSION['hora'];
$pelicula=$_SESSION['id_pelicula'];

    if((isset($_SESSION['fila'])) && (isset($_SESSION['columna']))){
        unset($_SESSION['fila']);
        unset($_SESSION['columna']);
    }
 
	include('cierra_conexion.php');
    print "<meta http-equiv=refresh content=\"2; url=peticionPelicula.php\">"; 
?>