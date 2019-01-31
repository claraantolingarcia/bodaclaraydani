<?php

    // Abrimos la conexion
    $con = mysqli_connect("localhost","lacasona_root","2505cd", "lacasona_boda");
    
    $song = $_POST["song"];

    if (!$song or $song == "") {
        echo 'la cancion no es valida';
    } else {
        $insert = "INSERT INTO Songs (name) VALUES ('$song')";
        $result = mysqli_query($con, $insert);
        if (!$result) {
            echo 'error al insertar la cancion';
        } else {
            echo 'cancion insertada!';
        }
    }

    // Cerramos la conexion
    mysqli_close($con);

?>
