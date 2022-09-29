<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/scripts.php"?>
    <title>Paicor</title>
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
        <div class="crear">
            <img src="img/crear_nuevo.png" alt="crear nuevo registro" class="crear_img">
            <pre class="crear_nuevo_text"><br><br><br> 
        ¡Bienvenido! Este es un sistema de gestión de datos,
    aquí podrás <a href="nuevo_registro.php" class="link_pr">crear nuevos registros</a>.

        Los mismos se almacenarán en una Base de datos MYSQL,
    y puedes <a href="lista_registros.php" class="link_pr">ver todos los registros aquí</a> .
          </pre>
        </div>
    </section>
    <footer></footer>
</body>
</html>