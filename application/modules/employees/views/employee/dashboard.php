
<div class="card">
    <div class="card-body">
        <!-- <div class="row"> -->
            <h4 class="card-title row">
                <div class="col-md-2">
                    <a class="btn btn-info btn-rounded"
                        href="<?php echo site_url('employee/add'); ?>" 
                    >Add Employee</a>
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

                                <th>ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody> 

                            <?php 

                            if($employee_dtls) {

                                foreach($employee_dtls as $e_dtls) {

                            ?>

                                <tr>

                                    <td><?php echo $e_dtls->emp_code; ?></td>
                                    <td class="row">
                                        
                                        <img class="avatar" src="<?php echo $e_dtls->img_path; ?>" alt="Profile Image" height="40" width="50">
                                        <div style="margin-left: 10px;">

                                            <?php echo $e_dtls->emp_name; ?>

                                        </div>    
                                        
                                    </td>
                                    <td><?php echo $e_dtls->department; ?></td>
                                    <td><?php echo $e_dtls->designation; ?></td>
                                    <td><?php echo $e_dtls->prof_email; ?></td>
                                    <td><a href="javascript:void(0)" class="status" id="<?php echo $e_dtls->emp_code; ?>" val="<?php echo $e_dtls->emp_status; ?>">

                                            <span class="checked badge badge-<?php echo ($e_dtls->emp_status == "A")? 'success' : 'danger'; ?>"><?php echo ($e_dtls->emp_status == "A")? 'Active':'Inactive'; ?></span> 

                                        </a>
                                    </td>
                                    <td>
                                    
                                        <a href="<?php echo site_url('employee/edit?emp_no='.$e_dtls->emp_code); ?>"
                                           class="edit"
                                           title="Edit"
                                        >

                                            <i class="fas fa-pencil-alt text-inverse m-r-10" style="color: #007bff"></i>
                                            
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

                $('.alert').html('<?php echo $this->session->flashdata('msg')['message']; ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>').show();

            <?php } ?>

        });
        
    

        $(document).ready( function (){

            $('.status').click(function () {

                var indexNo =   $('.status').index(this),
                    transId =   $(this).attr('id'),
                    value   =   $(this).attr('val');

                $.get('<?php echo site_url("employee/updateStatus"); ?>',
                    {
                        trans_id: transId,
                        value:    value
                    }
                )
                .done(function(data){

                    if(value == 'A'){
                        
                        $('.checked:eq('+indexNo+')').attr('class', 'checked badge badge-danger');
                        $('.checked:eq('+indexNo+')').html('Inactive');
                        $('.status:eq('+indexNo+')').attr('val', data);

                    }
                    else{
                        
                        $('.checked:eq('+indexNo+')').attr('class', 'checked badge badge-success');
                        $('.checked:eq('+indexNo+')').html('Active');
                        $('.status:eq('+indexNo+')').attr('val', data);

                    } 
                });
                
            });

        });

    </script>
