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
					<div class="col-sm-12 col-md-6 col-xs-12" style="margin-left: 300px;">
						<div class="customer-login my-account">
							<form action="?act=check-login" method="post" class="login">
								<div class="form-fields">
									<h2>Đăng Nhập</h2>
									<?php if(isset($_SESSION['errors'])){?>
                                                <p class="text-danger"><?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?></p>
                                            <?php }else{ ?>
                                                    <p class="text-muted">Tiếp tục đăng nhập vào Tinu.</p></p>
                                            <?php }?>
									<p class="form-row form-row-wide">
										<label for="username">Username or email address <span class="required">*</span></label>
										<input type="text" class="input-text" name="email" id="username" value="">
									</p>
									<p class="form-row form-row-wide">
										<label for="password">Password <span class="required">*</span></label>
										<input class="input-text" type="password" name="mat_khau" id="password">
									</p>
								</div>
								<div class="form-action">	
									<a href="?act=register-client">Bạn không có tài khoản?</a>
									<div class="actions-log">
										<input type="submit" class="button" name="login" value="Đăng Nhập">
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