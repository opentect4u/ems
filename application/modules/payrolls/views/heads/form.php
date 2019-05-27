<form class="form-sample" 
        method="POST"
        action="<?php echo site_url('payroll/head/'.$url); ?>"
>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Payroll Head</h4>

                    <input type="hidden" 
                           class="form-control"
                           name="sl_no"
                           value="<?php echo $head->sl_no; ?>"
                        />

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Head Name <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" 
                                           class="form-control"
                                           name="head_desc"
                                           required
                                           value="<?php echo $head->head_desc; ?>"
                                        />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Type <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select name="flag"
                                            class="form-control"
                                            required
                                        >
                                            <option value="E" <?php echo ($head->flag == 'E')? 'selected' : ''; ?>>Earnings</option>
                                            <option value="D" <?php echo ($head->flag == 'D')? 'selected' : ''; ?>>Deductions</option>
                                        
                                    </select>
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