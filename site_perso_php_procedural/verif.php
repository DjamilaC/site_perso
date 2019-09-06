    <?php
    require_once("../include/init.php");
    require_once("../include/header.php");
    /*
    	********************************************************************************************
    	CONFIGURATION
    	********************************************************************************************
    */
    // destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
    $destinataire = 'aziz.tobbal@dbmail.com';

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
        $email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
        $objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
        $message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';

        // On va vérifier les variables et l'email ...
        $email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré

        if (($nom != '') && ($email != '') && ($objet != '') && ($message != '')) {
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

            $objet = html_entity_decode($objet);
            $objet = str_replace($caracteres_speciaux, $caracteres_remplacement, $objet);

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
                // echo '<h2 class="text-dark text-center mt-4>' . $message_envoye . '</h2>';
                echo '<p class="message_contact">' . $message_envoye . '</p>';
            } else {
                // echo '<h2 class="text-dark text-center mt-4>' . $message_non_envoye . '</h2>';
                echo '<p>' . $message_non_envoye . '</p>';
            };
        } else {
            // une des 3 variables (ou plus) est vide ...
            // echo '<h2 class="text-dark text-center mt-4>' . $message_formulaire_invalide . ' <a href="contact.php"> </a></h2>' . "\n";
            echo '<p>' . $message_formulaire_invalide . ' <a href="contact.html">Retour au formulaire</a></p>' . "\n";
        };
    }; // fin du if (!isset($_POST['envoi']))


    ?>

    <form id="contact" class="text-center" method="post" action="contact.php">



        <!-- le nom -->
        <div class="form-group col-md-2 mx-auto">
            <label for="nom">Votre nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="...">
        </div>



        <!-- le mail -->
        <div class="form-group col-md-3 mx-auto">
            <label for="email">Votre adresse mail</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="...">
            <!-- pour le type, mettre un text au lieu de email, pour pouvoir faire une vérification php sur le navigateur -->
        </div>

        <div class="form-group col-md-2 mx-auto">
            <label for="objet">Objet</label>
            <input type="text" class="form-control" id="objet" name="objet" placeholder="...">
        </div>

        <div class="form-group col-md-4 mx-auto">
            <label for="message">Votre message</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>


        <button type="submit" name="envoi" class="btn btn-dark btn-sm submit mt-4">Envoyer</button>

        <!-- <div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer le formulaire !" /></div> -->
    </form>

    <?php
    require_once("../include/footer.php");
    ?>