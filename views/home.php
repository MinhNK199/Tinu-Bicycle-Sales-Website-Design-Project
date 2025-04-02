<?php require_once 'layouts/header.php' ?>
<div class="header">
<div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-4 col-xs-12">
                        <div class="currency">
                            <ul>
                                <li>
                                    <a href="#">$ USD <i class="fa fa-caret-down"></i></a>
                                    <ul class="currency-menu">
                                        <li><a href="#">$ USD</a></li>
                                        <li><a href="#">€ EUR</a></li>
                                        <li><a href="#">£ PBP</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="language">
                            <ul>
                                <li>
                                    <a href="#"><img src="assets/img/currency/c1.png" alt=""> English <i class="fa fa-caret-down"></i></a>
                                    <ul class="language-menu">
                                        <li><a href="#"><img src="assets/img/currency/c1.png" alt=""> English</a></li>
                                        <li><a href="#"><img src="assets/img/currency/c2.png" alt=""> Arabic</a></li>
                                        <li><a href="#"><img src="assets/img/currency/c3.png" alt=""> French</a></li>
                                        <li><a href="#"><img src="assets/img/currency/c4.png" alt=""> German</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-8 col-xs-12">
                        <div class="top-bar-menu">
                            <ul>
                                <li><a href="?act=/">My Account</a></li>
                                <li><a href="#"> Wish List (0)</a></li>
                                <li><a href="?act=/"> Shopping Cart</a></li>
                                <li><a href="?act=/"> Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="header-midle">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="logo">
                        <a href="<?= BASE_URL ?>"><img src="assets/img/logo/hele.png" alt="" style="width: 100px;"></a>
                        </div>
                    </div>
                    <div class="col-md-3 hidden-sm hidden-xs">
                        <div class="call-us">
                            <span><i class="fa fa-phone"></i></span> Call Us: +00965888546-32 <br> 
                           
                            
                        </div>
                        
                    </div>
                    <div class="col-md-3 col-sm-4  hidden-xs">
                        <div class="top-email">
                            <?php
                                if(empty($_SESSION['user_client'])){
                                    echo "";
                                }else{?>
                                <span><i class="fa fa-user"></i></span>Wellcome <?= $_SESSION['user_client'] ?>!
                                    <?php
                                }
                            ?>  <br>
                               <?php
                                if(!empty($_SESSION['user_client'])){
                                    ?>
                                        <a href='?act=logout'>Logout</a>
                                <?php }else
                                    {
                                        echo "";
                                    }
                            ?>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="header-middle-right">
                           <div class="login-account">
                                <?php
                                    if(!empty($_SESSION['user_client'])){?>
                                            <a href="?act=form-thong-tin-ca-nhan"><i class="fa fa-user"></i></a>
                                   <?php }else{?>
                                    <a href="?act=login"><i class="fa fa-user"></i></a>
                                  <?php }
                                ?>
                            </div>
                            
                            <div class="mini-cart">
                            <?php
                                    if(!empty($_SESSION['user_client'])){?>
                                            <a href="?act=gio-hang" class="cart-icon"><i class="fa fa-shopping-bag"></i></a>
                                   <?php }else{?>
                                    <a href="?act=login" class="cart-icon"><i class="fa fa-shopping-bag"></i></a>
                                  <?php }
                                ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom sticky-header">
            <div class="header-bottom-inner">
            <div class="container">
                    <div class="row">
                        <div class="mgeamenu-full-width">
                            <div class="col-md-9 col-sm-6 col-xs-3">
                                <div class="main-menu hidden-sm hidden-xs">
                                    <nav>
                                        <ul>
                                            <li><a class="home" href="?act=/"><i class="fa fa-home"></i></a>
                                               
                                            </li>
                                            <li><a href="?act=/">Trang chủ</a></li>
                                            <li class="mega_parent"><a href="?act=shop.php">Sản phẩm</a>
                                                
                                            </li>
                                           
                                            <li><a href="?act=tin-tucs">Tin tức  </a></li>
                                            <li class="mega_parent mega-item2"><a href="?act=lien-hes">Liên hệ</a>
                                            <?php
                                                if(!isset($_SESSION['user_client'])) {
                                                    echo "<li><a href='?act=login'>Đăng Nhập</a></li>";
                                                }
                                                else{
                                                    echo "<li><a href='?act=lich-su-mua-hang'>Đơn hàng</a></li>";
                                                    echo "<li><a href='?act=logout'>Đăng xuất</a></li>";
                                                }
                                            ?>
                                            
                                            </li>
                                            
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-9">
                                <div class="search-area">
                                   <div class="search-box-inner">
                                        <form action="?act=sreach" method="POST">
                                           <input type="text" name="sreach" placeholder="Search">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                

            </div>
        </div>
    </div>
    <!--header end-->

    <!--slider-area start-->
        <div class="slider-container overlay">
			<!-- Slider Image -->
			<div id="mainSlider" class="nivoSlider slider-image">
				<img src="assets/img/slider/slider-1.jpg" alt="" title="#htmlcaption1"/>
				<img src="assets/img/slider/slider-2.jpg" alt="" title="#htmlcaption2"/>
				<img src="assets/img/slider/slider-3.jpg" alt="" title="#htmlcaption3"/>
			</div>
			<!-- Slider Caption 1 -->
			<div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slide1-text">
                                <div class="middle-text">
                                    <div class="title-1 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
                                        <h1>New <br> Collection</h1>
                                    </div>
                                    <div class="shop-now wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                                        <a href="shop.html">Shop Now</a>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>	
                </div>
			</div>
			<div id="htmlcaption2" class="nivo-html-caption slider-caption-1">
			   <div class="container ">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slide1-text">
                                <div class="middle-text">
                                    <div class="title-1 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
                                        <h1>New <br> Collection</h1>
                                    </div>
                                    <div class="shop-now wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                                        <a href="shop.html">Shop Now</a>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>	
                </div>
			</div>
			<div id="htmlcaption3" class="nivo-html-caption slider-caption-1">
			   <div class="container ">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slide1-text">
                                <div class="middle-text">
                                    <div class="title-1 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
                                        <h1>New <br> Collection</h1>
                                    </div>
                                    <div class="shop-now wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                                        <a href="shop.html">Shop Now</a>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>	
                </div>
			</div>
		</div>
    <!--slider-area end-->
    <!--benner-area start-->
    
    
    <!--benner-area end-->
    <!--new-product-area start-->
    <div class="new-product-area gray-bg section-pedding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title gray text-center">
                        <h2>New Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <br><br>
                            
    <?php 
                foreach ($sanpham as $sp):
                ?>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="single-product text-center">
                        
                        <div class="single-product-inner">
                            <div class="product-img">
                            <a href="?act=detail_san_pham&san_pham_id=<?= $sp['id'] ?>" class="link-success fs-15"><img src="<?= $sp['anh_sp'] ?>" alt=""></a>
                            </div>
                            <div class="product-details">
                            <h3><a href="?act=detail_san_pham&san_pham_id=<?= $sp['id'] ?>" class="link-success fs-15"><?= $sp['ten_sp'] ?></a></h3>
                                
                                <div class="price-box">
                                    
                                <div class="old-price"><span>
                                                <p><?= number_format($sp['gia_ban'], 0, ',', '.') ?> VND</p>
                                            </span></div>
                                       <br> <div class="new-price"><span>
                                                <p><?= number_format($sp['gia_khuyen_mai'], 0, ',', '.') ?> VND</p>

                                            </span></div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php 
                    endforeach;
                    ?>

                    
            <div class="row">
                <div class="col-md-12">
                    <div class="all-product text-center">
                        <a href="?act=shop.php">See All Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br>
    <br><br><br>
    <!--new-product-area end-->
    <!--accessories-area start-->
    
    <!--accessories-area end-->
    <!--brand-area start-->
    
    <!--brand-area end-->
    <?php require_once 'layouts/footer.php' ?>
