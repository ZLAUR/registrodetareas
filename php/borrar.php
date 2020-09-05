<?php
include 'conn.php';

if (isset($_GET['id'])) {
    # code...
    $id = $_GET['id'];
    $borrar = "DELETE FROM tareas WHERE id = $id";
    $result = mysqli_query($conn ,$borrar);
    if (!$result) {
        # code...
        $_SESSION['message'] = 'ERROR AL BORRAR LA TAREA';
        die();
    }else{
        $_SESSION['message'] = 'TAREA BORRADA';
        $_SESSION['message_type'] = 'danger';
        header("location:../index.php");

    }
}

?>