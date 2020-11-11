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
                            <div class="woocommerce-billing-fields">

                                <h3>User details</h3>

                                <div class="woocommerce-billing-fields__field-wrapper">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>Name</label>
                                            <input type="text" class="w-100" />
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <p class="col-md-6 col-12 form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
                                            <label for="billing_phone" class="">Phone&nbsp;
                                                <abbr class="required text-danger" title="required">*</abbr>
                                            </label>
                                            <span class="woocommerce-input-wrapper">
                                                <input type="tel" class="w-100 input-text " name="billing_phone" id="billing_phone" placeholder="" value="" autocomplete="tel">
                                            </span>
                                        </p>
                                        
                                        <p class="col-md-6 col-12 form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
                                            <label for="billing_email" class="">Email address&nbsp;<abbr class="required text-danger" title="required">*</abbr></label>
                                            <span class="woocommerce-input-wrapper">
                                                <input type="email" class="w-100 input-text " name="billing_email" id="billing_email" placeholder="" value="" autocomplete="email username">
                                            </span>
                                        </p>
                                    
                                    </div>

                                    <div class="row">
                                        <p class="col-md-6 col-12 form-row-first validate-required" id="billing_first_name_field" data-priority="10">
                                            <label for="billing_first_name col-12" class="">First name&nbsp;
                                                <abbr class="required text-danger" title="required">*</abbr>
                                            </label>
                                            <span class="woocommerce-input-wrapper">
                                                <input type="text" class="input-text w-100" name="billing_first_name" id="billing_first_name" placeholder="" value="" autocomplete="given-name">
                                            </span>
                                        </p>


                                        <p class="col-md-6 col-12 form-row-last validate-required" id="billing_last_name_field" data-priority="20">
                                            <label for="billing_last_name" class="">Last name&nbsp;
                                                <abbr class="required text-danger" title="required">*</abbr>
                                            </label>
                                            <span class="woocommerce-input-wrapper">
                                                <input type="text" class="input-text  w-100" name="billing_last_name" id="billing_last_name" placeholder="" value="" autocomplete="family-name">
                                            </span>
                                        </p>

                                    </div>

                                    <p class="form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40"><label for="billing_country" class="">Country / Region&nbsp;<abbr class="required text-danger" title="required">*</abbr></label><span class="woocommerce-input-wrapper">
                                            <p class="address-field validate-required form-row-wide" id="billing_address_1_field" data-priority="50"><label for="billing_address_1" class="">Street address&nbsp;<abbr class="required text-danger" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="House number and street name" value="" autocomplete="address-line1" data-placeholder="House number and street name"></span></p>
                                            <p class="address-field form-row-wide" id="billing_address_2_field" data-priority="60"><label for="billing_address_2" class="screen-reader-text">Apartment, suite, unit, etc. (optional)&nbsp;<span class="optional">(optional)</span></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_address_2" id="billing_address_2" placeholder="Apartment, suite, unit, etc. (optional)" value="" autocomplete="address-line2" data-placeholder="Apartment, suite, unit, etc. (optional)"></span></p>
                                            <p class="address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row-wide address-field validate-required"><label for="billing_city" class="">Town / City&nbsp;<abbr class="required text-danger" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_city" id="billing_city" placeholder="" value="" autocomplete="address-level2"></span></p>
                                            <p class="address-field validate-required validate-state form-row-wide" id="billing_state_field" data-priority="80" data-o_class="form-row-wide address-field validate-required validate-state"><label for="billing_state" class="">State&nbsp;<abbr class="required text-danger" title="required">*</abbr></label><span class="woocommerce-input-wrapper">
                                                    <p class="address-field validate-required validate-postcode form-row-wide" id="billing_postcode_field" data-priority="90" data-o_class="form-row-wide address-field validate-required validate-postcode"><label for="billing_postcode" class="">ZIP&nbsp;<abbr class="required text-danger" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_postcode" id="billing_postcode" placeholder="" value="" autocomplete="postal-code"></span></p>
                                                    
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