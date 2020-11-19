<!DOCTYPE html>
<html lang="en-US">

<head>
    <?php include 'head.php'; ?>
</head>

<body class="page-template-default page page-id-7 wp-custom-logo theme-tyche woocommerce-account woocommerce-page woocommerce-lost-password woocommerce-no-js elementor-default elementor-kit-1236">
	<div id="page" class="site">

		<?php include 'top_header_bar.php'; ?>

		<div class="site-content">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="tyche-breadcrumbs"><span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="index.php"><span itemprop="title">Home </span></a></span><span class="tyche-breadcrumb-sep">/</span><span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="shop.php"><span itemprop="title">Shop</span></a></span><span class="tyche-breadcrumb-sep">/</span><span class="breadcrumb-leaf">My account</span></div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div id="primary" class="content-area col-md-12">
						<main id="main" class="site-main" role="main">


							<article id="post-7" class="post-7 page type-page status-publish hentry">
								<div class="row">
									<div class="col-md-12">
										<header>
											<h3 class="page-title margin-top">Lost password</h3>
										</header>
									</div>
								</div>
								<div class="woocommerce">
									<div class="woocommerce-notices-wrapper"></div>
									<form method="post" class="woocommerce-ResetPassword lost_reset_password">

										<p>Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.</p>
										<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
											<label for="user_login">Username or email</label>
											<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
										</p>

										<div class="clear"></div>


										<p class="woocommerce-form-row form-row">
											<input type="hidden" name="wc_reset_password" value="true" />
											<button type="submit" class="woocommerce-Button button" value="Reset password">Reset password</button>
										</p>

										<input type="hidden" id="woocommerce-lost-password-nonce" name="woocommerce-lost-password-nonce" value="cd39dd5ec1" /><input type="hidden" name="_wp_http_referer" value="/tyche/my-account/lost-password/" />
									</form>
								</div>
							</article><!-- #post-## -->

						</main><!-- #main -->
					</div><!-- #primary -->

				</div>
			</div>
		</div><!-- #content -->


		<?php include 'footer.php'; ?>
		<?php include 'scripts.php'; ?>
	
</body>

</html>