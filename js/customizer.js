/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

        
        //Owl Carousel

        function createCarousel(){
                if ($('.owl-carousel').length) {
                        $('.owl-carousel').each(function (index, value){
                                $idCarousel = $(this).attr('id');
                                $itemNav = $(this).data('nav');
                                $itemNumber = $(this).data('items');
                                $itemDots = $(this).data('dots');
                                $itemCenter = $(this).data('center');
                                $itemLoop = $(this).data('loop');
                                $itemAutoplay = $(this).data('aplay');
                                $itemTimePlay = $(this).data('time');
                                
                                $('#' + $idCarousel).owlCarousel({
                                        autoplay:$itemAutoplay,
                                        autoplayTimeout:$itemTimePlay,
                                        items:$itemNumber,
                                        nav:$itemNav,
                                        dots:$itemDots,
                                        center:$itemCenter,
                                        loop:$itemLoop,
                                        responsive:{
                                                0:{
                                                        items: 1
                                                },

                                                480:{
                                                        items: 1
                                                },

                                                768:{
                                                        items:$itemNumber,
                                                }
                                        }
                                });
                        });
                }
                $('.owl-prev').html('<i class="fa fa-angle-left" aria-hidden="true"></i>');
                $('.owl-next').html('<i class="fa fa-angle-right" aria-hidden="true"></i>');
                
        }

        createCarousel();

        $('.owl-carousel .owl-nav').addClass($('.owl-carousel').data('nav-class'));
        $('.owl-carousel .owl-nav button').addClass('button-icon ' + $('.owl-carousel').data('carousel-class'));

	 //Menu sticky 

	 $(window).on('scroll', function(){
        
           if ($(this).scrollTop() > 250) {
                $('.sticky-header').addClass('fixed-header');
                $('.float-buttons').fadeIn();
            
           }
           if ($(this).scrollTop() < 250) {
                $('.sticky-header').removeClass('fixed-header');
		$('.float-buttons').fadeOut();
           }
        });

       $('.logo-left .button-toggle-custom').click(function() {
           $('.container-nav-header').slideToggle();
        });


        $('.menu-toggle-theme .button-toggle-custom').click(function() {
           $('.container-nav-header').addClass('open-menu');
           $('.menu-toggle-theme').hide();
        });

        $('.close-menu').click(function() {
           $('.container-nav-header').removeClass('open-menu');
           $('.menu-toggle-theme').show();
        });
       

        //Smooth Scroll

        $('html').smoothScroll();


        $('.bottom-header .nav-link').removeClass('active');
        $('.page-id-299 .page-item-299 .nav-link').addClass('active');


        //COUNTER
        var counters = $(".counter");
        var countersQuantity = counters.length;
        var counter = [];

        for (i = 0; i < countersQuantity; i++) {
                counter[i] = parseInt(counters[i].innerHTML);
        }

        var count = function(start, value, id) {
                var localStart = start;
                setInterval(function() {
                if (localStart < value) {
                localStart++;
                counters[id].innerHTML = localStart;
                }
                }, 40);
        }

        for (j = 0; j < countersQuantity; j++) {
                count(0, counter[j], j);
        }

        //Woocommerce js
        $('.item-cart-nav').hover(function() {
           $('.subitem-cart').slideToggle();
        })

        $('.woocommerce-input-wrapper input').addClass('form-control');
        $('textarea').addClass('form-control');
        $('.form-submit .submit').addClass('button-master');
        $('.form-submit .submit').addClass('principal-button');


        var ejecutar = false;

                $('.filter-toggle a').click(function(e) {
                        if (ejecutar) {
                                e.preventDefault();
                                $('.filter-toggle').removeClass('active');
                                $('#sidebar-container').addClass('d-none');
                                $('#products-loop-container').removeClass('col-md-9');
                                ejecutar = false;
                                //console.log(ejecutar);     
                        } else {
                                
                                e.preventDefault();
                                $('.filter-toggle').addClass('active');
                                $('#sidebar-container').removeClass('d-none');
                                $('#products-loop-container').addClass('col-md-9');
                                ejecutar = true;
                                //console.log(ejecutar);
                        }   
                });

} )( jQuery );
