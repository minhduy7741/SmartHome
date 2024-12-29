<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}

$data = [
    "title"=> "Vietcod - Thêm tài khoản"
];
if(empty($_SESSION['admin'])){
    loadPage('?modules=admin&action=login');
}
    if ($_admin_ad != 1){
        $table = 'logintoken';
        $sql = "DELETE FROM $table WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $_id);
        $stmt->execute();
        unset($_SESSION['admin']);
        loadPage('?modules=admin&action=login');
    }
    home("head-admin", $data);
$msg = [];
$ms = '';
$ms_type = '';
if (isPost()) {
    $filter = filter($_POST);
    $pass = $filter['pass'];
    $repass = $filter['repass'];
    $email = $filter['email'];
    $status = $filter['status'];

    if ($repass != $pass) {
        $msg['pass2']['mkk'] = 'Mật khẩu nhập lại không khớp!';
    }
    if (strlen($pass) < 5) {
        $msg['pass']['5'] = 'Mật khẩu ít nhất 5 ký tự!';
    }
    if (!isEmail($email)) {
        $msg['mail']['mailf'] = 'Email không đúng định dạng!';
    }
    if(exists('account', ['email'=> $email])) {
        $msg['mail']['mailt'] = 'Email đã tồn tại!';
    }

    if(empty($msg)) {
        $hashPassword = password_hash($pass, PASSWORD_DEFAULT);


        if($status == 0) {
        $activeToken = sha1(uniqid() . time());
        $linkToken = _WEBHOST.'?modules=auth&action=active&token='.$activeToken;
        $subject = 'Xác nhận kích hoạt tài khoản';
        $body = 'Chào bạn, <br><br>';
        $body .= 'Hãy ấn vào liên kết bên dưới để kích hoạt tài khoản nhé. <br><br>';
        $body .= 'Liên kết: <br>'.$linkToken.'<br>';
        $body .= '<br>Chúc bạn một ngày tốt lành. <br>Trân trọng cảm ơn.';
        $sucmail = sendMail($email, $subject, $body);
        } else {
            $activeToken = null;
        }
        $data = [
            'pass' => $hashPassword,
            'email' => $email,
            'status' => $status,
            'activeToken' => $activeToken,
            'create_time' => date("Y-m-d H:i:s")
        ];
        
        $suc = insert('account', $data);
        
        if ($suc ) {
            setFlashdata('tb', 'Thêm tài khoản thành công!') ;
            setFlashdata('tb_type', 'success') ;
        } else {
            setFlashdata('tb', 'Có lỗi xảy ra!') ;
            setFlashdata('tb_type', 'danger') ;
        }
    } else {    
        setFlashdata('tb', 'Có lỗi xảy ra, hãy kiểm tra lại thông tin!') ;
        setFlashdata('tb_type', 'danger') ;
    }

    $ms = getFlashdata('tb');
$ms_type = getFlashdata('tb_type');

}
?>
<div class="container">
    <div class="regis2">
        <form action="" method="post">
            <h2>Thêm tài khoản</h2>
            <?php
        msg($ms, $ms_type);
        ?>
            <div class="row">
                <div class="col">

                    <div class="mb-3">
                        <label for="pass" class="form-label">Mật khẩu: </label>
                        <input name="pass" type="password" class="form-control" id="pass" placeholder="Mật khẩu:"
                            value="<?php echo !empty($pass) ? htmlspecialchars($pass) : ''; ?>" required>
                    </div>
                    <?php echo !empty($msg['pass']) ? '<div class="error">'.reset($msg['pass']).'</div>' : ''; ?>
                    <div class="mb-3">
                        <label for="repass" class="form-label">Nhập lại mật khẩu: </label>
                        <input name="repass" type="password" class="form-control" id="repass"
                            placeholder="Nhập lại mật khẩu:"
                            value="<?php echo !empty($repass) ? htmlspecialchars($repass) : ''; ?>" required>
                        <?php echo !empty($msg['pass2']) ? '<div class="error">'.reset($msg['pass2']).'</div>' : ''; ?>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email: </label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Name@gmail.com"
                            value="<?php echo !empty($email) ? htmlspecialchars($email) : ''; ?>" required>
                        <?php echo !empty($msg['mail']) ? '<div class="error">'.reset($msg['mail']).'</div>' : ''; ?>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="phone" class="form-label">Trạng thái: </label>
                        <select name="status" class="form-control">
                            <option value="0">Chưa kích hoạt</option>
                            <option value="1">Kích hoạt</option>
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Thêm tài khoản</button>

            <a href="<?php _WEBHOST ?>?modules=admin&action=listuser"><button class="btn btn-success" type="button">Quay
                    lại</button> </a>
        </form>
    </div>
</div>
<?php
home("foot-admin");
?>