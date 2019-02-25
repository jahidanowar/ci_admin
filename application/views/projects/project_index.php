<!-- Custom styles for this page -->
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/vendor/bs-date-picker/css/bootstrap-datepicker.min.css" rel="stylesheet">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Project</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">All Projects</h6>
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

  <div class="table-responsive">
    <table class="table table-bordered" id="manageTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Type</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
        </thead>

    </table>
  </div>
</div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteProjectModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confrim Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you want to Delete the Project ?
      </div>
      <div class="modal-footer">
        <form method="POST" id="deleteForm">
          <input type="hidden" name="id" id="id">
          <button type="submit" class="btn btn-danger">Yes</button>   
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editProjectModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('project/update', array('id'=>'editForm')); ?>
        <input type="hidden" name="id" id="id">
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
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="projectType">Live URL</label>
                        <input type="text" name="live_url" id="live_url" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="projectStatus">Test URL</label>
                        <input type="text" name="test_url" id="test_url" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="projectStatus">Deadline</label>
                        <input type="text" name="dead_line" id="dead_line" class="form-control date">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="editor" class="form-control"></textarea>
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
            <input type="text" name="file_url" id="file_url" class="form-control">
        </div>
        <button class="btn btn-primary btn-block">Update</button>
      </div>
      <div class="modal-footer">       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {

  var manageTable = $('#manageTable').DataTable({
    "ajax": "<?php echo site_url('project/project_show'); ?>",
  });

  //Update Form
  $(document).on('submit', '#editForm', function(e){
    e.preventDefault();
    var projectData = $(this).serialize();
    // console.log(projectData);
    $.ajax({
      url:'<?php echo site_url('project/update'); ?>',
      type:'POST',
      data:projectData,
      dataType:'JSON',
      success: function(resp){
        if(resp.status == true){
          manageTable.ajax.reload();
          $('#editProjectModal').modal('hide');
          notifyFunc(resp.message,'success');
        }
        else{
          notifyFunc(resp.message,'danger');
        } 
      }
    })
  });

  //Delete Project
  $(document).on('click', '.delteProject', function(){
    var id  = $(this).attr('data-id');
    $('#deleteProjectModal').modal('show');
    $('#deleteProjectModal #id').val(id);
  });

  //Confrim Delete
  $(document).on('submit', '#deleteForm', function(e){
    e.preventDefault();
    id = $(this).serialize();
    $.ajax({
      url:'<?php echo site_url('project/delete'); ?>',
      type:'POST',
      data:id,
      dataType:'JSON',
      success: function(resp){
        if(resp.status == true){
          manageTable.ajax.reload();
          $('#deleteProjectModal').modal('hide');
          notifyFunc(resp.message,'success');
        }
        else{
          notifyFunc(resp.message,'danger');
        } 
      }

    });
  })
  //Bootstrap Date Picker
  $('.date').datepicker({
    format: 'dd/mm/yyyy',
    todayBtn: true,
    todayHighlight: true,
    autoclose: true
  });
});

// edit function
function editFunc(id){ 
  $.ajax({
    url:'<?php echo site_url('project/edit'); ?>',
    data:{id:id},
    type:'POST',
    dataType:'JSON',
    success:function(data){
      // $('#editProjectModal .modal-body').html(data);
      // manageTable.ajax.reload();
      $('#editForm #id').val(data.id);
      $('#editForm #project_type').val(data.project_types_id);
      $('#editForm #status').val(data.project_status_id);
      $('#editForm #name').val(data.name);
      $('#editForm #live_url').val(data.live_url);
      $('#editForm #test_url').val(data.test_url);
      $('#editForm #dead_line').val(data.dead_line);
      $('#editForm #file_url').val(data.file_url);
      $('#editForm #editor').val(data.description);

      var string = data.team;
      var array = string.split(',');

      for (var i = 0; i < array.length; i++) {
        $('.custom-check-box[value='+array[i]+']').attr("checked", "checked");
      }
    }
  });
}

//Notification Function
function notifyFunc(message,type){
  $.notify({
    // options
    message: message 
    },{
    // settings
    type: type,
    z_index: 1100
  }); 
}

</script>
<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
<script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>
<!-- Bootstrap Data picker -->
<script src="<?php echo base_url(); ?>assets/vendor/bs-date-picker/js/bootstrap-datepicker.min.js"></script>

