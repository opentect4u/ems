<form class="form-sample" 
        method="POST"
        action="<?php echo site_url('notice/'.$url); ?>"
    >
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Notice</h4>
                    <input type="hidden" 
                            class="form-control"
                            name="notice_cd"
                            value="<?php echo $notice->notice_cd;?>"
                        />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label">Subject <span class="required">*</span></label>
                                <div class="col-sm-11">
                                    <input type="text" 
                                           class="form-control"
                                           name="subject"
                                           required
                                           value="<?php echo $notice->subject;?>"
                                        />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-1 col-form-label">Notice <span class="required">*</span></label>
                                <div class="col-sm-11">
                                    <textarea name="notice" required class="form-control" cols="50" rows="30"><?php echo $notice->notice; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(!$this->input->get('view')){
    ?>
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <?php
        }
    ?>
</form>

<script>
        CKEDITOR.replace( 'notice' );
</script>