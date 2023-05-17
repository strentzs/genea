<?php 
    if (isset($_POST["submit"])) {
        $individuChoisi = $_POST["selectName"]; // Sort un username
        $categorieChoisie = $_POST["selectColumn"]; // Sort un nom de colonne
        $modificationChoisie = $_POST["modifyUser"]; // Sort une valeur en string
        function removeAccents($str) {
            $replace = array(
                'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C',
                'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I',
                'Ð'=>'D', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O',
                'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'ß'=>'s', 'à'=>'a', 'á'=>'a',
                'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
                'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'d', 'ñ'=>'n',
                'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u',
                'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r'
            );
            $str = strtr($str, $replace);
            return $str;
        }
    
        if ($categorieChoisie === "prenom" || $categorieChoisie === "deuxieme_prenom" || $categorieChoisie === "troisieme_prenom" || $categorieChoisie === "prenom_partenaire") {
            $individuChoisiModif = ucfirst(removeAccents($modificationChoisie));
        } elseif ($categorieChoisie === "nom"|| $categorieChoisie === "nom_partenaire") {
            $individuChoisiModif = strtoupper(removeAccents($modificationChoisie));
        } elseif ($categorieChoisie === "ddn" || $categorieChoisie === "ddm" || $categorieChoisie === "ddd" || $categorieChoisie === "ddn" || $categorieChoisie === "reference" || $categorieChoisie === "parente") {
            $individuChoisiModif = $modificationChoisie;
        }
    
        require_once('connDB.php');

        if ($categorieChoisie === "deuxieme_prenom" || $categorieChoisie === "troisieme_prenom") {
            $stmt = mysqli_prepare($conn, "UPDATE prenoms SET $categorieChoisie = ? WHERE username = ?;");
            if (!$stmt) {
                die("Échec de la préparation de la requête : " . mysqli_error($conn));
            }
            mysqli_stmt_bind_param($stmt, "ss", $individuChoisiModif, $individuChoisi);
            if (mysqli_stmt_execute($stmt)) {
                echo "Utilisateur ajouté avec succès !";
            } else {
                echo "Erreur : " . mysqli_error($conn);
            }
        } else {
            $stmt = mysqli_prepare($conn, "UPDATE user SET $categorieChoisie = ? WHERE username = ?;");
            if (!$stmt) {
                die("Échec de la préparation de la requête : " . mysqli_error($conn));
            }
            mysqli_stmt_bind_param($stmt, "ss", $individuChoisiModif, $individuChoisi);
            if (mysqli_stmt_execute($stmt)) {
                echo "Utilisateur ajouté avec succès !";
            } else {
                echo "Erreur : " . mysqli_error($conn);
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
        header('Location: ../index.php?modif=succès');
        exit();    
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
?>