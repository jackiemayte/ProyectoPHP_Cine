<?php 
 //<!-- @Maite_Echeverry-->
//PARAMETROS A CONFIGURAR PARA LA CONEXION BD

$hotsdb = "localhost";    //SERA LA DIRECCION DE ENTRADA BD 
$basededatos = "CINE";    //SERA EL NOMBRE DE NUESTRA BD 

$usuariodb = "root";    //USER DE BD 
$clavedb = "root";    //CONTRASE�A BD 

//TABLAS DE  BD
$tabla_usuarios = "cliente";
$tabla_administradores = "administrador";     
$tabla_peliculas = "pelicula";    
$tabla_precios = "precio";      
$tabla_ventas = "entrada";        
$tabla_salas = "sala";    
$tabla_sesiones = "sesion";
$tabla_butacas="butaca"; 
  
//FIN DE LOS PARAMETROS A CONFIGURAR PARA LA CONEXION BD
$conexion_db = mysql_connect("$hotsdb","$usuariodb","$clavedb") 
    or die ("Conexi�n denegada, el Servidor de Base de datos que solicitas NO EXISTE"); 
    $db = mysql_select_db("$basededatos", $conexion_db) 
    or die ("La Base de Datos <b>$basededatos</b> NO EXISTE"); 
?> 





