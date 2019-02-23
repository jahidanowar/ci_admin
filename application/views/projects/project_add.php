<h1 class="h3 mb-2 text-gray-800">Add Project</h1>
<p class="mb-4"></p>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Fill the Form</h6>
    </div>
    <div class="card-body">

    <!-- show error message -->
    <?php if($this->session->flashdata('suc')): ?>
        <div class="alert alert-success my-2"><?php echo $this->session->flashdata('suc'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('err')): ?>
        <div class="alert alert-danger my-2"><?php echo $this->session->flashdata('err'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    <?php endif; ?>
    <?php echo validation_errors('<div class="alert alert-danger my-2">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>'); ?>

        <?php echo form_open('project/add',array('id'=>'project-form')); ?>
        <h4>General</h4>
        <hr>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="projectType">Project Type</label>
                    <select class="form-control" name="project_type" id="project_type" class="fotm-control">
                        <option value="">-- Chose an Option --</option>
                        <!-- <option value="1">Web Development</option>
                        <option value="2">Graphics Designing</option>
                        <option value="3">SEO</option> -->
                        <?php foreach($project_types as $p_t){ ?>
                        <option value="<?php echo $p_t['id']; ?>"><?php echo $p_t['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="projectStatus">Status</label>
                    <select class="form-control" name="status" id="status" class="fotm-control">
                        <option value="">-- Chose an Option --</option>
                        <!-- <option value="1">Open</option>
                        <option value="2">Closed</option>
                        <option value="3">Hold</option> -->
                        <?php foreach($project_status as $p_s){ ?>
                        <option value="<?php echo $p_s['id']; ?>"><?php echo $p_s['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name'); ?>">
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="projectType">Live URL</label>
                    <input type="text" name="live_url" id="live_url" class="form-control" value="<?php echo set_value('live_url'); ?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="projectStatus">Test URL</label>
                    <input type="text" name="test_url" id="test_url" class="form-control" value="<?php echo set_value('test_url'); ?>">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="projectStatus">Deadline</label>
                    <input type="text" name="dead_line" id="dead_line" class="form-control" value="<?php echo set_value('dead_line'); ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"><?php echo set_value('description'); ?></textarea>
        </div>

        <!-- Team Assignment Form  -->
        <h4>Team</h4>
        <hr>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label>Designier</label>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="user[]" value="1">
                        <label class="custom-control-label" for="customCheck1">Jahid</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2" name="user[]" value="2">
                        <label class="custom-control-label" for="customCheck2">Moshiur</label>
                    </div>
                </div>
                <div class="col">
                    <label>Developer</label>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck3" name="user[]" value="1">
                        <label class="custom-control-label" for="customCheck3">Jahid</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck4" name="user[]" value="3">
                        <label class="custom-control-label" for="customCheck4">Milon</label>
                    </div>
                </div>
                <div class="col">
                    <label>Marketer</label>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck5" name="user[]" value="1">
                        <label class="custom-control-label" for="customCheck5">Jahid</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck6" name="user[]" value="4">
                        <label class="custom-control-label" for="customCheck6">Soikat</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck7" name="user[]" value="2">
                        <label class="custom-control-label" for="customCheck7">Moshiur</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attachment -->
        <h4>Attachment</h4>
        <hr>
        <div class="form-group">
            <label for="addAttachment">Add Attachment</label>
            <input type="text" name="file_url" id="file_url" class="form-control" value="<?php echo set_value('file_url'); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Add Project</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        <?php echo form_close(); ?>
    </div>
</div>

<script>
$('#project_type').val('<?php echo set_value('project_type'); ?>');
$('#status').val('<?php echo set_value('status'); ?>');
</script>