<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}
$data = [
    "title"=> "Vietcod - Thông tin tài khoản admin"
];
if(empty($_user)){
    loadPage('?modules=auth&action=login');
}
home("head", $data);
$check = oneRow("SELECT * FROM account WHERE id = '$_id' ");
$ms = getFlashdata('tb');
$ms_type = getFlashdata('tb_type');
?>
<section class="py-5 inner-section profile-part">
    <div class="container">
        <div class="row content-reverse">
            <div class="col-lg-3">

                <a class="sidebar_profile " href="?modules=auth&action=change">
                    <h6><i class="fa fa-key"></i> <span>Thay đổi mật khẩu</span></h6>
                </a>
                <?php if(isset($_admin) && $_admin == 1){?>
                <a class="sidebar_profile " href="?modules=admin&action=listuser">
                    <h6><i class="fa-solid fa-wallet"></i> <span>Trang admin</span></h6>
                </a>
                <?php } ?>
                <a class="sidebar_profile" onclick="logout()" href="#">
                    <h6><i class="fa-solid fa-right-from-bracket"></i> <span>Đăng Xuất</span></h6>
                </a>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script type="text/javascript">
                function logout() {
                    Swal.fire({
                        title: 'Bạn có chắc không?',
                        text: "Bạn sẽ bị đăng xuất khỏi tài khoản khi nhấn Đồng Ý",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Huỷ bỏ'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "?out";
                        }
                    })
                }
                </script>
            </div>
            <div class="col-lg-9">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="account-card">
                            <h4 class="account-title">Ví của tôi</h4>
                            <div class="my-wallet">
                                <div class="wallet-card-group">
                                    <div class="wallet-card">
                                        <p>Số dư</p>
                                        <h3><?php echo $check['vnd']; ?>đ</h3>
                                    </div>
                                    <div class="wallet-card">
                                        <p>Tổng tiền nạp</p>
                                        <h3><?php echo $check['tongnap']; ?>đ</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>Hồ sơ của bạn</h4>

                                </div>
                                <div class="account-content">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label">Địa chỉ Email</label>
                                                <input type="email" class="form-control"
                                                    value="<?php echo $check['email']; ?>" readonly="">
                                            </div>
                                        </div>



                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group"><label class="form-label">Ngày tham gia</label>
                                                <input type="text" class="form-control"
                                                    value="<?php echo $check['create_time']; ?>" readonly="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php
home("foot");
?>