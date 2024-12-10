<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}
$data = [
    "title"=> "VTGaming - Kho Source"
];
home("head", $data);
?>
<section class="section feature-part">
    <div class="container">
        <div class="mb-5">

        </div>
        <div class="row mb-5">
            <div class="col-md-12">

                <div class="account-card pt-3">
                    <p style="text-align:center"><span style="color:#16a085"><span
                                style="font-size:16px"><strong>&diams;VTGaming&diams;️</strong></span></span>
                    </p>

                    <p style="text-align:center"><strong><span style="color:#ff0000">WEBSITE CHUY&Ecirc;N CUNG CẤP
                                GAME FREE V&Agrave;&nbsp;GI&Aacute; RẺ UY T&Iacute;N CHẤT LƯỢNG</span></strong></p>

                    <p style="text-align:center"><span style="color:#8e44ad"><strong><img alt="yes"
                                    src="https://414jgaming.com/public/admin/template/ckeditor/plugins/smiley/images/thumbs_up.png"
                                    style="height:23px; width:23px" title="yes" />HỌC L&Agrave;M
                                GAME:&nbsp;https://zalo.me/g/vdpfln805</strong></span></p>

                    <p style="text-align:center"><span style="color:#f1c40f"><strong><img alt="devil"
                                    src="https://414jgaming.com/public/admin/template/ckeditor/plugins/smiley/images/devil_smile.png"
                                    style="height:23px; width:23px" title="devil" />ĐỘNG GAME
                                FREE:&nbsp;</strong><strong>https://zalo.me/g/vdpfln805</strong></span></p>

                    <p style="text-align:center"><span style="color:#e67e22"><u><strong>AE BẤM V&Agrave;O &quot;MENU
                                    GAME&quot; RỒI CHỌN CODE FREE HOẶC CODE C&Oacute; PH&Iacute; ĐỂ&nbsp;XEM FULL
                                    HẾT C&Aacute;C GAME NH&Eacute;!!</strong></u></span></p>

                    <p style="text-align:center"><span style="color:#16a085"><u><strong>Đăng K&yacute; Hội
                                    Vi&ecirc;n Vip IB m&igrave;nh nh&eacute;,Vip Th&aacute;ng Hoặc Vip Vĩnh
                                    Viễn</strong></u></span></p>

                    <ul>
                    </ul>
                </div>

            </div>

            <div class="col-xl-9">
                <div class="row">
                    <div class="col-lg-12 mb-5" id="category14">
                        <div class="home-heading mb-3">
                            <h3>
                                <img src="https://i.imgur.com/5OtiwkV.png">
                                Tổng Hợp Game (Bấm Vào Menu Game Để Xem Nhiều Hơn)
                            </h3>
                        </div>

                        <!--ROW 1-->
                        <div class="row">
                            <?php
$whereClauses = [];
$params = [];

// Kiểm tra 'search' trong POST
if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $whereClauses[] = "name LIKE :search";
    $params[':search'] = '%' . $search . '%';
}


// Xây dựng câu truy vấn với các điều kiện WHERE nếu có
$whereClause = '';
if (!empty($whereClauses)) {
    $whereClause = "WHERE " . implode(" AND ", $whereClauses);
}

// Câu truy vấn
$sql = "SELECT * FROM source $whereClause ORDER BY id DESC";

// Thực hiện truy vấn để tính số lượng sản phẩm
$stmt = $conn->prepare($sql);
$stmt->execute($params);

// Tính số sản phẩm trên mỗi trang và số lượng sản phẩm
$per_page = 12;
$total_rows = $stmt->rowCount();
$total_pages = ceil($total_rows / $per_page);

// Xác định trang hiện tại (mặc định là trang đầu tiên nếu chưa có tham số trang)
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Xác định vị trí bắt đầu lấy sản phẩm từ câu truy vấn
$start = ($current_page - 1) * $per_page;

// Thực hiện truy vấn với giới hạn số lượng sản phẩm trên mỗi trang
$sql .= " LIMIT $start, $per_page";
$stmt = $conn->prepare($sql);
$stmt->execute($params);

// Lấy dữ liệu
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kiểm tra xem có dữ liệu hay không
if (count($products) > 0) {
    foreach ($products as $row) {
        ?>
                            <div class="prod-item col-sm-6 col-md-4 col-xl-4 mb-3" data-title="">
                                <div class="product-box4 ">
                                    <div class="product-head-box4">
                                        <h4 class="truncate-text">
                                            <?= htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></h4>
                                    </div>
                                    <div class="product-body-box4">

                                        <div class="image-container">
                                            <img src="<?= htmlspecialchars($row['avatar'], ENT_QUOTES, 'UTF-8'); ?>"
                                                class="center-cropped-image"
                                                style="width: 100%; height: 100%; object-fit: cover;" />
                                            <span
                                                class="badge-code">#<?= htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8'); ?></span>
                                        </div>

                                    </div>
                                    <div class="product-buttons-box4">
                                        <div class="row">
                                            <div class="col">
                                                <a type="button" href=""
                                                    class="btn-more"><span><?= htmlspecialchars(number_format($row['gia'], 0, ',', '.'), ENT_QUOTES, 'UTF-8'); ?>
                                                        đ</span></a>
                                            </div>
                                            <div class="col">
                                                <button onclick="redirectToDetailPage(<?php echo $row['id']; ?>)"
                                                    class="btn-buy">Mua
                                                    Ngay</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
    }
} else {
    echo "Không có sản phẩm nào.";
}
if ($total_pages > 1) {
    ?>
                            <div class="pagination">
                                <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            // Tạo các link phân trang với các tham số GET hiện tại
            $url = '?page=' . $i;
            foreach ($_GET as $key => $value) {
                if ($key != 'page') {
                    $url .= '&' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '=' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                }
            }
            ?>
                                <a href="<?= htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>"
                                    class="<?= ($current_page == $i) ? 'active' : ''; ?>"><?= $i; ?></a>
                                <?php
        }
        ?>
                            </div>
                            <?php
}
?>


                        </div>

                        <style>
                        /* Hiệu ứng khi ô được chọn */
                        .ant-pagination li a.active,
                        .ant-pagination li a:hover,
                        .ant-pagination li a:focus {
                            background-color: #1890ff;
                            /* Màu nền khi hover hoặc focus */
                            color: #fff;
                            /* Màu chữ khi hover hoặc focus */
                        }

                        .bg-slate-100 {
                            --tw-bg-opacity: 1;
                            background-color: #b1b1b1;
                        }

                        .ant-pagination a {
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            width: 24px;
                            height: 24px;
                            background-color: #0d6efd;
                            color: #ffffff;
                            border-radius: 999px;
                            text-decoration: none;
                            transition: all 0.3s ease;
                        }
                        </style>

                        <!--<center>-->
                        <!--    <ul class="list-none ant-pagination ant-pagination-mini ant-table-pagination ant-table-pagination-right css-eq3tly">-->
                        <!--        <li class="inline-block">-->
                        <!--            <a href="?page=1" class="flex items-center justify-center w-6 h-6 bg-slate-100 dark:bg-slate-700 dark:hover:bg-black-500 text-slate-800 dark:text-white rounded mx-[3px] sm:mx-1 hover:bg-black-500 hover:text-white text-sm font-Inter font-medium transition-all duration-300 relative">1</a>-->
                        <!--        </li>-->

                        <!--    </ul>-->
                        <!--</center>-->


                        <script>
                        function redirectToDetailPage(productId) {
                            var url = '?modules=sanpham&action=viewcode&id=' + productId;
                            window.location.href = url;
                        }
                        </script>

                    </div>



                </div>
            </div>
            <div class="col-xl-3">
                <?php if(isset($_SESSION['user'])){?>
                <div class="account-card card-wallet-home py-4">
                    <div class="my-wallet">
                        <p>Xin chào</p>
                        <h5><?php echo $_user; ?></h5>
                    </div>
                    <div class="wallet-card-group">
                        <div class="wallet-card">
                            <p>Số dư hiện tại</p>
                            <h3><?= htmlspecialchars(number_format($_vnd, 0, ',', '.'), ENT_QUOTES, 'UTF-8'); ?>
                                đ</h3>
                        </div>
                        <div class="wallet-card">
                            <p>Tổng tiền nạp</p>
                            <h3><?= htmlspecialchars(number_format($_tongnap, 0, ',', '.'), ENT_QUOTES, 'UTF-8'); ?>
                                đ</h3>
                        </div>
                        <div class="wallet-card">
                            <p>Cấp Bậc</p>
                            <h3><?php if($_capbac == 0){ echo 'Member'; }else{ echo 'Cán bộ'; } ?></h3>
                        </div>
                    </div>
                </div>
                <?php }else {?>
                <div class="account-card card-wallet-home py-4">
                    <ul class="user-form-social">
                        <li>
                            <a href="?modules=auth&action=login" class="facebook">
                                <i class="fa-solid fa-right-to-bracket"></i> ĐĂNG NHẬP
                            </a>
                        </li>
                        <li>
                            <a href="?modules=auth&action=register" class="google">
                                <i class="fa-solid fa-user-plus"></i> ĐĂNG KÝ TÀI KHOẢN
                            </a>
                        </li>
                    </ul>
                </div>
                <?php } ?>
            </div>



            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="home-heading mb-3">
                        <h3><i class="fa-solid fa-cart-shopping m-2"></i> MUA MÃ NGUỒN GẦN ĐÂY</h3>
                    </div>
                    <div style="height:350px;overflow-x:hidden;overflow-y:auto;">
                        <?php 
// Câu truy vấn
$sql = "SELECT * FROM lichsudonhang ORDER BY id DESC LIMIT 20";

// Thực hiện truy vấn để tính số lượng sản phẩm
$stmt = $conn->prepare($sql);
$stmt->execute();
// Lấy dữ liệu
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kiểm tra xem có dữ liệu hay không
if (count($products) > 0) {
    foreach ($products as $row) {
        ?>
                        <div class="feature-card">
                            <div class="feature-content">
                                <div class="row">
                                    <div class="col-10 col-md-10">
                                        <b style="color: green;"><?php echo $row['email']; ?></b> mua thành công <b
                                            style="color: red;">MÃ
                                            NGUỒN</b> <b><?php echo $row['name']; ?></b> với giá <b
                                            style="color:blue;"><?php echo $row['gia']; ?>VNĐ</b>
                                    </div>
                                    <div class="col-2 col-md-2">
                                        <span
                                            class="badge bg-primary"><strong><?php echo $row['time_mua']; ?></strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } }?>
                    </div>
                </div>

                <div class="col-lg-6 mb-3">
                    <div class="home-heading mb-3">
                        <h3><i class="fa-solid fa-credit-card m-2"></i> NẠP TIỀN GẦN ĐÂY </h3>
                    </div>
                    <div style="height:350px;overflow-x:hidden;overflow-y:auto;">
                        <div class="feature-card">
                            <div class="feature-content">
                                <div class="row">
                                    <div class="col-9 col-md-10">
                                        <b style="color: green;">******rter</b> thực hiện nạp <b
                                            style="color:blue;">10.000đ</b> bằng NGÂN HÀNG <b style="color:red;">MBBANK
                                        </b> thực nhận <b style="color:blue;">10.000đ</b>
                                    </div>
                                    <div class="col-3 col-md-2">
                                        <span class="badge bg-primary"><strong>183 ngày trước</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="feature-card">
                            <div class="feature-content">
                                <div class="row">
                                    <div class="col-9 col-md-10">
                                        <b style="color: green;">******rter</b> thực hiện nạp <b
                                            style="color:blue;">10.000đ</b> bằng NGÂN HÀNG <b style="color:red;">
                                        </b> thực nhận <b style="color:blue;">10.000đ</b>
                                    </div>
                                    <div class="col-3 col-md-2">
                                        <span class="badge bg-primary"><strong>Đang xử lý</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<div class="modal fade" id="modal_notification" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel1"><i class="fa-solid fa-bell"></i> Thông Báo</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="text-align:center"><span style="color:#16a085"><span
                            style="font-size:16px"><strong>&diams;️VT Gaming&diams;️</strong></span></span></p>

                <p style="text-align:center"><strong><span style="color:#ff0000">WEBSITE CHUY&Ecirc;N CUNG CẤP GAME
                            FREE V&Agrave;&nbsp;GI&Aacute; RẺ UY T&Iacute;N CHẤT LƯỢNG</span></strong></p>

                <p style="text-align:center"><span style="color:#8e44ad"><strong><img alt="yes"
                                src="https://414jgaming.com/public/admin/template/ckeditor/plugins/smiley/images/thumbs_up.png"
                                style="height:23px; width:23px" title="yes" />HỌC L&Agrave;M
                            GAME:&nbsp;https://zalo.me/g/vdpfln805</strong></span></p>

                <p style="text-align:center"><span style="color:#f1c40f"><strong><img alt="devil"
                                src="https://414jgaming.com/public/admin/template/ckeditor/plugins/smiley/images/devil_smile.png"
                                style="height:23px; width:23px" title="devil" />ĐỘNG GAME
                            FREE:&nbsp;</strong><strong>https://zalo.me/g/vdpfln805</strong></span></p>

                <p style="text-align:center"><span style="color:#e67e22"><u><strong>AE BẤM V&Agrave;O &quot;MENU
                                GAME&quot; RỒI CHỌN CODE FREE HOẶC CODE C&Oacute; PH&Iacute; ĐỂ&nbsp;XEM FULL HẾT
                                C&Aacute;C GAME NH&Eacute;!!</strong></u></span></p>

                <p style="text-align:center"><span style="color:#16a085"><u><strong>Đăng K&yacute; Hội Vi&ecirc;n
                                Vip IB m&igrave;nh nh&eacute;,Vip Th&aacute;ng Hoặc Vip Vĩnh
                                Viễn</strong></u></span></p>

                <ul>
                </ul>
                <ul>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="dontShowAgainBtn">Không hiển thị lại trong 2
                    giờ</button>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById('modal_notification');
    var dontShowAgainBtn = document.getElementById('dontShowAgainBtn');
    var modalClosedTime = localStorage.getItem('modalClosedTime');

    // Nếu modalClosedTime chưa được lưu hoặc đã quá 2 giờ, hiển thị modal
    if (!modalClosedTime || (Date.now() - parseInt(modalClosedTime) > 2 * 60 * 60 * 1000)) {
        var bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();
    }

    // Lưu thời gian khi modal được đóng khi người dùng click vào nút "Không hiển thị lại" và ẩn modal
    dontShowAgainBtn.addEventListener('click', function() {
        localStorage.setItem('modalClosedTime', Date.now());
        var bootstrapModal = bootstrap.Modal.getInstance(modal);
        bootstrapModal.hide();
    });
});
</script>



<div class="modal fade" id="openModal" tabindex="-1" aria-labelledby="modal-block-popout" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
        <div class="modal-content">
            <div id="modalContent"></div>
        </div>
    </div>
</div>

<script>
function openModal(token, id) {
    $("#modalContent").html('');
    var originalButtonContent = $('#openModal_' + id).html();
    $('#openModal_' + id).html('<span><i class="fa fa-spinner fa-spin"></i> Processing...</span>')
        .prop('disabled',
            true);
    $.ajax({
        url: "ajaxs/client/modal/view-product.php",
        method: "GET",
        data: {
            id: id,
            token: token
        },
        success: function(data) {
            $("#modalContent").html(data);
            $('#openModal').modal('show');
            $('#openModal_' + id).html(originalButtonContent).prop('disabled', false);
        },
        error: function() {
            Swal.fire('Thất bại!', data, 'error');
        }
    });
}
</script>



<script>
// JavaScript để ẩn/hiện menu khi click vào nút
const toggleMenuButton = document.getElementById('toggle-menu-button');
const topMenu = document.getElementById('top-menu');
toggleMenuButton.addEventListener('click', function() {
    topMenu.classList.toggle('hidden');
});
</script>

<?php
home("foot");
?>