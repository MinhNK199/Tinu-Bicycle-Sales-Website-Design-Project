<!doctype html>
<html lang="en">

<!-- Mirrored from themestore.sosnok.com/html/dotbike-preview/dotbike/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2024 16:18:56 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tinu | Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <!-- <link rel="shortcut icon" href="style-css/img/logos/favicon.png" /> -->

    <!-- plugins -->
    <link rel="stylesheet" href="style-css/css/plugins.css">

    <!-- quform css -->
    <link rel="stylesheet" href="style-css/quform/css/base.html">

    <!-- theme core css -->
    <link href="style-css/css/styles.css" rel="stylesheet">


    <!-- Place favicon.ico in the root directory -->
    <link href="assets/img/logo/hele.png" type="assets/img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/asset.css">
    <link rel="stylesheet" href="assets/css/nivo-slider.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Modernizr JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- menu -->
    <?php require_once 'views/layouts/menu.php' ?>
    <!-- menu end -->

    <!--header end-->
    <!--breadcrumbs-area start -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="?act=/">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                        <li><a href="?act=tin-tucs">Tin Tức</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row">

                <!-- blog-list left -->
                <div class="col-lg-8 mb-5 mb-lg-0 mt-n2-9">
                    <?php foreach ($tinTucs as $tinTuc) { ?>
                        <article class="card card-style01 border-0 primary-shadow border-radius-10 mt-2-9">
                            <div class="card-image">
                                <!-- <img src="uploads/<php echo $tinTuc['hinh_anh'] ?>"/> -->
                                <img src="style-css/img/blog/blog-01.jpg" class="border-top-10-radius" alt="...">
                            </div>
                            <div class="card-body p-1-6 p-sm-1-9 pt-2-3">
                                <span class="card-icon font-weight-700"><?= $tinTuc['ngay_dang'] ?></span>
                                <div class="mb-3">
                                    <span class="text-capitalize">
                                        <i class="fa fa-user text-secondary me-1"></i>
                                        <a href="#!">Thành</a>
                                    </span>
                                    <span class=" ms-3 d-inline-block">
                                        <i class="fa-solid fa-tags text-secondary me-1"></i>
                                        <a href="#!">Admin</a>
                                    </span>
                                </div>
                                <h3 class="mb-3"><a href="?act=chi-tiet-tin-tuc&tin_tuc_id=<?= $tinTuc['id'] ?>"><?= $tinTuc['tieu_de'] ?></a></h3>
                                <a href="?act=chi-tiet-tin-tuc&tin_tuc_id=<?= $tinTuc['id'] ?>" class="read-more">Read more <i class="fa fa-angle-right align-middle ms-1 display-30"></i></a>
                            </div>

                        </article>
                    <?php } ?>
                </div>
                <!-- end blog-list left -->

                <!-- blog-list right -->
                <div class="col-lg-4">
                    <div class="blog-sidebar ps-lg-1-9">
                        <div class="widget wow fadeIn" data-wow-delay="100ms">
                            <h2 class="h4 mb-3">Latest Posts</h2>
                            <div class="d-flex align-items-center mb-1-6 border-bottom pb-3 border-color-extra-light-gray">
                                <div class="flex-shrink-0 me-4">
                                    <img src="style-css/img/blog/blog-thumb-03.jpg" class="border-radius-5" alt="...">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1"><a href="#">How to Create a Customer-Centric Business Model</a></h6>
                                    <span class="small">Dec 13, 2026</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-1-6 border-bottom pb-3 border-color-extra-light-gray">
                                <div class="flex-shrink-0 me-4">
                                    <img src="style-css/img/blog/blog-thumb-01.jpg" class="border-radius-5" alt="...">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1"><a href="#">Top 10 Strategies for Growing Your Business</a></h6>
                                    <span class="small">Aug 21, 2026</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-4">
                                    <img src="style-css/img/blog/blog-thumb-02.jpg" class="border-radius-5" alt="...">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1"><a href="#">Why Digital Marketing is Crucial for Business Success</a></h6>
                                    <span class="small">May 12, 2026</span>
                                </div>
                            </div>
                        </div>
                        <div class="widget wow fadeIn" data-wow-delay="100ms">
                            <h2 class="h4 mb-3">Follow Us</h2>
                            <div>
                                <ul class="social-icon-style list-unstyled mb-0">
                                    <li>
                                        <a href="#!"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="#!"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end blog-list right -->
            </div>
        </div>
    </section>





    <!--footer start-->
    <div class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="single-footer footer-dec">
                            <div class="footer-logo">
                                <a href="#"><img src="assets/img/logo/hele.png" style=" width: 100px;" alt=""></a>
                            </div>
                            <p class="dec">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                            </p>
                            <div class="social-icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="single-footer">
                            <div class="footer-title">
                                <h4>Pages</h4>
                            </div>
                            <ul class="mainmenu">
                                <li><a href="?act=/"><i class="fa fa-angle-right"></i> Trang chủ</a></li>
                                <li><a href="?act=san-phams"><i class="fa fa-angle-right"></i> Sản phẩm</a></li>
                                <li><a href="?act=tin-tucs"><i class="fa fa-angle-right"></i> Tin tức</a></li>
                                <li><a href="?act=lien-hes"><i class="fa fa-angle-right"></i> Liên hệ</a></li>
                                <li><a href="?act=don-hangs"><i class="fa fa-angle-right"></i> Đơn hàng</a></li>
                                <li><a href="?act=login"><i class="fa fa-angle-right"></i> Đăng nhập</a></li>
                                <li><a href="?act=logout"><i class="fa fa-angle-right"></i> Đăng ký</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="single-footer">
                            <div class="footer-title">
                                <h4>My Account</h4>
                            </div>
                            <ul class="mainmenu">
                                <li><a target="_blank" href="#"><i class="fa fa-angle-right"></i> My Account</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> Wish List (3)</a></li>
                                <li><a target="_blank" href="#"><i class="fa fa-angle-right"></i> Shopping Cart</a></li>
                                <li><a target="_blank" href="#"><i class="fa fa-angle-right"></i> Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="single-footer newsletter">
                            <div class="footer-title">
                                <h4>Newsletter</h4>
                            </div>
                            <p>Subscibe to the Shaeng mailing list to receive updates on new arrivals,offers and other discount information</p>
                            <form action="#">
                                <input type="text" placeholder="Write your e-mail here">
                                <button>Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-botton">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <p>Copyright © dotbike 2022 | Design by <a target="_blank" href="https://dotthemes.com/">dotthemes.com</a> | All rights reserved</p>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <div class="master-card">
                            <a href="#"><img src="assets/img/logo/cont.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer-area end-->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- All js plugins included in this file. -->
    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.nivo.slider.pack.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/mail.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/active.js"></script>

    <!-- jQuery -->
    <script src="style-css/js/jquery.min.js"></script>
    <!-- popper js -->
    <script src="style-css/js/popper.min.js"></script>
    <!-- bootstrap -->
    <script src="style-css/js/bootstrap.min.js"></script>
    <!-- jquery -->
    <script src="style-css/js/core.min.js"></script>
    <!-- form jquery -->
    <script src="style-css/js/formapp.js"></script>
    <!-- custom scripts -->
    <script src="style-css/js/main.js"></script>
    <!-- form plugins js -->
    <script src="style-css/quform/js/plugins.html"></script>
    <!-- form scripts js -->
    <script src="style-css/quform/js/scripts.html"></script>


</body>


<!-- Mirrored from themestore.sosnok.com/html/dotbike-preview/dotbike/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2024 16:18:56 GMT -->

</html>