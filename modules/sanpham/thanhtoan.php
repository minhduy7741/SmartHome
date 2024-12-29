<?php
$_alert = null;
function check_string($data)
{
    return trim(htmlspecialchars(addslashes($data)));
}
    $name   = "BIDV";
    $stk    = "1170191092";
    $money  = 50000;
    $tentk  = "VAN TUAN";
    $nd     = "nhin ";
    $temp   = "print";
    if(!$name) {
        echo 'Bạn chưa chọn ngân hàng';
    } else if(!$stk) {
        echo 'Bạn chưa điền số tài khoản';
    } else {
        // $url = "https://api.vietqr.io/$name/$stk/$money/$nd/vietqr_net_2.jpg";
        $url = "https://img.vietqr.io/image/$name-$stk-$temp.png?amount=$money&addInfo=$nd&accountName=$tentk";
    }

function customUrlDecode($value) {
    $value = str_replace('%2B', ' ', $value);
    // Nếu có các quy tắc giải mã khác, bạn có thể thêm vào đây
    return $value;
}
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">



<body>

    <div class="outer subpage" style="height: 4285.31px; width: 980px; overflow: hidden">

        <div id="scrollContent" class="inner scrollContent scrollSwipe" style="
          display: block;
          transform: scale(1.27539);
          margin-left: 0.25px;
          height: auto;
          overflow: hidden;
          outline: none;
        " data-scale-ratio="1.275390625" data-scrollbar="true" tabindex="-1">
            <div class="scroll-content" style="transform: translate3d(0px, 0px, 0px)">

                <br> <br> <br> <br>
                <section class="section section--2"> <br> <br> <br> <br>




                    <div class="container">
                        <div class="chuc-nang">
                            <div class="title">

                                <div class="content">
                                    <div class="row">





                                        <?php if(isset($url)) { ?>
                                        <center><img src="<?=$url;?>">
                                            <div class="col-md-1" style="float:none;margin:0 auto;">

                                            </div>
                                        </center>
                                        <?php } ?>
                                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                                            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                                            crossorigin="anonymous"></script>
                                        <script
                                            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                                            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                                            crossorigin="anonymous"></script>
                                        <script
                                            src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
                                            integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
                                            crossorigin="anonymous"></script>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <script>
                $(document).ready(function() {
                    $('#modal-alert').modal('show');
                })
                </script>