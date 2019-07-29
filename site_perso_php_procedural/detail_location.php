<?php
require_once("include/init.php");
extract($_GET);
require_once("include/header.php");
?>
<!-- Page Content -->
<main class="container-fluid">
           <h1 class="text text-center mt-5 mb-5">Bienvenue dans nos villas</h1>

           <div class="row">
                                              <!--Debut du slider-->
               <div class="col-md-8">

                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        
                    
                                <div class="carousel-inner">

                                        <div class="carousel-item active">
                                            <img src="images/villa_slider1.jpg" class="d-block w-100" alt="...">
                                        </div>

                                        <div class="carousel-item">
                                            <img src="images/villa_slider2.jpg" class="d-block w-100" alt="...">
                                        </div>

                                        <div class="carousel-item">
                                            <img src="images/villa_slider3.jpg" class="d-block w-100" alt="...">
                                        </div>

                                        <div class="carousel-item">
                                            <img src="images/villa_slider4.jpeg" class="d-block w-100" alt="...">
                                        </div>

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"      data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a>
                    </div>
                                            
               </div> 
                            <!--Fin du slider-->
                            
               <div class="map col-md-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2629.976044306682!2d2.400797815921941!3d48.763253779278216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e67462be05e0cd%3A0xee10b7d221f3ffec!2s27+Avenue+Gambetta%2C+94600+Choisy-le-Roi!5e0!3m2!1sfr!2sfr!4v1563532149129!5m2!1sfr!2sfr" width="600" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
               </div>
           </div> 
           
            <hr>

            <!-- --------------------------------Description de la location------------------------------ -->

            <div class="row"> <!--Debut de la row--> 
                    <section class="col-md-7 offset-md-1 detail_location">
                        <h4>Description</h4>
                        <hr>
                        
                            <p>
                                &nbsp &nbsp Un logement adéquat pour deux personnes avec patio et piscine privée, très bon éclairage dans toutes les pièces de la maison. Surtout situé dans le centre de l'île pour les personnes avec un court trajet en voiture peut atteindre tous les coins de l'île.
                                Connecté avec d'innombrables routes secondaires parfaites pour pratiquer toutes sortes de sports, faire du vélo, de la randonnée,du patinage,de la marche, etc.
                                A 500m nous avons la paternité Palma-Manacor pour aller rapidement à d'innombrables endroits sur l'île.
                                Nous vous recommandons de visiter, Puig de Bonany, Finca est Calderes XVII siècle, Perlas de Mallorca.
                                Restaurant es Cruce, Restaurant ca Na Miquela, Restaurant c'an Salom
                            </p>
                        <hr>
                        <br>
                        <h4>Equipements</h4>
                        
                        <p> <i class="fas fa-swimming-pool"></i> &nbsp Piscine</p>    
                        <p> <i class="fas fa-wifi"></i> &nbsp Internet</p>    
                        <p> <i class="fas fa-temperature-low"></i> &nbsp Climatisation</p>    
                        <p> <i class="fas fa-dumpster-fire"></i> &nbsp Cheminée</p>    
                        <p> <i class="fas fa-tv"></i> &nbsp Télévision</p>    
                        <p> <i class="fas fa-satellite-dish"></i> &nbsp Satellite ou Câble</p>
                        <p> <i class="fas fa-bath"></i> &nbsp salle de Bain</p>    
                        <p>Lave-linge et sèche-linge</p>    
                        <p> <i class="fas fa-thermometer-full"></i> &nbsp Chauffage</p>

                    </section>

        <!--------------------------------Formulaire de reservation--------------------------------- -->

                    <section class="col-md-3 ml-3 mt-5 mb-2 reservation">
                        <h4>Choisissez vos dates</h4>
                            <form method="post" action="" class="form_reservation mt-4">

                                    <div class="form-group ">
                                        <label for="date_debut_vacanc">Date debut de séjour</label>
                                        <input type="date" class="form-control" id="date_debut_vacanc" placeholder="date debut de sejour" name="date_debut_vacanc">
                                    </div> 

                                    <div class="form-group ">
                                        <label for="date_fin_vacanc">Date fin de séjour</label>
                                        <input type="date" class="form-control" id="date_fin_vacanc" placeholder="date fin de sejour" name="date_fin_vacanc">
                                    </div>             

                                    <button type="submit" class="btn btn-primary col-md-12">Reserver</button>

                            </form>
                    </section>

           </div> <!--Fin de la row-->           
       </main>

    <?php 
    require_once("include/footer.php");
    ?>