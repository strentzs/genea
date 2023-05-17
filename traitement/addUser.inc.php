<?php
    if (isset($_POST["submit"])) {
            // Création d'une fonction pour retirer les accents quand ils sont rentrés
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

        $prenom = ucfirst(removeAccents(strtolower($_POST["prenom"])));
        $deux_prenom = isset($_POST["deux_prenom"]) ? ucfirst(removeAccents(strtolower($_POST["deux_prenom"]))) : null;
        if (empty($deux_prenom)) {
            $deux_prenom = null;
        }
        $trois_prenom = isset($_POST["trois_prenom"]) ? ucfirst(removeAccents(strtolower($_POST["trois_prenom"]))) : null;
        if (empty($trois_prenom)) {
            $trois_prenom = null;
        }
        $nom = strtoupper(removeAccents($_POST["nom"]));
        $username = strtolower($nom).strtolower(substr($prenom, 0, 3));
        $ddn = isset($_POST["ddn"]) ? $_POST["ddn"] : null;
        if (empty($ddn)) {
            $ddn = null;
        }
        $vdn = isset($_POST["vdn"]) ? ucfirst(removeAccents(strtolower($_POST["vdn"]))) : null;
        if (empty($vdn)) {
            $vdn = null;
        }
        $ddm = isset($_POST["ddm"]) ? $_POST["ddm"] : null;
        if (empty($ddm)) {
            $ddm = null;
        }
        $vdm = isset($_POST["vdm"]) ? ucfirst(removeAccents(strtolower($_POST["vdm"]))) : null;
        if (empty($vdm)) {
            $vdm = null;
        }
        $ddd = isset($_POST["ddd"]) ? $_POST["ddd"] : null;
        if (empty($ddd)) {
            $ddd = null;
        }
        $vdd = isset($_POST["vdd"]) ? ucfirst(removeAccents(strtolower($_POST["vdd"]))) : null;
        if (empty($vdd)) {
            $vdd = null;
        }
        $prenomPartenaire = isset($_POST["prenomPartenaire"]) ? ucfirst(removeAccents(strtolower($_POST["prenomPartenaire"]))) : null;
        if (empty($prenomPartenaire)) {
            $prenomPartenaire = null;
        }
        $nomPartenaire = isset($_POST["nomPartenaire"]) ? strtoupper(removeAccents($_POST["nomPartenaire"])) : null;
        if (empty($nomPartenaire)) {
            $nomPartenaire = null;
        }
        $reference = $_POST["reference"];
        $parente = $_POST["parente"];

        require_once('connDB.php');

        $stmt = mysqli_prepare($conn, "INSERT INTO user (prenom, nom, username, ddn, ddm, ddd, prenom_partenaire, nom_partenaire, reference, parente) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

        if (!$stmt) {
            die("Échec de la préparation de la requête : " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "ssssssssss", $prenom, $nom, $username, $ddn, $ddm, $ddd, $prenomPartenaire, $nomPartenaire, $reference, $parente);

        if (mysqli_stmt_execute($stmt)) {
            $stmt2 = mysqli_prepare($conn, "INSERT INTO prenoms (deuxieme_prenom, troisieme_prenom) VALUES (?, ?);");

            if (!$stmt2) {
                die("Échec de la préparation de la requête : " . mysqli_error($conn));
            }

            mysqli_stmt_bind_param($stmt2, "ss", $deux_prenom, $trois_prenom);

            if (mysqli_stmt_execute($stmt2)) {
                
                $stmt3 = mysqli_prepare($conn, "INSERT INTO lieux (vdn, vdm, vdd) VALUES (?, ?, ?);");

                if (!$stmt3) {
                    die("Échec de la préparation de la requête : " . mysqli_error($conn));
                }
                
                mysqli_stmt_bind_param($stmt3, "sss", $vdn, $vdm,$vdd);

                if (mysqli_stmt_execute($stmt3)) {
                    echo 'Utilisateur ajouté avec succès !';
                } else {
                    echo "Erreur : " . mysqli_error($conn);
                }
            } else {
                echo "Erreur : " . mysqli_error($conn);
            }
        } else {
            echo "Erreur : " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        header('Location: ../index.php?ajout=succès');
        exit();
    }
?>