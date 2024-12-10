<?php
if ( ! defined("_STATUS") ) {
    echo "Truy cập không hợp lệ...";
    die();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function home($file, $data = ['title' => 'Vietcod']) {
    $path = _WEBDIR."/modules/home/".$file.".php";
    if (file_exists($path)) {
        // Nếu cần truyền thêm dữ liệu, bạn có thể làm như sau:
        if (is_array($data)) {
            extract($data);
        }
        require_once($path);
    } else {
        echo "Chưa gán file vào lớp home!";
    }
}

function isEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function isPhone($phoneNumber) {
    return preg_match("/^[0-9]{10,11}$/", $phoneNumber);
}

function sendMail($to, $subject, $body) {
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vietcod6903@gmail.com';
        $mail->Password   = 'ifaqzaownxrwtupd';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
        $mail->setFrom('vietcod6903@gmail.com', 'Vietcod');
        $mail->addAddress($to);
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->SMTPOptions = array(
            'ssl'=> array(
                'verify_peer'=> false,
                'verify_peer_name'=> false,
                'allow_self_signed'=> true
            ));
        $success = $mail->send();
        return $success;
    } catch (Exception $e) {
        echo "Gửi mail thất bại, lỗi: {$mail->ErrorInfo}";
    }
}

function isPost() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function isGet() {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function filter($data = null) {
    if ($data === null) {
        if (isPost()) {
            $data = $_POST;
        } elseif (isGet()) {
            $data = $_GET;
        } else {
            return null; 
        }
    }

    if (is_array($data)) {
        return array_map('filter', $data);
    }

    if (is_string($data)) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    return $data;
}

function setFlashdata($key, $value) {
    $_SESSION['flashdata'][$key] = $value;
}

function getFlashdata($key) {
    if (isset($_SESSION['flashdata'][$key])) {
        $value = $_SESSION['flashdata'][$key];
        unset($_SESSION['flashdata'][$key]);
        return $value;
    }
    return null;
}

function loadPage($url, $statusCode = 302) {
    if (!preg_match('/^(https?:\/\/|\/)/', $url)) {
        $url = '/' . $url;  
    }
    http_response_code($statusCode);
    header("Location: " . $url);
    exit();
}

function msg($messages, $type) {
    $validTypes = ['success', 'danger', 'info', 'warning']; // Thêm các loại thông báo mới
    $alertType = in_array($type, $validTypes) ? $type : 'danger'; // Kiểm tra loại thông báo hợp lệ

    if ($messages) { // Kiểm tra xem có thông báo không
        // Nếu là mảng, lặp qua và hiển thị mỗi thông báo
        if (is_array($messages)) {
            foreach ($messages as $message) {
                echo '<div class="alert alert-' . htmlspecialchars($alertType) . '" role="alert">';
                echo htmlspecialchars($message);
                echo '</div>';
            }
        } else {
            // Nếu là chuỗi, chỉ hiển thị một thông báo
            echo '<div class="alert alert-' . htmlspecialchars($alertType) . '" role="alert">';
            echo htmlspecialchars($messages);
            echo '</div>';
        }
    }
}

function getSession($key, $default = null) {
    return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
}
?>