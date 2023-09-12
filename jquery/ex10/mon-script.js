$(function (){
     $('img').mouseover(function (){
        $('#title').html(this.alt);
        this.height = 300;
     });
     $('img').mouseleave(function (){
         $('#title').html("&nbsp;");
         this.height = 200;
     });
});