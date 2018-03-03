//advance JavaScript

jQuery(window).ready(function($) {

    /*CHECK IF TOUCH ENABLED DEVICE*/
    function is_touch_device() {
        return (('ontouchstart' in window) || (navigator.MaxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0));
    }

    if (is_touch_device()) {
        jQuery('body').addClass('onlytouch');
    }

});

window.matchMedia = window.matchMedia || (function(e, f) {
    var c, a = e.documentElement,
        b = a.firstElementChild || a.firstChild,
        d = e.createElement("body"),
        g = e.createElement("div");
    g.id = "mq-test-1";
    g.style.cssText = "position:absolute;top:-100em";
    d.style.background = "none";
    d.appendChild(g);
    return function(h) {
        g.innerHTML = '&shy;<style media="' + h + '"> #mq-test-1 { width: 42px; }</style>';
        a.insertBefore(d, b);
        c = g.offsetWidth == 42;
        a.removeChild(d);
        return {
            matches: c,
            media: h
        }
    }
})(document);

/* --------------------------------------------
 MAIN FUNCTION
-------------------------------------------- */
jQuery(document).ready(function($){
    // WOW
    new WOW().init();

  // footerHeight
	  var docHeight = jQuery(window).height();
    var footerHeight = jQuery('#footer').height();
    var footerTop = jQuery('#footer').position().top + footerHeight;
    if (footerTop < docHeight) {
        jQuery('#footer').css('margin-top', 1 + (docHeight - footerTop) + 'px');
    }

	// matchHeight
    jQuery('.matchhe').matchHeight({
            property: 'min-height'
    });

	//Comment Form
    jQuery('.comment-form-author, .comment-form-email, .comment-form-url').wrapAll('<div class="field_wrap" />');

    jQuery(".comment-reply-link").click(function() {
        jQuery('#respond_wrap .single_skew_comm, #respond_wrap .single_skew').hide();
    });
    jQuery("#cancel-comment-reply-link").click(function() {
        jQuery('#respond_wrap .single_skew_comm, #respond_wrap .single_skew').show();
    });

    // scrollup
    jQuery(window).bind("scroll", function() {
        if (jQuery(this).scrollTop() > 800) {
            jQuery(".scrollup").fadeIn('slow');
        } else {
            jQuery(".scrollup").fadeOut('fast');
        }
    });
    jQuery(".scrollup").click(function() {
        jQuery("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });

	//Next-Previous Post Image Check
	  jQuery(".pre-nav-saf a").addClass('prev');
	  jQuery(".next-nav-saf a").addClass('next');

    //MENU Animation
    if (jQuery(window).width() > 768) {
        jQuery('#navmenu ul > li').hoverIntent(function() {
            jQuery(this).find('.sub-menu:first, ul.children:first').slideDown({
                duration: 200
            });
            jQuery(this).find('a').not('.sub-menu a').stop().animate({
                "color": '#0000'
            }, 200);
        }, function() {
            jQuery(this).find('.sub-menu:first, ul.children:first').slideUp({
                duration: 200
            });
            jQuery(this).find('a').not('.sub-menu a').stop().animate({
                "color": '#ffff'
            }, 200);

        });

        jQuery('#navmenu ul li').not('#navmenu ul li ul li').hover(function() {
            jQuery(this).addClass('menu_hover');
        }, function() {
            jQuery(this).removeClass('menu_hover');
        });
        jQuery('#navmenu li').has("ul").addClass('zn_parent_menu');
        jQuery('.zn_parent_menu > a').append('<span class="menu_arrow"><i class="fa fa-angle-down"></i></span>');
    }

    /* Side responsive menu	 */
    $('.menu-toggle ').sidr({
        name: 'sidr-left',
        side: 'left',
        source: '#navmenu ',
        onOpen: function() {
            $('.menu-toggle ').animate({
                marginLeft: "260px"
            }, 200);

        },
        onClose: function() {
            $('.menu-toggle ').animate({
                marginLeft: "0px"
            }, 200);
              }

    });

    jQuery(document).on("click", function () {
         $.sidr('close', 'sidr-left');
     });
     jQuery('.sidr ul li a ').on("click", function () {
          $.sidr('close', 'sidr-left');
      });
    /* search-icon	 */
    jQuery('.search-icon i.fa-search').click(function() {
      jQuery('.search-icon .unicons-search').toggleClass('active');
    });

    jQuery('.advance-search .close').click(function() {
      jQuery('.search-icon .unicons-search').removeClass('active');
    });

    jQuery('.overlay-search').click(function() {
      jQuery('.search-icon .unicons-search').removeClass('active');
    });


    /* --------------------------------------------------------
	 NAVBAR FIXED TOP ON SCROLL
	----------------------------------------------------------- */


        if( $(".navbar-standart").length > 0 ){
            $(".navbar-standart").addClass("navbar-absolute-top");

        } else {
            $(window).scroll(function() {
                if ($(".navbar").offset().top > 32)  {
                    $(".navbar").addClass("top-nav-collapse");


                } else {
                    $(".navbar").removeClass("top-nav-collapse");

                }
            });
        };

 /* --------------------------------------------------------
	 OWL CAROUSEL FOR slider
	----------------------------------------------------------- */
    jQuery('.site-slider').owlCarousel({
		        loop: true,
		        dots: true,
            mouseDrag: true,
		        autoplay:true,
		        lazyLoad: true,
		        animateOut: 'fadeOut',
    	      items: 1,
		        nav: false,
            onTranslated: function() {
                var $slideHeading = $('.site-slider .owl-item.active .slider-text h3');
                var $slidePara = $('.site-slider .owl-item.active .slider-text p');

                $slideHeading.addClass('animate-in-fast').on('animationend', function(){
                  $slideHeading.removeClass('animate-in-fast').addClass('opacFull');
                });

                $slidePara.addClass('animate-in-slow').on('animationend', function(){
                  $slidePara.removeClass('animate-in-slow').addClass('opacFull');
                });
            },
            onChange: function(){
                var $slideHeading = $('.site-slider .owl-item.active .slider-text h3');
                var $slidePara = $('.site-slider .owl-item.active .slider-text p');

                $slideHeading.removeClass('opacFull');
                $slidePara.removeClass('opacFull');
            }
  	      });

          /* --------------------------------------------------------
            OWL CAROUSEL FOR slider image fullscreen
          ----------------------------------------------------------- */

            fullscreen();
            $(window).resize(fullscreen);

            function fullscreen() {
              var mq = window.matchMedia('all and (max-width: 992px)');
              var masthead = $('.slider-img');
              if(mq.matches) {
                  var windowH = $(window).height()*0.7;
                } else {
                  var windowH = $(window).height()*0.9;
                }
              masthead.height(windowH);
            }




    /* --------------------------------------------------------
      OWL CAROUSEL FOR slider content animation
    ----------------------------------------------------------- */

    jQuery(window).on('load', function($){
      var jQueryslideHeading = jQuery('.site-slider .owl-item.active .slider-text h3');
      var jQueryslidePara = jQuery('.site-slider .owl-item.active .slider-text p');

      jQueryslideHeading.addClass('animate-in-fast').on('animationend', function(){
        jQueryslideHeading.removeClass('animate-in-fast').addClass('opacFull');
      });

      jQueryslidePara.addClass('animate-in-slow').on('animationend', function(){
        jQueryslidePara.removeClass('animate-in-slow').addClass('opacFull');
      });
    });

    /* --------------------------------------------------------
    	 sticky menu
    	----------------------------------------------------------- */
    if( $(".admin-bar .navbar-sticky").length > 0){
          $(".admin-bar .navbar-sticky").sticky({ topSpacing: 32});
          $(".admin-bar .navbar-sticky").css('z-index','103');

  } else {
    $(".navbar-sticky").sticky({ topSpacing: 0});
    $(".navbar-sticky").css('z-index','103');
   };

    /* --------------------------------------------------------
    	 smoothScroll
    	----------------------------------------------------------- */

      jQuery('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      	var target = $(this.hash);
      	target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      	if (target.length) {
      		$('html, body').animate({
      			scrollTop: target.offset().top-80
      		}, 1000);
      		return false;
      	}
      }
      });

      $('.magnific-popup').magnificPopup({
        //delegate: 'a',
        type: 'image',
            verticalFit: true,
            closeOnContentClick: true,
        closeBtnInside: true,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            gallery: {
          enabled: true
        },
      });

      /* --------------------------------------------------------
     JQUERY TYPED
    ----------------------------------------------------------- */
    jQuery(function(){
        "use strict";
        if($("#typed").length > 0 ) {
            $("#typed").typed({
                stringsElement: $('#typed-strings'),
                startDelay: 2000,
                typeSpeed: 100,
                backDelay: 500,
                loop: true,
                contentType: 'text',
                loopCount: false,
            });
        };
    });
  });

/*
 * js END
 */

 /* --------------------------------------------------------
   hero image Parallax
 ----------------------------------------------------------- */

jQuery(document).ready(function($){

	fullscreen();
$(window).resize(fullscreen);
$(window).scroll(headerParallax);

function fullscreen() {
	var mq = window.matchMedia('all and (max-width: 992px)');

	var masthead = $('.masthead');
	if(mq.matches) {
	var windowH = $(window).height()*0.9;
	} else {
		var windowH = $(window).height()*0.9;
		}
	masthead.height(windowH);
}

function headerParallax() {
	var st = $(window).scrollTop();
	var headerScroll = $('.masthead-overlay');
	var headerScroll2 = $('.masthead-dsc');

	if (st < 1200) {
		headerScroll.css('opacity', 0+st/1200);


	}
	if (st < 500) {
		headerScroll2.css('opacity', 1-st/1000);
		$('.masthead-arrow ').css('opacity', 1-st/500);

	}
}

});
 jQuery(window).load(function() {

     /* --------------------------------------------------------
 	 ISOTOPE MASONRY GRID
 	----------------------------------------------------------- */
     jQuery( function($) {
         "use strict";

 var $blogMasonry3Col = $('.blog-masonry-3col').isotope({
     itemSelector: '.blog-masonry-item',
     masonry: {
       columnWidth: '.large-4',
       gutter: 0
     }
 });

   });
 });
