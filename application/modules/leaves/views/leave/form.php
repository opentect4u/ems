<form class="form-sample" 
        method="POST"
        action="<?php echo site_url('leave/'.$url); ?>"
>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">leave's</h4>
                    <p class="card-description">
                        General info
                    </p>

                    <input type="hidden" 
                           class="form-control"
                           name="trans_cd"
                           value="<?php echo $leave->trans_cd; ?>"
                        />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Leave Type <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" 
                                            id="leave_type"
                                            name="leave_type"
                                            required
                                        >
                                    <?php
                                        foreach($leave_type as $list){
                                    ?>
                                        <option value="<?php echo $list->type_cd; ?>" <?php echo ($list->type_cd == $leave->leave_type)? 'selected':''; ?>><?php echo $list->type_desc; ?></option>
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
                                <label class="col-sm-3 col-form-label">From Date <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="date" 
                                           class="form-control"
                                           name="from_dt"
                                           required
                                           value="<?php echo $leave->from_dt; ?>"
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
                                           value="<?php echo $leave->to_dt; ?>"
                                        />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Remarks <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" 
                                            id="reason"
                                            name="reason">

                                        <option value="Family and Medical Leave" <?php echo ($leave->reason == 'Family and Medical Leave')?'selected':''; ?> >Family and Medical Leave </option>
                                        <option value="Bereavement" <?php echo ($leave->reason == 'Bereavement')?'selected':''; ?>>Bereavement</option>
                                        <option value="Pregnancy" <?php echo ($leave->reason == 'Pregnancy')?'selected':''; ?>>Pregnancy</option>
                                        <option value="Public holidays" <?php echo ($leave->reason == 'Public holidays')?'selected':''; ?>>Public holidays</option>
                                        <option value="Maternity/Paternity" <?php echo ($leave->reason == 'Maternity/Paternity')?'selected':''; ?>>Maternity/Paternity</option>
                                        <option value="Personal leave" <?php echo ($leave->reason == 'Personal leave')?'selected':''; ?>>Personal leave</option>
                                        <option value="Adverse weather" <?php echo ($leave->reason == 'Adverse weather')?'selected':''; ?>>Adverse weather</option>
                                        <option value="Comp time to compensate for extra hours worked" <?php echo ($leave->reason == 'Comp time to compensate for extra hours worked')?'selected':''; ?>>Comp time to compensate for extra hours worked</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Remarks <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <textarea name="remarks" required class="form-control"><?php echo $leave->remarks; ?></textarea>
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