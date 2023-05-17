# GENEA : Note d'intention

## Contexte
Etant un fervent amateur d'histoire, et généalogiste dans mon temps libre, je m'étais lancé dans cette épopée que de retracer mes origines. Je me suis rapidement posé des interrogations quant à la possibilité de coder soi-même son arbre.

## Utilisation
Cet arbre a été conçu pour être utilisé dans une base de données, et par conséquent, est 100% personnalisable. Il a été conçu pour être développé localement, et nécessiterait donc des aménagements afin d'être réutilisé à plus grande échelle.

### Stockage de données
Une première table "user" vient prendre une première partie des informations essentielles pour composer cet arbre (prénom, nom, date de naissance/mariage/décès, prénom et nom du partenaire, référence et parenté). Le nom complet du partenaire sert à créer une filiation direct dans la base, auquel cas changement aurait lieu. La référence est une valeur purement arbitraire que j'ai décidé d'ajouter, pour pouvoir automatiser la recherche de la parenté. Les hommes sont dotés du code 1, et les femmes du code 2. Ainsi, si je cherche ma grand-mère paternelle, son code référence sera 112. Par ce système, il est plus simple de remonter son arbre et de chercher quelqu'un de précis avec un algorithme.

### Fonctions pratiques
L'arbre est pourvu d'un système d'ajout, de modification et de suppression utilisateur.

### Système de sélection intelligent
J'ai décidé d'ajouter plusieurs systèmes de sélection d'individus, afin de rendre la recherche plus personnalisée. Parmi eux, on retrouve le système d'individu unique, l'affichage de tous les individus de l'arbre, mais également 3 autres systèmes de filtre : le filtre par patronyme (possibilité de rechercher tous les individus d'un même nom de famille), par parenté (possibilité de rechercher tous les individus étant vos grands-parents, ou tous ceux étant vos bisaïeux par exemple) et par lignée (possibilité de rechercher tous les individus de votre lignée maternelle ou paternelle).
