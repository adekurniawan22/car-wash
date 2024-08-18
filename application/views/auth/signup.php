<?php
if ($this->session->userdata('role_id') == 1) {
    redirect('/admin');
} elseif ($this->session->userdata('role_id') == 2) {
    redirect('/employee');
}
?>
<section class="p-3 mt-3">
    <div class="container bg-cover border-bottom" style="background-image: url(<?= base_url() ?>assets/img/cover/cover.jpg);">
        <div class="row p-3">
            <div class="col-xl-6 mx-auto mt-4 mb-4">
                <div class="card z-index-0">
                    <div class="card-body">
                        <h5 class="text-center mb-3">Sign Up</h5>
                        <form role="form text-left" action="<?= base_url('auth/signup') ?>" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Enter Full name" name="name" value="<?= set_value('name') ?>">
                                <?= form_error('name', '<p style="font-size: 12px;color: red;" class="m-2">', '</p>'); ?>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Enter Username" name="username" value="<?= set_value('username') ?>">
                                <?= form_error('username', '<p style="font-size: 12px;color: red;" class="m-2">', '</p>'); ?>
                            </div>
                            <div class="main mb-3">
                                <div class="form-check form-check-inline ms-1">
                                    <input class="form-check-input" type="radio" name="gender" value="Male">
                                    <label class="form-check-label">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Female">
                                    <label class="form-check-label">Female</label>
                                </div>
                                <?= form_error('gender', '<p style="font-size: 12px;color: red;" class="m-2">', '</p>'); ?>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Enter Your Number Phone" name="phone_number" value="<?= set_value('phone_number') ?>">
                                <?= form_error('phone_number', '<p style="font-size: 12px;color: red;" class="m-2">', '</p>'); ?>
                            </div>
                            <div class="mb-3">
                                <textarea name="address" class="form-control" placeholder="Enter Your Address"><?= set_value('address') ?></textarea>
                                <?= form_error('address', '<p style="font-size: 12px;color: red;" class="m-2">', '</p>'); ?>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Enter Password" name="password1">
                                <?= form_error('password1', '<p style="font-size: 12px;color: red;" class="m-2">', '</p>'); ?>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="password2">
                                <?= form_error('password2', '<p style="font-size: 12px;color: red;" class="m-2">', '</p>'); ?>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                            </div>
                            <p class="text-sm text-center mt-3 mb-0">Already have an account? <a href="<?= base_url() ?>" class="text-dark font-weight-bolder">Sign in</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>