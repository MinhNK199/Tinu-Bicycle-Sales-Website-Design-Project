<?php require_once 'views/layouts/header.php' ?>
<?php require_once 'views/layouts/menu.php' ?>

     <!--breadcrumbs-area start -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="index.html">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                        <li>My account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs-area end -->
    
    <!-- account-details Area Start -->
		<div class="customer-login-area">
			<div class="container">
				<div class="row">
					
					<div class="col-sm-12 col-md-6 col-xs-12"style="margin-left: 300px;">
						<div class="customer-register my-account" >
						<form action="?act=register" method="post" class="register">
							<div class="form-fields">
								<h2>Đăng Ký</h2>
								<?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
									<div class="error-messages">
										<?php foreach ($_SESSION['errors'] as $error): ?>
											<p class="text-danger"><?php echo $error; ?></p>
										<?php endforeach; ?>
									</div>
									<?php unset($_SESSION['errors']); // Xóa lỗi sau khi hiển thị ?>
								<?php endif; ?>
								<p class="form-row form-row-wide">
									<label for="reg_email">Họ Tên<span class="required">*</span></label>
									<input type="text" class="input-text" name="ten_nguoi_dung" value="">
								</p>
								<p class="form-row form-row-wide">
									<label for="reg_email">Email address<span class="required">*</span></label>
									<input type="email" class="input-text" name="email" id="reg_email" value="">
								</p>
								<p class="form-row form-row-wide">
									<label for="reg_password">Password<span class="required">*</span></label>
									<input type="password" class="input-text" name="mat_khau" id="reg_password">
								</p>
							</div>
							<div class="form-action">
								<div class="actions-log">
									<input type="submit" class="button"  value="Đăng Ký">
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- account-details Area end -->
<?php require_once 'views/layouts/footer.php' ?>