<?php
if ( ! defined("_STATUS") ) {
    echo "Truy cập không hợp lệ...";
    die();
}
require_once(_WEBDIR."/index.php");

$title = !empty($data['title']) ? $data['title'] : 'Vietcod - Admin';
?>
<!DOCTYPE html>
<html lang="vi">
<header class="p-3 mb-3 border-bottom">
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" sizes="57x57" href=<?php _WEBDIR ?>"/templates/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href=<?php _WEBDIR ?>"/templates/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href=<?php _WEBDIR ?>"/templates/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href=<?php _WEBDIR ?>"/templates/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href=<?php _WEBDIR ?>"/templates/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href=<?php _WEBDIR ?>"/templates/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href=<?php _WEBDIR ?>"/templates/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href=<?php _WEBDIR ?>"/templates/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href=<?php _WEBDIR ?>"/templates/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href=<?php _WEBDIR ?>"/templates/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href=<?php _WEBDIR ?>"/templates/img/favicon/aavicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href=<?php _WEBDIR ?>"/templates/img/favicon/aavicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href=<?php _WEBDIR ?>"/templates/img/favicon/aavicon-16x16.png">
    <link rel="manifest" href="<?php _WEBDIR ?>" /templates/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php _WEBDIR ?>" /templates/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php _WEBDIR?>"/templates/css/bootstrap.min.css">
    <link rel="stylesheet" href=<?php _WEBDIR?>"/templates/css/style.css">
    <title><?php echo htmlspecialchars($title); ?></title>

    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="?modules=home&action=home" class="nav-link px-2 link-body-emphasis">Trang chủ</a></li>
                <li><a href="?modules=admin&action=listuser" class="nav-link px-2 link-body-emphasis">List User</a></li>
                <li><a href="?modules=admin&action=listsource" class="nav-link px-2 link-body-emphasis">List Source</a>
                </li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>


            <?php
    if(!empty($_SESSION['admin'])){
        ?>



            <div class="dropdown text-end">
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small">

                    <li><a class="dropdown-item" href="?out_ad">Sign out</a></li>
                </ul>
            </div>


            <?php }else{ ?>
            <a style="color:black;" href="http://localhost/?modules=admin&action=login"><i
                    class="bi bi-box-arrow-in-right"></i>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                    <path fill-rule="evenodd"
                        d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                </svg>
            </a>
            <?php } ?>
        </div>
    </div>
</header>