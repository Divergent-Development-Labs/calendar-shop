<!-- Footer -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="widgets-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div id="meta-4" class="widget widget_meta">
                        <h5 class="widget-title"><span>Meta</span></h5>
                        <ul>
                            <li><a rel="nofollow" href="wp-login.php">Log in</a></li>
                            <li><a href="feed/">Entries feed</a></li>
                            <li><a href="comments/feed/">Comments feed</a></li>

                            <li><a href="https://wordpress.org/">WordPress.org</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div id="text-3" class="widget widget_text">
                        <h5 class="widget-title"><span>About</span></h5>
                        <div class="textwidget">
                            <p>Pri quas audiam virtute ut, case utamur fuisset eam ut, iisque accommodare an eam.</p>
                            <p>Reque blandit qui eu, cu vix nonumy volumus. Legendos intellegam id usu, vide oporteat vix eu, id illud principes has. Nam tempor utamur gubergren no.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--.row-->
        </div>
    </div>
</footer><!-- / Footer -->

<!-- Copyright -->
<footer class="site-copyright">
    <div class="site-info ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="menu-social" class="menu pull-left">
                        <ul id="menu-social-items" class="menu-items">
                            <li id="menu-item-88" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-88"><a href="http://facebook.com"><span class="screen-reader-text">Facebook</span></a></li>
                            <li id="menu-item-89" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-89"><a href="http://twitter.com"><span class="screen-reader-text">Twitter</span></a></li>
                            <li id="menu-item-90" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-90"><a href="http://dribbble.com"><span class="screen-reader-text">Dribbble</span></a></li>
                            <li id="menu-item-91" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-91"><a href="http://vimeo.com"><span class="screen-reader-text">Vimeo</span></a></li>
                            <li id="menu-item-92" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-92"><a href="http://youtube.com"><span class="screen-reader-text">YouTube</span></a></li>
                        </ul>
                    </div>
                    <div class="copyright-text pull-right">
                        Copyright &copy; 2020 <span class="sep">|</span> 
                        <a href="https://kvncloud.com/" style="color: #74788d;" >Developed by KVN Cloud</a>                            
                     </div>
                </div>
            </div>
        </div>
    </div>
</footer><!-- / Copyright -->

<!-- sample modal content -->
<div id="cartModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="cartModalLabel">Are you sure to Delete the Record ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Are you sure to Delete the Record</h5>
                <div class="container">
				<div class="row">
					<div id="primary" class="content-area col-md-12">
						<main id="main" class="site-main" role="main">

							<article id="post-5" class="post-5 page type-page status-publish hentry">
								<div class="row">
									<div class="col-md-12">
										<header>
											<h3 class="page-title margin-top">Cart</h3>
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
													<th class="product-thumbnail">Design</th>
													<th class="product-thumbnail">Calendary Type</th>
													<th class="product-thumbnail">Size</th>
													<th class="product-thumbnail">Price</th>
													<th class="product-thumbnail">Quantity</th>
													<th class="product-thumbnail">Total</th>
													<th class="product-remove">&nbsp;</th>
												</tr>
											</thead>
											<tbody id="cartList">

											</tbody>
											<tfoot id="cartFooter">

											</tfoot>
										</table>
										<input hidden type="text" name="cartData" id="cartData">

									</form>

									<div class="cart-collaterals">
										<div class="cart_totals ">


											<h2>Cart totals</h2>

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
									</div>

								</div>
							</article><!-- #post-## -->

						</main>
						<main id="main-empty" class="site-main" role="main">
							<article id="post-5" class="post-5 page type-page status-publish hentry">
								<div class="row">
									<div class="col-md-12">
										<header>
											<h3 class="page-title margin-top">Cart</h3>
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
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div><!-- #page -->