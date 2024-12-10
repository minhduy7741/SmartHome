<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}
$data = [
    "title"=> "Vietcod - Đăng nhập tài khoản admin"
];
home("head-admin", $data);
$msg = [];
$ms = '';
$ms_type = '';
if(!empty($_SESSION['admin'])){
    loadPage('?modules=admin&action=lisuser');
}
if (isPost()) {
    $filter = filter($_POST);
    $pass = $filter['pass'];
    $email = $filter['email'];
    
 
    if(exists('account', ['email'=> $email])) {
       
    $check = oneRow("SELECT * FROM account WHERE email = '$email'");
    if($check){
        $use_id = $check['id'];
        $use_ad = $check['admin'];
        
        if($use_ad == 1){

    if ($check && password_verify($pass, $check['pass'])) {

    if(empty($msg)) {
   
            $_SESSION['admin'] = $email;
            loadPage('?modules=admin&action=listuser');
           exit();
       
    } 

} else {
    $msg['pass']['sai'] = 'Sai mật khẩu!';
}
}else{
    $msg['mail']['mailt2'] = 'Bạn không phải admin!';
}
}else{
    $msg['raw']['1'] = 'Không thể check id!';
}
}else{
    $msg['mail']['mailt'] = 'Email không tồn tại!';
}

if(!empty($msg)){    
    setFlashdata('tb', 'Có lỗi xảy ra, hãy kiểm tra lại thông tin!') ;
    setFlashdata('tb_type', 'danger') ;
}

$ms = getFlashdata('tb');
$ms_type = getFlashdata('tb_type');
}

    
?>

<div class="regis">
    <form action="" method="post">
        <h2>Đăng nhập Admin</h2>
        <?php
            msg($ms, $ms_type);
        ?>

        <div class="mb-3">
            <?php echo !empty($msg['check']) ? '<div class="error">'.reset($msg['check']).'</div>' : ''; ?>
            <label for="email" class="form-label">Email: </label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Name@gmail.com"
                value="<?php echo !empty($email) ? htmlspecialchars($email) : ''; ?>" required>
            <?php echo !empty($msg['mail']) ? '<div class="error">'.reset($msg['mail']).'</div>' : ''; ?>
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Mật khẩu: </label>
            <input name="pass" type="password" class="form-control" id="pass" placeholder="Mật khẩu:"
                value="<?php echo !empty($pass) ? htmlspecialchars($pass) : ''; ?>" required>
            <?php echo !empty($msg['pass']) ? '<div class="error">'.reset($msg['pass']).'</div>' : ''; ?>
        </div>




        <button class="btn btn-primary" type="submit">Đăng nhập</button>
        <hr>
        <a href="?modules=auth&action=register">Đăng ký</a><br>
        <a href="?modules=auth&action=forgot">Quên mật khẩu?</a>
    </form>
</div>

<?php
home("foot-admin");
?>