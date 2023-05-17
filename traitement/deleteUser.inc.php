<?php
    if (isset($_POST["submit"])) {
        $individuChoisi = $_POST["selectName"];

        require_once('connDB.php');

        $stmt = mysqli_prepare($conn, "DELETE FROM user WHERE username = ?;");
        if (!$stmt) {
            die("Échec de la préparation de la requête : " . mysqli_error($conn));
        }
        mysqli_stmt_bind_param($stmt, "s", $individuChoisi);
        if (mysqli_stmt_execute($stmt)) {
            echo "Utilisateur ajouté avec succès !";
        } else {
            echo "Erreur : " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        header('Location: ../index.php?suppression=succès');
        exit();
    }
?>