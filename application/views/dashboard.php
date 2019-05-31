    
    <div class="row">
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card border-0 border-radius-2 bg-success">
            <div class="card-body">
                <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                <div class="icon-rounded-inverse-success icon-rounded-lg">
                    <i class="mdi mdi-email mx-0"></i>
                </div>
                <div class="text-white">
                    <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Notice</p>
                    <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                    <h3 class="mb-0 mb-md-1 mb-lg-0 mr-1"><?php echo $notice_count->count; ?></h3>
                    <small class="mb-0"></small>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card border-0 border-radius-2 bg-info">
            <div class="card-body">
                <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                <div class="icon-rounded-inverse-info icon-rounded-lg">
                    <i class="mdi mdi-currency-inr mx-0"></i>
                </div>
                <div class="text-white">
                    <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total <?php echo ($payble_count->balance_amt < 0)? 'Payble' : 'Receivable'; ?></p>
                    <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                    <h3 class="mb-0 mb-md-1 mb-lg-0 mr-1"><?php echo abs($payble_count->balance_amt); ?></h3>
                    <small class="mb-0"></small>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card border-0 border-radius-2 bg-danger">
            <div class="card-body">
                <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                <div class="icon-rounded-inverse-danger icon-rounded-lg">
                    <i class="mdi mdi-chart-donut-variant"></i>
                </div>
                <div class="text-white">
                    <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Unapproved Claims</p>
                    <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                    <h3 class="mb-0 mb-md-1 mb-lg-0 mr-1"><?php echo $unapproved_count->count; ?></h3>
                    <small class="mb-0"></small>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card border-0 border-radius-2 bg-warning">
            <div class="card-body">
                <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                <div class="icon-rounded-inverse-warning icon-rounded-lg">
                    <i class="mdi mdi-chart-multiline"></i>
                </div>
                <div class="text-white">
                    <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Payslip</p>
                    <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                    <h3 class="mb-0 mb-md-1 mb-lg-0 mr-1"><?php echo $payslip_count->count; ?></h3>
                    <small class="mb-0"></small>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>