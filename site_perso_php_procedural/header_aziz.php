<?php
require_once("../include/init.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MW Radio Albums</title>

    <!-- link pour le favicon -->
    <link rel="icon" type="image/png" href="../logo.png" />

    <!-- link bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- link fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- link googlefonts -->
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

    <!-- mon css navigation interne-->
    <link rel="stylesheet" href="../css/style_interne.css">
</head>

<body id="accueil">

    <header id="haut">

        <nav class="navbar navbar-expand-lg navbar-light bg-light col-md-12">
            <!-- si je veux remettre une nav expand, ligne de code ci dessous + modifier le css -->
            <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->

            <!-- <a class="navbar-brand" href="../accueil.php">Menu</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <?php if (internauteEstConnecte()) : ?>

                        <li class="nav-item ">
                            <a class="nav-link" href="../index.php"><button class="btn btn-sm btn-outline-success home-button" type="button">Accueil MW Radio</button></a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="index_50_60.php"><button class="btn btn-sm btn-outline-success" type="button">50' 60' Albums</button></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index_70.php"><button class="btn btn-sm btn-outline-success" type="button">70' Albums</button></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index_80.php"><button class="btn btn-sm btn-outline-success" type="button">80' Albums</button></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index_90.php"><button class="btn btn-sm btn-outline-success" type="button">90' Albums</button></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index_00.php"><button class="btn btn-sm btn-outline-success" type="button">00' Albums</button></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index_10.php"><button class="btn btn-sm btn-outline-success" type="button">10' Albums</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profil.php"><button class="btn btn-sm btn-outline-success" type="button"><i class="fas fa-music"></i> <strong><?= $_SESSION['membre']['pseudo'] ?></strong></button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>connexion_membre.php?action=deconnexion"><button class="btn btn-sm btn-outline-success" type="button"><i class="fas fa-power-off"></i> Deconnexion</button></a>
                        </li>

                    <?php else : ?>

                        <li class="nav-item ">
                            <a class="nav-link" href="../index.php"><button class="btn btn-sm btn-outline-success home-button" type="button">Accueil MW Radio</button></a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="index_50_60.php"><button class="btn btn-sm btn-outline-success" type="button">50' 60' Albums</button></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index_70.php"><button class="btn btn-sm btn-outline-success" type="button">70' Albums</button></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index_80.php"><button class="btn btn-sm btn-outline-success" type="button">80' Albums</button></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index_90.php"><button class="btn btn-sm btn-outline-success" type="button">90' Albums</button></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index_00.php"><button class="btn btn-sm btn-outline-success" type="button">00' Albums</button></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index_10.php"><button class="btn btn-sm btn-outline-success" type="button">10' Albums</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inscription_membre.php"><button class="btn btn-sm btn-outline-success" type="button"><i class="fas fa-sign-in-alt"></i> Inscription</button></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="connexion_membre.php"><button class="btn btn-sm btn-outline-success" type="button"><i class="fas fa-power-off"></i> Connexion</button></a>
                        </li>

                    <?php endif; ?>

                    <!-- fin de la section qui concerne l' internaute non connecté et j' ajoute ci desssous un onglet supplémentaire, pour le connecté, avec statut d' administrateur-->

                    <?php if (internauteEstConnecteEstAdmin()) : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="../admin/gestion_globale.php"><button class="btn btn-sm btn-outline-success" type="button"><i class="fas fa-user-cog"></i> Administration</button></a>
                        </li>

                    <?php endif; ?>
                    <!-- fin du panneau administrateur -->

                </ul>
            </div>
        </nav>

    </header>

    <div class="container-fluid">