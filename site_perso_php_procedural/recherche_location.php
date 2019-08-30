<?php

require_once("include/init.php");
extract($_GET);
extract($_POST);
require_once("include/header.php");

if($_POST){
    $search = $bdd->prepare("SELECT * FROM locations INNER JOIN reservation WHERE  date_debut_vacanc= :date_debut_vacanc AND date_fin_vacanc = :date_fin_vacanc AND loc_type= :loc_type") ;
        $search->bindValue(':date_debut_vacanc', $date_debut_vacanc, PDO::PARAM_STR);
        $search->bindValue(':date_fin_vacanc', $date_fin_vacanc, PDO::PARAM_STR);
        $search->bindValue(':loc_type', $loc_type, PDO::PARAM_STR);
        $search->execute();
}

?>







<?php 
require_once("include/footer.php");
?>