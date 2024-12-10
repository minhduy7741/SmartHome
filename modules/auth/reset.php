<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}
$data = [
    "title"=> "Vietcod - Đổi mật khẩu"
];

if (!empty($_GET["token"]) ) {
    $token = htmlspecialchars($_GET['token'], ENT_QUOTES, 'UTF-8');
    $check = oneRow("SELECT * FROM account WHERE forgotToken = '$token'");
    if($check){
        $check_id = $check['id'];
    }else{
        echo "Truy cập không hợp lệ...";
    die();
    }
    
}else{
    echo "Truy cập không hợp lệ...";
    die();
}
home("head", $data);
$msg = [];
$ms ='';
$ms_type = '';

if (isPost()) {
    $filter = filter($_POST);
    $pass = $filter['pass'];
    $repass = $filter['repass'];

    // Kiểm tra các điều kiện

    if ($repass != $pass) {
        $msg['repass']['mkk'] = 'Mật khẩu nhập lại không khớp!';
    }
    if (strlen($pass) < 5) {
        $msg['pass']['5'] = 'Mật khẩu ít nhất 5 ký tự!';
    }

    if(empty($msg)) {
        $hashPassword = password_hash($pass, PASSWORD_DEFAULT);
        $forgotNew = null;
        $update = date('Y-m-d H:i:s');
        
        // Thực hiện câu lệnh SQL với PDO
        $sql = "UPDATE account SET pass = :pass, forgotToken = :forgotToken, update_pass = :update_pass WHERE id = :id";
        $stmt = $conn->prepare($sql);
        
        // Gắn giá trị vào các tham số
        $stmt->bindParam(':pass', $hashPassword, PDO::PARAM_STR);
        $stmt->bindParam(':forgotToken', $forgotNew, PDO::PARAM_STR);
        $stmt->bindParam(':update_pass', $update, PDO::PARAM_STR);
        $stmt->bindParam(':id', $check_id, PDO::PARAM_INT);
        
        // Thực thi câu lệnh
        $suc = $stmt->execute();
        
        if ($suc) {
            setFlashdata('tb', 'Đổi mật khẩu thành công!');
            setFlashdata('tb_type', 'success');
        } else {
            setFlashdata('tb', 'Có lỗi xảy ra!');
            setFlashdata('tb_type', 'danger');
        }
    }
    else {    
        
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
                        <h2>Đổi mật khẩu</h2>
                        <p>Vui lòng nhập thông tin</p>

                    </div>
                    <?php
msg($ms, $ms_type);
?>
                    <div class="user-form-group">
                        <form class="user-form" method="post" action="">

                            <label>Mật khẩu mới</label>
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
                                <button type="submit" id="btnLogin">Đổi</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
home("foot");
?>