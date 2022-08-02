<?php
// démarrage session
session_start();
include("helpers/functions.php"); // include functions
// 1 - Connexion à ma BDD 
//include PDO pour la connexion à la BDD
require_once("helpers/pdo.php");

// 2 - Récupère l'id dans l'url et je nettoie
$id = clear_xss($_GET['id']);

// 3 - Requête vers BDD
$sql = "DELETE FROM jeux2 WHERE id=?";

// 4 - prepare ma requête
$query = $pdo->prepare($sql);

// 5 - On exécute la requête
$query -> execute([$id]);

// 6 - Redirection
$_SESSION["success"] = "le jeu est bien supprimé";
header("location:index.php");
