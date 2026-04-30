  <div class="container-fluid">
    <!--Modal: modalPush-->
    <div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
        <div class="modal-dialog modal-notify modal-default" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="col-sm-12 mt-3 text-center">
                    <img class="rouded circle" src="<?php echo site_url(); ?>assets/images/profile/<?php echo $user['user_pic']; ?>" alt="" style="max-height: 100px;">
                </div>
                <!--Body-->
                <div class="modal-body">
                    <?php echo form_open('user/edit_profile'); ?>
                    <div class="form-group">
                        <label for="Full-Name">Full Name</label>
                        <input type="text" value="<?php echo $user['name'] ?>" name="name" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="Username">Userame</label>
                        <input type="text" value="<?php echo $user['username'] ?>" name="username" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="Form-email1">Email</label>
                        <input type="email" value="<?php echo $user['email'] ?>" name="email" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="Form-email1">New password</label>
                        <input type="password" name="password" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="Form-email1">Confirm Password</label>
                        <input type="password" name="password2" class="form-control" required autofocus>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer flex-center">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <a type="button" class="btn btn-outline-info btn-fw" data-dismiss="modal">Cancel</a>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: modalPush-->

    <!--ADD USER MODAL-->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
        <div class="modal-dialog modal-default" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="text-center my-3">
                    <h3 class="my-3 text-white">New User</h3>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('user/register'); ?>
                    <div class="form-group">
                         <label>Full Name</label>
                        <input type="text" class="form-control" name="name" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <input type="text" class="form-control" name="role" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="Form-email1">Password</label>
                        <input type="password" name="password" class="form-control" required autofocus>
                    </div>
                    <div class="form-group pb-3">
                        <label for="Form-pass1">confirm password</label>
                        <input type="password" name="password2" class="form-control" required autofocus>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer flex-center">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <a type="button" class="btn btn-outline-info btn-fw" data-dismiss="modal">Cancel</a>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--ADD USER MODAL-->

    <div class="content-wrapper animated fadeIn">
        <div class="page-header my-4">
            <h2 class="text-default">
                <span class="mr-2 z-depth-0">
                    <i class="fa fa-cogs"></i>
                </span> Profile Settings 
            </h2>
        </div>
        <div class="card z-depth-0">
            <div class="card-body">
                <div class="row pb-3" style="border-bottom: 1px solid #d2d1d1">
                    <div class="col-md-3 col-sm-12">
                        <div class="mt-3">
                            <h2>Profile info</h2>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-12">
                        <div class="text-right">
                            <button type="button" data-toggle="modal" data-target="#modalPush" class="btn z-depth-0">
                                <i class="mdi mdi-border-color mdi-24px text-primary"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2 col-sm-12 mt-3">
                        <a>
                            <img class="" src="<?php echo site_url(); ?>assets/images/profile/<?php echo $user['user_pic']; ?>" alt="" style="max-height: 100px;">
                        </a>
                    </div>
                    <div class="col-md-10 col-sm-12">
                        <ul class="text-lg-left list-unstyled mt-4">
                            <li class="list-item">
                                <p class="font-weight-bold text-capitalize">Full name : <span class="mr-5 font-weight-normal"><?php echo $user['name'] ?></span></p>
                            </li>
                            <li class="list-item">
                                <p class="font-weight-bold text-capitalize">username : <span class="mr-5 font-weight-normal"><?php echo $user['username'] ?></span></p>
                            </li>
                            <li class="list-item">
                                <p class="font-weight-bold text-capitalize">role : <span class="mr-5 font-weight-normal"><?php echo $user['role'] ?></span></p>
                            </li>
                            <li class="list-item">
                                <p class="font-weight-bold">email : <span class="mr-5 font-weight-normal"><?php echo $user['email'] ?></span></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-5 z-depth-0">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="">
                            <h2>Other Users</h2>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <a class="btn btn-primary text-white" roll="btn" data-toggle="modal" data-target="#addUser"> <i class="fa fa-plus mr-2"></i>Add a user</a>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="font-weight-bold"> Avatar </th>
                            <th class="font-weight-bold"> full Name </th>
                            <th class="font-weight-bold"> Username </th>
                            <th class="font-weight-bold"> Email </th>
                            <th class="font-weight-bold"> Role </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $userr) : ?>
                            <tr>
                                <td> <img class="" src="<?php echo site_url(); ?>assets/images/profile/<?php echo $userr['user_pic']; ?>" alt="" style="max-height: 50px;"> </td>
                                <th> <?php echo $userr['name'] ?> </th>
                                <th> <?php echo $userr['username'] ?> </th>
                                <th> <?php echo $userr['email'] ?> </th>
                                <th> <?php echo $userr['role'] ?> </th>
                                <td>
                                    <?php if (!$this->session->userdata('logged_in')) : ?>
                                        <?php echo form_open('/users/delete/' . $userr['id']); ?>
                                        <button type="submit" class="btn btn-danger btn-sm waves-effect">Delete</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>