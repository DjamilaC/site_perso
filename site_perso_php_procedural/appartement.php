<?php
require_once("include/init.php");
extract($_GET);
require_once("include/header2.php");
?>
<!-- Page Content -->

<main>

    <h1 class="text text-center mt-3 mb-3">Bienvenue dans nos villas</h1>
    <div class="container-fluid card-tile">
        <div class="tile-wrap">
            <a href="detail_location.php">
                <img src="images/villa_card3.jpg" alt="" class="tile-image"/>
                <div class="tile-text">
                <h2 class="tile-title">Earl Hines</h2>
                <p class="tile-description">Earl Kenneth Hines, universally known as Earl "Fatha" Hines, was an American jazz pianist and bandleader.</p>
                </div>
            </a>
    </div>
    
</main>



<?php 
require_once("include/footer.php");
?>