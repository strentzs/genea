<?php 
    if (isset($_POST["submit"])) {
        if (isset($_POST["selectName"])) {
            //  Initialiser la variable de l'apprenant sélectionné
            $selectedName = $_POST["selectName"];

            if ($selectedName === "all") {
                $sql = "SELECT id_user, prenom, nom, ddn, ddm, ddd, prenom_partenaire, nom_partenaire, reference, parente FROM user;";
                $stmt = mysqli_prepare($conn, $sql);
                // mysqli_stmt_bind_param($stmt, "s", $selectedName);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'.$row["id_user"].'</td>';
                        echo '<td data-sort="'.$row["prenom"].'">'.$row["prenom"].'</td>';
                        echo '<td>'.$row["nom"].'</td>';
                        if ($row["ddn"] === null) {
                            echo '<td><span class="notfound">Donnée indisponible</span></td>';
                        } else {
                            echo '<td>'.$row["ddn"].'</td>';
                        }
                        if ($row["ddm"] === null) {
                            echo '<td><span class="notfound">Donnée indisponible</span></td>';
                        } else {
                            echo '<td>'.$row["ddm"].'</td>';
                        }
                        if ($row["ddd"] === null) {
                            echo '<td><span class="notfound">Donnée indisponible</span></td>';
                        } else {
                            echo '<td>'.$row["ddd"].'</td>';
                        }
                        if ($row["prenom_partenaire"] === null) {
                            echo '<td><span class="notfound">Donnée indisponible</span></td>';
                        } else {
                            echo '<td>'.$row["prenom_partenaire"].'</td>';
                        }
                        if ($row["nom_partenaire"] === null) {
                            echo '<td><span class="notfound">Donnée indisponible</span></td>';
                        } else {
                            echo '<td>'.$row["nom_partenaire"].'</td>';
                        }
                        echo '<td>'.$row["reference"].'</td>';
                        if ($row["parente"] === null) {
                            echo '<td><span class="notfound">Donnée indisponible</span></td>';
                        } else {
                            echo '<td>'.$row["parente"].'</td>';
                        }
                        echo '</tr>';
                    } 
                }
            } else {
                    // Récupérer l'id_user de l'apprenant dans la table user
                $stmt = $conn->prepare("SELECT id_user, prenom, nom, ddn, ddm, ddd, prenom_partenaire, nom_partenaire, reference, parente FROM user WHERE username = ?;");
                $stmt->bind_param("s", $selectedName);
                $stmt->execute();
                $stmt->store_result(); 
                $stmt->bind_result($id_user, $prenom, $nom, $ddn, $ddm, $ddd, $prenom_partenaire, $nom_partenaire, $reference, $parente);
                $stmt->fetch();
                $stmt->free_result(); 

                echo '<tr>';
                echo '<td>'.$id_user.'</td>';
                echo '<td data-sort="'.$prenom.'">'.$prenom.'</td>';
                echo '<td>'.$nom.'</td>';
                if ($ddn === null) {
                    echo '<td><span class="notfound">Donnée indisponible</span></td>';
                } else {
                    echo '<td>'.$ddn.'</td>';
                }
                if ($ddm === null) {
                    echo '<td><span class="notfound">Donnée indisponible</span></td>';
                } else {
                    echo '<td>'.$ddm.'</td>';
                }
                if ($ddd === null) {
                    echo '<td><span class="notfound">Donnée indisponible</span></td>';
                } else {
                    echo '<td>'.$ddd.'</td>';
                }
                if ($prenom_partenaire === null) {
                    echo '<td><span class="notfound">Donnée indisponible</span></td>';
                } else {
                    echo '<td>'.$prenom_partenaire.'</td>';
                }
                if ($nom_partenaire === null) {
                    echo '<td><span class="notfound">Donnée indisponible</span></td>';
                } else {
                    echo '<td>'.$nom_partenaire.'</td>';
                }
                echo '<td>'.$reference.'</td>';
                if ($parente === null) {
                    echo '<td><span class="notfound">Donnée indisponible</span></td>';
                } else {
                    echo '<td>'.$parente.'</td>';
                }
                echo '</tr>';
            }

        } elseif (isset($_POST["selectFamilyName"])) {
            //  Initialiser la variable de l'apprenant sélectionné
            $selectedFamilyName = $_POST["selectFamilyName"];

            // Récupérer l'id_user de l'apprenant dans la table user
            $sql = "SELECT id_user, prenom, nom, ddn, ddm, ddd, prenom_partenaire, nom_partenaire, reference, parente FROM user WHERE nom = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $selectedFamilyName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>'.$row["id_user"].'</td>';
                    echo '<td data-sort="'.$row["prenom"].'">'.$row["prenom"].'</td>';
                    echo '<td>'.$row["nom"].'</td>';
                    if ($row["ddn"] === null) {
                        echo '<td><span class="notfound">Donnée indisponible</span></td>';
                    } else {
                        echo '<td>'.$row["ddn"].'</td>';
                    }
                    if ($row["ddm"] === null) {
                        echo '<td><span class="notfound">Donnée indisponible</span></td>';
                    } else {
                        echo '<td>'.$row["ddm"].'</td>';
                    }
                    if ($row["ddd"] === null) {
                        echo '<td><span class="notfound">Donnée indisponible</span></td>';
                    } else {
                        echo '<td>'.$row["ddd"].'</td>';
                    }
                    if ($row["prenom_partenaire"] === null) {
                        echo '<td><span class="notfound">Donnée indisponible</span></td>';
                    } else {
                        echo '<td>'.$row["prenom_partenaire"].'</td>';
                    }
                    if ($row["nom_partenaire"] === null) {
                        echo '<td><span class="notfound">Donnée indisponible</span></td>';
                    } else {
                        echo '<td>'.$row["nom_partenaire"].'</td>';
                    }
                    echo '<td>'.$row["reference"].'</td>';
                    if ($row["parente"] === null) {
                        echo '<td><span class="notfound">Donnée indisponible</span></td>';
                    } else {
                        echo '<td>'.$row["parente"].'</td>';
                    }
                    echo '</tr>';
                } 
            } 
        }   elseif (isset($_POST["selectParente"])) {
                //  Initialiser la variable de l'apprenant sélectionné
            $selectedName = $_POST["selectParente"];

            // Récupérer l'id_user de l'apprenant dans la table user
            $sql = "SELECT id_user, prenom, nom, ddn, ddm, ddd, prenom_partenaire, nom_partenaire, reference, parente FROM user WHERE parente = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $selectedName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>'.$row["id_user"].'</td>';
                    echo '<td data-sort="'.$row["prenom"].'">'.$row["prenom"].'</td>';
                    echo '<td>'.$row["nom"].'</td>';
                    if ($row["ddn"] === null) {
                        echo '<td><span class="notfound">Donnée indisponible</span></td>';
                    } else {
                        echo '<td>'.$row["ddn"].'</td>';
                    }
                    if ($row["ddm"] === null) {
                        echo '<td><span class="notfound">Donnée indisponible</span></td>';
                    } else {
                        echo '<td>'.$row["ddm"].'</td>';
                    }
                    if ($row["ddd"] === null) {
                        echo '<td><span class="notfound">Donnée indisponible</span></td>';
                    } else {
                        echo '<td>'.$row["ddd"].'</td>';
                    }
                    if ($row["prenom_partenaire"] === null) {
                        echo '<td><span class="notfound">Donnée indisponible</span></td>';
                    } else {
                        echo '<td>'.$row["prenom_partenaire"].'</td>';
                    }
                    if ($row["nom_partenaire"] === null) {
                        echo '<td><span class="notfound">Donnée indisponible</span></td>';
                    } else {
                        echo '<td>'.$row["nom_partenaire"].'</td>';
                    }
                    echo '<td>'.$row["reference"].'</td>';
                    if ($row["parente"] === null) {
                        echo '<td><span class="notfound">Donnée indisponible</span></td>';
                    } else {
                        echo '<td>'.$row["parente"].'</td>';
                    }
                    echo '</tr>';
                }
            }
        }   elseif (isset($_POST["selectLignee"])) {
                // Initialiser la variable de l'apprenant sélectionné
                $selectedLignee = $_POST["selectLignee"];
            
                // Récupérer les utilisateurs de la même lignée dans la table user
                $sql = "SELECT id_user, prenom, nom, ddn, ddm, ddd, prenom_partenaire, nom_partenaire, reference, parente FROM user WHERE reference LIKE '$selectedLignee%'";
                $result = mysqli_query($conn, $sql);
            
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'.$row["id_user"].'</td>';
                        echo '<td data-sort="'.$row["prenom"].'">'.$row["prenom"].'</td>';
                        echo '<td>'.$row["nom"].'</td>';
                        if ($row["ddn"] === null) {
                            echo '<td><span class="notfound">Donnée indisponible</span></td>';
                        } else {
                            echo '<td>'.$row["ddn"].'</td>';
                        }
                        if ($row["ddm"] === null) {
                            echo '<td><span class="notfound">Donnée indisponible</span></td>';
                        } else {
                            echo '<td>'.$row["ddm"].'</td>';
                        }
                        if ($row["ddd"] === null) {
                            echo '<td><span class="notfound">Donnée indisponible</span></td>';
                        } else {
                            echo '<td>'.$row["ddd"].'</td>';
                        }
                        if ($row["prenom_partenaire"] === null) {
                            echo '<td><span class="notfound">Donnée indisponible</span></td>';
                        } else {
                            echo '<td>'.$row["prenom_partenaire"].'</td>';
                        }
                        if ($row["nom_partenaire"] === null) {
                            echo '<td><span class="notfound">Donnée indisponible</span></td>';
                        } else {
                            echo '<td>'.$row["nom_partenaire"].'</td>';
                        }
                        echo '<td>'.$row["reference"].'</td>';
                        if ($row["parente"] === null) {
                            echo '<td><span class="notfound">Donnée indisponible</span></td>';
                        } else {
                            echo '<td>'.$row["parente"].'</td>';
                        }
                        echo '</tr>';
                    }
                }
                
            // Fermer la connexion
            mysqli_close($conn);
            }
        } 
?>