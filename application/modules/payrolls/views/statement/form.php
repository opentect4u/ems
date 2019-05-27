<form class="form-sample" 
        method="POST"
        action="<?php echo site_url('payroll/head/'.$url); ?>"
>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Employee's Statement</h4>

                    <div class="row">
                        <div class="col-md-5">
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
                                                <?php echo ($list->emp_code == $this->input->post('emp_code'))? 'selected':''; ?>
                                            ><?php echo $list->emp_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">In Details</h4>
                    <p class="card-description">Can add multiple information</p>
                    <div id="statement">
                        <?php
                        $flag = true;
                        foreach($statement as $list){
                        ?>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Claim Head <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="sl_no[]"
                                                class="form-control head"
                                                required
                                            >
                                                <option value="">Select</option>
                                            <?php
                                            foreach($heads as $head_list){
                                            ?>
                                                <option value="<?php echo $head_list->sl_no; ?>"
                                                    flag="<?php echo $head_list->flag; ?>" 
                                                    <?php echo ($head_list->sl_no == $list->sl_no)? 'selected':''; ?> >
                                                    <?php echo $head_list->head_desc; ?>
                                                </option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group row flag">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Amount <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" 
                                                   class="form-control amount"
                                                   name="amount[]"
                                                   required
                                                   value="<?php echo $list->amount; ?>"
                                                />
                                            <div class="input-group-append">
                                                <?php echo ($flag)? '<button class="btn btn-success add" type="button"><i class="fa fa-plus"></i></button>'
                                                                    :'<button class="btn btn-danger removeRow" type="button"> <i class="fa fa-minus"></i> </button>'; $flag=false;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-md-7"></div>
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Total</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" 
                                                id="amount"
                                                name="tot_amount"
                                                style="height: calc(2.25rem + 2px); padding: 20px; border-color: transparent;box-shadow: none; border: 0;"
                                                readonly
                                                value="<?php echo $emp->amount; ?>"
                                            />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
</form>

<script>
    $(document).ready(function(){
        
        //For Training
        $('.add').click(function(){

            let row = '<div class="row">'+
                      '  <div class="col-md-5">'+
                      '      <div class="form-group row">'+
                      '          <label class="col-sm-3 col-form-label">Claim Head <span class="required">*</span></label>'+
                      '          <div class="col-sm-9">'+
                      '              <select name="claim_head[]"'+
                      '                      class="form-control head" required'+
                      '                  > <option value="">Select</option> <?php foreach($heads as $head_list){ ?> <option value="<?php echo $head_list->sl_no; ?>" flag="<?php echo $head_list->flag; ?>" ><?php echo $head_list->head_desc; ?></option> <?php } ?></select>'+
                      '          </div>'+
                      '      </div>'+
                      '  </div>'+
                      '  <div class="col-md-2">'+
                      '      <div class="form-group row">'+
                      '      </div>'+
                      '  </div>'+
                      '  <div class="col-md-5">'+
                      '      <div class="form-group row">'+
                      '          <label class="col-sm-3 col-form-label">Amount <span class="required">*</span></label>'+
                      '              <div class="col-sm-9">'+
                      '                  <div class="input-group">'+
                      '                      <input type="text" '+
                      '                             class="form-control amount"'+
                      '                             name="amount[]" required'+
                      '                          />'+
                      '                  <div class="input-group-append"> '+
                      '                      <button class="btn btn-danger removeRow" type="button"> <i class="fa fa-minus"></i> </button>'+
                      '                  </div>'+
                      '              </div>'+
                      '          </div>'+
                      '      </div>'+
                      '  </div>'+
                      '</div>';

            appendRow('#statement', row);
        });

        $("#statement").on('click', '.removeRow',function(){
            
            $(this).parents('div:eq(5)').remove();
            $('.amount').change();

        });

        function appendRow(refTag, appendItem){
            $(refTag).append(appendItem);
        }

        $("#statement").on('change', '.amount',function(){

            var sum = 0.00;
            $('.amount').each(function(){

                if($('.head option:selected').eq($('.amount').index(this)).attr('flag') === 'E'){
                    sum += +$(this).val();
                }
                else if($('.head option:selected').eq($('.amount').index(this)).attr('flag') === 'D'){
                    sum -= $(this).val();
                }

            });

            $('#amount').val(sum);
        });

    });

</script>