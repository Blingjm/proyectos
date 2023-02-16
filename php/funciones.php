<?php 
include_once('php/datos.php');
include_once('php/conex.php');

$sql = "SELECT AVG(nota_matematicas) AS promedio_matematicas,
AVG(nota_fisica) AS promedio_fisica,
AVG(nota_programacion) AS promedio_programacion
FROM estudiantes";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
echo "Promedio de matematicas: " . $row['promedio_matematicas'] . "<br>";
echo "Promedio de fisica: ". $row['promedio_fisica'] . "<br>";
echo "Promedio de programacion: " . $row['promedio_programacion'] . "<br>";
}
} else {
echo "No hay resultados";
}

$sql2 = "SELECT COUNT(*) FROM estudiantes WHERE nota_matematicas > 10 AND nota_fisica > 10 AND nota_programacion > 10";
$result = mysqli_query($conn, $sql2);
$row = mysqli_fetch_row($result);
$numeroAprobados = $row[0];

echo "El número de estudiantes aprobados en cada materia es: " . $numeroAprobados;
?>
<br>
<?php

    // Consulta para obtener los estudiantes aplazados en matemáticas
$query_math = "SELECT COUNT(*) AS aplazados_math FROM estudiantes WHERE nota_matematicas < 10";
$result_math = mysqli_query($conn, $query_math);
$row_math = mysqli_fetch_assoc($result_math);
$aplazados_math = $row_math['aplazados_math'];

// Consulta para obtener los estudiantes aplazados en física
$query_fisica = "SELECT COUNT(*) AS aplazados_fisica FROM estudiantes WHERE nota_fisica < 10";
$result_fisica = mysqli_query($conn, $query_fisica);
$row_fisica = mysqli_fetch_assoc($result_fisica);
$aplazados_fisica = $row_fisica['aplazados_fisica'];

// Consulta para obtener los estudiantes aplazados en programación
$query_programacion = "SELECT COUNT(*) AS aplazados_programacion FROM estudiantes WHERE nota_programacion < 10";
$result_programacion = mysqli_query($conn, $query_programacion);
$row_programacion = mysqli_fetch_assoc($result_programacion);
$aplazados_programacion = $row_programacion['aplazados_programacion'];

// Mostrar el número de aplazados por materia
echo "Aplazados en matemáticas: " . $aplazados_math . "<br>";
echo "Aplazados en física: " . $aplazados_fisica . "<br>";
echo "Aplazados en programación: " . $aplazados_programacion . "<br>";

$sql3 = "SELECT cedula FROM estudiantes WHERE nota_matematicas > 10 AND nota_fisica > 10 AND nota_programacion > 10";
    $result = mysqli_query($conn, $sql3);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "Numero de Cedula del Alumno que Aprobo todas las Materias: " . $row["cedula"]. "<br>";
        }
    } else {
        echo "No hay resultados";
    }
//Consulta para obtener el número de alumnos que aprobaron una sola materia
$sql8 = "SELECT COUNT(*) FROM estudiantes WHERE (nota_matematicas >= 10 OR nota_fisica >= 10 OR nota_programacion >= 10) AND (nota_matematicas < 10 AND nota_fisica < 10 AND nota_programacion < 10)";
$resultado = mysqli_query($conn,$sql8);
$fila = mysqli_fetch_array($resultado);
$alumnos_una_materia = $fila[0];

//Consulta para obtener el número de alumnos que aprobaron dos materias
$sql4 = "SELECT COUNT(*) FROM estudiantes WHERE (nota_matematicas >= 10 AND nota_fisica >= 10) OR (nota_matematicas >= 10 AND nota_programacion >= 10) OR (nota_fisica >= 10 AND nota_programacion >= 10)";
$resultado = mysqli_query($conn,$sql4);
$fila = mysqli_fetch_array($resultado);
$alumnos_dos_materias = $fila[0];

//Consulta para obtener la nota máxima de matemáticas
$sql5 = "SELECT MAX(nota_matematicas) FROM estudiantes";
$resultado = mysqli_query($conn,$sql5);
$fila = mysqli_fetch_array($resultado);
$max_matematicas = $fila[0];

//Consulta para obtener la nota máxima de física
$sql6 = "SELECT MAX(nota_fisica) FROM estudiantes";
$resultado = mysqli_query($conn,$sql6);
$fila = mysqli_fetch_array($resultado);
$max_fisica = $fila[0];

//Consulta para obtener la nota máxima de programación
$sql7 = "SELECT MAX(nota_programacion) FROM estudiantes";
$resultado = mysqli_query($conn,$sql7);
$fila = mysqli_fetch_array($resultado);
$max_programacion = $fila[0];

//Imprimir resultados
echo "Número de alumnos que aprobaron una sola materia: " . $alumnos_una_materia . "<br>";
echo "Número de alumnos que aprobaron dos materias: " . $alumnos_dos_materias . "<br>";
echo "Nota máxima de matemáticas: " . $max_matematicas . "<br>";
echo "Nota máxima de física: " . $max_fisica . "<br>";
echo "Nota máxima de programación: " . $max_programacion . "<br>";
?>
