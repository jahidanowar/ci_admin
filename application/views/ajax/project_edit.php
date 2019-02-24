<?php echo form_open('project/update', array('id'=>'editForm')); ?>
<input type="hidden" name="id" value="<?php echo $project['id']; ?>">
<h4>General</h4>
<hr>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Project Type</label>
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
                <label>Project Status</label>
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
        <label for="">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="<?php echo $project['name']; ?>">
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="projectType">Live URL</label>
                <input type="text" name="live_url" id="live_url" class="form-control" value="<?php echo $project['live_url']; ?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="projectStatus">Test URL</label>
                <input type="text" name="test_url" id="test_url" class="form-control" value="<?php echo $project['test_url']; ?>">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="projectStatus">Deadline</label>
                <input type="text" name="dead_line" id="dead_line" class="form-control" value="<?php echo $project['dead_line']; ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" id="editor" class="form-control"><?php echo $project['description']; ?></textarea>
    </div>
<!-- Team Assignment Form  -->
<h4>Team</h4>
<hr>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label>Designier</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input custom-check-box" id="customCheck1" name="user[]" value="1">
                <label class="custom-control-label" for="customCheck1">Jahid</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input custom-check-box" id="customCheck2" name="user[]" value="2">
                <label class="custom-control-label" for="customCheck2">Moshiur</label>
            </div>
        </div>
        <div class="col">
            <label>Developer</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input custom-check-box" id="customCheck3" name="user[]" value="1">
                <label class="custom-control-label" for="customCheck3">Jahid</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input custom-check-box" id="customCheck4" name="user[]" value="3">
                <label class="custom-control-label" for="customCheck4">Milon</label>
            </div>
        </div>
        <div class="col">
            <label>Marketer</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input custom-check-box" id="customCheck5" name="user[]" value="1">
                <label class="custom-control-label" for="customCheck5">Jahid</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input custom-check-box" id="customCheck6" name="user[]" value="4">
                <label class="custom-control-label" for="customCheck6">Soikat</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input custom-check-box" id="customCheck7" name="user[]" value="2">
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
    <input type="text" name="file_url" id="file_url" class="form-control" value="<?php echo $project['file_url']; ?>">
</div>
<button class="btn btn-primary btn-block">Update</button>
<div class="result"></div>
<?php echo form_close();  ?>

<script>
    $('#project_type').val('<?php echo $project['project_types_id']; ?>');
    $('#status').val('<?php echo $project['project_status_id']; ?>');

    var string = '<?php echo $project['team']; ?>';
    var array = string.split(',');

    for (var i = 0; i < array.length; i++) {

        $('.custom-check-box[value='+array[i]+']').attr("checked", "checked");
    }

    // $( "#editForm" ).on( "submit", function( event ) {
    //     event.preventDefault();
    //     //   console.log( $( this ).serialize() );
    //     // $.post('project/update', $('#editForm').serialize(),function(data){
    //     //     $(".result").html(data);
    //     // })
    //     $.ajax({
    //        type: "POST",
    //        url: "project/update",
    //        data: $('#editForm').serialize(),
    //        beforeSend: function() {
    //           $("#editForm").css("opacity", 0.5);
    //        },
    //        success: function(msg) {
    //         $(".result").html(msg);
    //         $("#editForm").css("opacity", 1);
    //             $("#editProjectModal").modal('hide');
    //             $('body').reload()
    //        }
    //     });
      
    // });
    
</script>