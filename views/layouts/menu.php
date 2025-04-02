<!--[if lt IE 8]>
        <p>Dotbike html5 murkup all content is here </p>
    <![endif]--> 
    
    <!--header start-->
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
                                        <form action="#">
                                           <input type="text" placeholder="Search">
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