
<div class="card">
    <div class="card-body">
        <!-- <div class="row"> -->
            <h4 class="card-title row">
                <div class="col-md-2">
                    <a class="btn btn-info btn-rounded"
                        href="<?php echo site_url('leave/add'); ?>" 
                    >Add Leave</a>
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
                            
                                <th>Sl No</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Remarks</th>
                                <th>Satus</th>
                                <th>Action</th>

                            </tr>

                        </thead>
                            
                        <tbody> 

                            <?php 
                                
                                $status = true;
                                if($leave_dtls) {
                                    
                                    foreach($leave_dtls as $e_dtls) {

                                ?>

                                    <tr>

                                        <td><?php echo $e_dtls->trans_cd; ?></td>

                                        <td><?php if(strtotime($e_dtls->trans_dt) == strtotime(date('Y-m-d'))) $status=false; echo date('d-m-Y', strtotime($e_dtls->trans_dt)); ?></td>
                                        
                                        <td><?php echo $e_dtls->leave_type; ?> </td>
                                        
                                        <td><?php echo $e_dtls->remarks; ?></td>

                                        <td><span class="badge badge-danger">Unapproved</span> </td>
                                        
                                        <td class="text-nowrap">
                                            
                                            <a href="<?php echo site_url('leave/edit?trans_cd='.$e_dtls->trans_cd.''); ?>"
                                                title="Edit"
                                            >

                                                <i class="fas fa-pencil-alt text-inverse m-r-10" style="color: #007bff"></i>
                                                
                                            </a>

                                            <a href="javascript:void(0)" 
                                                id="<?php echo $e_dtls->trans_cd; ?>"
                                                class="delete"
                                                title="Delete"
                                                data-toggle="modal" data-target="#deleteModal"
                                                >
                                            
                                                <i class="fas fa-window-close text-danger"></i> 
                                                
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

    $(document).ready(function(){

        $('.delete').click(function(){
        
          if(alert('Are you sure?')){
            $.ajax({
                url: "<?php echo site_url('leave/delete');?>",
                data: {
                    trans_cd: $(this).attr('id')
                },
                type: "POST"
            });

            $('.delete').parents('tr:eq('+ $(".delete").index(this) +')').remove();
            $('.alert').attr('class', 'col-md-3 alert alert-success');
            $('.alert').html('Successfully Deleted <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();
  
          }
        });

    });

</script>
    
<script>

    $(document).ready(function() {

        $('.alert').hide();

        <?php if($this->session->flashdata('msg')['message']){ ?>

            $('.alert').html('<?php echo $this->session->flashdata('msg')['message']; ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();

        <?php } ?>

    });
    
</script>