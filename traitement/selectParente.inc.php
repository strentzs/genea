<?php
    require_once 'connDB.php';

    $sql = "SELECT DISTINCT parente FROM user;";
    $result = mysqli_query($conn, $sql);
    $parentes = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $parentes[] = $row["parente"];
        }
        foreach($parentes as $parente){
            if (!empty(trim($parente))) {
                echo '<option value="' . $parente . '">' . $parente . '</option>';
            }
        }
    } else {
        echo "Aucun utilisateur trouvé.";
    }
?>