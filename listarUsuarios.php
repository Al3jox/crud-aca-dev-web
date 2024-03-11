<?php

include "config.php";

$conn = connectToMySQL();

$sqlQuery = "SELECT * FROM usuarios.users";

$execQuery = mysqli_query($conn, $sqlQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Usuarios</title>
</head>
<body>

<nav class="navbar bg-primary navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand text-light fs-2" href="#">Directorio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-light fs-5" aria-current="page" href="index.html">Crear Personas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-light fs-5" aria-current="page" href="listarUsuarios.php">Listar Personas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">

    <h1 class="text-center">Usuarios</h1>

    <table class="table text-center">
        <thead class="table-primary table-striped">
        <tr>
            <th>ID</th>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>TELÉFONO MÓVIL</th>
            <th>DIRECCIÓN</th>
            <th>ACCIÓN</th>
        </tr>
        </thead>
        <tbody>
        <?php

        while ($row = mysqli_fetch_array($execQuery)) {

            $userId = $row['user_id'];
            $userFirstName = $row['user_firstName'];
            $userLastName = $row['user_LastName'];
            $userPhone = $row['user_phone'];
            $userAddress = $row['user_address'];

            echo "<tr>
                    <td>$userId</td>
                    <td>$userFirstName</td>
                    <td>$userLastName</td>
                    <td>$userPhone</td>
                    <td>$userAddress</td>
                    <td class='mp-0'>
                        <a href='delete.php?id=$userId' class='btn btn-danger mx-1'>Eliminar</a>
                        <a href='updateUser.php?id=$userId' class='btn btn-primary mx-1'>Actualizar</a>
                    </td>
                </tr>";
        }

        ?>
        </tbody>
    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>
