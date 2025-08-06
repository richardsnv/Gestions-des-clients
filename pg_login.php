<?php
session_start();
$message = '';
if (isset($_POST['Connexion'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    include 'database.php';

    // Vérifier que les champs ne sont pas vides
    // echo( $email);
    if ($email && $password) {
        $req = $connexion->prepare("SELECT * FROM inscription WHERE email = ?");
        $req->execute([$email]);
        $user = $req->fetch(PDO::FETCH_ASSOC);
        // var_dump($user['password']);
        // var_dump(password_verify($password, $user['password']));
        // exit;
        //var_dump($user, $password, $user ? $user['password'] : null);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            header("Location: index.php");
            exit();
        } else {
            $message = "<span style='color:red;'>login ou mot de passe incorrect.</span>";
        }
    } else {
        $message = "<span style='color:red;'>Veuillez remplir tous les champs.</span>";
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
    .connexion {
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
    <div class="connexion">
        <h1>Connexion</h1>
        <?php if ($message)
            echo $message; ?>
        <form action="" method="POST">

            <label for="">Login :</label>
            <input type="email" name="email" placeholder=" votrer votre login" id=""><br><br>
            <label for="">Mot de passe :</label>
            <input type="password" placeholder=" votre mot de passe" name="password" id=""><br><br>
            <input type="submit" name="Connexion" value="Connexion" id="">
        </form>
        <p>Vous n'aviez pas encore un compte ?? <a href="inscription.php">S'inscrire</a></p><br>
        <p>Retour a la page d'accueil
            <a href="index.php">Accueil</a>
        </p>
    </div>

</body>

</html>