<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SEMS</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url('vendors/iconfonts/mdi/font/css/materialdesignicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('vendors/css/vendor.bundle.base.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('vendors/css/vendor.bundle.addons.css'); ?>">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url('css/horizontal-layout/style.css'); ?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url('images/favicon.png'); ?>" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

</head>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_horizontal-navbar.html -->
            <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="index.html"><img src="<?php echo base_url('images/logo.svg'); ?>" alt="logo"/></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo base_url('images/logo-mini.svg'); ?>" alt="logo"/></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center">
                    <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="search">
                            <i class="mdi mdi-magnify"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search..." aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown mr-1">
                        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-email mx-0"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="https://via.placeholder.com/36x36" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                            <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                            </h6>
                            <p class="font-weight-light small-text text-muted mb-0">
                                The meeting is cancelled
                            </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="https://via.placeholder.com/36x36" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                            <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                            </h6>
                            <p class="font-weight-light small-text text-muted mb-0">
                                New product launch
                            </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="https://via.placeholder.com/36x36" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                            <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                            </h6>
                            <p class="font-weight-light small-text text-muted mb-0">
                                Upcoming board meeting
                            </p>
                            </div>
                        </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown mr-4">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell mx-0"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                                <i class="mdi mdi-information mx-0"></i>
                            </div>
                            </div>
                            <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Application Error</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Just now
                            </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                            <div class="preview-icon bg-warning">
                                <i class="mdi mdi-settings mx-0"></i>
                            </div>
                            </div>
                            <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Settings</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Private message
                            </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                            <div class="preview-icon bg-info">
                                <i class="mdi mdi-account-box mx-0"></i>
                            </div>
                            </div>
                            <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">New user registration</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                2 days ago
                            </p>
                            </div>
                        </a>
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown mr-0 mr-sm-2">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="https://via.placeholder.com/40x40" alt="profile"/>
                        <span class="nav-profile-name">Don Richards</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item">
                            <i class="mdi mdi-settings text-primary"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('auth/logout'); ?>">
                            <i class="mdi mdi-logout text-primary"></i>
                            Logout
                        </a>
                        </div>
                    </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                    <span class="mdi mdi-menu"></span>
                    </button>
                </div>
                </div>
            </nav>
            <nav class="bottom-navbar">
                <div class="container">
                <ul class="nav page-navigation">
                    <li class="nav-item">
                    <a class="nav-link" href="index.html">
                        <i class="mdi mdi-home-outline menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                            <span class="menu-title">General Info</span>
                            <i class="menu-arrow"></i></a>
                        <div class="submenu">
                            <ul class="submenu-item">
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('employee'); ?>">Employees Information</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mega-menu">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-codepen menu-icon"></i>
                            <span class="menu-title">Claim</span>
                            <i class="menu-arrow"></i></a>
                        <div class="submenu">
                            <div class="col-group-wrapper row">
                            <div class="col-group col-md-6">
                                <p class="category-heading">User</p>
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('claim'); ?>">Add & Edit Claim</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('claim/approve'); ?>">Approve & Reject Claim</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('claim/payment'); ?>">Add & Approve Payment</a></li>
                                </ul>
                            </div>
                            <div class="col-group col-md-6">
                                <p class="category-heading">Reports</p>
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('claim/report/details'); ?>">Claim Details</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('claim/report/ledger'); ?>">Personal Ledger</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('claim/report/payment'); ?>">Payment Details</a></li>

                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('claim/report/closings'); ?>">Employees Blanaces</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('claim/report/admindetails'); ?>">Claim Admin Details</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('claim/report/adminledger'); ?>">Personal Admin Ledger</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('claim/report/adminpayment'); ?>">Payment Admin Details</a></li>
                                </ul>
                            </div>
                            <!-- <div class="col-group col-md-3">
                                <p class="category-heading">Admin</p>
                                <ul class="submenu-item">
                                <li class="nav-item"><a class="nav-link" href="../../pages/samples/invoice.html">Invoice</a></li>
                                <li class="nav-item"><a class="nav-link" href="../../pages/samples/pricing-table.html">Pricing Table</a></li>
                                <li class="nav-item"><a class="nav-link" href="../../pages/samples/orders.html">Orders</a></li>
                                </ul>
                            </div>
                            <div class="col-group col-md-3">
                                <p class="category-heading">Reports</p>
                                <ul class="submenu-item">
                                <li class="nav-item"><a class="nav-link" href="../../pages/samples/search-results.html">Search Results</a></li>
                                <li class="nav-item"><a class="nav-link" href="../../pages/samples/profile.html">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="../../pages/samples/timeline.html">Timeline</a></li>
                                <li class="nav-item"><a class="nav-link" href="../../pages/samples/news-grid.html">News grid</a></li>
                                <li class="nav-item"><a class="nav-link" href="../../pages/samples/portfolio.html">Portfolio</a></li>
                                <li class="nav-item"><a class="nav-link" href="../../pages/samples/faq.html">FAQ</a></li>
                                </ul>
                            </div>
                            </div> -->
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                            <span class="menu-title">Leave</span>
                            <i class="menu-arrow"></i></a>
                        <div class="submenu">
                            <ul class="submenu-item">
                                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Employee Management</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item mega-menu">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-codepen menu-icon"></i>
                            <span class="menu-title">Payroll</span>
                            <i class="menu-arrow"></i></a>
                        <div class="submenu">
                            <div class="col-group-wrapper row">
                            <div class="col-group col-md-12">
                                <p class="category-heading">User</p>
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('payroll/heads'); ?>">Payroll Heads</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('payroll/statement'); ?>">Earnings & Deductions</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('payroll/payslipgeneration'); ?>">Payslips Generation</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('payroll/payslip'); ?>">Payslips</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('payroll/payslipdetails'); ?>">Payslip Details</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                            <span class="menu-title">Notice</span>
                            <i class="menu-arrow"></i></a>
                        <div class="submenu">
                            <ul class="submenu-item">
                                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Employee Management</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                </div>
            </nav>
            </div>

            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">
                    <div class="content-wrapper">
                    
                    
                    
                    
                    