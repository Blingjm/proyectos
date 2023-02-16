<?php
include_once('php/datos.php');
include_once('php/conex.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="php/datos.php" method="post">
        <label>A: Número de cedula del Alumno</label><br>
        <input type="text" name="cedula"><br>
        <label>B: Nombre del Alumno</label><br>
        <input type="text" name="nombre"><br>
        <label>C: Nota de Matematicas</label><br>
        <input type="number" name="matematicas"><br>
        <label>D: Nota de Fisica</label><br>
        <input type="number" name="fisica"><br>
        <label>E: Nota de Programacion</label><br>
        <input type="number" name="programacion"><br>
        <input type="submit" name="btn" value="Guardar">
    </form>
    <br>
    <br>

    <table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Matematicas</th>
            <th>Fisica</th>
            <th>Programacion</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include("php/estudiantes.php");
        ?>
    </tbody>
    
</table>
<br>
<br>
<?php
    include("php/funciones.php");
?>

</body>
</html>