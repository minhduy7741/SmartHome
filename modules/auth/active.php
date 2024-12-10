<?php
if ( ! defined("_STATUS") ) {
    echo "Truy cập không hợp lệ...";
    die();
}
require_once(_WEBDIR."/config.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Kiểm tra token có hợp lệ hay không
    $stmt = $conn->prepare("SELECT * FROM account WHERE activeToken = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Kiểm tra xem tài khoản đã được kích hoạt chưa
        if ($user['status'] == 0) {
            // Kích hoạt tài khoản
            $stmt = $conn->prepare("UPDATE account SET status = 1, activeToken = '' WHERE activeToken = ?");
            $stmt->execute([$token]);
            setFlashdata('tb', 'Tài khoản của bạn đã được kích hoạt thành công!');
                setFlashdata('tb_type', 'success');
                loadPage('?modules=auth&action=profile');
                exit();
        } else {
            setFlashdata('tb', 'Tài khoản của bạn đã được kích hoạt trước đó!');
                setFlashdata('tb_type', 'danger');
                loadPage('?modules=auth&action=profile');
                exit();
        }
    } else {
        setFlashdata('tb', 'Liên kết kích hoạt không hợp lệ hoặc đã hết hạn!');
                setFlashdata('tb_type', 'danger');
                loadPage('?modules=auth&action=profile');
                exit();
    }
} else {
    echo "Liên kết kích hoạt không hợp lệ.";
}

$conn = null;  // Đóng kết nối PDO
?>