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
        checkColum();
        checkDiag();
    });
    function checkRow(){
        var resultnb = 0;
        $('tr').each(function (){
            var valeur = null;
            $(this.children).each(function() {
                if($(this).attr('class') == null){
                }else if(valeur == null){
                    valeur = $(this).attr('class');
                    resultnb++;
                }
                else if(valeur == $(this).attr('class')){
                    resultnb++;
                }
            });
            if(resultnb == 3){
                alert('win ' + valeur);
            }
            else{
                resultnb = 0;
            }
        });
    }
    function checkColum(){
        var resultnb = 0;
        for(var i = 0; i <= 3; i++) {
            var valeur = null;
            $('tr').each(function () {
                if($(this.children[i]).attr('class') == null){
                }else if(valeur == null){
                    valeur = $(this.children[i]).attr('class');
                    resultnb++;
                }
                else if(valeur == $(this.children[i]).attr('class')){
                    resultnb++;
                }
            });
            if(resultnb == 3){
                alert('win ' + valeur);
            }
            else{
                resultnb = 0;
            }
        }
    }
    function checkDiag(){
        var nbcase = 0;
        var resultnb = 0;
        for(var i = 0; i < 2; i++) {
            var valeur = null;
            $('tr').each(function () {
                if ($(this.children[nbcase]).attr('class') == null) {
                } else if (valeur == null) {
                    valeur = $(this.children[nbcase]).attr('class');
                    resultnb++;
                } else if (valeur == $(this.children[nbcase]).attr('class')) {
                    resultnb++;
                }
                if(i == 0){
                    nbcase++;
                }else{
                    nbcase--;
                }
            });
            nbcase = 2;
            if(resultnb == 3){
                alert('win ' + valeur);
            }
            else{
                resultnb = 0;
            }
        }
    }
});