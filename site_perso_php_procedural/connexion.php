
<?php
require_once("include/init.php");
extract($_GET);
require_once("include/header2.php");
?>
<!-- page Content -->
<div class="container-fluid">    
       <section class="row connexion">        
                        
            <div class="col-md-12 mx-auto">
                     
                     <form method="post" action="" class="col-md-4 offset-md-3 form_connexion">
                         <h2 class="titre-connexion text text-center">Connexion</h2>
                         
                         <div class="form-group text text-center mt-5">
                             <label class="text text-white label" for="email_pseudo">Email / Pseudo</label>
                             <input type="text" class="form-control bg bg-transparent" id="email_pseudo" placeholder="email ou pseudo" name="email_pseudo">
                         </div> 
 
                         <div class="form-group text text-center">
                             <label for="mdp" class="text text-white label"
                             >Mot de passe</label>
                             <input type="text" class="form-control bg bg-transparent text text-light" id="mdp" placeholder="Mot de passe" name="mdp">
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