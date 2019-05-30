
<div class="card">
    <div class="card-body">
        <!-- <div class="row"> -->
            <h4 class="card-title row">
                <div class="col-md-2">
                    <a class="btn btn-info btn-rounded"
                        href="<?php echo site_url('notice/add'); ?>" 
                    >Add Notice</a>
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
                                <th>Date</th>
                                <th>Subject</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody> 

                            <?php 

                            if($notices) {

                              foreach($notices as $list) {

                            ?>

                                <tr>

                                    <td><?php echo $list->notice_cd; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($list->notice_dt)); ?></td>
                                    <td><?php echo $list->subject; ?></td>
                                    <td>
                                    
                                        <a href="<?php echo site_url('notice/edit?notice_cd='.$list->notice_cd); ?>"
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

</script>
