$(function (){
    $('a').tooltip({
        content: "<strong>" + $('a').on('mouseover', function (){
            return $(this).attr('data-desc');
        }) + "</strong>",
        show: { effect: "explode", duration: 800 },
        tooltipClass: "custom-tooltip-styling",
    });
});