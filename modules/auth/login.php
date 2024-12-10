<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}
$data = [
    "title"=> "Vietcod - Đăng nhập tài khoản"
];
home("head", $data);
$msg = [];
$ms = '';
$ms_type = '';
if (isset($_SESSION['user'] )) {
    loadPage('?modules=home&action=home');
    exit();
}
if (isPost()) {
    $filter = filter($_POST);
    if(!empty($_POST['email_forgot'])){
        $email_forgot = $filter['email_forgot'];
      
        if(exists('account', ['email'=> $email_forgot ])) {
            $sql = "SELECT * FROM account WHERE email = :email";
            $params = ['email' => $email_forgot ];
            $check = oneRow($sql, $params);
        
            if ($check) {
                $check_id = $check['id'];
                if (!empty($check_id)) {
                    $forgotToken = sha1(uniqid() . time());
                    $linkToken = _WEBHOST . '?modules=auth&action=reset&token=' . $forgotToken;
                    $subject = 'Yêu cầu quên mật khẩu!';
                    $body = 'Hãy ấn vào liên kết bên dưới để đổi lại mật khẩu nhé. <br><br>';
                    $body .= 'Liên kết: <br>' . $linkToken . '<br>';
                    $body .= '<br>Chúc bạn một ngày tốt lành. <br>Trân trọng cảm ơn.';
                    $stmt = $conn->prepare("UPDATE account SET forgotToken = '$forgotToken' WHERE id = '$check_id' ");
                    $suc = $stmt->execute();
                    $sucmail = sendMail($email_forgot , $subject, $body);
        
                    if ($sucmail && $suc) {
                        setFlashdata('tb', 'Gửi yêu cầu quên mật khẩu thành công, hãy kiểm tra email để xem hướng dẫn!');
                        setFlashdata('tb_type', 'success');
                    } else {
                        setFlashdata('tb', 'Có lỗi xảy ra!');
                        setFlashdata('tb_type', 'danger');
                    }
                } else {
                    $msg['forgot']['id'] = 'id không tồn tại!';
                }
            } else {
                $msg['forgot']['mailt'] = 'Email không tồn tại!';
            }
        }
        
        
    }else{
    if(isset($filter['pass']) && isset($filter['pass'])){
    $pass = $filter['pass'];
    $email = $filter['email'];
    }else{
        $msg['mail']['mail_empty'] = 'Vui lòng điền đầy đủ thông tin!';
    }
    if(exists('account', ['email'=> $email])) {
       
    $check = oneRow("SELECT * FROM account WHERE email = '$email'");
    if($check){
    if ($check && password_verify($pass, $check['pass'])) {
        
    if(empty($msg)) {
        $loginToken = sha1(uniqid() . time());
 
        $data = [
            'email' => $email,
            'token' => $loginToken,
            'admin' => $check['admin'],
            'create_time' => date("Y-m-d H:i:s")
        ];
        $suc = insert('logintoken', $data);
        if($suc){
            $_SESSION['user'] = $email;
            loadPage('?modules=home&action=home');
           exit();
        }else{  
            setFlashdata('tb', 'Có lỗi ở phương thức Success!') ;
            setFlashdata('tb_type', 'danger') ;
        }
    
    } 
} else {
    $msg['pass']['sai'] = 'Sai mật khẩu!';
}
}else{
    $msg['raw']['1'] = 'Không thể check email !';
}
}else{
    $msg['mail']['mailt'] = 'Email không tồn tại!';
}
}

if(!empty($msg)){    
    setFlashdata('tb', 'Có lỗi xảy ra, hãy kiểm tra lại thông tin!') ;
    setFlashdata('tb_type', 'danger') ;
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
                        <?php if(isset($_GET['forgot'])){ ?>
                        <h2>Quên mật khẩu</h2>
                        <p>Vui lòng nhập email lấy lại mật khẩu</p>
                        <?php }else{ ?>
                        <h2>Đăng Nhập</h2>
                        <p>Vui lòng nhập thông tin đăng nhập</p>
                        <?php } ?>
                    </div>
                    <?php
msg($ms, $ms_type);
?>
                    <div class="user-form-group">
                        <form class="user-form" method="post" action="">
                            <?php if(isset($_GET['forgot'])){ ?>
                            <label>Điền vào email để lấy lại mật khẩu</label>
                            <div class="form-group">
                                <input type="email" name="email_forgot"
                                    value="<?php echo !empty($email_forgot) ? htmlspecialchars($email_forgot) : ''; ?>"
                                    class="form-control" data-gtm-form-interact-field-id="0">
                                <?php echo !empty($msg['forgot']) ? '<div class="error">'.reset($msg['forgot']).'</div>' : ''; ?>
                            </div>
                            <div class="form-button">
                                <button type="submit" id="btnLogin">Gửi mật khẩu mới</button>
                                <p><a href="?modules=auth&action=login">Đăng nhập?</a></p>
                            </div>

                            <?php }else{ ?>
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

                            <div class="form-button">
                                <button type="submit" id="btnLogin">Đăng Nhập</button>
                                <p><a href="?modules=auth&action=login&forgot">Quên mật khẩu?</a></p>
                            </div>
                            <?php } ?>
                        </form>

                    </div>
                </div>
                <div class="user-form-remind">
                    <p>Bạn chưa có tài khoản? <a href="?modules=auth&action=register">Đăng Ký Ngay</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
home("foot");
?>