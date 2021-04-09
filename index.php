<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de contact</title>
    <meta name="description" content="Formulaire de contact">
	<link rel="canonical" href="">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 id="title">Formulaire de contact</h1>
    <div id="form_container">
        <form id="contact_form" action="sendmail.php" method="post">
            <div class="form-display">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" placeholder="Votre nom" required>
            </div>
            <div class="form-display">
                <label for="surname">Prénom</label>
                <input type="text" name="surname" id="surname" placeholder="Votre prénom" required>
            </div>
            <div class="form-display">
                <label for="mail">Adresse e-mail</label>
                <input type="email" name="mail" id="mail" placeholder="Votre adresse e-mail" required>
            </div>
            <div class="form-display">
                <label for="phone">Numéro de telephone</label>
                <input type="tel" name="phone" id="phone" placeholder="Votre numéro de téléphone" required>
            </div>
            <div class="form-message">
                <label for="message">Message</label>
                <textarea name="message" id="message" placeholder="Votre message" required></textarea>
            </div>
            <input id="button" type="submit" value="Envoyer">
        </form>
    </div>
    <footer>
        <p>© <a href="https://simontricoire.fr">Simon Tricoire</a> - <?= date('Y') ?></p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>