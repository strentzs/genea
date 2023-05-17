<?php
    require_once 'connDB.php';

    $sql = "SELECT DISTINCT SUBSTRING(reference, 1, 2) AS prefix FROM user WHERE reference LIKE '11%' OR reference LIKE '12%';";
    $result = mysqli_query($conn, $sql);
    $prefixes11 = [];
    $prefixes12 = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $prefix = $row["prefix"];
            if (substr($prefix, 0, 2) === "11") {
                $prefixes11[] = $prefix;
            } elseif (substr($prefix, 0, 2) === "12") {
                $prefixes12[] = $prefix;
            }
        }
        if (!empty($prefixes11)) {
            echo '<option value="11">Lignée Paternelle</option>';
        }
        if (!empty($prefixes12)) {
            echo '<option value="12">Lignée Maternelle</option>';
        }
    } else {
        echo "Aucun utilisateur trouvé.";
    }
?>
