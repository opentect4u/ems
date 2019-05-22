<style>
textarea {
    resize: none;
}
</style>
<form class="form-sample" 
        method="POST"
        action="<?php echo site_url('claim/approve/form'); ?>"
>
    <div class="modal-header">
        <h5 class="modal-title">Employee Name: <?php echo $claim->emp_name; ?> </h5>
    </div>

    <div class="modal-body">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Claim's</h4>
                        <p class="card-description">
                            General info
                        </p>
                        <input type="text" 
                                    class="noborder"
                                    name="emp_code"
                                    readonly
                                    value="<?php echo $claim->emp_code; ?>"
                                />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Claim ID</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="noborder"
                                               name="claim_cd"
                                               readonly
                                               value="<?php echo $claim->claim_cd; ?>"
                                            />
                                    </div>
                                </div>
                            </div>
                        </div>    

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">From Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" 
                                               class="noborder"
                                               readonly
                                               value="<?php echo $claim->from_dt; ?>"
                                            />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">To Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" 
                                               class="noborder"
                                               readonly
                                               value="<?php echo $claim->to_dt; ?>"
                                            />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Purpose</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="noborder"
                                               readonly
                                               value="<?php echo $claim->purpose_desc; ?>"
                                            />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Narration</label>
                                    <div class="col-sm-9">
                                            <input type="text" 
                                                   id="amount"
                                                   class="noborder"
                                                   readonly
                                                   value="<?php echo $claim->narration; ?>"
                                            />
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
                        <div id="claim_trans">
                            <?php
                            foreach($claim_trans as $list){
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Claim Head</label>
                                        <div class="col-sm-9">
                                            <input type="text" 
                                                   class="noborder"
                                                   readonly
                                                   value="<?php echo $list->head_desc; ?>"
                                                />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Remarks</label>
                                        <div class="col-sm-8">
                                                <input type="text" 
                                                    id="amount"
                                                    class="noborder"
                                                    readonly
                                                    value="<?php echo $list->remarks; ?>"
                                                />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Amount</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" 
                                                       class="noborder amount"
                                                       readonly
                                                       value="<?php echo $list->amount; ?>"
                                                    />
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
                                                    class="noborder"
                                                    name="tot_amout"
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
    </div>
    <div class="form-actions">

        <div id="remarksDiv">

            <div class="form-row">

                <div class="form-group col-md-12">

                    <strong>Your Remarks:</strong>

                    <textarea class="form-control" name="remarks" id="remarks" rows="2" cols="50" required></textarea>

                </div>

            </div>

        </div>

        <div class="form-group">

            <button class="btn btn-success waves-effect waves-dark submittable" 
                    id="approve"
                    name="approve_status"
                    style="width: 100%;"
                    type="button"
                    value="1">Approve
            </button>

        </div>

        <div class="form-group">

            <button class="btn btn-danger waves-effect waves-dark submittable"
                    id="reject" 
                    name="reject_status"
                    style="width: 100%;"
                    type="button"
                    value="1">Reject
            </button>

        </div>

        <div class="form-group">

            <button class="btn btn-inverse waves-effect waves-light" 
                type="button" 
                style="width: 100%;"
                data-dismiss="modal">Cancel
            </button>

        </div>

    </div>
</form>

<script type="text/javascript">$(document).ready(function(){$('#remarksDiv').hide();$('#approve').click(function(){$('#remarksDiv').show();$('#reject').remove();});$('#reject').click(function(){$('#remarksDiv').show();$('#approve').remove();});$("textarea").change(function(){$('.submittable').attr('type', 'submit');});});</script>
