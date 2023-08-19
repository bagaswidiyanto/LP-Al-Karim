//jquery-click-scroll
//by syamsul'isul' Arifin

var sectionArray = ['home', 'laporan', 'latar-belakang', 'about', 'location',];

$.each(sectionArray, function(index, value){
          
     $(document).scroll(function(){
         var offsetSection = $('#' + value).offset().top - 45;
         var docScroll = $(document).scrollTop();
         var docScroll1 = docScroll + 1;
         
        
         if ( docScroll1 >= offsetSection ){
             $('.navbar-nav .nav-link').removeClass('active');
             $('.navbar-nav .nav-link:link').addClass('inactive');  
             $('.navbar-nav .nav-link').eq(index).addClass('active');
             $('.navbar-nav .nav-link').eq(index).removeClass('inactive');
         }
         
     });
    
    $('.click-scroll').eq(index).click(function(e){
        var offsetClick = $('#' + value).offset().top - 45;
        e.preventDefault();
        $('html, body').animate({
            'scrollTop':offsetClick
        }, 300)
    });
    
});

$(document).ready(function(){
    $('.navbar-nav .nav-link:link').addClass('inactive');    
    $('.navbar-nav .nav-link').eq(0).addClass('active');
    $('.navbar-nav .nav-link:link').eq(0).removeClass('inactive');
});