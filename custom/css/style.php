<style type="text/css">
    .saboxplugin-wrap {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        box-sizing: border-box;
        border: 1px solid #eee;
        width: 100%;
        clear: both;
        display: block;
        overflow: hidden;
        word-wrap: break-word;
        position: relative
    }

    .saboxplugin-wrap .saboxplugin-gravatar {
        float: left;
        padding: 20px
    }

    .saboxplugin-wrap .saboxplugin-gravatar img {
        max-width: 100px;
        height: auto;
        border-radius: 0;
    }

    .saboxplugin-wrap .saboxplugin-authorname {
        font-size: 18px;
        line-height: 1;
        margin: 20px 0 0 20px;
        display: block
    }

    .saboxplugin-wrap .saboxplugin-authorname a {
        text-decoration: none
    }

    .saboxplugin-wrap .saboxplugin-authorname a:focus {
        outline: 0
    }

    .saboxplugin-wrap .saboxplugin-desc {
        display: block;
        margin: 5px 20px
    }

    .saboxplugin-wrap .saboxplugin-desc a {
        text-decoration: underline
    }

    .saboxplugin-wrap .saboxplugin-desc p {
        margin: 5px 0 12px
    }

    .saboxplugin-wrap .saboxplugin-web {
        margin: 0 20px 15px;
        text-align: left
    }

    .saboxplugin-wrap .sab-web-position {
        text-align: right
    }

    .saboxplugin-wrap .saboxplugin-web a {
        color: #ccc;
        text-decoration: none
    }

    .saboxplugin-wrap .saboxplugin-socials {
        position: relative;
        display: block;
        background: #fcfcfc;
        padding: 5px;
        border-top: 1px solid #eee
    }

    .saboxplugin-wrap .saboxplugin-socials a svg {
        width: 20px;
        height: 20px
    }

    .saboxplugin-wrap .saboxplugin-socials a svg .st2 {
        fill: #fff;
        transform-origin: center center;
    }

    .saboxplugin-wrap .saboxplugin-socials a svg .st1 {
        fill: rgba(0, 0, 0, .3)
    }

    .saboxplugin-wrap .saboxplugin-socials a:hover {
        opacity: .8;
        -webkit-transition: opacity .4s;
        -moz-transition: opacity .4s;
        -o-transition: opacity .4s;
        transition: opacity .4s;
        box-shadow: none !important;
        -webkit-box-shadow: none !important
    }

    .saboxplugin-wrap .saboxplugin-socials .saboxplugin-icon-color {
        box-shadow: none;
        padding: 0;
        border: 0;
        -webkit-transition: opacity .4s;
        -moz-transition: opacity .4s;
        -o-transition: opacity .4s;
        transition: opacity .4s;
        display: inline-block;
        color: #fff;
        font-size: 0;
        text-decoration: inherit;
        margin: 5px;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        -ms-border-radius: 0;
        -o-border-radius: 0;
        border-radius: 0;
        overflow: hidden
    }

    .saboxplugin-wrap .saboxplugin-socials .saboxplugin-icon-grey {
        text-decoration: inherit;
        box-shadow: none;
        position: relative;
        display: -moz-inline-stack;
        display: inline-block;
        vertical-align: middle;
        zoom: 1;
        margin: 10px 5px;
        color: #444;
        fill: #444
    }

    .clearfix:after,
    .clearfix:before {
        content: ' ';
        display: table;
        line-height: 0;
        clear: both
    }

    .ie7 .clearfix {
        zoom: 1
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-twitch {
        border-color: #38245c
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-addthis {
        border-color: #e91c00
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-behance {
        border-color: #003eb0
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-delicious {
        border-color: #06c
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-deviantart {
        border-color: #036824
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-digg {
        border-color: #00327c
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-dribbble {
        border-color: #ba1655
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-facebook {
        border-color: #1e2e4f
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-flickr {
        border-color: #003576
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-github {
        border-color: #264874
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-google {
        border-color: #0b51c5
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-googleplus {
        border-color: #96271a
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-html5 {
        border-color: #902e13
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-instagram {
        border-color: #1630aa
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-linkedin {
        border-color: #00344f
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-pinterest {
        border-color: #5b040e
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-reddit {
        border-color: #992900
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-rss {
        border-color: #a43b0a
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-sharethis {
        border-color: #5d8420
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-skype {
        border-color: #00658a
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-soundcloud {
        border-color: #995200
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-spotify {
        border-color: #0f612c
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-stackoverflow {
        border-color: #a95009
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-steam {
        border-color: #006388
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-user_email {
        border-color: #b84e05
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-stumbleUpon {
        border-color: #9b280e
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-tumblr {
        border-color: #10151b
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-twitter {
        border-color: #0967a0
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-vimeo {
        border-color: #0d7091
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-windows {
        border-color: #003f71
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-whatsapp {
        border-color: #003f71
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-wordpress {
        border-color: #0f3647
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-yahoo {
        border-color: #14002d
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-youtube {
        border-color: #900
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-xing {
        border-color: #000202
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-mixcloud {
        border-color: #2475a0
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-vk {
        border-color: #243549
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-medium {
        border-color: #00452c
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-quora {
        border-color: #420e00
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-meetup {
        border-color: #9b181c
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-goodreads {
        border-color: #000
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-snapchat {
        border-color: #999700
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-500px {
        border-color: #00557f
    }

    .saboxplugin-socials.sabox-colored .saboxplugin-icon-color .sab-mastodont {
        border-color: #185886
    }

    .sabox-plus-item {
        margin-bottom: 20px
    }

    @media screen and (max-width:480px) {
        .saboxplugin-wrap {
            text-align: center
        }

        .saboxplugin-wrap .saboxplugin-gravatar {
            float: none;
            padding: 20px 0;
            text-align: center;
            margin: 0 auto;
            display: block
        }

        .saboxplugin-wrap .saboxplugin-gravatar img {
            float: none;
            display: inline-block;
            display: -moz-inline-stack;
            vertical-align: middle;
            zoom: 1
        }

        .saboxplugin-wrap .saboxplugin-desc {
            margin: 0 10px 20px;
            text-align: center
        }

        .saboxplugin-wrap .saboxplugin-authorname {
            text-align: center;
            margin: 10px 0 20px
        }
    }

    body .saboxplugin-authorname a,
    body .saboxplugin-authorname a:hover {
        box-shadow: none;
        -webkit-box-shadow: none
    }

    a.sab-profile-edit {
        font-size: 16px !important;
        line-height: 1 !important
    }

    .sab-edit-settings a,
    a.sab-profile-edit {
        color: #0073aa !important;
        box-shadow: none !important;
        -webkit-box-shadow: none !important
    }

    .sab-edit-settings {
        margin-right: 15px;
        position: absolute;
        right: 0;
        z-index: 2;
        bottom: 10px;
        line-height: 20px
    }

    .sab-edit-settings i {
        margin-left: 5px
    }

    .saboxplugin-socials {
        line-height: 1 !important
    }

    .rtl .saboxplugin-wrap .saboxplugin-gravatar {
        float: right
    }

    .rtl .saboxplugin-wrap .saboxplugin-authorname {
        display: flex;
        align-items: center
    }

    .rtl .saboxplugin-wrap .saboxplugin-authorname .sab-profile-edit {
        margin-right: 10px
    }

    .rtl .sab-edit-settings {
        right: auto;
        left: 0
    }

    img.sab-custom-avatar {
        max-width: 75px;
    }

    .saboxplugin-wrap .saboxplugin-desc a,
    .saboxplugin-wrap .saboxplugin-desc {
        color: 0 !important;
    }

    .saboxplugin-wrap .saboxplugin-socials .saboxplugin-icon-grey {
        color: 0;
        fill: 0;
    }

    .saboxplugin-wrap .saboxplugin-authorname a,
    .saboxplugin-wrap .saboxplugin-authorname span {
        color: 0;
    }

    .saboxplugin-wrap {
        margin-top: 0px;
        margin-bottom: 0px;
        padding: 0px 0px
    }

    .saboxplugin-wrap .saboxplugin-authorname {
        font-size: 18px;
        line-height: 25px;
    }

    .saboxplugin-wrap .saboxplugin-desc p,
    .saboxplugin-wrap .saboxplugin-desc {
        font-size: 14px !important;
        line-height: 21px !important;
    }

    .saboxplugin-wrap .saboxplugin-web {
        font-size: 14px;
    }

    .saboxplugin-wrap .saboxplugin-socials a svg {
        width: 18px;
        height: 18px;
    }

    .my-custom-wrap { 
        white-space: pre-wrap;      /* CSS3 */   
        white-space: -moz-pre-wrap; /* Firefox */    
        white-space: -pre-wrap;     /* Opera <7 */   
        white-space: -o-pre-wrap;   /* Opera 7 */    
        word-wrap: break-word;      /* IE */
    }

</style>
