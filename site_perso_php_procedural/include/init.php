<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=emmavacances', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// -----------------------SESSION



//------------------------CHEMIN
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'].'/site_perso/site_perso_php_procedural/');
// echo RACINE_SITE;

// $_SERVER['DOCUMENT_ROOT]---> c:/xampp/htdocs
// Lors de l'enregistrement d'image / photos, nous aurons besoin du chemin physique complet pour enregistrer la photo dans le bon dossier
// echo RACINE_SITE;

define("URL", "http://localhost/site_perso/site_perso_php_procedural/");
// echo URL;
// cette constante servira entre autre à enregistrer l'URL d'une photo/ image dans la BDD, on ne conserve jamais la photo elle même, ce serait trop lourd pour la BDD


// -----------------------VARIABLES

$error = ''; // message d'erreur
$validate = ''; // message de validation
$content = ''; // permettra de placer du contenu où l'on souhaite

//------------------------FAILLES XSS

// POST
foreach($_POST as $key => $value)
    {
    $_POST[$key] = strip_tags(trim($value));
    }

// GET
foreach($_GET as $key => $value)
{
    $_GET[$key] = strip_tags(trim($value));
}

// strip_tags()---> supprime les balises HTML
// trim()--> supprimer les espaces en debut et fin de chaine

//--------------------------INCLUSIONS
// on inclu directement le fichier fonction.php dans init, cela évitera de l'appeler sur chaque page
    require_once("fonction.php");



?>