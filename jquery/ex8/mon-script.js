$(function (){
    for(var i = 0; i < $('img').length; i++) {
        $('img:eq(' + i + ')').attr({
            alt: $('img:eq(' + i + ')').attr('src')
        });
    }
});