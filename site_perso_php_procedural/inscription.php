<?php
require_once("include/init.php");
extract($_POST); 

if(internauteEstConnecte())
// si l'internaute est connecté, il n'a rien à faire sur la page 
{
    header("Location: profil.php"); 
}
// echo '<pre>'; print_r($_POST); echo'</pre>';

if($_POST)
{

   // on vérifie que le pseudo choisi n' est pas déjà pris par un autre membre   
    $verif_pseudo = $bdd->prepare("SELECT * FROM client WHERE pseudo = :pseudo");
    $verif_pseudo->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $verif_pseudo->execute();
    if($verif_pseudo->rowCount() > 0 )
    // si le résultat de la requete est supérieur a 0, cela veut dire qu' un pseudo est bien existant en bdd, alors on affiche le mssage d' erreur
    {
        $error .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Le pseudo ' .$pseudo . ' est deja existant en BDD. Merci d\'en saisir un nouveau !! </div>';
    }

    $verif_mdp = $bdd->prepare("SELECT * FROM client WHERE pseudo = :pseudo");
    $verif_mdp->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $verif_mdp->execute();   
   
   if (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 11) {
      $error1 .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Votre Pseudo doit etre compris entre 4 et 10 caractères</div>';
  } 
  //-----------------controle mdp 
   if (strlen($_POST['mdp']) < 3 || strlen($_POST['mdp']) > 11) {
   $error2 .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Votre Mot de Passe doit etre compris entre 3 et 10 caracteres</div>';
   // ou pour un pregmatch + élaboré
   // (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password))
   }

   // vérification que la seconde saisie du mdp est conforme a la première
   if($mdp !== $mdpconfirm)
   {
      $error3 .='<div class="col-md-6 offset-md-3 text-center alert alert-danger"> Merci de verifier les mots de passe !! </div>';
   }
   //-----------------controle nom
   if (strlen($_POST['nom_client']) < 3 || strlen($_POST['nom_client']) > 21) 
   {
      $error4 .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Votre Nom doit etre compris entre 4 et 20 caractères</div>';
   }

   //-----------------controle prenom
   if (strlen($_POST['prenom_client']) < 3 || strlen($_POST['prenom_client']) > 21) {
      $error5 .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Votre Prenom doit etre compris entre 4 et 20 caractères</div>';
  }

  //-----------------controle email
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   $error6 .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Vous devez inserer une adresse mail valide</div>';
}

//-----------------controle civilite
if (!isset($_POST['civilite']) || $_POST['civilite'] != "f" && $_POST['civilite'] != "m")
   {
      $error7 .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger"> Veuillez choisir un genre</div>';
   } // FIN if (!isset($_POST['civilite'])

   if (!preg_match('#^[0-9]{5}$#',$code_postal)) {
      $error7 .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger">Votre code postal doit etre composé de 5 chiffres</div>';
}

if (empty($error || $error1 || $error2 || $error3 || $error4 || $error5 || $error6 || $error7 || $error8)){
   echo '<div class="alert alert-success text-dark">Félicitations, votre formulaire est valide et par conséquent transmis</div>';
}



      // $_POST['mdp'] = password_hash($mdp, PASSWORD_DEFAULT); // on ne conseve jamais en clair les mots de passes dans la BDD, password_hash permet de creer une clé de hachage.
if (empty($error) && empty($error1) && empty($error2) && empty($error3) && empty($error4) && empty($error5) && empty($error6) && empty($error7) && empty($error8))
{
   // $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
   // on ne conserve jamais de mdp en clair dans la bdd. password_hash permet de créer une clé de hashage ( cryptage)

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
               <?= $error1?>
                  <div class="form-group">
                     <label for="pseudo">Pseudo</label>
                     <input type="text" class="form-control" id="pseudo" aria-describedby="" placeholder="Saisir un pseudo" name="pseudo">            
                  </div>
                  
                  <!-- le mot de passe -->
               <?= $error2?>
                  <div class="form-group">
                     <label for="mdp">Mot de passe</label>
                     <input type="text" class="form-control" id="mdp" placeholder="Saisir un mot de passe" name="mdp">
                  </div>
                  

                  <!-- confirmer mot de passe -->
               <?= $error3?>
                  <div class="form-group">
                     <label for="mdpconfirm">Confirmer mot de passe</label>
                     <input type="text" class="form-control" id="mdpconfirm" aria-describedby="" placeholder="confirmer mot de passe" name="mdpconfirm">            
                  </div>
                  

                   <!-- le nom -->
               <?= $error4?>
                  <div class="form-group">
                     <label for="nom">Nom</label>
                     <input type="text" class="form-control" id="nom_client" aria-describedby="" placeholder="Saisir un nom" name="nom_client"> 
                  </div>
                  

                   <!-- le prénom -->
               <?= $error5?>
                  <div class="form-group">
                     <label for="prenom">Prénom</label>
                     <input type="text" class="form-control" id="prenom_client" aria-describedby="" placeholder="Saisir un prenom" name="prenom_client">            
                  </div>
                 

                  <!-- L'email -->
               <?= $error6?>
                  <div class="form-group">
                     <label for="email">Email</label>
                     <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Saisir un email" name="email">    
                  </div>
                  

                  <div class="form-group">
                     <label for="adresse">Adresse</label>
                     <input type="text" class="form-control" id="adresse" aria-describedby="" placeholder="Saisir une adresse" name="adresse">    
                  </div>

                  <div class="form-group">
                     <label for="ville">Ville</label>
                     <input type="text" class="form-control" id="ville" aria-describedby="" placeholder="Saisir une ville" name="ville">    
                  </div>

                  <?= $error7?>
                  <div class="form-group">
                     <label for="code_postal">Code_Postal</label>
                     <input type="text" class="form-control" id="code_postal" aria-describedby="" placeholder="Enter code postal" name="code_postal">            
                  </div>
                  

                  <?= $error8?>
                  <div class="form-group">
                     <label for="civilite">Civilite</label>
                     <select class="form-control" id="civilite" name="civilite">
                     <option></option>
                     <option value="f">Feminin</option>
                     <option value="m">Masculin</option>      
                     </select>
                  </div>
                 
                  <?= $error8?>
                  <div class="form-group">
                     <label for="num_telephone">Telephone</label>
                     <input type="text" class="form-control" id="num_telephone" placeholder="telephone" name="num_telephone">
                  </div>
                  

                  <button type="submit" class="col-md-4 offset-md-4 btn btn-secondary ">Inscription</button>
                  </form>
            </div>
        </section>       
   
</div>





 <?php 
require_once("include/footer.php");
?>