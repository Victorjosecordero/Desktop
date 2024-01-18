<?php
   // conectar();
    function conectar(){
        $host = "localhost";
        $usuario="root";
        $pw="1234";
        $BDconex = "examen_ev1";
        

        try{
            
            $db = new mysqli($host,$usuario, $pw, $BDconex);
        }catch(mysqli_sql_exception $e){
            echo "<p>Ha habido una excepción: ". $e->getMessage() .  $conexion->connect_errno .  $conexion->connect_error ."</p>";
            $db = false;
        }

        return $db;
    }
    function desconectar($conexion){
        $desconectar = $conexion->close();

        if(!$desconectar){
            echo "<p>Error en la desconexion ". $conexion->connect_error."</p>";
        }
    }

    //leer cualquier tabla

    function consultaConTabla($resul){
  

        echo "<table class='table table-bordered table-striped table-hover text-center'>";

            echo "<thead>";

                echo "<tr>";

                    while($finfo = mysqli_fetch_field($resul)){
                        echo "<th>";
                        echo    $finfo->name;
                        echo "</th>";
                    }
                    
                    echo "<th>Modificar</th>";
                    echo "<th>Eliminar</th>";
                    
                
                        
                       
                echo "</tr>";

            echo "</thead>";

            echo "<tbody>";

                while($linea = mysqli_fetch_array($resul, MYSQLI_ASSOC)){
                    echo "<tr>";
                      

                        foreach($linea as $col_valor){
                            echo "<td> $col_valor </td>";
                        }
                        print("<td class='text-center'><button style='border:none;' type='submit' name='modificar' value='" .  $linea['Codigo'] .  "' ><img class='botones' src='img/editar.png'></button></td>");
                        print("<td class='text-center'><button style='border:none;' type='submit' name='borrar' value='" .  $linea['Codigo'] .  "' ><img class='botones' src='img/borrar.png'></button></td>");
                    

                    
                    echo "</tr>";
                }

            echo "</tbody>";
        
        echo "</table>";
   
    }

    //borrar tablaa

   
?>