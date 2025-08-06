<?php
include 'database.php';
session_start();
if (isset($_POST['envoyer'])) {
    $RaisonSociale = $_POST['RaisonSociale'];
    $Telephone = $_POST['Telephone'];
    $ChiffreAffaire = $_POST['ChiffreAffaire'];
    $CodCat = $_POST['CodCat'];
    $data = [$RaisonSociale, $Telephone, $ChiffreAffaire, $CodCat];
    $requests = $connexion->prepare("INSERT INTO client(RaisonSociale, Telephone, ChiffreAffaire, CodCat) VALUES(?, ?, ?, ?)");
    $requests->execute($data);
}
//request pour recupperer les catégories
$categories = $connexion->query("SELECT CodCat, nom_categorie FROM categorie")->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <style>
        .client {
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
        <div class="client">

        <h1>Ajouter un client</h1>
        <form action="" method="post">
            <label for="">La raison sociale :</label>
            <input type="text" name="RaisonSociale" placeholder="La raison sociale" id=""><br><br>
            <label for="">Le Telephone</label>
            <input type="text" name="Telephone" placeholder="Le Telephone" id=""><br><br>
            <label for="">Le Chiffre d'affaire</label>
            <input type="text" name="ChiffreAffaire" placeholder="Le Chiffre d'affaire" id=""><br><br>
            <label for="">La catégorie</label>
            <select name="CodCat" id="">
                <option value="">Sélectionner une catégorie</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo htmlspecialchars($category['CodCat']); ?>">
                        <?php echo htmlspecialchars($category['nom_categorie']); ?>
                    </option>
                <?php endforeach; ?>

            </select>
            <br><br>
            <input type="submit" name="envoyer" value="Enregistrer" id="">
            <input type="reset" value="Annuler" id=""><br><br>
            <p>Retour a la page d'accueil
                <a href="index.php">Accueil</a>
            </p>
        </form>
        </div>

    </body>
</html>

