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
$dl_id = $filter['id'];

if($dl_id && is_numeric($dl_id)) {
$check = getRow("SELECT * FROM source WHERE id = '$dl_id' ");

if($check) {

$delete_id = delete("source", "id = '$dl_id' ");
if($delete_id) {
    setFlashdata('tb','Xóa Sản phẩm thành công!');
setFlashdata('tb_type','success');
}else{
    setFlashdata('tb','Lỗi hệ thống!');
setFlashdata('tb_type','danger');
}

} else {
setFlashdata('tb','Sản phẩm không tồn tại!');
setFlashdata('tb_type','danger');
}

} else {
setFlashdata('tb','Liên kết không đúng định dạng!');
setFlashdata('tb_type','danger');
}

loadPage('?modules=admin&action=listsource');
?>