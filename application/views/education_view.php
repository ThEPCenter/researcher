
<?php

function option_select($value, $data) {
    if ($value == $data) {
        return ' selected';
    }
}
?>
<div class="container" id="education">

    <h3>ประวัติการศึกษา</h3>
    <?php if (empty($q_education)): ?>
        <p class="bg-warning" style="padding: 15px;">ขออภัย ไม่พบข้อมูลประวัติการศึกษา</p>
    <?php else: ?>
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
                        <td><?php echo ucfirst($edu->degree); ?></td>
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
                                <form method="post" action="profile/edit_education_process">
                                    <div class="modal-body">

                                        <input type="hidden" name="education_id" value="<?php echo $edu->education_id; ?>">
                                        <input type="hidden" name="researcher_id" value="<?php echo $edu->researcher_id; ?>">

                                        <div class="form-group">
                                            <label for="">ปีที่จบ</label>
                                            <select class="form-control" name="grad_year" id="grad_year">
                                                <option value=""<?php echo option_select('', $edu->grad_year); ?>>---- Select Year ----</option>
                                                <?php for ($y = 1950; $y <= date("Y"); $y++) : ?>
                                                    <option value="<?php echo $y; ?>"<?php echo option_select($y, $edu->grad_year); ?>><?php echo $y; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">ระดับการศึกษา (degree)<span style="color: red;">**</span></label>
                                            <select class="form-control" name="degree" id="degree" required>
                                                <option value=""<?php echo option_select('', $edu->degree); ?>>---- Select Degree ----</option>
                                                <option value="bachelor"<?php echo option_select('bachelor', $edu->degree); ?>>Bachelor's degree</option>
                                                <option value="master"<?php echo option_select('master', $edu->degree); ?>>Master's degree</option>
                                                <option value="doctoral"<?php echo option_select('doctoral', $edu->degree); ?>>Doctoral's degree</option>
                                                <option value="doctoral"<?php echo option_select('diploma', $edu->degree); ?>>Diploma</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">สถาบันการศึกษา<span style="color: red;">**</span></label>
                                            <input type="text" class="form-control" name="institute" id="institute" required value="<?php echo $edu->institute; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">สาขาวิชา (major)</label>
                                            <input type="text" class="form-control" name="major" id="major" value="<?php echo $edu->major; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ประเทศ<span style="color: red;">**</span></label>
                                            <?php include 'country_array.php'; ?>
                                            <select class="form-control" name="country" id="country" required>
                                                <option value="">---- Select Country ----</option>
                                                <?php foreach ($country as $key => $value): ?>                                    
                                                    <option value="<?php echo $value; ?>"<?php echo option_select($value, $edu->country); ?>><?php echo $value; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">หัวข้อวิทยานิพนธ์</label>                                            
                                            <textarea class="form-control" name="thesis_title" rows="2" id="thesis_title"><?php echo $edu->thesis_title; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Keywords วิทยานิพนธ์</label>
                                            <textarea class="form-control" name="keyword" rows="2" id="keyword"><?php echo $edu->keyword; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Confirm edit</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div> <!-- END Modal -->

                    <!-- #deleteEdu Modal -->
                    <div class="modal fade" id="deleteEdu_<?php echo $edu->education_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteEdu_<?php echo $edu->education_id; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #d9534f; color: white;">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel_<?php echo $edu->education_id; ?>">Delete Education!</h4>
                                </div>
                                <div class="modal-body">
                                    Do you really want to delete the education data?
                                    <br><strong>Graduating year:</strong> <?php echo $edu->grad_year; ?>
                                    <br><strong>Degree:</strong> <?php echo ucfirst($edu->degree) . "'s degree"; ?>
                                    <br><strong>Major:</strong> <?php echo $edu->major; ?>
                                    <br><strong>Institute:</strong> <?php echo $edu->institute; ?>
                                    <br><strong>Country:</strong> <?php echo $edu->country; ?>
                                </div>
                                <div class="modal-footer">
                                    <form method="post" action="profile/delete_education">
                                        <input type="hidden" name="education_id" value="<?php echo $edu->education_id; ?>">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>                                        
                                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- END Modal -->
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

    <?php endif; ?>    

    <button title="Add Education" type="button" class="btn btn-default" data-toggle="modal" data-target="#addEdu"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มข้อมูลการศึกษา</button>
    <!-- #addEdu Modal -->
    <div class="modal fade" id="addEdu" tabindex="-1" role="dialog" aria-labelledby="addEdu" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Education</h4>
                </div>

                <form method="post" action="profile/add_education_process">
                    <div class="modal-body">

                        <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">

                        <div class="form-group">
                            <label for="">ปีที่จบ</label>
                            <select class="form-control" name="grad_year" id="grad_year">
                                <option value="">---- Select Year ----</option>
                                <?php for ($y = 1950; $y <= date("Y"); $y++) : ?>
                                    <option value="<?php echo $y; ?>"><?php echo $y; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">ระดับการศึกษา (degree)<span style="color: red;">**</span></label>
                            <select class="form-control" name="degree" id="degree" required>
                                <option value="">---- Select Degree ----</option>
                                <option value="bachelor">Bachelor's degree</option>
                                <option value="master">Master's degree</option>
                                <option value="doctoral">Doctoral's degree</option>
                                <option value="doctoral">Diploma</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">สถาบันการศึกษา</label>
                            <input type="text" class="form-control" name="institute" id="institute" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">สาขาวิชา (major)</label>
                            <input type="text" class="form-control" name="major" id="major">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">ประเทศ<span style="color: red;">**</span></label>
                            <?php include 'country_array.php'; ?>
                            <select class="form-control" name="country" id="country" required>
                                <option value="">---- Select Country ----</option>
                                <?php foreach ($country as $key => $value): ?>                                    
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">หัวข้อวิทยานิพนธ์</label>                                            
                            <textarea class="form-control" name="thesis_title" rows="2" id="thesis_title"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Keywords วิทยานิพนธ์</label>
                            <textarea class="form-control" name="keyword" rows="2" id="keyword"></textarea>
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
