<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manage Project Types</h1>

<div class="row">
    <div class="col-md-6 my-2">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Project Type</h6>
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
            <!-- ./show error message -->

                <?php echo form_open('project/type'); ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name'); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Project Type</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 my-2">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Project Type</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody class="mytable">
                        <?php $i = 1; foreach($project_types as $p_t){ ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $p_t['name']; ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-xs btn-warning editBtn" data-id="<?php echo $p_t['id']; ?>"><i class="far fa-edit"></i></a>
                                    <a href="#" class="btn btn-xs btn-danger deleteBtn" data-id="<?php echo $p_t['id']; ?>"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Project Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('project/updateProjectType', array('id'=>'editForm')); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name">Project Type Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    //Load data on Edit Form
    $(document).on('click', '.editBtn',function(){
        var id = $(this).attr('data-id');
        // console.log(id);
        $("#editModal").modal('show');
        $.ajax({
            url:'<?php echo site_url("project/getProjectType"); ?>',
            type:'POST',
            data:{id:id},
            dataType:'JSON',
            success: function(resp){
                $("#editModal input[name='name']").val(resp.name);
                $("#editModal input[name='id']").val(resp.id);
            }
        });
    });
    //Update data
    $(document).on('submit','#editForm', function(e){
        e.preventDefault();
        var ProjectTypeData = $(this).serialize();
        // console.log(ProjectTypeData);
        $.ajax({
            type:'POST',
            url: '<?php echo site_url('project/updateProjectType'); ?>',
            data:ProjectTypeData,
            dataType:'JSON',
            success: function(r){
                $("#editModal").modal('hide');
            }
        })
    })

    //Delete Data
    $(document).on('click', '.deleteBtn',  function(){
        var id = $(this).attr('data-id');
        console.log(id);
    })
})
</script>