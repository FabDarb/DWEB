$(function (){
    $('a').tooltip({
        content: "<strong>reote le mano</strong>",
        show: { effect: "explode", duration: 800 },
        tooltipClass: "custom-tooltip-styling",
        position:{collision:'fit'}
    });
});