<?php
require_once("../include/init.php");
extract($_POST);
extract($_GET);

// si l'internaute n'est pas connecté et n'est pas ADMIN, il n'a rien à faire ici, on le redirige vers la page connexion.php

if(!internauteEstConnecteEstAdmin())
{
    header("Location:" . URL . "connexion.php"); 
}

    // ------SUPPRESSION DE RESERVATION-----------------------

if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
$reserv_delete = $bdd->prepare("DELETE FROM reservation WHERE id_reservation = :id_reservation");
$reserv_delete->bindValue(':id_reservation', $id_reservation, PDO::PARAM_STR);

$reserv_delete->execute();

// on redirige vers l'affichage des reservations

$_GET['action'] = 'affichage';
$validate.="<div class='alert-success col-md-6 offset-md-3 text-center'>la location n° <strong> $id_reservation </strong>a bien été supprimé !! </div>";
}

//-----------ENREGISTREMENT RESERVATION-------------------------

if($_POST)
{
    if(isset($_GET['action']) && $_GET['action'] == 'modification')
    {
              // La requete update permettant de modifier une location dans la table 'locations'.
      $data_insert = $bdd->prepare("UPDATE reservation SET num_reservation = :num_reservation, date_debut_vacanc = :date_debut_vacanc, date_fin_vacanc = :date_fin_vacanc, email = :email, duree_vacanc = :duree_vacanc, nbre_vacanciers = :nbre_vacanciers, client_id = :client_id, location_id = :location_id WHERE id_reservation = $id_reservation");
  

    //   foreach($_POST as $key =>$value)
    //       {               
    //            $data_insert->bindValue(":$key", $value, PDO::PARAM_STR);                
    //       }   
              
            $data_insert->bindValue(":email", $email, PDO::PARAM_STR);      
            $data_insert->bindValue(":num_reservation", $num_reservation, PDO::PARAM_INT);      
            $data_insert->bindValue(":date_debut_vacanc", $date_debut_vacanc, PDO::PARAM_INT);      
            $data_insert->bindValue(":date_fin_vacanc", $date_fin_vacanc, PDO::PARAM_INT);      
            $data_insert->bindValue(":duree_vacanc", $duree_vacanc, PDO::PARAM_INT);      
            $data_insert->bindValue(":nbre_vacanciers", $nbre_vacanciers, PDO::PARAM_INT);      
            $data_insert->bindValue(":client_id", $client_id, PDO::PARAM_INT);      
            $data_insert->bindValue(":location_id", $location_id, PDO::PARAM_INT);      
            // $data_insert->bindValue(":location_id", $location_id, PDO::PARAM_INT);      
            
            $data_insert->execute();           
    }
      $_GET['action'] = 'affichage';

      $validate.= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>la reservation <strong>$num_reservation </strong>a bien été enregistré !! </div>";
        
    // la requete d'insertion permettant d'inserer une reservation dans la table 'reservation' (requête préparée).

    if(isset($_GET['action']) && $_GET['action'] == 'ajout')
    {
      $reserv_insert = $bdd->prepare("INSERT into reservation (num_reservation = :num_reservation, date_debut_vacanc = :date_debut_vacanc, date_fin_vacanc = :date_fin_vacanc, email = :email, duree_vacanc = :duree_vacanc, nbre_vacanciers = :nbre_vacanciers, client_id = :client_id, location_id = :location_id");      
              
            $reserv_insert->bindValue(":num_reservation", $num_reservation, PDO::PARAM_INT);      
            $reserv_insert->bindValue(":date_debut_vacanc", $date_debut_vacanc, PDO::PARAM_INT);      
            $reserv_insert->bindValue(":date_fin_vacanc", $date_fin_vacanc, PDO::PARAM_INT);      
            $reserv_insert->bindValue(":email", $email, PDO::PARAM_STR);      
            $reserv_insert->bindValue(":duree_vacanc", $duree_vacanc, PDO::PARAM_INT);      
            $reserv_insert->bindValue(":nbre_vacanciers", $nbre_vacanciers, PDO::PARAM_INT);      
            $reserv_insert->bindValue(":client_id", $client_id, PDO::PARAM_INT);      
            $reserv_insert->bindValue(":location_id", $location_id, PDO::PARAM_INT);

            $reserv_insert->execute();    
    }
      $_GET['action'] = 'affichage';

      $validate.="<div class='alert alert-success col-md-6 offset-md-3 text-center'>la location n° <strong></strong>a bien été ajouté !! </div>";

   
   
    
}// Fin ($_POST)   
require_once("../include/header.php");
?>

<!-- LIEN LOCATIONS -->
<hr>
<ul class="col-md-4 offset-md-4 list-group mt-4 text-center admin">
  <li class="list-group-item bg-secondary text-center text-white">ADMINISTRATION</li>
  <li class="list-group-item"><a href="?action=affichage" class="alert-link text-dark">AFFICHAGE RESERVATIONS</a></li>
  <li class="list-group-item"><a href="?action=ajout" class="alert-link text-dark">AJOUT RESERVATION</a></li>
 
</ul> <hr>

<!--   l'affichage des RESERVATIONS sous forme de tableau HTML -->

<?php if(isset($_GET['action']) && $_GET['action'] == 'affichage'): ?>
        <h1 class="display-4 text-center"> Liste des réservations</h1>

        <?php echo $validate; 
        
        $resultat = $bdd->query("SELECT * FROM reservation");
        $reservation = $resultat->fetchAll(PDO::FETCH_ASSOC);

        ?>

        <table class="table table-bordered text-center">
        <tr>
        <?php foreach($reservation[0] as $key => $value): ?>
            <th><?= strtoupper($key) ?></th>
        <?php endforeach; ?>
            <th>MODIFIER</th>
            <th>SUPPRIMER</th>
        </tr>

        <?php foreach($reservation as $key => $tab): ?>

            <tr>

            <?php foreach($tab as $key2 => $value): ?>   

                    <td><?= $value ?></td>        

            <?php endforeach; ?> 

            <td><a href="?action=modification&id_reservation=<?= $tab['id_reservation'] ?>" class="text-dark"><i class="fas fa-edit"></i></a></td>
            <td><a href="?action=suppression&id_reservation=<?= $tab['id_reservation'] ?>" class="text-danger" onclick="return(confirm('En êtes vous certain?'))"><i class="fas fa-trash-alt"></i></a></td>
            
        </tr>
        <?php endforeach; ?>
        </table>
<?php endif; ?>

        <!-- FIN AFFICHAGE RESERVATIONS -->

<?php if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')): ?>

<h1 class="col-md-6 offset-md-3 text-center" > <?= $action ?> d'une reservation</h1>

<?php
if(isset($_GET['id_reservation']))
{
  $resultat = $bdd->prepare("SELECT * FROM reservation WHERE  id_reservation = :id_reservation");

  $resultat->bindValue(':id_reservation', $id_reservation, PDO::PARAM_INT);
  $resultat->execute();

  $reservation_actuelle = $resultat->fetch(PDO::FETCH_ASSOC);
//   echo '<pre>'; print_r($reservation_actuelle); echo'</pre>';
}
$num_reservation = (isset($reservation_actuelle['num_reservation']))? $reservation_actuelle['num_reservation'] : '';

$date_debut_vacanc = (isset($reservation_actuelle['date_debut_vacanc']))? $reservation_actuelle['date_debut_vacanc'] : '';

$date_fin_vacanc = (isset($reservation_actuelle['date_fin_vacanc']))? $reservation_actuelle['date_fin_vacanc'] : '';

$email = (isset($reservation_actuelle['email']))? $reservation_actuelle['email'] : '';

$duree_vacanc = (isset($reservation_actuelle['duree_vacanc']))? $reservation_actuelle['duree_vacanc'] : '';

$nbre_vacanciers = (isset($reservation_actuelle['nbre_vacanciers']))? $reservation_actuelle['nbre_vacanciers'] : '';

$client_id = (isset($reservation_actuelle['client_id']))? $reservation_actuelle['client_id'] : '';

$location_id = (isset($reservation_actuelle['location_id']))? $reservation_actuelle['location_id'] : '';

?>

<!-- Le formulaire permettant d'inserer une location dans la table 'locations -->

<section class="formulaire_ajout_location mx-auto">

 <form class="col-md-6 offset-md-3 form1 pt-4" method="post" action="" enctype="multipart/form-data"> 
 <!-- enctype: obligatoire en PHP pour recolter les informations d'1 fichier uploadé -->

 <div class="form-group">
    <label for="num_reservation"> Numéro réservation</label>
    <input type="text" class="form-control" id="num_reservation"  placeholder="Enter num_reservation" name="num_reservation" value="<?= $num_reservation?>">    
  </div>

    <div class="form-group">
        <label for="date_debut_vacanc">Date debut de vacances</label>
        <input type="date" class="form-control" id="date_debut_vacanc" aria-describedby="" placeholder="Enter un date_debut_vacanc" name="date_debut_vacanc" value="<?= $date_debut_vacanc ?>">    
    </div>

    <div class="form-group">
        <label for="date_fin_vacanc">Date fin de vacances</label>
        <input type="date" class="form-control" id="date_fin_vacanc" aria-describedby="" placeholder="date_fin_vacanc" name="date_fin_vacanc" value="<?= $date_fin_vacanc ?>">    
    </div>
  
    <div class="form-group">
        <label for="email">email</label>
        <input type="text" class="form-control" id="email" aria-describedby="" placeholder="Enter email" name="email" value="<?= $email ?>">            
    </div>

    <div class="form-group">
        <label for="duree_vacanc">duree_vacanc</label>
        <input type="text" class="form-control" id="duree_vacanc" aria-describedby="" placeholder="enter duree de vacances" name="duree_vacanc" value="<?= $duree_vacanc ?>">
    </div>        

            
    <div class="form-group">
        <label for="nbre_vacanciers">Nombre de vacanciers</label>
        <select class="form-control" id="nbre_vacanciers" name="nbre_vacanciers" value="">
            <option>choisir un nombre </option>
            <option value="1" <?php if($nbre_vacanciers == '1') echo 'selected'; ?>>1</option>            
            <option value="2" <?php if($nbre_vacanciers == '2') echo 'selected'; ?>>2</option>
            <option value="3" <?php if($nbre_vacanciers == '3') echo 'selected'; ?>>3</option>
            <option value="4" <?php if($nbre_vacanciers == '4') echo 'selected'; ?>>4</option>
            <option value="5" <?php if($nbre_vacanciers == '5') echo 'selected'; ?>>5</option>
            <option value="6" <?php if($nbre_vacanciers == '6') echo 'selected'; ?>>6</option>
            <option value="7" <?php if($nbre_vacanciers == '7') echo 'selected'; ?>>7</option>
            <option value="8" <?php if($nbre_vacanciers == '8') echo 'selected'; ?>>8</option>
            <option value="9" <?php if($nbre_vacanciers == '9') echo 'selected'; ?>>9</option>
        </select>              
    </div>
        
     <div class="form-group">
            <label for="client_id">Client_id</label>
            <input type="text" class="form-control" id="client_id" aria-describedby="" placeholder="client_id" name="client_id" value="<?= $client_id ?>">    
    </div>    

    <div class="form-group">
        <label for="location_id">Location_id</label>
        <input type="text" class="form-control" id="location_id" aria-describedby="" placeholder="Enter prix" name="location_id" value="<?= $location_id ?>">          
    </div> 

    <button type="submit" class="btn btn-danger col-md-4 offset-md-4"><?= $action ?></button>
</form>
<?php endif; ?>
</section>


<?php
require_once("../include/footer.php");
?>
