<!DOCTYPE html>
<html lang="en-US">

<head>
	<?php 
		session_start();
		include 'head.php'; 
	?>
</head>

<body class="page-template-default page page-id-7 wp-custom-logo theme-tyche woocommerce-account woocommerce-page woocommerce-no-js elementor-default elementor-kit-1236">
	<div id="page" class="site">

		<?php include 'top_header_bar.php'; ?>

		<div class="site-content">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="tyche-breadcrumbs"><span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="index.php"><span itemprop="title">Home </span></a></span><span class="tyche-breadcrumb-sep">/</span><span class="breadcrumb-leaf">Login</span></div>
					</div>
				</div>
			</div>

			<div class="container">
				<div id="primary" class="content-area ">
					<main id="main" class="d-flex justify-content-center site-main col-12" role="main">

						<article id="post-7" class="shadow-lg col-md-10 col-lg-8 col-11 mx-auto border post-7 page type-page status-publish hentry mx-auto">
							<div class="">
								<header>
									<h3 class="page-title margin-top text-center">Login</h3>
								</header>
							</div>
							<div class="woocommerce card mx-auto">
								<div class="woocommerce-notices-wrapper"></div>

								<form class="woocommerce-form woocommerce-form-login card-body" method="post" action="backend/customer-login.php">

									<?php 
										if(isset($_SESSION["msg"])) {
											?>
											<div class="alert-danger mt-1 p-3"><i class="fa fa-warning"></i><?php  echo $_SESSION["msg"]; unset($_SESSION["msg"]); ?></div>
											<?php 												
										} 
									?>

									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="username" class="col-12 col-md-4">Username&nbsp;<span class="required">*</span></label>
										<input type="text" class=" col-md-8 woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="" /> </p>
									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="password" class="col-12 col-md-4 col-lg-4">Password&nbsp;<span class="required">*</span></label>
										<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
									</p>


									<p class="form-row">
										<!-- <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
											<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span>Remember me</span>
										</label> -->
										<!-- <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="0d78ba4afa" />
										<input type="hidden" name="_wp_http_referer" value="/tyche/my-account/" />  -->
										<button type="submit" class="mx-auto woocommerce-button button woocommerce-form-login__submit" name="loginBtn" value="Log in">Log in</button>
									</p>
									<p class="woocommerce-LostPassword lost_password">
										<a href="new-user-register.php">New Customer Registration <i class="fa fa-caret-right"></i></a>
									</p>

								</form>


							</div>
						</article><!-- #post-## -->

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div><!-- #content -->

		<?php include 'footer.php'; ?>
    	<?php include 'scripts.php'; ?>
		
</body>

</html>