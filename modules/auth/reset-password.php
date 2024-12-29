<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}

$data = [
    "title"=> "Đặt lại mật khẩu" 
];
home("head", $data);

$msg = '';
$msg_type = '';

if(!isset($_GET['token'])) {
    die("Token không hợp lệ!");
}

$token = $_GET['token'];

// Kiểm tra token có hợp lệ và chưa hết hạn
$reset = _fetch("SELECT * FROM password_resets WHERE token = ? AND expires > NOW() AND used = 0", [$token]);

if(!$reset) {
    die("Token đã hết hạn hoặc không hợp lệ!");
}

if(isPost()) {
    $password = filter($_POST['password']);
    $confirm_password = filter($_POST['confirm_password']);
    
    if($password !== $confirm_password) {
        $msg = "Mật khẩu xác nhận không khớp!";
        $msg_type = "danger";
    } else {
        // Cập nhật mật khẩu mới
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE account SET pass = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$hash, $reset['email']]);
        
        // Đánh dấu token đã sử dụng
        $sql = "UPDATE password_resets SET used = 1 WHERE token = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$token]);
        
        $msg = "Đặt lại mật khẩu thành công!";
        $msg_type = "success";
        
        // Chuyển hướng về trang đăng nhập
        header("refresh:2;url=?modules=auth&action=login");
    }
}
?>

<div class="user-form-card">
    <h3 class="user-form-title">Đặt lại mật khẩu</h3>

    <?php if($msg): ?>
    <div class="alert alert-<?php echo $msg_type; ?>"><?php echo $msg; ?></div>
    <?php endif; ?>

    <form class="user-form" method="post">
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Mật khẩu mới" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Xác nhận mật khẩu" required>
        </div>
        <div class="form-button">
            <button type="submit">Đặt lại mật khẩu</button>
        </div>
    </form>
</div>

<?php 
home("foot");
?> 