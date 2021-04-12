<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>New User Register - Tyche Demo</title>
    <?php include 'head.php'; ?>
</head>

<body class="page-template-default page page-id-5 wp-custom-logo theme-tyche woocommerce-cart woocommerce-page woocommerce-no-js elementor-default elementor-kit-1236">
    <div id="page" class="site">

        <?php include 'top_header_bar.php'; ?>

        <div class="site-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="tyche-breadcrumbs">
                            <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a itemprop="url" href="home.php"><span itemprop="title">Home </span></a></span><span class="tyche-breadcrumb-sep">/</span><span class="breadcrumb-leaf">Cart</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div id="primary" class="border card col-md-8 content-area mx-auto">
                        <main id="main" class="site-main" role="main">
                            <div class="woocommerce-billing-fields">

                                <h3 class="mt-4">User Details</h3>

                                <div class="woocommerce-billing-fields__field-wrapper">
                                    <form action="backend/insert-new-user.php" method="post">
                                        <div class="row">
                                            <div class="mt-4 col-12">
                                                <label>Name&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                                                <input type="text" class="w-100" placeholder="Enter Your name" name="user_name" id="user_id" required />
                                            </div>

                                            <div class="mt-4 col-12 form-row-wide validate-required validate-phone" id="user_phone_field" data-priority="100">
                                                <label for="user_phone" class="">Phone&nbsp;<abbr class="required text-danger" title="required">*</abbr>
                                                </label>
                                                <span class="woocommerce-input-wrapper">
                                                    <input type="tel" class="w-100 input-text " name="user_phone" id="user_phone" placeholder="Enter Your Mobile number" value="" autocomplete="tel" required />
                                                </span>
                                            </div>

                                            <div class="mt-4 col-12 form-row-wide validate-required validate-email" id="user_email_field" data-priority="110">
                                                <label for="user_email" class="">Email address</label>
                                                <span class="woocommerce-input-wrapper">
                                                    <input type="email" class="w-100 input-text " name="user_email" id="user_email" placeholder="Enter Your Email address" value="" autocomplete="email username">
                                                </span>
                                            </div>

                                        </div>

                                        <div class="mt-4">
                                            <label for="user_address_1" class="">Street address</label>
                                            <div class="row ">
                                                <div class="col-12 form-row-first validate-required" id="user_first_name_field" data-priority="10">
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text w-100" name="user_address_1" id="user_address_1" placeholder="House number and street name" value="" autocomplete="address-line1" data-placeholder="House number and street name">
                                                    </span>
                                                </div>

                                                <div class="mt-2 col-12 address-field form-row-wide" id="user_address_2_field" data-priority="60">
                                                    <span class="woocommerce-input-wrapper">
                                                        <input type="text" class="input-text w-100" name="user_address_2" id="user_address_2" placeholder="Apartment, suite, unit, etc. (optional)" value="" autocomplete="address-line2" data-placeholder="Apartment, suite, unit, etc. (optional)">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12 address-field validate-required form-row-wide" id="user_city_field" data-priority="70">
                                                <label for="user_city" class="">Town / City</label>
                                                <span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text w-100" name="user_city" id="user_city" placeholder="Enter Town / City" value="" autocomplete="address-level2">
                                                </span>
                                            </div>

                                            <div class="mt-4 col-12 address-field validate-required validate-state form-row-wide" id="user_state_field" data-priority="80" data-o_class="form-row-wide address-field validate-required validate-state">
                                                <label for="user_state" class="">State</label>
                                                <span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text w-100" name="user_state" id="user_state" placeholder="Enter State" value="" autocomplete="state">
                                                </span>
                                            </div>

                                            <div class="mt-4 col-12 address-field validate-required validate-postcode form-row-wide" id="user_postcode_field" data-priority="90" data-o_class="form-row-wide address-field validate-required validate-postcode">
                                                <label for="user_postcode" class="">ZIP</label>
                                                <span class="woocommerce-input-wrapper">
                                                    <input type="text" class="input-text w-100" name="user_postcode" id="user_postcode" placeholder="Enter Postal Code" value="" autocomplete="postal-code">
                                                </span>
                                            </div>
                                        </div>

                                        <div class="my-4 text-center">
                                            <button type="submit" class="button alt" id="new_user" name="register_btn" data-value="Place order">Register</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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