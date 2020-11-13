<?php
// On démarre une session
session_start();

if($_POST){
    if(isset($_POST['lieux_d_achat']) && !empty($_POST['lieux_d_achat'])
    && isset($_POST['Nom_du_produit']) && !empty($_POST['Nom_du_produit'])
    && isset($_POST['Référence_du_produit']) && !empty($_POST['Référence_du_produit'])
    && isset($_POST['Catégorie']) && !empty($_POST['Catégorie'])
    && isset($_POST['Date_d_achat']) && !empty($_POST['Date_d_achat'])
    && isset($_POST['Date_de_fin_de_garantie']) && !empty($_POST['Date_de_fin_de_garantie'])
    && isset($_POST['Prix']) && !empty($_POST['Prix'])
    && isset($_POST['conseils_d_entretiens_du_produit']) && !empty($_POST['conseils_d_entretiens_du_produit'])
    && isset($_POST['Photo_du_tiket_d_achat']) && !empty($_POST['Photo_du_tiket_d_achat'])
    && isset($_POST['Manuel_d_utilisation']) && !empty($_POST['Manuel_d_utilisation'])){

        // On inclut la connexion à la base
        require_once('connect.php');

        // On nettoie les données envoyées
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


        $sql = 'INSERT INTO `ps5` (`lieux_d_achat`, `Nom_du_produit`, `Référence_du_produit`, `Catégorie`, `Date_d_achat`, `Date_de_fin_de_garantie`, `Prix`, `conseils_d_entretiens_du_produit`, `Photo_du_tiket_d_achat`, `Manuel_d_utilisation`) VALUES (:lieux_d_achat, :Nom_du_produit, :Référence_du_produit, :Catégorie, :Date_d_achat, :Date_de_fin_de_garantie, :Prix, :conseils_d_entretiens_du_produit, :Photo_du_tiket_d_achat, :Manuel_d_utilisation);';

        $query = $db->prepare($sql);

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

        $_SESSION['message'] = "Produit ajouté";
        require_once('close.php');

        header('Location: index.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                <h1>Ajouter un produit</h1>
<form method="post">
    <label for="Nom du produit">produit</label>
    <input type="text" name="Nom_du_produit" id="Nom_du_produit">
    <label for="lieux_d_achat">lieux d'achat</label>
    <input type="text" name="lieux_d_achat" id="lieux_d_achat">
    <label for="Prix">Prix</label>
    <input type="text" name="Prix" id="Prix">
    <label for="Catégorie">Catégorie</label>
    <input type="text" name="Catégorie" id="Catégorie">
    <label for="Date_d_achat">Date d'achat</label>
    <input type="date" name="Date_d_achat" id="Date_d_achat">
    <label for="Référence_du_produit">Référence du produit</label>
    <input type="text" name="Référence_du_produit" id="Référence_du_produit">
    <label for="Date_de_fin_de_garantie">Date de fin de garantie</label>
    <input type="date" name="Date_de_fin_de_garantie" id="Date_de_fin_de_garantie">
    <label for="conseils_d_entretiens_du_produit">conseils d'entretiens du produit</label>
    <input type="text" name="conseils_d_entretiens_du_produit" id="conseils_d_entretiens_du_produit">
    <label for="Manuel_d_utilisation">Manuel d'utilisation</label>
    <input type="text" name="Manuel_d_utilisation" id="Manuel_d_utilisation">
    <button> enregistrer</button>
</form>
</body>
</html>