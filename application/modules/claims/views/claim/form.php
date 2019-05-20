<form class="form-sample" 
        method="POST"
        action="<?php echo site_url('claim/'.$url); ?>"
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
                           name="claim_code"
                           value="<?php echo $claim->claim_cd; ?>"
                        />

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">From Date <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" 
                                           class="form-control"
                                           name="from_dt"
                                           required
                                           value="<?php echo $claim->from_dt; ?>"
                                        />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">To Date <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" 
                                           class="form-control"
                                           name="to_dt"
                                           required
                                           value="<?php echo $claim->to_dt; ?>"
                                        />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Purpose <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select name="purpose" required class="form-control">
                                        
                                        <option value="">Select</option>
                                    <?php
                                        foreach($purpose as $list){
                                    ?>
                                        <option value="<?php echo $list->id; ?>" <?php echo ($list->id == $claim->purpose)? 'selected':''; ?>><?php echo $list->purpose_desc; ?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Narration <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="narration" required class="form-control"><?php echo $claim->narration; ?></textarea>
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
                    <div id="claim_trans">
                        <?php
                        $flag = true;
                        foreach($claim_trans as $list){
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Claim Head <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="claim_head[]"
                                                class="form-control"
                                                required
                                            >
                                                <option value="">Select</option>
                                            <?php
                                            foreach($claim_head as $head_list){
                                            ?>
                                                <option value="<?php echo $head_list->head_cd; ?>" <?php echo ($head_list->head_cd == $list->claim_hd)? 'selected':''; ?> ><?php echo $head_list->head_desc; ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Remarks</label>
                                    <div class="col-sm-9">
                                        <textarea name="remarks[]" class="form-control"><?php echo $list->remarks; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                                                <?php echo ($flag)? '<button class="btn btn-success trans" type="button"><i class="fa fa-plus"></i></button>'
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
                        <div class="col-md-8"></div>
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
                                                value="<?php echo $claim->amount; ?>"
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
        $('.trans').click(function(){

            let row = '<div class="row">'+
                      '  <div class="col-md-4">'+
                      '      <div class="form-group row">'+
                      '          <label class="col-sm-3 col-form-label">Claim Head <span class="required">*</span></label>'+
                      '          <div class="col-sm-9">'+
                      '              <select name="claim_head[]"'+
                      '                      class="form-control" required'+
                      '                  > <option value="">Select</option> <?php foreach($claim_head as $head_list){ ?> <option value="<?php echo $head_list->head_cd; ?>" ><?php echo $head_list->head_desc; ?></option> <?php } ?></select>'+
                      '          </div>'+
                      '      </div>'+
                      '  </div>'+
                      '  <div class="col-md-4">'+
                      '      <div class="form-group row">'+
                      '          <label class="col-sm-3 col-form-label">Remarks</label>'+
                      '          <div class="col-sm-9">'+
                      '              <textarea name="remarks[]" class="form-control"></textarea>'+
                      '          </div>'+
                      '      </div>'+
                      '  </div>'+
                      '  <div class="col-md-4">'+
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

            appendRow('#claim_trans', row);
        });

        $("#claim_trans").on('click', '.removeRow',function(){
            
            $(this).parents('div:eq(5)').remove();
            $('.amount').change();

        });

        function appendRow(refTag, appendItem){
            $(refTag).append(appendItem);
        }

        $("#claim_trans").on('change', '.amount',function(){
            
            var sum = 0.00;
            $('.amount').each(function(){

                sum += +$(this).val();

            });

            $('#amount').val(sum);
        });

    });

</script>