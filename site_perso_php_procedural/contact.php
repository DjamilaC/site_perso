<?php
require_once("include/init.php");
// extract($_GET);
require_once("include/header.php");
?>
<?php
/*
    	********************************************************************************************
    	CONFIGURATION
    	********************************************************************************************
    */
    // destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
    $destinataire = 'chabane.djamila.chabane@gmail.com';

    // copie ? (envoie une copie au visiteur)
    $copie = 'oui'; // 'oui' ou 'non'

    // Messages de confirmation du mail
    $message_envoye = "Votre message nous est bien parvenu !";
    $message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";

    // Messages d'erreur du formulaire
    $message_erreur_formulaire = "Pour me contacter, merci de remplir ce formulaire<a href=\"contact.php\"> </a>.";
    $message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";

    /*
    	********************************************************************************************
    	FIN DE LA CONFIGURATION
    	********************************************************************************************
    */

    // on teste si le formulaire a été soumis
    if (!isset($_POST['envoi'])) {
        // formulaire non envoyé
        echo '<h1 class="text-center mt-4">' . $message_erreur_formulaire . '</h1>' . "\n";
    } else {
        /*
    	 * cette fonction sert à nettoyer et enregistrer un texte
    	 */
        function Rec($text)
        {
            $text = htmlspecialchars(trim($text), ENT_QUOTES);
            if (1 === get_magic_quotes_gpc()) {
                $text = stripslashes($text);
            }

            $text = nl2br($text);
            return $text;
        };

        /*
    	 * Cette fonction sert à vérifier la syntaxe d'un email
    	 */
        function IsEmail($email)
        {
            $value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
            return (($value === 0) || ($value === false)) ? false : true;
        }

        // formulaire envoyé, on récupère tous les champs.
        $nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
      //   $prenom     = (isset($_POST['prenom']))     ? Rec($_POST['prenom'])     : '';
        $email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';     
        $message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';

        // On va vérifier les variables et l'email ...
        $email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré

        if (($nom != '') && ($email != '') && ($message != '')) {
            // les 4 variables sont remplies, on génère puis envoie le mail
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'From:' . $nom . ' <' . $email . '>' . "\r\n" .
                'Reply-To:' . $email . "\r\n" .
                'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed ' . "\r\n" .
                'Content-Disposition: inline' . "\r\n" .
                'Content-Transfer-Encoding: 7bit' . " \r\n" .
                'X-Mailer:PHP/' . phpversion();

            // envoyer une copie au visiteur ?
            if ($copie == 'oui') {
                $cible = $destinataire . ';' . $email;
            } else {
                $cible = $destinataire;
            };

            // Remplacement de certains caractères spéciaux
            $caracteres_speciaux     = array('&#039;', '&#8217;', '&quot;', '<br>', '<br />', '&lt;', '&gt;', '&amp;', '…',   '&rsquo;', '&lsquo;');
            $caracteres_remplacement = array("'",      "'",        '"',      '',    '',       '<',    '>',    '&',     '...', '>>',      '<<');       

            $message = html_entity_decode($message);
            $message = str_replace($caracteres_speciaux, $caracteres_remplacement, $message);

            // Envoi du mail
            $num_emails = 0;
            $tmp = explode(';', $cible);
            foreach ($tmp as $email_destinataire) {
                if (mail($email_destinataire, $objet, $message, $headers))
                    $num_emails++;
            }

            if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1))) {
                echo '<h1 class="text-center mt-4">' . $message_envoye . '</h1>';
            } else {
                echo '<h1 class="text-center mt-4">' . $message_non_envoye . '</h1>';
            };
        } else {
            // une des 3 variables (ou plus) est vide ...
            echo '<h1 class="text-center mt-4">' . $message_formulaire_invalide . ' <a href="contact.html"> </a></h1>' . "\n";
        };
    }; // fin du if (!isset($_POST['envoi']))


    ?>

<div class="container-fluid">    
      <section class="row inscription">        
                        
         <div class="col-md-12 mx-auto">
            <div class="col-md-6 offset-md-4 mx-auto mt-5 contact">
                
                <p><i class="fas fa-envelope"></i> &nbsp Email: djamila.chabane@lepoles.com</p>
                <p><i class="fas fa-phone"></i> &nbsp  07 53 26 85 76</p>
                <p> <i class="fas fa-map-marker-alt"></i> &nbsp 27 Avenue Gambetta 94600 Choisy-le-roi</p>
            </div>
            <form method="post" action="contact.php" class="col-md-4 offset-md-4 mt-5 mb-5 form_connexion_inscription">

                  <h1 class="text text-center mx-auto pt-5"> Me contacter</h1>
                  
                  <div class="form-group">
                     <label for="nom">Nom</label>
                     <input type="text" class="form-control" id="nom" aria-describedby="" placeholder="Votre nom" name="nom"> 
                  </div>

                   <!-- le prénom -->

                  <!-- <div class="form-group">
                     <label for="prenom">Prénom</label>
                     <input type="text" class="form-control" id="prenom_client" aria-describedby="" placeholder="Votre prénom" name="prenom_client">            
                  </div> -->

                  <!-- L'Email -->

                  <div class="form-group">
                     <label for="email">Email</label>
                     <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Votre email" name="email">    
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                 </div>

                  <button type="submit" name="envoi" class="col-md-4 offset-md-4 btn btn-secondary ">Envoyer</button>
                  </form>
            </div>
        </section>       
   
</div>







<?php 
require_once("include/footer.php");
?>