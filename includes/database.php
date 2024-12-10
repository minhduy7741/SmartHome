<?php 
if ( ! defined("_STATUS") ) {
echo "Truy cập không hợp lệ...";
die();
}

function getRow($sql) {
try {
global $conn;

// Kiểm tra kết nối
if (!$conn) {
throw new Exception("Kết nối cơ sở dữ liệu thất bại");
}

// Chuẩn bị câu truy vấn
$stmt = $conn->prepare($sql);
if (!$stmt) {
throw new Exception("Chuẩn bị câu truy vấn thất bại");
}

// Thực thi câu truy vấn
$stmt->execute();

// Lấy kết quả
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Trả về mảng chứa tất cả các hàng
return $rows;

} catch (Exception $e) {
// Nếu có lỗi xảy ra, trả về lỗi
return "Lỗi: " . $e->getMessage();
}
}

function oneRow($sql, $params = []) {
    global $conn;  // Giả sử $pdo là đối tượng PDO đã kết nối đến cơ sở dữ liệu

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : null;
    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }
}

function insert($table, $data) {
global $conn;

// Kiểm tra kết nối
if (!$conn) {
throw new Exception('Kết nối cơ sở dữ liệu thất bại');
}

// Tạo danh sách các cột từ khóa của mảng $data
$columns = implode(", ", array_keys($data));

// Tạo danh sách các giá trị placeholder
$placeholders = implode(", ", array_fill(0, count($data), '?'));

// Tạo câu lệnh SQL
$sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

// Chuẩn bị câu lệnh
$stmt = $conn->prepare($sql);
if (!$stmt) {
throw new Exception('Prepare failed');
}

// Tạo mảng chứa các giá trị
$values = array_values($data);

// Thực thi câu lệnh
$result = $stmt->execute($values);

if (!$result) {
throw new Exception('Execute failed');
}

// Lấy ID của bản ghi được chèn (nếu cần)
$insertId = $conn->lastInsertId();

// Trả về ID của bản ghi được chèn
return $insertId;
}

// Hàm select để lấy dữ liệu từ bảng
function select($table, $conditions = []) {
global $conn;

// Tạo câu lệnh SQL cơ bản
$sql = "SELECT * FROM $table";

// Nếu có điều kiện, thêm vào câu lệnh SQL
if (!empty($conditions)) {
$sql .= " WHERE " . implode(' AND ', array_map(function($key) {
return "$key = :$key";
}, array_keys($conditions)));
}

// Chuẩn bị câu lệnh
$stmt = $conn->prepare($sql);
if (!$stmt) {
throw new Exception('Prepare failed');
}

// Gán tham số cho câu lệnh
foreach ($conditions as $key => $value) {
$stmt->bindValue(":$key", $value);
}

// Thực thi câu lệnh
$stmt->execute();

// Lấy kết quả
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $data;
}

// Hàm kiểm tra sự tồn tại của một bản ghi dựa trên điều kiện
function exists($table, $conditions = []) {
global $conn;

// Tạo câu lệnh SQL cơ bản
$sql = "SELECT 1 FROM $table";

// Nếu có điều kiện, thêm vào câu lệnh SQL
if (!empty($conditions)) {
$sql .= " WHERE " . implode(' AND ', array_map(function($key) {
return "$key = :$key";
}, array_keys($conditions)));
}

// Giới hạn truy vấn chỉ trả về một hàng
$sql .= " LIMIT 1";

// Chuẩn bị câu lệnh
$stmt = $conn->prepare($sql);
if (!$stmt) {
throw new Exception('Prepare failed');
}

// Gán tham số cho câu lệnh
foreach ($conditions as $key => $value) {
$stmt->bindValue(":$key", $value);
}

// Thực thi câu lệnh
$stmt->execute();

// Kiểm tra kết quả
$result = $stmt->fetchColumn();

// Nếu có ít nhất một hàng, trả về true, ngược lại false
return $result !== false;
}

function update($table, $data) {
global $conn;

// Kiểm tra kết nối
if (!$conn) {
throw new Exception("Kết nối thất bại");
}

// Kiểm tra mảng dữ liệu có tồn tại không
if (empty($data) || !isset($data['id'])) {
echo "Dữ liệu không hợp lệ hoặc thiếu ID.";
return;
}

// Xây dựng phần của câu lệnh SET trong SQL
$setPart = [];
foreach ($data as $key => $value) {
if ($key != 'id') {
$setPart[] = "$key = :$key";
}
}
$setString = implode(", ", $setPart);

// Tạo câu lệnh SQL
$sql = "UPDATE $table SET $setString WHERE id = :id";

// Chuẩn bị câu lệnh
$stmt = $conn->prepare($sql);
if (!$stmt) {
throw new Exception("Lỗi chuẩn bị câu lệnh");
}

// Bind các tham số
foreach ($data as $key => $value) {
$stmt->bindValue(":$key", $value);
}

// Thực thi câu lệnh
$result = $stmt->execute();

if ($result) {
echo "Cập nhật thành công.";
} else {
echo "Lỗi: " . $stmt->errorInfo()[2];
}
}

function delete($table, $conditions) {
global $conn;

// Tạo câu lệnh SQL để xóa dữ liệu
$sql = "DELETE FROM $table WHERE ";

if (is_array($conditions)) {
// Tạo điều kiện SQL nếu $conditions là mảng
$condArray = [];
foreach ($conditions as $column => $value) {
$condArray[] = "$column = :$column";
}
$sql .= implode(' AND ', $condArray);
} elseif (is_string($conditions)) {
// Nếu $conditions là chuỗi, thêm trực tiếp vào SQL
$sql .= $conditions;
} else {
echo "Lỗi: Điều kiện không hợp lệ!";
return false;
}

// Chuẩn bị câu lệnh
$stmt = $conn->prepare($sql);
if (!$stmt) {
throw new Exception("Lỗi chuẩn bị câu lệnh");
}

// Bind các tham số nếu là mảng
if (is_array($conditions)) {
foreach ($conditions as $column => $value) {
$stmt->bindValue(":$column", $value);
}
}

// Thực thi câu lệnh
$result = $stmt->execute();

if ($result) {
return true;
} else {
echo "Lỗi: " . $stmt->errorInfo()[2];
return false;
}
}

?>