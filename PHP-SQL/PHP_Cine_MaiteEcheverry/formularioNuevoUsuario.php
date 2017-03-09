<html> 
<head> 
<!-- @Maite_Echeverry-->
<title>Guardar datos en una base de datos</title> 
<LINK REL="stylesheet" TYPE="text/css" HREF="stilo/estilo.css">
</head> 
  <body> 
        <h3>Rellene los datos para obtener clave y contrasena</h3>
        <div align="center">
			<form method="POST" action="registra.php"> 
			    <p>Nombre: <input type="text" name="nombre" size="20"></p> 
			    <p>Apellido: <input type="text" name="apellido" size="20"></p> 
			    <p>Dni: <input type="text" name="dni" size="20"></p> 
			    <p>Tarjeta credito/debito: <input type="text" name="tarjeta" size="20"></p>
			    <p>Contrasena: <input type="password" name="clave" size="20"></p>
                <p>Repite la Contrasena: <input type="password" name="clave2" size="20"></p>
			    <p><input type="submit" value="Guardar datos" name="B1"></p> <br>
			    <p><a href='javascript:history.go(-1)'>VOLVER</a></p>   
			</form> 
        </div>
  </body> 
</html> 
