
<?php
require_once("include/init.php");
extract($_GET);
require_once("include/header2.php");
?>
<!-- Page Content -->
<div class="container-fluid">    
      <section class="row inscription">        
                        
         <div class="col-md-12 mx-auto">

            <form method="post" action="" class="col-md-4 offset-md-4 mt-5 mb-5 form_connexion_inscription">

                  <h1 class="text text-center mx-auto pt-5"> Je m'inscris</h1>

                  <div class="form-group">
                     <label for="nom">Nom</label>
                     <input type="text" class="form-control" id="nom" aria-describedby="" placeholder="Saisir un nom" name="nom">            
                  </div>

                  <div class="form-group">
                     <label for="prenom">Prénom</label>
                     <input type="text" class="form-control" id="prenom" aria-describedby="" placeholder="Saisir un prenom" name="prenom">            
                  </div>

                  <div class="form-group">
                     <label for="pseudo">Pseudo</label>
                     <input type="text" class="form-control" id="pseudo" aria-describedby="" placeholder="Saisir un pseudo" name="pseudo">            
                  </div>

                  <div class="form-group">
                     <label for="mdp">Mot de passe</label>
                     <input type="text" class="form-control" id="mdp" placeholder="Saisir un mot de passe" name="mdp">
                  </div>

                  <div class="form-group">
                     <label for="confirmmdp">Confirmer mot de passe</label>
                     <input type="text" class="form-control" id="confirmmdp" aria-describedby="" placeholder="confirmer mot de passe" name="confirmmdp">            
                  </div>

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
                     <label for="codepostal">Code_Postal</label>
                     <input type="text" class="form-control" id="codepostal" aria-describedby="" placeholder="Enter code postal" name="codepostal">            
                  </div>


                  <div class="form-group">
                     <label for="sexe">Sexe</label>
                     <select class="form-control" id="sexe">
                     <option></option>
                     <option>Feminin</option>
                     <option>Masculin</option>      
                     </select>
                  </div>

                  <div class="form-group">
                     <label for="tel">Telephone</label>
                     <input type="text" class="form-control" id="tel" placeholder="telephone" name="tel">
                  </div>

                  <button type="submit" class="col-md-4 offset-md-4 btn btn-secondary ">Inscription</button>
                  </form>
            </div>
        </section>       
   
</div>





 <?php 
require_once("include/footer.php");
?>