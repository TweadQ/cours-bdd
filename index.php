<!-- header -->
<?php
$title = "Accueil"; //title for current page
include('partials/_header.php'); //include header
?>

<!-- main content -->
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
                    <td><img src="img/loupe.png" alt="" class="w-6"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- end main content -->

<!-- footer -->
<?php include('partials/_footer.php') //include footer 
?>