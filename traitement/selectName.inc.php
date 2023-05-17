<?php
    require_once 'connDB.php';

    $sql = "SELECT prenom, nom, username FROM user;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $prenomChoisi = $row["prenom"];
            $nomChoisi = $row["nom"];
            $username = $row["username"];
            echo '<option value="' . $username . '">' . $prenomChoisi . ' ' . $nomChoisi . '</option>';
        }
    } else {
        echo "Aucun utilisateur trouvé.";
    }
?>