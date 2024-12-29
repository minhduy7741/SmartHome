<?php
include '../../config.php';

if (!isset($_SESSION['user'])) {
    echo json_encode(['status' => 'error', 'msg' => 'Vui lòng đăng nhập để thực hiện thao tác này.']);
    exit();
}

// Nhận dữ liệu từ AJAX
$action = $_POST['action'] ?? '';
$coupon = $_POST['coupon'] ?? null;
$id = $_POST['id'] ?? null;
$time_mua = date("Y-m-d H:i:s");

if ($action === 'buy') {
    // Xử lý mua hàng
    $stmt = $conn->prepare("SELECT name, link, gia FROM source WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $name = $product['name'];
        $link = $product['link'];
        $gia = $product['gia'];

        // Kiểm tra số dư
        $stmt_balance = $conn->prepare("SELECT vnd FROM account WHERE email = :email");
        $stmt_balance->execute(['email' => $_email]);
        $user = $stmt_balance->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $vnd = $user['vnd'];

            if ($vnd >= $gia) {
                // Trừ tiền
                $new_balance = $vnd - $gia;
                $stmt_update_balance = $conn->prepare("UPDATE account SET vnd = :vnd WHERE email = :email");
                $stmt_update_balance->execute(['vnd' => $new_balance, 'email' => $_email]);

                // Thêm lịch sử đơn hàng
                $stmt_insert = $conn->prepare("INSERT INTO lichsudonhang (name, link, gia, time_mua, email, id_source) VALUES (:name, :link, :gia, :time_mua, :email, :id_source)");
                $stmt_insert->execute([
                    'name' => $name,
                    'link' => $link,
                    'gia' => $gia,
                    'time_mua' => $time_mua,
                    'email' => $_email,
                    'id_source' => $id,
                ]);

                echo json_encode(['status' => 'success', 'msg' => 'Mua sản phẩm thành công!']);
            } else {
                echo json_encode(['status' => 'error', 'msg' => 'Số dư không đủ để mua sản phẩm.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Không tìm thấy tài khoản của bạn.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'Sản phẩm không tồn tại.']);
    }
} elseif ($action === 'calculate') {
    // Tính tổng chi phí
    $stmt = $conn->prepare("SELECT gia FROM source WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $gia = $product['gia'];

        // Áp dụng mã giảm giá (nếu có)
        $discount = 0; // Thêm logic giảm giá từ $coupon nếu cần
        $total = $gia - $discount;

        echo json_encode(['status' => 'success', 'total' => $total]);
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'Không thể tính tổng chi phí.']);
    }
} else {
    echo json_encode(['status' => 'error', 'msg' => 'Thao tác không hợp lệ.']);
}

?>