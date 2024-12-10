<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}
$data = [
    "title" => "Vietcod - Đăng ký tài khoản"
];
if (isset($_SESSION['user'] )) {
    loadPage('?modules=home&action=home');
}
home("head", $data);
$msg = [];
$ms = '';
$ms_type = '';

if (isPost()) {
    $filter = filter($_POST);
    $pass = $filter['pass'];
    $repass = $filter['repass'];
    $email = $filter['email'];

    if ($repass != $pass) {
        $msg['repass']['mkk'] = 'Mật khẩu nhập lại không khớp!';
    }
    if (strlen($pass) < 5) {
        $msg['pass']['5'] = 'Mật khẩu ít nhất 5 ký tự!';
    }
    if (!isEmail($email)) {
        $msg['mail']['mailf'] = 'Email không đúng định dạng!';
    }
    if (exists('account', ['email' => $email])) {
        $msg['mail']['mailt'] = 'Email đã tồn tại!';
    }

    if (empty($msg)) {
        $hashPassword = password_hash($pass, PASSWORD_DEFAULT);
        $status = 0;
        $activeToken = sha1(uniqid() . time());
        $data = [
            'pass' => $hashPassword,
            'email' => $email,
            'status' => $status,
            'activeToken' => $activeToken,
            'create_time' => date("Y-m-d H:i:s")
        ];
        
        $loginToken = sha1(uniqid() . time());
        $data1 = [
            'email' => $email,
            'token' => $loginToken,
            'create_time' => date("Y-m-d H:i:s")
        ];
        
        try {
            $conn->beginTransaction();
            $accountId = insert('account', $data);
            $data1['email'] = $email;
            insert('logintoken', $data1);
            $conn->commit();

                $_SESSION['user'] = $email;
                loadPage('?modules=auth&action=profile');
                exit();
           
        } catch (Exception $e) {
            $conn->rollBack();
            setFlashdata('tb', 'Có lỗi xảy ra!');
            setFlashdata('tb_type', 'danger');
        }
    } else {
        setFlashdata('tb', 'Có lỗi xảy ra, hãy kiểm tra lại thông tin!');
        setFlashdata('tb_type', 'danger');
    }

    $ms = getFlashdata('tb');
    $ms_type = getFlashdata('tb_type');
}
?>

<section class="py-5 inner-section profile-part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">

                <div class="user-form-card">
                    <div class="user-form-title">
                        <h2>Đăng ký</h2>
                        <p>Vui lòng nhập thông tin</p>

                    </div>
                    <?php
msg($ms, $ms_type);
?>
                    <div class="user-form-group">
                        <form class="user-form" method="post" action="">

                            <label>Email</label>
                            <div class="form-group">
                                <input type="email" name="email"
                                    value="<?php echo !empty($email) ? htmlspecialchars($email) : ''; ?>"
                                    class="form-control">
                                <?php echo !empty($msg['mail']) ? '<div class="error">'.reset($msg['mail']).'</div>' : ''; ?>
                            </div>

                            <label>Mật khẩu</label>
                            <div class="form-group">
                                <input type="password" name="pass" class="form-control"
                                    value="<?php echo !empty($pass) ? htmlspecialchars($pass) : ''; ?>">
                                <?php echo !empty($msg['pass']) ? '<div class="error">'.reset($msg['pass']).'</div>' : ''; ?>
                            </div>

                            <label>Nhập lại mật khẩu</label>
                            <div class="form-group">
                                <input type="password" name="repass" class="form-control"
                                    value="<?php echo !empty($repass) ? htmlspecialchars($repass) : ''; ?>">
                                <?php echo !empty($msg['repass']) ? '<div class="error">'.reset($msg['repass']).'</div>' : ''; ?>
                            </div>


                            <div class="form-button">
                                <button type="submit" id="btnLogin">Đăng Ký</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="user-form-remind">
                    <p>Bạn chưa có tài khoản? <a href="?modules=auth&action=login">Đăng Nhập</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
home("foot");
?>