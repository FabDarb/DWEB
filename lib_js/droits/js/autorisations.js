$(function (){
   $("#autorisation_form").validate(
       {
            rules:{
                nom_aut:{
                    "required":true,
                    "minlength":5
                },
                code_aut:{
                    "required":true,
                    "minlength":3,
                },
                desc_aut_a:{
                    "required":true,
                    "minlength":20,
                },
                desc_aut_u:{
                    "required":true,
                    "minlength":20,
                }
            },
           messages:{
                nom_aut:{
                    required:"champ obligatoire",
                    minlength:"Le nom d'autorisation doit être composé de 5 caractères au minimum"
                },
               code_aut:{
                    required:"champ obligatoire",
                    minlength:"minimum 3 caractères",
               },
               desc_aut_a:{
                   required:"champ obligatoire",
                   minlength:"minimum 20 caractères"
               },
               desc_aut_u:{
                   required:"champ obligatoire",
                   minlength:"minimum 20 caractères"
               }
           },
           submitHandler: function (form){
                console.log("sand");
                $.post(
                    "./json/autorisation.json.php?_="+Date.now(),
                    {
                        nom_aut:$("#nom_aut").val(),
                        code_aut:$("#code_aut").val(),
                        desc_aut_a:$("#desc_aut_a").val(),
                        desc_aut_u:$("#desc_aut_u").val()
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