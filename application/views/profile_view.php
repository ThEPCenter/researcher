   
<div class="container">
    <h2 id="top">Profile.</h2>

    <?php if (isset($researcher_id)) : ?>

        <h3 id="basic">ข้อมูลพื้นฐาน</h3>

        <div class="row">
            <div class="col-md-2">
                <p><img style="max-width: 100%;" src="<?php echo $pic_url; ?>"></p>
            </div>

            <div class="col-md-10">
                <p><strong>ชื่อ:</strong> <?php echo $title_th . $firstname_th . ' ' . $lastname_th; ?></p>
                <p><strong>Name:</strong> <?php echo $title_en . $firstname_en . ' ' . $lastname_en; ?></p>
                <p><strong>วันเกิด (Date of birth):</strong> 
                    <?php
                    if (!empty($dob)):
                        echo date("F j, Y.", $dob);
                    endif;
                    ?>
                </p>
                <p><strong>เพศ (gender) :</strong> 
                    <?php
                    if ($gender == 'male'):
                        echo 'ชาย (male)';
                    elseif ($gender == 'female'):
                        echo 'หญิง (female)';
                    else:
                        echo '';
                    endif;
                    ?>
                </p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editBasic">Edit ข้อมูลพื้นฐาน</button>

            </div>
        </div> <!-- /.row -->        
        <p>&nbsp;</p>

        <!-- #editBasic Modal -->
        <div class="modal fade" id="editBasic" tabindex="-1" role="dialog" aria-labelledby="editBasic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit ข้อมูลพื้นฐาน</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-warning">Confirm edit</button>
                    </div>
                </div>
            </div>
        </div> <!-- END Modal -->

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
            <?php ?>
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
                        <td style="min-width: 146px;"><button type="button" class="btn btn-primary">Edit</button> &nbsp;
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteEdu_<?php echo $edu->education_id; ?>">Delete</button>
                        </td>
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
        <button title="Add Education" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มข้อมูลการศึกษา</button>
        <p>&nbsp;</p>

        <h3 id="employment">ข้อมูลการทำงาน (employment)</h3>        

        <?php foreach ($q_employment as $em) : ?>

            <p><strong>Academic position:</strong> <?php echo $em->academic; ?></p>
            <p><strong>Administrative position:</strong> <?php echo $em->administrative; ?></p>
            <p><strong>Research position:</strong> <?php echo $em->research; ?></p>
            <p><strong>Affiliated University / Institute:</strong> <?php echo $em->institute; ?></p>
            <p><strong>Faculty / College / Center:</strong> <?php echo $em->faculty; ?></p>
            <p><strong>Department / School / Division:</strong> <?php echo $em->department; ?></p>

            <p><strong>ที่ติดต่อที่ทำงาน:</strong>
                <?php if (!empty($em->street_th)): ?>                                
                    <?php echo $em->street_th; ?>
                <?php endif; ?>

                <?php
                if (!empty($em->sub_district_th)):
                    if ($em->province_th == 'กรุงเทพมหานคร'):
                        echo 'แขวง';
                    else:
                        echo 'ตำบล';
                    endif;
                    echo $em->sub_district_th;
                endif;
                ?>

                <?php
                if (!empty($em->district_th)):
                    if ($em->province_th == 'กรุงเทพมหานคร'):
                        echo 'เขต';
                    else:
                        echo 'อำเภอ';
                    endif;
                    echo $em->district_th;
                endif;
                ?>

                <?php
                if (!empty($em->province_th)):
                    if ($em->province_th != 'กรุงเทพมหานคร'):
                        echo 'จังหวัด';
                    endif;
                    echo $em->province_th;
                endif;
                ?>

                <?php echo $em->postal_code; ?>

            </p>

            <p>
                <strong>โทรศัพท์:</strong> 
                <?php
                if (!empty($em->phone)) {
                    echo $em->phone;
                }
                ?>
            </p>

            <?php if (!empty($em->mobile_phone)): ?>
                <p><strong>โทรศัพท์มือถือ: </strong><?php echo $em->mobile_phone; ?></p>
            <?php endif; ?>

            <p>
                <strong>Email:</strong> 
                <?php
                if (!empty($em->email)) {
                    echo $em->email;
                }
                ?>
            </p>
            <p>
                <strong>Website:</strong>
                <?php if (!empty($em->website)) : ?>
                    <a target="_blank" href="<?php echo $em->website; ?>"><?php echo $em->website; ?></a>
                <?php endif; ?>
            </p>
        <?php endforeach; ?>
        <p>&nbsp;</p>

        <h3 id="training">Postdoc and Research Training</h3>
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
                           class="btn btn-primary">
                            Edit
                        </a> &nbsp;
                        <a class="btn btn-danger" data-toggle="modal" data-target="#delTraining_<?php echo $row->training_id; ?>">Delete</a>                            
                    </td>
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

        <!-- END Traing -->
        <p>&nbsp;</p>

        <h3 id="expertise">ความเชี่ยวชาญ (Field of Expertise / Competency)</h3>
        <?php if (!empty($q_expertise)): ?>
            <?php foreach ($q_expertise as $ex): ?>
                <p>
                    <?php if (!empty($ex->topic)): ?>
                        <?php echo $ex->topic; ?><br>
                    <?php endif; ?>

                    <?php if (!empty($ex->specific_topic)): ?>
                        - <?php echo $ex->specific_topic; ?>
                    <?php endif; ?>
                </p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>- ขออภัย ไม่พบข้อมูล -</p>
        <?php endif; ?>
        <p>&nbsp;</p>

        <h3 id="publication">Publication (ผลงานตีพิมพ์)</h3>
        <?php foreach ($q_publication as $pub): ?>
            <div><?php echo htmlspecialchars_decode($pub->content); ?></div>
        <?php endforeach; ?>
        <p>&nbsp;</p>


        <br /><a href="profile/edit">Edit Profile</a>
    <?php else : ?>
        <?php
        if (isset($no_user)) {
            echo "<h3>$no_user</h3>";
        } else {
            echo 'ยังไม่ได้กรอกข้อมูล<br /><a href="profile/add">Add Profile.</a>';
        }
        ?>
    <?php endif; ?>
</div>