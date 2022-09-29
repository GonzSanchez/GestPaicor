<?php

    include "../conexion.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/scripts.php"?>
    <title>Lista de Registros</title>
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
    <section id='container_lista'>
        
        <h2>Lista de registros</h2>
        <a href="nuevo_registro.php" class="btn_new">Crear un nuevo registro</a>
        
        <form action="buscar_registro.php" method="get" class="form_search">
            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
            <input type="submit" value="Buscar" class="btn_search">
        </form>

        <table>
            <tr>
                <th class="th_nombre">Nombre</th>
                <th class="th_ubicacion">Ubicación</th>
                <th class="th_fecha">Fecha</th>
                <th class="th_precio">Precio</th>
                <th class="th_rubro">Rubro</th>
                <th class="th_descripcion">Descripción</th>
            </tr>

        <?php    
            //paginador
            $sql_register = mysqli_query($connection, "SELECT COUNT(*) as total_registro FROM paicor_data WHERE ID > 0;");
            $result_register = mysqli_fetch_array($sql_register);
            $total_registro = $result_register['total_registro'];

            $por_pagina = 20;

            if(empty($_GET['pagina'])){
                $pagina = 1;
            }else{
                $pagina = $_GET['pagina'];
            }

            $desde = ($pagina-1) * $por_pagina;
            $total_paginas = ceil($total_registro / $por_pagina);


            $query = mysqli_query($connection ,"SELECT * FROM `paicor_data`
                                                ORDER BY ID DESC
                                                LIMIT $desde, $por_pagina
                                                ");

            $result = mysqli_num_rows($query);

            if($result > 0){
                while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?php echo $data["nombre"]; ?></td>
                <td><?php echo $data["ubicación"]; ?></td>
                <td><?php echo $data["fecha"]; ?></td>
                <td><?php echo $data["precio"]; ?></td>
                <td><?php echo $data["rubro"]; ?></td>
                <td><?php echo $data["descripción"]; ?></td>
            </tr>
        <?php
                }
            }

        ?>
        </table>

        <div class="paginador">
            <ul>
            <?php 
            if($pagina != 1){
            ?>
                <li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
                <li><a href="?pagina=<?php echo $pagina-1; ?>">|<<</a></li>

            <?php 
            }
            for ($i=1; $i <= $total_paginas; $i++) { 
                if ($i == $pagina) {
                    echo '<li class="page_actual">'.$i.'</li>';
                }else{
                    echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                }
            }
            if ($pagina != $total_paginas){
            ?>

                <li><a href="?pagina=<?php echo $pagina + 1; ?>">>>|</a></li>
                <li><a href="?pagina=<?php echo $total_paginas; ?>">>|</a></li>
                <?php } ?>
            </ul>
        </div>

    </section>
    <footer></footer>
</body>
</html>