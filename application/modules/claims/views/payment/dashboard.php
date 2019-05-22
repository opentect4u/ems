
<div class="card">
    <div class="card-body">
        <!-- <div class="row"> -->
            <h4 class="card-title row">
                <div class="col-md-2">
                    <a class="btn btn-info btn-rounded"
                        href="<?php echo site_url('claim/payment/add'); ?>" 
                    >Add Payment</a>
                </div>
                <div class="col-md-7"></div>
                <div class="col-md-3 alert alert-<?php echo $this->session->flashdata('msg')['status']; ?>"></div>
            </h4>
        <!-- </div> -->
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table">
                        <thead>

                            <tr>

                                <th>Payment ID</th>
                                <th>Date</th>
                                <th>Employee</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>

                        </thead>

                        <tbody> 

                            <?php 

                            if($payment_dtls) {

                                foreach($payment_dtls as $list) {

                            ?>

                                <tr>

                                    <td><?php echo $list->payment_cd; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($list->payment_dt)); ?></td>
                                    <td><?php echo $list->emp_name; ?></td>
                                    <td><?php echo $list->paid_amt; ?></td>
                                    <td><a href="javascript:void(0)" class="status" title="Click to Approve">

                                            <span class="badge badge-danger approve"
                                                  id="<?php echo $list->payment_cd; ?>"
                                                  employee="<?php echo $list->emp_code; ?>"
                                                  amount="<?php echo $list->paid_amt; ?>"
                                                >Unapproved
                                            </span> 

                                        </a>
                                    </td>
                                    <td>
                                    
                                        <a href="<?php echo site_url('claim/payment/edit?payment_cd='.$list->payment_cd); ?>"
                                           class="edit"
                                           title="Edit"
                                        >

                                            <i class="fas fa-pencil-alt text-inverse m-r-10" style="color: #007bff"></i>
                                            
                                        </a>
                                        
                                    </td>
                                    <td>
                                    
                                        <a href="javascript: void(0);"
                                           class="delete"
                                           title="Delete"
                                           id="<?php echo $list->payment_cd; ?>"
                                        >

                                            <i class="fas fa-trash-alt text-inverse m-r-10" style="color: #e70050"></i>
                                            
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
        
<script>

    $(document).ready(function() {

        $('.alert').hide();

        <?php if($this->session->flashdata('msg')['message']){ ?>

            $('.alert').html('<?php echo $this->session->flashdata('msg')['message']; ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();

        <?php } ?>

        $(".delete").click(function(){
            
            if(confirm('Are you sure?')){
                
                $.ajax({
                    url: "<?php echo site_url('claim/payment/delete');?>",
                    data: {
                        payment_cd: $(this).attr('id')
                    },
                    type: "POST"
                });

                $('.delete').parents('tr:eq('+ $(".delete").index(this) +')').remove();
                $('.alert').attr('class', 'col-md-3 alert alert-success');
                $('.alert').html('Successfully Deleted <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();

            }
            
        });

        $(".approve").click(function(){
            
            if(confirm('Are you sure?')){
                
                $.ajax({
                    url: "<?php echo site_url('claim/payment/approve');?>",
                    data: {
                        payment_cd: $(this).attr('id'),
                        emp_code: $(this).attr('employee'),
                        tot_amout: $(this).attr('amount'),
                    },
                    type: "POST"
                });

                $('.approve').parents('tr:eq('+ $(".approve").index(this) +')').remove();
                $('.alert').attr('class', 'col-md-3 alert alert-success');
                $('.alert').html('Successfully Approved <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();

            }
            
        });
    });
    
</script>