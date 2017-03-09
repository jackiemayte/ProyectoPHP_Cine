<html>  
<head>
<!-- @Maite_Echeverry-->  
<title >NUEVO USUARIO CINE</title>
</head>  
<body>  
<div align='center'>  
  <table border='1' cellpadding='0' cellspacing='0' width='600' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>  
    <tr>  
      <td width='150' style='font-weight: bold'>USUARIO</td>  
      <td width='150' style='font-weight: bold'>CONTRASENA</td>    
    </tr> 
<?php
    include('conexionBD.php');  
    $nombre = $_POST["nombre"]; 
    $apellido = $_POST["apellido"]; 
    $dni = trim($_POST["dni"]);  
    $tarjeta = trim($_POST["tarjeta"]);
    $clave = $_POST["clave"]; 
    $clave2 = $_POST["clave2"];
    
	  if (!validar_datos($nombre, $apellido, $dni, $tarjeta, $clave, $clave2)){
		    echo "<p><a href='javascript:history.go(-1)'>VOLVER</a></p>";
	  }else{
        $sql = "SELECT dni FROM $tabla_usuarios where dni='$dni' or numTarjeta=$tarjeta";//HACEMOS CONSULTA POR DNI
        $result = mysql_query($sql);  
        $registro = mysql_fetch_array($result);
      
        if(!($registro['dni'])){
            $result=mysql_db_query("$basededatos","INSERT INTO $tabla_usuarios (nombre,apellido,dni,numTarjeta,clave) VALUES ('$nombre','$apellido','$dni','$tarjeta','$clave')");   
            if($result){
                echo "<p><h2>Los datos han sido guardados, se ha generado un nuevo usuario, Bienvenido!!!</h2></p>";
                echo "<p><a href='javascript:history.go(-2)'>INICIO</a></p>";
                $query = "SELECT dni,clave FROM $tabla_usuarios where dni='$dni' and clave='$clave'";
                $result = mysql_query($query);  
                $registro = mysql_fetch_array($result); 
                //MUESTRO EL LOGIN Y CONTRASEÑA CON EL QUE PODRA ACCEDER A NUESTRA PÁGINA
                echo "  
                <tr>  
                  <td width='150'>".$registro['dni']."</td>  
                  <td width='150'>".$registro['clave']."</td>     
                </tr> ";	
            }else{
              echo " <p><h2>Problemas con al guardar usuario</h2></p>";
              echo "<p><a href='javascript:history.go(-1)'>VOLVER</a></p>";
            }
        }else{
           echo " <p><h2>Dni ya existe</h2></p>";
           echo "<p><a href='javascript:history.go(-1)'>VOLVER</a></p>";
        }
    }      	
    
   function mensaje_error($mensaje){
        ?>
        <script language="JavaScript" type="text/JavaScript">
          var mensaje="<?php echo $mensaje; ?>";
          alert(mensaje);		
        </script>
        <?php	
    }
  
    function validar_datos($nombre, $apellido, $dni, $tarjeta, $clave, $clave2){
        //tarjeta
        if (($tarjeta=="")||(!preg_match("/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})$/", $tarjeta))){
            mensaje_error("Tarjeta invalida"); 
            return false;   
        }
    
        if ($nombre==""){
            mensaje_error("Falta nombre");
            return false;
        }else{
            $nombre=trim($nombre);
            $nombre=addslashes($nombre); 
        }
        
        if ($apellido==""){
            mensaje_error("Falta apellido");
            return false;
        }else{
            $apellido=trim($apellido);
            $apellido=addslashes($apellido); 
        } 
        //clave
        if ($clave==""){
            mensaje_error("Falta clave");
            return false;
        }else{
            if($clave!=$clave2){
                mensaje_error("Debe coincidir la clave y su repetición");
                return false;
            }		
        } 
        //dni
        if ($dni==""){
            mensaje_error("Falta dni");
            return false;
        }else{
            if (strlen($string) != 9 ||
              preg_match('/^[XYZ]?([0-9]{7,8})([A-Z])$/i', $string, $matches) !== 1) {
            }else{
              mensaje_error("Tamano incorrecto");
              return false;
            }
            $map = 'TRWAGMYFPDXBNJZSQVHLCKE';
            list(, $number, $letter) = $matches;
            $dni=strtoupper($letter) === $map[((int) $number) % 23]; 
        }     
return true;
}
mysql_close($conexion);
?>
   </table>  
</div>  
</body>  
</html> 