<?php
// On démarre une session
session_start();

if($_POST){
    if(isset($_POST['id']) && !empty($_POST['id'])
    && isset($_POST['lieux_d_achat']) && !empty($_POST['lieux_d_achat'])
    && isset($_POST['Nom_du_produit']) && !empty($_POST['Nom_du_produit'])
    && isset($_POST['Référence_du_produit']) && !empty($_POST['Référence_du_produit'])
    && isset($_POST['Catégorie']) && !empty($_POST['Catégorie'])
    && isset($_POST['Date_d_achat']) && !empty($_POST['Date_d_achat'])
    && isset($_POST['Date_de_fin_de_garantie']) && !empty($_POST['Date_de_fin_de_garantie'])
    && isset($_POST['Prix']) && !empty($_POST['Prix'])
    && isset($_POST['conseils_d_entretiens_du_produit']) && !empty($_POST['conseils_d_entretiens_du_produit'])
    && isset($_POST['Photo_du_tiket_d_achat']) && !empty($_POST['Photo_du_tiket_d_achat'])
    && isset($_POST['Manuel_d_utilisation']) && !empty($_POST['Manuel_d_utilisation'])){

        // On inclut la connexion à la base//
        require_once('connect.php');

        // On nettoie les données envoyées
        $id = strip_tags($_POST['id']);
        $lieux_d_achat = strip_tags($_POST['lieux_d_achat']);
        $Nom_du_produit = strip_tags($_POST['Nom_du_produit	']);
        $Référence_du_produit = strip_tags($_POST['Référence_du_produit']);
        $Catégorie = strip_tags($_POST['Catégorie']);
        $Date_d_achat = strip_tags($_POST['Date_d_achat']);
        $Date_de_fin_de_garantie = strip_tags($_POST['Date_de_fin_de_garantie']);
        $Prix = strip_tags($_POST['Prix']);
        $conseils_d_entretiens_du_produit = strip_tags($_POST['conseils_d_entretiens_du_produit']);
        $Photo_du_tiket_d_achat = strip_tags($_POST['Photo_du_tiket_d_achat']);
        $Manuel_d_utilisation = strip_tags($_POST['Manuel_d_utilisation']);


        $sql = 'UPDATE `ps5` SET `lieux_d_achat`=:lieux_d_achat, `Nom_du_produit`=:Nom_du_produit, `Référence_du_produit`=:Référence_du_produit, `Catégorie`=:Catégorie, `Date_d_achat`=:Date_d_achat, `Date_de_fin_de_garantie`=:Date_de_fin_de_garantie, `Prix`=:Prix, `conseils_d_entretiens_du_produit`=:conseils_d_entretiens_du_produit, `Photo_du_tiket_d_achat`=:Photo_du_tiket_d_achat, `Manuel_d_utilisation`=:Manuel_d_utilisation  WHERE `id`=:id;';

        $query = $db->prepare($sql);

        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':lieux_d_achat', $lieux_d_achat, PDO::PARAM_STR);
        $query->bindValue(':Nom_du_produit', $Nom_du_produit, PDO::PARAM_STR);
        $query->bindValue(':Référence_du_produit', $Référence_du_produit, PDO::PARAM_STR);
        $query->bindValue(':Catégorie', $Catégorie, PDO::PARAM_STR);
        $query->bindValue(':Date_d_achat', $Date_d_achat, PDO::PARAM_STR);
        $query->bindValue(':Date_de_fin_de_garantie', $Date_de_fin_de_garantie, PDO::PARAM_STR);
        $query->bindValue(':Prix', $Prix, PDO::PARAM_STR);
        $query->bindValue(':conseils_d_entretiens_du_produit', $conseils_d_entretiens_du_produit, PDO::PARAM_STR);
        $query->bindValue(':Photo_du_tiket_d_achat', $Photo_du_tiket_d_achat, PDO::PARAM_STR);
        $query->bindValue(':Manuel_d_utilisation', $Manuel_d_utilisation, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['message'] = "Produit modifié";
        require_once('close.php');

        header('Location:index.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connect.php');

    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);

    $sql = 'SELECT * FROM `ps5` WHERE `id` = :id;';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le produit
    $produit = $query->fetch();

    // On vérifie si le produit existe
    if(!$produit){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: index.php');
    }
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="magasin.css">
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
        <a class="nav-link" href="index.php">menu <span class="sr-only">(current)</span></a>
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
<h1>Modifier un produit</h1>
<form method="post">
    <p>
        <label for="Nom_du_produit">Produit</label>
        <input type="text" name="Nom_du_produit" id="Nom_du_produit" value="<?= $reponse['Nom_du_produit'] ?>">
    </p>
    <p>
        <label for="Prix">Prix</label>
        <input type="text" name="Prix" id="Prix" value="<?= $reponse['Prix'] ?>">
    </p>
    <p>
        <label for="lieux_d_achat">lieux d'achat</label>
        <input type="text" name="lieux_d_achat" id="lieux_d_achat" value="<?= $reponse['lieux_d_achat'] ?>">
    </p>
    <p>
        <label for="Date_d_achat">Date d'achat</label>
        <input type="date" name="Date_d_achat" id="Date_d_achat" value="<?= $reponse['Date_d_achat'] ?>">
    </p>
    <p>
        <label for="Date_de_fin_de_garantie">Date de fin de garantie</label>
        <input type="date" name="Date_de_fin_de_garantie" id="Date_de_fin_de_garantie" value="<?= $reponse['Date_de_fin_de_garantie'] ?>">
    </p>
    <p>
        <label for="Référence_du_produit">Référence du produit</label>
        <input type="text" name="Référence_du_produit" id="Référence_du_produit" value="<?= $reponse['Référence_du_produit'] ?>">
    </p>
    <p>
        <label for="conseils_d_entretiens_du_produit">conseils d'entretiens du produit</label>
        <input type="text" name="conseils_d_entretiens_du_produit" id="conseils_d_entretiens_du_produit" value="<?= $reponse['conseils_d_entretiens_du_produit'] ?>">
    </p>
    <p>
        <label for="Catégorie">Catégorie</label>
        <input type="text" name="Catégorie" id="Catégorie" value="<?= $reponse['Catégorie'] ?>">
    </p>
    <p>
        <label for="Manuel_d_utilisation">Manuel dutilisation</label>
        <input type="text" name="Manuel_d_utilisation" id="Manuel_d_utilisation" value="<?= $reponse['Manuel_d_utilisation'] ?>">
    </p>
    <input type="hidden" name="id" value="<?= $reponse['id'] ?>">
    <button>Enregistrer</button>
</form>
</body>
</html>