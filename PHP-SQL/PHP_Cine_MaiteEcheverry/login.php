<html>
<head>
<!-- @Maite_Echeverry-->
<title>Autenticacion PHP</title>
<LINK REL="stylesheet" TYPE="text/css" HREF="stilo/estiloHome.css">
</head>
<body>
<div align="center">
<h1>Formulario de autenticacion</h1>
	<h3>Introduce tu nombre de usuario y contrasena</h3>
		<form action="autenticacion.php" method="POST">
			<tr><td>Selecione tipo de Usuario:</td><td>
			<select name="tipoUsuario">
				<option value="usuario">Usuario</option>
				<option value="administrador">Administrador</option>
			</select></td></tr>
			<table border="0">
				<tr><td>Usuario ( DNI/NIE):</td><td><input name="usuario" size="25" value=""/></td></tr>
				<tr><td>Contrasena :</td><td><input name="contrasena" size="25" type="password"/></td></tr>
				<tr><td/><td><input type="submit" name="tipo" value="Inicio de sesion"/><input type="reset"></td></tr>
			</table>
		</form>
		<form action="formularioNuevoUsuario.php" method="POST">
			<b><H5>Para ingresar, en caso de no tener un login y contrasena debes registrarte---></H5>
		    <div align="center"><td/><td><input type="submit"  value="Registrate"/></td></tr></div>
	    </form>
</div>		
</body>
</html>