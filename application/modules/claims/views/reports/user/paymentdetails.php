<form class="form-sample" 
        method="POST"
        action="<?php echo site_url('claim/report/payment'); ?>"
    >
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Payment Details</h4>
                    <p class="card-description">
                        Give a date range
                    </p>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">From Date <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" 
                                           class="form-control"
                                           name="from_dt"
                                           value="<?php echo $this->input->post('from_dt'); ?>"
                                           required
                                        />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">To Date <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" 
                                           class="form-control"
                                           name="to_dt"
                                           value="<?php echo $this->input->post('to_dt'); ?>"
                                           required
                                        />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group row">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>   

<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){ ?>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>

                            <tr>

                                <th>Date</th>
                                <th>Received Amount</th>
                                <th>Payment Mode</th>
                                <th>Cheque Date</th>
                                <th>Cheque No</th>

                            </tr>

                        </thead>

                        <tbody> 

                            <?php 

                            $total = 0.00;
                            if($payment_dtls) {
                                foreach($payment_dtls as $list) {
                                    $total += $list->paid_amt;
                            ?>

                                <tr>

                                    <td><?php echo date('d-m-Y', strtotime($list->payment_dt)); ?></td>
                                    <td><?php echo $list->paid_amt; ?></td>
                                    <td><?php echo $list->payment_mode; ?></td>
                                    <td><?php echo $list->chq_dt; ?></td>
                                    <td><?php echo $list->chq_no; ?></td>

                                </tr>

                            <?php
                                    
                                }

                            }

                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Total</td>
                                <td colspan='4'><?php echo $total; ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>

<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            
                <div id="modal"></div>
            
        </div>

    </div>

</div>
        
<script>

    $(document).ready(function() {

        $('.view').click(function(){

            $.get(
                
                "<?php echo site_url('claim/report/claimdetails') ?>",

                {
                    claim_cd: $(this).attr('id')
                }
                
                ).done(function(data){

                    $('#modal').html(data);
                    $('#add-contact').modal('show');

            });

        });

    });
    
</script>