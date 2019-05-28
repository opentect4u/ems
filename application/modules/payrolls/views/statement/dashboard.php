<div class="card">
    <div class="card-body">
        <!-- <div class="row"> -->
        <h4 class="card-title row">
            <div class="col-md-2">
                <a class="btn btn-info btn-rounded"
                    href="<?php echo site_url('payroll/statement/add'); ?>" 
                >Add Statement</a>
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
                                <th>Earnings</th>
                                <th>Deductions</th>
                                <th>Net Salary</th>
                                <th>Action</th>

                            </tr>

                        </thead>
                        
                        <tbody> 

                            <?php 
                            
                            if($emp_list) {

                                
                                    foreach($emp_list as $list) {

                            ?>

                                    <tr>

                                        <td><?php echo $list->emp_code; ?></td>
                                        <td class="row">
                                            
                                            <img class="avatar" src="<?php echo base_url($list->img_path); ?>" alt="Profile Image" height="40" width="50">
                                            <div style="margin-left: 10px;">

                                                <?php echo $list->emp_name; ?>

                                            </div>    
                                            
                                        </td>
                                        <td><?php echo $list->dept_name; ?></td>
                                        <td><?php echo $list->earning; ?></td>
                                        <td><?php echo $list->deduction; ?></td>
                                        <td><?php echo $list->net_amount; ?></td>
                                        <td>
                                        
                                            <a href="<?php echo site_url('payroll/statement/edit?emp_code='.$list->emp_code.'&earning='.$list->earning.'&deduction='.$list->deduction.'&net_amount='.$list->net_amount.''); ?>"
                                                class="edit"
                                                title="Edit"
                                            >

                                                <i class="fas fa-pencil-alt text-inverse m-r-10" style="color: #007bff;"></i>
                                                
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
    
</script>
