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
                <table class="table">
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