<!DOCTYPE html>
<html lang="en-US">

<head>
	<?php include 'head.php'; ?>
</head>

<body class="page-template-default page page-id-5 wp-custom-logo theme-tyche woocommerce-cart woocommerce-page woocommerce-no-js elementor-default elementor-kit-1236">
	<div id="page" class="site">

		<?php include 'top_header_bar.php'; ?>

		<div class="site-content">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="tyche-breadcrumbs">
							<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="https://demo.colorlib.com/tyche"><span itemprop="title">Home </span></a></span><span class="tyche-breadcrumb-sep">/</span><span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="shop.php"><span itemprop="title">Shop</span></a></span><span class="tyche-breadcrumb-sep">/</span><span class="breadcrumb-leaf">Cart</span>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div id="primary" class="content-area col-md-12">
						<main id="main" class="site-main" role="main">


							<article id="post-5" class="post-5 page type-page status-publish hentry">
								<div class="row">
									<div class="col-md-12">
										<header>
											<h1 class="page-title margin-top">Cart</h1>
										</header>
									</div>
								</div>
								<div class="woocommerce">
									<div class="woocommerce-notices-wrapper"></div>
									<form class="woocommerce-cart-form" action="https://demo.colorlib.com/tyche/cart/" method="post">

										<table>
											<thead>
												<th>Size</th>
											</thead>
											<tbody id="cartList">

											</tbody>
										</table>
										<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
											<thead>
												<tr>
													<th class="product-remove">&nbsp;</th>
													<th class="product-thumbnail">&nbsp;</th>
													<th class="product-name">Product</th>
													<th class="product-price">Price</th>
													<th class="product-quantity">Quantity</th>
													<th class="product-subtotal">Subtotal</th>
												</tr>
											</thead>
											<tbody>

												<tr class="woocommerce-cart-form__cart-item cart_item">

													<td class="product-remove">
														<a href="https://demo.colorlib.com/tyche/cart/?remove_item=44f683a84163b3523afe57c2e008bc8c&amp;_wpnonce=151792d96f" class="remove" aria-label="Remove this item" data-product_id="62" data-product_sku="">×</a> </td>

													<td class="product-thumbnail">
														<a href="https://demo.colorlib.com/tyche/product/amari-shirt/"><img width="255" height="320" src="https://demo.colorlib.com/tyche/wp-content/uploads/sites/64/2017/06/key-692199_1920-255x320.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy"></a> </td>

													<td class="product-name" data-title="Product">
														<a href="https://demo.colorlib.com/tyche/product/amari-shirt/">Amari Shirt</a> </td>

													<td class="product-price" data-title="Price">
														<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>25.00</bdi></span> </td>

													<td class="product-quantity" data-title="Quantity">
														<div class="quantity">
															<label class="screen-reader-text" for="quantity_5fa6b7bd6dbea">Amari Shirt quantity</label>
															<div class="styled-number"><a href="#" class="arrow-down incrementor" data-increment="down"><span class="dashicons dashicons-minus"></span></a><input type="number" id="quantity_5fa6b7bd6dbea" class="input-text qty text" step="1" min="0" max="" name="cart[44f683a84163b3523afe57c2e008bc8c][qty]" value="1" title="Qty" size="4" placeholder="" inputmode="numeric"><a href="#" class="arrow-up incrementor" data-increment="up"><span class="dashicons dashicons-plus"></span></a></div>
														</div>
													</td>

													<td class="product-subtotal" data-title="Subtotal">
														<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>25.00</bdi></span> </td>
												</tr>


												<tr>
													<td colspan="6" class="actions">

														<div class="coupon">
															<label for="coupon_code">Coupon:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code"> <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
														</div>

														<button type="submit" class="button" name="update_cart" value="Update cart" disabled="" aria-disabled="true">Update cart</button>


														<input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="151792d96f"><input type="hidden" name="_wp_http_referer" value="/tyche/cart/">
													</td>
												</tr>

											</tbody>
										</table>
									</form>


									<div class="cart-collaterals">
										<div class="cart_totals ">


											<h2>Cart totals</h2>

											<table cellspacing="0" class="shop_table shop_table_responsive">

												<tbody>
													<tr class="cart-subtotal">
														<th>Subtotal</th>
														<td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>25.00</bdi></span></td>
													</tr>




													<tr class="tax-rate tax-rate-us-ny-state-tax-1">
														<th>State Tax</th>
														<td data-title="State Tax"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>1.00</span></td>
													</tr>


													<tr class="order-total">
														<th>Total</th>
														<td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>26.00</bdi></span></strong> </td>
													</tr>


												</tbody>
											</table>

											<div class="wc-proceed-to-checkout">

												<a href="https://demo.colorlib.com/tyche/checkout/" class="checkout-button button alt wc-forward">
													Proceed to checkout</a>
											</div>


										</div>
									</div>

								</div>
							</article><!-- #post-## -->

						</main>
						<main id="main" class="site-main" role="main">
							<article id="post-5" class="post-5 page type-page status-publish hentry">
								<div class="row">
									<div class="col-md-12">
										<header>
											<h1 class="page-title margin-top">Cart</h1>
										</header>
									</div>
								</div>
								<div class="woocommerce">
									<div class="woocommerce-notices-wrapper"></div>
									<p class="cart-empty woocommerce-info">
										Your cart is currently empty.
									</p>
									<p class="return-to-shop">
										<a class="button wc-backward" href="shop.php">
											Return to shop
										</a>
									</p>
								</div>
							</article>
							<!-- #post-## -->
						</main>
						<!-- #main -->
					</div>
					<!-- #primary -->
				</div>
			</div>
		</div>
		<!-- #content -->

		<?php include 'footer.php'; ?>
		<?php include 'scripts.php'; ?>
		<script type="text/javascript" src="custom/js/cart.js"></script>
</body>

</html>