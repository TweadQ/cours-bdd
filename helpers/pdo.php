<?php
// je créer mes variables
$serveur = "localhost";
$dbname = "app_game";
$login = "root";
$password = ""; //or "root"

try {
    $pdo = new PDO("mysql:host=$serveur;dbname=$dbname", $login, $password, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        // Ne pas récupérer les éléments en double
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        // Pour afficher les erreurs
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
    //affiche message ok connexion
    echo "Connexion établie";

} catch (PDOException $e) { // $e = $erreur
    echo "Erreur de connexion : ". $e->getMessage();
}
