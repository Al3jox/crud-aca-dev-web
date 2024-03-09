<?php

    include "config.php";

    $con = connectToMySQL();

    $id_contacto = $_GET['id'];

    $sql = "DELETE FROM users WHERE user_id = '$id_contacto'";

    $query = mysqli_query($con, $sql);

        if($query){
            Header("Location: listarUsuarios.php");
        }


?>