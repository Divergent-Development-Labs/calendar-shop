<?php
	session_start();
	if (!isset($_SESSION["userId"])) {
		exit(header('Location: login.php'));
	}
?>	

<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Orders - Tyche Demo</title>
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
							<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="index.php"><span itemprop="title">Shop </span></a></span><span class="tyche-breadcrumb-sep">/</span><span class="breadcrumb-leaf">Orders</span>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="d-md-flex justify-content-start">
							<?php
							$customerId = intval($_SESSION["userId"]);

							$sql1 = "SELECT * FROM `customer` WHERE `id`='$customerId'";
							$customer = $conn->prepare($sql1);

							$customer->execute();

							$result1 = $customer->get_result();

							if ($result1->num_rows > 0) {
								while ($row = $result1->fetch_assoc()) { ?>

					<div class="card p-0 col-md-4">
						<div class="card-header bg-dark">
							<header>
								<h5 class="info-field-title"><?php echo $row['name']; ?></h5>
							</header>
						</div>
						<div class="border card-body p-0">
							<table class="info-field-text mb-1 border-0">
								<tr><td><?php echo $row['address_line']; ?>,</td></tr>
								<tr><td><?php echo $row['area']; ?>,</td></tr>
								<tr><td><?php echo $row['district']; ?>,</td></tr>
								<tr><td><?php echo $row['state']; ?>,</td></tr>
								<tr><td><?php echo $row['pincode']; ?>,</td></tr>
								<tr><td><i class="fa fa-phone mr-2 text-danger"></i><?php echo $row['mobile_number']; ?>,</td></tr>
								<tr><td><i class="fa fa-envelope mr-2 text-danger"></i><?php echo $row['email']; ?></td></tr>
							</table>
						</div>
					</div>
							<?php
								}
							} ?>
				</div> <!-- end row -->
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
										<a class="button wc-backward" href="index.php">
											Return to Shop
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