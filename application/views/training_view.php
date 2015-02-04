
<?php

function traing_select($value, $data) {
    if ($value == $data) {
        echo ' selected';
    }
}
?>
<div class="container" id="training">
    <h3>Postdoc and Research Training</h3>

    <?php if (empty($q_training)): ?>

        <p class="bg-warning" style="padding: 15px;">ขออภัย ไม่พบข้อมูล Training</p>

    <?php else: ?>

        <table class="table table-bordered">
            <tr>
                <th style="text-align: center;">Training type</th>
                <th style="text-align: center;">Institute / detail</th>
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
                        echo 'Research Training: Short Term (<3 months)';
                        break;
                    case 'long':
                        echo 'Research Training: Long Term (>3 months)';
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
                </tr>                

                <!-- #editTraining Modal -->
                <div class="modal fade" id="editTraining_<?php echo $row->training_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editTraining_<?php echo $row->training_id; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Training</h4>
                            </div>
                            <form method="post" action="profile/edit_training_process">
                                <input type="hidden" name="training_id" value="<?php echo $row->training_id; ?>">
                                <div class="modal-body">                              

                                    <div class="form-group">
                                        <label>Training type<span style="color: red;">**</span></label>
                                        <select class="form-control" name="training_type" id="training_type">
                                            <option value=""<?php traing_select('', $row->training_type); ?>>---- Select Training ----</option>
                                            <option value="postdoc"<?php traing_select('postdoc', $row->training_type); ?>>Postdoctoral Training</option>
                                            <option value="short"<?php traing_select('short', $row->training_type); ?>>Research Training: Short Term (<3 months)</option>
                                            <option value="long"<?php traing_select('long', $row->training_type); ?>>Research Training: Long Term (>3 months)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Institute / detail</label>
                                        <input type="text" class="form-control" name="institute" id="institute" required value="<?php echo $row->institute; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Period: </label>
                                        <input type="text" class="training_start form-date" name="training_start" 
                                               value="<?php
                                               if (!empty($row->training_start)) {
                                                   echo date("m/d/Y", strtotime($row->training_start));
                                               }
                                               ?>"> - 
                                        <input type="text" class="training_end form-date" name="training_end" 
                                               value="<?php
                                               if (!empty($row->training_end)) {
                                                   echo date("m/d/Y", strtotime($row->training_end));
                                               }
                                               ?>">
                                        <script>
                                            $(function () {
                                                // Date Picker
                                                $(".training_start").datepicker();
                                                $(".training_end").datepicker();
                                            }); /* END jQuery */
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label>Supervisor</label>
                                        <input type="text" class="form-control" name="supervisor" id="supervisor" value="<?php echo $row->supervisor; ?>">
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Confirm Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- END Modal -->

                <!-- #delTraining Modal -->
                <div class="modal fade" id="delTraining_<?php echo $row->training_id; ?>" tabindex="-1" role="dialog" aria-labelledby="delTraining_<?php echo $row->training_id; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #c12e2a; color: white;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel_<?php echo $row->training_id; ?>">Delete Training data!</h4>
                            </div>
                            <div class="modal-body">
                                Do you really want to delete the training data?
                                <br><strong>Training type: </strong><?php training_type($row->training_type); ?>
                                <br><strong>Institute / detail: </strong><?php echo $row->institute; ?>
                                <br><strong>Period: </strong> 
                                <?php
                                if (!empty($row->training_start)) {
                                    echo date("m/d/Y", strtotime($row->training_start));
                                }
                                ?> - 
                                <?php
                                if (!empty($row->training_end)) {
                                    echo date("m/d/Y", strtotime($row->training_end));
                                }
                                ?>
                                <br><strong>Supervisor: </strong><?php echo $row->supervisor; ?>
                            </div>
                            <div class="modal-footer">
                                <form method="post" action="profile/delete_training">
                                    <input type="hidden" name="training_id" value="<?php echo $row->training_id; ?>">                                    
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>                                
                                    <button type="submit" class="btn btn-danger">Confirm Delete</button>                                  
                                </form>                                
                            </div>
                        </div>
                    </div>
                </div> <!-- END Modal -->


            <?php endforeach; ?>
        </table>

    <?php endif; ?>

    <button title="Add Training" type="button" class="btn btn-default" data-toggle="modal" data-target="#addTraining"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มข้อมูล Training</button>    
    <!-- #addTraining Modal -->
    <div class="modal fade" id="addTraining" tabindex="-1" role="dialog" aria-labelledby="addTraining" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Training</h4>
                </div>

                <form class="form-horizontal" role="form" method="post" action="profile/add_training_process">

                    <div class="modal-body">

                        <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">

                        <div class="form-group">
                            <label for="training_type" class="col-lg-2 control-label">Training type<span style="color: red;">**</span></label>
                            <div class="col-lg-10">
                                <select class="form-control" name="training_type" id="training_type">
                                    <option value="">---- Select Training Type ----</option>
                                    <option value="postdoc">Postdoctoral Training</option>
                                    <option value="short">Research Training : Short Term (<3 months)</option>
                                    <option value="long">Research Training : Long Term (>3 months)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="institute" class="col-lg-2 control-label">Institute / detail<span style="color: red;">**</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="institute" id="institute" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Period</label>
                            <div class="col-lg-10">
                                <input type="text" class="training_start form-date" name="training_start"> - 
                                <input type="text" class="training_end form-date" name="training_end">
                                <script>
                                    $(function () {
                                        // Date Picker
                                        $(".training_start").datepicker();
                                        $(".training_end").datepicker();
                                    }); /* END jQuery */
                                </script>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="supervisor" class="col-lg-2 control-label">Supervisor</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="supervisor" id="supervisor">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div> <!-- END Modal -->

</div> <!-- /.container -->

<p>&nbsp;</p>
