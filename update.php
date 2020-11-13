<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit</title>

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
<h1>Modifier un produit</h1>
<form method="post">
    <p>
        <label for="Nom du produit">Produit</label>
        <input type="text" name="Nom du produit" id="Nom du produit" value="<?= $reponse['Nom du produit'] ?>">
    </p>
    <p>
        <label for="Prix">Prix</label>
        <input type="text" name="Prix" id="Prix" value="<?= $reponse['Prix'] ?>">
    </p>
    <p>
        <label for="lieux d_achat">lieux d_achat</label>
        <input type="text" name="lieux d_achat" id="lieux d_achat" value="<?= $reponse['lieux d_achat'] ?>">
    </p>
    <p>
        <label for="Date d_achat">Date d_achat</label>
        <input type="date" name="Date d_achat" id="Date d_achat" value="<?= $reponse['Date d_achat'] ?>">
    </p>
    <p>
        <label for="Date de fin de garantie">Date de fin de garantie</label>
        <input type="date" name="Date de fin de garantie" id="Date de fin de garantie" value="<?= $reponse['Date de fin de garantie'] ?>">
    </p>
    <p>
        <label for="Référence du produit">Référence du produit</label>
        <input type="text" name="Référence du produit" id="Référence du produit" value="<?= $reponse['Référence du produit'] ?>">
    </p>
    <p>
        <label for="conseils d_entretiens du produit">Prix</label>
        <input type="text" name="conseils d_entretiens du produit" id="conseils d_entretiens du produit" value="<?= $reponse['conseils d_entretiens du produit'] ?>">
    </p>
    <p>
        <label for="Catégorie">Catégorie</label>
        <input type="text" name="Catégorie" id="Catégorie" value="<?= $reponse['Catégorie'] ?>">
    </p>
    <p>
        <label for="Manuel d_utilisation">Manuel d_utilisation</label>
        <input type="text" name="Manuel d_utilisation" id="Manuel d_utilisation" value="<?= $reponse['Manuel d_utilisation'] ?>">
    </p>
    <input type="hidden" name="id" value="<?= $reponse['id'] ?>">
    <button>Enregistrer</button>
</form>
</body>
</html>