<?php
    $db_servername = 'YOUR DB_SERVERNAME';
    $db_username = 'YOUR DB_USERNAME';
    $db_password= 'YOUR DB_PASSWORD';
    $db_name = 'YOUR DB_NAME';

    $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
    
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }
?>