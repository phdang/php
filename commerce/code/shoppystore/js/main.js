(function($) {
	"use strict";
	/* Add Click On Ipad */
	$(window).resize(function(){
		var $width = $(this).width();
		if( $width < 1199 ){
			$( '.primary-menu .nav .dropdown-toggle'  ).each(function(){
				$(this).attr('data-toggle', 'dropdown');
			});
		}
	});
	/*
	**  show menu mobile
	*/
	$('.header-menu-categories .open-menu').on('click', function(){
			$('.main-menu').toggleClass("open");
	});
	
	$('.footer-mstyle1 .footer-menu .footer-search a').on('click', function(){
			$('.top-form.top-search').toggleClass("open");
	});
	
	$('.footer-mstyle1 .footer-menu .footer-more a').on('click', function(){
			$('.menu-item-hidden').toggleClass("open");
	});
    jQuery('.phone-icon-search').on( 'click', function(){
	   //alert("The paragraph was clicked.");
        jQuery('.sm-serachbox-pro').toggle("slide");
    });
	jQuery('ul.orderby.order-dropdown li ul').hide(); //hover in
    jQuery("ul.orderby.order-dropdown li span.current-li-content,ul.orderby.order-dropdown li ul").on('hover', function() {
        jQuery('ul.orderby.order-dropdown li ul').stop().fadeIn("fast");
    }, function() {
        jQuery('ul.orderby.order-dropdown li ul').stop().fadeOut("fast");
    });

    jQuery('.orderby-order-container ul.sort-count li ul').hide();
    jQuery('.sort-count.order-dropdown li span.current-li,.orderby-order-container ul.sort-count li ul').hover(function(){
        jQuery('.orderby-order-container ul.sort-count li ul').stop().fadeIn("fast");

    },function(){
        jQuery('.orderby-order-container ul.sort-count li ul').stop().fadeOut("fast");
    });

	/*
	** js mobile
	*/
	$('.single-product.mobile-layout .social-share .title-share').on('click', function(){
			$('.single-product.mobile-layout .social-share').toggleClass("open");
	});
	$('.single-post.mobile-layout .social-share .title-share').on('click', function(){
			$('.single-post.mobile-layout .social-share').toggleClass("open");
	});

	$('.single-post.mobile-layout .social-share.open .title-share').on('click', function(){
			$('.single-post.mobile-layout .social-share').removeClass("open");
	});
	
	$('.products-nav .filter-product').on('click', function(){
			$('.products-wrapper .filter-mobile').toggleClass("open");
			$('.products-wrapper').toggleClass('show-modal');
	});
	
	$('.products-nav .filter-product').on('click', function(){
		if( $( ".products-wrapper .products-nav .filter-product" ).not( ".filter-mobile" ) ){
			$('.products-wrapper').removeClass('show-modal');
		}	
	});
	
	$('.mobile-layout .vertical_megamenu .resmenu-container .navbar-toggle').on('click', function(){
			$('.mobile-layout .body-wrapper .container').toggleClass('open');
	});
	
	$('.mobile-layout .back-history').on('click', function(){
			window.history.back();
	});
	
	$('.footer-mstyle2 .footer-container .footer-open').on('click', function(){
		$('.footer-mstyle2').toggleClass('open');
	});
		/*
	** Change Layout 
	*/
	$( window ).load(function() {	
		if( $( 'body' ).hasClass( 'tax-product_cat' ) || $( 'body' ).hasClass( 'post-type-archive-product' ) ) {
			$('.grid-view').on('click',function(){
				$('.list-view').removeClass('active');
				$('.grid-view').addClass('active');
				jQuery("ul.products-loop").fadeOut(300, function() {
					$(this).removeClass("list").fadeIn(300).addClass( 'grid' );			
				});
			});
			
			$('.list-view').on('click',function(){
				$( '.grid-view' ).removeClass('active');
				$( '.list-view' ).addClass('active');
				$("ul.products-loop").fadeOut(300, function() {
					jQuery(this).addClass("list").fadeIn(300).removeClass( 'grid' );
				});
			});
			/* End Change Layout */
		} 
	});
	/*
	** Product listing order hover
	*/
	$('ul.orderby.order-dropdown li ul').hide(); 
	$("ul.order-dropdown > li").each( function(){
		$(this).hover( function() {
			$('.products-wrapper').addClass('show-modal');
			$(this).find( '> ul' ).stop().fadeIn("fast");
		}, function() {
				$('.products-wrapper').removeClass('show-modal');
				$(this).find( '> ul' ).stop().fadeOut("fast");
		});
	});
	
	/*
	** Product listing select box
	*/
	$('.catalog-ordering .orderby .current-li a').html($('.catalog-ordering .orderby ul li.current a').html());
	$('.catalog-ordering .sort-count .current-li a').html($('.catalog-ordering .sort-count ul li.current a').html());
//  jQuery(".box-newsletter").center();

var mobileHover = function () {
    $('*').on('touchstart', function () {
        $(this).trigger('hover');
    }).on('touchend', function () {
        $(this).trigger('hover');
    });
};
mobileHover();
$( '.logo-wrapper' ).on('click', function(){
   $.cookie("shoppystore_header_style", "style1", { path: '/' });
   $.cookie("shoppystore_footer_style", "style1",{path: '/'});
  });
    jQuery('.product-categories')
        .find('li:gt(4)') //you want :gt(4) since index starts at 0 and H3 is not in LI
        .hide()
        .end()
        .each(function(){
            if($(this).children('li').length > 4){ //iterates over each UL and if they have 5+ LIs then adds Show More...
                $(this).append(
                    $('<li><a>See more   +</a></li>')
                        .addClass('showMore')
                        .click(function(){
                            if($(this).siblings(':hidden').length > 0){
                                $(this).html('<a>See less   -</a>').siblings(':hidden').show(400);
                            }else{
                                $(this).html('<a>See more   +</a>').show().siblings('li:gt(4)').hide(400);
                            }
                        })
                );
            }
        });
    /*Form search iP*/




    jQuery('a.phone-icon-menu').on('click', function(){
       var temp = jQuery('.navbar-inner.navbar-inverse').toggle( "slide" );
	   $(this).toggleClass('active');
    });
	$('.ya-tooltip').tooltip();
	// fix accordion heading state
	$('.accordion-heading').each(function(){
		var $this = $(this), $body = $this.siblings('.accordion-body');
		if (!$body.hasClass('in')){
			$this.find('.accordion-toggle').addClass('collapsed');
		}
	});
	

	// twice click
	$(document).on('click.twice', '.open [data-toggle="dropdown"]', function(e){
		var $this = $(this), href = $this.attr('href');
		e.preventDefault();
		window.location.href = href;
		return false;
	});

    $('#cpanel').collapse();

    $('#cpanel-reset').on('click', function(e) {

    	if (document.cookie && document.cookie != '') {
    		var split = document.cookie.split(';');
    		for (var i = 0; i < split.length; i++) {
    			var name_value = split[i].split("=");
    			name_value[0] = name_value[0].replace(/^ /, '');

    			if (name_value[0].indexOf(cpanel_name)===0) {
    				$.cookie(name_value[0], 1, { path: '/', expires: -1 });
    			}
    		}
    	}

    	location.reload();
    });

	$('#cpanel-form').on('submit', function(e){
		var $this = $(this), data = $this.data(), values = $this.serializeArray();

		var checkbox = $this.find('input:checkbox');
		$.each(checkbox, function() {

			if( !$(this).is(':checked') ) {
				name = $(this).attr('name');
				name = name.replace(/([^\[]*)\[(.*)\]/g, '$1_$2');

				$.cookie( name , 0, { path: '/', expires: 7 });
			}

		})

		$.each(values, function(){
			var $nvp = this;
			var name = $nvp.name;
			var value = $nvp.value;

			if ( !(name.indexOf(cpanel_name + '[')===0) ) return ;

			//console.log('name: ' + name + ' -> value: ' +value);
			name = name.replace(/([^\[]*)\[(.*)\]/g, '$1_$2');

			$.cookie( name , value, { path: '/', expires: 7 });

		});

		location.reload();

		return false;

	});

	$('a[href="#cpanel-form"]').on( 'click', function(e) {
		var parent = $('#cpanel-form'), right = parent.css('right'), width = parent.width();

		if ( parseFloat(right) < -10 ) {
			parent.animate({
				right: '0px',
			}, "slow");
		} else {
			parent.animate({
				right: '-' + width ,
			}, "slow");
		}

		if ( $(this).hasClass('active') ) {
			$(this).removeClass('active');
		} else $(this).addClass('active');

		e.preventDefault();
	});
/*Product listing select box*/
	jQuery('.catalog-ordering .orderby .current-li a').html(jQuery('.catalog-ordering .orderby ul li.current a').html());
	jQuery('.catalog-ordering .sort-count .current-li a').html(jQuery('.catalog-ordering .sort-count ul li.current a').html());
/*currency Selectbox*/
	$(document).ready(function(){
		$('.currency_switcher li a').on('click', function(){
			$current = $(this).attr('data-currencycode');
			jQuery('.currency_w > li > a').html($current);
		});
		
		var currency_show = $('ul.currency_switcher li a.active').html();
		$('.currency_w > li > a').html(currency_show);	
	});
	
	$(document).ready(function(){
		/* Quickview */
		if( $.isFunction( $.fancybox ) ){
			$('.fancybox').fancybox({
				'width'     : 800,
				'height'   : 600,
				'autoSize' : false,
				helpers:  {
					title:  null
				},
				afterShow: function() {
					$( '.quickview-container .product-images' ).each(function(){
						var $id = this.id;
						var $rtl = $('body').hasClass( 'rtl' );
						console.log($rtl);
						var $img_slider = $( '#' + $id + ' .product-responsive');
						var $thumb_slider = $( '#' + $id + ' .product-responsive-thumbnail' )
						$img_slider.slick({
							slidesToShow: 1,
							slidesToScroll: 1,
							fade: true,
							arrows: false,
							rtl: $rtl,
							asNavFor: $thumb_slider
						});
						$thumb_slider.slick({
							slidesToShow: 3,
							slidesToScroll: 1,
							asNavFor: $img_slider,
							arrows: true,
							focusOnSelect: true,
							rtl: $rtl,
							responsive: [
								{
									breakpoint: 1199,
									settings: {
									slidesToShow: 3
									}
								},
								{
									breakpoint: 991,
									settings: {
									slidesToShow: 3
									}
								},
								{
									breakpoint: 767,
									settings: {
									slidesToShow: 3
									}
								},
								{
									breakpoint: 480,
									settings: {
									slidesToShow: 1    
									}
								}
								// You can unslick at a given breakpoint now by adding:
								// settings: "unslick"
								// instead of a settings object
							]
						});

						$(".product-images").fadeIn(1000, function() {
							$(this).removeClass("loading");
						});
					});
				}
			});
		}
		/* Slider Image */
		$( '.product-images' ).each(function(){
			var $id 			= this.id;
			var $rtl 			= $(this).data('rtl');
			var $vertical		= $(this).data('vertical');
			var $img_slider 	= $( '#' + $id + ' .product-responsive');
			var $thumb_slider 	= $( '#' + $id + ' .product-responsive-thumbnail' );
			var $number_large	= ( $vertical == false ) ? 4 : 3;
			$img_slider.slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				fade: true,
				arrows: false,
				rtl: $rtl,
				asNavFor: $thumb_slider
			});
			$thumb_slider.slick({
				slidesToShow: $number_large,
				slidesToScroll: 1,
				asNavFor: $img_slider,
				arrows: true,
				focusOnSelect: true,
				rtl: $rtl,
				vertical: $vertical,
				verticalSwiping: $vertical,
				responsive: [
					{
					  breakpoint: 1199,
					  settings: {
						slidesToShow: 3
					  }
					},
					{
					  breakpoint: 991,
					  settings: {
						slidesToShow: 4
					  }
					},
					{
					  breakpoint: 767,
					  settings: {
						slidesToShow: 3
					  }
					},
					{
					  breakpoint: 480,
					  settings: {
						slidesToShow: 2    
					  }
					}
					// You can unslick at a given breakpoint now by adding:
					// settings: "unslick"
					// instead of a settings object
				]
			});

			$(".product-images").fadeIn(300, function() {
				$(this).removeClass("loading");
			});
		});
	});

	jQuery(function($){
	// back to top
	$("#ya-totop").hide();
	$(function () {
		var wh = $(window).height();
		var whtml = $(document).height();
		$(window).scroll(function () {
			if ($(this).scrollTop() > whtml/10) {
					$('#ya-totop').fadeIn();
				} else {
					$('#ya-totop').fadeOut();
				}
			});
		$('#ya-totop').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
			});
	});
	// end back to top
	}); 

	jQuery(document).ready(function(){
		jQuery('.wpcf7-form-control-wrap').hover(function(){
			$(this).find('.wpcf7-not-valid-tip').css('display', 'none');
		});
	 });
	 // fix js
	
	$('li.menu-product-tab a').on('hover',function (e) {
		console.log("dsdsa");
		e.preventDefault()
		$(this).tab('show')
	})
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
	//map scrollwhell disable
 // you want to enable the pointer events only on click;
        $('.wpb_map_wraper iframe').addClass('scrolloff'); // set the pointer events to none on doc ready
        $('.wpb_map_wraper').on('click', function () {
            $('.wpb_map_wraper iframe').removeClass('scrolloff'); // set the pointer events true on click
        });

        // you want to disable pointer events when the mouse leave the canvas area;

        $(".wpb_map_wraper iframe").mouseleave(function () {
            $('.wpb_map_wraper').addClass('scrolloff'); // set the pointer events to none when mouse leaves the map area
        });
	/*language*/
	var $current ='';
	$('#lang_sel ul > li > ul li a').on('click',function(){
	 //console.log($(this).html());
	 $current = $(this).html();
	 $('#lang_sel ul > li > a.lang_sel_sel').html($current);
	  $a = $.cookie('lang_select_shoppy', $current, { expires: 1, path: '/'}); 
	});
	if( $.cookie('lang_select_shoppy') && $.cookie('lang_select_shoppy').length > 0 ) {
	 $('#lang_sel ul > li > a.lang_sel_sel').html($.cookie('lang_select_shoppy'));
	}

	$('#lang_sel ul > li.icl-ar').click(function(){
		$('#lang_sel ul > li.icl-en').removeClass( 'active' );
		$(this).addClass( 'active' );
		$.cookie( 'shoppy_lang_en' , 1, { path: '/', expires: 1 });
	});
	$('#lang_sel ul > li.icl-en').click(function(){
		$('#lang_sel ul > li.icl-ar').removeClass( 'active' );
		$(this).addClass( 'active' );
		$.cookie( 'shoppy_lang_en' , 0, { path: '/', expires: -1 });
	});
	
	var shoppy_Lang = $.cookie( 'shoppy_lang_en' );
	if( shoppy_Lang == null ){
		$('#lang_sel ul > li.icl-en').addClass( 'active' );
		$('#lang_sel ul > li.icl-ar').removeClass( 'active' );
	}else{
		$('#lang_sel ul > li.icl-en').removeClass( 'active' );
		$('#lang_sel ul > li.icl-ar').addClass( 'active' );
	}
	/*Verticle Menu*/
	if( !( $('#yt_header').hasClass( 'header-style10' ) ) ) {
		$('.vertical-megamenu').each(function(){
			var number	 = $(this).parent().data( 'number' ) - 1;
			var lesstext = $(this).parent().data( 'lesstext' );
			var moretext = $(this).parent().data( 'moretext' );
			$(this).find(	' > li:gt('+ number +')' ).hide().end();		
			if($(this).children('li').length > number ){ 
				$(this).append(
					$('<li><a class="open-more-cat">'+ moretext +'</a></li>')
					.addClass('showMore')
					.on('click', function(){
						console.log( $(this).siblings(':hidden') );
						if($(this).siblings(':hidden').length > 0){
							$(this).html('<a class="close-more-cat">'+ lesstext +'</a>').siblings(':hidden').show(400);
						}else{
							$(this).html('<a class="open-more-cat">'+ moretext +'</a>').show().siblings( ':gt('+ number +')' ).hide(400);
						}
					})
				);
			}
		});
	}
// -------------------------Block, Hidden Menu-------------------------
	$(document).ready(function(){
	    $(".header-open").click(function(){
	        $(".header-style13").fadeToggle(200);
	       $('.header-style13').addClass('open'); 
	       $('.header-style13').removeClass('closes');
	    });
	});
	$('.wap-main').click(function(){
	    $('.header-style13').addClass('closes');
	    $('.header-style13').removeClass('open');
	});
	$('.header-close').click(function(){
	    $('.header-style13').addClass('closes');
	    $('.header-style13').removeClass('open');
	});
// -------------------------Block, Hidden Menu-------------------------
	jQuery(window).scroll(function(){
		$('.header-open').addClass('bg-header-open');
	});	
		/*remove loading*/
	$(".sw-woo-tab").fadeIn(300, function() {
		var el = $(this);
		setTimeout(function(){
			el.removeClass("loading");
		}, 1000);
	});
	$(".sw-woo-tab-cat-resp").fadeIn(300, function() {
		var el = $(this);
		setTimeout(function(){
			el.removeClass("loading");
		}, 1000);
	});
	$(".tab-content").fadeIn(300, function() {
		var el = $(this);
		setTimeout(function(){
			el.removeClass("loading");
		}, 1000);
	});
	$(".responsive-slider").fadeIn(300, function() {
		var el = $(this);
		setTimeout(function(){
			el.removeClass("loading");
		}, 1000);
	});
		

	$(document).ready(function(){
		var max = -1;
		$( '.products-loop > li.item' ).each( function(){
			var h = $(this).outerHeight(); 
			max = h > max ? h : max;
		});
		$( '.products-loop > li.item' ).css( 'height', max );
	});
	
	
}(jQuery));