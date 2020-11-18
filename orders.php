
<!DOCTYPE html>
<html lang="en-US">

<head>
	<?php include 'head.php'; ?>
	<?php 
    // session_start();
    if(($_SESSION["userId"]) == null){
        header('Location: my-account.php');    
    }
?>
</head>

<body class="page-template-default page page-id-5 wp-custom-logo theme-tyche woocommerce-cart woocommerce-page woocommerce-no-js elementor-default elementor-kit-1236">
	<div id="page" class="site">

		<?php include 'top_header_bar.php'; ?>

		<div class="site-content">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="tyche-breadcrumbs">
							<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="https://demo.colorlib.com/tyche"><span itemprop="title">Home </span></a></span><span class="tyche-breadcrumb-sep">/</span><span class="breadcrumb-leaf">Orders</span>
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
											<h3 class="page-title margin-top">Orders</h3>
										</header>
									</div>
								</div>
								<div class="woocommerce">
									<div class="woocommerce-notices-wrapper"></div>
									<form class="woocommerce-cart-form" action="backend/update-cart-backend.php" method="post">

										<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
											<thead>
												<tr>
													<th class="product-thumbnail">S.No</th>
													<th class="product-thumbnail">Order ID</th>
													<th class="product-thumbnail">Sub Total</th>
													<th class="product-thumbnail">GST</th>
													<th class="product-thumbnail">Total</th>
													<th class="product-thumbnail">Payment Status</th>
												</tr>
											</thead>
											<tbody id="orderList">

											</tbody>
											<tfoot id="orderFooter">

											</tfoot>
										</table>
										<input hidden type="text" name="orderData" id="orderData">

									</form>

									<!-- <div class="cart-collaterals">
										<div class="cart_totals ">


											<h2>Order totals</h2>

											<table cellspacing="0" class="shop_table shop_table_responsive">

												<tbody>
													<tr class="cart-subtotal">
														<th>Subtotal</th>
														<td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#x20B9; </span><span id="subtotalCost"></span></bdi></span></td>
													</tr>

													<tr class="tax-rate tax-rate-us-ny-state-tax-1">
														<th>CGST</th>
														<td data-title="State Tax"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#x20B9; </span><span id="cgstCost"></span></span></td>
													</tr>

													<tr class="tax-rate tax-rate-us-ny-state-tax-1">
														<th>SGST</th>
														<td data-title="State Tax"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#x20B9; </span><span id="sgstCost"></span></span></td>
													</tr>

													<tr class="order-total">
														<th>Total</th>
														<td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#x20B9; </span><span  id="totalCost"></span></bdi></span></strong> </td>
													</tr>


												</tbody>
											</table>

											<div class="wc-proceed-to-checkout text-right">
												<form method="post" id="make_order_form" action="backend/insert-order-backend.php">
													<input hidden type="text" name="customer_id" id="customer_id" value="<?php echo $userId; ?>">
													<input hidden type="text" name="orderData" id="orderData">
													<input hidden type="text" name="totalOrderData" id="totalOrderData">

													<button type="submit" name="saveBtn" class="checkout-button button alt wc-forward make_order" <?php echo $userId; ?> >Make Order</button>
												</form>
											</div>


										</div>
									</div> -->

								</div>
							</article><!-- #post-## -->

						</main>
						<main id="main-empty" class="site-main" role="main">
							<article id="post-5" class="post-5 page type-page status-publish hentry">
								<div class="row">
									<div class="col-md-12">
										<header>
											<h3 class="page-title margin-top">Order</h3>
										</header>
									</div>
								</div>
								<div class="woocommerce">
									<div class="woocommerce-notices-wrapper"></div>
									<p class="cart-empty woocommerce-info">
										Your order is currently empty.
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
		<script type="text/javascript" src="custom/js/orders.js"></script>
</body>

</html>