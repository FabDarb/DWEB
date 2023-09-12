$(function(){
    var $list;
    var $nb = 0;
    $list = $('ul')

    let text = ["you're a great friend", "today your's birthday", "wishing you all the best"];
    let couleur = ["lightpink", "coral", "lightgreen"]
    $list.on('click', 'li:last', function (){
        if($nb == text.length){
            $('li:gt(0)').remove();
            for(var i = 0; i < text.length; i++){ //for source reta
                $list.append('<li style="background-color:' + couleur[i] + ' ">' + "Happy Birthday !" + '</li>');
            }
            var url = "C:/wamp64/www/ICT_133_fad/DWEB/activite_anniversaire/anniversaire/css/cp-22rel.jpg";
            $('body').css('background-image', "url(" + url + ")");

        }
        else if($nb < text.length){
            $list.append('<li style="background-color:' + couleur[$nb] + ' ">' + text[$nb] + '</li>');
        }
        $nb++;
    });
});