<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Không tìm thấy trang</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <style>
    /* Reset CSS */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #f2f2f2;
        font-family: 'Poppins', sans-serif;
        overflow: hidden;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #333;
    }

    .container {
        text-align: center;
        z-index: 10;
        position: relative;
        padding: 20px;
    }

    .error h1 {
        font-size: 200px;
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
        color: red;
        text-shadow: 2px 2px 0 #fff;
    }

    .error h1 span {
        display: inline-block;
        transform: rotate(10deg);
    }

    .error h2 {
        font-size: 32px;
        margin-bottom: 20px;
    }

    .error p {
        font-size: 18px;
        margin-bottom: 30px;
    }

    .btn {
        display: inline-block;
        padding: 15px 30px;
        background-color: #00FF99;
        color: #fff;
        text-decoration: none;
        border-radius: 50px;
        font-size: 18px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #00FF99;
    }

    /* Clouds */
    .clouds {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }

    .cloud {
        background-image: url('https://i.imgur.com/QY7Z9qD.png');
        background-size: contain;
        background-repeat: no-repeat;
        position: absolute;
        width: 200px;
        height: 120px;
        opacity: 0.5;
        animation: float 20s linear infinite;
    }

    .cloud-1 {
        top: 10%;
        left: -10%;
        animation-duration: 25s;
    }

    .cloud-2 {
        top: 30%;
        left: -20%;
        animation-duration: 35s;
    }

    .cloud-3 {
        top: 50%;
        left: -15%;
        animation-duration: 30s;
    }

    .cloud-4 {
        top: 70%;
        left: -25%;
        animation-duration: 40s;
    }

    @keyframes float {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(110%);
        }
    }

    /* (Các đoạn CSS trước đó giữ nguyên) */

    /* Thêm hiệu ứng ánh sáng nhấp nháy */
    .error h1 {
        font-size: 200px;
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
        color: #00FF99;
        text-shadow: 2px 2px 0 #fff;
        animation: flicker 3s infinite;
    }

    /* Hiệu ứng nhấp nháy */
    @keyframes flicker {

        0%,
        100% {
            text-shadow: 2px 2px 0 #fff;
        }

        50% {
            text-shadow: 2px 2px 20px rgba(255, 255, 255, 0.6), 0 0 20px rgba(255, 255, 255, 0.6);
        }
    }

    /* Thêm lớp ghost để con ma nhảy */
    .ghost {
        display: inline-block;
        transition: transform 0.3s ease;
    }

    /* Con ma nhảy khi hover */
    .ghost:hover {
        transform: translateY(-20px);
    }

    /* Hiệu ứng chấm theo chuột */
    .dot {
        position: absolute;
        width: 15px;
        height: 15px;
        background-color: #00FF99;
        border-radius: 50%;
        pointer-events: none;
        z-index: 100;
        transform: translate(-50%, -50%);
        transition: transform 0.1s ease;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="error">
            <h1>4<span class="ghost"><i class="fas fa-ghost"></i></span>4</h1>
            <h2>Oops! Không tìm thấy trang</h2>
            <p>Trang bạn đang tìm kiếm có thể đã bị xóa hoặc không tồn tại.</p>
            <a href="/" class="btn">Quay về trang chủ</a>
        </div>
    </div>



    <!-- Custom JS -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hiệu ứng chuột theo
        const dot = document.createElement('div');
        dot.className = 'dot';
        document.body.appendChild(dot);

        document.addEventListener('mousemove', function(e) {
            dot.style.left = `${e.clientX}px`;
            dot.style.top = `${e.clientY}px`;
        });

        // Hiệu ứng khi hover qua con ma
        const ghost = document.querySelector('.ghost');
        ghost.addEventListener('mouseover', function() {
            ghost.classList.add('jump');
        });

        ghost.addEventListener('mouseout', function() {
            ghost.classList.remove('jump');
        });
    });
    </script>
</body>

</html>