$(function(){

    $.validator.addMethod("PWCHECK", function(value,element){
        if(/^(?=.*?[A-Z]{1,})(?=(.*[a-z]){1,})(?=(.*[0-9]){1,})(?=(.*[$@$!%*?&;:]){1,}).{8,}$/.test(value)){
            return true;
        }else{
            return false;
        }
    });

    $("#inscription_form").validate(
        {
            rules:{
                nom_per:{
                    "required":true,
                    "minlength":2
                },
                prenom_per:{
                    "required":true,
                    "minlength":2
                },
                email_per:{
                    "required":true,
                    "email":true
                },
                password:{
                    "required":true,
                    PWCHECK:true
                },
                password_conf:{
                    "required":true,
                    "equalTo":"#password"
                }
            },
            messages:{
                nom_per:{
                    required :"Veuillez saisir votre nom",
                    minlength:"Votre nom doit être composé de 2 caractères au minimum"
                },
                prenom_per:{
                    required :"Veuillez saisir votre prenom",
                    minlength:"Votre prenom doit être composé de 2 caractères au minimum"
                },
                email_per:{
                    required:"Veuillez saisir votre email",
                    email: "Votre adresse e-mail doit avoir le format suivant : name@domain.com"
                },
                password:{
                    required:"Veuillez saisir votre mot de passe",
                    PWCHECK:"mot de passe pas assez compliqué"
                },
                password_conf:{
                    required:"Veuillez saisir une deuxième fois votre mot de passe",
                    equalTo:"Les mots de passe ne sont pas identiques"
                }
            }
        }
    );

});