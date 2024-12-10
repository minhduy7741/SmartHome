<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}   

 
$data = [
    "title"=> "Vietcod - Sửa thông tin tài khoản"
];

if(!$_SESSION['admin']){
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

if (isset($_GET['id'])) {
    $id_get = $_GET['id'];
    $check = oneRow("SELECT * FROM account WHERE id = '$id_get'");
    if ($check) {
        $u_email = $check['email'];
        $u_status = $check['status'];

        if (isPost()) {
            $filter = filter($_POST);
            $email = $filter['email'];
            $pass = $filter['pass'];
            $repass = $filter['repass'];
            $status = $filter['status'];
        
            if(!empty($pass) || !empty($repass)){
                if ($repass != $pass) {
                    $msg['pass2']['mkk'] = 'Mật khẩu nhập lại không khớp!';
                }
                if (strlen($pass) < 5) {
                    $msg['pass']['5'] = 'Mật khẩu ít nhất 5 ký tự!';
                }
            }
            
            if (!isEmail($email)) {
                $msg['mail']['mailf'] = 'Email không đúng định dạng!';
            }
        
            if (empty($msg)) {
               
        
                // Dữ liệu để cập nhật
                $updateData = [
                    'email' => $email,
                    'status' => $status,
                    'update_time' => date("Y-m-d H:i:s")
                ];
                if(!empty($pass) || !empty($repass)){
                    $updateData['pass'] = password_hash($pass, PASSWORD_DEFAULT);
                }
                // Tạo câu lệnh SET
                $setClause = [];
                foreach ($updateData as $key => $value) {
                    $setClause[] = "$key = ?";
                }
                $setClauseString = implode(', ', $setClause);
                
                // Tạo câu lệnh SQL
                $sql = "UPDATE account SET $setClauseString WHERE id = ?";
                
                // Chuẩn bị câu lệnh SQL
                $stmt = $conn->prepare($sql);
                
                if ($stmt === false) {
                    // Xử lý lỗi khi chuẩn bị câu lệnh
                    die("Lỗi khi chuẩn bị câu lệnh SQL: " . mysqli_error($conn));
                }
                
                // Gán giá trị cho các tham số
                $params = array_values($updateData);
                $params[] = $id_get;
                
                // Gán kiểu dữ liệu cho tham số
                $types = str_repeat('s', count($updateData)) . 'i'; // 'i' cho ID số nguyên
                $stmt->bind_param($types, ...$params);
                
                // Thực thi câu lệnh
                $suc = $stmt->execute();
                if ($suc) {
                    setFlashdata('tb', 'Sửa khoản thành công!');
                    setFlashdata('tb_type', 'success');
                } else {
                    setFlashdata('tb', 'Có lỗi xảy ra!');
                    setFlashdata('tb_type', 'danger');
                }
            } else {
                setFlashdata('tb', 'Có lỗi xảy ra, hãy kiểm tra lại thông tin!');
                setFlashdata('tb_type', 'danger');
            }
        }
    } else {
        echo "id không tồn tại...";
        die();
    }
} else {
    echo "id không hợp lệ...";
    die();
}

$ms = getFlashdata('tb');
$ms_type = getFlashdata('tb_type');
?>
<div class="container">
    <div class="regis2">
        <form action="" method="post">
            <h2>Sửa thông tin tài khoản</h2>
            <?php msg($ms, $ms_type); ?>
            <div class="row">
                <div class="col">

                    <div class="mb-3">
                        <label for="pass" class="form-label">Mật khẩu: </label>
                        <input name="pass" type="password" class="form-control" id="pass"
                            placeholder="Mật khẩu(không nhập nếu không đổi):"
                            value="<?php echo !empty($pass) ? htmlspecialchars($pass) : ''; ?>">
                    </div>
                    <?php echo !empty($msg['pass']) ? '<div class="error">'.reset($msg['pass']).'</div>' : ''; ?>
                    <div class="mb-3">
                        <label for="repass" class="form-label">Nhập lại mật khẩu mới: </label>
                        <input name="repass" type="password" class="form-control" id="repass"
                            placeholder="Nhập lại mật khẩu(không nhập nếu không đổi):"
                            value="<?php echo !empty($repass) ? htmlspecialchars($repass) : ''; ?>">
                        <?php echo !empty($msg['pass2']) ? '<div class="error">'.reset($msg['pass2']).'</div>' : ''; ?>
                    </div>

                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email: </label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Name@gmail.com"
                            value="<?php echo !empty($email) ? htmlspecialchars($email) : htmlspecialchars($u_email); ?>"
                            required>
                        <?php echo !empty($msg['mail']) ? '<div class="error">'.reset($msg['mail']).'</div>' : ''; ?>
                    </div>

                    <div class="mb-3 form-group">
                        <label for="status" class="form-label">Trạng thái: </label>
                        <select name="status" class="form-control">
                            <option value="1" <?php echo $u_status == 1 ? 'selected' : ''; ?>>Kích hoạt</option>
                            <option value="0" <?php echo $u_status == 0 ? 'selected' : ''; ?>>Chưa kích hoạt</option>
                        </select>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Sửa tài khoản</button>

            <a href="<?php echo _WEBHOST; ?>?modules=admin&action=listuser">
                <button class="btn btn-success" type="button">Quay lại</button> </a>

        </form>
    </div>
</div>
<?php
home("foot-admin");
?>