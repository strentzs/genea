<?php
    require_once 'connDB.php';

    $sql = "SELECT DISTINCT nom FROM user;";
    $result = mysqli_query($conn, $sql);
    $familyNames = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $familyNames[] = $row["nom"];
        }
        foreach($familyNames as $name){
            echo '<option value="' . $name . '">' . $name . '</option>';
        }
    } else {
        echo "Aucun utilisateur trouvé.";
    }
?>