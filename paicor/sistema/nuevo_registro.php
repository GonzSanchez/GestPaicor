<?php

    if(!empty($_POST)){
        $alert="";
        if(empty($_POST['nombre']) || empty($_POST['ubicacion']) || empty($_POST['fecha']) || empty($_POST['precio']) || empty($_POST['rubro']) || empty($_POST['descripcion'])){
            $alert='<p class="msg_error">Todos los campos son obligatorios</p>';
        }else{
            include "../conexion.php";

            $nombre = $_POST['nombre'];
            $ubicacion = $_POST['ubicacion'];
            $fecha = $_POST['fecha'];
            $precio = $_POST['precio'];
            $rubro = $_POST['rubro'];
            $descripcion = $_POST['descripcion'];

            $query_insert = mysqli_query($connection, "INSERT INTO paicor_data (nombre,ubicación,fecha,precio,rubro,descripción)
                                                                VALUES('$nombre','$ubicacion','$fecha','$precio','$rubro','$descripcion')");
            
            if($query_insert){
                $alert='<p class="msg_save">Se han guardado los datos correctamente.</p>';
            }else{
                $alert='<p class="msg_error">Error al guardar los datos.</p>';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/scripts.php"?>
    <title>Nuevo Registro</title>
</head>
<body>
    <?php include "includes/header.php" ?>
    <nav>
        <ul class="nav_link">
            <li><a href="index.php" class="nav_link">Inicio</a></li>
            <p>|</p>
            <li><a href="nuevo_registro.php" class="nav_link">Nuevo Registro</a></li>
            <p>|</p>
            <li><a href="lista_registros.php" class="nav_link">Lista de Registros</a></li>
        </ul>
    </nav>
    <section id='container'>
        <br>
    <a href="lista_registros.php" class="ver_registros">Ver todos los registros</a>
    <div class="form_register">
        <h2>Nuevo registro</h2>
        <hr>
        <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

        <form action="" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">

            <label for="ubicacion">Ubicación</label>
            <input type="text" name="ubicacion" id="ubicacion" placeholder="Ubicación">

            <label for="fecha">Fecha</label>
            <input type="month" name="fecha" id="fecha" placeholder="Fecha">

            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" placeholder="Precio" step="0.01">

            <label for="rubro">Rubro</label>
            <input type="text" name="rubro" id="rubro" placeholder="Rubro">

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" cols="46" rows="3" placeholder="Descripción"></textarea>

            <input type="submit" value="Crear registro" class="btn_save">
        </form>
    </div>
    </section>
    <footer></footer>
</body>
</html>