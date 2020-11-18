
<?php 
    session_start();
    include 'backend/get-customer-details.php'; 
?>
<meta charset="UTF-8" />
<!-- <meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="xmlrpc.php" /> -->

<!-- This site is optimized with the Yoast SEO Premium plugin v15.1.2 - https://yoast.com/wordpress/pluginss/seo/ -->
<title>Home - Tyche Demo</title>
<!-- <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" /> -->

<!-- <link rel="canonical" href="" /> -->

<!-- <meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Home - Tyche Demo" />
<meta property="og:url" content="" />
<meta property="og:site_name" content="Tyche Demo" />
<meta property="article:author" content="http://facebook.com/silkalns" />
<meta property="article:modified_time" content="2020-10-22T08:33:44+00:00" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:creator" content="@https://twitter.com/ASilkalns" /> -->

<!-- <script type="application/ld+json" class="yoast-schema-graph">
    {
        "@context": "https://schema.org",
        "@graph": [{
                "@type": "WebSite",
                "@id": "#website",
                "url": "",
                "name": "Tyche Demo",
                "description": "Just another colorlib.com site",
                "potentialAction": [{
                    "@type": "SearchAction",
                    "target": "?s={search_term_string}",
                    "query-input": "required name=search_term_string"
                }],
                "inLanguage": "en-US"
            },
            {
                "@type": "WebPage",
                "@id": "#webpage",
                "url": "",
                "name": "Home - Tyche Demo",
                "isPartOf": {
                    "@id": "#website"
                },
                "datePublished": "2017-05-24T06:16:36+00:00",
                "dateModified": "2020-10-22T08:33:44+00:00",
                "inLanguage": "en-US",
                "potentialAction": [{
                    "@type": "ReadAction",
                    "target": [""]
                }]
            }
        ]
    }
</script> -->
<!-- / Yoast SEO Premium plugin. -->
<script>
    if (document.location.protocol != "https:") {
        document.location = document.URL.replace(/^http:/i, "https:");
    }
</script>

<!-- <link rel="dns-prefetch" href="//fonts.googleapis.com" /> -->
<link rel="dns-prefetch" href="//s.w.org" />

<!-- <script type="text/javascript">
    window._wpemojiSettings = {
        baseUrl: "https:\/\/s.w.org\/images\/core\/emoji\/13.0.0\/72x72\/",
        ext: ".png",
        svgUrl: "https:\/\/s.w.org\/images\/core\/emoji\/13.0.0\/svg\/",
        svgExt: ".svg",
        source: {
            concatemoji: "https:\/\/demo.colorlib.com\/tyche\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.5.3",
        },
    };
    !(function(e, a, t) {
        var r,
            n,
            o,
            i,
            p = a.createElement("canvas"),
            s = p.getContext && p.getContext("2d");

        function c(e, t) {
            var a = String.fromCharCode;
            s.clearRect(0, 0, p.width, p.height),
                s.fillText(a.apply(this, e), 0, 0);
            var r = p.toDataURL();
            return (
                s.clearRect(0, 0, p.width, p.height),
                s.fillText(a.apply(this, t), 0, 0),
                r === p.toDataURL()
            );
        }

        function l(e) {
            if (!s || !s.fillText) return !1;
            switch (((s.textBaseline = "top"), (s.font = "600 32px Arial"), e)) {
                case "flag":
                    return (
                        !c(
                            [127987, 65039, 8205, 9895, 65039],
                            [127987, 65039, 8203, 9895, 65039]
                        ) &&
                        !c(
                            [55356, 56826, 55356, 56819],
                            [55356, 56826, 8203, 55356, 56819]
                        ) &&
                        !c(
                            [
                                55356,
                                57332,
                                56128,
                                56423,
                                56128,
                                56418,
                                56128,
                                56421,
                                56128,
                                56430,
                                56128,
                                56423,
                                56128,
                                56447,
                            ],
                            [
                                55356,
                                57332,
                                8203,
                                56128,
                                56423,
                                8203,
                                56128,
                                56418,
                                8203,
                                56128,
                                56421,
                                8203,
                                56128,
                                56430,
                                8203,
                                56128,
                                56423,
                                8203,
                                56128,
                                56447,
                            ]
                        )
                    );
                case "emoji":
                    return !c(
                        [55357, 56424, 8205, 55356, 57212],
                        [55357, 56424, 8203, 55356, 57212]
                    );
            }
            return !1;
        }

        function d(e) {
            var t = a.createElement("script");
            (t.src = e),
            (t.defer = t.type = "text/javascript"),
            a.getElementsByTagName("head")[0].appendChild(t);
        }
        for (
            i = Array("flag", "emoji"),
            t.supports = {
                everything: !0,
                everythingExceptFlag: !0
            },
            o = 0; o < i.length; o++
        )
            (t.supports[i[o]] = l(i[o])),
            (t.supports.everything = t.supports.everything && t.supports[i[o]]),
            "flag" !== i[o] &&
            (t.supports.everythingExceptFlag =
                t.supports.everythingExceptFlag && t.supports[i[o]]);
        (t.supports.everythingExceptFlag =
            t.supports.everythingExceptFlag && !t.supports.flag),
        (t.DOMReady = !1),
        (t.readyCallback = function() {
            t.DOMReady = !0;
        }),
        t.supports.everything ||
            ((n = function() {
                    t.readyCallback();
                }),
                a.addEventListener ?
                (a.addEventListener("DOMContentLoaded", n, !1),
                    e.addEventListener("load", n, !1)) :
                (e.attachEvent("onload", n),
                    a.attachEvent("onreadystatechange", function() {
                        "complete" === a.readyState && t.readyCallback();
                    })),
                (r = t.source || {}).concatemoji ?
                d(r.concatemoji) :
                r.wpemoji && r.twemoji && (d(r.twemoji), d(r.wpemoji)));
    })(window, document, window._wpemojiSettings);
</script> -->

<style type="text/css">
    img.wp-smiley,
    img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 0.07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
    }
</style>

<link rel="stylesheet" id="sb_instagram_styles-css" href="wp-contents/pluginss/instagram-feed/css/sbi-styles.min.css" type="text/css" media="all" />
<link rel="stylesheet" id="wp-block-library-css" href="wp-includes/css/dist/block-library/style.min.css" type="text/css" media="all" />
<link rel="stylesheet" id="wc-block-vendors-style-css" href="wp-contents/pluginss/woocommerce/packages/woocommerce-blocks/build/vendors-style.css" type="text/css" media="all" />
<link rel="stylesheet" id="wc-block-style-css" href="wp-contents/pluginss/woocommerce/packages/woocommerce-blocks/build/style.css" type="text/css" media="all" />
<link rel="stylesheet" id="contact-form-7-css" href="wp-contents/pluginss/contact-form-7/includes/css/styles.css" type="text/css" media="all" />
<link rel="stylesheet" id="woocommerce-layout-css" href="wp-contents/pluginss/woocommerce/assets/css/woocommerce-layout.css" type="text/css" media="all" />
<link rel="stylesheet" id="woocommerce-smallscreen-css" href="wp-contents/pluginss/woocommerce/assets/css/woocommerce-smallscreen.css" type="text/css" media="only screen and (max-width: 768px)" />
<link rel="stylesheet" id="woocommerce-general-css" href="wp-contents/pluginss/woocommerce/assets/css/woocommerce.css" type="text/css" media="all" />

<style id="woocommerce-inline-inline-css" type="text/css">
    .woocommerce form .form-row .required {
        visibility: visible;
    }
</style>

<link crossorigin="anonymous" rel="stylesheet" id="google-fonts-css" href="//fonts.googleapis.com/css?family=Karla%3A400%2C700&#038;ver=5.5.3" type="text/css" media="all" />
<link rel="stylesheet" id="font-awesome-css" href="wp-contents/pluginss/elementor/assets/lib/font-awesome/css/font-awesome.min.css" type="text/css" media="all" />
<link rel="stylesheet" id="owlCarousel-css" href="wp-contents/themess/tyche/assets/vendors/owl-carousel/owl.carousel.min.css" type="text/css" media="all" />
<link rel="stylesheet" id="owlCarousel-theme-css" href="wp-contents/themess/tyche/assets/vendors/owl-carousel/owl.theme.default.css" type="text/css" media="all" />
<link rel="stylesheet" id="dashicons-css" href="wp-includes/css/dashicons.min.css" type="text/css" media="all" />
<link rel="stylesheet" id="tyche-css" href="wp-contents/themess/tyche/style.css" type="text/css" media="all" />
<link rel="stylesheet" id="tyche-style-css" href="wp-contents/themess/tyche/assets/css/style.css" type="text/css" media="all" />

<script type="text/javascript" src="wp-includes/js/jquery/jquery.js" id="jquery-core-js"></script>
<script type="text/javascript" src="wp-contents/themess/tyche/assets/vendors/owl-carousel/owl.carousel.min.js" id="owlCarousel-js"></script>
<script type="text/javascript" src="wp-contents/themess/tyche/assets/vendors/jquery-zoom/jquery.zoom.min.js" id="jquery-zoom-js"></script>

<!-- <script type="text/javascript" id="tyche-scripts-js-extra">
    /* <![CDATA[ */
    var tycheHelper = {
        initZoom: "1",
        ajaxURL: "https:\/\/demo.colorlib.com\/tyche\/wp-admin\/admin-ajax.php",
    };
    /* ]]> */
</script> -->

<!-- <script type="text/javascript" src="wp-contents/themess/tyche/assets/js/functions.js" id="tyche-scripts-js"></script> -->

<!-- <link rel="https://api.w.org/" href="wp-json/" />
<link rel="alternate" type="application/json" href="wp-json/wp/v2/pages/2" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes/wlwmanifest.xml" />
<link rel="shortlink" href="" />
<link rel="alternate" type="application/json+oembed" href="wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdemo.colorlib.com%2Ftyche%2F" />
<link rel="alternate" type="text/xml+oembed" href="wp-json/oembed/1.0/embed?url=https%3A%2F%2Fdemo.colorlib.com%2Ftyche%2F&#038;format=xml" /> -->

<noscript>
    <style>
        .woocommerce-product-gallery {
            opacity: 1 !important;
        }
    </style>
</noscript>

<!-- <script type="text/javascript">
    var ajaxurl = "wp-admin/admin-ajax.php";
</script> -->

<!-- There is no amphtml version available for this URL. -->
<style id="kirki-inline-styles"></style>

<!-- Bootstrap Css -->
<link href="admin/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
