<?php
require_once("../include/init.php");
extract($_POST);
extract($_GET);
// si l'internaute n'est pas connecté et n'est pas ADMIN, il n'a rien à faire ici, on le redirige vers la page connexion.php
if(!internauteEstConnecteEstAdmin())
{
    header("Location:" . URL . "connexion.php"); 
}

?>