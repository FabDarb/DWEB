$(function (){
    $('#nom').click(function (){
        $('td').css('border', '10px outset red');
    });
    $('#nom').focusout(function (){
        $('td').css('border', 'none');
    });
});