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
        <link rel="stylesheet" href="<?= URL ?>include/css/style.css">
        <title>EMMA Vacances</title>
    </head>

    <body>

    <div class="container-fluid">

        <header>

            <div class="row">

                <div class="col-md-1 bg-light">
                <a href="<?= URL ?>index.php"><img id="logo" src="<?= URL ?>images/logo_R2.png" alt=""></a>
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
                        
                        <?php if(internauteEstConnecte()): // accés membre connecté non ADMIN ?>
                            
                            <a class="nav-item nav-link active" href="<?= URL ?>index.php"> <i class="fas fa-home"></i> Accueil <span class="sr-only">(current)</span></a>

                            <a class="nav-item nav-link" href="<?= URL ?>appartements.php">Nos Appartements</a>

                            <a class="nav-item nav-link" href="<?= URL ?>villas.php">Nos Villas</a>

                            <a class="nav-item nav-link" href="<?= URL ?>campings.php">Nos Campings</a>
                            
                            <a class="nav-item nav-link" href="<?= URL ?>connexion.php?action=deconnexion"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>

                            <a class="nav-item nav-link" href="<?= URL ?>panier.php" tabindex="-1"><i class="fas fa-shopping-cart"></i> Mon panier</a>
                            
                            <a class="nav-item nav-link" href="<?= URL ?>profil.php" tabindex="-1"><i class="fas fa-users"></i> Profil</a>
                            <a class="nav-item nav-link" href="<?= URL ?>contact.php"><i class="fas fa-envelope"></i> Contact</a>
                                     
                            <?php else: // accés visiteur non connecté ?>

                                <a class="nav-item nav-link active" href="<?= URL ?>index.php"> <i class="fas fa-home"></i> Accueil <span class="sr-only">(current)</span></a>

                            <a class="nav-item nav-link" href="<?= URL ?>appartements.php">Nos Appartements</a>

                            <a class="nav-item nav-link" href="<?= URL ?>villas.php">Nos Villas</a>

                            <a class="nav-item nav-link" href="<?= URL ?>campings.php">Nos Campings</a>

                            <a class="nav-item nav-link" href="<?= URL ?>inscription.php">Inscription</a>

                            <a class="nav-item nav-link" href="<?= URL ?>connexion.php"><i class="fas fa-sign-in-alt"></i> Connexion</a>
                            

                            <a class="nav-item nav-link" href="<?= URL ?>panier.php" tabindex="-1"><i class="fas fa-shopping-cart"></i> Mon panier</a>
                            <a class="nav-item nav-link" href="<?= URL ?>contact.php"><i class="fas fa-envelope"></i> Contact</a>

                            <?php endif; ?>

                            <?php if(internauteEstConnecteEstAdmin()): ?>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administration</a>
                            <div class="dropdown-menu bg-secondary" aria-labelledby="dropdown04">
                            <a class="dropdown-item text-light" href="<?= URL ?>admin/gestion_location.php">Gestion Location</a>
                            <a class="dropdown-item text-light" href="<?= URL ?>admin/gestion_reservation.php">Gestion Reservation</a>
                            <a class="dropdown-item text-light" href="<?= URL ?>admin/gestion_client.php">Gestion Client </a>         
                        </div>
                        </li>
                        <?php endif; ?>


                        </div>

                    </div>

                </nav>

                        <!-- FIN DE LA BARRE DE NAVIGATION -->
                
                                                             
            </div>
                     
                       
        </header>