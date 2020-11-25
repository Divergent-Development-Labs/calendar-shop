      <!-- Top Header Bar -->
      <header class="top-header-bar-container">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <ul class="top-header-bar">
                          <!-- Email -->
                          <li class="top-email">
                              <i class="fa fa-envelope-o"></i> dummy@gmail.com
                          </li>
                          <!-- / Email -->
                          <!-- Cart -->
                          <li class="top-cart" <?php echo ($userId != null) ? $userId : 'hidden'; ?>>
                              <!-- <button type="button" data-toggle="modal" data-target="#cartModal" >Cart</button> -->
                              <a href="cart.php"><i class="fa fa-shopping-cart"></i> My Cart - &#x20B9;
                                <span class="price" id="cart_price">
                                    <?php 
                                        $sql = "SELECT SUM(cost) as totalcost FROM `carts` WHERE `carts`.`customer`='$userId'";
                                        $result = $conn->query($sql);
                                        $cart_price = $result->fetch_assoc()['totalcost'];
                                        echo number_format($cart_price, 2);
                                    ?>
                                </span>
                              </a>
                          </li>
                          <!-- / Cart -->


                          <?php if($userId && $userId != null){ ?>
                          <!-- Account -->
                          <li class="top-account">
                              <a href="orders.php" id="accountLink" data="<?php echo $userId;?>"><i class="fa fa-user"></i> <?php echo $userName; ?>
                              </a>
                          </li>
                          
                          <!-- / Account -->
                          <?php } else { ?>
                          <!-- New user -->
                          <li class="top-cart">
                              <a href="new-user-register.php"><i class="fa fa-file-text"></i> New User</a>
                          </li>
                          <!-- / New user -->

                          <!-- Account -->
                          <li class="top-account">
                              <a href="my-account.php"><i class="fa fa-sign-in"></i> Login
                              </a>
                          </li>
                          <!-- / Account -->
                          <?php } ?>

                          <?php if($userId && $userId != null){ ?>
                          <!-- Logout -->
                            <li class="top-account">
                              <a href="logout.php"><i class="fa fa-sign-out"></i> Logout
                              </a>
                            </li>
                            <!-- / Logout -->
                          <?php } ?>

                          <!-- Top Search -->
                          <!-- <li class="top-search"> -->
                              <!-- Search Form -->
                              <!-- <form role="search" method="get" class="pull-right" id="searchform_topbar" action="">
                                  <label>
                                      <span class="screen-reader-text"></span>
                                      <input class="search-field-top-bar" id="search-field-top-bar" placeholder="Search ..." value="" name="s" type="search" />
                                  </label>
                                  <button id="search-top-bar-submit" type="submit" class="search-top-bar-submit">
                                      <span class="fa fa-search"></span>
                                  </button>
                              </form> -->
                          <!-- </li> -->
                          <!-- / Top Search -->
                      </ul>
                  </div>
              </div>
          </div>
      </header>
      <!-- /Top Header Bar -->
      <header id="masthead" class="site-header" role="banner">
          <div class="site-branding container">
              <div class="row">
                  <div class="col-sm-4 header-logo">
                      <a href="" class="custom-logo-link" rel="home" aria-current="page"><img width="150" height="70" src="wp-contents/uploads/sites/64/2017/06/logo.png" class="custom-logo" alt="Tyche Demo" /></a>
                  </div>
              </div>
          </div>
          <!-- .site-branding -->
        
          <nav id="site-navigation" class="main-navigation" role="navigation">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                            
                          <ul id="desktop-menu" class="sf-menu">
                              <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-83" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-86">
                                  <a title="Home" href="index.php">Home</a>
                              </li>
                              <?php if($userId && $userId != null){ ?>
                              <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-86" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-86">
                                  <a title="Orders" href="orders.php">Orders</a>
                              </li>
                              <?php } ?>
                              
                              <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-85" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-85">
                                  <a title="Contact" href="contact.php">Contact</a>
                              </li>
                          </ul>
                          <!-- /// Mobile Menu Trigger //////// -->
                          <button href="#" id="mobile-menu-trigger">
                              <i class="fa fa-bars"></i>
                          </button>
                          <!-- end #mobile-menu-trigger -->
                      </div>
                  </div>
              </div>
          </nav>
          <!-- #site-navigation -->
      </header>
      <!-- #masthead -->