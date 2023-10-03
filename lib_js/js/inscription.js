$(function(){

    $("#news_letter").on('click', function (){
        if($(this).is(':checked')){
            $(this).val(1);
        }else{
            $(this).val(0);
        }
    });

    $.validator.addMethod("PWCHECK", function(value,element){
        if(/^(?=.*?[A-Z]{1,})(?=(.*[a-z]){1,})(?=(.*[0-9]){1,})(?=(.*[$@$!%*?&;:]){1,}).{8,}$/.test(value)){
            return true;
        }else{
            return false;
        }
    });

    $("#inscription_form").validate(
        {
            //debug:true,
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
                    equalTo:"#password"
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
            },
            submitHandler: function(form){
                console.log("formulaire envoyé");
                console.log($("#news_letter").val());
                $.post(
                    "./json/inscription.json.php?_="+Date.now(),
                    {
                        nom_per:$("#nom_per").val(),
                        prenom_per:$("#prenom_per").val(),
                        email_per:$("#email_per").val(),
                        password:$("#password").val(),
                        news_letter:$("#news_letter").val()
                    },
                    function result(data,status){
                        //ajout de message erreur
                        $("#alert").removeClass("alert-sucess");
                        $("#alert").removeClass("alert-danger");
                        $("#alert .message").html(data.message.texte);
                        $("#alert").addClass("alert-"+data.message.type);
                        $("#alert").css("display","block");
                    }
                )

            }
        }
    );

});