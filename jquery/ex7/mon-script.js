$(function (){

    function retur()  {
        $("img").fadeOut('slow');
        $('img').fadeIn(0);
    }

    setInterval(retur, 2000);
});