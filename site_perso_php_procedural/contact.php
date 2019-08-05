<?php
require_once("include/init.php");
extract($_GET);
require_once("include/header.php");
?>
<div class="container-fluid">    
      <section class="row inscription">        
                        
         <div class="col-md-12 mx-auto">
            <div class="col-md-6 offset-md-4 mx-auto mt-5 contact">
                
                <p><i class="fas fa-envelope"></i> &nbsp Email: djamila.chabane@lepoles.com</p>
                <p><i class="fas fa-phone"></i> &nbsp  07 53 26 85 76</p>
            </div>
            <form method="post" action="" class="col-md-4 offset-md-4 mt-5 mb-5 form_connexion_inscription">

                  <h1 class="text text-center mx-auto pt-5"> Me contacter</h1>
                  <?= $error?>

                  <div class="form-group">
                     <label for="nom">Nom</label>
                     <input type="text" class="form-control" id="nom_client" aria-describedby="" placeholder="Votre nom" name="nom_client"> 
                  </div>

                   <!-- le prénom -->

                  <div class="form-group">
                     <label for="prenom">Prénom</label>
                     <input type="text" class="form-control" id="prenom_client" aria-describedby="" placeholder="Votre prénom" name="prenom_client">            
                  </div>

                  <!-- L'email -->

                  <div class="form-group">
                     <label for="email">Email</label>
                     <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Votre email" name="email">    
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                 </div>

                  <button type="submit" class="col-md-4 offset-md-4 btn btn-secondary ">Envoyer</button>
                  </form>
            </div>
        </section>       
   
</div>







<?php 
require_once("include/footer.php");
?>