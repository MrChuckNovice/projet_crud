<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du produit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
    <h1>Détails du produit <?= $données['Nom du produit']?></h1>
    <p>ID:<?=$donnees['id']?></p>
    <p>Produit:<?=$donnees['Nom du produit']?></p>
    <p>Prix:<?=$donnees['Prix']?></p>
    <p>Categorie:<?=$donnees['Catégorie']?></p>
    <p><a href="update.php?id=<?=$donnees['id']?>">Modifier</a>  <a href="delete.php?id=<?=$donnees['id']?>">Supprimer</a>  </td>
</body>
</html>