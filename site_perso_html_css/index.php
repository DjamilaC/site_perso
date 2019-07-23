<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- lien Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- link fontawesome -->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <title>Emma Vacances</title>
    </head>

    <body>

    <div class="container-fluid">

        <header>

            <div class="row">

                <div class="col-md-1 bg-light">
                    <img class="logo" src="images/logo_R1.png" alt="">
                </div>

                        <!-- la barre de navigation -->
                <nav class="navbar navbar-expand-lg col-md-11 navbar-light bg-light">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"         aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse"

                        id="navbarNavAltMarkup">

                        <div class="navbar-nav">
                            <a class="nav-item nav-link active" href="index.php"> <i class="fas fa-home"></i> Accueil <span class="sr-only">(current)</span></a>

                            <a class="nav-item nav-link" href="nos_appartements.php">Nos Appartements</a>

                            <a class="nav-item nav-link" href="nos_villas.php">Nos Villas</a>

                            <a class="nav-item nav-link" href="nos_campings.php">Nos Campings</a>

                            <a class="nav-item nav-link" href="inscription.php">Inscription</a>

                            <a class="nav-item nav-link" href="connexion.php">Connexion</a>

                            <a class="nav-item nav-link" href="mon_panier.php" tabindex="-1"><i class="fas fa-shopping-cart"></i> Mon panier</a>
                            
                            <a class="nav-item nav-link" href="contact.php" tabindex="-1"><i class="fas fa-envelope"></i> Nous contacter</a>

                        </div>

                    </div>

                </nav>

                        <!-- FIN DE LA BARRE DE NAVIGATION -->
                
                                                             
            </div>
                     
                            <!--Image du header -->
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
            

            
        </header>

        <main>
                        <!-- la partie en dessous de limage du header -->
            <div class="row">

                <div class="col-md-3 offset-md-1 mt-5 text text-center">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis magnam aliquam minus dignissimos dolor at ad! Ullam eveniet est laboriosam dicta minima porro maiores aspernatur quo labore! Laborum, perspiciatis alias.</p>
                </div>
                <div class="col-md-3 mt-5 text text-center">
                    <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis magnam aliquam minus dignissimos dolor at ad! Ullam eveniet est laboriosam dicta minima porro maiores aspernatur quo labore! Laborum, perspiciatis alias.
                    </p>
                </div>
                <div class="col-md-3 mt-5 text text-center">
                    <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis magnam aliquam minus dignissimos dolor at ad! Ullam eveniet est laboriosam dicta minima porro maiores aspernatur quo labore! Laborum, perspiciatis alias.
                    </p>
                </div>

            </div>

                                         <!-- slider -->
            <div class="container">
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
                <div class="col-md-3 mt-4">

                        <div class="card mx-auto" style="width: 18rem;">
                            <img src="images/image4.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    
                                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis magnam aliquam minus dignissimos dolor at ad! Ullam eveniet est laboriosam dicta minima porro maiores </p>
                                    <h5 class="card-title text text-center">Card title</h5>
                                </div>
                        </div>

                </div>

                <div class="col-md-3 mt-4">

                        <div class="card mx-auto" style="width: 18rem;">
                            <img src="images/image3.jpg" class="card-img-top" alt="...">
                                <div class="card-body">                                    
                                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis magnam aliquam minus dignissimos dolor at ad! Ullam eveniet est laboriosam dicta minima porro maiores </p>
                                    <h5 class="card-title text text-center">Card title</h5>
                                </div>
                        </div>
                     
                </div>

                <div class="col-md-3 mt-4">

                    <div class="card mx-auto" style="width: 18rem;">
                            <img src="images/image2.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    
                                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis magnam aliquam minus dignissimos dolor at ad! Ullam eveniet est laboriosam dicta minima porro maiores </p>
                                    <h5 class="card-title text text-center">Card title</h5>
                                </div>
                    </div>

                    
                </div>
                <div class="col-md-3 mt-4">

                    <div class="card mx-auto" style="width: 18rem;">
                            <img src="images/image_pause.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    
                                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis magnam aliquam minus dignissimos dolor at ad! Ullam eveniet est laboriosam dicta minima porro maiores </p>
                                    <h5 class="card-title text text-center">Card title</h5>
                                </div>
                    </div>

                    
                </div>

            </div><!-- fin des cards -->
            

        </main> <!--Fin du Main-->


        <footer>
            <div class="row col-md-12 mt-5 pt-5">
                <div class="col-md-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit ad! Ullam eveniet est laboriosam.</p> 
                </div>
                <div class="col-md-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit ad! Ullam eveniet est laboriosam.</p> 
                </div>     
                <div class="col-md-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit ad! Ullam eveniet est laboriosam.</p> 
                </div>     
                <div class="col-md-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit ad! Ullam eveniet est laboriosam.</p> 
                </div>     
            </div>
            <div class="row">
                <p class="col-md-4 mx-auto offset-4">Suivez-nous</p>                
            </div>
            <div class="row">
                <div class="col-md-4 offset-5">
                <i class="fab fa-facebook-square"></i> &nbsp <i class="fab fa-twitter-square"></i> &nbsp <i class="fab fa-instagram"></i>                     
                </div>
                
                

            </div>
        
        
        </footer>






    </div> <!--fin du container-->


    <!-- Bibliothèque jquery de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    </html>





    