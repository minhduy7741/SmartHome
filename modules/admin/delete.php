<?php
if (!defined("_STATUS")) {
echo "Truy cập không hợp lệ...";
die();
}
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
$filter = filter();
$dl_email = $filter['email'];

if($dl_id && is_numeric($dl_id)) {
$check = getRow("SELECT * FROM account WHERE id = '$dl_email' ");

if($check) {
$check_login = getRow("SELECT * FROM logintoken WHERE email = '$dl_email' ");

if($check_login) {
delete("logintoken", "email = '$dl_email' ");
}

$delete_id = delete("account", "email = '$dl_email' ");
if($delete_id) {
    setFlashdata('tb','Xóa người dùng thành công!');
setFlashdata('tb_type','success');
}else{
    setFlashdata('tb','Lỗi hệ thống!');
setFlashdata('tb_type','danger');
}

} else {
setFlashdata('tb','Người dùng không tồn tại!');
setFlashdata('tb_type','danger');
}

} else {
setFlashdata('tb','Liên kết không đúng định dạng!');
setFlashdata('tb_type','danger');
}

loadPage('?modules=admin&action=listuser');
?>