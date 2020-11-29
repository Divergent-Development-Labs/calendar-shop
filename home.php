<!DOCTYPE html>
<html lang="en-US">

<head>
  <?php session_start(); ?>
  <title>Home - Tyche Demo</title>
  <?php include 'head.php'; ?>
</head>

<body class="home page-template-default page page-id-2 wp-custom-logo theme-tyche woocommerce-no-js elementor-default elementor-kit-1236">
  <div id="page" class="site">

    <?php include 'top_header_bar.php'; ?>

    <!-- Main Slider -->
    <section class="main-slider">
      <div class="containerz" height="100px">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img  src="custom/images/banner.jpg" alt="Los Angeles" style="width:100%; height: 460.172px !important;">
            </div>

            <div class="item">
              <img src="custom/images/banner-2.jpg" alt="Chicago" style="width:100%; height: 460.172px !important;">
            </div>

            <div class="item">
              <img src="custom/images/banner-3.jpg" alt="New york" style="width:100%; height: 460.172px !important;">
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="owl-carousel owl-theme" id="main-slider">
        <div class="item">
          <img src="custom/images/banner.jpg">
          <!-- <img src="/custom/images/banner.jpg" class="attachment-tyche-slider-image size-tyche-slider-image" alt="" loading="lazy" sizes="(max-width: 1600px) 100vw, 1600px" /> -->
          <div class="hero-caption left hidden-xs hidden-sm">
            <span class="year">2021</span>
            <span class="caption">Autumn Collection</span>
            <div class="btn-group">
              <a href="https://colorlib.com">Shop Now</a>
              <a href="https://colorlib.com">Learn More</a>
            </div>
          </div>
        </div>
      </div>
      <div class="main-slider-bar hidden-xs">
        <div class="container">
          <ul class="main-slider-info">
            <li class="col-sm-4 col-xs-12">
              <div class="main-slider-info-cell">
                <div class="cell-icon">
                  <i class="dashicons dashicons-admin-site"></i>
                </div>
                <div class="cell-content">
                  <span class="cell-caption"> FREE SHIPPING </span>
                  <span class="cell-subcaption">
                    On all orders over 90$
                  </span>
                </div>
              </div>
            </li>
            <li class="col-sm-4 col-xs-12">
              <div class="main-slider-info-cell">
                <div class="cell-icon">
                  <i class="dashicons dashicons-smartphone"></i>
                </div>
                <div class="cell-content">
                  <span class="cell-caption"> CALL US ANYTIME </span>
                  <span class="cell-subcaption"> +000000000 </span>
                </div>
              </div>
            </li>
            <li class="col-sm-4 col-xs-12">
              <div class="main-slider-info-cell">
                <div class="cell-icon">
                  <i class="dashicons dashicons-location-alt"></i>
                </div>
                <div class="cell-content">
                  <span class="cell-caption"> OUR LOCATION </span>
                  <span class="cell-subcaption">
                    000000 fdjsljl jrl. SDTR
                  </span>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <!-- / Main Slider -->

    <div class="site-content">
      <!-- Content Area #1 -->
      <section class="content-area-1">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <h4 class="mb-2">Leading Daily Calendar and Monthly Calendar Manufacturers in Madurai.</h4>
              <p>
              We ABC Calendars is an most reputed printing company in Madurai. ABC Calendars founded in the year 2010 by XYZ as small printing company in sivakasi. Now ABC Calendars is grown as a big tree with the help of its Customers due to its quality service.

              We always provide quality printing service to our reputed Customers at an affordable price. Also we provide dedicated customer support to get their Printing needs fulfilled. Now we are making our step towards global printing service through Website.
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- / Content Area #1 -->
    </div>
    <!-- #content -->

    <?php include 'footer.php'; ?>
    <?php include 'scripts.php'; ?>

</body>

</html>