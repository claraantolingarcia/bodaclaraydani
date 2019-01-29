<?php
    $conn = mysqli_connect("localhost", "lacasona_root", "2505cd", "lacasona_boda");

    if (!$conn) {
        echo 'KO';
    } else {
        echo 'OK';
    }
?>
