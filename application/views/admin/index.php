<?php
if ($this->session->userdata('role_id') == 2) {
    redirect('employee');
} elseif (empty($_SESSION['role_id'])) {
    redirect('auth');
}
?>
<style>
    .container {
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
    }

    .card {
        align-items: center;
        width: 30%;
        box-shadow: 0px 2px 3px #888888;
    }
</style>
<div class="container">
    <div class="card text-center p-4 me-3">
        <h4><?= $employees ?></h4>
        <h4>Employees</h4>
    </div>
    <div class="card text-center p-4 me-3">
        <h4><?= $transactions ?></h4>
        <h4>Transactions</h4>
    </div>
    <div class="card text-center p-4 me-3">
        <h4>Income</h4>
        <?php
        $jincome = 0;
        foreach ($income as $a) {
            $jincome += $a['amount'] * $a['price'];
        }  ?>
        <h4>Rp. <?= $jincome ?></h4>
    </div>

</div>