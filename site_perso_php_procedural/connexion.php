
<?php
require_once("include/init.php");
extract($_GET);
require_once("include/header2.php");
?>
<!-- page Content -->
<div class="container-fluid">    
       <section class="row connexion">        
                        
            <div class="col-md-12 mx-auto">
                     
                     <form method="post" action="" class="col-md-4 offset-md-4 mt-5 form_connexion_inscription">
                         <h1 class="text text-center pt-5">Je me connecte</h1>
                         
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