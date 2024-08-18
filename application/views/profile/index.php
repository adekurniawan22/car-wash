<?php
if (empty($_SESSION['role_id'])) {
    redirect('auth');
}
?>
<div class="container-fluid">
    <?= $this->session->flashdata('message');
    unset($_SESSION['message']); ?>
    <div class="row">
        <div class="col-8">
            <div class="card flex-row flex-wrap">
                <div class="card-header border-0">
                    <img width="300" src="assets/img/profile/<?= $user['image'] ?>" alt="">
                </div>
                <div class="card-block px-2 p-5">
                    <h5 class="card-title"><?= $user['name'] ?></h5>
                    <p class="card-text">Username : <?= $user['username'] ?></p>
                    <p class="card-text">Address : <?= $user['address'] ?></p>
                    <p class="card-text">Phone Number : <?= $user['phone_number'] ?></p>
                    <p class="card-text">Member of : <?= date('d-F-Y ', $user['created']) ?></p>
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfile<?= $user['username'] ?>">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editProfile<?= $user['username'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('profile/editProfile') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="hidden" value="<?= $user['user_id'] ?>" name="user_id">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" class="form-control" id="name" name="username" value="<?= $user['username'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <textarea class="form-control" id="address" name="address"><?= $user['address'] ?></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $user['phone_number'] ?>">
                        </div>
                        <div class="mb-3">
                            <div class="custom-file">
                                <label class="custom-file-label">Choose image</label>
                                <input type="hidden" name="imageold" value="<?= $user['image'] ?>">
                                <input type="file" class="custom-file-input form-control" name="imagenew">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>