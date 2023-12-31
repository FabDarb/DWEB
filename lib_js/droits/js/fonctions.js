$(function (){
    $("#fonction_form").validate(
        {
            rules:{
                nom_fnc:{
                    "required":true,
                    "minlength":5
                },
                abr_fnc:{
                    "required":true,
                    "minlength":2
                },
                desc_fnc:{
                    "required":true,
                    "minlength":20
                }
            },
            messages:{
                nom_fnc:{
                    required:"Un nom de fonction est indispensable",
                    minlength:"Le nom de la fonction doit être composé de 5 caractères au minmum"
                },
                abr_fnc:{
                    required:"Une abrévation de fonction est indispensable",
                    minlength:"L'abréviation de la fonction doit être composé de 2 caractères au minimum"
                },
                desc_fnc:{
                    required:"Une description de fonction est indispensable",
                    minlength:"La description de la fonction doit être composé de 20 caractères au minimum"
                }
            },
            submitHandler: function (form){
                console.log("send");
                $.post(
                    "./json/fonction.json.php?_="+Date.now(),
                    {
                        nom_fnc:$("#nom_fnc").val(),
                        abr_fnc:$("#abr_fnc").val(),
                        desc_fnc:$("#desc_fnc").val()
                    },
                    function result(data,status){
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