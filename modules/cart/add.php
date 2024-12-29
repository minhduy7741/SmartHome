<?php
if (!defined("_STATUS")) {
    die("Truy cập không hợp lệ...");
}
// Nhận dữ liệu từ POST
$action = $_GET['kieu'] ?? '';
$id = $_GET['id'] ?? null;

if ($action === 'add') {
    // Lấy thông tin sản phẩm từ database
    $product = _fetch("SELECT * FROM source WHERE id = ?", [$id]);
    
    if($product) {
        // Khởi tạo giỏ hàng nếu chưa có
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        // Thêm hoặc cập nhật sản phẩm trong giỏ hàng
        if(isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = [
                'id' => $id,
                'name' => $product['name'],
                'price' => $product['gia'],
                'image' => $product['avatar'],
                'quantity' => 1
            ];
        }

        echo json_encode(['status' => 'success', 'msg' => 'Thêm sản phẩm thành công!']);
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'Sản phẩm không tồn tại']);
    }
} else {
    echo json_encode(['status' => 'error', 'msg' => 'Thao tác không hợp lệ']);
}
?>