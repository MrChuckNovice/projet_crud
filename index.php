<?php
//tu met ta connection a ta base de données exemple(require_once('connection.php')//
//t'ecris ta requete ($** = 'SELECT*FROM 'ta table')//
// tu prépare ta requete ($query=$pdo->prepare($**);)//
// t'execute ta requete ($query->execute())//
// tu stock le résultat dans un tableau ($result=$query->fetchALL(PDO::FETCH_ASSOC);//
// et la fermeture (require_once('close.php'))
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<table>
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
    </thead>
    <tbody>
        <?php
        foreach($reponse as $donnees){
        ?>
            <tr>
                <td><?=$donnees['id']?></td>
                <td><?=$donnees['lieux d_achat']?></td>
                <td><?=$donnees['Nom du produit']?></td>
                <td><?=$donnees['Référence du produit']?></td>
                <td><?=$donnees['Catégorie']?></td>
                <td><?=$donnees['Date d_achat']?></td>
                <td><?=$donnees['Date de fin de garantie']?></td>
                <td><?=$donnees['Prix']?></td>
                <td><?=$donnees['conseils d_entretiens du produit']?></td>
                <td><?=$donnees['Photo du tiket d_achat']?></td>
                <td><?=$donnees['Manuel d_utilisation']?></td>
                <td><a href="read.php?id=<?=$donnees['id']?>">Voir</a> <a href="update.php?id=<?=$donnees['id']?>">Modifier</a>  <a href="delete.php?id=<?=$donnees['id']?>">Supprimer</a>  </td>

            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<a href="create.php">Ajouter</a>
</body>
</html>