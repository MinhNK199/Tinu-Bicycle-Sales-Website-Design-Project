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
                        <li><a href="?act=lien-hes">New</a> <span><i class="fa fa-angle-right"></i></span></li>
                        <li><a href="?act=/s">New detail</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section id="blog-section" class="mt-5">
              <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-box">
                            <!-- <div class="blog-img">
                                <img src="img/blog-box-img-1.png" class="img-fluid">
                            </div> -->
                            
                                <div class="blog-content">
                                    <div class="top-info d-flex justify-content-between align-items-center">
                                        <h5>Admin &nbsp; &nbsp;| &nbsp;&nbsp; <span><?=$tinTuc['ngay_dang']?></span></h5>
                                        <div class="blog-tag">
                                            Web Design
                                        </div>
                                    </div>
                                    <h4 class="mt-2"><?=$tinTuc['tieu_de']?></h4>
                                    <p class="mt-3"><?=$tinTuc['noi_dung']?></p>
                                    <!-- <button type="summit" class="btn btn-primary read-more-btn mt-4">
                                        <a href="?act=chi-tiet-tin-tuc&tin_tuc_id=<= $tinTuc['id'] ?>" class="link-success fs-15">
                                        Read More
                                        </a>
                                    </button> -->
                            </div>
                            
                        </div>

                        <!-- <div class="blog-box mt-5">
                             <div class="blog-img">
                                <img src="img/blog-box-img-2.png" class="img-fluid">
                            </div> 
                            <div class="blog-content">
                                <div class="top-info d-flex justify-content-between align-items-center">
                                    <h5>John Smith &nbsp; &nbsp;| &nbsp;&nbsp; <span><= $tinTuc['ngay_dang'] ?></span></h5>
                                    <div class="blog-tag">
                                        Web Design
                                    </div>
                                </div>
                                <h4 class="mt-2"><= $tinTuc['tieu_de'] ?></h4>
                                <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, seddo iusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis....</p>
                                <button type="button" class="btn btn-primary read-more-btn mt-4">Read More</button>
                            </div>
                        </div>

                        <div class="blog-box mt-5">
                             <div class="blog-img">
                                <img src="img/blog-box-img-3.png" class="img-fluid">
                            </div> 
                            <div class="blog-content">
                                <div class="top-info d-flex justify-content-between align-items-center">
                                    <h5>John Smith &nbsp; &nbsp;| &nbsp;&nbsp; <span><= $tinTuc['ngay_dang'] ?></span></h5>
                                    <div class="blog-tag">
                                        Web Design
                                    </div>
                                </div>
                                <h4 class="mt-2"><= $tinTuc['tieu_de'] ?></h4>
                                <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, seddo iusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis....</p>
                                <button type="button" class="btn btn-primary read-more-btn mt-4">Read More</button>
                            </div>
                        </div> -->

                        <!-- <nav aria-label="..." class="mt-5 mb-5">
                          <ul class="pagination pagination-sm">
                            <li class="page-item active" aria-current="page">
                              <span class="page-link">1</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                          </ul>
                        </nav> -->


                    </div>
                    <!-- <div class="col-md-4">
                        <form class="d-flex search-field mt-4">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <i class="fa fa-search search-icon" aria-hidden="true"></i>
                          </form>

                          <div class="recent-news">
                            <h4>Recent News</h4>

                            <ul>
                                <li class="d-flex align-items-center"> 
                                    <img src="img/blog-box-img-1.png" class="img-fluid"> 
                                    <div class="recent-news-content ms-3">
                                        <a href="#"><h5>Capitalize on low hanging fruit to a indentity</h5></a>
                                        <p>May 05, 2022</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center"> 
                                    <img src="img/blog-box-img-2.png" class="img-fluid"> 
                                    <div class="recent-news-content ms-3">
                                        <a href="#"><h5>Organically grow the holistic world view of</h5>
                                        <p>May 05, 2022</p></a>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center"> 
                                    <img src="img/blog-box-img-3.png" class="img-fluid"> 
                                    <div class="recent-news-content ms-3">
                                        <a href="#"><h5>Bring to the table win-win survival strategy</h5></a>
                                        <p>May 05, 2022</p>
                                    </div>
                                </li>
                            </ul>
                          </div>

                          <div class="recent-news">
                            <h4>Categories</h4>

                            <ul>
                                <li class="d-flex align-items-center"> 
                                    <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#"><h5 class="ms-3">Web Design  <span>(8)</span></h5></a>
                                </li>
                                <li class="d-flex align-items-center"> 
                                    <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#"><h5 class="ms-3">Web Development  <span>(10)</span></h5></a>
                                </li>
                                <li class="d-flex align-items-center"> 
                                    <i class="fa fa-angle-right" aria-hidden="true"></i><a href="#"> <h5 class="ms-3">Ux Design  <span>(7)</span></h5></a>
                                </li>
                                <li class="d-flex align-items-center"> 
                                    <i class="fa fa-angle-right" aria-hidden="true"></i><a href="#"> <h5 class="ms-3">Branding  <span>(2)</span></h5></a>
                                </li>
                                <li class="d-flex align-items-center"> 
                                    <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#"><h5 class="ms-3">Digital Marketing  <span>(6)</span></h5></a>
                                </li>
                                <li class="d-flex align-items-center"> 
                                    <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="#"><h5 class="ms-3">Graphics  <span>(4)</span></h5></a>
                                </li>
                            </ul>
                          </div>

                          <div class="recent-news popular-tags">
                            <h4>Popular Tags</h4>

                            <ul class="d-flex flex-wrap">
                                <a href="#"><li > 
                                    <h5>Web Design</h5>
                                </li></a>
                                <a href="#"><li > 
                                    <h5>Branding</h5>
                                </li></a>
                                <a href="#"><li > 
                                    <h5>SEO</h5>
                                </li></a>
                                <a href="#"><li > 
                                    <h5>Web Development</h5>
                                </li></a>
                                <a href="#"><li > 
                                    <h5>Landing Page</h5>
                                </li></a>
                                <a href="#"><li > 
                                    <h5>UI | UX Design</h5>
                                </li></a>
                                
                            </ul>
                          </div>
                    </div> -->
                </div>
              </div>
          </section>

        </section>

    <!--breadcrumbs-area end -->

    <!-- Header -->
  <!-- <header class="bg-dark text-white py-5">
    <div class="container text-center">
      <h1>Chào Mừng Bạn Đến Với Tin Tức 24h</h1>
      <p>Cập nhật tin tức nhanh chóng, chính xác nhất.</p>
    </div>
  </header> -->

  <!-- Content -->
  <!-- <main class="container my-5">
  <div class="container text-center">
      <h1>Chào Mừng Bạn Đến Với Tin Tức 24h</h1>
      <p>Cập nhật tin tức nhanh chóng, chính xác nhất.</p>
    </div>
    <div class="row"> -->
      <!-- Main News -->
      <!-- <div class="col-lg-8">
        <h2 class="mb-4">Tin Nổi Bật</h2>
        <div class="card mb-4">
           <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="News Image"> 
          <div class="card-body">
            <h5 class="card-title"><= $tinTuc['tieu_de'] ?></h5>
            <p class="card-text"><= $tinTuc['ngay_dang'] ?></p>
            <a href="?act=chi-tiet-tin-tuc" class="btn btn-primary">Đọc thêm</a>
          </div>
        </div>
      </div> -->

     
    <!-- </div>
  </main> -->
  




<?php require_once 'views/layouts/footer.php' ?>
