<?php
session_start();
include 'database.php';
$categories = $connexion->query("SELECT CodCat, nom_categorie FROM categorie")->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['rechercher'])) {
    $categorie = $_POST['CodCat'];
    $query = $connexion->prepare("SELECT * FROM client WHERE CodCat = ?");
    $query->execute([$categorie]);
    $clients = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    $clients = [];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consultation des clients par categorie</title>
    </head>
    <body>
        <div style="text-align: end;">

            <h1>RECHERCHE DES CLIENTS D'UNE CATEGORIE</h1>
            <form action="" method="post">
                <label for="">Categorie :</label>
                <select name="CodCat" id="">

                    <option value="">--Sélectionner une catégorie--</option>
                    <?php
                    foreach ($categories as $category) {
                        echo '<option value="' . htmlspecialchars($category['CodCat']) . '">' . htmlspecialchars($category['nom_categorie']) . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" name="rechercher" value="Rechercher">
            </form><br><br>
        </div>
        <table border="1" style="width: 50%; text-align: center;">
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Raison Sociale</th>
                    <th>Telephone</th>
                    <th>Chiffre d'affaire</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Les résultats de la recherche seront affichés ici -->
                <p>Listes des clients par categories</p>
                <?php if (!empty($clients)): ?>
                    <?php foreach ($clients as $client): ?>
                        <tr>
                            <td>
                                <?php echo htmlspecialchars($client['Reference']); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($client['RaisonSociale']); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($client['Telephone']); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($client['ChiffreAffaire']); ?>
                            </td>
                            <td>
                                <a href="modifier_client.php?CodCli=<?php echo $client['Reference']; ?>">
                                    Modifier</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Aucun client trouvé pour cette catégorie.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>


    </body>
</html>

