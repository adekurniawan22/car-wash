<?php
if ($this->session->userdata('role_id') == 2) {
    redirect('employee');
} elseif (empty($_SESSION['role_id'])) {
    redirect('auth');
}
?>
<div class="container-fluid py-4">
    <?php if (validation_errors()) { ?>
        <div class="alert alert-danger col-4" role="alert">
            <?= validation_errors() ?>
        </div>
    <?php }; ?>
    <?= $this->session->flashdata('message');
    unset($_SESSION['message']); ?>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Employees table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone Number</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Gender</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Member of</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($employees as $e) : ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="<?= base_url('assets/img/profile/') . $e['image'] ?>" class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $e['name'] ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold"><?= $e['username'] ?></span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold"><?= $e['address'] ?></span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold"><?= $e['phone_number'] ?>8</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold"><?= $e['gender'] ?></span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <?php if ($e['is_active'] == 1) : ?>
                                                <span class="badge badge-sm bg-gradient-success">Active<a class="ms-1" href="" data-bs-toggle="modal" data-bs-target="#editEmployee<?= $e['user_id'] ?>"><i class="fa-regular fa-pen-to-square"></i></a></span>
                                            <?php else : ?>
                                                <span class="badge badge-sm bg-gradient-danger">Not Active <a class="ms-1" href="" data-bs-toggle="modal" data-bs-target="#editEmployee<?= $e['user_id'] ?>"><i class="fa-regular fa-pen-to-square"></i></a></span>
                                            <?php endif ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= date("Y-m-d", $e['created']) ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="" class="badge bg-gradient-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#deleteEmployee<?= $e['user_id'] ?>">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<!-- Modal Edit-->
<?php foreach ($employees as $a) : ?>
    <div class="modal fade" id="editEmployee<?= $a['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit status active</h5>
                </div>
                <form action="<?= base_url('admin/editEmployee') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" <?php if ($a['is_active'] == 1) {
                                                                                    echo "checked";
                                                                                } ?> name="is_active" id="is_active" value="1" required>
                                <label class="form-check-label">
                                    Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" <?php if ($a['is_active'] == 0) {
                                                                                    echo "checked";
                                                                                } ?> name="is_active" id="is_active" value="0">
                                <label class="form-check-label">
                                    No Active
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" value="<?= $a['user_id'] ?>">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>


<!-- End Modal Edit -->

<!-- Modal Delete-->
<?php foreach ($employees as $a) : ?>
    <div class="modal fade" id="deleteEmployee<?= $a['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                </div>
                <div class="modal-body">
                    Are you sure to delete this account?
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url('admin/deleteEmployee') ?>" method="post">
                        <input type="hidden" name="user_id" value="<?= $a['user_id'] ?>">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn bg-gradient-primary">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- End Modal Delete -->