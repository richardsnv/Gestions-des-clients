<?php
session_start();
if (isset($_POST['envoyer'])) {
    $CodCat = $_POST['CodCat'];
    $nom_categorie = $_POST['nom_categorie'];
    include 'database.php';
    $data = [$CodCat, $nom_categorie];
    $requests = $connexion->prepare("INSERT INTO categorie(CodCat, nom_categorie) VALUES(?, ?)");
    $result = $requests->execute($data);
    if ($result > 0) {
        header("Location: index.php");
        exit();
    } else {
        echo ("Erreur lors de l'insertion de la categorie en base de donnee");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <style>
    .categorie {
        border: 1px solid black;
        width: 25%;
        text-align: center;
        margin: 200px;
        margin-left: 700px;
        border-radius: 10px;
        box-shadow: 1px 2px 5px;
        opacity: 1px;
    }
    </style>
    <body>
        <div class="categorie">
            <h1>Creation d'une categorie</h1>
            <form action="" method="post">

                <label for="">Code de la categories</label>
                <input type="text" name="CodCat" placeholder="Le code de la categories" id=""><br><br>
                <label for="">Nom de la categories</label>
                <input type="text" name="nom_categorie" placeholder="Le nom de la categories" id=""><br><br>
                <input type="submit" name="envoyer" value="Enregistrer" id="">
                <input type="reset" value="Annuler" id="">
                
            </form>
            <p>Retour a la page d'accueil<a href="index.php">Accueil</a></p>
        </div>
    </body>
</html>
