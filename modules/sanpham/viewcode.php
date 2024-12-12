<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}
$data = [
    "title"=> "Sản phẩm"
];
home("head", $data);
if($_GET['id']){
    $id = $_GET['id'];
    $view_code = _fetch("SELECT * FROM source WHERE id = ?", [$id]);
    if(empty($view_code['id'])){
        die('Mã nguồn không tồn tại!');
    }
}else{
    die('Truy cập không hợp lệ!');
}
?>

<style>
.details-list-title-share {
    font-weight: 500;
    margin-right: 10px;
    color: var(--heading);
    text-transform: capitalize;
}

.no-input {
    border: none;
    background-color: #4CAF50 !important;
    /* Sử dụng !important để ghi đè lên bất kỳ quy tắc CSS nào khác */
    color: white;
    cursor: pointer;
    text-align: center;
    padding: 10px 15px;
    border-radius: 5px;
}

.no-input::placeholder {
    color: rgba(255, 255, 255, 0.7);
    /* Màu của placeholder */
    font-weight: bold;
    /* In đậm */
    font-size: 1.1em;
    /* Kích thước to hơn */
}
</style>


<div style="margin-bottom:40px;"></div>
<section class="inner-section" style="margin-bottom:40px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4" id="col1" style="margin-bottom:20px;">
                <div>
                    <div class="image-container mb-2">
                        <div class="feature-card">
                            <img src="<?php echo $view_code['avatar']; ?>" class="center-cropped-image"
                                style="width: 100%; height: 100%; object-fit: cover;" />
                        </div>
                    </div>
                    <center>
                        <ul class="footer-social">
                            <label class="details-list-title-share">Share:</label>
                            <li><a href="#" onclick="shareOnMessenger(); return false;"><i
                                        class="fa-brands fa-facebook-messenger"></i></a></li>
                            <li><a href="#" onclick="shareOnFacebook(); return false;"><i
                                        class="fa-brands fa-facebook"></i></a></li>
                            <li><a href="#" onclick="shareOnTwitter(); return false;"><i
                                        class="fa-brands fa-square-x-twitter"></i></a></li>
                            <li><a href="#" onclick="shareOnLinkedIn(); return false;"><i
                                        class="fa-brands fa-linkedin"></i></a></li>
                            <li><a href="#" onclick="shareOnInstagram(); return false;"><i
                                        class="fa-brands fa-instagram"></i></a></li>
                        </ul>

                        <script>
                        function shareOnMessenger() {
                            var url = encodeURIComponent(window.location.href);
                            window.open('fb-messenger://share/?link=' + url, '_blank');
                        }

                        function shareOnFacebook() {
                            var url = encodeURIComponent(window.location.href);
                            window.open('https://www.facebook.com/sharer/sharer.php?u=' + url, '_blank');
                        }

                        function shareOnTwitter() {
                            var url = encodeURIComponent(window.location.href);
                            window.open('https://twitter.com/intent/tweet?url=' + url, '_blank');
                        }

                        function shareOnLinkedIn() {
                            var url = encodeURIComponent(window.location.href);
                            window.open('https://www.linkedin.com/sharing/share-offsite/?url=' + url, '_blank');
                        }

                        function shareOnInstagram() {
                            var url = encodeURIComponent(window.location.href);
                            window.open('https://www.instagram.com/?url=' + url, '_blank');
                        }
                        </script>

                    </center>
                </div>
            </div>

            <div class="col-lg-8" id="col2">
                <div class="account-card p-3">
                    <div class="details-content">
                        <h3 class="details-name pb-2"><?php echo $view_code['name']; ?></h3>

                        <div class="row">

                            <div class="col-lg-4">
                                <label class="form-label">Mã Số</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="#<?php echo $view_code['id']; ?>"
                                        readonly>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <label class="form-label">Ngày Đăng</label>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="<?php echo $view_code['ngay_dang']; ?>" readonly>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <label class="form-label">Giá Tiền</label>
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        value="<?= htmlspecialchars(number_format($view_code['gia'], 0, ',', '.'), ENT_QUOTES, 'UTF-8'); ?> đ"
                                        readonly>
                                </div>
                            </div>

                            <label class="form-label">Thao Tác</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Nhập voucher (nếu có)" id="coupon"
                                    onchange="totalPayment()" onkeyup="totalPayment()">
                                <button class="btn btn-success btn-sm copy" id="total">
                                    <?= htmlspecialchars(number_format($view_code['gia'], 0, ',', '.'), ENT_QUOTES, 'UTF-8'); ?>VND
                                </button>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <button onclick="PaymentVps(<?php echo $view_code['id']; ?>)" class="btn-buy mb-2"><i
                                        class="fa-solid fa-cart-shopping"></i> MUA NGAY</button>
                            </div>
                            <div class="col-lg-6">
                                <a class="btn-more" href="https://youtu.be/sYqjs8TKkOE"
                                    type="button">
                                    <span>XEM DEMO</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="inner-section">
    <div class="container">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <style>
                    .tab-link {
                        font-size: 22px;
                    }

                    .nav-tabs li {
                        padding: -3px 30px;
                    }

                    .nav-tabs li .active {
                        padding: 2px 30px;
                        border: 1px solid #ccc;
                    }
                    </style>
                    <ul class="nav nav-tabs">
                        <li><a href="#tab-10" class="tab-link active" data-bs-toggle="tab">Chi Tiết</a></li>
                        <li><a href="#tab-14" class="tab-link" data-bs-toggle="tab">Ảnh Demo</a></li>
                        <li><a href="#tab-15" class="tab-link" data-bs-toggle="tab">Đánh Giá</a></li>
                    </ul>
                </div>
            </div>

            <div class="tab-pane fade active show" id="tab-10">
                <div class="account-card">
                    <div class="pt-2">
                        <pre><?php echo $view_code['chi_tiet']; ?>
                       </pre>


                        <p><span style="color:#27ae60"><strong>Mọi thắc mắc liên hệ
                                    Zalo:&nbsp;https://zalo.me/g/123</strong></span></p>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-14">
                <div class="account-card pt-3">
                    <div class="image-container mb-2">
                        <?php echo $view_code['img']; ?>
                    </div>

                </div>
            </div>

            <div class="tab-pane fade" id="tab-15">
                <div class="account-card">

                </div>
            </div>
        </div>

    </div>
</section>
<script>
function showModal() {
    $('#exampleModal').modal('show');
}

function PaymentVps(id) {

    Swal.fire({
        title: 'Xác Nhận Thanh Toán!',
        text: "Bạn có chắc chắn muốn mua loại này không!",
        icon: 'warning',
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Đồng ý',
        cancelButtonText: "Không",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Đang xử lý',
                text: 'Vui lòng đợi trong giây lát',
                imageUrl: 'https://414jgaming.com/assets/img/loading.gif',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
            });

            // Gửi dữ liệu tới buycode.php
            $.post('/modules/sanpham/buycode.php', {
                action: 'buy', // Thao tác mua
                id: id,
                coupon: $("#coupon").val(),
                note: $("#note").val(),
            }, function(data) {
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: data.msg,
                    });
                    setTimeout(() => {
                        location.href = '?modules=sanpham&action=product';
                    }, 2000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Có lỗi',
                        text: data.msg,
                    });
                }
            }, 'json');
        }
    });
}

function totalPayment() {
    $('#total').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...');

    // Gửi yêu cầu tính tổng chi phí tới buycode.php
    $.post('/modules/sanpham/buycode.php', {
        action: 'calculate', // Thao tác tính tổng chi phí
        id: 232,
        coupon: $("#coupon").val(),
    }, function(data) {
        if (data.status === 'success') {
            $("#total").html(data.total + " VNĐ");
        } else {
            cuteToast({
                type: "error",
                message: data.msg || 'Không thể tính kết quả thanh toán',
                timer: 5000,
            });
        }
    }, 'json');
}
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