jQuery(function ($) {
	/************************* 
	Variables
	**************************/
	
	var browserwidth;
	var desktopwidth = 1024; // resolución mínima desktop
	var mobilewidth = 767; // resolución máxima móviles
	
	if (!Modernizr.svg) {
	  $("a.logo img").attr("src", "wp-content/themes/ahumadores-theme/images/elements/logo_ahumadores.png");
	  $('img[src$=".svg"]').hide();
	}

	/************************* 
	Functiones
	**************************/
	
	// Obtiene anchura del browser 	
	function getbrowserwidth(){
		browserwidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth || 0;
		return browserwidth;
		//console.log(browserwidth);
	}
	
	function onLoadAndResize(){ 
		getbrowserwidth();
		galeriaHome();
		modalSuscribe(); 

		$(document).foundation();		
	    $(document).on("click",".close",function(){
	     	$('#cart-modal').foundation('reveal', 'close');
	    });
		
		if (browserwidth >= mobilewidth) {
			menuDesplegable();	
		}
		
		if (browserwidth <= mobilewidth) { 
			menuAddParent();
			adjustMenu();		
		}
		
	}
	
	function modalSuscribe() {
		//$('#box-modal').foundation('reveal', 'open');
		$('#box-modal .close-reveal-modal').foundation('reveal', 'close');
	}
	
	function addCookie() {
		var getdays = document.getElementById("cookiesdays");
		var days = $(getdays).text();
		var amount = + days.replace(/,/g, '');
		
		if (!Cookies.set('modalpop')) {
	    // create the cookie
	    Cookies.set('modalpop', true, { expires: amount})
	      //call the reveal modal
	      var delay=0; 
	      setTimeout(function(){
	        //open modal
	         $('#box-popup').foundation('reveal', 'open');
	         $('a.open_modal').trigger('click');
	       },delay);
	    }
	    
	    if (!$("body").hasClass("page-template-page-landing-php")) {
		   $(document).on('opened.fndtn.reveal', '#box-popup[data-reveal]', function () {
			    $("iframe#ytplayer").attr("src", $("iframe#ytplayer").attr("src").replace("autoplay=0", "autoplay=1"));
		    });
		    
		    $(document).on('close.fndtn.reveal', '#box-popup[data-reveal]', function () { 
			    $("iframe#ytplayer").attr("src", $("iframe#ytplayer").attr("src").replace("autoplay=1", "autoplay=0"));
			});  
		} 
	}
	
	function menuAddParent() {
	 	$("#menu-menu-principal li a").each(function() {
	     	if ($(this).next().length > 0) {
	    		$(this).addClass("parent");
		  	};
		});
	}

	var adjustMenu = function() {
		if (browserwidth <= mobilewidth) {
		    // if "more" link not in DOM, add it
		    if (!$(".plus")[0]) {
		    	$('<div class="plus">&nbsp;</div>').insertBefore($('.parent')); 
		    }
		    
			$("#menu-menu-principal li").unbind('mouseenter mouseleave');
			$("#menu-menu-principal li a.parent").unbind('click');
			$("#menu-menu-principal li .plus").unbind('click').bind('click', function() {		
				$(this).parent("li").toggleClass("hover");
			});
			
		} else if (browserwidth >= mobilewidth)  {
			// remove .more link in desktop view
	   	    $('.plus').remove(); 
			$(".toggleMenu").css("display", "none");
			$("#menu-main  li").removeClass("hover");
			$("#menu-main  li a").unbind('click');
			
		}
	}
	   
	function menuDesplegable() {
	   $("ul#menu-menu-principal").superfish({
	        delay:       0,                     
	        animation:   {opacity:'show',height:'show'},
	        speed:       'fast',                          
	        autoArrows:  false,                            
	        dropShadows: false                            
	    });
	}
		
	function galeriaHome() {
		
		if($('#homeslider .slides li').length>1) {
			$('#homeslider').flexslider({
			    animation: "slide",
			    controlNav: false,
			    directionNav: true,
			    mousewheel: false, 
			    start: function(slider) {
		          if($('#home-gallery .slides li').length==1) {
		            $('.slides li').delay('800').animate ({
		            	"display":"block",
						"opacity" : "1"   
		            });
		          }
		        }	  
		    });
	    } else {
		    $('#homeslider .slides li').css('display','block');
	    }
	 }


	/************************* 
	Ejecución
	**************************/

	$(window).load(function() {
	   onLoadAndResize();
	   
	   addCookie();
	   
	   $(".toggleMenu").click(function(e) {
			e.preventDefault();
			$(this).toggleClass("active");
			$("#menu-main").slideToggle();				
			
		    if ($(".toggleMenu").hasClass('active')) {
			    $(".toggleMenu .icon-menu").text('✕');
			} else {
				$(".toggleMenu .icon-menu").text('☰');
			}
		});
	
	});

	$(window).resize(function(){
		onLoadAndResize();
	});

});



