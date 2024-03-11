<?php
include "config.php";

try {
    
    $conn = connectToMySQL();

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $userId = $_GET['id'];

        $stmt = $conn->prepare("SELECT * FROM usuarios.users WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
        } else {
            echo "<p class='text-center alert alert-danger mt-5'>Usuario no encontrado.</p>";
            exit();
        }
    } else {
        echo "<p class='text-center alert alert-danger mt-5'>ID de usuario no válido.</p>";
        exit();
    }

    if (isset($_POST['submit'])) {
        $userFirstName = $_POST['user_firstName'];
        $userLastName = $_POST['user_LastName'];
        $userPhone = $_POST['user_phone'];
        $userAddress = $_POST['user_address'];

       
        $stmt = $conn->prepare("UPDATE usuarios.users SET user_firstName = ?, user_LastName = ?, user_phone = ?, user_address = ? WHERE user_id = ?");
        $stmt->bind_param("ssssi", $userFirstName, $userLastName, $userPhone, $userAddress, $userId);

        // Ejecutar la consulta de actualización
        if ($stmt->execute()) {
            header("listarUsuarios.php");
        } else {    
            header("listarUsuarios.php");
        }
    }
} catch (Exception $e) {
    
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Actualizar usuario</title>
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
<h2 class="mt-5 text-center text-primary fs-1">Actualizar usuario</h2>
<form action="updateUser.php?id=<?php echo $userId; ?>" method="post">
    <div class="container-sm mt-5">
        <label class="form-label" for="">Ingrese su primer nombre</label>
        <input class="form-control" type="text" name="user_firstName" value="<?php echo isset($row['user_firstName']) ? $row['user_firstName'] : ''; ?>">
        <label class="form-label" for="">Ingrese su primer apellido</label>
        <input class="form-control" type="text" name="user_LastName" value="<?php echo isset($row['user_LastName']) ? $row['user_LastName'] : ''; ?>">
        <label class="form-label" for="">Ingrese su número de teléfono</label>
        <input class="form-control" type="tel" name="user_phone" value="<?php echo isset($row['user_phone']) ? $row['user_phone'] : ''; ?>">
        <label class="form-label" for="">Ingrese su dirección de residencia</label>
        <input class="form-control" type="text" name="user_address" value="<?php echo isset($row['user_address']) ? $row['user_address'] : ''; ?>">
        <button class="btn btn-success mt-3 px-5 fs-3" type="submit" name="submit" value="Actualizar usuario">Guardar cambios</button>
        <a href='listarUsuarios.php' class='btn btn-primary mt-3 px-5 fs-3'>Volver</a>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
