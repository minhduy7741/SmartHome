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

<style>
.btn-cart {
    padding: 8px 12px;
    background: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    height: 35px;
    width: 35px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-cart i {
    font-size: 14px;
}

.btn-cart:hover {
    background: #218838;
    transform: translateY(-2px);
}

.btn-buy {
    padding: 8px 15px;
    background: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    height: 35px;
    min-width: 100px;
}

.btn-buy:hover {
    background: #0056b3;
    transform: translateY(-2px);
}

.gap-2 {
    gap: 0.5rem;
}

.product-buttons-box4 .row {
    align-items: center;
}

.btn-success {
    padding: 8px 15px;
    background: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    height: 35px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.btn-success:hover {
    background: #218838;
    transform: translateY(-2px);
}

.btn-primary {
    padding: 8px 15px;
    background: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    height: 35px;
}

.btn-primary:hover {
    background: #0056b3;
    transform: translateY(-2px);
}

.btn-more {
    font-weight: bold;
    color: #333;
    font-size: 16px;
}

.me-2 {
    margin-right: 0.5rem;
}

.product-buttons-box4 .row {
    align-items: center;
}

/* Animation khi thêm vào giỏ hàng */
@keyframes cartAnimation {
    0% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.2);
    }

    100% {
        transform: scale(1);
    }
}

.cart-animation {
    animation: cartAnimation 0.5s ease;
}
</style>

<section class="section feature-part">
    <div class="container">
        <div class="mb-5">

        </div>


        <div class="col-xl-12">
            <div class="row">

                <div class="col-lg-12 mb-5" id="category14">
                    <div class="home-heading mb-3">
                        <h3>
                            <img src="https://i.imgur.com/5OtiwkV.png">
                            SẢN PHẨM
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

// Kiểm tra 'the_loai' trong GET
if (isset($_GET['the_loai']) && !empty($_GET['the_loai'])) {
    $the_loai = $_GET['the_loai'];
    $whereClauses[] = "FIND_IN_SET(:the_loai, the_loai)";
    $params[':the_loai'] = $the_loai;
}

// Kiểm tra 'gia' trong GET
if (isset($_GET['gia']) && !empty($_GET['gia'])) {
    $gia = $_GET['gia'];
    $priceRange = explode('-', $gia);

    // Xác định giá min và max
    if (count($priceRange) == 2) {
        $gia_min = $priceRange[0];
        $gia_max = $priceRange[1];

        $whereClauses[] = "gia BETWEEN :gia_min AND :gia_max";
        $params[':gia_min'] = $gia_min;
        $params[':gia_max'] = $gia_max;
    }
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
                                            <span class="btn-more">
                                                <?= number_format($row['gia'], 0, ',', '.'); ?> đ
                                            </span>
                                        </div>
                                        <div class="col d-flex justify-content-end gap-2">
                                            <button onclick="redirectToDetailPage(<?= $row['id']; ?>)" class="btn-buy">
                                                Xem ngay
                                            </button>

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
                    <!--END ROW 1-->

                    <center><a type="button" href="" class="btn-more-new mb-3">Xem thêm</a></center>

                    <script>
                    function addToCart(productId) {
                        // Kiểm tra đăng nhap
                        <?php if(!isset($_SESSION['user'])): ?>
                        window.location.href = '?modules=auth&action=login';
                        return;
                        <?php endif; ?>

                        // Gửi request AJAX để thêm vào giỏ hàng
                        fetch('?modules=cart&action=add', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    product_id: productId,
                                    quantity: 1
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Cập nhật số lượng trong giỏ hàng
                                    document.getElementById('cartCount').textContent = data.cartCount;

                                    // Animation cho icon giỏ hàng
                                    const cartIcon = document.querySelector('.header-widget i.fa-cart-arrow-down');
                                    cartIcon.classList.add('cart-animation');
                                    setTimeout(() => {
                                        cartIcon.classList.remove('cart-animation');
                                    }, 500);

                                    // Thông báo thành công
                                    showMessage('Đã thêm sản phẩm vào giỏ hàng!', 'success');
                                } else {
                                    showMessage('Có lỗi xảy ra!', 'error');
                                }
                            });
                    }

                    // Giữ nguyên function redirectToDetailPage
                    function redirectToDetailPage(productId) {
                        var url = '?modules=sanpham&action=viewcode&id=' + productId;
                        window.location.href = url;
                    }
                    </script>

                </div>
            </div>
        </div>
    </div>

</section>
<?php
home("foot");
?>