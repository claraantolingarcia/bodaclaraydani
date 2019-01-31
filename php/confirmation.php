<?php

    // Abrimos la conexion
    $con = mysqli_connect("localhost","lacasona_root","2505cd", "lacasona_boda");
    
    $name = $_POST["name"];
    $surname = $_POST["surname"];

    $message = "";

    if (!$name || $name == "" || !$surname || $surname == "") {
        $message = 'nombre o apellido no validos';
        echo $message;
    } else {
        $insert = "INSERT INTO Confirmations (name, surname) VALUES ('$name', '$surname')";
        $result = mysqli_query($con, $insert);
        if (!$result) {
            $message = 'ha habido un error, intentelo mas tarde';
            echo $message;
        } else {
            $message = 'Apuntado!';
            echo $message;
        }
    }

    // Cerramos la conexion
    mysqli_close($con);

?>