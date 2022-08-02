<!-- header -->
<?php
// démarrer session
session_start();
$title = "Accueil"; //title for current page
include('partials/_header.php'); //include header
include("helpers/functions.php"); // include functions
//include PDO pour la connexion à la BDD
require_once("helpers/pdo.php");


// 1 - Requête pour récupérer mes jeux
$sql = "SELECT * FROM jeux2";
// 2 - Prépare la requête (préformatter une requête)
$query = $pdo->prepare($sql);
// 3 - Execute ma requête
$query->execute();
// 4 - On stock le résultat dans une variable
$games = $query->fetchAll();
// debug_array($games);


?>

<!-- main content -->
<main>
    <div class="pt-16 wrap_content">
        <div class="wrap_content-head text-center">
            <h1 class="text-blue-500 text-5xl uppercase font-black">App Game</h1>
            <p class="">L'app qui répertorie vos jeux</p>
        </div>
        <div class="bg-red-400 text-white text-center">
            <?php
            if ($_SESSION["error"]) { ?>
                <div class="bg-red-400 text-white text-center">
                    <?= $_SESSION["error"] ?>
                </div>
            <?php } elseif ($_SESSION["success"]) { ?>
                <div class="bg-red-400 text-white text-center">
                <?= $_SESSION["success"] ?>
                </div>
            <?php }
            // je vide ma variable $_session["error"] pour qu'il n'affiche pas de message en creant un array vide
            $_SESSION["error"] = [];
            $_SESSION["success"] = [];
            ?>
        </div>
        <!-- Table -->
        <div class="overflow-x-auto pt-20">
            <table class="table w-full">
                <!-- head -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Genre</th>
                        <th>Plateform</th>
                        <th>Price</th>
                        <th>Pegi</th>
                        <th>Voir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($games) == 0) {
                        echo "<tr><td>Pas de jeux disponible actuellement</tr></td>";
                    } else { ?>
                        <?php foreach ($games as $game) : ?>
                            <tr>
                                <th><?= $game['id'] ?></th>
                                <td><?= $game['name'] ?></td>
                                <td><?= $game['genre'] ?></td>
                                <td><?= $game['plateforms'] ?></td>
                                <td><?= $game['price'] ?></td>
                                <td><?= $game['PEGI'] ?></td>
                                <td>
                                    <a href="show.php?id=<?= $game["id"] ?>&name=<?= $game["name"] ?>">
                                        <img src="img/loupe.png" alt="" class="w-6">
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php } ?>
                    <!-- row 1 -->
                    <!-- <tr>
                        <th>1</th>
                        <td>Mario</td>
                        <td>Plateforme</td>
                        <td>Switch</td>
                        <td>39.99</td>
                        <td>3</td>
                        <td>
                            <a href="show.php">
                                <img src="img/loupe.png" alt="" class="w-6">
                            </a>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</main>
<!-- end main content -->

<!-- footer -->
<?php include('partials/_footer.php') //include footer 
?>