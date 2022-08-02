<!-- header -->
<?php
$title = "Accueil"; //title for current page
include('partials/_header.php'); //include header
//include PDO pour la connexion à la BDD
require_once("helpers/pdo.php")
?>

<!-- main content -->
<main>
    <div class="pt-16 wrap_content">
        <div class="wrap_content-head text-center">
            <h1 class="text-blue-500 text-5xl uppercase font-black">App Game</h1>
            <p class="">L'app qui répertorie vos jeux</p>
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
                    <!-- row 1 -->
                    <tr>
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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
<!-- end main content -->

<!-- footer -->
<?php include('partials/_footer.php') //include footer 
?>