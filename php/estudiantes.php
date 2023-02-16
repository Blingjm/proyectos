<?php
include_once('php/datos.php');
include_once('php/conex.php');
        $query = "SELECT * FROM estudiantes";
        $rs    = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $total_rows = mysqli_num_rows($rs);
        if($total_rows > 0){
            while($rows  = mysqli_fetch_array($rs)){
                ?>
                <tr>
                    <td><?php echo $rows['id']; ?></td>
                    <td><?php echo $rows['cedula']; ?></td>
                    <td><?php echo $rows['nombre']; ?></td>
                    <td><?php echo $rows['nota_matematicas']; ?></td>
                    <td><?php echo $rows['nota_fisica']; ?></td>
                    <td><?php echo $rows['nota_programacion']; ?></td>

                </tr>
        <?php
        
            }
        }else{
            ?>
            <tr>
                <td colspan="10
            ">No hay Registros en la BD</td>
            </tr>
    <?php 
        }
        ?>