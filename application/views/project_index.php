<!-- Custom styles for this page -->
<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Project</h1>
<p class="mb-4"></p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">All Projects</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
        <tbody>
        <?php foreach($projects as $project){ ?>
        <tr>
            <td><?php echo $project['id']; ?></td>
            <td><?php echo $project['name']; ?></td>
            <td><?php echo $project['created_at']; ?></td>
            <td><?php echo $project['project_types_id']; ?></td>
            <td><?php echo $project['project_status_id']; ?></td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="#" class="btn btn-xs btn-primary viewProject" id="viewProject"><i class="far fa-eye"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="viewProjectModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



 <!-- Page level plugins -->
 <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
<script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>

<script>
$('.viewProject').click(function(){

    $('#viewProjectModal').modal('show');
})
</script>