<?php
session_start();
if (isset($_POST['envoyer'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $sexe = $_POST['sexe'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwords = password_hash($password, PASSWORD_DEFAULT);
    $data = [$nom, $prenom, $telephone, $sexe,$email, $passwords];
    include 'database.php';
    $requests= $connexion->prepare("INSERT INTO inscription(nom,prenom,telephone,sexe,email,password) VALUES(?,?,?,?,?,?)");
    $reslut=$requests->execute($data);
    if($reslut >0){
        $_SESSION['nom'] = $nom;        // Stocke le nom
        $_SESSION['prenom'] = $prenom;  // Stocke le prénom
        header("Location:pg_login.php");
        exit();

    }else{
        echo ("Erreur lors de l'inscription en base de donnee");
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
    .inscription {
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
    <div class="inscription">
        <h1>Inscription</h1>
        <form action="" method="post">

            <label for="">Nom :</label>
            <input type="text" name="nom" placeholder=" votre nom" required id=""><br><br>
            <label for="">Prenom :</label>
            <input type="text" name="prenom" placeholder=" votre prenom" required id=""><br><br>
            <label for="">Telephone :</label>
            <input type="tel" name="telephone" id=""><br><br>
            <label for="">Sexe</label><br>
            <input type="radio" name="sexe" value="masculin" id="">
            <label for="">Masculin</label>
            <input type="radio" name="sexe" value="feminin" id="">
            <label for="">Feminin</label><br><br>
            <label for="">Email :</label>
            <input type="email" name="email" placeholder=" votre email" required id=""><br><br>
            <label for="">Mot de passe :</label>
            <input type="password" placeholder=" votre mot de passe" required name="password" id=""><br><br>
            <input type="submit" name="envoyer" value="inscription" id="">
        </form>
        <p>Avez-vous deja un compte ?? <a href="pg_login.php">Se connecter</a></p><br>
        <p>Retour a la page d'accueil
                <a href="index.php">Accueil</a>
            </p>
    </div>

</body>

</html>