<h1 class="h3 mb-2 text-gray-800">Manage Invoice</h1>
<p class="mb-4"></p>

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

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Invoices
        <span class="pull-right">
            <a href="<?php echo site_url('invoice/create'); ?>" class="badge badge-danger">Create Invoice <i class="fas fa-tasks"></i></a>
        </span>
        </h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="manageTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Particluer</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>

            </table>
        </div>

    </div>
</div>



<script>
$(document).ready(function(){
    var manageTable = $('#manageTable').DataTable({
    "ajax": "<?php echo site_url('invoice/invoice_show'); ?>",
    });

})
</script>

<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
<script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>
<!-- Bootstrap Data picker -->
<script src="<?php echo base_url(); ?>assets/vendor/bs-date-picker/js/bootstrap-datepicker.min.js"></script>