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
        <?php 
          foreach($projects as $project){
          ?>
        <tr>
            <td><?php echo $project['id']; ?></td>
            <td><?php echo $project['name']; ?></td>
            <td><?php echo $project['created_at']; ?></td>
            <td><?php echo $project['project_type']['name']; ?></td>
            <td><?php echo $project['project_status']['name']; ?></td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="#" class="btn btn-xs btn-primary viewProject" id="viewProject" data-id="<?php echo $project['id']; ?>"><i class="far fa-eye"></i></a>
                    <a href="#" class="btn btn-xs btn-warning editProject" data-id="<?php echo $project['id']; ?>" data-toggle="modal" data-target="#editProjectModal"><i class="far fa-edit"></i></a>
                    <a href="#" class="btn btn-xs btn-danger delteProject" data-id="<?php echo $project['id']; ?>"><i class="far fa-trash-alt"></i></a>
                </div>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>



