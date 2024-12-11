<?php
if (!defined("_STATUS")) {
    echo "Truy cập không hợp lệ...";
    die();
}?>
<!--FOOTER-->

<style>
/* Thêm CSS cho màu sắc */
.time-web #time {
    color: green;
    /* Màu sắc của thời gian */
}
</style>

<footer class="footer-part">

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xl-4">
                <div class="footer-widget">
                    <a class="footer-logo" href="">
                        <img src=<?php _WEBDIR?>"/templates/img/icon.jpg"></a>
                    

                    <div class="time-web">
                        <p id="time" class="footer-desc">
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="footer-widget contact">
                    <h3 class="footer-title">Liên hệ</h3>
                    <ul class="footer-contact">
                        <li>
                            <p>Facebook:
                                <a href="https://zalo.me/g/vdpfln805">LIÊN HỆ</a>
                            </p>
                        </li>
                        <li>
                            <p>Zalo:
                                <a href="https://zalo.me/g/vdpfln805">LIÊN HỆ</a>
                            </p>
                        </li>
                        <li>
                            <p>tuan01107@gmail.com</p>
                        </li>
                        <li>
                            <p>0000000000</p>
                        </li>
                        <li>
                            <p>1Hd- 50, 010 Avenue, NY 90001 United States</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom">
                        <p class="footer-copytext">© All Copyrights Reserved by <a href="#">VT Gaming</a> |
                            Software By <a href="https://vtgame.online">VTGame</a></p>
                        <div class="footer-card">
                            <a href="#">
                                <img src="https://414jgaming.com/assets/demo/ing/01.jpg" alt="payment">
                            </a>
                            <a href="#">
                                <img src="https://414jgaming.com/assets/demo/ing/02.jpg" alt="payment">
                            </a>
                            <a href="#">
                                <img src="https://414jgaming.com/assets/demo/ing/03.jpg" alt="payment">
                            </a>
                            <a href="#">
                                <img src="https://414jgaming.com/assets/demo/ing/04.jpg" alt="payment">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>


<script>
// Đoạn mã JavaScript để tính thời gian hoạt động
function updateActivityTime() {
    // Lấy thời gian hiện tại
    var currentTime = new Date();

    // Thời gian cụ thể bạn muốn tính từ đây
    var specificTime = new Date("2024-05-01T00:00:00"); // Điều chỉnh thời gian này

    // Tính thời gian hoạt động
    var timeDifference = currentTime.getTime() - specificTime.getTime();
    var seconds = Math.floor(timeDifference / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);

    // Hiển thị thời gian hoạt động
    var timeString = days + " ngày, " + (hours % 24) + " giờ, " + (minutes % 60) + " phút, " + (seconds % 60) +
        " giây.";
    document.getElementById("time").innerHTML = "Thời gian hoạt động website: " + timeString;
}

// Cập nhật thời gian hoạt động mỗi giây
setInterval(updateActivityTime, 1000);

// Gọi hàm lần đầu để hiển thị thời gian ban đầu
updateActivityTime();
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Thư viện SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://414jgaming.com/assets/demo/js/jquery-1.12.4.min.js"></script>
<script src="https://414jgaming.com/assets/demo/js/popper.min.js"></script>
<script src="https://414jgaming.com/assets/demo/js/bootstrap.min.js"></script>
<script src="https://414jgaming.com/assets/demo/js/countdown.min.js"></script>
<script src="https://414jgaming.com/assets/demo/js/nice-select.min.js"></script>
<script src="https://414jgaming.com/assets/demo/js/slick.min.js"></script>
<script src="https://414jgaming.com/assets/demo/js/venobox.min.js"></script>
<script src="https://414jgaming.com/assets/demo/js/nice-select.js"></script>
<script src="https://414jgaming.com/assets/demo/js/countdown.js"></script>
<script src="https://414jgaming.com/assets/demo/js/accordion.js"></script>
<script src="https://414jgaming.com/assets/demo/js/venobox.js"></script>
<script src="https://414jgaming.com/assets/demo/js/slick.js"></script>
<script src="https://414jgaming.com/assets/demo/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
flatpickr("#example-flatpickr-range");
</script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<!--FOOTER-->
<!--FOOTER-->
<!--FOOTER-->
<!--FOOTER-->
<!--FOOTER-->

</body>