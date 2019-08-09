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
<section class="reservation-form">
<h1 class="text text-center">veuilez remplir le formulaire de reservation</h1>

        <form method="post" action="" class="col-md-4 offset-md-4 mt-5 mb-5 form_connexion_inscription">

            <div class="form-group">
                <label for="date_debut_vacanc">Date debut de vacances</label>
                <input type="date" class="form-control" id="date_debut_vacanc" aria-describedby="" placeholder="Enter un date_debut_vacanc" name="date_debut_vacanc" value="">    
            </div>

            <div class="form-group">
                <label for="date_fin_vacanc">Date fin de vacances</label>
                <input type="date" class="form-control" id="date_fin_vacanc" aria-describedby="" placeholder="date_fin_vacanc" name="date_fin_vacanc" value="">    
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input type="text" class="form-control" id="email" aria-describedby="" placeholder="Enter email" name="email" value="">            
            </div>

            <div class="form-group">
                <label for="duree_vacanc">duree_vacanc</label>
                <input type="text" class="form-control" id="duree_vacanc" aria-describedby="" placeholder="enter duree de vacances" name="duree_vacanc" value="">
            </div>        

                    
            <div class="form-group">
                <label for="nbre_vacanciers">Nombre de vacanciers</label>
                <select class="form-control" id="nbre_vacanciers" name="nbre_vacanciers" value="">
                    <option>choisir un nombre </option>
                    <option value="1">1</option>            
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>              
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom_client" aria-describedby="" placeholder="Saisir un nom" name="nom_client"> 
            </div>
            <!-- le prénom -->

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom_client" aria-describedby="" placeholder="Saisir un prenom" name="prenom_client">            
            </div>             

            <!-- L'email -->

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

            <div class="form-group">
                <label for="code_postal">Code_Postal</label>
                <input type="text" class="form-control" id="code_postal" aria-describedby="" placeholder="Enter code postal" name="code_postal">            
            </div>
                <div class="form-group">
                <label for="civilite">Civilite</label>
                <select class="form-control" id="civilite" name="civilite">
                <option></option>
                <option value="f">Feminin</option>
                <option value="m">Masculin</option>      
                </select>
            </div>
            
            <div class="form-group">
                <label for="num_telephone">Telephone</label>
                <input type="text" class="form-control" id="num_telephone" placeholder="telephone" name="num_telephone">
            </div>

            <button type="submit" class="col-md-4 offset-md-4 btn btn-secondary ">valider</button>

        </form>

</section>



                    




<?php 
require_once("include/footer.php");
?>