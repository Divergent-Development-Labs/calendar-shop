      <!-- Top Header Bar -->
      <header class="top-header-bar-container">
          <div class="container-fluid px-3">
                <ul class="top-header-bar">
                    <!-- Email -->
                    <li class="top-email ">
                        <a href="mailto:dummy@gmail.com" class="ybtn text-white top-header-bar__mail-btn">
                            <i class="fa fa-envelope-o"></i> padmaavathyartcrafts@gmail.com
                        </a>
                    </li>
                    <!-- / Email -->
                    <!-- Cart -->
                    <li class="top-cartz <?php echo ($userId != null || $userId != '') ? $userId : 'd-none'; ?>" >
                        <!-- <button type="button" data-toggle="modal" data-target="#cartModal" >Cart</button> -->
                        <a href="cart.php" class=" top-header-bar__white-border-btn">
                            <i class="fa fa-shopping-cart"></i> 
                            My Cart - &#x20B9;
                            <!-- <span class="price" id="cart_price"> -->
                                <?php 
                                    $sql = "SELECT SUM(cost) as totalcost FROM `carts` WHERE `carts`.`customer`='$userId'";
                                    $result = $conn->query($sql);
                                    $cart_price = $result->fetch_assoc()['totalcost'];
                                    echo number_format($cart_price, 2);
                                ?>
                            <!-- </span> -->
                        </a>
                    </li>
                    <!-- / Cart -->


                    <?php if($userId && $userId != null){ ?>
                    <!-- Account -->
                    <li class="top-accountz">
                        <a href="orders.php" class=" top-header-bar__white-border-btn" id="accountLink" data="<?php echo $userId;?>"><i class="fa fa-user"></i> <?php echo $userName; ?>
                        </a>
                    </li>
                    
                    <!-- / Account -->
                    <?php } else { ?>
                    <!-- New user -->
                    <li class="top-new-user ">
                        <a href="new-user-register.php"  class=" top-header-bar__white-border-btn"><i class="fa fa-file-text"></i> New User</a>
                    </li>
                    <!-- / New user -->

                    <!-- Account -->
                    <li class="top-account">
                        <a href="login.php" class=" top-header-bar__white-border-btn"><i class="fa fa-sign-in"></i> Login
                        </a>
                    </li>
                    <!-- / Account -->
                    <?php } ?>

                    <?php if($userId && $userId != null){ ?>
                    <!-- Logout -->
                    <li class="top-account">
                        <a href="logout.php" class="top-header-bar__white-border-btn"><i class="fa fa-sign-out"></i> Logout
                        </a>
                    </li>
                    <!-- / Logout -->
                    <?php } ?>

                </ul>
          </div>
      </header>
      <!-- /Top Header Bar -->
      <header id="masthead" class="site-header" role="banner">
          <div class="site-branding container-fluid">
              <div class="d-flex justify-content-start">
                  <div class="header-logo">
                      <a href="home.php" class="custom-logo-link" rel="home" aria-current="page"><img width="150" height="70" src="wp-contents/uploads/sites/64/2017/06/logo.png" class="custom-logo" alt="Tyche Demo" /></a>
                  </div>       
                  <div class="flex-fill text-right">  
                        <button href="#" id="mobile-menu-trigger" class="" onclick="slideMenu()">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
              </div>
              <nav class="navbar">
                <div class="text-right align-self-center">
                        <ul id="desktop-menu" class=" border-top sf-menu d-lg-block text-center">
                            <li itemscope="itemscope" id="menu-item-83" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-86">
                                <a title="Home" href="home.php">Home</a>
                            </li>
                            <li itemscope="itemscope" id="menu-item-83" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-86">
                                <a title="Home" href="index.php">Shop</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-togglez" href="javascript:void(0)" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Our Services
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="our-services.php#PVC-Manufacturing">PVC Manufacturing</a></li>
                                    <li><a class="dropdown-item" href="our-services.php#WEB-Printing">WEB Printing</a></li>
                                    <li><a class="dropdown-item" href="our-services.php#Offset-Printing">Offset Printing</a></li>
                                    <li><a class="dropdown-item" href="our-services.php#Calendar">Calendar</a></li>
                                    <li><a class="dropdown-item" href="our-services.php#NoteBooks">NoteBooks</a></li>
                                </ul>
                            </li>         
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-togglez" href="javascript:void(0)" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Our Products
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="our-products.php#PVC-Laminatation-Flim">PVC Laminatation Flim</a></li>
                                    <li><a class="dropdown-item" href="our-products.php#Monthly-Calendar">Monthly Calendar</a></li>
                                    <li><a class="dropdown-item" href="our-products.php#Daily-Calendar-Slip">Daily Calendar Slip</a></li>
                                    <li><a class="dropdown-item" href="our-products.php#Daily-Calendar">Daily Calendar</a></li>
                                    <li><a class="dropdown-item" href="our-products.php#Die-Cut-Calendar">Die-Cut Calendar</a></li>
                                    <li><a class="dropdown-item" href="our-products.php#Table-Calendar">Table Calendar</a></li>
                                    <li><a class="dropdown-item" href="our-products.php#Note-Books">Note Books</a></li>
                                </ul>
                            </li>   

                            <?php if($userId && $userId != null){ ?>
                            <li itemscope="itemscope" id="menu-item-86" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-86">
                                <a title="Orders" href="orders.php">Orders</a>
                            </li>
                            <?php } ?>
                            <li itemscope="itemscope" id="menu-item-83" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-86">
                                <a title="Home" href="about.php">About Us</a>
                            </li>                              
                            <li itemscope="itemscope" id="menu-item-85" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-85">
                                <a title="Contact" href="contact.php">Contact</a>
                            </li>
                        </ul>                  
                    </div>
                </nav>              
          </div>
          <!-- .site-branding -->
        
          
          <!-- #site-navigation -->
      </header>
      <!-- #masthead -->