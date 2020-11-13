<?php
// On démarre une session
session_start();

// On inclut la connexion à la base
require_once('connect.php');

$sql = 'SELECT * FROM `ps5`';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Produit</title>
</head>
<body>
<main class="container">
        <div class="row">
            <section class="col-12">
            <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                                '. $_SESSION['erreur'].'
                            </div>';
                        $_SESSION['erreur'] = "";
                    }
                ?>
                <?php
                    if(!empty($_SESSION['message'])){
                        echo '<div class="alert alert-success" role="alert">
                                '. $_SESSION['message'].'
                            </div>';
                        $_SESSION['message'] = "";
                    }
                ?>
                <h1>Liste des produits</h1>
    <table class="table">
     <thead>
        <th>id</th>
        <th>lieux d_achat</th>
        <th>Nom du produit</th>
        <th>Référence du produit</th>
        <th>Catégorie</th>
        <th>Date d_achat</th>
        <th>Date de fin de garantie</th>
        <th>Prix</th>
        <th>conseils d_entretiens du produit</th>
        <th>Photo du tiket d_achat</th>
        <th>Manuel d_utilisation</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php
        foreach($result as $donnees){
        ?>
            <tr>
                <td><?=$donnees['id']?></td>
                <td><?=$donnees['lieux_d_achat']?></td>
                <td><?=$donnees['Nom_du_produit']?></td>
                <td><?=$donnees['Référence_du_produit']?></td>
                <td><?=$donnees['Catégorie']?></td>
                <td><?=$donnees['Date_d_achat']?></td>
                <td><?=$donnees['Date_de_fin_de_garantie']?></td>
                <td><?=$donnees['Prix']?></td>
                <td><?=$donnees['conseils_d_entretiens_du_produit']?></td>
                <td><?=$donnees['Photo_du_tiket_d_achat']?></td>
                <td><?=$donnees['Manuel_d_utilisation']?></td>
                <td><a href="read.php?id=<?=$donnees['id'] ?>">Voir</a> <a href="update.php?id=<?=$donnees['id'] ?>">Modifier</a>  <a href="delete.php?id=<?= $donnees['id'] ?>">Supprimer</a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<a href="create.php">Ajouter</a>
</body>
</html>