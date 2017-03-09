<?session_start();?>
<!-- @Maite_Echeverry-->
<?include ('bloqueDeSeguridad.php');?>
<?php
include('conexionBD.php');
	    //METER SALAS
		if($_POST['sala']){
		     if (isset($_POST['nomSala']) && ($_POST['cantFilas']) && ($_POST['cantColum'])) {
				$sala=$_POST['nomSala'];
				$filas=$_POST['cantFilas'];
                $cols=$_POST['cantColum'];
				
                $sql="SELECT count(*) FROM $tabla_salas WHERE nom_sala='$sala'";
                $result = mysql_query($sql);
                while($fila=mysql_fetch_array($result)){
		            $existe=$fila[0];
		        }
                if($existe==1){	
                    echo "<h3>Ya existe esa sala!</h3>";
                    ?><p><a href='javascript:history.back()'>Volver</a></p><?  
                }else{
                    $sql1="INSERT INTO $tabla_salas(id_sala,nom_sala) VALUES('','$sala')";
                    mysql_query($sql1);
                    $sql="SELECT id_sala FROM $tabla_salas WHERE nom_sala='$sala'";
                    $result = mysql_query($sql);
                    while($fila=mysql_fetch_array($result)){
                        $id_sala=$fila[0];
                    }
                     
                    for ($i=1; $i<=$filas;$i++){
                        for ($j=1; $j<=$cols;$j++){
                            $sql="INSERT INTO $tabla_butacas(id_sala,fila,col) VALUES($id_sala,$i,$j)";
                            $result = mysql_query($sql);
                            if(!$result){
                                echo "<h3>No se ha podido guardar</h3>";
                                ?><p><a href='javascript:history.back()'>Volver</a></p><?       
                            }
                        }
                    }
                    echo "<h3>La siguiente sala ha sido creada!</h3>";
                    $sql = "SELECT $tabla_butacas.fila FROM $tabla_butacas WHERE $tabla_butacas.id_sala=id_sala";
                    $resultado= mysql_query($sql);
                    while( $fila = mysql_fetch_array($resultado)){ 
                        $finFil=$fila[0];
                    } 
                    $sql = "SELECT $tabla_butacas.col FROM $tabla_butacas WHERE $tabla_butacas.id_sala=id_sala";
                    $resultado= mysql_query($sql);  
                    while( $columna = mysql_fetch_array($resultado)){ 
                        $finCol=$columna[0];
                    }	
                    ?> 
                    <p><a href='javascript:history.back()'>Volver</a></p>
                    <table border="0" align="left">  
                <?      //FILAS
                        for($i = 0; $i <=$finFil; $i++){
                            if ($i == 0)
                            echo '<tr><td><a></a></td>';
                            else 
                            echo '<tr><td><a>'.$i.'</a></td>';
                            //OBTENGO TAMAÑO DE COLUMNAS
                            $sql = "SELECT col FROM $tabla_butacas WHERE id_sala=$id_sala AND fila=$i";
                            $resultado= mysql_query($sql);  
                            while( $columna = mysql_fetch_array($resultado)){ 
                                $finCol=$columna[0];
                            }                     
                            for($x = 1; $x <=$finCol; $x++){
                                    if ($i == 0)
                                            echo '<td>'.$x.'</td>';
                                    else { 
                                        echo '<td id="celda" align="center" onclick="cambiarFondo(this);"><a href="estadoButaca.php?fila='.$i.'&columna='.$x.'"><img src="Image/ini.gif"/></a></td>';		
                                    }
                                }
                            echo "</tr>";
                        }
                    ?></table><?    
                }
             } 
        }
        
        //ELIMINAR SALA
		if($_POST['borrarbutacas']){
            $sala=$_POST['nomSala'];
            
            $sql="SELECT count(*) FROM $tabla_salas WHERE $tabla_salas.nom_sala='$sala'";
            $result = mysql_query($sql);
            while($fila=mysql_fetch_array($result)){
                $existe=$fila[0];
            }
                
            if($existe!=0){
                $sql="SELECT $tabla_salas.id_sala FROM $tabla_salas WHERE $tabla_salas.nom_sala='$sala'";
                $result = mysql_query($sql);
                while($fila=mysql_fetch_array($result)){
                    $id_sala=$fila[0];
                }
                $sql="DELETE FROM $tabla_butacas WHERE $tabla_butacas.id_sala=$id_sala";
                mysql_query($sql);
                $sql="DELETE FROM $tabla_salas WHERE $tabla_salas.nom_sala='$sala'";
                mysql_query($sql);
                $result=mysql_query($sql);
                if( $result){
                    echo "<h3>Los datos han sido borrados</h3>";
                    ?><p><a href='javascript:history.back()'>Volver</a></p><?
                }else{
                        echo "<h3>No se ha podido borrar!</h3>";
                        ?><p><a href='javascript:history.back()'>Volver</a></p><?
                }	
            }else{
                echo "<h3>Sala no existe!</h3>";
                ?><p><a href='javascript:history.back()'>Volver</a></p><?	
            }	 			  
	    }
    
	    //METER PRECIOS     
		if($_POST['precio']){
			 if(isset($_POST['tipoPrecio']) && ($_POST['valor'])){
				$tipoPrecio=$_POST['tipoPrecio'];
				$valor=$_POST['valor'];
				$sql="INSERT INTO $tabla_precios(id_precio,tipo_precio,valor) VALUES('','$tipoPrecio',$valor)";
                $result = mysql_query($sql);
                if( $result){
                    echo "<h3>Los datos han sido guardados</h3>";
                    ?><p><a href='javascript:history.back()'>Volver</a></p><?
                }else{
                    echo "<h3>No se ha podido guardar</h3>";
                    ?><p><a href='javascript:history.back()'>Volver</a></p><?
                }
			 }
	    }
        //ELIMINAR PRECIOS ( BORRA POR TIPO DE PRECIO )
		if($_POST['borrarprecio']){
			 if(isset($_POST['tipoPrecio']) || ($_POST['valor'])){
				$tipoPrecio=$_POST['tipoPrecio'];
                
                $sql="SELECT count(*) FROM $tabla_precios WHERE tipo_precio='$tipoPrecio'";
                $result = mysql_query($sql);
                while($fila=mysql_fetch_array($result)){
                    $existe=$fila[0];
                }
                
                if($existe!=0){
                    $sql="DELETE FROM $tabla_precios WHERE tipo_precio='$tipoPrecio'";
                    $result=mysql_query($sql);
                    if( $result){
                        echo "<h3>Los datos han sido borrados</h3>";
                        ?><p><a href='javascript:history.back()'>Volver</a></p><?
                    }else{
                        echo "<h3>No se ha podido borrar!</h3>";
                        ?><p><a href='javascript:history.back()'>Volver</a></p><?
                    }
                }else{
                    echo "<h3>Precio no existe!</h3>";
                    ?><p><a href='javascript:history.back()'>Volver</a></p><?	
                } 
             }   
	    }
        //MODIFICAR PRECIO
        if($_POST['modfPrecio']){
			 if(isset($_POST['tipoPrecio']) && ($_POST['valor'])){
				$tipoPrecio=$_POST['tipoPrecio'];
				$valor=$_POST['valor'];
                
				$sql="UPDATE $tabla_precios SET valor=$valor WHERE tipo_precio='$tipoPrecio'";
                $result = mysql_query($sql);
                if( $result){
                    echo "<h3>Los datos han sido modificados</h3>";
                    ?><p><a href='javascript:history.back()'>Volver</a></p><?
                }else{
                    echo "<h3>No se ha podido modificar</h3>";
                    ?><p><a href='javascript:history.back()'>Volver</a></p><?
                }
			 }
	    }
        
	    //METER PELICULAS
	    if($_POST['pelicula']){		
		     if(isset($_POST['titulo']) && ($_POST['director']) && ($_POST['duracion'])) { 
		        $titulo=$_POST['titulo'];
		        $director=$_POST['director'];
		        $duracion=$_POST['duracion'];
			    $sql="INSERT INTO $tabla_peliculas(id_pelicula,titulo,director,duracion) VALUES('','$titulo','$director',$duracion)";
			    $result = mysql_query($sql);
				if( $result){
					echo "<h3>Los datos han sido guardados</h3>";
			 		?><p><a href='javascript:history.back()'>Volver</a></p><?
				}else{
					echo "<h3>No se ha podido guardar la pelicula</h3>";
					?><p><a href='javascript:history.back()'>Volver</a></p><?
				}
	         }   
	    }
         //ELIMINAR PELICULAS HE DECIDIDO QUE BORRE LAS PELICULAS POR TÍTULO
	    if($_POST['borrarpelicula']){		
		     if(isset($_POST['titulo'])) { 
		        $titulo=$_POST['titulo'];
                
                $sql="SELECT count(*) FROM $tabla_peliculas WHERE titulo='$titulo'";
                $result = mysql_query($sql);
                while($fila=mysql_fetch_array($result)){
                    $existe=$fila[0];
                }
                
                if($existe!=0){
                    $sql="DELETE FROM $tabla_peliculas WHERE titulo='$titulo'";
                    $result=mysql_query($sql);
                    if( $result){
                        echo "<h3>Los datos han sido borrados</h3>";
                        ?><p><a href='javascript:history.back()'>Volver</a></p><?
                    }else{
                        echo "<h3>No se ha podido borrar!</h3>";
                        ?><p><a href='javascript:history.back()'>Volver</a></p><?
                    }
                }else{
                    echo "<h3>Pelicula no existe!</h3>";
                    ?><p><a href='javascript:history.back()'>Volver</a></p><?	
                } 
	         }
	    }
        //MODIFICAR PELICULA
        if($_POST['modfPelicula']){		
		     if(isset($_POST['titulo']) && ($_POST['director']) && ($_POST['duracion'])) { 
		        $titulo=$_POST['titulo'];
		        $director=$_POST['director'];
		        $duracion=$_POST['duracion'];
                
                $sql="UPDATE $tabla_peliculas SET director='$director', duracion=$duracion WHERE titulo='$titulo'";
			    $result = mysql_query($sql);
				if( $result){
					echo "<h3>Los datos han sido modificados</h3>";
			 		?><p><a href='javascript:history.back()'>Volver</a></p><?
				}else{
					echo "<h3>No se ha podido modificar la pelicula</h3>";
					?><p><a href='javascript:history.back()'>Volver</a></p><?
				}
	         }   
	    }
        
	    //METER SESIONES     
		if($_POST['sesion']){
		     if(isset($_POST['sala']) && ($_POST['elegirpelicula']) && ($_POST['hora']) && ($_POST['tipoPrecio'])) { 
		        $pelicula=$_POST['elegirpelicula'];
		        $sala=$_POST['sala'];
		        $fecha=$_POST['ano']."-".$_POST['mes']."-".$_POST['dia'];
		        $hora=$_POST['hora'];
                $precio=$_POST['tipoPrecio'];
                
                $sql="SELECT $tabla_salas.id_sala FROM $tabla_salas WHERE $tabla_salas.nom_sala='$sala'";
                $result = mysql_query($sql);
                while($fila=mysql_fetch_array($result)){
                    $id_sala=$fila[0];
                }
                
                $sql="INSERT INTO $tabla_sesiones(id_pelicula,id_sala,fecha,hora,id_precio)
                VALUES($pelicula,$id_sala,'$fecha','$hora',$precio)";
                $result = mysql_query($sql)or die(mysql_error());
                if(!$result){
                    echo "<h3>No se ha podido guardar</h3>";
                    ?><p><a href='javascript:history.back()'>Volver</a></p><?
                }else{
                    echo "<h3>Los datos han sido guardados</h3>";
			        ?><p><a href='javascript:history.back()'>Volver</a></p><?
                }
	         }
               /*
                $consulta = "SELECT MAX(id_sesion) FROM sesion";
                $resultado=mysql_query($consulta);
                $resul=mysql_result($resultado,0);
                if ($resul == null)
                    $id_sesion = 1;
                else
                    $id_sesion = $resul+1;*/
                    
                /*$consulta = "SELECT fila, col FROM $tabla_salas WHERE (nom_sala = '$sala')";
                $resultado = mysql_query($consulta);
                while ($fila = mysql_fetch_array($resultado)){
                    //$f = $fila['fila'];
                    //$c = $fila['col'];
                    $sql="INSERT INTO $tabla_sesiones(id_sesion,id_pelicula,nom_sala,fila,col,fecha,hora,id_precio,disponibilidad)
                    VALUES($id_sesion,$pelicula,'$sala',$f,$c,'$fecha','$hora',$precio,0)";

		            $result = mysql_query($sql);
                    if(! $result){
                        echo "<h3>No se ha podido guardar</h3>";
                        ?><p><a href='javascript:history.back()'>Volver</a></p><?
                    }
			    }
                echo "<h3>Los datos han sido guardados</h3>";
			    ?><p><a href='javascript:history.back()'>Volver</a></p><?  
	         }*/
	    }
        //ELIMINAR SESIONES     
		if($_POST['borrarsesion']){
             if(isset($_POST['sala']) && ($_POST['elegirpelicula']) && ($_POST['hora'])) { 
		        $pelicula=$_POST['elegirpelicula'];
		        $sala=$_POST['sala'];
		        $fecha=$_POST['ano']."-".$_POST['mes']."-".$_POST['dia'];
		        $hora=$_POST['hora'];
                
                $sql="SELECT count(*) FROM $tabla_sesiones WHERE id_pelicula=$pelicula
                and id_sala=$id_sala
                and fecha='$fecha' and hora='$hora'";
                $result = mysql_query($sql);
                while($fila=mysql_fetch_array($result)){
                    $existe=$fila[0];
                }
                
                if($existe!=0){
                    //DELETE FROM sesion WHERE id_pelicula=15 and id_sala=3 and fecha='2016-01-20' and hora='23:00';
                    $sql="DELETE FROM $tabla_sesiones WHERE id_pelicula=$pelicula
                    and id_sala=$id_sala and fecha='$fecha'
                    and hora='$hora' ";
                    $result=mysql_query($sql);
                    if($result){
                        echo "<h3>Los datos han sido borrados</h3>";
                        ?><p><a href='javascript:history.back()'>Volver</a></p><?
                    }else{
                        echo "<h3>No se ha podido borrar</h3>";
                        ?><p><a href='javascript:history.back()'>Volver</a></p><?
                    } 
                }else{
                    echo "<h3>Sesion no existe!</h3>";
                    ?><p><a href='javascript:history.back()'>Volver</a></p><?	
                }  
	       }
        }
        //MODFICAR SESIONES
        if($_POST['modfSesion']){
		     if(isset($_POST['sala']) && ($_POST['elegirpelicula']) && ($_POST['hora']) && ($_POST['tipoPrecio'])) { 
		        $pelicula=$_POST['elegirpelicula'];
		        $sala=$_POST['sala'];
		        $fecha=$_POST['ano']."-".$_POST['mes']."-".$_POST['dia'];
		        $hora=$_POST['hora'];
                $precio=$_POST['tipoPrecio'];
                
                $sql="SELECT $tabla_salas.id_sala FROM $tabla_salas WHERE $tabla_salas.nom_sala='$sala'";
                $result = mysql_query($sql);
                while($fila=mysql_fetch_array($result)){
                    $id_sala=$fila[0];
                }
                
                $sql="SELECT count(*) FROM $tabla_sesiones WHERE id_sala=$id_sala and fecha='$fecha' and hora='$hora'";
                $result = mysql_query($sql);
                while($fila=mysql_fetch_array($result)){
                    $existe=$fila[0];
                }
                
                if($existe!=0){    
                    $sql="UPDATE $tabla_sesiones SET id_pelicula=$pelicula,id_precio=$precio WHERE id_sala=$id_sala
                    and fecha='$fecha' and hora='$hora'";
                    $result = mysql_query($sql);
                    if(!$result){
                        echo "<h3>Modificacion no realizada!</h3>";
                        ?><p><a href='javascript:history.back()'>Volver</a></p><?
                    }else{
                        echo "<h3>Los datos han sido modificados</h3>";
                        ?><p><a href='javascript:history.back()'>Volver</a></p><? 
                    }   
                }else{
                    echo "<h3>Sesion no existe!</h3>";
                    ?><p><a href='javascript:history.back()'>Volver</a></p><?	
                }
	         }
	    }
        
	    //METER NUEVO ADMINISTRADOR
	    if($_POST['admin']){		
		     if(isset($_POST['dni']) && ($_POST['clave'])) { 
		        $dni=$_POST['dni'];
		        $clave=$_POST['clave'];
				$sql="INSERT INTO $tabla_administradores(dni,clave) VALUES('$dni','$clave')";
				$result = mysql_query($sql);
				if( $result){
					echo "<h3>Los datos han sido guardados</h3>";
			 		?><p><a href='javascript:history.back()'>Volver</a></p><?
			    }else{
					echo "<h3>No se ha podido guardar</h3>";
					?><p><a href='javascript:history.back()'>Volver</a></p><?
				}
	         }
	    }
	    //ELIMINAR ADMINISTRADOR POR DNI
		if($_POST['borraAdmin']){
			 if(isset($_POST['dni'])){
				$dni=$_POST['dni'];
                
                $sql="SELECT count(*) FROM $tabla_administradores WHERE dni='$dni'";
                $result = mysql_query($sql);
                while($fila=mysql_fetch_array($result)){
		            $existe=$fila[0];
		        }
                
                if($existe!=0){	
                    $sql="DELETE FROM $tabla_administradores WHERE dni='$dni'";
                    if (mysql_query($sql)){
                        echo "<h3>Los datos han sido borrados</h3>";
                        ?><p><a href='javascript:history.back()'>Volver</a></p><?
                    }else{
                        echo "<h3>No se ha podido borrar!</h3>";
                        ?><p><a href='javascript:history.back()'>Volver</a></p><?
                    }
			    }else{
                    echo "<h3>Administrador no existe!</h3>";
                    ?><p><a href='javascript:history.back()'>Volver</a></p><?	
                }
             } 
	    }
        //MODIFICAR ADMINISTRADOR
        if($_POST['modfAdmin']){		
		     if(isset($_POST['dni']) && ($_POST['clave'])) { 
		        $dni=$_POST['dni'];
		        $clave=$_POST['clave'];
                
                $sql="UPDATE $tabla_administradores SET clave='$clave' WHERE dni='$dni'";
				$result = mysql_query($sql);
				if( $result){
					echo "<h3>Los datos han sido modificados</h3>";
			 		?><p><a href='javascript:history.back()'>Volver</a></p><?
			    }else{
					echo "<h3>No se han podido modificar</h3>";
					?><p><a href='javascript:history.back()'>Volver</a></p><?
				}
	         }
	    }		
include('cierra_conexion.php');		
?>