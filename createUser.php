<?php
    include("config.php");

    $txtNombre = $_POST["txtNombre"];
    $txtApellido = $_POST["txtApellido"];
    $txtTelefono = $_POST["txtTelefono"];
    $txtDireccion = $_POST["txtDireccion"];

    $connection = connectToMySQL();

    $query = "INSERT INTO users(user_firstName, user_LastName, user_phone, user_address) VALUES (?,?,?,?)";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("ssss", $txtNombre, $txtApellido, $txtTelefono, $txtDireccion);
    $stmt->execute();

    if($query){
        Header("Location: listarUsuarios.php");
    }

    echo "Usuario creado correctamente";

    $connection->close();

?>