<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="bank/logo_icon.png">
    <title>Ma Généalogie</title>
</head>

<body>
    <div class="container">
        <img src="bank/logo_icon.png">
        <h1>Mon Arbre Généalogique</h1>
        <div class="tools">
            <!-- Partie des outils -->
            <div class="functions">
                <!-- Boutons des fonctions utilisateurs -->

                <!-- Bouton "Ajouter un individu" -->
                <button id="openPopup" onclick="openPopup()">Ajouter un individu</button>

                <!-- Bouton "Modifier un individu" -->
                <button id="modifyPopup" onclick="openModifyPopup()">Modifier un individu</button>

                <!-- Bouton "Supprimer un individu" -->
                <button id="deletePopup" onclick="openDeletePopup()">Supprimer un individu</button>

                <!-- Popup "Ajouter un individu" -->
                <div class="addUser" id="addUserPopup">
                    <div class="content">
                        <h2>Ajouter un nouvel individu</h2>

                        <!-- Formulaire -->
                        <form action="traitement/addUser.inc.php" method="post">
                            <input type="text" name="prenom" id="prenom" placeholder="Prénom"> <br />
                            <input type="text" name="deux_prenom" id="deux_prenom" placeholder="Deuxième prénom"> <br />
                            <input type="text" name="trois_prenom" id="trois_prenom" placeholder="Troisième prénom"> <br />
                            <input type="text" name="nom" id="nom" placeholder="Nom"> <br />
                            <input type="text" name="ddn" id="ddn" placeholder="JJ/MM/AAAA"> <br />
                            <input type="text" name="vdn" id="vdn" placeholder="Ville de naissance"> <br />
                            <input type="text" name="ddm" id="ddm" placeholder="JJ/MM/AAAA"> <br />
                            <input type="text" name="vdm" id="vdm" placeholder="Ville de mariage"> <br />
                            <input type="text" name="ddd" id="ddd" placeholder="JJ/MM/AAAA"> <br />
                            <input type="text" name="vdd" id="vdd" placeholder="Ville de décès"> <br />
                            <input type="text" name="prenomPartenaire" id="prenomPartenaire" placeholder="Prénom du partenaire"> <br />
                            <input type="text" name="nomPartenaire" id="nomPartenaire" placeholder="Nom du partenaire"> <br />
                            <input type="text" name="reference" id="reference" placeholder="Référence"> <br />
                            <input type="text" name="parente" id="parente" placeholder="Lien de parenté"> <br />
                            <input type="submit" value="Créer" name="submit">
                        </form>

                        <!-- Bouton de fermeture de la popup -->
                        <button id="closePopup" onclick="closePopup()">Fermer</button>
                    </div>
                </div>

                <!-- Popup "Modifier un individu" -->
                <div class="addUser" id="modifyUserPopup">
                    <h2>Modifier un individu existant</h2>

                    <!-- Formulaire -->
                    <form action="traitement/modifyUser.inc.php" method="post">

                        <!-- Select pour sélectionner l'individu -->
                        <select name="selectName" id="selectName">
                            <option disabled selected>Quel individu souhaitais-vous modifier ?</option>
                            <?php
                                include('traitement/selectName.inc.php');
                            ?>
                        </select>

                        <!-- Select pour sélectionner la catégorie de modification -->
                        <select name="selectColumn" id="selectColumn">
                            <option disabled selected>Que souhaitez-vous modifier ?</option>
                            <option value="prenom">Prénom</option>
                            <option value="deuxieme_prenom">Deuxième prénom</option>
                            <option value="troisieme_prenom">Troisième prénom</option>
                            <option value="nom">Nom</option>
                            <option value="ddn">Date de naissance</option>
                            <option value="ddm">Date de mariage</option>
                            <option value="ddd">Date de décès</option>
                            <option value="prenom_partenaire">Prénom du partenaire</option>
                            <option value="nom_partenaire">Nom du partenaire</option>
                            <option value="reference">Référence</option>
                            <option value="parente">Lien de parenté</option>
                        </select> <br />

                        <!-- Input pour apporter la modification -->
                        <input type="text" name="modifyUser" id="modifyUser" placeholder="Votre modification"> <br />

                        <input type="submit" value="Modifier" name="submit">
                    </form>

                    <!-- Bouton de fermeture de la popup -->
                    <button id="closeModifyPopup" onclick="closeModifyPopup()">Fermer</button>
                </div>

                <!-- Popup pour "Supprimer un individu" -->
                <div class="addUser" id="deleteUserPopup">
                    <h2>Supprimer un individu existant</h2>


                    <!-- Formulaire -->
                    <form action="traitement/deleteUser.inc.php" method="post">

                        <!-- Select pour sélectionner l'individu -->
                        <select name="selectName" id="selectName">
                            <option disabled selected>Quel individu souhaitais-vous supprimer ?</option>
                            <?php
                                include('traitement/selectName.inc.php');
                            ?>
                        </select> <br />

                        <input type="submit" value="Supprimer" name="submit">
                    </form>

                    <!-- Bouton de fermeture de la popup -->
                    <button id="closeDeletePopup" onclick="closeDeletePopup()">Fermer</button>
                </div>
            </div>

            <form action="" method="post">

                <!-- Partie des filtres -->
                <div class="filters">

                    <!-- Select pour sélectionner l'individu en fonction de son nom -->
                    <select name="selectName" id="selectName">
                        <option disabled selected>Sélectionner par nom</option>
                        <option value="all">Tous les individus</option>
                        <?php
                            include('traitement/selectName.inc.php');
                        ?>
                    </select>

                    <!-- Select pour sélectionner l'individu en fonction de son patronyme -->
                    <select name="selectFamilyName" id="selectFamilyName">
                        <option disabled selected>Sélectionner par patronyme</option>
                        <?php
                            include('traitement/selectFamilyName.inc.php');
                        ?>
                    </select>

                    <!-- Select pour sélectionner l'individu en fonction de son code référence -->
                    <select name="selectParente" id="selectParente">
                        <option disabled selected>Sélectionner par lien de parenté</option>
                        <?php
                            include('traitement/selectParente.inc.php');
                        ?>
                    </select>

                    <!-- Select pour sélectionner l'individu en fonction de sa lignée -->
                    <select name="selectLignee" id="selectLignee">
                        <option disabled selected>Sélectionner par sa lignée</option>
                        <?php
                            include('traitement/selectLignee.inc.php');
                        ?>
                    </select>
                </div>

                <!-- Boutons de validation du formulaire -->
                <div class="validate">
                    <input type="submit" value="Lancer la requête" name="submit">
                    <!-- <input type="submit" value="Annuler la requête" name="submit"> -->
                </div>

                <!-- Bouton de nettoyage du tableau -->
                <!-- <div class="clean">
                    <input type="submit" value="Nettoyer le tableau" name="submit">
                </div> -->

                <!-- <div class="tri">
                    <button id="sortAlpha" onclick="sortAlpha()">Trier par ordre alphabétique</button>
                </div> -->
            </form>

            <button id="cleanTable" onclick="cleanTable()">Nettoyer le tableau</button>
        </div>

        <hr>

        <!-- Partie du tableau d'affichage -->
        <div class="table">
            <table name="table" id="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Prénom</td>
                        <td>Nom</td>
                        <td>Date de naissance</td>
                        <td>Date de mariage</td>
                        <td>Date de décès</td>
                        <td>Prénom du partenaire</td>
                        <td>Nom du partenaire</td>
                        <td>Référence</td>
                        <td>Parenté</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('traitement/displayTable.inc.php');
                    ?>
                </tbody>
            </table>
        </div>

    <script src="script/script.js"></script>
</body>

</html>