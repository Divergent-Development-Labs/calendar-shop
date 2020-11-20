
<!DOCTYPE html>
<html lang="en-US">

<head>
	<?php session_start(); ?>
    <?php include 'head.php'; ?>
	<style>
	</style>
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

		<div class="site-content bg-white">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav class="woocommerce-breadcrumb"><a href="index.php">Home</a>&nbsp;&#47;&nbsp;Shop</nav>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-12">
						<h4 class="font-weight-bold text-dark"><span>Calendar Type</span></h4>
						<div class="woocommerce-ordering float-none" style="width: 100% !important;">
							<div class="styled-select">
								<select name="orderby" onchange="selectCalendarType(event)" id="calendar_type_menu" style="min-width: 185px !important;width: 100% !important;" class="w-100 orderby text-dark" aria-label="Calendar Type">
									<!-- <option value="" selected="selected">Select Type</option> -->
									<option value="Monthly - 6 Sheet"  selected="selected">Monthly - 6 Sheet</option>
									<option value="Monthly - 12 Sheet">Monthly - 12 Sheet</option>
									<option value="Daily">Daily</option>
									<option value="Table">Table</option>
								</select>
							</div>
						</div>
					
						<div id="woocommerce_products-3" class="widget woocommerce widget_products mt-sm-3">						
							<h4 class="font-weight-bold text-dark"><span>Sizes</span></h4>
							<select multiple  id="size_menu" class="border dropdown-menu-left w-100 overflow-auto" style="min-height: 200px !important; height: 100%; font-size: initial;">
								<?php 
									if ($sizeArray->num_rows > 0) {           
										$c = 0;                     
										while($size = $sizeArray->fetch_assoc()) { 
											if($c == 0){ ?>
												<option type="button" selected="selected" class="text-lg  list-group-item text-danger border-0" onclick="selectSize(event, <?php echo $size['rate'];?>)" value='<?php echo $size['id'];?>'><?php echo $size['size_label'];?></option>
											<?php
											}
											else{ ?>
												<option type="button"  class="text-lg  list-group-item text-danger border-0" onclick="selectSize(event, <?php echo $size['rate'];?>)" value='<?php echo $size['id'];?>'><?php echo $size['size_label'];?></option>
											<?php											
											}
											$c++;
										}
									} 
								?> 
							</select>							
						</div>
					</div>
					
					<div class="col-md-9 tyche-has-sidebar">
						<div class="row">
							<ul class="nav nav-tabs col-sm-5" >
								<li class=""><a href="#designs" data="default" data-toggle="tab" aria-expanded="false" class="nav-link active font-weight-bold design-tab">Designs</a></li>
								<li class="" <?php echo ($userId != null) ? $userId : 'hidden'; ?>><a href="#customDesigns" data="custom" data-toggle="tab" aria-expanded="false" class="nav-link font-weight-bold design-tab">Custom</a></li>
							</ul>
							<p class="woocommerce-result-count col-sm-4">Showing <span id="custom-counts" class="d-none"></span><span id="design-counts"></span> of <span id="total-counts"></span> results</p>
							<input type="text" placeholder="Search By Design" name="designSearchText" id="designSearchText" class="woocommerce-ordering col-sm-3 designSearchText form-control" />								
						</div>


						<div class="tab-content">
	                        <div class="tab-pane active " id="designs">                        
								<ul class="columns-3 products pt-4" id="designsList">
								</ul>
							</div>
							
	                        <div class="tab-pane fade" id="customDesigns">         
							        
								<form action="upload.php" method="post" enctype="multipart/form-data">
									<!-- <h6 for="fileToUpload">Custom Image Upload:</h6> -->
									<div class="row border p-2">
											<input type="file" class="col-sm-8 my-auto btn" size="60" style="width: 200px !important;" name="fileToUpload" id="fileToUpload">
											<input type="text" hidden name="userId" id="userId" value="<?php echo $userId; ?>" />
											<input type="submit"  class="col-sm-4" value="Upload Image" name="submit">
									</div>	
								</form>
								<ul class="columns-3 products pt-4" id="customDesignsList">
								</ul>
							</div>
						</div>
						<!-- <div class="row text-center">
							<ul class="tyche-pager">
								<li class="active"><a href="shop.php">1</a></li>
								<li><a href="shop-page-2.php">2</a></li>
								<li><a href="shop-page-2.php"><span class="pager-text right">NEXT</span> <span class="fa fa-long-arrow-right"></span></a></li>
							</ul>
						</div> -->

					</div>
				</div>
			</div>
		</div>
		<!-- #content -->

	<?php include 'footer.php'; ?>
	<?php include 'scripts.php'; ?>
	<script src="custom/js/shop.js"></script>
	
</body>

</html>