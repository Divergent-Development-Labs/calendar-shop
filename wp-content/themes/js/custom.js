new WOW().init();
var blog_lead_id;
var date = new Date();
jQuery(document).ready(function($){	
	globalQueryVars();
	/*_blank for rent assure*/
	$('.menu-item-34883 a').attr("target","_blank");
	$('.menu-item-34884 a').attr("target","_blank");
	/*mobile sticky call button slide out*/
	$('.m-call-slideout, .close-call-div').on('click', function () {	
		if($('.m-call-us').hasClass('show')){
			$('.m-call-us').removeClass('show');
		}else{
			$('.m-call-us').addClass('show');
		}		
	});
	/*input tel for all mobile input*/
	var errorMsg=$("#error-msg"),validMsg=$("#valid-msg");
	var reset=function(){
		
	};
	var int_tel = new Array();
	$('input[type="tel"]').each(function(index){
		var telInput=$(this);
		telInput.intlTelInput({initialCountry:"IN",utilsScript:siteurls.template_url+"/js/utils.js"});
		
	});
	$(document).on('input','input[type="tel"]',function(){		
		var cc = $('.country.highlight.active').attr("data-dial-code");
		/* var cc = $('ul.country-list').find('.active').attr("data-dial-code"); */
		$("input[name='CountryCode']").val(cc);
	});

	var mobile_flag = "Not Mobile";
	var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
	if (isMobile) {
	 	mobile_flag = "Mobile";
	 	if($('#srd').length){
	 		$('#srd').val('5f4fb908923d4a28010c644e');
	 	}
	}else{
		if($('#srd').length){
	 		$('#srd').val('5f4fb8ec923d4a27f70c7597');
	 	}
	}

	if($('#input_9_9').length){
		$('#input_9_9').val(isadBlockEnabled());
		$('#input_9_10').val(mobile_flag);
	}
	if($('#is_adblock').length){
		$('#is_adblock').val(isadBlockEnabled());
		$('#is_mobile').val(mobile_flag);
	}


	
	

	(async () => {
		var is_private;
		if("storage" in navigator && "estimate" in navigator.storage) {
			const { usage, quota } = await navigator.storage.estimate();
			if(quota < 120000000) {
			  	is_private = 'Yes';
			}else{
			  	is_private = 'No';
			}
		}else{
			is_private = 'NA';
		}
  	
  		if($('#input_9_8').length){
  			$('#input_9_8').val(is_private);
  		}
  		if($('#is_incognito').length){
  			$('#is_incognito').val(is_private);
  		}
  	})();

  	blog_lead_id = 'lead_'+date.getTime();
	if($('#input_9_6').length){
		$('#input_9_6').val(blog_lead_id);
	}

	if($('#input_9_7').length){
		$('#input_9_7').val(window.navigator.userAgent);
	}

	$(document).on("gform_confirmation_loaded", function (e, form_id) {
		console.log('form 9 submitted!');
		if(form_id == 9){
			var tag_push = dataLayer.push({'event': 'event blog enquire submit', 'lead_id' : blog_lead_id});
		}
	});
	
	/* country active highlight
	data-dial-code */
	/* 
	$("input[type='tel']").blur(function(){
		$('input[type="tel"]').each(function(index){
			if($.trim($(this).val())){
				console.log('hey '+ $(this).val());
				if($(this).intlTelInput("isValidNumber")){
					$(this).val($(this).intlTelInput("getNumber"));
				}else{
					$(this).addClass("error");
					errorMsg.removeClass("hide");
				}
			}
		});
	});
	 */
	/* 
	var reset=function(){
		telInput.removeClass("error");
		errorMsg.addClass("hide");
		validMsg.addClass("hide");
	};
	telInput.blur(function(){
		reset();
		if($.trim(telInput.val())){
			if(telInput.intlTelInput("isValidNumber")){
				
			}else{
				telInput.addClass("error");errorMsg.removeClass("hide");
			}}});telInput.on("keyup change",reset);$("#Mobile").on('blur',function(){$(this).val($(this).intlTelInput("getNumber")); */
	/*close the search input on open hamburger menu - vice versa*/
	$('#navbarNav').on('shown.bs.collapse', function () {	
		if($('.search-input-container').hasClass('fade-cus')){
			if ($(document).width() < 768) {
				$('.search-input-container').animate({left:'12%'},'1000','linear');
			}
			$('.search-input-container').removeClass('fade-cus');
			$('.search-result').css('display','none');
			if($('i.chang').hasClass('fa-search')){
				$('i.chang').removeClass('fa-search');
				$('i.chang').addClass('fa-close');
			}else{
				$('i.chang').removeClass('fa-close');
				$('i.chang').addClass('fa-search');
			}
		}
	});
	/*Main menu Display - 3 columns*/
	/*if ($(window).width() > 769) {
		
		var productdivs = $(".menu-item-5233>ul.sub-menu>li");
		
		var len = productdivs.length / 2;
		var mod = len % 4;
		len =len-mod;
		var i;
		for( i = 0; i < len; i+=4) {
			productdivs.slice(i, i+4).wrapAll("<div class='arrange-nav'></div>");
		}		
		if(mod != 0){
			productdivs.slice(i, i + mod).wrapAll("<div class='arrange-nav'></div>");
		}		
		
		var productdivs = $(".menu-item-5774>ul.sub-menu>li");
		for(var i = 0; i < productdivs.length; i+=2) {
		  productdivs.slice(i, i+2).wrapAll("<div class='arrange-nav'></div>");
		}
		var productdivs = $(".menu>li.menu-item-2051>ul.sub-menu>li");
		for(var i = 0; i < productdivs.length; i+=1) {
		  productdivs.slice(i, i+1).wrapAll("<div class='arrange-nav'></div>");
		}
		var productdivs2 = $("li.menu-item-5839>ul.sub-menu>li");
		for(var i = 0; i < productdivs2.length; i+=5) {
		  productdivs2.slice(i, i+5).wrapAll("<div class='arrange-nav'></div>");
		}
		var productdivs3 = $("li.menu-item-5238>ul.sub-menu>li");
		for(var i = 0; i < productdivs3.length; i+=3) {
		  productdivs3.slice(i, i+3).wrapAll("<div class='arrange-nav'></div>");
		}
			
		$("#menu-primary-menu > li.menu-item-has-children:not(#menu-item-34814) > a").on('click', function(e) {
			e.preventDefault();
		});
	}*/
	
	if ($(window).width() < 769) {
		
		/* $('#menu-primary-menu>li>a').on('click', function(e){
			e.preventDefault();
		}); */
		$('.mobile_d').val('Mobile Enquiry');
		$('.primary-header').addClass('fixed-menu');
		
		$('.mobile-nav-list .menu-item-has-children').append("<span class='extend'> + </span>");
		$(".menu-item-has-children .extend").on('click', function(e) {
			if($( this ).prev().hasClass('active')){
				$( this ).prev().fadeOut();
				$( this ).prev().removeClass('active');
			}else{
				$( this ).prev().addClass('active');
				$( this ).prev().fadeIn();
			}
		});  
		/* $(".mobile-nav-list .menu-item-has-children").on('click', function(e) {	
			if($( this ).children().closest('.sub-menu').hasClass('active')){
				$( this ).children().closest('.sub-menu').fadeOut();
				$( this ).children().closest('.sub-menu').removeClass('active');
			}else{
				$( this ).children().closest('.sub-menu').addClass('active');
				$( this ).children().closest('.sub-menu').fadeIn();
			}
		}); */
	/* 	$('.mobile-nav-list li.menu-item-has-children > a').click(function(e){
				if($(this).next().hasClass('active')){
					$(this).next().fadeOut();			
					$(this).next().removeClass('active');		
				}else{
					$(this).next().fadeIn();
					$(this).next().addClass('active');
				}
		});
		 */
/* 		$("#primary-header li a").on('click', function(e) {
			if($(this).siblings("ul").length > 0)
			{
				$(this).attr("href","javascript:void(0);");
			}
		});

 */		$(".menu-item-has-children > a").on('click', function(e) {
			
			e.preventDefault();
			if($( this ).next('ul').hasClass('active')){
				$( this ).next('ul').fadeOut();
				$( this ).next('ul').removeClass('active');
			}else{
				$( this ).next('ul').addClass('active');
				$( this ).next('ul').fadeIn();
			} 
		});
	}
	
	if($("#home-slider").length > 0){
		var homapageSpecSwiper = new Swiper("#home-slider",{
			loop:true,
			slidesPerView:1,
			slidesPerGroup:1,
			spaceBetween:30,
		});
	}

	if($("#slider-1").length > 0){
		var slider = new Swiper("#slider-1",{
			loop:false,
			slidesPerView:2,
			slidesPerGroup:1,
			spaceBetween:30,
			navigation: {
				nextEl: $(this).find('.tab-swiper-button-next'),
				prevEl: $(this).find('.tab-swiper-button-prev'),
			},
		});
	}

	if($("#management-leadership").length > 0){
		var swiper_management_leadership = new Swiper("#management-leadership",{
			loop:false,
			slidesPerView:4,
			slidesPerGroup:1,
			spaceBetween:50,
			navigation: {
				nextEl: $(this).find('.next-asp'),
				prevEl: $(this).find('.prev-asp'),
			},
			breakpoints: {
				
				768: {
					slidesPerView: 2,
					loopedSlides: 2,
					spaceBetween: 10
				},
				675: {
					slidesPerView: 1,
					loopedSlides: 1,
					spaceBetween: 20
				}
			}
		});
	}

	if($("#swiper-aspiringstars").length > 0){
		var aspiringStarsSwiper = new Swiper("#swiper-aspiringstars",{
			loop:false,
			slidesPerView:1,
			slidesPerGroup:1,
			spaceBetween:30,
			navigation: {
				nextEl: $(this).find('.next-asp'),
				prevEl: $(this).find('.prev-asp'),
			},
		});
	}

	/*abt us page hover effect*/
	jQuery('.overlay').on('hover',function(){		
		$('.overlay').removeClass('eff');
		$(this).addClass('eff');
	});
	/*Map functionality on Single page*/
	/* jQuery('.filter-location').on('change',function(){
		console.log('hey');
		var checked = $(this).val();
		if(checked == 'Entertainment'){
			checked = 'movie_theater'
		}
		if(checked == 'Nearest Commute'){
			checked = 'bus_station'
		}
		var url;
		url = 'https://www.google.com/maps/embed/v1/search?key=AIzaSyBqWNIiTP5CWCaXsMpuWDXqefGJLkq0Ibc&q='+ checked +'+near+'+map_details.title+'&center='+map_details.latitude+','+map_details.longitude+'&zoom=16';
		//console.log(url);
		$('#map-filter').attr('src',url);
		$('html, body').animate({
			scrollTop: $("#location").offset().top
		}, 500);
	}); */
	$('.sticky-btns>a').click(function(e){
		$('.div-to-extend').removeClass('open');
		$(this).next('.div-to-extend').addClass('open');
	});
	$('a.close-extend').click(function(e){
		$(this).parent('.div-to-extend').removeClass('open');
	}); 

	if($("#home-main-slider").length > 0){
		var homapageMainSwiper = new Swiper("#home-main-slider",{
			loop:false,
			slidesPerView:1,
			slidesPerGroup:1,
			spaceBetween:30,
			autoplay: {delay: 3000,},
	    	speed: 800,
	    	navigation: {
			    nextEl: '.home_slide_next',
			    prevEl: '.home_slide_prev',
			},
			observer: true, 
			observeParents: true
		});
		homapageMainSwiper.autoplay.start();
	}
	
	$('.filter-select').on('change',function(e){
		$('.search-error').css('display','none');
	});	
	$('#type').on('change', function(e){
		if($(this).val() === 'plots'){
			$('#bedroomconf option:eq(0)').prop('selected', true);
			$('#bedroomconf').attr('disabled', 'disabled');
		}else{
			$('#bedroomconf').removeAttr('disabled');
		}
	});
	/*blog page content scroll*/
	$('.h2-scroll').on('click',function(e){
		var myIndex = $(this).parent().index();
		$('html, body').animate({ scrollTop: $('.blog-content-holder h2').eq(myIndex).offset().top }, 500);		
	});
	/*search bar*/
	$('.search-click').on('click',function(e){
		if($('i.chang').hasClass('fa-search')){
			$('i.chang').removeClass('fa-search');
			$('i.chang').addClass('fa-close');
		}else{
			$('i.chang').removeClass('fa-close');
			$('i.chang').addClass('fa-search');
		}
		if($('#menu-primary-menu').hasClass('fade-out')){
			$('#menu-primary-menu').removeClass('fade-out');
		}else{
			$('#menu-primary-menu').addClass('fade-out');
		}
		
		if($('.mobile-nav-list').hasClass('show')){
			$('.navbar-toggler').click();
		}
		if($('.search-input-container').hasClass('fade-cus')){
			if ($(document).width() < 769) {
				$('.search-input-container').animate({left:'12%'},'1000','linear');
			}else{
				$('.search-input-container').animate({left:'100%'},'1000','linear');
			}
			$('.search-input-container').removeClass('fade-cus');
			$('.search-result').css('display','none');
		}else{
			$('.search-input-container').addClass('fade-cus');
			 if ($(document).width() < 769) {
				$('.search-input-container').animate({left:'12%'},'1000','linear');
			}else{
				$('.search-input-container').animate({left:'100%'},'1000','linear');
			}
			/*  $('.search-input-container').fadeIn('1000','swing');   */
			/* $('.search-input-container').css('transform','translateX(0)');
			$('.search-input-container').css('transition','0.5s'); */
			$('#search-text').focus();		
		} 
	});	
	/*search bar ends*/
	/* $(document).on('click','.enq-now',function(){
		alert('hi');
		$(this).next('a.trigger-click').click();	
	}); */
/* 	$('.enq-now').on('click',function(e){		
		// var href = $(this).next('a.trigger-click').attr('href');
		//	$("a").click();
		
		$(this).next('a.trigger-click').click();	
	});	 */
	/*walkthrough swiper*/
	if($("#multiple_walkthrough").length > 0){
		var multiple_walkthrough = new Swiper("#multiple_walkthrough",{
			loop:true,
			slidesPerView:1,
			slidesPerGroup:1,
			spaceBetween:30,
			navigation: {
				nextEl: '.walkthrough_swiper-button-next',
				prevEl: '.walkthrough_swiper-button-prev',
			},		
		}); 
		$('a[data-toggle="pill"]#v-pills-walkthrough-tab').on('shown.bs.tab', function (e) {
			multiple_walkthrough.update();
			$(window).trigger('resize');
		});
	}
	jQuery('.walkthrough-tap').on('click',function(){
		$('a[href="#v-pills-walkthrough"]').tab('show');
		$(window).trigger('resize');
		$('html, body').animate({
			scrollTop: $("#gallery_images").offset().top
		}, 500);
	});
	/*jQuery('a[data-toggle="pill"].walkthrough').on('shown.bs.tab', function (e) { 
		console.log('test');		
		multiple_walkthrough.update();
		$(window).trigger('resize');
		$('html, body').animate({ scrollTop: $( '#gallery_images' ).offset().top }, 500);	
	});*/
		
	/*walkthrough swiper ends*/
	
	/*site progress and Floor Plans*/
	var mySwiper_fp = new Array();
	$('.floor-plans-gallery').each(function(index){
		//console.log(index);
		mySwiper_fp[index] = new Swiper($(this),{
			loop:false,
			slidesPerView:1,
			slidesPerGroup:1,
			spaceBetween:30,
			navigation: {
				nextEl: $(this).find('.next'),
				prevEl: $(this).find('.prev'),
			},
		});
	});
	$('a[data-toggle="pill"].floor-plans-gallery-subtab').on('shown.bs.tab', function (e) {
		// $('html, body').animate({ scrollTop: $( '#fp_gallery_images' ).offset().top }, 500);
		$('.floor-plans-gallery').each(function(index){
			mySwiper_fp[index].update();
		});
		$(window).trigger('resize');
	});
	$('.fp-expand-next-ul').on('click',function(e){
		if($(this).prevAll('.site-progress-gallery-subtab').hasClass('open')){
			$(this).prevAll('.site-progress-gallery-subtab').removeClass('open');
		}
		if($(this).nextAll('.floor-plans-gallery-subtab').hasClass('open')){
			$(this).removeClass('opened');
			$(this).nextAll('.floor-plans-gallery-subtab').removeClass('open');
		}else{
			$('.floor-plans-gallery-subtab').removeClass('open');
			$(this).addClass('opened');
			$(this).nextAll('.floor-plans-gallery-subtab').addClass('open');
		}

	});
	
	
	var mySwiper_sp = new Array();
	$('.site-progress-gallery').each(function(index){
		mySwiper_sp[index] = new Swiper($(this),{
			loop:true,
			slidesPerView:1,
			slidesPerGroup:1,
			spaceBetween:30,
			navigation: {
				nextEl: $(this).find('.next'),
				prevEl: $(this).find('.prev'),
			},
		});
	});

	var mySwiper_wk = new Array();
	$('.swipe-walkthrough-gallery').each(function(index){
		mySwiper_wk[index] = new Swiper($(this),{
			loop:true,
			slidesPerView:1,
			slidesPerGroup:1,
			spaceBetween:30,
			navigation: {
				nextEl: $(this).find('.next'),
				prevEl: $(this).find('.prev'),
			},
		});
	});

	$('a[data-toggle="pill"].gallery-subtab').on('shown.bs.tab', function (e) {
		$('html, body').animate({ scrollTop: $( '#gallery_images' ).offset().top }, 500);	
		$('.site-progress-gallery').each(function(index){
			mySwiper_sp[index].update();
		});
		$(window).trigger('resize');
	});
	$('a[data-toggle="pill"].walkthrough-subtab').on('shown.bs.tab', function (e) {
		$('.swipe-walkthrough-gallery').each(function(index){
			mySwiper_wk[index].update();
		});
		$(window).trigger('resize');
	});
	
	/*expand accordion sp*/	
	$(document).on('click', '.sp-expand-next-ul', function(e){	
		if($(this).prevAll('.interior_video-gallery-subtab').hasClass('open')){
			$(this).prevAll('.interior_video-gallery-subtab').removeClass('open');
			$('.iv-expand-next-ul').removeClass('opened');
		}
		if($(this).nextAll('.site-progress-gallery-subtab').hasClass('open')){
			$(this).removeClass('opened');
			$(this).nextAll('.site-progress-gallery-subtab').removeClass('open');	
		}else{
			$('.site-progress-gallery-subtab').removeClass('open');
			$(this).addClass('opened');
			$(this).nextAll('.site-progress-gallery-subtab').addClass('open');
		}
		
	});	

	/*expand accordion sp*/	
	$(document).on('click', '.wk-expand-next-ul', function(e){	
		if($(this).prevAll('.site-progress-gallery-subtab').hasClass('open')){
			$(this).prevAll('.site-progress-gallery-subtab').removeClass('open');
			$('.sp-expand-next-ul').removeClass('opened');
		}

		if($(this).nextAll('.site-walkthrough-subtab').hasClass('open')){
			$(this).removeClass('opened');
			$(this).nextAll('.site-walkthrough-subtab').removeClass('open');
		}else{
			$(this).addClass('opened');
			$(this).nextAll('.site-walkthrough-subtab').addClass('open');
		}
		
	});	

	/*var curr_video_url = '';
	$(document).on('click', '.wk_video_switch', function(){
		curr_video_url = $(this).data('videoref');
		if($('#walkthrough_video').attr('src') != curr_video_url ){
			$('#walkthrough_video').css('visibility', 'hidden');
			$('#walkthrough_video').attr('src', curr_video_url+'&autoplay=true');
			setTimeout(function(){
				$('#walkthrough_video').css('visibility', 'visible');
			}, 500);
		}
	});*/

	/*expand accordion sp ends*/	
	/*site progress and Floor Plans*/
	
	/*elevation gallery*/	
	if($("#elevation_gallery").length > 0){
		var elevation_gallery = new Swiper(('#elevation_gallery'),{
			loop:true,
			slidesPerView:1,
			slidesPerGroup:1,
			spaceBetween:30,
			navigation: {
				nextEl: '.ele-swiper-button-next',
				prevEl: '.ele-swiper-button-prev',
			},
		});
		
		$('a[data-toggle="pill"].elevation_gal').on('shown.bs.tab', function (e) {
			elevation_gallery.update();
			$(window).trigger('resize');
			$('html, body').animate({ scrollTop: $( '#gallery_images' ).offset().top }, 500);	
		});	
	}
	/*elevation gallery ends*/
	
	/*interior videos accordion ends*/	
	$('.iv-expand-next-ul').on('click',function(e){
		if($(this).nextAll('.site-progress-gallery-subtab').hasClass('open')){
			$(this).nextAll('.site-progress-gallery-subtab').removeClass('open');
			$('.sp-expand-next-ul').removeClass('opened');
		}
		if($(this).nextAll('.interior_video-gallery-subtab').hasClass('open')){
			$(this).removeClass('opened');
			$(this).nextAll('.interior_video-gallery-subtab').removeClass('open');
		}else{
			$('.interior_video-gallery-subtab').removeClass('open');
			$(this).addClass('opened');
			$(this).nextAll('.interior_video-gallery-subtab').addClass('open');
		}
	});
	/*interior videos accordion ends*/
	
	/*interior gallery*/	
	if($("#interiors_gallery").length > 0){
		var interiors_gallery = new Swiper(('#interiors_gallery'),{
			loop:true,
			slidesPerView:1,
			slidesPerGroup:1,
			spaceBetween:30,
			navigation: {
				nextEl: '.int-swiper-button-next',
				prevEl: '.int-swiper-button-prev',
			},
		});
		
		$('a[data-toggle="pill"].interiors_gal').on('shown.bs.tab', function (e) {
			interiors_gallery.update();
			$(window).trigger('resize');
			$('html, body').animate({ scrollTop: $( '#gallery_images' ).offset().top }, 500);	
		});	
	}
	/*interior gallery ends*/
	
	/*Amenities gallery - not in use*/
	if($("#amenities_gallery").length > 0){
		var amenities_gallery = new Swiper(('#amenities_gallery'),{
			loop:true,
			slidesPerView:1,
			slidesPerGroup:1,
			spaceBetween:30,
			navigation: {
				nextEl: '.amen-swiper-button-next',
				prevEl: '.amen-swiper-button-prev',
			},
				
		});
		$('a[data-toggle="pill"]#v-pills-amenities-tab').on('shown.bs.tab', function (e) {
			amenities_gallery.update();
			$(window).trigger('resize');
		});	
	}
	/*Amenities gallery - not in use ends*/
	
	/*media page slides*/
	$(document).on('click','a[data-toggle="pill"].click-pr-tab', function (e) {
		//$( this ).dblclick();
		var tabId = $(this).attr('href');
		//console.log(mySwiper_fp);
		$('.floor-plans-gallery').each(function(index){
			mySwiper_fp[index].update();
		});
		$(window).trigger('resize');
		$('html, body').animate({
			scrollTop: $( '#v-pills-press' ).offset().top
		}, 500);
		if($(this).hasClass('active')){
			$('.ul-pr a').removeClass('active');
		}else{
			$('.ul-pr a').removeClass('active');
			$(this).addClass('active');
		}
	});
	/*media page slides ends*/
	
	/*media page accordion*/
	$('.pr-expand-next-ul').on('click',function(e){			
		if($(this).next('.ul-pr').hasClass('open')){
			$(this).next('.ul-pr').removeClass('open');
			
		}else{
			$('.ul-pr').removeClass('open');
			$(this).next('.ul-pr').addClass('open');
		}
		if($(this).hasClass('opened')){
			//alert('opened');
			$(this).removeClass('opened');
		}else{
			$('.pr-expand-next-ul').removeClass('opened');
			$(this).addClass('opened');
		}
	});
	/*media page accordion ends*/
		
	$('a.scroll').click(function(){
		$('html, body').animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top
		}, 500);
		return false;
	});
	
	/*Counter*/
	$('.counter').each(function() {
		
		var $this = $(this),
		countTo = $this.attr('data-count');

		$({ countNum: $this.text()}).animate({
			countNum: countTo
		},
		{
			duration: 3000,
			easing:'linear',
			step: function() {
				$this.text(Math.floor(this.countNum));
			},
			complete: function() {
				$this.text(this.countNum);
			}

		});  
	});
	
	$(function() {
		$('#breadcrumbs').each(function() {
		   var $this = $(this);
		  $this.html($this.html().replace('<a href="https://www.calendarshop.co.in/residential/%locations%/">Projects</a> | ', ''));
		});
	  
	});	

	$(document).on('click', '#unit_type_select, #bhk_type_select', function(){
		$('.phase_table_mobile_row').hide();
		if($('#unit_type_select')[0].selectedIndex > 0 && $('#bhk_type_select')[0].selectedIndex > 0){
			$('.phase_table_mobile_row.'+$('#unit_type_select').val()+'.'+$('#bhk_type_select').val()).show();
		}else if($('#unit_type_select')[0].selectedIndex > 0){
			$('.phase_table_mobile_row.'+$('#unit_type_select').val()).show();
		}else if($('#bhk_type_select')[0].selectedIndex > 0){
			$('.phase_table_mobile_row.'+$('#bhk_type_select').val()).show();
		}else{
			$('.phase_table_mobile_row').show();
		}
	});
});	

function globalQueryVars(){
	getUrlVars();
	if($('input[name="utm_source"]').length){
        $('input[name="utm_source"]').val(getCasaCookie('casa_utm_source'));
    }
    if($('input[name="utm_Placement"]').length){
        $('input[name="utm_Placement"]').val(getCasaCookie('casa_utm_Placement'));
    }
    if($('input[name="utm_placement"]').length){
        $('input[name="utm_placement"]').val(getCasaCookie('casa_utm_placement'));
    }
    if($('input[name="utm_term"]').length){
        $('input[name="utm_term"]').val(getCasaCookie('casa_utm_term'));
    }
    if($('input[name="utm_Campaign"]').length){
        $('input[name="utm_Campaign"]').val(getCasaCookie('casa_utm_Campaign'));
    }
    if($('input[name="utm_campaign"]').length){
        $('input[name="utm_campaign"]').val(getCasaCookie('casa_utm_campaign'));
    }
    if($('input[name="srd"]').length){
        $('input[name="srd"]').val(getCasaCookie('casa_srd'));
    }
}

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
        setCasaCookie('casa_'+key, value, 30);
        //console.log(key + ' - ' + value);
    });
    return vars;
}

function setCasaCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+ d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCasaCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i <ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
		  	c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
		  	return c.substring(name.length, c.length);
		}
	}
	return "";
}

function isadBlockEnabled(){
	var adBlockEnabled = 'No';
	var testAd = document.createElement('div');
	testAd.innerHTML = '&nbsp;';
	testAd.className = 'adsbox';
	document.body.appendChild(testAd);
	window.setTimeout(function() {
	  if (testAd.offsetHeight === 0) {
	    	adBlockEnabled = 'Yes';
	  }
	  testAd.remove();
	  return adBlockEnabled;
	}, 100);
	return adBlockEnabled;
}