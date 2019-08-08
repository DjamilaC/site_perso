<?php

require_once("include/init.php");
require_once("include/header.php");

// extract($_GET);

extract($_POST); 
if(internauteEstConnecte())// si l'internaute est connecté, il n'a rien à faire sur la page 
{
    header("Location: profil.php"); 
}
if (isset($_GET['action']) && $_GET['action'] == 'reserver'){
    header("Location: profil.php");
}
?>

<h1 class="text text-center">veuilez remplir le formulaire de reservation</h1>





<?php 
require_once("include/footer.php");
?>