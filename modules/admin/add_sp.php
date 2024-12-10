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
    $name = $filter['name'];
    $chi_tiet = $filter['chi_tiet'];
    $avatar = $filter['avatar'];
    $img = $filter['img'];
    $gia = $filter['gia'];
    $link_source = $filter['link_source'];
    $link_demo = $filter['link_demo'];
    $the_loai= $filter['the_loai'];

    if ($gia < 0) {
        $msg['gia']['mkk'] = 'Giá tiền cần lớn hơn hoặc = 0!';
    }
    if(empty($msg)) {
        $data = [
            'name' => $name,
            'chi_tiet' => $chi_tiet,
            'avatar' => $avatar,
            'img' => $img,
            'gia' => $gia,
            'link' => $link_source,
            'link_demo' => $link_demo,
            'the_loai' => $the_loai,
            'ngay_dang' => date("Y-m-d H:i:s")
        ];
        
        $suc = insert('source', $data);
        
        if ($suc ) {
            setFlashdata('tb', 'Thêm sản phẩm thành công!') ;
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
                        <label class="form-label">Tên source: </label>
                        <input name="name" type="text" class="form-control" placeholder="Tên source:"
                            value="<?php echo !empty($name) ? htmlspecialchars($name) : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Avatar: </label>
                        <input name="avatar" type="text" class="form-control" placeholder="Ảnh đại diện của source:"
                            value="<?php echo !empty($avatar) ? htmlspecialchars($avatar) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link Demo: </label>
                        <input name="link_demo" type="text" class="form-control" placeholder="Link demo source:"
                            value="<?php echo !empty($link_demo) ? htmlspecialchars($link_demo) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giá bán: </label>
                        <input name="gia" type="text" class="form-control" placeholder="Giá bán:"
                            value="<?php echo !empty($gia) ? htmlspecialchars($gia) : ''; ?>" required>
                        <?php echo !empty($msg['gia']) ? '<div class="error">'.reset($msg['gia']).'</div>' : ''; ?>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label class="form-label">Chi tiết Source: </label>
                        <input name="chi_tiet" type="text" class="form-control" placeholder="Nhập nội dung source"
                            value="<?php echo !empty($chi_tiet) ? htmlspecialchars($chi_tiet) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ảnh: </label>
                        <input name="img" type="text" class="form-control"
                            placeholder="Nhập link ảnh source, và phải là <img src='Link ảnh' >"
                            value="<?php echo !empty($img) ? htmlspecialchars($img) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link source: </label>
                        <input name="link_source" type="text" class="form-control" placeholder="Nhập link source"
                            value="<?php echo !empty($link_source) ? htmlspecialchars($link_source) : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thể loại: </label>
                        <input name="the_loai" type="text" class="form-control"
                            placeholder="Điền toolweb, china, thuong"
                            value="<?php echo !empty($the_loai) ? htmlspecialchars($the_loai) : ''; ?>" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>

            <a href="<?php _WEBHOST ?>?modules=admin&action=listsource"><button class="btn btn-success"
                    type="button">Quay
                    lại</button> </a>
        </form>
    </div>
</div>
<?php
home("foot-admin");
?>