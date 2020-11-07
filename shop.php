
<!DOCTYPE html>
<html lang="en-US">

<head>
    <?php include 'head.php'; ?>
</head>

<?php 
      $sql2 = "SELECT * FROM `size`";
      $sql3 = "SELECT * FROM `design`";
      $sizeArray = $conn->query($sql2);
      $designArray = $conn->query($sql3);
?>

<body class="archive post-type-archive post-type-archive-product wp-custom-logo theme-tyche woocommerce woocommerce-page woocommerce-no-js hfeed elementor-default elementor-kit-1236">
	<div id="page" class="site">

		<?php include 'top_header_bar.php'; ?>

		<div class="site-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav class="woocommerce-breadcrumb"><a href="index.php">Home</a>&nbsp;&#47;&nbsp;Shop</nav>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2 hidden-xs border-right border-dark">

						<div class="styled-select woocommerce-ordering">
							<select name="orderby" class="orderby text-dark" aria-label="Shop order">
								<option value="menu_order" selected="selected">Default sorting</option>
								<option value="popularity">Sort by popularity</option>
								<option value="rating">Sort by average rating</option>
								<option value="date">Sort by latest</option>
								<option value="price">Sort by price: low to high</option>
								<option value="price-desc">Sort by price: high to low</option>
							</select>
						</div>

						<div id="woocommerce_products-3" class="widget woocommerce widget_products">
							<h5 class=" page-title text-dark"><span>Sizes</span></h5>
							<ul class="product_list_widget list-group">
								<?php 
									if ($sizeArray->num_rows > 0) {                                
										while($size = $sizeArray->fetch_assoc()) { ?>
											<li class="">
												<span type="button" onclick="selectSize(event)" name="<?php echo $size['id'];?>" class="woocommerce-Price-amount amount"><?php echo $size['size_label'];?></span>
											</li>
										<?php }
									} 
								?> 
							</ul>
						</div>
					</div>
					<div class="col-sm-10 tyche-has-sidebar">

						<h1 class="woocommerce-products-header__title page-title text-dark">Designs</h1>

						<div class="woocommerce-notices-wrapper"></div>
					
						<input type="text" placeholder="Search" name="designSearchText" id="designSearchText" class="woocommerce-ordering col-4 designSearchText form-control" />
						
						<!-- <p class="woocommerce-result-count">
							Showing 1&ndash;12 of 22 results</p> -->

						<ul class="products columns-5" id="designsList">
						</ul>

						<div class="row text-center">
							<ul class="tyche-pager">
								<li class="active"><a href="shop.php">1</a></li>
								<li><a href="shop-page-2.php">2</a></li>
								<li><a href="shop-page-2.php"><span class="pager-text right">NEXT</span> <span class="fa fa-long-arrow-right"></span></a></li>
							</ul>
						</div>

					</div>
					</main>
				</div>
			</div>
		</div>
	</div><!-- #content -->

	<?php include 'footer.php'; ?>
	<?php include 'scripts.php'; ?>
	<script src="custom/js/shop.js"></script>
</body>

</html>