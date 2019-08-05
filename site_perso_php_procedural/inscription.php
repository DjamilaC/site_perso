<?php

require_once("include/init.php");

// extract($_GET);

extract($_POST); 
if(internauteEstConnecte())// si l'internaute est connecté, il n'a rien à faire sur la page 
{
    header("Location: profil.php"); 
}
// echo '<pre>'; print_r($_POST); echo'</pre>';

if($_POST)
{
    $verif_pseudo = $bdd->prepare("SELECT * FROM client WHERE pseudo = :pseudo");
    $verif_pseudo->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $verif_pseudo->execute();

    if($verif_pseudo->rowCount() > 0 )
    {
        $error .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Le pseudo ' .$pseudo . ' est deja existant en BDD. Merci d\'en saisir un nouveau !! </div>';
    }

    //-------------------CONTROLR MDP----------------------
    $verif_mdp = $bdd->prepare("SELECT * FROM client WHERE pseudo = :pseudo");
    $verif_mdp->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $verif_mdp->execute();

   if($mdp !== $mdpconfirm)
   {
      $error1 .='<div class="col-md-6 offset-md-3 text-center alert alert-danger"> Merci de verifier les mots de passe !! </div>';
   }

   if (!isset($_POST['civilite']) || $_POST['civilite'] != "f" && $_POST['civilite'] != "m")
   {
      $error2 .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger"> Veuillez choisir un genre</div>';
   } // FIN if (!isset($_POST['civilite'])

   if (strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 21) 
   {
      $error3 .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Votre Nom doit etre compris entre 4 et 20 caractères</div>';
   }


   if (!$error){


      // $_POST['mdp'] = password_hash($mdp, PASSWORD_DEFAULT); // on ne conseve jamais en clair les mots de passes dans la BDD, password_hash permet de creer une clé de hachage.
      
      $data_insert = $bdd->prepare("INSERT into client (pseudo, mdp, nom_client, prenom_client, email, civilite, ville, code_postal, adresse, num_telephone) VALUES (:pseudo, :mdp, :nom_client, :prenom_client, :email, :civilite , :ville, :code_postal, :adresse, :num_telephone)");
      // $data_insert->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
         foreach($_POST as $key => $value)
         {
            if($key != 'mdpconfirm')
            {
            $data_insert->bindValue(":$key", $value, PDO::PARAM_STR);   
            }
         }
          $data_insert->execute(); 

      // redirige vers le fichier connexion, une fois validé
       header("Location: connexion.php?action=validate");
      
      // header est une fonction prédéfinie, qui permet d' effectuer une redirection de page/ URL
      }
     
}
require_once("include/header.php");

?>
<!-- Page Content -->
<div class="container-fluid">    
      <section class="row inscription">        
                        
         <div class="col-md-12 mx-auto">

            <form method="post" action="" class="col-md-4 offset-md-4 mt-5 mb-5 form_connexion_inscription">

                  <h1 class="text text-center mx-auto pt-5"> Je m'inscris</h1>
                  <?= $error?>
                  
                  <!-- Pseudo -->                

                  <div class="form-group">
                     <label for="pseudo">Pseudo</label>
                     <input type="text" class="form-control" id="pseudo" aria-describedby="" placeholder="Saisir un pseudo" name="pseudo">            
                  </div>
                  <?= $error?>
                  <!-- le mot de passe -->

                  <div class="form-group">
                     <label for="mdp">Mot de passe</label>
                     <input type="text" class="form-control" id="mdp" placeholder="Saisir un mot de passe" name="mdp">
                  </div>
                  <?= $error?>

                  <!-- confirmer mot de passe -->

                  <div class="form-group">
                     <label for="mdpconfirm">Confirmer mot de passe</label>
                     <input type="text" class="form-control" id="mdpconfirm" aria-describedby="" placeholder="confirmer mot de passe" name="mdpconfirm">            
                  </div>
                  <?= $error?>

                   <!-- le nom -->

                  <div class="form-group">
                     <label for="nom">Nom</label>
                     <input type="text" class="form-control" id="nom_client" aria-describedby="" placeholder="Saisir un nom" name="nom_client"> 
                  </div>
                  <?= $error?>

                   <!-- le prénom -->

                  <div class="form-group">
                     <label for="prenom">Prénom</label>
                     <input type="text" class="form-control" id="prenom_client" aria-describedby="" placeholder="Saisir un prenom" name="prenom_client">            
                  </div>
                  <?= $error?>

                  <!-- L'email -->

                  <div class="form-group">
                     <label for="email">Email</label>
                     <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Saisir un email" name="email">    
                  </div>
                  <?= $error?>

                  <div class="form-group">
                     <label for="adresse">Adresse</label>
                     <input type="text" class="form-control" id="adresse" aria-describedby="" placeholder="Saisir une adresse" name="adresse">    
                  </div>

                  <div class="form-group">
                     <label for="ville">Ville</label>
                     <input type="text" class="form-control" id="ville" aria-describedby="" placeholder="Saisir une ville" name="ville">    
                  </div>

                  <div class="form-group">
                     <label for="code_postal">Code_Postal</label>
                     <input type="text" class="form-control" id="code_postal" aria-describedby="" placeholder="Enter code postal" name="code_postal">            
                  </div>
                  <?= $error?>


                  <div class="form-group">
                     <label for="civilite">Civilite</label>
                     <select class="form-control" id="civilite" name="civilite">
                     <option></option>
                     <option value="f">Feminin</option>
                     <option value="m">Masculin</option>      
                     </select>
                  </div>
                  <?= $error?>

                  <div class="form-group">
                     <label for="num_telephone">Telephone</label>
                     <input type="text" class="form-control" id="num_telephone" placeholder="telephone" name="num_telephone">
                  </div>
                  <?= $error?>

                  <button type="submit" class="col-md-4 offset-md-4 btn btn-secondary ">Inscription</button>
                  </form>
            </div>
        </section>       
   
</div>





 <?php 
require_once("include/footer.php");
?>