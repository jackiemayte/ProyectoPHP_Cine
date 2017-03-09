<?session_start();?>
<?include('conexionBD.php');?>
<html>
<head>
<!-- @Maite_Echeverry-->
<title>seleccion cartelera</title>
<LINK REL="stylesheet" TYPE="text/css" HREF="stilo/sesiones.css">
<script type='text/javascript'>
    function cambiarFondo(celda){
        if (celda.style.backgroundColor == "LawnGreen"){
            celda.style.backgroundColor = "transparent"
        }else{
            celda.style.backgroundColor = "LawnGreen"
        }
    }
</script>
</head>
<body>
    <H2>Seleccione una pelicula</H2>
	     <div align="center">
			<table bgcolor="#F6F6F6" bordercolor="#FFFFFF">
				<tr>
					<td align='center'><h1>Titulo</h1></td>
					<td align='center'><h1>Director&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1></td>
					<td align='center'><h1>Duracion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1></td>
					<td align='center'><h1>Sala&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1></td>
                    <td align='center'><h1>Fecha&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1></td>
                    <td align='center'><h1>Hora&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1></td>
					<td align='center'><h1>Seleccion</h1></td>
				</tr>
				<?
                $hora = time();
                $sql1="SELECT DISTINCT $tabla_peliculas.titulo,$tabla_peliculas.director,$tabla_peliculas.duracion,
                $tabla_peliculas.id_pelicula,$tabla_sesiones.id_sala,$tabla_sesiones.fecha FROM
                $tabla_peliculas INNER JOIN $tabla_sesiones USING(id_pelicula)
                WHERE $tabla_sesiones.fecha>=CURRENT_DATE
                AND $tabla_sesiones.hora>='$hora'";
                $result1 = mysql_query($sql1);
                ?>
                <form action="aplicacion.php" method="POST">
                <? 
				    while( $fila1 = mysql_fetch_array($result1)){
                           $titulo=$fila1['titulo'];
                           $id_peli=$fila1['id_pelicula'];
                           $sala=$fila1['id_sala'];
                           $fecha=$fila1['fecha'];
                           
                           $sql="SELECT nom_sala FROM $tabla_salas WHERE id_sala=$sala";
                           $result = mysql_query($sql);
                           while($fila=mysql_fetch_array($result)){
                               $nom_s=$fila[0];
                           }
                           
						   echo "<tr>";
					       echo "<td align='center'><h1>".$titulo."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</h1></td>";
	                       echo "<td align='center'>".$fila1['director']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</td>";
	                       echo "<td align='center'>".$fila1['duracion']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</td>";
	                       echo "<td align='center'>".strtoupper($nom_s)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</td>";
                           
                           $sql2 = "SELECT DISTINCT $tabla_sesiones.fecha FROM $tabla_sesiones WHERE $tabla_sesiones.id_pelicula=$id_peli
                           AND $tabla_sesiones.id_sala=$sala";
                           $result2 = mysql_query($sql2); 
                           while( $fila2 = mysql_fetch_array($result2)){
                              echo "<td align='center'>".$fila2['fecha']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</td>"; 
                           }
                           ?>
                           </td>
                           <?
                           $sql = "SELECT DISTINCT $tabla_sesiones.hora FROM $tabla_sesiones WHERE $tabla_sesiones.id_pelicula=$id_peli
                           AND $tabla_sesiones.id_sala=$sala";
                           $result = mysql_query($sql);
                           ?>
                           <td align='center'>
                               <select multiple name="hora">
                                   <?
                                      while( $fila = mysql_fetch_array($result)){?>
                                          <option value="<?php echo $fecha;?>)<?php echo $fila['hora'];?>"><? echo $fila['hora'];?></option><?
                                      }
                                   ?>  
                               </select>
                           </td>
                           <?
	                       echo "<td align='center' onclick='cambiarFondo(this);'><input type='radio' name='sala'  value='".$sala."'></td>";
                           echo "<tr>";
				    }
                           ?>
			</table>
			        <div align="center" > 
				       <br><br>Numero de entradas:
                        <input type="text" name="entrada" size="20">
				        <input type="submit" name="btnElegir" size="20" value="Elegir Asientos">
				    </div>      
                </form>                                                                                                                       
		</div>
<?include('cierra_conexion.php');?>
</body>
</html>

