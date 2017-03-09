<?session_start();?>
<!-- @Maite_Echeverry-->
<?include ('bloqueDeSeguridad.php');?>
<?include('conexionBD.php');?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<LINK REL="stylesheet" TYPE="text/css" HREF="stilo/admin.css">
</head>
<body>
    <div >
       <br/>	  	  
	   <a href="fuera_con_segura.php">Salir</a>
    </div>
    <br/>
	<div class="contenedorformulario" align="center">
				<fieldset>
					<legend><b><h2>--  PANEL DE CONTROL  --</h2></b></legend>
						<table>
							<tr>
								<td>
									<fieldset>
										<legend><b><h3>Generar Sala</h3></b></legend>
                                        <br/>
                                        <br/>
										<fieldset>
                                            <legend><b><h3>sala - fila - columna</h3></b></legend>
                                                <br/>
                                                <form method="post" action="configuracionAdmin.php">
                                                    Nombre Sala :<input type="text" name="nomSala"><br/><br/>
                                                    Numero de filas :<input type="number" name="cantFilas"><br/><br/>
                                                    Numero de columnas :<input type="number" name="cantColum"><br/><br/>
                                                    <input type="reset">
                                                    <input type="submit" name="sala" value="Crear">
                                                    <!--<input type="submit" name="modfButacas" value="Modificar">-->
                                                    <input type="submit" name="borrarbutacas" value="Eliminar [ nombre ]">
                                            </form>
                                            <br/>
										</fieldset>
                                        <br/>
									</fieldset>
                                    <br/>
                                    <br/>
								</td>
                              
								<td>
									<fieldset>
										 <form method="POST" action="configuracionAdmin.php">
										     <legend><b><h3>Crear sesion de cine</h3></b></legend>
                                                  <?$sql="SELECT id_precio,tipo_precio from $tabla_precios";
                                                    $result=mysql_query($sql);
                                                    if (mysql_num_rows($result)!=0){
                                                        ?>
                                                        <label for="precio">Precio :</label> 
                                                        <select  name="tipoPrecio"><?
                                                            while ($reg=mysql_fetch_array($result)){
                                                                $precio=$reg['tipo_precio'];
                                                                $id_precio=$reg['id_precio'];
                                                                echo "<option value='".$id_precio."' selected>".$precio."</option>";
                                                            }
                                                            ?>    
                                                        </select></p><? 
                                                        } ?> 
											      <label for="sala">Nombre sala :</label> 
											      <? $sql = "SELECT DISTINCT nom_sala FROM $tabla_salas";//HAGO CONSULTA PARA CARGAR LAS SALAS
		                                             $resultado = mysql_query($sql);
		                                          ?>
												  <select id="sala" name="sala"><!--CARGAMOS SALA EN EL DESPLEGABLE-->
                                                     echo "<option value=''>---&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---</option>";
												  <? while( $sala = mysql_fetch_array($resultado)){
													    echo "<option value='".$sala['nom_sala']."'>".$sala['nom_sala']."</option>";
													 }
												  ?>	 		
												  </select><br/><br/>
											      <label for="pelicula">Titulo pelicula :</label> 
											      <? $sql = "SELECT DISTINCT * FROM $tabla_peliculas";
		                                             $resultado = mysql_query($sql);
		                                          ?>
												  <select name="elegirpelicula"><!--CARGAMOS PELICULAS EN EL DESPLEGABLE-->
                                                     echo "<option  value=''>--------------&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---------------</option>";
												  <? while( $pelicula = mysql_fetch_array($resultado)){
													    echo "<option value='".$pelicula['id_pelicula']."'>".$pelicula['titulo']."</option>";
													 }
												  ?>
												  </select>
												  <br/><br/>  
											      <label for="fecha">Fecha:</label> 
                                                 <select name='dia'>
                                                        <option value='00'>00</option>
                                                        <option value='01'>01</option>
                                                        <option value='02'>02</option>
                                                        <option value='03'>03</option>
                                                        <option value='04'>04</option>
                                                        <option value='05'>05</option>
                                                        <option value='06'>06</option>
                                                        <option value='07'>07</option>
                                                        <option value='08'>08</option>
                                                        <option value='09'>09</option>
                                                        <option value='10'>10</option>
                                                        <option value='11'>11</option>
                                                        <option value='12'>12</option>
                                                        <option value='13'>13</option>
                                                        <option value='14'>14</option>
                                                        <option value='15'>15</option>
                                                        <option value='16'>16</option>
                                                        <option value='17'>17</option>
                                                        <option value='18'>18</option>
                                                        <option value='19'>19</option>
                                                        <option value='20'>20</option>
                                                        <option value='21'>21</option>
                                                        <option value='22'>22</option>
                                                        <option value='23'>23</option>
                                                        <option value='24'>24</option>
                                                        <option value='25'>25</option>
                                                        <option value='26'>26</option>
                                                        <option value='27'>27</option>
                                                        <option value='28'>28</option>
                                                        <option value='29'>29</option>
                                                        <option value='30'>30</option>
                                                        <option value='31'>31</option>
                                                  </select> 
                                                  <select name='mes'>
                                                        <option value='00'>00</option>
                                                        <option value='01'>Enero</option>
                                                        <option value='02'>Febrero</option>
                                                        <option value='03'>Marzo</option>
                                                        <option value='04'>Abril</option>
                                                        <option value='05'>Mayo</option>
                                                        <option value='06'>Junio</option>
                                                        <option value='07'>Julio</option>
                                                        <option value='08'>Agosto</option>
                                                        <option value='09'>Septiembre</option>
                                                        <option value='10'>Obtubre</option>
                                                        <option value='11'>Noviembre</option>
                                                        <option value='12'>Dicembre</option>
                                                  </select>
                                                  <select name='ano'>
                                                        <option value='0000'>0000</option>
                                                        <option value='2016'>2016</option>
                                                        <option value='2017'>2017</option>
                                                        <option value='2018'>2018</option>
                                                  </select> 
                                                  <br/><br/>
											      <label for="hora">Hora :</label>
                                                  <select name='hora'>
                                                       <option value='00:00' selected>00:00</option>
                                                        <option value='16:00'>16:00</option>
                                                        <option value='17:00'>17:00</option>
                                                        <option value='18:00'>18:00</option>
                                                        <option value='19:00'>19:00</option>
                                                        <option value='20:00'>20:00</option>
                                                        <option value='21:00'>21:00</option>
                                                        <option value='22:00'>22:00</option>
                                                        <option value='23:00'>23:00</option>
                                                        <option value='01:00'>01:00</option>
                                                        <option value='02:00'>02:00</option>
                                                  </select>
                                                  <br/><br/>
                                                  <input type="reset">
											      <input type="submit" name="sesion" value="Crear">
                                                  <input type="submit" name="modfSesion" value="Modificar">
											      <input type="submit" name="borrarsesion" value="Eliminar [sala-fecha-hora]">
										</form>
								 </fieldset>
                                 <br/>
                                 <br/>
								</td>
                                </tr>
                                <tr>
								<td>
									<fieldset>
										<form method="POST" action="configuracionAdmin.php">
											<legend><b><h3>Crear peliculas</h3></b></legend>
												  <label for="nom">Titulo :</label><input type="text" name="titulo" size="45" ><br/><br/>
												  <label for="ape">Director :</label><input type="text" name="director" size="45"><br/><br/>
												  <label for="empr">Duracion :</label>
													  <input type="number" name="duracion" size="23" ><br/><br/>
                                                      <input type="reset">
													  <input type="submit" name="pelicula" value="Crear">
                                                      <input type="submit" name="modfPelicula" value="Modificar">
													  <input type="submit" name="borrarpelicula" value="Eliminar [titulo]">
										</form>
                                        <br/>
									</fieldset>	
                                    <br/>
                                    <br/>
								</td>
                                
								<td>
									<fieldset>
										<form method="POST" action="configuracionAdmin.php">
											<legend><b><h3>Crear precios</h3></b></legend>
												<label for="precios">Tipo de precio :</label> 
                                                <input type="text" size="23" name="tipoPrecio"><br/><br/>      
												<label for="valor">Valor: [ 00,0 ] </label>
													<input type="number" size="23" name="valor"><br/><br/>
                                                    <input type="reset">
													<input type="submit" name="precio" value="Crear">
                                                    <input type="submit" name="modfPrecio" value="Modificar">
													<input type="submit" name="borrarprecio" value="Eliminar [ tipo ]">
										</form>
                                        <br/>
								    </fieldset>
                                    <br/>
                                    <br/>
								</td>
							
                            <br/>
                            <br/>
                            
							    <td>
									<fieldset>
                                        <br/>
										<form method="POST" action="configuracionAdmin.php">
											<legend><b><h3>Crear nuevo Administrador</h3></b></legend>
												  <label for="ape">Dni :</label>
													  <input type="text" name="dni" size="42"><br/><br/>
												  <label for="empr">Clave :</label>
													  <input type="text" name="clave" size="48" ><br/><br/>
                                                      <input type="reset">
													  <input type="submit" name="admin" value="Crear">
                                                      <input type="submit" name="modfAdmin" value="Modificar">
													  <input type="submit" name="borraAdmin" value="Eliminar [dni]">
										</form>
                                        <br/>
									</fieldset>	
								</td>
							</tr>
						
                            <br/>
                            <br/>
                         </table>
                         <br/>
                        <br/>
                        <fieldset>
                        <br/>
                        <br/>
                        <legend><b><h3>HISTORICO VENTAS</h3></b></legend>  
                        <table border="1" cellpadding='0' cellspacing='0' width="800" bgcolor="#F6F6F6">
                                <tr>
                                    <th align='center'><h3>Sala</h3></th>
                                    <th align='center'><h3>Pelicula</h3></th>
                                    <th align='center'><h3>Cliente</h3></th>
                                    <th align='center'><h3>Dni</h3></th>
                                    <th align='center'><h3>Nº Entradas</h3></th>
                                    <th align='center'><h3>Total</h3></th>
                                </tr>
                                <?
                                $sql = "SELECT DISTINCT id_cliente,id_pelicula,id_sala,fecha,hora,n_entradas,total FROM $tabla_ventas ORDER BY NOW()";
                                $resul = mysql_query($sql);       
                                while( $fila = mysql_fetch_array($resul) ){
                                    $usuario=$fila['id_cliente'];
                                    $entradas=$fila['n_entradas'];
                                    $sala=$fila['id_sala']; 
                                    $pelicula=$fila['id_pelicula'];
                                    $fecha=$fila['fecha'];
                                    $hora=$fila['hora'];
                                    $total=$fila['total'];    
                                
                                    echo "<tr>";
                                        $sql = "SELECT DISTINCT  titulo,nom_sala FROM $tabla_peliculas INNER JOIN $tabla_sesiones USING(id_pelicula)
                                        INNER JOIN $tabla_salas USING(id_sala) WHERE id_sala=$sala and id_pelicula=$pelicula";
                                        $resultado = mysql_query($sql);
                                        while( $fila = mysql_fetch_array($resultado)){
                                            $peli=$fila[0];
                                            $nom_sala=strtoupper($fila[1]);
                                        }
                                        echo "<td align='center'>$nom_sala</td>";
                                        echo "<td align='center'>$peli</td>";
                                        
                                        $sql = "SELECT DISTINCT nombre,apellido,dni FROM $tabla_usuarios INNER JOIN $tabla_ventas USING(id_cliente) WHERE id_cliente=$usuario";
                                        $resultado = mysql_query($sql);
                                        while( $fila = mysql_fetch_array($resultado)){
                                            $user=$fila[0]; 
                                            $ape=$fila[1];  
                                            $dni=$fila[2];         
                                        }
                                        echo "<td align='center'>$user&nbsp;&nbsp;$ape</td>";
                                        echo "<td align='center'>$dni</td>";  
                                        echo "<td align='center'>$entradas</td>"; 
                                        $sql = "SELECT DISTINCT precio FROM $tabla_precios INNER JOIN $tabla_sesiones USING(id_precio) WHERE id_precio=$precio";
                                        $resultado = mysql_query($sql);
                                        while( $fila = mysql_fetch_array($resultado)){
                                            $valor=$fila[0];           
                                        }
                                        //$total=($entradas*$valor);
                                        echo "<td align='center'>$total €</td>";  
                                    echo "<tr/>";
                                }
                                ?>
                        </table>
                        <br/>
                        <br/>  
                     </fieldset>
              <br/>          
        </fieldset>	
	  </div>
<?include('cierra_conexion.php');?>	    	
</body>
</html>