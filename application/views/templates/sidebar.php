<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>/assets/img/icon.png">
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="<?= base_url() ?>/assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
    <title><?= $title; ?></title>

</head>

<body class="g-sidenav-show show bg-gray-100">

    <!-- Sidebar -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-2 fixed-start ms-3 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="">
                <img src="<?= base_url() ?>/assets/img/logo.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">App CI CUCI</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-75" id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Main Menu</h6>
                </li>
                <?php if ($this->session->userdata('role_id') == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == 'Dashboard') {
                                                echo 'active';
                                            } ?>" href="<?= base_url('admin') ?>">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                            <span class="nav-link-text ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == 'Transactions') {
                                                echo 'active';
                                            } ?>  " href="<?= base_url('admin/transaction') ?>">
                            <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-receipt"></i>
                            </div>
                            <span class="nav-link-text ms-1">Transactions</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == 'Employees') {
                                                echo 'active';
                                            } ?> " href="<?= base_url('admin/employees') ?>">
                            <div class="icon  icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-people-carry-box"></i>
                            </div>
                            <span class="nav-link-text ms-1">Employees</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == 'Vehicles') {
                                                echo 'active';
                                            } ?> " href="<?= base_url('admin/vehicles') ?>">
                            <div class="icon  icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-car-side"></i>
                            </div>
                            <span class="nav-link-text ms-1">Vehicles</span>
                        </a>
                    </li>
                <?php }; ?>

                <?php if ($this->session->userdata('role_id') == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == 'Transactions') {
                                                echo 'active';
                                            } ?> " href="<?= base_url('employee') ?>">
                            <div class="icon  icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-car-side"></i>
                            </div>
                            <span class="nav-link-text ms-1">Transactions</span>
                        </a>
                    </li>
                <?php }; ?>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account Menu</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($title == 'Profile') {
                                            echo 'active';
                                        } ?>  " href="<?= base_url('profile') ?>">
                        <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-user d-flex justify-content-center"></i>
                        </div>
                        <span class="nav-link-text ms-1 ">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="" data-bs-toggle="modal" data-bs-target="#logout">
                        <div class="icon icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </div>
                        <span class="nav-link-text ms-1">Log out</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <!-- End Sidebar -->


    <!-- Modal -->