$(function (){
    $('a').tooltip({
        item: "a",
        content: function (){
            return "<strong>" + $(this).attr('data-desc') +"</strong>" +
                "<img alt='t' src='../images/" + $(this).attr('data-dif') + ".png' /><br>" +
                "<strong>" + $(this).attr('href').split('/')[2].split('.')[0] +"</strong>"
        },
        show: { effect: "size", duration: 1000 },
        tooltipClass: "custom-tooltip-styling",
    });
});