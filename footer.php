	<footer class="fs-10 fw-bold">
		<div class="container">
			<label class="primary-color fs-30 AvenirLTStdHeavy">Our Projects</label>
			<div class="row">
				<?php
					$sql2 = "SELECT * FROM `project` WHERE `project_status`='1'";
					$projectArray = $conn->query($sql2);

					if ($projectArray->num_rows > 0) {
						$c = 1;
						while ($project = $projectArray->fetch_assoc()) {

							if ($c == 1) {
								echo '	<div class="col-12 col-md-3">
											<ul class="link_row_1">';
							}

							if (($c % 5) == 0) {
									echo '		</ul>
											</div>
											<div class="col-12 col-md-3">
												<ul class="link_row_1">';
							}

							echo '<li><span>';
							echo ($project['project_type'] == 1) ? "Villa " : "PLot ";
							echo $project['project_name'];
							echo '</span></li>';
							$c++;

						}
						echo '</ul></div>';

					}
				?>
				<div class="col-12 col-md-3">
					<ul class="link_row_1">
					</ul>
				</div>
			</div>
			<label class="primary-color fs-30 AvenirLTStdHeavy">Get in touch</label>
			<div class="row ">
				<div class="col-12 pb-3">
					<div class="office_address">
						<!-- <div class="off_location AvenirLTStdHeavy text-bold">
							MADURAI
						</div> -->
						<div class="off_add">
							<p class="mb-0">22,<br>Lake Area Main Road,<br>Uthangudi<br>Madurai - 625 107<br> Tamil Nadu, India
								<div class="chennais"><span class="mob-link d-block">Mobile : <span class="ybtn"><a href="tel:+9197877 00111" class="ybtn">+91-97877 00111</a><span> | </span><a href="tel:+919787773834" class="ybtn">+91-97877 73834</a></span></span></div>
								<div class="chennais"><span class="mob-link d-block">Email Id : <span class="ybtn"><a href="mailto:jemibalamkt2010@gmail.com" class="ybtn">Jemibalamkt2010@gmail.com</a></span></div>								
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row ">
				<div class="col-12">
					<p>
						<div class="foo_row4">
							<div class="getintouch_seo">
								<div>
									<span style="font-weight:bold; font-size:15px;">About Calendarshop</span><br>
										Calendar Shop started at 2010 and growing gradually along with People’s trust. In real estate field Trust is more important, which has been provided by viewers such You to us. One of the leading Plot promoters | Villas | Constructor at Madurai. We have successfully completed many projects at VNCT Nagar | JP Nagar | Sathuragiri | Iswarya Lakshmi nagar and so on. We work according to Customers need. Services provided by Calendar shop - Plots | Villas | only Construction work | construct a gated community. Kindly visit Gallery for Ongoing and Completed projects of Calendar shop. Projects which we handle are more than 150 cents to 400 cents. Prior and post registration, all documents will be handed over with filing system. Processing of Documents related to Land registration and construction work will be executed at the earliest by our Team.
									<br>
									<br>
									<span style="font-weight: bold; font-size:15px;">Our Team</span>
									<br>
										Our MD – Mr. BalaShankar have great experience in real estate business for more than 15 years. His dedication towards fulfilling customer requirements makes him unique in the field. Fast delivery of documents and keys to clients makes them happier.
										MD’s wife Mrs. B. Logeswari Vice President of Calendar Shop is a special boost to our Team.
										We have a team of 10 Marketing staff | 5 support staff | Legal team | Administration | Engineers for construction | surveyors for exact land measurements | labour team for construction work 
										Our new office constructed at Lake Area near Meenakshi Mission Hospital has luxury rooms for guests and clients with few amenities | food | conference hall for private meeting.
								</div>
							</div>
						</div>
					</p>
					<p></p>

				</div>
				<div class="col-md-12 text-center">
					<a href="terms-and-condition/" class="float-left text-left primary-color AvenirLTStdHeavy">TERMS AND CONDITIONS</a> <span class="float-left" style="color:#818282">&nbsp;&nbsp;&nbsp; &copy; 2020 Calendarshop </div>
			</div>

		</div>
		<!-- <div id="sticky-slideout" class="sticky-btns" style="z-index:9999">
			<a href="#overview" class="text-center fixed-btn d-none d-sm-none d-md-block d-lg-block" style="background-color: #fcbb55;color:#fff;padding:5px;"><i class="fa fa-phone fs-30 " style="border: 2px solid #fff;border-radius: 50%;padding: 5px 9px;" aria-hidden="true"></i></a>
			<div class="div-to-extend">
				<div class="extend-content">
					<span class="form-header text-uppercase fs-20 AvenirLTStdHeavy">Call us</span>
					<div class="col-12 pt-10">
						<div class="header_call_us fs-16">
							<div class="chennai_call">
								<p class="label_city">Chennai<br><a href="tel:+919962944444" class="color-fff">99629 44444</a></p>
							</div>
							<div class="coimbatore_call">
								<p class="label_city">Coimbatore<br><a href="tel:+917299370000" class="color-fff">72993 70000 </a></p>
							</div>
							<div class="bangalore_call">
								<p class="label_city">Bangalore<br><a href="tel:+919886888880" class="color-fff">98868 88880</a></p>
							</div>
							<div class="nri_call">
								<p class="label_city">NRI <br><a href="tel:+919176344444" class="color-fff">91763 44444</a></p>
							</div>
						</div>
					</div>
				</div>
				<a class="close-extend">X</a>
			</div>
		</div> -->
		<script type='text/javascript' src='wp-content/themes/js/bootstrap.min.js'></script>
		<script type='text/javascript' src='wp-content/themes/js/swiper.min.js'></script>
		<script type='text/javascript' src='wp-content/themes/js/validator.min.js'></script>
		<script type='text/javascript' src='wp-content/themes/js/intlTelInput.min.js'></script>
		<script type='text/javascript' src='wp-content/themes/js/wow.min.js'></script>
		<!-- <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBSySEpEe05QrYkYuOhQXJc3mbGpg5GftI&#038;ver=3.1'></script> -->

		<!-- <script type='text/javascript'>
			/* <![CDATA[ */
			var siteurls = {
				"site_url": "https:\/\/localhost\/Calendarshop\/",
				"template_url": "https:\/\/localhost\/Calendarshop\/\/wp-content\/themes\/"
			};
			/* ]]> */
		</script> -->

		<script type='text/javascript' src='wp-content/themes/js/custom.js'></script>
		<script type='text/javascript' src='wp-includes/js/wp-embed.min.js'></script>
		<script type='text/javascript'>
			/* <![CDATA[ */
			// var ajax_object = {
			// 	"ajaxurl": "https:\/\/localhost\/Calendarshop\/\/wp-admin\/admin-ajax.php"
			// };
			/* ]]> */
		</script>
		<script type='text/javascript' src='wp-content/themes/js/custom-filter.js'></script>
		<script type='text/javascript'>
			/* <![CDATA[ */
			// var ajax_object = {
			// 	"ajaxurl": "https:\/\/localhost\/Calendarshop\/\/wp-admin\/admin-ajax.php"
			// };
			/* ]]> */
		</script>
		<script type='text/javascript' src='wp-content/themes/js/custom-jobfilter.js'></script>
	</footer>

	<section class="lower_footer clearfix">
		<div class="container">
			<div class="lf_left lf_menu_wrap float-left">
				<div class="menu-lower-footer-menu-container">
					<ul id="menu-lower-footer-menu" class="menu">
						<li id="menu-item-52132" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52132"><a href="about-us.php">About us</a></li>
						<!-- <li id="menu-item-52134" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52134"><a href="channel-partner/">Channel Partners</a></li>
						<li id="menu-item-52135" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52135"><a href="media/press-release/">Media</a></li>
						<li id="menu-item-52659" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52659"><a href="blog/">Blog</a></li>
						<li id="menu-item-52137" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52137"><a href="testimonials/">Testimonials</a></li>
						<li id="menu-item-52138" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52138"><a href="http://www.cgreferral.com/">Referrals</a></li>
						<li id="menu-item-52139" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52139"><a href="nri/">NRI</a></li>
						<li id="menu-item-52141" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52141"><a href="helpful-tools/">Helpful Tools</a></li> -->
					</ul>
				</div>
			</div>
			<div class="lf_right float-right">
				<div class="l_footer_social clearfix">
					<a href="https://www.facebook.com/profile.php?id=100055878013995" target="_blank"><img src="wp-content/themes/img/facebook-footer-icon.png" alt="facebook" /></a>
					<a href="https://twitter.com/" target="_blank"><img src="wp-content/themes/img/twitter-footer-icon.png" alt="twitter" /></a>
					<a href="https://www.instagram.com/" target="_blank"><img src="wp-content/themes/img/instagram-footer-icon.png" alt="instagram" /></a>
					<a href="https://www.linkedin.com/company" target="_blank"><img src="wp-content/themes/img/linkedin-footer-icon.png" alt="linkedin" /></a>
					<a href="https://www.youtube.com/channel/UCX7ZFk5Hqg12IR-SQSvqEkg" target="_blank"><img src="wp-content/themes/img/youtube-footer-icon.png" alt="youtube" /></a>
					<!-- <a href="" target="_blank"><img src="wp-content/themes/img/google-plus-footer-icon.png" alt="google-plus" /></a> -->
				</div>
			</div>
		</div>
	</section>



	<!-- Popup -->


	<!-- Popup -->


	<!-- Popup -->


	<!-- Chat widget script -->
	<!-- <script src="https://cwc.livserv.in/chat.js?lid=0001"></script>
	<script src='https://cw1.livserv.in?did=11912&pid=1'></script>  -->

	<!-- <script type="text/javascript">
	  jQuery(document).ready(function($) {
	    setTimeout( function(){
	      $('#casa_modal').prop('checked', true);
	    }, 5000);
	  });
	</script> -->

	<style>
		body #ls_theLayer {
			bottom: 0 !important
		}
	</style>
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script> -->
	<script type="text/javascript">
		// jQuery(document).ready(function($) {
		// 	setTimeout(function(){
		// 		$('.disclaimer-wrapper').show();
		// 	}, 3000);
		// });


		$('#hideDisclaimer').click(function(event) {
			/* Act on the event */
			event.preventDefault();
			$('.disclaimer-wrapper').hide();
		});
	</script>



	<script>
		$(document).ready(function() {
			console.log(localStorage.getItem("visited"));
			if (localStorage.getItem("visited") != 1) {
				localStorage.setItem('visited', 1);
				setTimeout(function() {
					$('.disclaimer-wrapper').show();
				}, 1000);
				var d = new Date();
				d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
				document.cookie = "visited=1; expires=" + d.toUTCString() + ";";
			}
		});

		function getCookie(cname) {
			var name = cname + "=";
			var decodedCookie = decodeURIComponent(document.cookie);
			var ca = decodedCookie.split(';');
			for (var i = 0; i < ca.length; i++) {
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
	</script>

	<script src="wp-content/themes/js/slick.min.js"></script>
	<script>
		var $ = jQuery.noConflict();
		$(document).ready(function() {
			$('.lco-slider').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: false,
				// autoplay: true,
				// autoplaySpeed: 3000,
				dots: false,
				prevArrow: $("#prvarrow"),
				nextArrow: $("#nxtarrow"),
			});
			$('.lco-slider1').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: false,
				// autoplay: true,
				// autoplaySpeed: 3000,
				dots: false,
				prevArrow: $("#prvarrow2"),
				nextArrow: $("#nxtarrow2"),
			});
			$('.psa-cast-slider').slick({
				dots: false,
				infinite: false,
				speed: 300,
				slidesToShow: 3,
				slidesToScroll: 1,
				prevArrow: $("#prvarrow1"),
				nextArrow: $("#nxtarrow1"),
				responsive: [{
						breakpoint: 1024,
						settings: {
							slidesToShow: 2
						}
					},
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 1
						}
					}
				]
			});

			/* Script for Animation */
			/*$(document).on('click', '.ahp_close', function(){
	        	$('.anim_home_popup').fadeOut(300);
	        });
	        $(document).keydown(function(event) { 
				if (event.keyCode == 27) { 
					$('.anim_home_popup').fadeOut(300);
				}
			});*/
		});

		/*$(window).on('load', function(){
	    	$('.anim_home_popup').fadeIn(200, function(){
	    		startPopupAnimation();
	    	});
	    });

		function startPopupAnimation(){
			$('.csg-pop-layer-1').addClass('visible animate__slideInUp');
			$('.csg-txt-1').removeClass('hidden').addClass('animate__fadeInUp');
			setTimeout(function(){
                $('.csg-pop-layer-2').addClass('visible animate__slideInLeft');
                $('.csg-txt-1').addClass('animate__fadeOut');
                $('.csg-txt-2').removeClass('hidden').addClass('animate__fadeInUp');
                $('.csg-pop-layer-3').addClass('visible animate__zoomIn');
            }, 1000);
            setTimeout(function(){
                $('.csg-pop-layer-4').addClass('visible animate__slideInUp');
                $('.csg-txt-2').addClass('animate__flipOutX');
                $('.csg-txt-3').removeClass('hidden').addClass('animate__flipInX');
            }, 3000);
            setTimeout(function(){
                $('.csg-txt-3').addClass('animate__zoomOut');
                $('.csg-txt-4').removeClass('hidden').addClass('animate__zoomIn');
            }, 5000);
            setTimeout(function(){
                $('.csg-pop-layer-5').addClass('visible animate__bounceInUp');
                $('.csg-txt-4').addClass('animate__zoomOut');
                $('.csg-txt-5').removeClass('hidden').addClass('animate__zoomIn');
            }, 7000);
            setTimeout(function(){
                $('.csg-txt-5').addClass('animate__zoomOut');
                $('.csg-pop-layer-4').removeClass('animate__slideInUp').addClass('animate__slideOutDown');
                $('.csg-box').addClass('visible animate__zoomIn');
                $('.grass-img').hide();
                $('.grass-img-2').show();
            }, 9000);
            setTimeout(function(){
                $('.csg-box').addClass('az-active');
                $('.csg-txt-7').removeClass('hidden').addClass('animate__zoomIn');
            }, 10000);
            setTimeout(function(){
                $('.close-loc-list').removeClass('hidden').addClass('animate__slideInLeft');
                $('.close-loc-list ul li').removeClass('hidden').addClass('animate__slideInLeft');
            }, 11000);
            setTimeout(function(){
                $('.csg-box').addClass('animate__zoomOut');
                $('.close-loc-list').removeClass('animate__slideInLeft').addClass('animate__zoomOut');
                $('.csg-box').removeClass('az-active');
                $('.csg-txt-7').addClass('animate__zoomOut');
                $('.csg-box-1').removeClass('hidden').addClass('animate__zoomIn');
                $('.grass-img').hide();
                $('.grass-img-3').show();
            }, 13000);
            setTimeout(function(){
                $('.cas-logo').addClass('visible animate__zoomIn');
            }, 14000);
            setTimeout(function(){
                $('.csg-txt-9').addClass('visible animate__zoomIn');
            }, 15000);
            setTimeout(function(){
                $('.anim_home_popup').fadeOut(300);
            }, 21000);
		}*/
	</script>

	<style type="text/css">
		img {
			outline: none;
			border: 0;
			vertical-align: middle;
		}

		.img-responsive {
			width: 100%;
			height: auto;
			display: block;
		}

		.card-img {
			height: 240px !important;
		}

		ul {
			list-style: none
		}

		html {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
			-ms-text-size-adjust: 100%;
		}

		.anim-container,
		.anim-container-fluid {
			margin-right: auto;
			margin-left: auto;
			padding-left: 14px;
			padding-right: 14px
		}

		.clearfix:after,
		.clearfix:before,
		.anim-container-fluid:after,
		.anim-container-fluid:before,
		.anim-container:after,
		.anim-container:before,
		.row:after,
		.row:before {
			content: " ";
			display: table
		}

		.clearfix:after,
		.anim-container-fluid:after,
		.anim-container:after,
		.row:after {
			clear: both
		}


		/*************  Style for Content  ***************/
		.chen-sec {
			position: fixed;
			overflow: hidden;
			width: 100%;
			height: 100%;
			font-family: 'Montserrat', sans-serif;
			font-weight: 400;
			background-color: rgba(0, 0, 0, 0.8);
			color: #ffffff;
			left: 0;
			top: 0;
			z-index: 999999999;
			display: none
		}

		.chen-wrap {
			position: relative;
			height: 100vh;
		}

		.chen-block {
			position: absolute;
			left: 0;
			right: 0;
			bottom: 53%;
			z-index: 5
		}

		.chen-box-1 {
			position: relative;
			max-width: 296px;
			height: 92px;
			width: 100%;
			margin: 0 auto 20px;
		}

		.chen-box-2 {
			position: relative;
			text-align: center;
			margin: 0 0 50px 0;
		}

		.chen-box-2 ul {
			font-size: 0;
		}

		.chen-box-2 .chen-title-1 {
			display: block
		}

		.chen-box-2 .chen-title-1,
		.chen-box-2 ul li {
			color: #ffffff;
			font-size: 16px;
			overflow: hidden;
			font-weight: 400;
			margin-bottom: 3px
		}

		.chen-box-2 ul li {
			position: relative;
			display: inline-block;
			width: auto;
			padding: 3px 0 0 28px;
			margin: 0 7px;
			line-height: 23px;
		}

		.chen-box-2 ul li:before {
			position: absolute;
			content: '';
			left: 0;
			top: 50%;
			transform: translateY(-50%);
			width: 20px;
			height: 24px;
			/* background: url(wp-content/themes/img/fc-icon.png) no-repeat; */
			background-size: 20px;
		}

		.chen-box-3 {
			max-width: 240px;
			height: 70px;
			margin: 0 auto;
			width: 100%;
		}

		.chen-box-4 {
			position: absolute;
			left: 0;
			right: 0;
			bottom: 0
		}

		.hidden {
			visibility: hidden;
		}

		.visible {
			visibility: visible;
		}

		@media (min-width:768px) {
			.anim-container {
				max-width: 1180px
			}
		}

		@media (orientation: portrait) {
			@media screen and (max-width: 1024px) {
				.chen-block {
					bottom: 40%;
				}
			}

			@media screen and (max-width: 767px) {
				.chen-block {
					bottom: 35%;
				}

				.chen-box-1 {
					max-width: 210px;
					height: 64px;
				}

				.chen-box-2 .chen-title-1,
				.chen-box-2 ul li {
					font-size: 16px;
				}

				.chen-box-2 ul li {
					padding: 0 0 0 20px;
				}

				.chen-box-2 ul li:before {
					width: 16px;
					height: 20px;
					background-size: 16px;
				}

				.chen-box-2 {
					margin: 0 0 20px 0;
				}

				.chen-box-3 {
					max-width: 135px;
					height: 39px;
				}
			}

			@media screen and (max-width: 599px) {

				.chen-box-2 .chen-title-1,
				.chen-box-2 ul li {
					font-size: 14px
				}

				.chen-block {
					bottom: 45%;
				}

				.chen-box-4 {
					bottom: 75px
				}
			}
		}

		@media screen and (max-height: 380px) {
			.chen-box-4 {
				left: 25%;
				right: auto;
				width: 50%;
			}

			.chen-box-1 {
				max-width: 184px;
				height: 56px;
			}

			.chen-box-2 .chen-title-1,
			.chen-box-2 ul li {
				font-size: 12px;
			}

			.chen-box-2 ul li {
				padding: 0 0 0 20px;
				line-height: 20px;
			}

			.chen-box-2 ul li:before {
				width: 15px;
				height: 18px;
				background-size: 15px;
			}

			.chen-box-2 {
				margin: 0 0 20px 0;
			}

			.chen-box-3 {
				max-width: 110px;
				height: 34px;
			}

			.chen-block {
				bottom: 45%;
			}
		}
	</style>

	<script type="text/javascript">
		$(window).on('load', function() {
			$('#firstcity_anim_wrap').fadeIn(200, function() {
				loadFirstcityAnimation();
			});
		});

		function loadFirstcityAnimation() {
			setTimeout(function() {
				$('.chen-box-4 .imgbox').addClass('visible animate__fadeInUp');
			}, 200);
			setTimeout(function() {
				$('.chen-box-1').addClass('visible animate__slideInDown');
			}, 2000);
			setTimeout(function() {
				$('.chen-box-2').addClass('visible animate__zoomIn');
			}, 3500);
			setTimeout(function() {
				$('.chen-box-3').addClass('visible animate__zoomIn');
			}, 5000);
			setTimeout(function() {
				$('#firstcity_anim_wrap').fadeOut(300);
			}, 5000);
		}
	</script>