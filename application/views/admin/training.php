
<div class="container">
    <div class="row well">       
        <h2 style="text-align: center;"><span class="glyphicon glyphicon-fire"></span> <?php echo $title; ?></h2>
        <p>&nbsp;</p>

        <?php if (!$query) : ?>
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6 alert alert-warning text-center"><strong style="color: red;">ขออภัย ไม่พบข้อมูล <?php echo ucfirst($title); ?></strong></div>
                <div class="col-md-3">&nbsp;</div>
            </div>

            <form method="post" action="<?php echo site_url(); ?>/admin/add_training">
                <div style="text-align: center;">
                    <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                    <button class="btn btn-default">กรอกข้อมูล Training</button>
                </div>
            </form>

        <?php else: ?>

            <table class="table table-bordered">

                <tr><th style="text-align: center;">Training type</th><th style="text-align: center;">Institute</th><th style="text-align: center;">Period</th><th style="text-align: center;">Supervisor</th><th>&nbsp;</th></tr>

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

                foreach ($query as $row) :
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
                        <td style="text-align: center; min-width: 138px;">                            
                            <a href="<?php echo site_url() ?>/admin/edit_training/<?php echo $row->training_id; ?>"
                               class="btn btn-primary">
                                Edit
                            </a>                            
                            <a class="btn btn-danger" data-toggle="modal" data-target="#myModal_<?php echo $row->training_id; ?>">Delete</a>                            
                        </td>
                        <!-- Modal -->
                    <div class="modal fade" id="myModal_<?php echo $row->training_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
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

            <form role="form" method="post" action="<?php echo site_url(); ?>/admin/add_training">
                <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add</button>
            </form>

        <?php endif; ?>

    </div>

    <a class="btn btn-default" href="<?php echo site_url(); ?>/admin/profile/<?php echo $researcher_id; ?>"><span class="glyphicon glyphicon-arrow-left"></span> Back to Profile</a>

</div> <!-- /.container -->
