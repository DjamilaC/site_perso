<?php
require_once("include/init.php");
extract($_GET);

     $resultat =$bdd->prepare("SELECT * FROM locations WHERE type = :type");
    $resultat->bindValue(':type', villa , PDO::PARAM_STR);
    $resultat->execute();

    require_once("include/header.php");
    // echo '<pre>'; print_r($location); echo '</pre>';
?>


    <?php 
    while ($location = $resultat->fetch(PDO::FETCH_ASSOC)) : ?>   
   

    

        <h1 class="text text-center mt-3 mb-3">Bienvenue dans nos villas</h1>

        <div class="container-fluid card-tile">

        
            <div class="tile-wrap">
                <a href="detail_location.php?id=<?= $location['id_location'] ?>">
                    <img src="images/<?= $location['photo'] ?>" alt="<?= $location['titre'] ?>" class="tile-image"/>
                    <div class="tile-text">
                        <h2 class="tile-title"><?= $location['description'] ?></h2>
                        <p class="tile-description"><?= $location['titre'] . '<br>' . $location['adresse'] . '<br>' . $location['etat'] ?></p>
                    </div>
                </a>
            </div>
          <?php endwhile; ?>   
        </div>
       
    



<?php 
require_once("include/footer.php");
?>