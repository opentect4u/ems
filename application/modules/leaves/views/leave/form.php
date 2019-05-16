    <div class="row page-titles">

        <div class="col-md-6 col-8 align-self-center">

            <h3 class="text-themecolor m-b-0 m-t-0">Leaves</h3>

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="javascript:void(0)">Leave</a></li>

                <li class="breadcrumb-item active">Form</li>

            </ol>

        </div>

        <div class="col-md-6 col-12 align-self-center">
            <div class="alert alert-danger"></div>
        </div>

    </div>

<?php

if(!$leave_dtls){

    echo "No Data Found";

}

else{

?>

    <div class="row">

        <div class="col-lg-12">

            <div class="card card-outline-info">

                <div class="card-header">

                    <h4 class="m-b-0 text-white">Leave Form</h4>
                    
                </div>

                <div class="card-body">

                    <form class="form-horizontal" 
                        id="form"
                        method="post" 
                        action="<?php echo site_url('leave/'.$url.'');?>"
                    >

                        <div class="form-body">

                            <h3 class="box-title">Type & Period</h3>
                            
                            <hr class="m-t-0 m-b-40">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label class="control-label">Type</label>

                                        <select class="form-control" 
                                                id="leave_type"
                                                name="leave_type"
                                                required
                                                
                                            >

                                            <option value="">Select</option>

                                            <option value="M" <?php echo ($leave_dtls->leave_type == 'M')? 'selected':''; ?>>SL</option>

                                            <?php 

                                                if($this->session->userdata('loggedin')->emp_catg != 'P'){

                                            ?>
                                                    <option value="E" <?php echo ($leave_dtls->leave_type == 'E')? 'selected':''; ?>>EL</option>
                                            
                                            <?php
                                            
                                                }

                                            ?>

                                            <option value="C" <?php echo ($leave_dtls->leave_type == 'C')? 'selected':''; ?>>Comp Off</option>
                                            <option value="N" <?php echo ($leave_dtls->leave_type == 'N')? 'selected':''; ?>>National Holidays</option>

                                        </select>
                                        
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        
                                        <h6 class="card-subtitle">after selecting leave period please click the apply button.</h6>
                                            
                                        <input type='text' class="form-control buttonClass" name="period" value="<?php echo date('d/m/Y', strtotime($leave_dtls->from_dt)).' - '.date('d/m/Y', strtotime($leave_dtls->to_dt)); ?>" />

                                    </div>

                                </div>
                                
                            </div>  
                                
                            <h3 class="box-title">Info</h3>

                            <hr class="m-t-0 m-b-40">
                            
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">

                                        <label class="control-label">Reason</label>

                                        <select class="form-control" 
                                                id="reason"
                                                name="reason">

                                            <option value="Family and Medical Leave" <?php echo ($leave_dtls->reason == 'Family and Medical Leave')?'selected':''; ?> >Family and Medical Leave </option>

                                            <option value="Bereavement" <?php echo ($leave_dtls->reason == 'Bereavement')?'selected':''; ?>>Bereavement</option>

                                            <option value="Pregnancy" <?php echo ($leave_dtls->reason == 'Pregnancy')?'selected':''; ?>>Pregnancy</option>

                                            <option value="Public holidays" <?php echo ($leave_dtls->reason == 'Public holidays')?'selected':''; ?>>Public holidays</option>

                                            <option value="Maternity/Paternity" <?php echo ($leave_dtls->reason == 'Maternity/Paternity')?'selected':''; ?>>Maternity/Paternity</option>

                                            <option value="Personal leave" <?php echo ($leave_dtls->reason == 'Personal leave')?'selected':''; ?>>Personal leave</option>

                                            <option value="Adverse weather" <?php echo ($leave_dtls->reason == 'Adverse weather')?'selected':''; ?>>Adverse weather</option>

                                            <option value="Comp time to compensate for extra hours worked" <?php echo ($leave_dtls->reason == 'Comp time to compensate for extra hours worked')?'selected':''; ?>>Comp time to compensate for extra hours worked</option>

                                        </select>
                                        
                                    </div>

                                </div>

                            </div>    
                                
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label class="control-label">Remarks</label>

                                        <textarea class="form-control" name="remarks" required><?php echo $leave_dtls->remarks; ?></textarea>

                                    </div>

                                </div>
                                
                            </div>
                            
                        </div>

                        <hr>

                        <div class="form-actions">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-offset-3 col-md-9">

                                            <button type="submit" id="submit" class="btn btn-success">Submit</button>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6"> </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

<?php

}

?>
<script>

    var event = 0,
        elLimit=0.00;

    $(document).ready(function(){
        
        var closingBalances = '';

        $('.alert').hide();
        
        $.get(
            
            '<?php echo site_url("leave/leaveBalance"); ?>'

        ).done(function(data){
            
            closingBalances = JSON.parse(data);

        });
         
        switch('<?php echo $leave_dtls->leave_type ?>'){

            case 'E': 

                datepicker(moment('<?php echo $leave_dtls->from_dt; ?>'), moment('<?php echo $leave_dtls->to_dt; ?>'), moment());

                break;

            case 'C':

                datepicker(moment('<?php echo $leave_dtls->from_dt; ?>'), moment('<?php echo $leave_dtls->to_dt; ?>'), moment());    
            
                break;

            case 'N':

                datepicker(moment('<?php echo $leave_dtls->from_dt; ?>'), moment('<?php echo $leave_dtls->to_dt; ?>'), moment());    
            
                break;    
        }

        $('#leave_type').change( function() {

            switch ($(this).val()) {
               
                case 'E':

                    var newDate     = new Date(),
                        startMonth  = newDate.getFullYear()+'-0'+ getParamVal(3)+'-01',
                        endMonth    = newDate.getFullYear()+'-'+ getParamVal(4)+'-31',
                        elCount     = fetch(startMonth, endMonth, 'countEl');
                        
                        if(parseInt(elCount) >= parseInt(getParamVal(5))){

                            $('.alert').html('Sorry! You have exceeded your EL limit <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();

                            $(this).val('');

                        }
                        else if(closingBalances.el_bal <= 0){
                            
                            $('.alert').html('Sorry! You don\'t have EL Balance <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();

                            $(this).val('');

                        }
                        else{
                            
                            datepicker(moment().add(parseInt(getParamVal(7)), 'day'), moment().add(parseInt(getParamVal(7)) + 1, 'day'), moment().add(1, 'day'));

                        }

                    break;

                case 'M':
                    
                    if(closingBalances.ml_bal <= 0){
                            
                        $('.alert').html('Sorry! You don\'t have EL Balance <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();

                        $(this).val('');

                    }
                    else{

                        datepicker(moment(), moment().add(2, 'day'), null);

                    }
                    
                    break;

                case 'C':
                    
                    if(closingBalances.comp_off_bal <= 0){

                        $('.alert').html('Sorry! You don\'t have Compp Off balance <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();

                        $(this).val('');

                    }
                    else{
                            
                        datepicker(moment().add(parseInt(getParamVal(7)), 'day'), moment().add(parseInt(getParamVal(7)) + 2, 'day'), moment().add(parseInt(getParamVal(7)), 'day'));

                    }
                    
                    break;

                case 'N':
                    
                    $('.alert').html('');
                    
                    datepicker(moment(), moment(), moment());

                    break;

            }        

        });
        
        $('.buttonClass').change(function(){

            let str         = $('.buttonClass').val().replace(/ /g, '').split('-');
            let from_date   = str[0].replace(/[/]/g,'-').split('-').reverse().join('-');
            let to_date     = str[1].replace(/[/]/g,'-').split('-').reverse().join('-');
            let overlappDt  = fetch(from_date, to_date, 'overlapp');
            let data        = new ValidDates(from_date, to_date);
            
            switch ($('#leave_type').val()) {
               
               case 'M':

                    if(overlappDt != 1){
                       
                       datepicker(moment(new Date(overlappDt)).add(1, 'day'), moment(new Date(overlappDt)).add(3, 'day'), moment().add(parseInt(getParamVal(7)), 'day'));
                       
                       event = 4;

                       break;

                    }
                    else if(closingBalances.ml_bal < data.dateRange()){
                        
                        event = 5;
                        
                        break;
                    }
                    else if((closingBalances.ml_bal <= 18) && (data.dateRange() > (parseFloat(elLimit).toFixed(1) * 1.5))){
                        
                        $('#submit').attr('type', 'button');
                        event = 6;
                        
                        break;
                    }
                    else{
                        
                        event = 0;

                    }
                
                    break;

               case 'E':
                
                   elLimit  = fetch(from_date, to_date, 'elLimit');
                   
                   if(overlappDt != 1){
                       
                        datepicker(moment(new Date(overlappDt)).add(1, 'day'), moment(new Date(overlappDt)).add(3, 'day'), moment().add(parseInt(getParamVal(7)), 'day'));
                        
                        event = 4;

                        break;

                   }
                   else if(closingBalances.el_bal < data.dateRange()){
                   
                        datepicker(moment().add(parseInt(getParamVal(7)), 'day'), moment().add(parseInt(getParamVal(7)) + parseInt(closingBalances.el_bal) - 1, 'day'), moment().add(parseInt(getParamVal(7)), 'day'));
                    
                        event = 5;

                        break;
                   }
                   else if((closingBalances.el_bal <= 18) && (data.dateRange() > (parseFloat(elLimit).toFixed(1) * 1.5))){
                        
                        $('#submit').attr('type', 'button');
                        event = 6;
                        
                        break;
                   }
                   else{

                       event = 0;
                       $('#submit').attr('type', 'submit');
                       break;

                   }
                   
               case 'C':

                    if(overlappDt != 1){
                            
                        datepicker(moment(new Date(overlappDt)).add(1, 'day'), moment(new Date(overlappDt)).add(3, 'day'), moment().add(parseInt(getParamVal(7)), 'day'));
                        
                        event = 4;

                        break;

                    }
                    else if(closingBalances.comp_off_bal < data.dateRange()){

                        datepicker(moment().add(parseInt(getParamVal(7)), 'day'), moment().add(parseInt(getParamVal(7)) + parseInt(closingBalances.el_bal) - 1, 'day'), moment().add(parseInt(getParamVal(7)), 'day'));
                        
                        event = 5;

                        break;

                    }
                    else{

                       event = 0;
                        
                       break;

                   }
                    

                   case 'N':

                        event = 0;

                        break; 

            }

            
            switch (event) {

                case 0:

                    $('.alert').hide();

                    break;

                case 3:

                    $('.alert').html('Sorry! Select minimum two day <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();
                    
                    $('#leave_type').val('');

                    break;

                case 4:

                    $('.alert').html('Sorry! Dates are overlapping with previous dates <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();

                    $('#leave_type').val('');

                    break;

                case 5:
                
                    $('.alert').html('Sorry! Choose a shorter period <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();
                    
                    break;

                case 6:
                    
                    $('.alert').html('Sorry! Maximum '+ parseFloat(elLimit * 1.5).toFixed(1) +' EL for this month <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>').show();

                    break;

            }

        });

    });

</script>

    