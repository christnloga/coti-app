<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="../assets/images/logo.svg">
                        </div>
                        <h4>Hello! let's get started</h4>
						<h6 class="font-weight-light">Sign in to continue.</h6>
						<?php echo validation_errors(); ?>
						<?php echo form_open('user/register'); ?>
							<div class="md-form">
								<input type="text" class="form-control" name="name" required autofocus>
								<label>Full Name</label>
							</div>
							<div class="md-form">
								<input type="email" class="form-control" name="email" required autofocus>
								<label>Email</label>
							</div>
							<div class="md-form">
								<input type="text" class="form-control" name="username" required autofocus>
								<label>Username</label>
							</div>
                            <div class="md-form">
								<input type="text" class="form-control" name="role" required autofocus>
								<label>Role</label>
							</div>
                            <div class="md-form">
                                <input type="password" name="password" class="form-control" required autofocus>
                                <label for="Form-email1">Password</label>
                            </div>

                            <div class="md-form pb-3">
                                <input type="password" name="password2" class="form-control" required autofocus>
                                <label for="Form-pass1">confirm password</label>
                                
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-rounded btn-gradient-primary btn-lg font-weight-medium auth-form-btn z-depth-2">
                                    Register
                                </button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
