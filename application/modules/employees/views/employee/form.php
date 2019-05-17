<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Employee's</h4>
            <form class="form-sample" 
                  method="POST"
                  action="<?php echo site_url('employee/'.$url); ?>"
            >
                <p class="card-description">
                    Personal info
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Emp Code</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="emp_code"
                                       value="<?php echo $emp->emp_code; ?>"
                                       <?php echo ($url == 'edit')? 'readonly': ''; ?>
                                    />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="emp_name"
                                       value="<?php echo $emp->emp_name; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <select name="gender" class="form-control">
                                    <option value="F" <?php echo ($emp->gender == 'F')? 'selected':''; ?>>Female</option>
                                    <option value="M" <?php echo ($emp->gender == 'M')? 'selected':''; ?>>Male</option>
                                    <option value="O" <?php echo ($emp->gender == 'O')? 'selected':''; ?>>Others</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Marital Status</label>
                            <div class="col-sm-9">
                                <select name="marital_status" class="form-control">
                                    <option value="">Select</option>
                                    <option value="M" <?php echo ($emp->marital_status == 'M')? 'selected':''; ?>>Married</option>
                                    <option value="U" <?php echo ($emp->marital_status == 'U')? 'selected':''; ?>>Unmarried</option>
                                </select>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Guardian Name</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="gurd_name"
                                       value="<?php echo $emp->gurd_name; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description">
                    Contact info
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Primary Mobile No</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="prim_mob" 
                                       value="<?php echo $emp->prim_mob; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Secondary Mobile No</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="sec_mob"
                                       value="<?php echo $emp->sec_mob; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Professional Email</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="prof_email" 
                                       value="<?php echo $emp->prof_email; ?>"                                       
                                    />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Personal Email</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="personal_email"
                                       value="<?php echo $emp->personal_email; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>

                <p class="card-description">
                    Address info
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Country</label>
                            <div class="col-sm-9">
                                <select class="form-control"
                                    name="country"
                                    id="country"
                                    >

                                        <option value="">Select</option>
                                    <?php
                                        foreach($country as $list){
                                    ?>
                                        <option value="<?php echo $list->id?>" <?php echo ($emp->country == $list->id)? 'selected':''; ?>><?php echo $list->country_name; ?></option>

                                    <?php
                                        }
                                    ?>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">State</label>
                            <div class="col-sm-9">
                                <select class="form-control"
                                    name="state"
                                    id="state"
                                    >

                                        <option value="">Select</option>
                                    <?php
                                        foreach($state as $list){
                                    ?>
                                        <option value="<?php echo $list->id; ?>" <?php echo ($emp->state == $list->id)? 'selected':''; ?>><?php echo $list->state; ?></option>

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
                            <label class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="city" 
                                       value="<?php echo $emp->city; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Postal Code</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="postal_code" 
                                       value="<?php echo $emp->postal_code; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Present Address</label>
                            <div class="col-sm-9">
                                <textarea name="present_address" class="form-control"><?php echo $emp->present_address; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Permanent Address</label>
                            <div class="col-sm-9">
                                <textarea name="parmanent_address" class="form-control"><?php echo $emp->parmanent_address; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="card-description">
                    Medical info
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Blood Group</label>
                            <div class="col-sm-9">
                                <select class="form-control"
                                        name="blood_grp"
                                    >

                                        <option value="">Select</option>
                                   
                                        <option value="A+" <?php echo ($emp->blood_grp == 'A+')? 'selected':''; ?> >A+</option>
                                        <option value="A-" <?php echo ($emp->blood_grp == 'A-')? 'selected':''; ?> >A-</option>
                                        <option value="B+" <?php echo ($emp->blood_grp == 'B+')? 'selected':''; ?> >B+</option>
                                        <option value="B-" <?php echo ($emp->blood_grp == 'B-')? 'selected':''; ?> >B-</option>
                                        <option value="O+" <?php echo ($emp->blood_grp == 'O+')? 'selected':''; ?> >O+</option>
                                        <option value="O-" <?php echo ($emp->blood_grp == 'O-')? 'selected':''; ?> >O-</option>
                                        <option value="AB+" <?php echo ($emp->blood_grp == 'AB+')? 'selected':''; ?> >AB+</option>
                                        <option value="AB-" <?php echo ($emp->blood_grp == 'AB-')? 'selected':''; ?> >AB-</option>
                                    
                                </select>       
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Identity Mark <br>(if any)</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="identity_mark"
                                       value="<?php echo $emp->identity_mark; ?>"
                                       />
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description">
                    Bank Details
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bank Name</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="bank_name"
                                       value="<?php echo $emp->bank_name; ?>"
                                       />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Branch Name</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="branch_name"
                                       value="<?php echo $emp->branch_name; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Account No</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="account_no" 
                                       value="<?php echo $emp->account_no; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">PAN No</label>
                            <div class="col-sm-9">
                                <input type="text"
                                       class="form-control"
                                       name="pan_no" 
                                       value="<?php echo $emp->pan_no; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">PF No</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="pf_no" 
                                       value="<?php echo $emp->pf_no; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ESI No</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="esi_no"
                                       value="<?php echo $emp->esi_no; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Adhar No</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="adhar_no" 
                                       value="<?php echo $emp->adhar_no; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Passport No</label>
                            <div class="col-sm-9">
                                <input type="text"
                                       class="form-control"
                                       name="passport_no"
                                       value="<?php echo $emp->passport_no; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description">
                    Emergency Contacts
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Contact Name</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="emargency_name" 
                                       value="<?php echo $emp->emargency_name; ?>"
                                       />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Relation</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="relation"
                                       value="<?php echo $emp->relation; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Contact No</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="imargency_contact_no"
                                       value="<?php echo $emp->imargency_contact_no; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="imargency_address"><?php echo $emp->imargency_address; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="card-description">
                    Professional Details
                </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Designation</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="designation"
                                       value="<?php echo $emp->designation; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Department</label>
                            <div class="col-sm-9">
                                <select class="form-control"
                                        name="department"
                                    >

                                        <option value="">Select</option>
                                    <?php
                                        foreach($department as $list){
                                    ?>
                                        <option value="<?php echo $list->sl_no; ?>" <?php echo ($emp->department == $list->sl_no)? 'selected':''; ?>><?php echo $list->dept_name; ?></option>

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
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category">

                                    <option value="">Select</option>
                                    <option value="C" <?php echo ($emp->category == 'C')? 'selected':'';?>>Confirmed Employee</option>
                                    <option value="P" <?php echo ($emp->category == 'P')? 'selected':'';?>>Probationary Period</option>

                                </select>    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Joining Date</label>
                            <div class="col-sm-9">
                                <input type="date" 
                                       class="form-control"
                                       name="joining_dt"
                                       value="<?php echo $emp->joining_dt; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Document Submitted</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="document_sub"
                                       value="<?php echo $emp->document_sub ; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Employee Status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status">
                                    <option value="A" <?php echo ($emp->status == 'A')? 'selected':'';?>>Active</option>
                                    <option value="I" <?php echo ($emp->status == 'I')? 'selected':'';?>>Inactive</option>
                                </select>    
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Termination Date</label>
                            <div class="col-sm-9">
                                <input type="date" 
                                       class="form-control"
                                       name="termination_dt"
                                       value="<?php echo $emp->termination_dt; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Employee File No</label>
                            <div class="col-sm-9">
                                <input type="text" 
                                       class="form-control"
                                       name="file_no"
                                       value="<?php echo $emp->file_no; ?>"
                                    />
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
    </div>
</div>
            
<script>
    
    $(document).ready(function(){

        $('#join_dt').click(function(){

            $(this).attr('type', 'date');

        });

        $('#termination_dt').click(function(){

            $(this).attr('type', 'date');

        });

        $('#emp_type').change(function(){

            if($(this).val() == 'E'){

                $('#category').val('');
                $('#category').show();

            }
            else if($(this).val() != 'E'){

                $('#category').val('C');

                //$('#category').hide();
                
            }

        });

    });

</script>