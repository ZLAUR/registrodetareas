<?php include 'php/conn.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#000046">
    <title>Registro de tareas</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <!--SECCION DE GUARDAR LA TAREA FORMULARIO-->
    <section class="contenedor">
        <div class="bloque1">
            <form action="php/save_task.php" method="POST" class="bloque2">
                    <!--VERSION-->
        <i>Beta 0.01</i>
                <!--ALERTA-->
                <?php if (isset($_SESSION['message'])) {?>
                <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?=$_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php session_unset();}?>
                <input required name="asignatura" class="inpu_100 form-control" type="text" placeholder="Asignatura"
                    autofocus>
                <input required name="nombre_de_tarea" class="inpu_100 form-control" type="text"
                    placeholder="Nobre de la tarea">
                <textarea require name="descripcion" class="inpu_100 form-control" cols="30" rows="10"
                    placeholder="Descripción"></textarea>
                <input name="guardar_tarea" class="btn btn_boton" type="submit" value="Resgitrar tarea">
            </form>
        </div>
        <!--SECCION DE TABLA DE LA GURDAR LA TAREA-->
        <table class="table table-striped table-dark table-responsive-sm">
            <thead>
                <tr>
                    <th class="bg-primary" scope="row">N</th>
                    <th class="bg-primary" scope="col">Asignatura</th>
                    <th class="bg-primary" scope="col">Tarea</th>
                    <th class="bg-primary" scope="col">Descripción</th>
                    <th class="bg-primary" scope="col">Fecha</th>
                    <th class="bg-primary" scope="col">:)</th>
                </tr>
            </thead>
            <?php
$seleccionar = "SELECT * FROM tareas";
$resultado = mysqli_query($conn, $seleccionar);

while ($mostrar = mysqli_fetch_array($resultado)) {?>
            <tbody>
                <tr>
                    <td class="bg-primary"><?php echo $mostrar['id'] ?></td>
                    <td><?php echo $mostrar['asignatura'] ?></td>
                    <td><?php echo $mostrar['nombre_de_tarea'] ?></td>
                    <td><?php echo $mostrar['descripcion'] ?></td>
                    <td><?php echo $mostrar['fecha'] ?></td>
                    <td>
                        <a href="php/borrar.php?id=<?php echo $mostrar['id'] ?>">🗑</a>
                        <a href=""></a>
                    </td>
                </tr>


            </tbody>
            <?php }?>

        </table>
    </section>
</body>

</html>