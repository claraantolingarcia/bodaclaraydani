<?php

    // Abrimos la conexion
    $con = mysqli_connect("localhost","lacasona_root","2505cd", "lacasona_boda");
    
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $option = 4;    // 0 -> nada ; 1 -> ida ; 2 -> vuelta ; 3 -> ida y vuelta ; 4 -> error

    if (!$name || $name == "" || !$surname || $surname == "") {
        echo 'nombre o apellido no válidos';
    } else {
        
        if (isset($_POST["ida"]) == "ida" && isset($_POST["vuelta"]) == "vuelta") {
            $option = 3;
        } else if ($_POST["ida"] == "ida") {
            $option = 1;
        } else if ($_POST["vuelta"] == "vuelta") {
            $option = 2;
        }
        
        if (!$option || $option == 4) {
            echo 'opción no válida';
        } else {
            $insert = "INSERT INTO Bus (name, surname, options) VALUES ('$name', '$surname', '$option')";
            $result = mysqli_query($con, $insert);
            
            if (!$result) {
                echo 'error al guardar';
            } else {
                echo 'Guardado!!';
            }
        }

    }

    // Cerramos la conexion
    mysqli_close($con);

?>