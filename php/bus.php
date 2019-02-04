<?php

    // Abrimos la conexion
    $con = mysqli_connect("localhost","lacasona_root","2505cd", "lacasona_boda");
    
    $name = utf8_decode($_POST["name"]);
    $surname = utf8_decode($_POST["surname"]);
    $option = 4;    // 0 -> nada ; 1 -> ida ; 2 -> vuelta ; 3 -> ida y vuelta ; 4 -> error

    $message = "";

    if (!$name || $name == "" || !$surname || $surname == "") {
        $message = 'ERROR: ' . $name . ' ' . $surname . ' ha intentado apuntarse al bus con la opcion: ' . $option . ' pero hay algun valor que no es valido' . PHP_EOL;
    } else {
        
        if (isset($_POST["ida"]) == "ida" && isset($_POST["vuelta"]) == "vuelta") {
            $option = 3;
        } else if ($_POST["ida"] == "ida") {
            $option = 1;
        } else if ($_POST["vuelta"] == "vuelta") {
            $option = 2;
        }
        
        if (!$option || $option == 4) {
            $message = 'ERROR: ' . $name . ' ' . $surname . ' ha intentado apuntarse al bus con la opcion: ' . $option . ' pero la opcion no es valida' . PHP_EOL;
        } else {
            $insert = "INSERT INTO Bus (name, surname, options) VALUES ('$name', '$surname', '$option')";
            $result = mysqli_query($con, $insert);
            
            if (!$result) {
                $message = 'ERROR: ' . $name . ' ' . $surname . ' ha intentado apuntarse al bus con la opcion: ' . $option . ' y no se ha guardado bien en la base de datos la siguiente query: ' . $insert . PHP_EOL;
            } else {
                $message = $name . ' ' . $surname . ' se ha apuntado al bus con la opcion: ' . $option . PHP_EOL;
            }
        }

    }

    // guardamos el mensaje en logs
    $logs = fopen("logs_bus.txt", "ab");
    fwrite($logs, $message);
    fclose($logs);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;

    // Cerramos la conexion
    mysqli_close($con);

?>