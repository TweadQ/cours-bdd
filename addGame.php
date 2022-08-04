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

//traitement du formulaire
//////////////////////////
// creation array error
$error = [];
$errorMessage = "<span class='text-red-500'>*Ce champ est obligatoire </span>";

//Variable Success
/////////////////
$success = false;

if(!empty($_POST["submited"])) {
    $nom = clear_xss($_POST['name']);
    $prix = clear_xss($_POST['price']);
    $note = clear_xss($_POST['note']);
    // clear array genre with foreach
    $genre = $_POST["genre"];
    // je crée un nouveau tableau pour les elements nettoyer
    $genre_clear = [];
    foreach ($genre as $genres) {
        // je lave chaque element et je l'insere dans le nouveau tableau
        $genre_clear[] = clear_xss($genres);
    };
    // clear array plateforms with foreach
    $plateforms = $_POST["plateforms"];
    // je crée un nouveau tableau pour les elements nettoyer
    $plateforms_clear = [];
    foreach ($plateforms as $plateform) {
        // je lave chaque element et je l'insere dans le nouveau tableau
        $plateforms_clear[] = clear_xss($plateform);
    };
    
    $pegi = clear_xss($_POST["pegi"]);

    // 3- validation de chaque input
    ////////////////////////////////
    // name
    if (!empty($nom)) {
        if (
            strlen($nom) <= 2
        ) {
            $error["nom"] = "<span class=text-red-500>*3 caractères minimum</span>";
        } elseif (strlen($nom) > 100) {
            $error["nom"] = "<span class=text-red-500>*100 caractères maximum</span>";
        }
    } else {
        $error["nom"] = $errorMessage;
    }
    debug_array($_POST);
}

?>

<section class="px-20">
    <h1 class="text-green-500 text-4xl font-black text-center">Ajouter un jeu</h1>
    <form action="" method="POST" class="pt-12">
        <!-- input for name -->
        <div class="mb-3">
            <label for="name" class="font-bold text-blue-400">Name : </label>
            <input type="text" placeholder="Type here" name="name" class="input input-bordered w-full max-w-xs block" />
        </div>
        <!-- input for price -->
        <div class="mb-3">
            <label for="price" class="font-bold text-blue-400">Price : </label>
            <input type="number" step="0.01" placeholder="Type here" name="price" class="input input-bordered w-full max-w-xs block" />
        </div>
        <!-- input for genre -->
        <?php
        $genreArray = [
            ["name" => "Aventure"],
            ["name" => "Course"],
            ["name" => "Fps"],
            ["name" => "Rpg"]
        ]
        ?>
        <p class="font-bold text-blue-400">Genre :</p>
        <div class="mb-3 flex space-x-6">
            <?php foreach ($genreArray as $genre) : ?>
                <div class="flex item-center space-x-3">
                    <label for="genre"><?= $genre["name"] ?></label>
                    <input type="checkbox" name="genre[]" class="checkbox" value="<?= $genre["name"] ?>" />
                </div>
            <?php endforeach ?>
        </div>
        <!-- input for note -->
        <div class="mb-3">
            <label for="note" class="font-bold text-blue-400">Note : </label>
            <input type="number" step="0.1" placeholder="Type here" name="note" class="input input-bordered w-full max-w-xs block" />
        </div>
        <!-- input for plateforms -->
        <?php
        $plateformsArray = [
            ["name" => "Switch"],
            ["name" => "Xbox"],
            ["name" => "PS4"],
            ["name" => "PS5"],
            ["name" => "PC"]
        ]
        ?>
        <p class="font-bold text-blue-400">Plateforms :</p>
        <div class="mb-3 flex space-x-6">
            <?php foreach ($plateformsArray as $plateforms) : ?>
                <div class="flex item-center space-x-3">
                    <label for="plateforms"><?= $plateforms["name"] ?></label>
                    <input type="checkbox" name="plateforms[]" class="checkbox" value="<?= $plateforms["name"] ?>" />
                </div>
            <?php endforeach ?>
        </div>
        <!-- input for description -->
        <div class="mb-3 flex flex-col">
            <label for="description" class="font-bold text-blue-400">Description : </label>
            <textarea name="description" class="textarea textarea-bordered w-full max-w-xs" placeholder="Type here"></textarea>
        </div>
        <!-- select for pegi -->
        <?php
        $pegiArray = [
            ["name" => 3],
            ["name" => 7],
            ["name" => 12],
            ["name" => 16],
            ["name" => 18]
        ]
        ?>
        <div>
            <select class="select select-bordered w-full max-w-xs" name="pegi">
                <option disabled selected>PEGI</option>
                <?php foreach ($pegiArray as $pegi) : ?>
                    <option value="<?= $pegi["name"] ?>"><?= $pegi["name"] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <!-- submit btn -->
        <div class="mt-4">
            <input type="submit" name="submited" value="Ajouter" class="btn bg-blue-500">
        </div>
    </form>
</section>

<!-- footer -->
<?php include('partials/_footer.php') //include footer 
?>