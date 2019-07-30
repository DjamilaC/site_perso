
<?php
require_once("include/init.php");

extract($_POST);
if(internauteEstConnecte())// si l'internaute est connecté, il n'a rien à faire sur la page 
{
    header("Location: profil.php"); 
}

// si l'indice 'action' est defini dans l'URL et qu'il a comme valeur 'deconnexion, cela veut dire que l'on a cliqué sur le lien 'deconnexion', du coup on supprime le fichier sesssion.
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
{    
    unset($_SESSION);
    session_destroy();
    header("Location:index.php");
}

if (isset($_GET['action']) && $_GET['action'] == 'validate') {
        $validate .= '<div class="col-md-6 offset-md-3 alert alert-success text-dark">Félicitations, vous etes inscrits sur le site. Vous pouvez dès a présent vous connecter !!</div>';
    }

    // echo '<pre>'; print_r($_POST); echo'</pre>';
    if($_POST) {
        // on selectionne tout dans la table membre à condition que la colonne pseudo_email de la BDD soit bien égale au pseudo ou email saisie dans le formulaire
        $verif_pseudo_email = $bdd->prepare("SELECT * FROM client WHERE pseudo = :pseudo OR email = :email") ;
        $verif_pseudo_email->bindValue(':pseudo', $email_pseudo, PDO::PARAM_STR);
        $verif_pseudo_email->bindValue(':email', $email_pseudo, PDO::PARAM_STR);
        $verif_pseudo_email->execute();
        
        // si le resultat de la requete de selection est superieur à 0, cela veut dire que l'internaute a saisie un bon email ou bon pseudo, donc entre dans le if.
        // if(password_verif($mdp,$membre['mdp'])) /si on hache le mot de passe à l'inscription'password_hash)/ password_verif permet de comparer une clé de hachage à une chaine de caractère.
        if($verif_pseudo_email->rowCount()>0)
        {
            
                $client = $verif_pseudo_email->fetch(PDO::FETCH_ASSOC);// on recupere les données en BDD de l'internaute qui a saisi le bon pseudo ou le bon email, on va pouvoir comparer les mots de passe.
                // echo '<pre>'; print_r($client); echo'</pre>';
                // on entre dans le if seulement dans le cas où l'internaute a saisi le bon email/pseudo et le bon mdp

                if($client['mdp'] == $mdp)
                {         

                foreach($client as $key => $value)
                {
                    if($key != 'mdp')
                    {
                        $_SESSION['client'][$key]= $value; // pour chaque tour de boucle on enregistre
                    }
                }
                // echo '<pre>'; print_r($_SESSION); echo'</pre>';
                header("Location: profil.php");
                
                }else{
                    $error .='<div class="col-md-6 offset-md-3 text-center alert alert-danger"> Mot de passe eronné!!! </div>';             
                }
                // echo 'pseudo / email valide';
        } // fin if verif_pseudo_email
                else// on entre dans le else si l'internaute n'a pas saisi le bon email ou le bon pseudo
                {
                    $error .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger"> Le pseudo ou email : <strong>' . $email_pseudo . '</strong> est inconnu dans la base de données !!</div>'; 
                } 
    } // fin if $_POST

        
require_once("include/header.php");
?>


<!-- page Content -->
<div class="container-fluid">    
       <section class="row connexion">        
                        
            <div class="col-md-12 mx-auto">
                     
                     <form method="post" action="" class="col-md-4 offset-md-4 mt-5 form_connexion_inscription">
                         <h1 class="text text-center pt-5">Je me connecte</h1>
                         <?= $validate ?>
                         <?= $error ?>
                         <div class="form-group">
                             <label for="email_pseudo">Email / Pseudo</label>
                             <input type="text" class="form-control" id="email_pseudo" placeholder="email ou pseudo" name="email_pseudo">
                         </div> 
 
                         <div class="form-group">
                             <label for="mdp">Mot de passe</label>
                             <input type="text" class="form-control" id="mdp" placeholder="Mot de passe" name="mdp">
                         </div>             
                         
                         <button type="submit" class="col-md-4 offset-md-4 btn btn-secondary" >Connexion</button>
 
                     </form>   
            </div>
        </section> 
        <!-- <hr>  -->
    
   
</div>


<?php 
require_once("include/footer.php");
?>