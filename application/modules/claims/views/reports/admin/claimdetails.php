<form class="form-sample" 
        method="POST"
        action="<?php echo site_url('claim/report/admindetails'); ?>"
    >
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Claim Details</h4>
                    <p class="card-description">
                        Give a date range
                    </p>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Employee <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select name="emp_code" 
                                            class="form-control"
                                        >

                                        <?php
                                        foreach($employee as $list){
                                        ?>
                                            <option value="<?php echo $list->emp_code; ?>" 
                                                <?php echo ($list->emp_code == $this->input->post('emp_code'))? 'selected':''; ?>
                                            ><?php echo $list->emp_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

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

                                <th>Claim ID</th>
                                <th>Claim Date</th>
                                <th>Approve Date</th>
                                <th>Amount</th>
                                <th>View</th>

                            </tr>

                        </thead>

                        <tbody> 

                            <?php 

                            if($claim_dtls) {

                                foreach($claim_dtls as $list) {

                            ?>

                                <tr>

                                    <td><?php echo $list->claim_cd; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($list->claim_dt)); ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($list->approval_dt)); ?></td>
                                    <td><?php echo $list->amount; ?></td>
                                    <td>
                                    
                                        <a href="javascript: void(0);"
                                           class="view"
                                           id="<?php echo $list->claim_cd; ?>"
                                           title="View"
                                        >

                                            <i class="fas fa-eye text-inverse m-r-10" style="color: #007bff"></i>
                                            
                                        </a>
                                        
                                    </td>

                                </tr>

                            <?php
                                    
                                    }

                                }

                            ?>
                        </tbody>
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