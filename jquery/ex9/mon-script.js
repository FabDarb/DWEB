$(function (){
     alert('Formatage');
     $('td').addClass('size');
    alert('inversion des cellules');
    $('.vert').toggleClass('rouge');
    $('.rouge').toggleClass('vert');
    alert('ré-inversion des cellules');
    $('.rouge').toggleClass('vert');
    $('.vert').toggleClass('rouge');
    alert('Suppression des classes "couleur"');
    $('.vert').removeClass('vert');
    $('.rouge').removeClass('rouge');

});