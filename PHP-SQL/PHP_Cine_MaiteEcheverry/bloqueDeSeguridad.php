<?session_start();?> 
<!-- @Maite_Echeverry--> 
<?
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
//-- @Maite_Echeverry
if ($_SESSION['autenticado']!= "SI") {
	//SI NO EXISTE, VA A LA PÁGINA DE AUTENTICACION
    header("Location:login.php");
	//SALIMOS DE ESTE SCRIPT
	exit();
}
?>