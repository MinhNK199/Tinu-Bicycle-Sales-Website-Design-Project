<?php require_once 'views/layouts/header.php' ?>
<?php require_once 'views/layouts/menu.php' ?>

<!--breadcrumbs-area start -->
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert"></a>
                    <i class="fa fa-check"></i>
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php } elseif (isset($_SESSION['errors'])) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert"></a>
                    <i class="fa fa-exclamation-triangle"></i>
                    <?php 
                    // Loop through each error and display it
                    foreach ($_SESSION['errors'] as $error) {
                        echo '<div>' . htmlspecialchars($error) . '</div>'; // Sanitize output
                    }
                    ?>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php } ?>

    <div class="row"><br>
            <div class="container">
            <!-- left column -->
            <form action="?act=sua-thong-tin-ca-nhan" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $thongTin['id'] ?>">
                <div class="col-md-3">
                    <div class="text-center">
                        <img src="<?= $thongTin['avartar'] ?>" style="width: 200px;" class="avatar img-circle"
                            alt="avatar" onerror="this.onerror=null;this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcazeHuAcZDzv4_61fPLT-S00XnaKXch2YWQ&s';"
                            alt="Avatar" error>

                        <h6><br>Họ tên: <?= $thongTin['ten_nguoi_dung'] ?></h6>
                        <input type="file" name="avartar" class="form-control"> 
                        <br>
                        <!-- <input type="file" class="form-control"> -->
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <h3>Thong tin ca nhan</h3>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Ho ten:</label>
                        <div class="col-lg-12">
                            <input class="form-control" type="text" name="ten_nguoi_dung"
                                value="<?= $thongTin['ten_nguoi_dung']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">SDT:</label>
                        <div class="col-lg-12">
                            <input class="form-control" type="text" name="sdt" value="<?= $thongTin['sdt']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-12">
                            <input class="form-control" type="text" name="email" value="<?= $thongTin['email']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Ngày Sinh:</label>
                        <div class="col-lg-12">
                            <input class="form-control" type="date" name="ngay_sinh"
                                value="<?= $thongTin['ngay_sinh']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Giới tính:</label>
                        <div class="col-lg-12">
                                
                        <select id="ForminputState" class="form-select" name="gioi_tinh">
                                        <option selected disabled><?= $thongTin['gioi_tinh'] == 0? 'Giới tính' : ''?></option>
                                        <option value="1" <?= $thongTin['gioi_tinh'] == 1? 'selected' : ''?>>Nam</option>
                                        <option value="2" <?= $thongTin['gioi_tinh'] == 2? 'selected' : ''?>>Nữ</option>
                                        <option value="3" <?= $thongTin['gioi_tinh'] == 3? 'selected' : ''?>>Khác</option>
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Địa chỉ:</label>
                        <div class="col-lg-12">
                            <input class="form-control" type="text" name="dia_chi" value="<?= $thongTin['dia_chi']?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Save Changes">

                        </div>
                    </div>
            </form>
            <hr>

            
            

            <!-- <?php if(isset($_SESSION['errors'])) { ?>
                            <div class="alert alert-danger alert-dismissable">
                                <a class="panel-close close" data-dismiss="alert"></a>
                                <i class="fa fa-exclamation-triangle"></i>
                                <?php foreach($_SESSION['errors'] as $error) { ?>
                                    <p><?= $error ?></p>
                                <?php } ?>
                            </div>
                            <?php unset($_SESSION['errors']); ?>
                        <?php } ?> -->
            <form action="?act=sua-mat-khau-ca-nhan" method="post">
                <div class="form-group">
                    <label class="col-md-3 control-label">Mat khau cu:</label>
                    <div class="col-md-12">
                        <input class="form-control" type="text" name="old_pass" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">May khau moi:</label>
                    <div class="col-md-12">
                        <input class="form-control" type="text" name="new_pass" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Nhap lai mat khau moi</label>
                    <div class="col-md-12">
                        <input class="form-control" type="text" name="confirm_pass" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-primary" value="Save Changes">

                    </div><br>
                </div>

            </form>

            </div>
        
    </div>
                                    <br>

<!--breadcrumbs-area end -->

<!-- account-details Area Start -->

<!-- account-details Area end -->
<?php require_once 'views/layouts/footer.php' ?>