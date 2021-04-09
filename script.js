//On définit une variable pour empêcher les conflits entre librairies
let j = jQuery.noConflict();

j(document).ready(function() {
    j('#button').on('click', function(e) {
        e.preventDefault();
        let isValid = true;
        j('form input').each(function() {
            let element = j(this);
            let val_champ = element.val();
            let id_champ = element.attr("id");

            //On vérifie que tous les champs ont bien été complétés
            if (val_champ == "") {
                isValid = false;
                element.addClass('error');
                element.parent().append('<p class="error-message"></p>');
                if (id_champ == "name") {
                    element.parent().children('.error-message').html('Merci de renseigner votre nom !');
                }
                else if (id_champ == "surname") {
                    element.parent().children('.error-message').html('Merci de renseigner votre prénom !');
                }
                else if (id_champ == "mail") {
                    element.parent().children('.error-message').html('Merci de renseigner votre adresse e-mail !');
                }
                else if (id_champ == "phone") {
                    element.parent().children('.error-message').html('Merci de renseigner votre numéro de téléphone !');
                }
            }
        });
        //On vérifie qu'un message a bien été écrit
        if (j('#message').val() == "") {
            isValid = false;
            j('#message').addClass('error');
            j('#message').parent().append('<p class="error-message">Merci de compléter le contenu de votre message !</p>');
        }

        //Si tous les champs sont complétés, on envoie le formulaire
        if (isValid == true) {
            var inputs = j('form').find("input, select, button, textarea");

            inputs.prop("disabled", false);

            var serializedData = j('form').serialize();

            inputs.prop("disabled", true);

            request = j.ajax({
                url: "sendmail.php",
                type: "post",
                data : serializedData
            });

            request.done(function (response, textStatus, jqXHR) {
                if (response !== 'OK') {
                    j('#button').parent().append('<p class="error-message center">' + response + '</p>');
                } else {
                    j('#button').parent().append('<p class="success">Votre message a bien été envoyé !</p>');
                }
            });

            request.fail(function (jqXHR, textStatus, errorThrow){
                console.error(
                    "L'erreur suivante est survenue: "+textStatus, errorThrow
                );
            });

            request.always(function () {
                inputs.prop("disabled", false);
            });
        }
    });
});