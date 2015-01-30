
<div class="container">
    <h3 id="education">ประวัติการศึกษา</h3>
    <table class="table table-bordered">
        <tr>
            <th style="text-align: center;">ลำดับ</th>
            <th style="text-align: center;">ปีที่จบ</th>
            <th style="text-align: center;">ระดับการศึกษา (degree)</th>
            <th style="text-align: center;">สาขา (major)</th>
            <th style="text-align: center;">สถาบัน</th>
            <th style="text-align: center;">ประเทศ</th>
            <th style="text-align: center;"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></th>
        </tr>        
        <?php if (!empty($q_education)): ?>
            <?php $i = 1; ?>
            <?php foreach ($q_education as $edu): ?>
                <tr style="text-align: center;">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $edu->grad_year; ?></td>
                    <td><?php echo $edu->degree; ?></td>
                    <td><?php echo $edu->major; ?></td>
                    <td><?php echo $edu->institute; ?></td>
                    <td><?php echo $edu->country; ?></td>
                    <td style="min-width: 146px;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editEdu_<?php echo $edu->education_id; ?>">Edit</button> &nbsp;
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteEdu_<?php echo $edu->education_id; ?>">Delete</button>
                    </td>

                    <!-- #editEdu Modal -->
                <div class="modal fade" id="editEdu_<?php echo $edu->education_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editEdu_<?php echo $edu->education_id; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Education</h4>
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

                <!-- #deleteEdu Modal -->
                <div class="modal fade" id="deleteEdu_<?php echo $edu->education_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteEdu_<?php echo $edu->education_id; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #c12e2a; color: white;">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel_<?php echo $edu->education_id; ?>">Delete Education !</h4>
                            </div>
                            <div class="modal-body">
                                Do you really want to delete the <?php echo $title; ?> data?
                                <br>=> Year: <?php echo $edu->grad_year; ?>, Degree: <?php echo ucfirst($edu->degree) . "'s degree"; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>                            
                                <button type="button" class="btn btn-danger" onclick="window.location = '<?php echo site_url(); ?>/admin/delete_education/<?php echo $edu->education_id; ?>'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Confirm Delete</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- END Modal -->
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
    <button title="Add Education" type="button" class="btn btn-default" data-toggle="modal" data-target="#addEdu"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มข้อมูลการศึกษา</button>
    <!-- #addEdu Modal -->
    <div class="modal fade" id="addEdu" tabindex="-1" role="dialog" aria-labelledby="addEdu" aria-hidden="true">
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
