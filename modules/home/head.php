<?php
if ( ! defined("_STATUS") ) {
    echo "Truy cập không hợp lệ...";
    die();
}
require_once(_WEBDIR."/index.php");
$title = !empty($data['title']) ? $data['title'] : 'Vietcod';

?>

<!doctype html>
<html class="h-100">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo htmlspecialchars($title); ?></title>
    <meta name="description" content="Website Cung Cấp Source Game (Mã Nguồn) Free Có Phí,Động Game Free">
    <meta name="mota" content="Website Cung Cấp Source Game (Mã Nguồn) Free Có Phí,Động Game Free">
    <meta name="tukhoa" content="vtgame.online, VTGame, source game, mã nguồn, game, free">
    <!-- Open Graph data -->
    <meta name="google-site-verification" content="IRT02Rk0Klk" />
    <meta property="og:tenweb" content="vtgame.online">
    <meta property="og:type" content="Website">
    <meta property="og:url" content="https://vtgame.online">
    <meta property="og:image" content="https://img.upanh.tv/2024/08/06/icon.jpg">
    <meta property="og:description" content="">
    <meta property="og:site_name" content="vtgame.online">
    <meta property="article:section" content="vtgame.online, VTGame, source game, mã nguồn, game, free">
    <meta property="article:tag" content="vtgame.online, VTGame, source game, mã nguồn, game, free">
    <meta name="author" content="clown.vn">
    <link rel="stylesheet" href=<?php _WEBDIR?>"/templates/css/bootstrap.min.css">
    <link rel="stylesheet" href=<?php _WEBDIR?>"/templates/css/style.css">
    <link rel="icon" type="image/png" href=<?php _WEBDIR?>"/templates/img/icon.jpg">

    <style>
    :root {
        --primary: #000000;
    }
    </style>
    <style>
    :root {
        --primary1: #007bff;
    }
    </style>
    <link rel="stylesheet" href="https://414jgaming.com/assets/demo/flaticon.css">
    <link rel="stylesheet" href="https://414jgaming.com/assets/demo/icofont.min.css">
    <link rel="stylesheet" href="https://414jgaming.com/assets/demo/fontawesome.min.css">
    <link rel="stylesheet" href="https://414jgaming.com/assets/demo/venobox.min.css">
    <link rel="stylesheet" href="https://414jgaming.com/assets/demo/slick.min.css">
    <link rel="stylesheet" href="https://414jgaming.com/assets/demo/nice-select.min.css">
    <link rel="stylesheet" href="https://414jgaming.com/assets/demo/bootstrap.min.css">
    <link rel="stylesheet" href="https://414jgaming.com/assets/main.css">
    <link rel="stylesheet" href="https://414jgaming.com/assets/demo/user-auth.css">
    <link rel="stylesheet" href="https://414jgaming.com/assets/demo/index.css">

    <link rel="stylesheet" href="https://414jgaming.com/assets/demo/all.min.css">

    <!-- sweetalert2-->
    <link class="main-stylesheet" href="https://414jgaming.com/assets/demo/default.css" rel="stylesheet"
        type="text/css">
    <script src="https://414jgaming.com/assets/demo/sweetalert2.js"></script>
    <!-- Cute Alert -->
    <link class="main-stylesheet" href="https://414jgaming.com/assets/demo/style.css" rel="stylesheet" type="text/css">
    <script src="https://414jgaming.com/assets/demo/cute-alert.js"></script>
    <!-- Simple Notify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.css" />
    <!-- Simple Notify JS -->
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@1.0.4/dist/simple-notify.min.js"></script>

    <!-- jQuery -->
    <script src="https://414jgaming.com/assets/demo/jquery-3.6.0.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <script src="https://414jgaming.com/assets/demo/main.js"></script>

    <link rel="stylesheet" href="https://414jgaming.com/assets/demo/main.css?v=8">
    <script src="https://thegioicode.com/themes/mod/js/main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://414jgaming.com/assets/demo/wallet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Saira+Semi+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">


    <script src="https://414jgaming.com//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://414jgaming.com/assets/demo/scripts.min.js"></script>
    <script src="https://414jgaming.com/assets/demo/core.min.js"></script>
    <link href="https://414jgaming.com/assets/demo/cute-alert.css" rel="stylesheet">
    <script src="https://414jgaming.com/assets/demo/cute-alert.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>




</head>

<script>
function showMessage(message, type) {
    const commonOptions = {
        effect: 'fade',
        speed: 300,
        customClass: null,
        customIcon: null,
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 3000,
        gap: 20,
        distance: 20,
        type: 'outline',
        position: 'right top'
    };

    const options = {
        success: {
            status: 'success',
            title: 'Thành công!',
            text: message,
        },
        error: {
            status: 'error',
            title: 'Thất bại!',
            text: message,
        }
    };
    new Notify(Object.assign({}, commonOptions, options[type]));
}
</script>

<style>
body {
    font-family: 'Saira Semi Condensed', sans-serif;
}

html {
    scroll-behavior: smooth;
}

.feature-content {
    padding-left: 0px;
    border-left: none;
}

.product-disable::before {
    position: absolute;
    content: "Hết hàng";
    top: 89%;
    left: 50%;
    z-index: 2;
    width: 100%;
    font-size: 15px;
    font-weight: 400;
    padding: 0px;
    text-align: center;
    text-transform: uppercase;
    text-shadow: var(--primary-tshadow);
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    color: var(--white);
    background: rgba(224, 152, 22, 0.9);
}

.dropdown-arrow {
    position: relative;
    padding-right: 18px !important
}

.dropdown-arrow:hover::before {
    color: var(--primary)
}

.dropdown-arrow::before {
    position: absolute;
    content: "\ea99";
    top: 50%;
    right: 0px;
    font-size: 15px;
    line-height: 15px;
    color: var(--text);
    font-family: IcoFont;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    transition: all linear .3s;
    -webkit-transition: all linear .3s;
    -moz-transition: all linear .3s;
    -ms-transition: all linear .3s;
    -o-transition: all linear .3s
}

.dropdown-link {
    position: relative;
    transition: all linear .3s;
    -webkit-transition: all linear .3s;
    -moz-transition: all linear .3s;
    -ms-transition: all linear .3s;
    -o-transition: all linear .3s
}

.dropdown-link:hover {
    color: var(--primary);
    background: var(--chalk)
}

.dropdown-link:hover::before {
    color: var(--primary)
}

.dropdown-link::before {
    position: absolute;
    top: 50%;
    right: 18px;
    content: "\f054";
    font-size: 10px;
    font-weight: 900;
    font-family: "Font Awesome 5 Free";
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    transition: all linear .3s;
    -webkit-transition: all linear .3s;
    -moz-transition: all linear .3s;
    -ms-transition: all linear .3s;
    -o-transition: all linear .3s
}

.dropdown-link.active {
    color: var(--primary)
}

.dropdown-link.active::before {
    color: var(--primary);
    -webkit-transform: translateY(-50%) rotate(90deg);
    transform: translateY(-50%) rotate(90deg)
}

.dropdown-list {
    list-style-type: none;
    /* Loáº¡i bá» dáº¥u cháº¥m Ä‘áº§u */
    padding: 0;
    /* XÃ³a padding máº·c Ä‘á»‹nh cá»§a danh sÃ¡ch */
    margin: 0;
    /* XÃ³a margin máº·c Ä‘á»‹nh cá»§a danh sÃ¡ch */
    display: none;
    padding: 0px 20px;
    transition: all linear .3s;
    -webkit-transition: all linear .3s;
    -moz-transition: all linear .3s;
    -ms-transition: all linear .3s;
    -o-transition: all linear .3s
}

.dropdown-list li a {
    width: 100%;
    font-size: 15px;
    line-height: 18px;
    border-radius: 8px;
    padding: 10px 15px 10px 35px;
    color: var(--text);
    background: var(--white);
    position: relative;
    white-space: nowrap;
    transition: all linear .3s;
    -webkit-transition: all linear .3s;
    -moz-transition: all linear .3s;
    -ms-transition: all linear .3s;
    -o-transition: all linear .3s
}

.dropdown-list li a:hover {
    color: var(--primary);
    background: var(--chalk)
}



.dropdown:hover .dropdown-position-list {
    visibility: visible;
    opacity: 1;
    top: 70px
}

.dropdown-position-list {
    padding: 0px;
    list-style: none;
    position: absolute;
    top: 100px;
    left: 0px;
    z-index: 2;
    width: 200px;
    height: auto;
    visibility: hidden;
    opacity: 0;
    padding: 10px;
    border-radius: 8px;
    background: var(--white);
    border: 1px solid var(--border);
    -webkit-box-shadow: 0px 15px 35px 0px rgba(0, 0, 0, 0.1);
    box-shadow: 0px 15px 35px 0px rgba(0, 0, 0, 0.1);
    transition: all linear .3s;
    -webkit-transition: all linear .3s;
    -moz-transition: all linear .3s;
    -ms-transition: all linear .3s;
    -o-transition: all linear .3s
}

.dropdown-position-list::before {
    position: absolute;
    content: "";
    z-index: -1;
    top: -7px;
    left: 12px;
    width: 12px;
    height: 12px;
    border-radius: 3px;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
    background: var(--white);
    border-top: 1px solid var(--border);
    border-left: 1px solid var(--border)
}

.dropdown-position-list li a {
    width: 100%;
    font-size: 15px;
    line-height: 18px;
    border-radius: 8px;
    padding: 8px 15px;
    color: var(--text);
    background: var(--white);
    white-space: nowrap;
    /*  */
    transition: all linear .3s;
    -webkit-transition: all linear .3s;
    -moz-transition: all linear .3s;
    -ms-transition: all linear .3s;
    -o-transition: all linear .3s
}

.dropdown-position-list li a:hover {
    color: var(--primary);
    background: var(--chalk)
}

.dropdown-megamenu {
    position: static
}

.dropdown-megamenu:hover .megamenu {
    visibility: visible;
    opacity: 1;
    top: 199px
}
</style>



<script type='text/javascript'>
//<![CDATA[
shortcut = {
    all_shortcuts: {},
    add: function(a, b, c) {
        var d = {
            type: "keydown",
            propagate: !1,
            disable_in_input: !1,
            target: document,
            keycode: !1
        };
        if (c)
            for (var e in d) "undefined" == typeof c[e] && (c[e] = d[e]);
        else c = d;
        d = c.target, "string" == typeof c.target && (d = document.getElementById(c.target)), a = a
            .toLowerCase(), e = function(d) {
                d = d || window.event;
                if (c.disable_in_input) {
                    var e;
                    d.target ? e = d.target : d.srcElement && (e = d.srcElement), 3 == e.nodeType && (e = e
                        .parentNode);
                    if ("INPUT" == e.tagName || "TEXTAREA" == e.tagName) return
                }
                d.keyCode ? code = d.keyCode : d.which && (code = d.which), e = String.fromCharCode(code)
                    .toLowerCase(), 188 == code && (e = ","), 190 == code && (e = ".");
                var f = a.split("+"),
                    g = 0,
                    h = {
                        "`": "~",
                        1: "!",
                        2: "@",
                        3: "#",
                        4: "$",
                        5: "%",
                        6: "^",
                        7: "&",
                        8: "*",
                        9: "(",
                        0: ")",
                        "-": "_",
                        "=": "+",
                        ";": ":",
                        "'": '"',
                        ",": "<",
                        ".": ">",
                        "/": "?",
                        "\\": "|"
                    },
                    i = {
                        esc: 27,
                        escape: 27,
                        tab: 9,
                        space: 32,
                        "return": 13,
                        enter: 13,
                        backspace: 8,
                        scrolllock: 145,
                        scroll_lock: 145,
                        scroll: 145,
                        capslock: 20,
                        caps_lock: 20,
                        caps: 20,
                        numlock: 144,
                        num_lock: 144,
                        num: 144,
                        pause: 19,
                        "break": 19,
                        insert: 45,
                        home: 36,
                        "delete": 46,
                        end: 35,
                        pageup: 33,
                        page_up: 33,
                        pu: 33,
                        pagedown: 34,
                        page_down: 34,
                        pd: 34,
                        left: 37,
                        up: 38,
                        right: 39,
                        down: 40,
                        f1: 112,
                        f2: 113,
                        f3: 114,
                        f4: 115,
                        f5: 116,
                        f6: 117,
                        f7: 118,
                        f8: 119,
                        f9: 120,
                        f10: 121,
                        f11: 122,
                        f12: 123
                    },
                    j = !1,
                    l = !1,
                    m = !1,
                    n = !1,
                    o = !1,
                    p = !1,
                    q = !1,
                    r = !1;
                d.ctrlKey && (n = !0), d.shiftKey && (l = !0), d.altKey && (p = !0), d.metaKey && (r = !0);
                for (var s = 0; k = f[s], s < f.length; s++) "ctrl" == k || "control" == k ? (g++, m = !0) :
                    "shift" == k ? (g++, j = !0) : "alt" == k ? (g++, o = !0) : "meta" == k ? (g++, q = !0) :
                    1 < k.length ? i[k] == code && g++ : c.keycode ? c.keycode == code && g++ : e == k ? g++ :
                    h[e] && d.shiftKey && (e = h[e], e == k && g++);
                if (g == f.length && n == m && l == j && p == o && r == q && (b(d), !c.propagate)) return d
                    .cancelBubble = !0, d.returnValue = !1, d.stopPropagation && (d.stopPropagation(), d
                        .preventDefault()), !1
            }, this.all_shortcuts[a] = {
                callback: e,
                target: d,
                event: c.type
            }, d.addEventListener ? d.addEventListener(c.type, e, !1) : d.attachEvent ? d.attachEvent("on" + c
                .type, e) : d["on" + c.type] = e
    },
    remove: function(a) {
        var a = a.toLowerCase(),
            b = this.all_shortcuts[a];
        delete this.all_shortcuts[a];
        if (b) {
            var a = b.event,
                c = b.target,
                b = b.callback;
            c.detachEvent ? c.detachEvent("on" + a, b) : c.removeEventListener ? c.removeEventListener(a, b, !
                1) : c["on" + a] = !1
        }
    }
}, shortcut.add("Ctrl+U", function() {
    top.location.href = "/"
}), shortcut.add("F12", function() {
    top.location.href = "/"
}), shortcut.add("Ctrl+Shift+I", function() {
    top.location.href = "/"
}), shortcut.add("Ctrl+S", function() {
    top.location.href = "/"
}), shortcut.add("Ctrl+Shift+C", function() {
    top.location.href = "/"
});
//]]>
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LDH37NXHVP"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'G-LDH37NXHVP');
</script>



<body>
    <div class="backdrop"></div><a class="backtop" href="#"><i class="fa-sharp fa-solid fa-chevron-up"></i></a>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <div class="header-top-welcome">
                        <p>Chào mừng bạn đến với Smart Home</p>
                    </div>
                </div>
                <div class="col-md-5 col-lg-3">
                    <div class="header-top-select">
                        <div class="header-select"><i class="fa-solid fa-earth-americas"></i>
                            <select class="select" id="changeLanguage" onchange="changeLanguage()">
                                <option value="1" selected>Vietnamese</option>
                                <option value="2">English</option>
                            </select>
                        </div>
                        <div class="header-select"><i class="fa-solid fa-money-bill"></i>
                            <select class="select" id="changeCurrency" onchange="changeCurrency()">
                                <option value="3" selected>VND</option>
                                <option value="4">USD</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-4">
                    <ul class="header-top-list">
                        <li><a href="/">Chính sách</a></li>
                        <li><a href="/">FAQ</a></li>
                        <li><a href=" ">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <header class="header-part">
        <div class="container">
            <div class="header-content">
                <div class="header-media-group">
                    <button class="header-user"><i class="fa-solid fa-bars"></i></button>
                    <a href="/">
                        <img src="<?php _WEBDIR?>"/templates/img/icon.jpg"></a>
                    <button class="header-src"><i class="fas fa-search"></i></button>
                </div>
                <a href="/" class="header-logo"><img src=<?php _WEBDIR?>"/templates/img/icon.jpg">
                        </a>
                <form class="header-form" method="POST" action="">

                    <input type="text" name="search" value="" placeholder="Tìm kiếm sản phẩm..."><button><i
                            class="fas fa-search"></i></button>
                </form>
                <div class="header-widget-group">
                    <a href="?modules=cart&action=cart" class="header-widget" title="Giỏ hàng">
                        <i class="fa-solid fa-cart-arrow-down"></i>
                        <sup id="cartCount"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></sup>
                    </a>
                    <a href="#" class="header-widget" title="Sản phẩm yêu thích">
                        <i class="fas fa-heart"></i>
                        <sup id="numFavorites">0</sup>
                    </a>
                    <button class="header-widget header-cart" title="Nạp tiền"><i
                            class="fa-solid fa-building-columns"></i>

                    </button>
                    <a href="?modules=auth&action=profile" class="header-widget" title="Login">
                        <img src="https://i.imgur.com/d31x62h.png" alt="user"><span>
                            <?php if(isset($_SESSION['user'])){
                                echo $_SESSION['user'];
                            }?>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!--BEGIN NAV 3-->
    <nav class="navbar-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navbar-content">
                        <ul class="navbar-list">
                            <li class="navbar-item"><a class="navbar-link" href="/">Trang chủ</a>
                            </li>
                            <li class="navbar-item dropdown-megamenu">
                                <a class="navbar-link" href="#">Menu</a>
                                <div class="megamenu">

                                    <div class="container">
                                        <div class="row row-cols-5">
                                            <div class="col">
                                                <div class="megamenu-wrap">
                                                    <h5 class="megamenu-title">Danh Sách</h5>
                                                    <ul class="megamenu-list">
                                                        <li>
                                                            <a href="?modules=sanpham&action=source&gia=0-0"><img
                                                                    width="25px" src="https://i.imgur.com/5OtiwkV.png">
                                                                QUÀ TẶNG </a>
                                                        </li>
                                                        <li>
                                                            <a href="?modules=sanpham&action=source&gia=1-999999"><img
                                                                    width="25px" src="https://i.imgur.com/5OtiwkV.png">
                                                                DƯỚI 1TR </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                href="?modules=sanpham&action=source&gia=1000000-9000000000"><img
                                                                    width="25px" src="https://i.imgur.com/5OtiwkV.png">
                                                                TRÊN 1 TRIỆU </a>
                                                        </li>
                                                        <!-- <li>
                                                            <a href="?modules=sanpham&action=source&the_loai=toolweb"><img
                                                                    width="25px" src="https://i.imgur.com/5OtiwkV.png">
                                                                Tool &amp; Web </a>
                                                        </li>
                                                        <li>
                                                            <a href="?modules=sanpham&action=source&the_loai=china"><img
                                                                    width="25px" src="https://i.imgur.com/5OtiwkV.png">
                                                                Game China </a>
                                                        </li> -->

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="navbar-item dropdown">
                                <a class="navbar-link" href="#">Nạp tiền</a>

                                <ul class="dropdown-position-list">
                                    <li><a href="?modules=client&action=bank"><i
                                                class="fa-solid fa-building-columns"></i>
                                            Ngân hàng</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-item dropdown">
                                <a class="navbar-link" href="#">Lịch sử</a>

                                <ul class="dropdown-position-list">
                                    <li><a href="?modules=sanpham&action=product">Quản lý sản phẩm</a>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                        <div class="navbar-info-group">
                            <div class="navbar-info"><i class="fa-solid fa-phone"></i>
                                <p><small>Hotline</small><span>0000000000</span></p>
                            </div>
                            <div class="navbar-info"><i class="fa-regular fa-envelope"></i>
                                <p><small>Email</small><span>tuan01107@gmail.com</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside class="category-sidebar">
        <div class="category-header">
            <h4 class="category-title"><i class="fas fa-align-left"></i><span>Sản phẩm</span></h4><button
                class="category-close"><i class="fa-solid fa-circle-xmark fa-sm"></i></button>
        </div>
        <!--menu mobile-->
        <ul class="category-list">
            <li class="category-item">
                <a class="category-link dropdown-link" href="#">
                    <img src="https://i.imgur.com/5OtiwkV.png" style="margin-right: 10px;" width="30px">
                    Menu Game </a>

                <ul class="dropdown-list">
                    <li>
                        <a href="https://414jgaming.com/source/code-free"> CODE FREE</a>
                    </li>
                    <li>
                        <a href="https://414jgaming.com/source/code-co-phi-duoi-1tr"> CODE CÓ PHÍ DƯỚI 1TR</a>
                    </li>
                    <li>
                        <a href="https://414jgaming.com/source/co-phi-tren-1-trieu"> CÓ PHÍ TRÊN 1 TRIỆU</a>
                    </li>
                    <li>
                        <a href="https://414jgaming.com/source/tool-amp-web"> Tool &amp; Web</a>
                    </li>
                    <li>
                        <a href="https://414jgaming.com/source/game-china"> Game China</a>
                    </li>

                </ul>
            </li>

    </aside>
    <aside class="cart-sidebar">
        <div class="cart-header">
            <div class="cart-total"><i class="fa-solid fa-building-columns"></i><span>Chọn phương thức nạp tiền</span>
            </div>
            <button class="cart-close"><i class="fa-solid fa-circle-xmark fa-sm"></i></button>
        </div>
        <ul class="category-list">
            <li class="category-item">
                <a class="category-link" href="?modules=client&action=bank"><img style="margin-right: 10px;"
                        width="30px" src="https://img.upanh.tv/2024/10/14/Logo_MB_new.png">
                    Ngân hàng
                </a>
            </li>


        </ul>
    </aside>
    <aside class="nav-sidebar">
        <div class="nav-header"><a href="/"><img src=<?php _WEBDIR?>"/templates/img/icon.jpg">
                    </a><button class="nav-close"><i class="fa-solid fa-circle-xmark fa-sm"></i></button>
        </div>
        <div class="nav-content">
            <div class="nav-btn">
                <a href="?modules=auth&action=profile" class="btn btn-inline">
                    <i class="fa fa-user"></i> <span> <?php if(isset($_SESSION['user'])){
                                echo $_SESSION['user'];
                            }?></span></a>
            </div>
            <ul class="nav-list">
                <li>
                    <a class="nav-link" href="/">
                        <i class="fa-solid fa-house"></i>
                        Trang chủ
                    </a>
                </li>
                <li>
                    <a class="nav-link dropdown-link" href="#"><i class="fa-solid fa-cart-shopping"></i>
                        Menu Game
                    </a>
                    <ul class="dropdown-list">
                        <li>
                            <a href="https://414jgaming.com/source/code-free"><img width="25px" class="me-2 active"
                                    src="https://i.imgur.com/5OtiwkV.png">
                                CODE FREE </a>
                        </li>
                        <li>
                            <a href="https://414jgaming.com/source/code-co-phi-duoi-1tr"><img width="25px"
                                    class="me-2 active" src="https://i.imgur.com/5OtiwkV.png">
                                CODE CÓ PHÍ DƯỚI 1TR </a>
                        </li>
                        <li>
                            <a href="https://414jgaming.com/source/co-phi-tren-1-trieu"><img width="25px"
                                    class="me-2 active" src="https://i.imgur.com/5OtiwkV.png">
                                CÓ PHÍ TRÊN 1 TRIỆU </a>
                        </li>
                        <li>
                            <a href="https://414jgaming.com/source/tool-amp-web"><img width="25px" class="me-2 active"
                                    src="https://i.imgur.com/5OtiwkV.png">
                                Tool &amp; Web </a>
                        </li>
                        <li>
                            <a href="https://414jgaming.com/source/game-china"><img width="25px" class="me-2 active"
                                    src="https://i.imgur.com/5OtiwkV.png">
                                Game China </a>
                        </li>

                    </ul>
                </li>



                <li><a class="nav-link dropdown-link" href="#"><i class="fa-solid fa-clock-rotate-left"></i>Lịch sử</a>
                    <ul class="dropdown-list">
                        <li><a href="https://414jgaming.com/client/history-code">Quản lý mã nguồn</a>
                        </li>

                    </ul>
                </li>

                <li><a class="nav-link" href="?out"><i class="fa-solid fa-right-from-bracket"></i>Đăng
                        Xuất</a></li>
            </ul>
            <div class="nav-info-group">
                <div class="nav-info"><i class="fa-solid fa-phone"></i>
                    <p><span>0000000000</span></p>
                </div>
                <div class="nav-info"><i class="fa-solid fa-envelope"></i>
                    <p><span>tuan01107@gmail.com</span></p>
                </div>
            </div>
        </div>
    </aside>
    <div class="mobile-menu">
        <a href="/" title="Trang chủ" class=""><i class="fas fa-home"></i><span>Trang
                chủ</span></a>
        <button class="cate-btn" title="Sản phẩm"><i class="fas fa-list"></i><span>Sản phẩm</span></button>
        <button class="cart-btn " title="Nạp tiền"><i class="fa-solid fa-building-columns"></i><span>Nạp
                tiền</span></button>
        <a href="https://414jgaming.com/client/history-code" class="" title="Đơn hàng"><i
                class="fa-solid fa-cart-shopping"></i><span>Đơn
                hàng</span></a>
        <a href="?modules=auth&action=profile" title="Profile" class=""><i class="fa-solid fa-user"></i><span>Thông
                tin</span></a>
    </div>
    <style>
    .product-head-box4 h4 {
        width: initial;
        /* hoặc unset; */
        padding: initial;
        /* hoặc unset; */
    }

    .truncate-text {
        display: inline-block;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    </style>

    <style>
    .image-container {
        position: relative;
        display: inline-block;
    }

    .center-cropped-image {
        border-radius: 8px;
        border: 1px dotted #6c757d;
        /* Viền ban đầu màu xám nhạt, dạng vết chấm */
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        /* Hiệu ứng chuyển đổi box-shadow và transform */

        /* Không có hiệu ứng shadow khi không hover */
        box-shadow: none;
    }

    .center-cropped-image:hover {
        box-shadow: 0 0 10px 10px rgba(0, 0, 0, 0.2);
        /* Màu khi hover */
        transform: scale(1.05);
        /* Phóng to hình ảnh khi hover */
    }

    .badge-code {
        position: absolute;
        top: 5px;
        /* Khoảng cách từ trên xuống */
        right: 5px;
        /* Khoảng cách từ phải sang */
        background-color: rgba(0, 0, 0, 0.5);
        /* Màu nền của badge-code */
        color: #fff;
        /* Màu chữ của badge-code */
        padding: 3px 4px;
        /* Kích thước badge-code */
        border-radius: 50%;
        /* Bo góc của badge-code để tạo hình tròn */
        font-size: 12px;
        /* Kích thước chữ */
    }
    </style>