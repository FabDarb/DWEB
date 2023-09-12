$(function (){
    var joueur = 1;
    var win = false;
    $('td').click(function(){
        if($(this).attr('class') == null) {
            if (joueur == 1) {
                $(this).addClass("symbole_0");
                joueur = 2;
            }else if(joueur == 2){
                $(this).addClass("symbole_1");
                joueur = 1;
            }
        }
        checkRow();
    });
    function checkRow(){
        $('tr').each(function (){
            $('.test').html($(this.children).attr('class'));
        });

    }
});