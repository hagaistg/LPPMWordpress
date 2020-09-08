$ = jQuery
jQuery( document ).ready( function () {

 
  //   // menu toggle hasClass
  $( ".top-bar-social-links .share-icon" ).click(function(){

    $( ".share-wrapper" ).slideToggle( "slow", function() {
    //   // Animation complete.
  });

  }); 

  /* search toggle */
  $('body').click(function(evt){
    if(!( $(evt.target).closest('.search-section').length || $(evt.target).hasClass('search-toggle') ) ){
     if ($(".search-toggle").hasClass("search-active")){
      $(".search-toggle").removeClass("search-active");
      $(".search-box").slideUp("slow");
    }
  }
});
  $(".search-toggle").click(function(){
    $(".search-box").toggle("slow");
    if ( !$(".search-toggle").hasClass("search-active")){
     $(".search-toggle").addClass("search-active");

   }
   else{
    $(".search-toggle").removeClass("search-active");
  }
  
});

  jQuery('.menu-top-menu-container').meanmenu({
    meanMenuContainer: '.main-navigation',
    meanScreenWidth:"767",
    meanRevealPosition: "right",
  });


  /* back-to-top button*/

  $('.back-to-top').hide();
  $('.back-to-top').on("click",function(e) {
   e.preventDefault();
   $('html, body').animate({ scrollTop: 0 }, 'slow');
 });

  
  $(window).scroll(function(){
    var scrollheight =400;
    if( $(window).scrollTop() > scrollheight ) {
     $('.back-to-top').fadeIn();

   }
   else {
    $('.back-to-top').fadeOut();
  }
});
  


           // slider

           var owllogo = $(".owl-slider-demo");

           owllogo.owlCarousel({
            items:1,
            loop:true,
            nav:false,
            dots:true,
            smartSpeed:900,
            autoplay:true,
            autoplayTimeout:5000,
            fallbackEasing: 'easing',
            transitionStyle : "fade",
            autoplayHoverPause:true,
            animateOut: 'fadeOut'
          });

              // custom tab
              jQuery('.tabs .tab-links a').on('click', function(e)  {
                var currentAttrValue = jQuery(this).attr('href');
                
                  // Show/Hide Tabs
                  jQuery('.tabs ' + currentAttrValue).fadeIn(400).siblings().hide();
                  
                  // Change/remove current tab to active
                  jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
                  
                  e.preventDefault();
                });

            // sticky sidebar
            jQuery('#primary , #secondary').theiaStickySidebar({
              // Settings
              additionalMarginTop: 30
            });



            
          });



$('.top-menu-toggle_bar_wrapper').on('click', function(){
  $(this).toggleClass('close');
  $(this).siblings('.top-menu-toggle_body_wrapper').slideToggle().toggleClass('hide-menu');
});

$(window).resize(function(){
  var winWidth = $(window).width();
  if(winWidth>1023){
    $('.top-menu-toggle_body_wrapper').remove('style');
    $('.top-menu-toggle_bar_wrapper').removeClass('close');
  }


});

