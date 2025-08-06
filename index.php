<?php
session_start();
$nom = isset($_SESSION['nom']) ? $_SESSION['nom'] : '';
$prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="width=50% ;"><marquee behavior="" direction="">Bienvenu <?php echo htmlspecialchars($prenom . ' ' . $nom); ?> !</marquee></h1>
    <div style="text-align: center; margin-top: 50px;">
        <a href="inscription.php">Inscription</a> |||
        <a href="pg_login.php">Connexion</a> |||
        <a href="categorie.php">Ajouter une catégorie</a>|||
        <a href="client.php">Ajouter un client</a>|||
        <a href="pg_consultation_client.php">Consulter les clients par catégorie</a>
    </div>
   
</body>
</html>