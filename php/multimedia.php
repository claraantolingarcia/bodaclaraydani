<?php

    // Abrimos la conexion
    $con = mysqli_connect("localhost","lacasona_root","2505cd", "lacasona_boda");
    
    $song = $_POST["song"];

    $message = "";

    if (!$song or $song == "") {
        $message = 'la cancion no es valida';
        echo $message;
    } else {
        $insert = "INSERT INTO Songs (name) VALUES ('$song')";
        $result = mysqli_query($con, $insert);
        if (!$result) {
            $message = 'error al insertar la cancion';
            echo $message;
        } else {
            $message = 'cancion insertada!';
            echo $message;
        }
    }

    // Cerramos la conexion
    mysqli_close($con);

?>
