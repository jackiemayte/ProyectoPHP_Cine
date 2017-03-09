<?session_start();?>
<!-- @Maite_Echeverry-->
<?
//VEO SI EL USUARIO Y CONTRASEÑA SON VÁLIDOS

include('conexionBD.php');

if($_POST['tipo']){//ADMINISTRADOR
	if(($_POST['tipoUsuario'])=="administrador"){
			$sql= "SELECT * FROM $tabla_administradores";
			$result = mysql_query($sql);  
			while($registro = mysql_fetch_array($result)){
			    //COMPRUEBO QUE USUARIO Y CONTRASEÑA SEAN VÁLIDOS
				if(($_POST['usuario']==$registro['dni']) && ($_POST['contrasena']==$registro['clave'])){
				
				//DEFINO UNA SESION Y SE GUARDA EL DATO EN SESSION_START();
					$_SESSION['autenticado']= "SI";
					print "<meta http-equiv=refresh content=\"2; url=interaccionAdministrador.php\">"; 
					//header ("Location: interaccionAdministrador.php"); EN MI ORDENADOR NO PODÍA FUNCIONAR AUTENTICACION CON LA SENTENCIA HEADER
				}else {
				//EN CASO DE NO EXISTIR VUELVO A 'login.php'
					print "<meta http-equiv=refresh content=\"2; url=errorusuario.php\">"; 
					//header("Location:login.php?errorusuario=si"); EN MI ORDENADOR NO PODÍA FUNCIONAR AUTENTICACION CON LA SENTENCIA HEADER
					//$errorusuario="si";
					//header("Location: login.php?errorusuario=".urlencode($errorusuario)); 
					//exit; 
				}
			}
	}else{//USUARIO
			$user=$_POST['usuario'];
			$pwd=$_POST['contrasena']; 
			$sql= "SELECT dni,clave,id_cliente FROM $tabla_usuarios WHERE dni='$user'";
			$resultado = mysql_query($sql);									
			  while( $fila = mysql_fetch_array($resultado)){
		          $dni=$fila[0];
				  $clave=$fila[1];
				  $id=$fila[2];
		      }	 
			//echo $dni." - ".$user." - ";
			if(($_POST['usuario']==$dni) && ($_POST['contrasena']==$clave)){
				$_SESSION['usuario']=$id;
				$_SESSION['autenticado']= "SI";
				print "<meta http-equiv=refresh content=\"2; url=peticionPelicula.php\">";
				include('cierra_conexion.php'); 
			}else {
				print "<meta http-equiv=refresh content=\"2; url=errorusuario.php\">"; 
			}
	 }
}
?>

