<?php
$host = "localhost";
$dbname = "GestionClients";
$username = "richard";
$password = "sounouvou";
try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo ("connexion reussie");
} catch (PDOException $e) {
    echo ("Erreur lors de la connexion avec la pase de donnee" . $e->getMessage());
}