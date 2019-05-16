    <div class="row page-titles">
        <div class="col-md-8 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Leaves</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Leave</a></li>
                <li class="breadcrumb-item active">Ledger Report</li>
            </ol>
        </div>
    </div>

    <div class="row">
    
        <div class="col-12">

            <div class="card">

                <div class="card-body">

                    <div class="card-subtitle">
                        <p>Sick Leave: <?php echo @$open_bal->ml_bal; ?></p>
                        <p>Earn Leave: <?php echo @$open_bal->el_bal; ?></p>
                        <p>Comp Off: <?php echo @$open_bal->comp_off_bal; ?></p>
                    </div>

                    <div class="table-responsive">

                    <table id="demo-foo-addrow" style="width: 100%;" class="table m-t-30 table-hover contact-list">

                            <thead>

                                <tr>
                                
                                    <th width="15%">Date</th>
                                    <th>SL</th>
                                    <th>SL Balance</th>
                                    <th>EL</th>
                                    <th>EL Balance</th>
                                    <th>Comp Off</th>
                                    <th>Comp Off Balance</th>

                                </tr>

                            </thead>
                            
                            <tbody> 

                                <?php 
                                
                                if($remaining_bal) {
                                    
                                    foreach($remaining_bal as $r_dtls) {

                                ?>

                                        <tr>

                                            <td><?php echo date('d-m-Y', strtotime($r_dtls->balance_dt)); ?></td>
                                            <td><?php echo $r_dtls->ml_out; ?></td>
                                            <td><?php echo $r_dtls->ml_bal; ?></td>
                                            <td><?php echo $r_dtls->el_out; ?></td>
                                            <td><?php echo $r_dtls->el_bal; ?></td>
                                            <td><?php echo $r_dtls->comp_off_out; ?></td>
                                            <td><?php echo $r_dtls->comp_off_bal; ?></td>

                                        </tr>

                                <?php
                                        
                                        }

                                    }

                                    else {

                                        echo "<tr><td colspan='10' style='text-align: center;'>No data Found</td></tr>";

                                    }
                                ?>
                            
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>
            
        </div>

    </div>

    <script>
        $(document).ready(function(){
            $('table').DataTable({
                dom: 'Bfrtip',
                paging: false,
                searching: false,
                buttons: [
                    'excel'
                ]
            });
        });
    </script>