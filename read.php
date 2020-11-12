<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
</head>
<body>
    <h1>Détails du produit <?= $données['Nom du produit']?></h1>
    <p>ID:<?=$donnees['id']?></p>
    <p>Produit:<?=$donnees['Nom du produit']?></p>
    <p>Prix:<?=$donnees['Prix']?></p>
    <p>Categorie:<?=$donnees['Catégorie']?></p>
    <p><a href="update.php?id=<?=$donnees['id']?>">Modifier</a>  <a href="delete.php?id=<?=$donnees['id']?>">Supprimer</a>  </td>
</body>
</html>