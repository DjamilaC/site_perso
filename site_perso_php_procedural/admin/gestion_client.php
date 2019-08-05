<?php
require_once("../include/init.php");
extract($_POST);
extract($_GET);


// si l'internaute n'est pas connecté et n'est pas ADMIN, il n'a rien à faire ici, on le redirige vers la page connexion.php
if(!internauteEstConnecteEstAdmin())
{
    header("Location:" . URL . "connexion.php"); 
}
        // ---------------SUPPRESSION DE LOCATION-----------------

if(isset($_GET['action']) && $_GET['action'] == 'suppression')
{
  $client_delete = $bdd->prepare("DELETE FROM client WHERE id_client = :id_client");
  $client_delete->bindValue(':id_client', $id_client, PDO::PARAM_STR);
  $client_delete->execute();
  

  $_GET['action'] = 'affichage';// on redirige vers l'affichage des clients
  $validate.="<div class='alert-success col-md-6 offset-md-3 text-center'>la location n° <strong> $id_client </strong>a bien été supprimé !! </div>";
}

           //-----------ENREGISTREMENT CLIENT-------------------------

            // la requete d'insertion permettant d'inserer un client dans la table 'client' (requête préparée).

if($_POST)
    {
    if(isset($_GET['action']) && $_GET['action'] == 'ajout')
    {
      $client_insert = $bdd->prepare("INSERT into client (pseudo, mdp, nom_client, prenom_client, email, civilite, ville, code_postal, adresse, num_telephone) VALUES (:pseudo, :mdp, :nom_client, :prenom_client, :email, :civilite , :ville, :code_postal, :adresse, :num_telephone)");
      foreach($_POST as $key => $value)
         {            
            $client_insert->bindValue(":$key", $value, PDO::PARAM_STR); 
         }             
             
    }
    
      $_GET['action'] = 'affichage';

      $validate.="<div class='alert alert-success col-md-6 offset-md-3 text-center'>la location n° <strong>$pseudo</strong> a bien été ajouté !! </div>";   
    
            // La requete update permettant de modifier un client dans la table 'client'.
      if(isset($_GET['action']) && $_GET['action'] == 'modification')
        {
              $data_insert = $bdd->prepare("UPDATE client SET pseudo = :pseudo, mdp= :mdp, nom_client = :nom_client, prenom_client = :prenom_client, email = :email, civilite = :civilite, ville = :ville, code_postal = :code_postal, adresse = :adresse, num_telephone = :num_telephone WHERE id_client = $id_client");
  

      foreach($_POST as $key =>$value)
            {           
            $data_insert->bindValue(":$key", $value, PDO::PARAM_STR);
            }            
          $data_insert->execute();
        }      
          
      $validate.= "<div class='alert alert-success col-md-6 offset-md-3 text-center'> la location a bien été modifié !! </div>";   
      
      $_GET['action'] = 'affichage';
  
} // Fin ($_POST)
    
require_once("../include/header.php");

// echo '<pre>'; print_r($_POST); echo'</pre>';
// echo '<pre>'; print_r($_FILES); echo'</pre>';
// $_FILES: superglobale permet de véhiculer les informations d'un fichier uploader
?>

<!-- LIEN LOCATIONS -->
<hr>
<ul class="col-md-4 offset-md-4 list-group mt-4 text-center admin">
  <li class="list-group-item bg-secondary text-center text-white">ADMINISTRATION</li>
  <li class="list-group-item"><a href="?action=affichage" class="alert-link text-dark">AFFICHAGE CLIENTS</a></li>
  <li class="list-group-item"><a href="?action=ajout" class="alert-link text-dark">AJOUT CLIENT</a></li>
 
</ul> <hr>
<!-- FIN LIENS LOCATIONS -->

<!-- AFFICHAGE LOCATIONS -->

<!--   l'affichage des produits sous forme de tableau HTML -->
 
<?php if(isset($_GET['action']) && $_GET['action'] == 'affichage'): ?>
<h1 class="display-4 text-center"> Liste des clients</h1>

<?php echo $validate; 
  
  $resultat = $bdd->query("SELECT * FROM client");
  $client = $resultat->fetchAll(PDO::FETCH_ASSOC);

?>  
    <!-- <?php echo '<pre>'; print_r($location); echo'</pre>'; ?> -->

   
<table class="table table-bordered text-center">
<tr>
  <?php foreach($client[0] as $key => $value): ?>
    <th><?= strtoupper($key) ?></th>
  <?php endforeach; ?>
    <th>MODIFIER</th>
    <th>SUPPRIMER</th>
  </tr>

  <?php foreach($client as $key => $tab): ?>
    <tr>
    <?php foreach($tab as $key2 => $value): ?>       

        <td><?= $value ?></td>
        

    <?php endforeach; ?> 

    <td><a href="?action=modification&id_client=<?= $tab['id_client'] ?>" class="text-dark"><i class="fas fa-edit"></i></a></td>
    <td><a href="?action=suppression&id_client=<?= $tab['id_client'] ?>" class="text-danger" onclick="return(confirm('En êtes vous certain?'))"><i class="fas fa-trash-alt"></i></a></td>
    
  </tr>
  <?php endforeach; ?>
</table>

<?php endif; ?>

<!-- FIN AFFICHAGE LOCATIONS -->
<?php if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')): ?>
   
<h1 class="col-md-6 offset-md-3 text-center" > <?= $action ?> d'un client</h1>
<?php
if(isset($_GET['id_client']))
{
  $resultat = $bdd->prepare("SELECT * FROM client WHERE  id_client = :id_client");
  $resultat->bindValue(':id_client', $id_client, PDO::PARAM_INT);
  $resultat->execute();
  $client_actuel = $resultat->fetch(PDO::FETCH_ASSOC);
  // echo '<pre>'; print_r($client_actuel); echo'</pre>';
}
$pseudo = (isset($client_actuel['pseudo']))? $client_actuel['pseudo'] : '';
$mdp = (isset($client_actuel['mdp']))? $client_actuel['mdp'] : '';
$nom_client = (isset($client_actuel['nom_client']))? $client_actuel['nom_client'] : '';
$prenom_client = (isset($client_actuel['prenom_client']))? $client_actuel['prenom_client'] : '';
$email = (isset($client_actuel['email']))? $client_actuel['email'] : '';
$civilite = (isset($client_actuel['civilite']))? $client_actuel['civilite'] : '';
$ville = (isset($client_actuel['ville']))? $client_actuel['ville'] : '';
$code_postal = (isset($client_actuel['code_postal']))? $client_actuel['code_postal'] : '';
$adresse = (isset($client_actuel['adresse']))? $client_actuel['adresse'] : '';
$num_telephone = (isset($client_actuel['num_telephone']))? $client_actuel['num_telephone'] : '';
$statut = (isset($client_actuel['statut']))? $client_actuel['statut'] : '';

?>


        <!-- Le formulaire permettant d'inserer un client dans la table 'client (sauf le champs: id_client' -->
<section class="formulaire_ajout_location mx-auto">

 <form class="col-md-6 offset-md-3 form1 pt-4" method="post" action="" enctype="multipart/form-data"> 
 <!-- enctype: obligatoire en PHP pour recolter les informations d'1 fichier uploadé -->

 <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" class="form-control" id="pseudo"  placeholder="Enter pseudo" name="pseudo" value="<?= $pseudo?>">    
  </div>

  <div class="form-group">
        <label for="mdp">Mot de passe</label>
        <input type="text" class="form-control" id="mdp" aria-describedby="" placeholder="Enter un mot de passe" name="mdp" value="<?= $mdp ?>">    
  </div>
    
    <div class="form-group">
            <label for="nom_client">Nom</label>
            <input type="text" class="form-control" id="nom_client" aria-describedby="" placeholder="enter nom" name="nom_client" value="<?= $nom_client ?>">    
    </div>

    <div class="form-group">
            <label for="prenom_client">Prenom</label>
            <input type="text" class="form-control" id="prenom_client" aria-describedby="" placeholder="enter prenom" name="prenom_client" value="<?= $prenom_client ?>">    
    </div>

    <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" aria-describedby="" placeholder="Saisir un email" name="email" value="<?= $email ?>">    
      </div>

    <div class="form-group">
                <label for="civilite">Civilite</label>
                <select class="form-control" id="civilite" name="civilite" value="">                    
                    <option value="f"<?php if($civilite == 'f') echo 'selected'; ?>>Feminin</option>
                    <option value="m" <?php if($civilite == 'h') echo 'selected'; ?>>Masculin</option>                    
                </select>              
    </div>

  <div class="form-group">
        <label for="adresse">Adresse</label>
        <input type="text" class="form-control" id="adresse" aria-describedby="" placeholder="Enter n° et nom de la rue" name="adresse" value="<?= $adresse ?>">    
  </div>

  
    <div class="form-group">
        <label for="ville">Ville</label>
        <input type="text" class="form-control" id="ville" aria-describedby="" placeholder="Enter ville" name="ville" value="<?= $ville ?>">       
    </div>

    <div class="form-group">
        <label for="code_postal">Code postal</label>
        <input type="text" class="form-control" id="code_postal" aria-describedby="" placeholder="enter code postal" name="code_postal" value="<?= $code_postal ?>">
    </div>       

    <div class="form-group">
            <label for="num_telephone">Téléphone</label>
            <input type="text" class="form-control" id="num_telephone" aria-describedby="" placeholder="Enter num_telephone" name="num_telephone" value="<?= $num_telephone ?>">   
    </div>

    <div class="form-group">
            <label for="statut">Statut</label>
            <input type="text" class="form-control" id="statut" aria-describedby="" placeholder="Enter statut" name="statut" value="<?= $statut ?>">   
    </div>
  


    <button type="submit" class="btn btn-danger col-md-4 offset-md-4"><?= $action ?></button>
</form>
<?php endif; ?>
</section>


<?php
require_once("../include/footer.php");
?>