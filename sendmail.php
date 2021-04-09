<?php
    $nom = (isset($_POST["name"]))?$_POST["name"]:"";
    $prenom = (isset($_POST["surname"]))?$_POST["surname"]:"";
    $mail = (isset($_POST["mail"]))?$_POST["mail"]:"";
    $tel = (isset($_POST["phone"]))?$_POST["phone"]:"";
    $message = (isset($_POST["message"]))?$_POST["message"]:"";

    if (!empty($nom)) {
        $nom = trim($nom);
    } else {
        echo 'Merci de renseigner votre nom !';
        return;
    }

    if (!empty($prenom)) {
        $prenom = trim($prenom);
    }  else {
        echo 'Merci de renseigner votre prénom !';
        return;
    }

    //On vérifie la validité de l'adresse mail
    if (!empty($mail)) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL) == false) {
            echo 'L\'adresse e-mail saisie n\'est pas valide !';
            return;
        }
    } else {
        echo 'Merci de renseigner votre adresse e-mail !';
        return;
    }
    //On vérifie que le numéro de téléphone est bien un integer
    if (!empty($tel)) {
        if (filter_var($tel, FILTER_SANITIZE_NUMBER_INT) == false) {
            echo 'Le numéro de téléphone saisie n\'est pas valide !';
            return;
        }
    } else {
        echo 'Merci de renseigner votre numéro de téléphone !';
        return;
    }

    if (!empty($message)) {
        $message = stripslashes(htmlspecialchars(trim($message)));
    } else {
        echo 'Merci de compléter le contenu de votre message !';
        return;
    }

    //Création du mail

    $to = 'contact@simontricoire.fr';

    $subject = 'Message de contact du site';

    //Création du message
    $msg = '';
    $msg .= 'Nom : '.$nom.'\r\n';
    $msg .= 'Prenom : '.$prenom.'\r\n';
    $msg .= 'Telephone : '.$tel.'\r\n';
    $msg .= 'Mail : '.$mail.'\r\n';
    $msg .= 'Message : '.$message.'\r\n';

    //En-têtes du mail
    $headers = array(
        'From' => 'contact@simontricoire.fr',
        'Reply-To' => 'contact@simontricoire.fr',
        'X-Mailer' => 'PHP/' . phpversion()
    );

    //Envoi du mail
    mail($to, $subject, $msg, $headers);

    echo 'OK';
?>