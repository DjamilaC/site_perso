<?php
require_once("include/init.php");
extract($_GET);

$resultat =$bdd->prepare("SELECT * FROM locations WHERE type = :type");
    $resultat->bindValue(':type', 'appartement' , PDO::PARAM_STR);
    $resultat->execute();



require_once("include/header.php");

?>
<h1 class="text text-center mt-3 mb-3">Bienvenue dans nos appartements</h1>
  
  <section class="container">
        <?php 
            while ($location = $resultat->fetch(PDO::FETCH_ASSOC)) : ?>         
                    <div class="tile-wrap">
                        <a href="detail_location.php?id=<?= $location['id_location'] ?>">
                            <img src="images/<?= $location['photo'] ?>" alt="<?= $location['titre'] ?>" class="tile-image"/>
                            <div class="tile-text">
                                <h2 class="tile-title"><?= $location['titre'] ?></h2>
                                <p class="tile-description"><?= $location['description'] . '<br>' . $location['ville'] . '<br>' . $location['etat'] ?></p>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>   
           
       

  </section>







<?php 
require_once("include/footer.php");
?>