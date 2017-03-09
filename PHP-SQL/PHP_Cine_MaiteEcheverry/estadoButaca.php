<?session_start();?>
<!-- @Maite_Echeverry-->
<?include ('bloqueDeSeguridad.php');?>
<html>
<head>
<title>seleccion cartel</title>
<LINK REL="stylesheet" TYPE="text/css" HREF="stilo/estilo.css">
</head>
<body> 
	<?
	include('conexionBD.php');
	$sala= $_SESSION['sala'];
	$fila=$_GET['fila'];
	$columna=$_GET['columna'];

	echo "Seleccionada Fila  :".$fila."  Columna  :".$columna;
	if(!(isset($_SESSION['fila'])) && !(isset($_SESSION['columna']))){
        $_SESSION['fila']=array();
        $_SESSION['columna']=array();
	}
	array_push($_SESSION['fila'],$fila);
    array_push($_SESSION['columna'],$columna);
	?>
	<p><a href='javascript:history.go(-1)'>Volver</a></p>
</body>  
</html> 
