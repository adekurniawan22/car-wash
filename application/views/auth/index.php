<?php
if ($this->session->userdata('role_id') == 1) {
    redirect('/admin');
} elseif ($this->session->userdata('role_id') == 2) {
    redirect('/employee');
}
?>
<main class="main-content mt-0">
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row mb-8">
                    <div class="col-xl-4 col-lg-8 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                                <p class="mb-0">Enter your username and password.</p>
                            </div>
                            <div class="card-body">
                                <?= $this->session->flashdata('message');
                                unset($_SESSION['message']); ?>
                                <form role="form" action="<?= base_url() ?>" method="post">
                                    <label>Username or Number phone</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Enter Username or Number Phone" name="username">
                                        <?= form_error('username', '<p style="font-size: 12px;color: red;" class="m-2">', '</p>'); ?>
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" placeholder="Enter Password" name="password">
                                        <?= form_error('password', '<p style="font-size: 12px;color: red;" class="m-2">', '</p>'); ?>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Don't have an account?
                                    <a href="<?= base_url() ?>auth/signup" class="text-info text-gradient font-weight-bold">Sign up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('<?= base_url() ?>/assets/img/cover/cover.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>