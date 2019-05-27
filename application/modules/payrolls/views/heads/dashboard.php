<div class="card">
    <div class="card-body">
        <!-- <div class="row"> -->
        <h4 class="card-title row">
            <div class="col-md-2">
                <a class="btn btn-info btn-rounded"
                    href="<?php echo site_url('payroll/head/add'); ?>" 
                >Add Head</a>
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
                                <th>Head</th>
                                <th>Type</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody> 

                        <?php 

                        if($heads) {

                            foreach($heads as $list) {

                        ?>

                            <tr>

                                <td><?php echo $list->sl_no; ?></td>
                                <td><?php echo $list->head_desc; ?></td>
                                <td><a href="javascript:void(0)" class="status">

                                        <span class="badge badge-<?php echo ($list->flag == 'D')? 'warning' : 'primary'; ?>"><?php echo ($list->flag == 'D')? 'Deduction':'Earning'; ?></span> 

                                    </a>
                                </td>
                                <td>
                                
                                    <a href="<?php echo site_url('payroll/head/edit?sl_no='.$list->sl_no); ?>"
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

            $('.alert').html('<?php echo $this->session->flashdata('msg')['message']; ?> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();

        <?php } ?>

    });
</script>