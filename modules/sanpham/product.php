<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}
$data = [
    "title"=> "Sản phẩm"
];
home("head", $data);
?>
<div style="margin-bottom:40px;"></div>
<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="home-heading mb-3">
                    <h3><i class="fa-solid fa-cart-shopping m-2"></i> LỊCH SỬ ĐƠN HÀNG </h3>
                </div>
                <div class="account-card pt-3">
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="product-orders">
                        <div class="row">

                            <div class="col-lg col-md-4 col-6">
                                <!-- Ô nhập từ khóa tìm kiếm -->
                                <input class="form-control mb-2" type="text" id="searchInput" name="search" value="<?php if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    echo $search;
}?>" placeholder="Nhập từ khóa tìm kiếm...">
                            </div>
                            <div class="col-lg col-md-4 col-6">
                                <!-- Nút tìm kiếm -->
                                <button class="shop-widget-btn mb-2" type="submit"><i
                                        class="fas fa-search"></i><span>Tìm kiếm</span></button>
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
                                <select name="search" onchange="this.form.submit()" class="form-select filter-select">
                                    <option value="">Tất cả</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="table-scroll table-wrapper">
                        <form action="" method="POST">
                            <table class="table fs-sm text-nowrap table-hover  mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <input type="checkbox" class="form-check-input" name="check_all"
                                                id="check_all_checkbox" value="option1">
                                        </th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Thao tác</th>
                                        <th class="text-center">Mã Nguồn</th>
                                        <th class="text-center">Giá Tiền</th>
                                        <th class="text-center">Thời Gian Mua</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_POST['delete_selected']) && isset($_POST['delete_ids'])) {
                                        $delete_ids = $_POST['delete_ids'];  // Mảng chứa các ID của các đơn hàng cần xóa
                                    
                                        // Chuyển mảng $delete_ids thành một chuỗi các ID để dùng trong câu lệnh SQL
                                        $delete_ids_str = implode(",", array_map('intval', $delete_ids));
                                    
                                        // Câu lệnh SQL để xóa các đơn hàng
                                        $delete_sql = "DELETE FROM lichsudonhang WHERE id IN ($delete_ids_str)";
                                        $stmt = $conn->prepare($delete_sql);
                                        
                                        // Thực thi câu lệnh SQL
                                        if ($stmt->execute()) {
                                            echo "Đã xóa các đơn hàng đã chọn.";
                                           
                                        } else {
                                            echo "Có lỗi khi xóa các đơn hàng.";
                                        }
                                    }
// Điều kiện mặc định cho $whereClause
$whereClauses = ["email LIKE '$_user'"];
$params = [];
// Kiểm tra 'search' trong POST
if (isset($_POST['search']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $whereClauses[] = "name LIKE :search";
    $params[':search'] = '%' . $search . '%';
}

// Xây dựng câu lệnh WHERE
$whereClause = implode(' AND ', $whereClauses);

// Xây dựng câu lệnh SQL
$sql = "SELECT * FROM lichsudonhang WHERE $whereClause ORDER BY id DESC";

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
    foreach ($products as $row) { ?>
                                    <tr style="vertical-align: middle;">

                                        <td class="text-center">
                                            <input type="checkbox" name="delete_ids[]" class="form-check-input checkbox"
                                                data-id="" value="<?php echo $row['id']; ?>">
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-primary"><?php echo $row['id']; ?></span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm"
                                                onclick="window.location.href  = '<?php echo $row['link']; ?>'"><i
                                                    class="fa-solid fa-cloud-arrow-down"></i>
                                                Download
                                            </button>

                                        </td>
                                        <td class="text-center">
                                            <strong><?php echo $row['name']; ?></strong>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-danger">-<?php echo $row['gia']; ?>đ</span>
                                        </td>
                                        <td class="text-center">
                                            <strong data-toggle="tooltip" data-placement="bottom" title=""
                                                data-bs-original-title=""> <?php echo $row['time_mua']; ?></strong>
                                        </td>
                                    </tr>
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

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <button type="submit" name="delete_selected" id="btn_delete"
                                                class="btn btn-danger btn-sm" data-toggle="tooltip"
                                                data-placement="bottom" title=""
                                                data-bs-original-title="Xóa đơn hàng đã chọn khỏi lịch sử của bạn">
                                                <i class="fa-solid fa-trash"></i> Xóa đơn hàng
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                    <div class="bottom-paginate">
                        <p class="page-info">Showing 1 of 1 Results</p>
                        <div class="pagination">
                            <div class="paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous">
                                        <a class="page-link active">1</a>
                                    </li>
                                    <li class="paginate_button page-item previous ">
                                        <a class="page-link" href="">2</a>
                                    </li>
                                    <li class="paginate_button page-item previous "><a class="page-link" href=""><i
                                                class="fas fa-long-arrow-alt-right"></i></a></li>
                                </ul>
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