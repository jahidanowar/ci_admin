<!-- Custom styles for this page -->
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manage Project Status</h1>

<div class="row">
    <div class="col-md-6 my-2">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Project Status</h6>
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

                <?php echo form_open('project/status'); ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name'); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Project Status</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 my-2">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Project Status</h6>
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($project_status as $p_t){ ?>
                        <tr>
                            <td><?php echo $p_t['id']; ?></td>
                            <td><?php echo $p_t['name']; ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-xs btn-warning"><i class="far fa-edit"></i></a>
                                    <a href="#" class="btn btn-xs btn-danger"><i class="far fa-trash-alt"></i></a>
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
                <h5 class="modal-title">Edit Project Status</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="#" id="editForm" method="POST">
                <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    //Initialise Data Table
    var myTable = $('#myTable').DataTable({
        "ajax": '<?php echo site_url("project/getProjectStatusList"); ?>',
        autoWidth: false,
        paging: false,
        searching: false,
        ordering:  false
    });

    //Edit Modal Trigger and Getting Edit Form Data
    $(document).on('click', '.editBtn', function(){
        var id =  $(this).data('id');
        $('#editModal').modal('show');
        
        $.ajax({
            type:'POST',
            url:'<?php echo site_url('project/getProjectStatus') ?>',
            data:{id:id},
            dataType:'JSON',
            success: function(r){
                $('#editForm input[name="name"]').val(r.name);
                $('#editForm input[name="id"]').val(r.id);
            }
        })

    })

    //Update Edit Form 
    $(document).on('submit', '#editForm', function(e){
        e.preventDefault();
        var projectStatusData = $(this).serialize();

        $.ajax({
            type:'POST',
            url:'<?php echo site_url('project/updateProjectStatus') ?>',
            data:projectStatusData,
            dataType:'JSON',
            success: function(r){
                myTable.ajax.reload();
                $('#editModal').modal('hide');
                notifyFunc(r.message,'success');
            }
        })
    })

    //Delete Project Status
    $(document).on('click', '.deleteBtn', function(){
        var id = $(this).data('id');

        $.ajax({
            type:'POST',
            url:'<?php echo site_url('project/deleteProjectStatus') ?>',
            data:{id:id},
            dataType:'JSON',
            success : function(r){
                myTable.ajax.reload();
                notifyFunc(r.message, 'success');
            }
        })
    })

})
</script>
<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
<script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>