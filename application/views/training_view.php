
<div class="container">
    <h3 id="training">Postdoc and Research Training</h3>

    <?php if (empty($q_training)): ?>

        <p class="bg-warning" style="padding: 15px;">ขออภัย ไม่พบข้อมูล Training</p>

    <?php else: ?>

        <table class="table table-bordered">
            <tr>
                <th style="text-align: center;">Training type</th>
                <th style="text-align: center;">Institute</th>
                <th style="text-align: center;">Period</th>
                <th style="text-align: center;">Supervisor</th>
                <th style="text-align: center;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></th>
            </tr>
            <?php

            function training_type($type) {
                switch ($type) {
                    case 'postdoc':
                        echo 'Postdoctoral Training';
                        break;
                    case 'short':
                        echo 'Research Training : Short Term (<3 months)';
                        break;
                    case 'long':
                        echo 'Research Training : Long Term (>3 months)';
                        break;
                    default:
                        echo '';
                        break;
                }
            }

            foreach ($q_training as $row) :
                ?>
                <tr>
                    <td><strong><?php training_type($row->training_type); ?></strong></td>
                    <td><?php echo $row->institute; ?></td>
                    <td>
                        <?php
                        if (!empty($row->training_start)) {
                            echo date("F j, Y", strtotime($row->training_start));
                        }
                        echo ' - ';
                        if (!empty($row->training_end)) {
                            echo date("F j, Y", strtotime($row->training_end));
                        }
                        ?>
                    </td>
                    <td><?php echo $row->supervisor; ?></td>
                    <td style="text-align: center; min-width: 146px;">                            
                        <a href="<?php echo site_url() ?>/admin/edit_training/<?php echo $row->training_id; ?>"
                           class="btn btn-primary" data-toggle="modal" data-target="#editTraining_<?php echo $row->training_id; ?>">
                            Edit
                        </a> &nbsp;
                        <a class="btn btn-danger" data-toggle="modal" data-target="#delTraining_<?php echo $row->training_id; ?>">Delete</a>                            
                    </td>

                    <!-- #editTraining Modal -->
                <div class="modal fade" id="editTraining_<?php echo $row->training_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editTraining_<?php echo $row->training_id; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Training</h4>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-warning">Confirm edit</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- END Modal -->

                <!-- #delTraining Modal -->
                <div class="modal fade" id="delTraining_<?php echo $row->training_id; ?>" tabindex="-1" role="dialog" aria-labelledby="delTraining_<?php echo $row->training_id; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #c12e2a; color: white;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel_<?php echo $row->training_id; ?>">Delete <?php echo $title; ?>!</h4>
                            </div>
                            <div class="modal-body">
                                Do you really want to delete the <?php echo $title; ?> data?
                                <br><?php training_type($row->training_type); ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>                            
                                <button type="button" class="btn btn-danger" onclick="window.location = '<?php echo site_url(); ?>/admin/delete_training/<?php echo $row->training_id; ?>'">Confirm Delete</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- END Modal -->

                </tr>
            <?php endforeach; ?>
        </table>

    <?php endif; ?>

    <button title="Add Training" type="button" class="btn btn-default" data-toggle="modal" data-target="#addTraining"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มข้อมูล Training</button>    
    <!-- #addTraining Modal -->
    <div class="modal fade" id="addTraining" tabindex="-1" role="dialog" aria-labelledby="addTraining" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Education</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Confirm Add</button>
                </div>
            </div>
        </div>
    </div> <!-- END Modal -->

</div> <!-- /.container -->

<p>&nbsp;</p>
