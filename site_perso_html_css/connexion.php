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
        <title>Connexion</title>
    </head>
    
    <body>

    <div class="container-fluid">  <!--Debut container-->

<header>

    <div class="row">

        <div class="col-md-1 bg-light">
        <a href="index.php"><img class="logo" src="images/logo_R1.png" alt=""></a>
            
        </div>

       <!-- la barre de navigation -->
        <nav class="navbar navbar-expand-lg col-md-11 navbar-light bg-light">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"         aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
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
        
                                                     
    </div>
            
</header>
                    <!-- Main -->
                    <main class="connexion col-md-12 mx-auto">
                     
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
                    </main> 
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