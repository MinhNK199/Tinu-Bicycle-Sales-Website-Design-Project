<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "layouts/libs_css.php";
    ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "layouts/header.php";

        require_once "layouts/siderbar.php";
        ?>
        
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">Good Morning, <?= $_SESSION['user_admin'] ?>!</h4>
                                                <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                                            </div>
                                            <div class="mt-3 mt-lg-0">
                                                <form action="javascript:void(0);">
                                                    <div class="row g-3 mb-0 align-items-center">
                                                       
                                                        <!--end col-->
                                                        <div class="col-auto">
                                                            <button type="button" class="btn btn-soft-info btn-icon waves-effect material-shadow-none waves-light layout-rightside-btn"><i class="ri-pulse-line"></i></button>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </form>
                                            </div>
                                        </div><!-- end card header -->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->

                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Tổng Doanh Thu</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><?php echo number_format($tongDoanhThu, 0, '.', ','); ?>VND  </h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                                            <i class="bx bx-dollar-circle text-success"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Đơn hàng</p>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><?php echo $soLuongDonHang; ?></h4>
                                                        
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        
                                                        <span class="avatar-title bg-info-subtle rounded fs-3">
                                                            <i class="bx bx-shopping-bag text-info"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                    <div class="col-xl-4 col-md-6">
                                        <!-- card -->
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Khách hàng</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><?php echo $soLuongKhachHang; ?> </h4>

                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                            <i class="bx bx-user-circle text-warning"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->

                                   
                                </div> <!-- end row-->

                                <div class="row">
                                    <div class="col-xl-8">
                                            <div class="card">
                                                <div class="card-header border-0 align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Biểu đồ cột</h4>
                                                </div><!-- end card header -->

                                        

                                                <div class="card-body p-0 pb-2">
                                                    <div class="w-100">
                                                        <div id="revenue_chart" class="apex-charts" dir="ltr"></div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <!-- Kết nối thư viện ApexCharts -->
                                        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                                        <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            // Lấy dữ liệu doanh thu từ PHP
                                            var doanhThu = <?php echo json_encode($doanhThuTheoNgay); ?>;

                                            var labels = [];
                                            var data = [];

                                            // Tạo mảng labels và data từ dữ liệu đã lấy ra
                                            doanhThu.forEach(function(item) {
                                                labels.push(item.date);        // Gán ngày vào labels
                                                data.push(parseFloat(item.total)); // Gán tổng vào data
                                            });

                                            var options = {
                                                chart: {
                                                    type: 'bar', // Chọn loại biểu đồ cột
                                                    height: 350
                                                },
                                                series: [{
                                                    name: 'Tổng Doanh Thu',
                                                    data: data // Dữ liệu tổng doanh thu theo ngày
                                                }],
                                                xaxis: {
                                                    categories: labels // Các nhãn trên trục x
                                                },
                                                title: {
                                                    text: 'Doanh Thu Theo Ngày'
                                                }
                                            };

                                            var chart = new ApexCharts(document.querySelector("#revenue_chart"), options);
                                            chart.render();
                                        });
                                        </script>
                                    
                                    <div class="col-xl-4">
                                        <div class="card card-height-100">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Biểu đồ thống kê</h4>
                                               
                                            </div><!-- end card header -->

                                            <div class="card-body">
                                                <div id="store-visits-source" class="apex-charts"></div>
                                            </div>
                                        </div> <!-- .card -->
                                    </div> <!-- .col -->

                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            var options = {
                                                chart: {
                                                    type: 'pie' // Chỉnh loại biểu đồ thành pie
                                                },
                                                series: [
                                                    
                                                    <?php echo $soLuongDonHang; ?>,
                                                    <?php echo $tongSanPham; ?>,
                                                    <?php echo $soLuongKhachHang; ?>
                                                ],
                                                labels: ['Số Lượng Đơn Hàng', 'Số Lượng Sản Phẩm', 'Số Lượng Khách Hàng'],
                                                colors: ['#FF4560', '#008FFB', '#00E396', '#775DD0'],
                                                title: {
                                                    text: ''
                                                }
                                            };

                                            var chart = new ApexCharts(document.querySelector("#store-visits-source"), options);
                                            chart.render();
                                        });
                                    </script>
                                    <!-- end col -->
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="card">
                                            

                                            <div class="card-body"> 
                                                <h5>5 Sản Phẩm Mới Nhất</h5>
                                                <div class="table-responsive table-card">
                                                    <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                                        <thead>
                                                            
                                                        </thead>
                                                        <tbody>
                                                        <br>
                                                            <?php if (!empty($loadSanPham_5)): ?>
                                                                <?php foreach ($loadSanPham_5 as $product): ?> 
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-flex align-items-center">
                                                                                
                                                                                <img src="<?= BASE_URL . $product['anh_sp'] ?>" style="width: 60px" alt=""
                                                                                onerror="this.onerror = null; this.src ='">
                                                                                
                                                                                
                                                                            </div>
                                                                        </td>
                                                                        <td><span class="text-muted">Tên</span>
                                                                            <h5 class="fs-14 my-1 fw-normal"></h5><?php echo htmlspecialchars($product['ten_sp']); ?>
                                                                            
                                                                        </td>
                                                                    
                                                                        <td>
                                                                        <span class="text-muted">Giá</span>
                                                                            <h5 class="fs-14 my-1 fw-normal"><?php echo number_format($product['gia_ban'], 0, ',', '.') . " VNĐ"; ?></h5>
                                                                        </td>
                                                                        <td>
                                                                        <span class="text-muted">Số Lượng</span>
                                                                            <h5 class="fs-14 my-1 fw-normal"><?php echo number_format($product['so_luong'], 0, ',', '.'); ?></h5> <!-- Giả sử bạn có tổng tiền -->
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <td colspan="6" class="text-center">Không có sản phẩm nào.</td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="card card-height-100">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Top 5 Đơn hàng mới nhất</h4>
                                            </div><!-- end card header -->

                                            <div class="card-body">
                                                <div class="table-responsive table-card">
                                                    <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                                                        <thead>
                                                            <!-- <tr>
                                                                <th>Mã đơn hàng</th>
                                                                <th>Ngày đặt</th>
                                                                <th>Phương Thức thanh toán</th>
                                                                <th>Trạng thái thanh toán</th>
                                                                <th>Trạng thái đơn hàng</th>
                                                            </tr> -->
                                                        </thead>
                                                        <tbody>
                                                            <?php if (!empty($loadDonHang_5)): ?>
                                                                <?php foreach ($loadDonHang_5 as $order): ?>
                                                                    <tr>
                                                                        <td><span class="text-muted">Mã đơn hàng</span>
                                                                            <h5 class="fs-14 my-1 fw-medium">
                                                                                <a href="apps-ecommerce-order-details.html" class="text-reset"><?php echo htmlspecialchars($order['ma_don_hang']); ?></a> <!-- Nếu có trường tên khách hàng -->
                                                                            </h5>
                                                                        </td>
                                                                        <td><span class="text-muted">Ngày đặt</span>
                                                                            <span class="text-muted"><?php echo htmlspecialchars($order['ngay_dat']); ?></span> <!-- Nếu có trường tên sản phẩm -->
                                                                        </td>
                                                                        <td><span class="text-muted">Phương Thức</span>
                                                                            <p class="mb-0"><?php  if($order['phuong_thuc_thanh_toan_id'] == 1){
                                                                                    echo "Thanh toán khi nhận hàng";
                                                                            }else{
                                                                                    echo "Thanh toán online";
                                                                            } ?></p> <!-- Gắn giá trị số lượng -->
                                                                        </td>
                                                                        <td>
                                                                            <span class="text-muted"><?php if( ($order['trang_thai_thanh_toan'] == 1)){
                                                                                    echo "Đã thanh toán";
                                                                                }else{
                                                                                    echo "Chưa thanh toán";
                                                                            } ?></span> <!-- Gắn giá trị tổng tiền -->
                                                                        </td>
                                                                        
                                                                    </tr><!-- end -->
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <td colspan="5" class="text-center">Không có đơn hàng nào.</td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table><!-- end table -->
                                                </div>
                                            </div><!-- .card-body-->
                                        </div><!-- .card-->
                                    </div><!-- .col-->
                                </div> <!-- end row-->

                                 <!-- end row-->

                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "layouts/libs_js.php";
    ?>

</body>

</html>