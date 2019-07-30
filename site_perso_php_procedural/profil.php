<?php
require_once("include/init.php");
if(!internauteEstConnecte())// si l'internaute n'est  pas (!) connecté, il n'a rien à faire sur la page profil, on le redirige vers la page connexion 
{
    header("Location: connexion.php"); 
}
require_once("include/header.php");

// echo'<pre>'; print_r($_SESSION); echo'</pre>';
?>
 <section>
                                    <!--Image en dessous de la nav -->
                <div class="row">
                    
                    <img class="image_header col-md-12" src="images/image_header_R.jpg" alt="">

                    <div class="col-md-6 mt-5 ml-5 search">
                        <form class="form-inline">
                            <input class="col-md-3 mt-1 mb-1" type="text" placeholder="rechercher">
                            <input class="col-md-3 offset-md-1 mt-1 mb-1" type="text" placeholder="">
                            <input class="col-md-3 offset-md-1 mt-1 mb-1" type="text" placeholder="">

                        </form>
                    </div>

                </div>
        
</section>
<h1 class="display-4 text-center">Bonjour <?=
 $_SESSION['client']['pseudo']?></h1><hr>

 <!-- 
     Réaliser une page profil en affichant toutes les données de l'internaute contenu dans la session sauf l'id_client et le statut     
  -->
 

<table class="col-md-6 mx-auto table table-secondary text-center">
<!-- les ":" et endif / endforeach remplace les accolades {} -->

    <?php foreach($_SESSION['client'] as $key => $value):?>
    <tr>
    <?php if($key != 'id_client'  && $key != 'statut'): ?>
    <th><?= $key ?></th><td><?= $value ?></td>

    <?php endif; ?>
    </tr>
    <?php endforeach; ?>

</table><hr>
<?php
// si le statut dans la session, donc dans la BDD est à 1, cela veut dire que l'on est administrateur
if($_SESSION['client']['statut'] == 1)
    $statut = 'ADMIN';
else // on tombe dans le else si le statut est à 0, donc si on est membre classique du site
    $statut = 'MEMBRE';


?>

<h3 class="text-center">Vous êtes <strong class="text-warning"><?= $statut ?></strong> du site</h3>

                
<?php
require_once("include/footer.php");
?>
