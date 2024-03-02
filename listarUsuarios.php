<?php

    // Se incluye la conexión de la DB
    include "config.php";

    // Se instancia la conexión a la DB
    $conn = connectToMySQL();

    // Se prepara la sentencia de consulta para la base de datos
    $sqlQuery = "SELECT * FROM usuarios.users";

    // Se ejecula la consulta 
    $execQuery = mysqli_query($conn, $sqlQuery);
    
    $row = mysqli_fetch_array($execQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class = "container mt-5">

    <h1 class="text-center"> Usuarios </h1>

    <table class="table text-center">
        <thead class="table-success table-striped">
            <tr>
                <th>ID</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>TElÉFONO MÓVIL</th>
                <th>DIRECCIÓN</th>
            </tr>                
        </thead>
        <tbody>
            <?php

                // Se recorre la variable row como array

                while($row=mysqli_fetch_array($execQuery)){
            ?>

            <tr>

                <th><?php echo $row['user_id']?></th>
                <th><?php echo $row['user_firstName']?></th>
                <th><?php echo $row['user_LastName']?></th>
                <th><?php echo $row['user_phone']?></th>
                <th><?php echo $row['user_address']?></th>

                <!-- <th class = "mp-0">
                    <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger mx-1">ELIMINAR</a>
                </th> -->

            </tr>

            <?php
                    
                }        

            ?>
        </tbody>
    </table>

</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>