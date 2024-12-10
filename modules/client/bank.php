<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}
$data = [
    "title"=> "Vietcod - kho source"
];
home("head", $data);
if(empty($_user)){
    loadPage('?modules=auth&action=login');
}
$noidung = 'NAP'.$_id;
$bank = 'BIDVBANK';
$stk = '1170191092';
$tentk = 'NGUYEN VAN TUAN';
$sotien = 0;
?>
<section class="py-5 inner-section profile-part">
    <div class="container">

        <!--ROW 1-->
        <div class="row">
            <div class="col-lg-4">
                <div class="tab-pane fade active show" id="tab-10">
                    <div class="account-card">
                        <center class="py-3">
                            <img src="https://api.vietqr.io/<?php echo $bank;?>/<?php echo $stk;?>/<?php echo $sotien;?>/<?php echo $noidung;?>/vietqr_net_2.jpg?accountName=<?php echo $tentk;?>"
                                width="300px">
                        </center>
                        <ul class="list-group">
                            <li class="list-group-item">Ngân hàng:<b> <?php echo $bank;?></b>
                            </li>
                            <li class="list-group-item">Số tài khoản: <b style="color: green;"><?php echo $stk;?></b>
                                <button type="button" class="copy-button btn-sm copy-value"
                                    data-value="<?php echo $stk;?>"><i class="fas fa-copy"></i></button>
                            </li>
                            <li class="list-group-item" style="font-size:17px;">Nội dung chuyển khoản: <b
                                    style="color: red;"><?php echo $noidung;?></b>
                                <button type="button" class="copy-button btn-sm copy-value"
                                    data-value="<?php echo $noidung;?>"><i class="fas fa-copy"></i></button>
                            </li>
                            <li class="list-group-item">Chủ tài khoản:<b> <?php echo $tentk;?></b>
                            </li>
                        </ul>
                        <center><small>Nhập đúng nội dung chuyển khoản để hệ thống cộng tiền tự động...</small></center>
                    </div>
                </div>
            </div>

        </div>

        <!--ROW 2-->
        <div class="row">
            <div class="col-lg-12">
                <div class="home-heading mb-3">
                    <h3><i class="fa-solid fa-clock-rotate-left m-2"></i> LỊCH SỬ NẠP TIỀN</h3>
                </div>

                <div class="account-card pt-3">

                    <form action="" method="GET">
                        <input type="hidden" name="action" value="product-orders">
                        <div class="row">
                            <div class="col-lg col-md-4 col-6">
                                <!-- Ô nhập từ khóa tìm kiếm -->
                                <input class="form-control mb-2" type="text" id="searchInput"
                                    placeholder="Tìm kiếm theo tên...">
                            </div>
                            <div class="col-lg col-md-4 col-6">
                                <!-- Nút tìm kiếm -->
                                <button class="shop-widget-btn mb-2" type="button" onclick="searchByName()"><i
                                        class="fas fa-search"></i><span>Tìm kiếm</span></button>
                            </div>
                            <div class="col-lg col-md-4 col-6">
                                <!-- Nút reset tìm kiếm -->
                                <button class="shop-widget-btn mb-2" type="button" onclick="resetSearch()"><i
                                        class="far fa-trash-alt"></i><span>Đặt lại</span></button>
                            </div>
                        </div>

                        <div class="top-filter">
                            <div class="filter-show">
                                <label class="filter-label">Show :</label>
                                <!-- Thêm id cho dropdown "Show" -->
                                <select id="limitSelect" name="limit" onchange="showRows(this.value)"
                                    class="form-select filter-select">
                                    <option value="5">5</option>
                                    <option value="10" selected="">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                </select>
                            </div>
                            <div class="filter-short">
                                <label class="filter-label">Short by Date:</label>
                                <select name="shortByDate" onchange="this.form.submit()"
                                    class="form-select filter-select">
                                    <option value="">Tất cả</option>
                                    <option value="1">Hôm nay</option>
                                    <option value="2">Tuần này</option>
                                    <option value="3">Tháng này</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="table-scroll table-wrapper">
                        <table class="table fs-sm text-nowrap table-hover  mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Mã Giao Dịch</th>
                                    <th class="text-center">Nội Dung</th>
                                    <th class="text-center">Cổng Nạp</th>
                                    <th class="text-center">Tiền Nạp</th>
                                    <th class="text-center">Thời Gian</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <button type="button" id="btn_delete" class="btn btn-danger btn-sm"
                                            data-toggle="tooltip" data-placement="bottom" title=""
                                            data-bs-original-title="Xóa đơn hàng đã chọn khỏi lịch sử của bạn">
                                            <i class="fa-solid fa-trash"></i> Xóa đơn hàng
                                        </button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="bottom-paginate">
                        <p class="page-info">Showing 1 of 1 Results</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php
home("foot");
?>