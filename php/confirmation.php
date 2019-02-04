<?php

    // Abrimos la conexion
    $con = mysqli_connect("localhost","lacasona_root","2505cd", "lacasona_boda");
    
    $name = utf8_decode($_POST["name"]);
    $surname = utf8_decode($_POST["surname"]);

    $message = "";

    if (!$name || $name == "" || !$surname || $surname == "") {
        $message = 'ERROR: ' . $name . ' ' . $surname . ' ha intentado confirmar asistencia pero hay algun valor que no es valido' . PHP_EOL;
    } else {
        $insert = "INSERT INTO Confirmations (name, surname) VALUES ('$name', '$surname')";
        $result = mysqli_query($con, $insert);
        if (!$result) {
            $message = 'ERROR: ' . $name . ' ' . $surname . ' ha intentado confirmar asistencia y no se ha guardado bien en la base de datos la siguiente query: ' . $insert . PHP_EOL;
        } else {
            $message = $name . ' ' . $surname . ' ha confirmado asistencia' . PHP_EOL;
        }
    }

    // guardamos el mensaje en logs
    $logs = fopen("logs_confirmation.txt", "ab");
    fwrite($logs, $message);
    fclose($logs);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;

    // Cerramos la conexion
    mysqli_close($con);

?>