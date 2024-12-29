<?php
if (!defined("_STATUS")) {
    die("Truy cập không hợp lệ...");
}

if(!isset($_SESSION['user'])) {
    header("location: ?modules=auth&action=login");
    exit;
}

$data = [
    "title" => "Giỏ hàng của bạn"
];
home("head", $data);

// Lấy giỏ hàng từ session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Xử lý xóa sản phẩm
if(isset($_GET['delete'])) {
    $product_id = $_GET['delete'];
    if(isset($cart[$product_id])) {
        unset($cart[$product_id]);
        $_SESSION['cart'] = $cart;
    }
}

// Xử lý cập nhật số lượng
if(isset($_POST['update'])) {
    foreach($_POST['quantity'] as $id => $qty) {
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, (int)$qty);
        }
    }
    $_SESSION['cart'] = $cart;
}

// Tính tổng tiền
$total = 0;
foreach($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Xử lý thanh toán
if(isset($_POST['action']) && $_POST['action'] == 'buy') {
    $time_mua = date("Y-m-d H:i:s");
    
    // Lấy thông tin số dư từ database
    $stmt = $conn->prepare("SELECT vnd FROM account WHERE email = ?");
    $stmt->execute([$_SESSION['user']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Tính tổng tiền cần thanh toán
    $total_payment = 0;
    foreach($cart as $item) {
        $total_payment += $item['price'] * $item['quantity'];
    }

    // Kiểm tra số dư
    if($user['vnd'] < $total_payment) {
        echo json_encode([
            'status' => 'error', 
            'msg' => 'Số dư không đủ! Bạn cần thêm ' . number_format($total_payment - $user['vnd']) . 'đ để thanh toán'
        ]);
        exit();
    }

    try {
        // Bắt đầu transaction
        $conn->beginTransaction();

        // Trừ tiền người dùng
        $new_balance = $user['vnd'] - $total_payment;
        $stmt = $conn->prepare("UPDATE account SET vnd = ? WHERE email = ?");
        $stmt->execute([$new_balance, $_SESSION['user']]);

        // Thêm vào lịch sử đơn hàng cho từng sản phẩm trong giỏ
        $stmt = $conn->prepare("INSERT INTO lichsudonhang (name, link, gia, time_mua, email) VALUES (?, ?, ?, ?, ?)");
        
        foreach($cart as $id => $item) {
            // Lấy thông tin sản phẩm từ database
            $product = _fetch("SELECT * FROM source WHERE id = ?", [$id]);
            if($product) {
                $stmt->execute([
                    $product['name'],
                    $product['link'],
                    $item['price'] * $item['quantity'],
                    $time_mua,
                    $_SESSION['user']
                ]);
            }
        }

        // Xóa giỏ hàng sau khi thanh toán thành công
        unset($_SESSION['cart']);

        // Commit transaction
        $conn->commit();

        echo json_encode([
            'status' => 'success',
            'msg' => 'Thanh toán thành công! Số dư còn lại: ' . number_format($new_balance) . 'đ'
        ]);
        exit();

    } catch (Exception $e) {
        // Rollback nếu có lỗi
        $conn->rollBack();
        echo json_encode([
            'status' => 'error',
            'msg' => 'Có lỗi xảy ra: ' . $e->getMessage()
        ]);
        exit();
    }
}

?>

<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Giỏ hàng của bạn</h4>
        </div>
        <div class="card-body">
            <?php if(empty($cart)): ?>
            <div class="alert alert-info">Giỏ hàng trống</div>
            <?php else: ?>
            <form method="POST">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($cart as $id => $item): ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= $item['image'] ?>" style="width: 50px; margin-right: 10px;">
                                        <div>
                                            <h6 class="mb-0"><?= $item['name'] ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td><?= number_format($item['price']) ?>đ</td>
                                <td style="width: 150px;">
                                    <input type="number" name="quantity[<?= $id ?>]" value="<?= $item['quantity'] ?>"
                                        min="1" class="form-control">
                                </td>
                                <td><?= number_format($item['price'] * $item['quantity']) ?>đ</td>
                                <td>
                                    <a href="?modules=cart&action=cart&delete=<?= $id ?>" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>

                                <td>
                                <a onclick="PaymentVps(<?php echo $item['id']; ?>, '<?php echo htmlspecialchars($_email, ENT_QUOTES, 'UTF-8'); ?>')" 
                                class="btn-buy mb-2">
    <i class="fa-solid fa-cart-shopping"></i> Thanh toán
</a>
                                </td>
                             
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Tổng tiền:</strong></td>
                                <td colspan="2"><strong><?= number_format($total) ?>đ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            
                <div class="d-flex justify-content-between mt-3">
                    <a href="/" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Tiếp tục mua hàng
                    </a>
                    <div>
                        <button type="submit" name="update" class="btn btn-primary me-2">
                            <i class="fas fa-sync"></i> Cập nhật giỏ hàng
                        </button>

                    </div>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function showModal() {
    $('#exampleModal').modal('show');
}

function PaymentVps(id, email) {
    Swal.fire({
        title: 'Xác Nhận Thanh Toán!',
        text: "Bạn có chắc chắn muốn mua loại này không!",
        icon: 'warning',
        showCancelButton: true,
        //showDenyButton: true, // Thêm nút "Deny"
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        denyButtonColor: '#f6c23e',
        confirmButtonText: 'Thanh Toán',
        cancelButtonText: 'Hủy',
        // denyButtonText: 'Thanh toán tiền mặt',
    }).then((result) => {
        if (result.isConfirmed) {
            // Người dùng chọn "Thanh toán online"
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
                    }, 1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Có lỗi',
                        text: data.msg,
                    });
                }
            }, 'json');
        } //else if (result.isDenied) {
            // Người dùng chọn "Thanh toán tiền mặt"
            //window.location.href = `?modules=sanpham&action=checkout&id_source=${id}&email=${encodeURIComponent(email)}`;
        //}
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

<!-- Modal sản phẩm -->
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
    $('#openModal_' + id).html('<span><i class="fa fa-spinner fa-spin"></i> Processing...</span>').prop('disabled',
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


<?php home("foot"); ?>
?>