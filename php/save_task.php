<?php
include 'conn.php';

if (isset($_POST['guardar_tarea'])) {
    # code...
    $asignatura = $_POST['asignatura'];
    $nombre_de_tarea = $_POST['nombre_de_tarea'];
    $descripcion = $_POST['descripcion'];

    $guardar_tareas = "INSERT INTO tareas (asignatura, nombre_de_tarea, descripcion) VALUES ('$asignatura', '$nombre_de_tarea', '$descripcion')";
    $consulta = mysqli_query($conn, $guardar_tareas);

    if (!isset($consulta)) {
        echo'error';
        # code...
    }else{
        $_SESSION['message'] = 'La tarea ha sido guarda con exito:)';
        $_SESSION['message_type'] = 'success';
        header("location:../index.php");
    }
}

?>