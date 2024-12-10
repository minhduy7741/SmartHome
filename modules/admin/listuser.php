<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}
   
$data = [
    "title"=> "Vietcod - List User"
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

$check = getRow('SELECT * FROM account ORDER BY create_time DESC');

$ms = getFlashdata('tb');
$ms_type = getFlashdata('tb_type');
?>
<div class="container ">
    <a href="<?php _WEBHOST ?>?modules=admin&action=add"><button type="button" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle"
                viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4">
                </path>
            </svg>
            Thêm người dùng
        </button></a><br><br>
    <?php
            msg($ms, $ms_type);
        ?>
    <table class="table table-bordered">
        <thead>
            <th>STT</th>
            <th>Email</th>
            <th>Ngày tạo</th>
            <th>Trạng thái</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </thead>

        <tbody>
            <?php if ($check) { 
                $stt = 0;
                foreach ($check as $key) {
                    $stt++;
                ?>
            <tr>

                <td><?php echo $stt ?></td>
                <td><?php echo htmlspecialchars($key['email']) ?></td>
                <td><?php echo htmlspecialchars($key['create_time']) ?></td>
                <td><?php echo htmlspecialchars($key['status']) == 1 ? '<p class = "btn btn-success btn-sm">Đã kích hoạt<p>' : 
                '<p class = "btn btn-danger btn-sm">Chưa kích hoạt<p>'  ?></td>
                <td><a href="<?php _WEBHOST ?>?modules=admin&action=edit&id=<?php echo htmlspecialchars($key['id'])?>"
                        class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z">
                            </path>
                        </svg>

                    </a>
                </td>
                <td>
                    <a href="<?php echo _WEBHOST ?>?modules=admin&action=delete&email=<?php echo htmlspecialchars($key['email'])?>"
                        class="btn btn-outline-danger"
                        onclick="return confirm('Bạn có chắc muốn xóa người dùng này?');">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path
                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5">
                            </path>
                        </svg>
                    </a>
                </td>

            </tr>
            <?php }}else{ ?>
            <tr colspan="8">
                <td>
                    <div class="alert alert-danger" role="alert">
                        Chưa có người dùng nào!
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>

</div>


<?php
home("foot-admin");
?>