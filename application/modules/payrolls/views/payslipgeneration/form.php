<form class="form-sample" 
        method="POST"
        action="<?php echo site_url('payroll/payslipgeneration'); ?>"
>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="card-title col-md-9">
                        
                            Generate Payslip
                        
                        </h4>
                        <div style="display: inline;" class="col-md-3 alert alert-<?php echo $this->session->flashdata('msg')['status']; ?>"></div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Month <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="month" id="month" required>
                        
                                        <option value="">Select Month</option>
                        
                                        <?php foreach($month_list as $m_list) {?>
                        
                                            <option value="<?php echo $m_list->id ?>" ><?php echo $m_list->month_name; ?></option>
                        
                                        <?php
                                                }
                                        ?>
                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Year <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" id="year" readonly class="form-control" value="<?php echo date('Y');?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" name="submit" value="generate" class="btn btn-primary mr-2">Generate</button>
</form>

<script>
    
    $(document).ready(function(){

        $('#month').change(function(){

            $.get('<?php echo site_url("payroll/payslipgeneration/check"); ?>',
                {
                    month: $(this).val(),
                    year: $('#year').val()
                }
            ).done(function(data){
                
                if(data > 0){

                    $('#alert').attr('class', 'alert alert-danger');
                    $('.alert').html('Already generated <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();
                    $('.alert').attr('class', 'col-md-2 alert alert-danger').show();
                    $('.btn').html('Regenerate'); 
                    $('.btn').val('regenerate'); 

                }
                else{
                    $('.alert').hide();
                    $('.btn').html('Generate');
                    $('.btn').val('generate'); 

                }
            });

        });

        $('button').click(function(){
            
            $('button').attr('type', 'submit');

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