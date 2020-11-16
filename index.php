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
    <link rel="stylesheet" href="magasin.css">
    <title>Produit</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Magasin</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="create.php">Ajouter un produit <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="nav justify-content-end">
      <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-success my-2 my-sm-0" type="logout" href="login.html">log out</button>
    </form>
</ul>
  </div>
</nav>
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
                <td><button type="button" class="btn btn-info" href="read.php?id=<?=$donnees['id'] ?>">Info</button> <button type="button" class="btn btn-success"href="update.php?id=<?=$donnees['id'] ?>">Modifier</button>  <button type="button" class="btn btn-danger"href="delete.php?id=<?= $donnees['id'] ?>">Supprimer</button></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</body>
</html>