
<div class="card">
    <div class="card-body">
        <h4 class="card-title">
            <a class="btn btn-info btn-rounded"
                href="<?php echo site_url('employee/add'); ?>" 
            >Add New Employee</a>
            <div style="float: right;" class="alert alert-<?php echo $this->session->flashdata('msg')['status']; ?>"></div>
        </h4>
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
                                    <td><?php echo $e_dtls->personal_email; ?></td>
                                    <td><a href="javascript:void(0)" class="status" id="<?php echo $e_dtls->emp_code; ?>" val="<?php echo $e_dtls->emp_status; ?>">

                                            <span class="badge badge-<?php echo ($e_dtls->emp_status == "A")? 'success' : 'danger'; ?>"><?php echo ($e_dtls->emp_status == "A")? 'Active':'Inactive'; ?></span> 

                                        </a>
                                    </td>
                                    <td>
                                    
                                        <a id="<?php echo $e_dtls->emp_code; ?>"
                                        href="javascript:void(0)"
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

            $('#demo-foo-addrow').DataTable({
                "paging": false
            });
            

            $('#add').click(function(){

                $.get(
                    
                    "<?php echo site_url('employee/add') ?>"
                    
                    ).done(function(data){

                        $('#modal').html(data);
                        $('#add-contact').modal('show');

                });

            });

            $('.edit').click(function(){

                $.get(
                    
                    "<?php echo site_url('employee/edit') ?>",

                    {
                        emp_no: $(this).attr('id')
                    }
                    
                    ).done(function(data){

                        $('#modal').html(data);
                        $('#add-contact').modal('show');

                });

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
                        
                        $('.badge:eq('+indexNo+')').attr('class', 'badge badge-danger');
                        $('.badge:eq('+indexNo+')').html('Inactive');
                        $('.status:eq('+indexNo+')').attr('val', data);

                    }
                    else{
                        
                        $('.badge:eq('+indexNo+')').attr('class', 'badge badge-success');
                        $('.badge:eq('+indexNo+')').html('Active');
                        $('.status:eq('+indexNo+')').attr('val', data);

                    } 
                });
                
            });

        });

    </script>
