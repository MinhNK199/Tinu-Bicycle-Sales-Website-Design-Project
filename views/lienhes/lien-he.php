<?php require_once 'views/layouts/header.php' ?>
<?php require_once 'views/layouts/menu.php' ?>
<!--header end-->
<!--breadcrumbs-area start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="?act=/">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li><a href="?act=lien-hes">Liên Hệ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs-area end -->

<!--contact-area start-->
<div class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-message">
                    <h4>Liên hệ</h4>
                    <?php
                    if (!empty($_SESSION['success'])) {
                        echo '<p class="form-messege" style="color: green;">' . $_SESSION['success'] . '</p>';
                        unset($_SESSION['success']);
                    } else {
                        echo '<p class="form-messege"></p>';
                    }
                    ?>
                    <form action="?act=them-lien-he" method="POST">
                        <p class="form-messege"></p>
                        <!-- <label for="" class="">Tên email</label> -->
                        <div class="single-input">
                            <input name="email" type="email" placeholder="E-mail">
                            <span style="color: red;">
                                <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
                            </span>
                        </div>
                        <div class="single-input">
                            <textarea name="noi_dung" class="form_control" placeholder="Message"></textarea>
                            <span style="color: red;">
                                <?= !empty($_SESSION['errors']['noi_dung']) ? $_SESSION['errors']['noi_dung'] : '' ?>
                            </span>
                        </div>
                        <div class="send-button">
                            <button type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-1">
                <div class="google-address">
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="service-cont">
                            <h5>Office Address</h5>
                            <p>101 California St <br>101 California St, San Francisco, CA 94111</p>
                        </div>
                    </div>
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="service-cont ser-contct">
                            <h5>Phone</h5>
                            <p>+123 456 788 09
                                <br> +123 456 789 220
                            </p>
                        </div>
                    </div>
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="service-cont">
                            <h5>E-mail Address</h5>
                            <p>tinu@gmail.com
                                <br> www.tinu.com.uk
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--contact-area end-->
<!-- map-area start -->
<div class="map-area">
    <div id="googleMap" style="width:100%;height:400px;"></div>
</div>

<!-- map-area end -->
<?php require_once 'views/layouts/footer.php' ?>
<!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
    function initialize() {
        var mapOptions = {
            zoom: 15,
            scrollwheel: false,
            center: new google.maps.LatLng(21.0381298, 105.7446869)
        };

        var map = new google.maps.Map(document.getElementById('googleMap'),
            mapOptions);


        var marker = new google.maps.Marker({
            position: map.getCenter(),
            animation: google.maps.Animation.BOUNCE,
            map: map
        });

    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>