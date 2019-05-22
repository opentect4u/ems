<form class="form-sample" 
        method="POST"
        action="<?php echo site_url('claim/payment/'.$url); ?>"
>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Claim's</h4>
                    <p class="card-description">
                        General info
                    </p>

                    <input type="hidden" 
                           class="form-control"
                           name="payment_code"
                           value="<?php echo $payment->payment_cd; ?>"
                        />

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Date <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" 
                                           class="form-control"
                                           name="payment_dt"
                                           readonly
                                           value="<?php echo $payment->payment_dt; ?>"
                                        />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                                <?php echo ($list->emp_code == $payment->emp_code)? 'selected':''; ?>
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
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Payment Mode <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="pay_mode" required>
                                        <option value="CASH" <?php echo ("CASH" == $payment->payment_mode)? 'selected':''; ?> >CASH</option>
                                        <option value="CHEQUE" <?php echo ("CHEQUE" == $payment->payment_mode)? 'selected':''; ?>>CHEQUE</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Payment Type <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="pay_type" required>
                                        <option value="ADVANCE" <?php echo ("ADVANCE" == $payment->payment_type)? 'selected':''; ?> >ADVANCE</option>
                                        <option value="NORMAL" <?php echo ("NORMAL" == $payment->payment_type)? 'selected':''; ?> >NORMAL</option>
                                    </select>
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Cheque No</label>
                                <div class="col-sm-9">
                                    <input type="text" 
                                           class="form-control" 
                                           name="cheque_no"
                                           value="<?php echo $payment->chq_no; ?>"                                              
                                        />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Cheque Date</label>
                                <div class="col-sm-9">
                                    <input type="date"
                                           name="cheque_dt"
                                           class="form-control"
                                           value="<?php echo $payment->chq_dt; ?>"   
                                        >
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bank Name</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="bank" required>
                                    <?php
                                        foreach($bank as $list){
                                        ?>
                                            <option value="<?php echo $list->bank_id; ?>" 
                                                <?php echo ($list->bank_id == $payment->bank)? 'selected':''; ?>
                                            ><?php echo $list->bank_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Paid Amount</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                           class="form-control"
                                           name="paid_amt"
                                           value="<?php echo $payment->paid_amt; ?>"   
                                        />
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
</form>

<script>
    $(document).ready(function(){

        $("#payment_trans").on('click', '.removeRow',function(){
            
            $(this).parents('div:eq(5)').remove();
            $('.amount').change();

        });

        $("#payment_trans").on('change', '.amount',function(){
            
            var sum = 0.00;
            $('.amount').each(function(){

                sum += +$(this).val();

            });

            $('#amount').val(sum);
        });

    });

</script>