<!-- header -->
<?php
// démarrage session
session_start();
$title = "Afficher jeux"; //title for current page
include('partials/_header.php'); //include header
include("helpers/functions.php"); // include functions
//include PDO pour la connexion à la BDD
require_once("helpers/pdo.php");
// debug_array($_GET)

// 1 - verifie qu'on récupère id existant du jeux
// on vérifie que l'id existe (c'est à dire pas vide) et qu'il est numérique
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    // 2 - Je nettoie mon id contre xss
    $id = clear_xss($_GET['id']);
    // 3 - Faire la query vers la BDD
    $sql = "SELECT * FROM jeux2 WHERE id=:id";
    // 4 - Préparation de la requête
    $query = $pdo->prepare($sql);
    // 5 - Sécuriser la requête contre injection sql
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // 6 - Execute
    $query->execute();
    // 7 - On stock tous dans une variable
    $game = $query->fetch();
    // debug_array($game);
    // $game=[];

    if (!$game) {
        $_SESSION["error"] = "Ce jeu est indisponible";
        header("Location: index.php");
    }
} else {
    $_SESSION["error"] = "URL INVALIDE";
    header("Location: index.php");
}
?>

<!-- main content -->
<div class="pt-16 flex gap-10 items-center">
    <div>
        <h1 class="text-green-500 text-4xl font-black"><?= $game["name"] ?></h1>
        <p class="text-2xl text center"><?= $game['genre'] ?></p>
        <p>Prix : <?= $game['price'] ?>€</p>
        <p>Note : <?= $game['note'] ?>/5</p>
        <p>PEGI : <?= $game['PEGI'] ?></p>
    </div>
    <div class="">
        <p class=""><?= $game['description'] ?></p>
    </div>
    <a href="delete.php?id=<?= $game['id'] ?>&name =<?= $game['name'] ?>" class="btn btn-error text-white">Supprimer le jeu</a>
</div>
<!-- end main content -->

<!-- footer -->
<?php include('partials/_footer.php') //include footer 
?>