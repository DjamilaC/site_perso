<?php
require_once("../include/init.php");
extract($_POST);
extract($_GET);


// si l'internaute n'est pas connecté et n'est pas ADMIN, il n'a rien à faire ici, on le redirige vers la page connexion.php
if(!internauteEstConnecteEstAdmin())
{
    header("Location:" . URL . "connexion.php"); 
}
          // ---------------SUPPRESSION DE LOCATION-----------------------

if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
  $location_delete = $bdd->prepare("DELETE FROM locations WHERE id_location = :id_location");
  $location_delete->bindValue(':id_location', $id_location, PDO::PARAM_STR);
  
  $location_delete->execute();

  $_GET['action'] = 'affichage';// on redirige vers l'affichage des locations
  $validate.="<div class='alert-success col-md-6 offset-md-3 text-center'>la location n° <strong> $id_location </strong>a bien été supprimé !! </div>";
}

                        //-----------ENREGISTREMENT LOCATION-------------------------

if($_POST)
{
    $photo_bdd = '';
    if(isset($_GET['action']) && $_GET['action'] == 'modification')
    {
      $photo_bdd = $photo_actuelle; // si on souhaite conserver la même photo en cas de modification, on affecte la valeur du champs photo 'hidden', c'est à dire l'URLde la photo selectionnée en BDD
    }
    if(!empty($_FILES['photo']['name'])) // on vérifie que l'indice 'name' dans la superglobale $_FILES n'est pas vide, cela veut dire que l'on a bien uploader une photo
    {
        $nom_photo = $reference . '-' . $_FILES['photo']['name']; // on redéfinit le nom de la photo en concaténant la référence saisi dans le formulaire avec le nom de la photo
        echo $nom_photo . '<br>';

        $photo_bdd = "$nom_photo"; // on définit l'URL de la photo, c'est ce que l'on conservera en BDD
        echo $photo_bdd . '<br>';

        $photo_dossier = RACINE_SITE . "images/$nom_photo"; // on définit le chemin physique de la photo sur le disque dur du serveur, c'est ce qui nous permettra de copier la photo dans le dossier photo
        echo $photo_dossier . '<br>';

        copy($_FILES['photo']['tmp_name'], $photo_dossier); // copy() est une fonction prédéfinie qui permet de copier la photo dans le dossier photo. arguments: copy(nom_temporaire_photo, chemin de destination)

     
    }
            // la requete d'insertion permettant d'inserer une location dans la table 'locations' (requête préparée).

    if(isset($_GET['action']) && $_GET['action'] == 'ajout')
    {
      $location_insert = $bdd->prepare("INSERT INTO locations (reference, titre, adresse, ville, code_postal, loc_description, loc_type, prix, etat, photo) VALUES(:reference, :titre, :adresse, :ville, :code_postal, :loc_description, :loc_type, :prix, :etat, :photo)");

          $location_insert->bindValue(":reference", $reference, PDO::PARAM_INT);
          $location_insert->bindValue(":titre", $titre, PDO::PARAM_STR);
          $location_insert->bindValue(":adresse", $adresse, PDO::PARAM_STR);
          $location_insert->bindValue(":ville", $ville, PDO::PARAM_STR);
          $location_insert->bindValue(":code_postal", $code_postal, PDO::PARAM_INT);
          $location_insert->bindValue(":loc_description", $loc_description, PDO::PARAM_STR);
          $location_insert->bindValue(":loc_type", $loc_type, PDO::PARAM_STR);
          $location_insert->bindValue(":prix", $prix, PDO::PARAM_INT);
          $location_insert->bindValue(":etat", $etat, PDO::PARAM_STR);
          $location_insert->bindValue(":photo", $photo_bdd, PDO::PARAM_STR);        

      
          $location_insert->execute();
          $_GET['action'] = 'affichage';

      $validate.="<div class='alert alert-success col-md-6 offset-md-3 text-center'>la location n° <strong></strong>a bien été ajouté !! </div>";
    }
    else
    {
            // La requete update permettant de modifier une location dans la table 'locations'.

            $data_update = $bdd->prepare("UPDATE locations SET reference = :reference, titre = :titre, adresse = :adresse, ville = :ville, code_postal = :code_postal, loc_description = :loc_description, loc_type = :loc_type, prix = :prix, etat = :etat, photo = :photo WHERE id_location = $id_location");
  

      foreach($_POST as $key =>$value)
          { 
              if($key != 'photo_actuelle')
              {
                $data_update->bindValue(":$key", $value, PDO::PARAM_STR);  
              }
                
          }
                  
          $data_update->bindValue(":photo", $photo_bdd, PDO::PARAM_STR);
          
          $data_update->execute();
  
      }
      $_GET['action'] = 'affichage';

      $validate.= "<div class='alert alert-success col-md-6 offset-md-3 text-center'>la location <strong> </strong>a bien été modifié !! </div>";


  }
    
require_once("../include/header.php");

// echo '<pre>'; print_r($_POST); echo'</pre>';
// echo '<pre>'; print_r($_FILES); echo'</pre>';
// $_FILES: superglobale permet de véhiculer les informations d'un fichier uploader
?>

<!-- LIEN LOCATIONS -->

<hr>
<ul class="col-md-4 offset-md-4 list-group mt-4 text-center admin">
  <li class="list-group-item bg-secondary text-center text-white">ADMINISTRATION</li>
  <li class="list-group-item"><a href="?action=affichage" class="alert-link text-dark">AFFICHAGE LOCATIONS</a></li>
  <li class="list-group-item"><a href="?action=ajout" class="alert-link text-dark">AJOUT LOCATION</a></li>
 
</ul> <hr>
<!-- FIN LIENS LOCATIONS -->

<!-- AFFICHAGE LOCATIONS -->

<!--   l'affichage des produits sous forme de tableau HTML -->
 
<?php if(isset($_GET['action']) && $_GET['action'] == 'affichage'): ?>
<h1 class="display-4 text-center"> Liste des locations</h1>

<?php echo $validate; 
  
  $resultat = $bdd->query("SELECT * FROM locations");
  $location = $resultat->fetchAll(PDO::FETCH_ASSOC);

?>
  
    <!-- <?php echo '<pre>'; print_r($location); echo'</pre>'; ?> -->

   
<table class="table table-bordered text-center">
<tr>
  <?php foreach($location[0] as $key => $value): ?>
    <th><?= strtoupper($key) ?></th>
  <?php endforeach; ?>
    <th>MODIFIER</th>
    <th>SUPPRIMER</th>
  </tr>

  <?php foreach($location as $key => $tab): ?>
    <tr>
    <?php foreach($tab as $key2 => $value): ?>

        <?php if($key2 == 'photo'): ?>
            <td><img src="../images/<?= $value ?>" alt="<?= $tab['titre'] ?>" class="card-img-top" height="80px"></td>
        <?php else: ?>

            <td><?= $value ?></td>
        <?php endif; ?>

    <?php endforeach; ?> 

    <td><a href="?action=modification&id_location=<?= $tab['id_location'] ?>" class="text-dark"><i class="fas fa-edit"></i></a></td>
    <td><a href="?action=suppression&id_location=<?= $tab['id_location'] ?>" class="text-danger" onclick="return(confirm('En êtes vous certain?'))"><i class="fas fa-trash-alt"></i></a></td>
    
  </tr>
  <?php endforeach; ?>
</table>

<?php endif; ?>

<!-- FIN AFFICHAGE LOCATIONS -->
<?php if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')): ?>
   
<h1 class="col-md-6 offset-md-3 text-center" > <?= $action ?> d'une location</h1>
<?php
if(isset($_GET['id_location']))
{
  $resultat = $bdd->prepare("SELECT * FROM locations WHERE  id_location = :id_location");
  $resultat->bindValue(':id_location', $id_location, PDO::PARAM_INT);
  $resultat->execute();
  $location_actuelle = $resultat->fetch(PDO::FETCH_ASSOC);
  echo '<pre>'; print_r($location_actuelle); echo'</pre>';
}
$reference = (isset($location_actuelle['reference']))? $location_actuelle['reference'] : '';
$titre = (isset($location_actuelle['titre']))? $location_actuelle['titre'] : '';
$adresse = (isset($location_actuelle['adresse']))? $location_actuelle['adresse'] : '';
$ville = (isset($location_actuelle['ville']))? $location_actuelle['ville'] : '';
$code_postal = (isset($location_actuelle['code_postal']))? $location_actuelle['code_postal'] : '';
$loc_description = (isset($location_actuelle['loc_description']))? $location_actuelle['loc_description'] : '';
$loc_type = (isset($location_actuelle['loc_type']))? $location_actuelle['loc_type'] : '';
$prix = (isset($location_actuelle['prix']))? $location_actuelle['prix'] : '';
$etat = (isset($location_actuelle['etat']))? $location_actuelle['etat'] : '';
$photo = (isset($location_actuelle['photo']))? $location_actuelle['photo'] : '';

?>




        <!-- Le formulaire permettant d'inserer une location dans la table 'locations (sauf le champs: id_location' -->
<section class="formulaire_ajout_location mx-auto">

 <form class="col-md-6 offset-md-3 form1 pt-4" method="post" action="" enctype="multipart/form-data"> 
 <!-- enctype: obligatoire en PHP pour recolter les informations d'1 fichier uploadé -->

 <div class="form-group">
    <label for="reference">Référence</label>
    <input type="text" class="form-control" id="reference"  placeholder="Enter reference" name="reference" value="<?= $reference?>">    
  </div>

  <div class="form-group">
    <label for="titre">Titre</label>
    <input type="text" class="form-control" id="titre" aria-describedby="" placeholder="Enter un titre" name="titre" value="<?= $titre ?>">    
  </div>

  <div class="form-group">
    <label for="adresse">Adresse</label>
    <input type="text" class="form-control" id="adresse" aria-describedby="" placeholder="Enter n° et nom de la rue" name="adresse" value="<?= $adresse ?>">    
  </div>

  <div class="row">
        <div class="form-group col-md-6">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" aria-describedby="" placeholder="Enter ville" name="ville" value="<?= $ville ?>">            
        </div>

        <div class="form-group col-md-6">
            <label for="code_postal">Code postal</label>
            <input type="text" class="form-control" id="code_postal" aria-describedby="" placeholder="enter code postal" name="code_postal" value="<?= $code_postal ?>">
        </div> 
  </div>

 <div class="row">
        <div class="form-group col-md-6">
            <label for="loc_description">Description</label>
            <input type="text" class="form-control" id="loc_description" aria-describedby="" placeholder="loc_description" name="loc_description" value="<?= $loc_description ?>">    
        </div>

            
        <div class="form-group col-md-6">
            <label for="loc_type">Type</label>
            <select class="form-control" id="loc_type" name="loc_type" value="">
                <option>choisir votre location</option>
                <option value="appartement"<?php if($loc_type == 'appartement') echo 'selected'; ?>>Appartement</option>
                <option value="villa" <?php if($loc_type == 'villa') echo 'selected'; ?>>villa</option>
                <option value="camping" <?php if($loc_type == 'camping') echo 'selected'; ?>>camping</option>
            </select>              
        </div>
        
        
</div>
<div class="form-group col-md-6">
            <label for="prix">Prix</label>
            <input type="text" class="form-control" id="prix" aria-describedby="" placeholder="Enter prix" name="prix" value="<?= $prix ?>">   
        </div>

  <div class="form-group">
    <label for="etat">Etat</label>
    <select class="form-control" id="etat" name="etat" value="">
      <option value="disponible" <?php if($etat == 'disponible') echo 'selected'; ?>>Disponible</option>
      <option value="pris" <?php if($etat == 'pris') echo 'selected'; ?>>Non disponible</option>
            
    </select>        
  </div>

<div class="row">
        <div class="form-group col-md-6">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" aria-describedby="" placeholder="" name="photo">    
        </div>
        <?php if(!empty($photo)): ?>
        <em>Vous pouvez uploader une nouvelle photo si vous souhaitez la changer</em><br>
        <img src="../images/<?= $photo ?>" alt="<?=$titre ?>" class="card-img-top">
        <?php endif; ?>
        <input type="hidden" id="photo_actuelle" name="photo_actuelle" value="<?= $photo ?>">    
  </div>
    <button type="submit" class="btn btn-danger col-md-4 offset-md-4 mt-3"><?= $action ?></button>
</form>
<?php endif; ?>
</section>


<?php
require_once("../include/footer.php");
?>