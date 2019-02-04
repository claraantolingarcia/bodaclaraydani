<?php

    // Abrimos la conexion
    $con = mysqli_connect("localhost","lacasona_root","2505cd", "lacasona_boda");
    
    $song = utf8_decode($_POST["song"]);

    $message = "";
    
    if (!$song or $song == "") {
        $message = 'ERROR: ' . $song . ' no es valido' . PHP_EOL;
    } else {
        $insert = "INSERT INTO Songs (name) VALUES ('$song')";
        $result = mysqli_query($con, $insert);
        if (!$result) {
            $message = 'ERROR: ' . $song . ' no se ha insertado correctamente en la base de datos por la siguiente query: ' . $insert . PHP_EOL;
        } else {
            $message = $song . ' insertada' . PHP_EOL;
        }
    }

    // guardamos el mensaje en logs
    $logs = fopen("logs_multimedia.txt", "ab");
    fwrite($logs, $message);
    fclose($logs);

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;

    // Cerramos la conexion
    mysqli_close($con);

?>
