<?session_start();?>
<!-- @Maite_Echeverry-->
<?include ('bloqueDeSeguridad.php');?>
<html>
<head>
<title>seleccion cartel</title>
<LINK REL="stylesheet" TYPE="text/css" HREF="stilo/ticket.css">
</head>
<body> 
<h2 align="center">Has realizado la compra de forma exitosa!!!</h2>
<? 
include('conexionBD.php');

$usuario=$_SESSION['usuario'];
$pelicula=$_SESSION['id_pelicula'];
$sala=$_SESSION['sala'];
$fecha=$_SESSION['fecha'];
$hora=$_SESSION['hora'];
$numEn=$_SESSION['cantEn'];
$precio_id=$_SESSION['precio_id'];
$precio_valor=$_SESSION['precio_valor'];
$precio_tipo=$_SESSION['precio_tipo'];
$e='euros';
$total=$precio_valor*$numEn; 
?>
    <div id="uno" align="center">
        <table border="1" cellpadding='0' cellspacing='0' width="600" bgcolor="#F6F6F6" bordercolor="#FFFFFF">
            <tr>
                <th align='center'>Sala </th>
                <th align='center'>Pelicula </th>
                <th align='center'>Fecha</th>
                <th align='center'>Hora</th>
            </tr>
            <?
                $sql="SELECT $tabla_salas.nom_sala,$tabla_peliculas.titulo FROM $tabla_peliculas
                INNER JOIN $tabla_sesiones USING(id_pelicula)
                INNER JOIN $tabla_salas USING(id_sala)
                WHERE $tabla_sesiones.id_sala=$sala
                AND $tabla_sesiones.id_pelicula=$pelicula
                AND $tabla_sesiones.fecha='$fecha'
                AND $tabla_sesiones.hora='$hora'";
                $result = mysql_query($sql) or die(mysql_error());
                while($fila=mysql_fetch_array($result)){
                    $nom_s=strtoupper($fila[0]);
                    $nom_p=$fila[1];
                }
                echo "<tr>";
                echo "<br/>";
                echo "<td align='center'>$nom_s</td>";
                echo "<td align='center'>$nom_p</td>";
                echo "<td align='center'>$fecha</td>";
                echo "<td align='center'>$hora</td>";
                echo "<br/>"; 
                echo "<tr>";
            ?>                                                                                                
        </table>  
    <div/> 
    
    
    <div id="dos" align="center">
         
      <table border="1" cellpadding='0' cellspacing='0' width="600" bgcolor="#F6F6F6" bordercolor="#FFFFFF">
          <tr>
            <th align='center'>Numero de entrada</th>
            <th align='center'><h4>Precio unitario</h4></th>
            <th align='center'><h4>Fila</h4></th>
            <th align='center'><h4>Butaca</h4></th>
          </tr>
          <?
            if(isset($_SESSION['fila']) and ($_SESSION['columna'])){
                while (list ($key, $val) = each ($_SESSION['fila'])) { 
                    $arrayF[] = $val;
                }
                $arrayC = array();
                while (list ($key, $val) = each ($_SESSION['columna'])) {  
                    $arrayC[] = $val;
                }
                $j=0;
                for($i=0; $i<$numEn; $i++){	
                    $sql="INSERT INTO $tabla_ventas(id_cliente, id_pelicula, id_sala, fecha, hora, fila, col, n_entradas, total)
                            VALUES($usuario,$pelicula,$sala,'$fecha','$hora',$arrayF[$j],$arrayC[$j],$numEn,$total)";
                    mysql_query($sql) or die(mysql_error());
                    $j=$j+1;
                }
            }
          
          $j=0;
          for($i=1;$i<=$numEn;$i++){
            echo "<tr>";
            echo "<td align='center'>Entrada $i</td>";
            echo "<td align='center'>$precio_valor $e</td>";
            echo "<td align='center'>$arrayF[$j]</td>"; 
            echo "<td align='center'>$arrayC[$j]</td>";  
            echo "<tr>";
            $j=$j+1; 
            $suma+=$precio_valor;
          }
          echo "<br/>";
          echo "<br/>";
          echo "Estas son sus Entradas : ";
          echo "<br/>";
          echo $reserva;
          echo '<br><br>';
        ?>
      </table>  
      <? echo "<h2 align=\"center\">Precio Total:  ".$suma." euros</h2>";?>
      <h2 align="center">Gracias por su visita, que tenga un buen dia!</h2>
      <br/>
      <br/>
      <a href="fuera_con_segura.php">Salir</a>                                                                                                   
</div>
<?include('cierra_conexion.php');?>
</body>  
</html> 