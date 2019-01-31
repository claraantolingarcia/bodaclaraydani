<?php

    // Abrimos la conexion
    $con = mysqli_connect("localhost","lacasona_root","2505cd", "lacasona_boda");
    
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $option = 4;    // 0 -> nada ; 1 -> ida ; 2 -> vuelta ; 3 -> ida y vuelta ; 4 -> error

    $message = "";

    if (!$name || $name == "" || !$surname || $surname == "") {
        $message = 'nombre o apellido no validos';
        echo $message;
    } else {
        
        if (isset($_POST["ida"]) == "ida" && isset($_POST["vuelta"]) == "vuelta") {
            $option = 3;
        } else if ($_POST["ida"] == "ida") {
            $option = 1;
        } else if ($_POST["vuelta"] == "vuelta") {
            $option = 2;
        }
        
        if (!$option || $option == 4) {
            $message = 'opcion no valida';
            echo $message;
        } else {
            $insert = "INSERT INTO Bus (name, surname, options) VALUES ('$name', '$surname', '$option')";
            $result = mysqli_query($con, $insert);
            
            if (!$result) {
                $message = 'error al guardar';
                echo $message;
            } else {
                $message = 'Guardado!!';
                echo $message;
            }
        }

    }

    // Cerramos la conexion
    mysqli_close($con);

?>