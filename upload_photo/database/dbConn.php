<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "upload_images";

    session_start();
    
    try {
        $mysqli = new mysqli($host, $username, $password, $dbname);
    } catch (Throwable $th) {
        echo '<script>
                alert("some error occured in database");
              </script>';
    }
?>