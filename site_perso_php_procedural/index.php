<?php
require_once("include/init.php");
extract($_GET);
require_once("include/header.php");
?>
<!-- Page Content -->

        <main>
                        <!-- la partie en dessous de limage du header -->
            <section class="row container-fluid mx-auto mt-5 mb-5">

                <div class="col-md-4 comfort">
                    <p><i class="fas fa-suitcase-rolling"></i></p>
                    <h5>Vos vacances de rêve commencent ici</h5>    
                    <p>
                        
                        Réservez votre location de vacances et vivez un séjour inoubliable
                    </p>
                </div>

                <div class="col-md-4 comfort">
                    <p> <img src="images/comfort.png" alt=""></p>
                    <h5>Tout le confort d’une maison</h5>
                    <p>          
                    Profitez de cuisines complètes, de piscines, de jardins et plus encore
                    </p>
                </div>

                <div class="col-md-4 comfort">
                    <p><img src="images/equipement.png" alt=""></p>
                    <h5>Bien plus qu’une location de vacances</h5>
                    <p>
                    Plus d’espace, d’intimité et tous les équipements dont vous avez besoin
                    </p>
                </div>

            </section>

                                         <!-- slider -->
            <div class="row container mx-auto">
                <div id="carouselExampleFade" class="carousel slide carousel-fade col-md-12 mx-auto" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active col-md-12">
                            <img src="images/slider1.jpg" class="d-block w-80" alt="...">
                        </div>
                        <div class="carousel-item col-md-12">
                            <img src="images/slider2.jpg" class="d-block w-80" alt="...">
                        </div>
                        <div class="carousel-item col-md-12">
                            <img src="images/slider3.jpg" class="d-block w-80" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
            </div>
            
                                        <!--fin du slider-->
            <hr>
             <!-- debut des cards -->
            <div class="row">
                <div class="col-md-4 mt-4">

                    <div class="card mx-auto" style="width: 18rem;">
                        <a href="appartement.php"><img src="images/image4.jpg" class="card-img-top" alt="..."></a> 
                        <div class="card-body">
                            
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis magnam aliquam minus dignissimos dolor at ad! Ullam eveniet est laboriosam dicta minima porro maiores </p>
                            <h5 class="card-title text text-center">Nos Appartements</h5>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 mt-4">
                        
                    <div class="card mx-auto" style="width: 18rem;">
                        <a href="villa.php"><img src="images/image3.jpg" class="card-img-top" alt="..."></a>

                        <div class="card-body">                                    
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis magnam aliquam minus dignissimos dolor at ad! Ullam eveniet est laboriosam dicta minima porro maiores </p>
                            <h5 class="card-title text text-center">Nos Villas</h5>
                        </div>

                    </div>
                        
                     
                </div>

                <div class="col-md-4 mt-4">

                    <div class="card mx-auto" style="width: 18rem;">
                        <a href="campings.php"><img src="images/image_pause.jpg" class="card-img-top" alt="..."></a> 
                            <div class="card-body">
                                
                                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis magnam aliquam minus dignissimos dolor at ad! Ullam eveniet est laboriosam dicta minima porro maiores </p>
                                <h5 class="card-title text text-center">Nos Campings</h5>
                            </div>
                    </div>

                    
                </div>

            </div><!-- fin des cards -->
            <hr>
            

        </main> <!--Fin du Main-->


<?php 
require_once("include/footer.php");
?>