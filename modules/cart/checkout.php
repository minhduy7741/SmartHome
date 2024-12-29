<?php
if (!defined("_STATUS")) {
    die("Truy cập không hợp lệ...");
}

if (!isset($_SESSION['user'])) {
    header("location: ?modules=auth&action=login");
    exit();
}

// Lấy thông tin giỏ hàng
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
if(empty($cart)) {
    header("location: ?modules=cart&action=cart");
    exit();
}

// Tính tổng tiền
$total = 0;
foreach($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Xử lý thanh toán
if(isset($_POST['action']) && $_POST['action'] == 'buy') {
    $coupon = isset($_POST['coupon']) ? $_POST['coupon'] : null;
    $time_mua = date("Y-m-d H:i:s");
    
    // Kiểm tra số dư
    $user = _fetch("SELECT * FROM users WHERE username = ?", [$_SESSION['user']['username']]);
    if($user['money'] < $total) {
        echo json_encode([
            'status' => 'error',
            'msg' => 'Số dư không đủ để thanh toán. Vui lòng nạp thêm tiền!'
        ]);
        exit();
    }

    try {
        // Bắt đầu transaction
        $conn->beginTransaction();

        // Trừ tiền người d��ng
        $new_money = $user['money'] - $total;
        _query("UPDATE users SET money = ? WHERE username = ?", [$new_money, $_SESSION['user']['username']]);

        // Thêm vào lịch sử đơn hàng cho từng sản phẩm trong giỏ
        foreach($cart as $id => $item) {
            $sql = "INSERT INTO lichsudonhang (username, email, name, gia, time_mua) VALUES (?,?,?,?,?)";
            _query($sql, [
                $_SESSION['user']['username'],
                $_SESSION['user']['email'],
                $item['name'],
                $item['price'] * $item['quantity'],
                $time_mua
            ]);
        }

        // Xóa giỏ hàng sau khi thanh toán thành công
        unset($_SESSION['cart']);

        // Commit transaction
        $conn->commit();

        echo json_encode([
            'status' => 'success',
            'msg' => 'Thanh toán thành công!'
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

$data = [
    "title" => "Thanh toán đơn hàng"
];
home("head", $data);
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Xác nhận thanh toán</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cart as $item): ?>
                                <tr>
                                    <td><?= $item['name'] ?></td>
                                    <td><?= $item['quantity'] ?></td>
                                    <td><?= number_format($item['price']) ?>đ</td>
                                    <td><?= number_format($item['price'] * $item['quantity']) ?>đ</td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Tổng tiền:</strong></td>
                                    <td><strong><?= number_format($total) ?>đ</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Số dư hiện tại:
                        <strong><?= number_format($user['money']) ?>đ</strong>
                    </div>

                    <form id="checkoutForm">
                        <input type="hidden" name="action" value="buy">
                        <div class="mb-3">
                            <label class="form-label">Mã giảm giá (nếu có)</label>
                            <input type="text" name="coupon" class="form-control">
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="?modules=cart&action=cart" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Quay lại
                            </a>
                            <button type="submit" class="btn btn-success" id="btnCheckout">
                                <i class="fas fa-check"></i> Xác nhận thanh toán
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#checkoutForm').submit(function(e) {
        e.preventDefault();

        const btn = $('#btnCheckout');
        const originalText = btn.html();
        btn.html('<i class="fas fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);

        $.ajax({
            url: '?modules=cart&action=checkout',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công!',
                        text: response.msg,
                        showCancelButton: false,
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        window.location.href = '?modules=cart&action=cart';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi!',
                        text: response.msg
                    });
                    btn.html(originalText).prop('disabled', false);
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi!',
                    text: 'Có lỗi xảy ra, vui lòng thử lại sau.'
                });
                btn.html(originalText).prop('disabled', false);
            }
        });
    });
});
</script>

<?php home("foot"); ?>