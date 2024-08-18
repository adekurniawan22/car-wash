<?php
if ($this->session->userdata('role_id') == 2) {
    redirect('employee');
} elseif (empty($_SESSION['role_id'])) {
    redirect('auth');
}
?>
<div class="container-fluid py-4">
    <button class="btn bg-gradient-info btn-sm" data-bs-toggle="modal" data-bs-target="#addVehicle">+Add new vehicle</button>
    <?= $this->session->flashdata('message');
    unset($_SESSION['message']); ?>
    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Vehicles table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vehicle</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($vehicles as $v) : ?>
                                    <tr>
                                        <td>
                                            <span class="ms-3 text-secondary text-xs font-weight-bold"><?= $v['vehicle'] ?></span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold">Rp. <?= $v['price'] ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="" class="badge bg-gradient-success font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#editVehicle<?= $v['vehicle_id'] ?>">
                                                <i class="fa-solid fa-edit"></i> Edit
                                            </a>
                                            <a href="" class="badge bg-gradient-danger font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#deleteVehicle<?= $v['vehicle_id'] ?>">
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

<!-- Modal Add -->
<div class="modal fade" id="addVehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Vehicle</h5>
            </div>
            <form action="<?= base_url('admin/addVehicle') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="vehicle_name" class="form-label">Name Vehicle</label>
                        <input type="text" class="form-control" id="vehicle_name" name="vehicle_name">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn bg-gradient-primary">Add</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal Edit-->
<?php foreach ($vehicles as $a) : ?>
    <div class="modal fade" id="editVehicle<?= $a['vehicle_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Vehicle</h5>
                </div>
                <form action="<?= base_url('admin/editVehicle') ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="vehicle_name" class="form-label">Name Vehicle</label>
                            <input type="text" class="form-control" id="vehicle_name" name="vehicle_name" value="<?= $a['vehicle'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?= $a['price'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="vehicle_id" value="<?= $a['vehicle_id'] ?>">
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
<?php foreach ($vehicles as $a) : ?>
    <div class="modal fade" id="deleteVehicle<?= $a['vehicle_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Vehicle</h5>
                </div>
                <div class="modal-body">
                    Are you sure to delete this vehicle?
                </div>
                <div class="modal-footer">
                    <form action="<?= base_url('admin/deleteVehicle') ?>" method="post">
                        <input type="hidden" name="vehicle_id" value="<?= $a['vehicle_id'] ?>">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn bg-gradient-primary">Yes, Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- End Modal Delete -->