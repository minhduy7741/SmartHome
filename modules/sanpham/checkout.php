<?php
// Lấy thông tin từ yêu cầu (GET hoặc POST)
$id = $_GET['id_source'] ?? null;
$email = $_GET['email'] ?? null;
if ($id === null) {
    echo 'Không tìm thấy thông tin đơn hàng.';
    exit();
}
if ($email === null) {
    echo 'Không tìm thấy thông tin người mua.';
    exit();
}
// Lấy thông tin đơn hàng từ cơ sở dữ liệu
$stmt = $conn->prepare("SELECT * FROM source WHERE id = :id");
$stmt->execute(['id' => $id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

$currentTime = time();
$formattedTime = date('Y-m-d H:i:s', $currentTime);
?>

<html class="thankyou-page">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Cảm ơn">
    <title>Cảm ơn</title>

    <script>
    (function() {
        function asyncLoad() {
            var urls = [] || [];
            for (var i = 0; i < urls.length; i++) {
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = urls[i];
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            }
        };
        window.attachEvent ? window.attachEvent('onload', asyncLoad) : window.addEventListener('load', asyncLoad,
            false);
    })();
    </script>
    <link rel="shortcut icon"
        href="//bizweb.dktcdn.net/100/502/883/themes/934584/assets/checkout_favicon.ico?1719764721426"
        type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css">

    <link rel="stylesheet" href="https://dola-phone.mysapo.net/dist/css/checkout.vendor.min.css?v=4fcd86c">


    <link rel="stylesheet" href="https://dola-phone.mysapo.net/dist/css/checkout.min.css?v=f6401e8">
    <script src="//bizweb.dktcdn.net/assets/themes_support/libphonenumber-v3.2.30.min.js?1719764721426"></script>

    <script src="/dist/js/checkout.vendor.min.js?v=11006c9"></script>

    <script src="/dist/js/checkout.min.js?v=4cdb0f8"></script>

    <script>
    window.BizwebAnalytics = window.BizwebAnalytics || {};
    window.BizwebAnalytics.meta = window.BizwebAnalytics.meta || {};
    window.BizwebAnalytics.meta.currency = 'VND';
    window.BizwebAnalytics.tracking_url = '/s';
    var meta = {};


    for (var attr in meta) {
        window.BizwebAnalytics.meta[attr] = meta[attr];
    }
    </script>


    <script src="/dist/js/stats.min.js?v=96f2ff2"></script>
    <script async="" src="//bizweb.dktcdn.net/web/assets/lib/js/fp.v3.3.0.min.js"></script>
    <script async="" src="//bizweb.dktcdn.net/web/assets/lib/js/fp.v3.3.0.min.js"></script>


    <style>
    body.shimeji-pinned iframe {
        pointer-events: none;
    }

    body.shimeji-select-ie {
        cursor: cell !important;
    }

    #shimeji-contextMenu::-webkit-scrollbar {
        width: 6px;
    }

    #shimeji-contextMenu::-webkit-scrollbar-thumb {
        background-color: rgba(30, 30, 30, 0.6);
        border-radius: 3px;
    }

    #shimeji-contextMenu::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    </style>
    <meta name="shimejiBrowserExtensionId" content="gohjpllcolmccldfdggmamodembldgpc" data-version="2.0.5">
    <style>
    .--savior-overlay-transform-reset {
        transform: none !important;
    }

    .--savior-overlay-z-index-top {
        z-index: 2147483643 !important;
    }

    .--savior-overlay-position-relative {
        position: relative;
    }

    .--savior-overlay-position-static {
        position: static !important;
    }

    .--savior-overlay-overflow-hidden {
        overflow: hidden !important;
    }

    .--savior-overlay-overflow-x-visible {
        overflow-x: visible !important;
    }

    .--savior-overlay-overflow-y-visible {
        overflow-y: visible !important;
    }

    .--savior-overlay-z-index-reset {
        z-index: auto !important;
    }

    .--savior-overlay-display-none {
        display: none !important;
    }

    .--savior-overlay-clearfix {
        clear: both;
    }

    .--savior-overlay-reset-filter {
        filter: none !important;
        backdrop-filter: none !important;
    }

    .--savior-tooltip-host {
        z-index: 9999;
        position: absolute;
        top: 0;
    }

    /*Override css styles for Twitch.tv*/
    main.--savior-overlay-z-index-reset {
        z-index: auto !important;
    }

    .modal__backdrop.--savior-overlay-z-index-reset {
        position: static !important;
    }

    main.--savior-overlay-z-index-top {
        z-index: auto !important;
    }

    main.--savior-overlay-z-index-top .channel-root__player-container+div,
    main.--savior-overlay-z-index-top .video-player-hosting-ui__container+div {
        opacity: 0.1;
    }

    /*Dirty hack for facebook big video page e.g: https://www.facebook.com/abc/videos/...*/
    .--savior-backdrop {
        position: fixed !important;
        z-index: 2147483642 !important;
        top: 0;
        left: 0;
        height: 100vh;
        width: 100vw !important;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .--savior-overlay-twitter-video-player {
        position: fixed;
        width: 80%;
        height: 80%;
        top: 10%;
        left: 10%;
    }

    .--savior-overlay-z-index-reset [class*="DivSideNavContainer"],
    .--savior-overlay-z-index-reset [class*="DivHeaderContainer"],
    .--savior-overlay-z-index-reset [class*="DivBottomContainer"],
    .--savior-overlay-z-index-reset [class*="DivCategoryListWrapper"],
    .--savior-overlay-z-index-reset [data-testid="sidebarColumn"],
    .--savior-overlay-z-index-reset header[role="banner"],
    .--savior-overlay-z-index-reset [data-testid="cellInnerDiv"]:not(.--savior-overlay-z-index-reset),
    .--savior-overlay-z-index-reset [aria-label="Home timeline"]>div:first-child,
    .--savior-overlay-z-index-reset [aria-label="Home timeline"]>div:nth-child(3) {
        z-index: -1 !important;
    }

    .--savior-overlay-z-index-reset [data-testid="cellInnerDiv"] .--savior-backdrop+div {
        z-index: 2147483643 !important;
    }

    .--savior-overlay-z-index-reset [data-testid="primaryColumn"]>[aria-label="Home timeline"] {
        z-index: 0 !important;
    }

    .--savior-overlay-z-index-reset#mtLayer,
    .--savior-overlay-z-index-reset.media-layer {
        z-index: 3000 !important;
    }

    .--savior-overlay-position-relative [class*="SecBar_secBar_"],
    .--savior-overlay-position-relative .woo-box-flex [class*="Frame_top_"] {
        z-index: 0 !important;
    }

    .--savior-overlay-position-relative .vue-recycle-scroller__item-view:not(.--savior-overlay-z-index-reset),
    .--savior-overlay-position-relative .woo-panel-main[class*="BackTop_main_"],
    .--savior-overlay-position-relative [class*="Main_side_"] {
        z-index: -1 !important;
    }

    /* Fix conflict css with zingmp3 */
    .zm-video-modal.--savior-overlay-z-index-reset {
        position: absolute;
    }

    /* Dirty hack for xvideos99 */
    #page #main.--savior-overlay-z-index-reset {
        z-index: auto !important;
    }

    /* Overlay for ok.ru */
    #vp_w.--savior-overlay-z-index-reset.media-layer.media-layer__video {
        overflow-y: hidden;
        z-index: 2147483643 !important;
    }

    /* Fix missing controller for tv.naver.com */
    .--savior-overlay-z-index-top.rmc_controller,
    .--savior-overlay-z-index-top.rmc_setting_intro,
    .--savior-overlay-z-index-top.rmc_highlight,
    .--savior-overlay-z-index-top.rmc_control_settings {
        z-index: 2147483644 !important;
    }

    /* Dirty hack for douyi.com */
    .swiper-wrapper.--savior-overlay-z-index-reset .swiper-slide:not(.swiper-slide-active),
    .swiper-wrapper.--savior-overlay-transform-reset .swiper-slide:not(.swiper-slide-active) {
        display: none;
    }

    .videoWrap+div>div {
        pointer-events: unset;
    }

    /* Dirty hack for fpt.ai */
    .mfp-wrap.--savior-overlay-z-index-top {
        position: relative;
    }

    .mfp-wrap.--savior-overlay-z-index-top .mfp-close {
        display: none;
    }

    .mfp-wrap.--savior-overlay-z-index-top .mfp-content {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    section.--savior-overlay-z-index-reset>main[role="main"].--savior-overlay-z-index-reset+nav {
        z-index: -1 !important;
    }

    section.--savior-overlay-z-index-reset>main[role="main"].--savior-overlay-z-index-reset section.--savior-overlay-z-index-reset div.--savior-overlay-z-index-reset~div {
        position: relative;
    }

    .watching-movie #video-player.--savior-overlay-z-index-top {
        z-index: 2147483644 !important;
    }

    div[class^="tiktok"].--savior-overlay-z-index-reset {
        z-index: 2147483644 !important;
    }

    .--savior-lightoff-fix section:not(:has([class*="--savior-overlay-"])),
    .--savior-lightoff-fix section.section_video~section {
        z-index: -1;
        position: relative;
    }

    .--savior-lightoff-fix header,
    .--savior-lightoff-fix footer,
    .--savior-lightoff-fix .top-header,
    .--savior-lightoff-fix .swiper-container,
    .--savior-lightoff-fix #to_top,
    .--savior-lightoff-fix #button-adblock {
        z-index: -1 !important;
    }

    @-moz-keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @-o-keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
    </style>
</head>

<body data-no-turbolink="">

    <header class="banner">
        <div class="wrap">
            <div class="logo logo--center">

                <a href="/">
                    <img class="logo__image  logo__image--medium " alt="Dola Phone"
                        src=<?php _WEBDIR?>"/templates/img/icon.jpg">
                </a>

            </div>
        </div>
    </header>
    <div class="content">
        <form>
            <div class="wrap wrap--mobile-fluid">
                <main class="main main--nosidebar">
                    <header class="main__header">
                        <div class="logo logo--center">

                            <a href="/">
                                <img class="logo__image  logo__image--medium " alt="Dola Phone"
                                    src=<?php _WEBDIR?>"/templates/img/icon.jpg">
                            </a>

                        </div>
                    </header>
                    <div class="main__content">
                        <article class="row">
                            <div class="col col--primary">
                                <section class="section section--icon-heading">
                                    <div class="section__icon unprintable">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                                            <g fill="none" stroke="#8EC343" stroke-width="2">
                                                <circle cx="36" cy="36" r="35"
                                                    style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;">
                                                </circle>
                                                <path d="M17.417,37.778l9.93,9.909l25.444-25.393"
                                                    style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="thankyou-message-container">
                                        <h2 class="section__title">Cảm ơn bạn đã đặt hàng</h2>

                                        <p class="section__text">
                                            Hãy vào lịch sử đơn hàng để xem link tải sản phẩm
                                        </p>


                                    </div>
                                </section>
                            </div>
                            <div class="col col--secondary">
                                <aside class="order-summary order-summary--bordered order-summary--is-collapsed"
                                    id="order-summary">
                                    <div class="order-summary__header">
                                        <div class="order-summary__title">
                                            Đơn hàng #<?php echo htmlspecialchars($order['id']);?>

                                        </div>
                                        <div class="order-summary__action hide-on-desktop unprintable">
                                            <a data-toggle="#order-summary"
                                                data-toggle-class="order-summary--is-collapsed" class="expandable">
                                                Xem chi tiết
                                            </a>
                                        </div>
                                    </div>
                                    <div class="order-summary__sections">
                                        <div
                                            class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                                            <table class="product-table">
                                                <tbody>

                                                    <tr class="product">

                                                        <th class="product__description">
                                                            <span
                                                                class="product__description__name"><?php echo htmlspecialchars($order['name']);?></span>

                                                        </th>
                                                        <td class="product__quantity printable-only">
                                                            x 1
                                                        </td>
                                                        <td class="product__price">

                                                            <?php echo number_format($order['gia'], 0, ',', '.');?>
                                                            ₫

                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="order-summary__section">
                                            <table class="total-line-table">
                                                <tbody class="total-line-table__tbody">



                                                    <tr class="total-line total-line--subtotal">
                                                        <th class="total-line__name">Tạm tính</th>
                                                        <td class="total-line__price">
                                                            <?php echo number_format($order['gia'], 0, ',', '.');?>₫
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="order-summary__section">
                                            <table class="total-line-table">
                                                <tbody class="total-line-table__tbody">
                                                    <tr class="total-line payment-due">
                                                        <th class="total-line__name">
                                                            <span class="payment-due__label-total">Tổng cộng</span>
                                                        </th>
                                                        <td class="total-line__price">
                                                            <span
                                                                class="payment-due__price"><?php echo number_format($order['gia'], 0, ',', '.');?>₫</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <div class="col col--primary">
                                <section class="section">
                                    <div class="section__content section__content--bordered">

                                        <div class="row">

                                            <div class="col col--md-two">
                                                <h2>Thông tin mua hàng</h2>
                                                <p><?php echo $email;?></p>
                                            </div>

                                            <div class="col col--md-two">
                                                <h2>Link tải</h2>
                                                <p><?php echo htmlspecialchars($order['link']);?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col--md-two">
                                                <h2>Thời gian mua</h2>
                                                <p><?php echo $formattedTime;?></p>
                                            </div>
                                            <div class="col col--md-two">
                                                <h2>Phương thức mua</h2>
                                                <p>Mua online</p>
                                            </div>
                                        </div>

                                    </div>
                                </section>
                                <section class="section unprintable">
                                    <div class="field__input-btn-wrapper field__input-btn-wrapper--floating">
                                        <a href="/" class="btn btn--large">Tiếp tục mua hàng</a>
                                        <span class="text-icon-group text-icon-group--large icon-print"
                                            onclick="window.print()">

                                            <span>In PDF </span>
                                        </span>
                                    </div>
                                </section>
                            </div>
                        </article>
                    </div>

                </main>
            </div>
        </form>
    </div>

    <div id="shimeji-workArea"
        style="position: fixed; background: transparent; z-index: 2147483643; width: 100vw; height: 100vh; left: 0px; top: 0px; transform: translate(0px, 0px); pointer-events: none;">
    </div>
</body>
<savior-host
    style="all: unset; position: absolute; top: 0; z-index: 99999999999999; display: block !important; overflow: unset">
</savior-host>
<en2vi-host class="corom-element" version="3"
    style="all: initial; position: absolute; top: 0; left: 0; right: 0; height: 0; margin: 0; text-align: left; z-index: 10000000000; pointer-events: none; border: none; display: block">
</en2vi-host>

</html>