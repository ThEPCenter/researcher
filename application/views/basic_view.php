
<div class="container" id="basic">

    <h3>ข้อมูลพื้นฐาน</h3>

    <?php if (empty($q_profile)): ?>

        <p class="bg-warning" style="padding: 15px;">ขออภัย ไม่พบข้อมูลพื้นฐาน</p>

        <button title="Add Basic Profile" type="button" class="btn btn-default" data-toggle="modal" data-target="#addBasic"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มข้อมูลพื้นฐาน</button>
        <!-- #addBasic Modal -->
        <div class="modal fade" id="addBasic" tabindex="-1" role="dialog" aria-labelledby="addBasicu" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูลพื้นฐาน</h4>
                    </div>
                    <form class="form-horizontal" role="form" method="post" action="profile/add_basic_process">

                        <div class="modal-body">                                

                            <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">

                            <div class="form-group">
                                <label class="col-md-2 col-lg-2 control-label">Profile picture</label>
                                <div class="col-md-10 col-lg-10">
                                    <div id="show-pic">
                                        <img src="">
                                    </div>                            
                                </div>
                            </div> 
                            <script>
                                $(function () {
                                    $("#pic_url").blur(function () {
                                        var pic_url = $("#pic_url").val();
                                        $("#show-pic").html("<img src=\"" + pic_url + "\" style=\"max-width: 100%; height: auto;\">");
                                    });

                                });
                            </script>                

                            <div class="form-group">
                                <label for="website" class="col-md-2 col-lg-2 control-label">Picture's url</label>
                                <div class="col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="pic_url" id="pic_url" placeholder="เช่น http://www.example.com/pic.jpg">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 col-lg-2 control-label">Date of birth</label>
                                <div class="col-md-10 col-lg-10">
                                    <input type="text" class="dob form-date" name="dob" placeholder=" Month/Date/Year">
                                    <script>
                                        $(function () {
                                            // Date Picker                               
                                            $(".dob").datepicker();
                                        }); /* END jQuery */
                                    </script>
                                    <span class="help-block">สามารถกรอกวันเกิด ในรูปแบบ เดือน/วัน/ปี (ค.ศ.) เช่น 11/25/1960 หมายถึง 25 November 1960 </span>                        
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title_th" class="col-md-2 col-lg-2 control-label">คำนำหน้าชื่อ (Thai)</label>
                                <div class="col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="title_th" id="title_th" placeholder="เช่น ดร., ผศ.ดร., ศ.ดร., นพ., ร.ต., นาย เป็นต้น">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="firstname_th" class="col-md-2 col-lg-2 control-label">ชื่อ (Thai)</label>
                                <div class="col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="firstname_th" id="firstname_th" placeholder="ชื่อ">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lastname_th" class="col-md-2 col-lg-2 control-label">สกุล (Thai)</label>
                                <div class="col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="lastname_th" id="lastname_th" placeholder="นามสกุล">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title_en" class="col-md-2 col-lg-2 control-label">Title (English)</label>
                                <div class="col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Dr., Prof.Dr., Mr., Ms. etc.">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="firstname_en" class="col-md-2 col-lg-2 control-label">First name<span style="color: red;">**</span></label>
                                <div class="col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="firstname_en" id="firstname_en" required placeholder="first name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="lastname_en" class="col-md-2 col-lg-2 control-label">Last name<span style="color: red;">**</span></label>
                                <div class="col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="lastname_en" id="lastname_en" required placeholder="last name">
                                    <span id="check_name" class="help-block">Check Firstname and Lastname.</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 col-lg-2 control-label">เพศ (gender)</label>
                                <div class="col-md-10 col-lg-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" id="male" value="male">ชาย (male)
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" id="female" value="female">หญิง (female)
                                        </label>
                                    </div>
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

    <?php else: ?>

        <?php foreach ($q_profile as $profile): ?>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <p><img style="max-width: 100%;" src="<?php echo $profile->pic_url; ?>"></p>
                    <p><a type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#editPicture">แก้ไขรูป</a></p>
                    <!-- #editPicture Modal -->
                    <div class="modal fade" id="editPicture" tabindex="-1" role="dialog" aria-labelledby="editPictureLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h3 class="modal-title" id="myModalLabel">Edit Picture</h3>
                                </div>

                                <div class="modal-body">
                                    <h4>- คุณสามารถ upload รูปจากคอมพิวเตอร์ได้โดยตรง</h4>
                                    <?php echo form_open_multipart('upload/do_upload'); ?>
                                    <label>File input</label>
                                    <input type="file" name="userfile" size="20" />
                                    <p class="help-block">**ควร upload รูปแนวตั้ง และ มีความกว้าง (width) ไม่เกิน 300 พิกเซล (pixel)</p>

                                    <br /><br />
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> &nbsp;
                                    <input type="submit" class="btn btn-primary" value="upload">

                                    </form>

                                </div>
                                <div class="modal-footer"></div>

                                <div class="modal-body">
                                    <h4>หรือ</h4>
                                    <h4>- แก้ไขโดยกรอกลิงค์ของรูป (picture's url) ในอินเทอร์เน็ต</h4>
                                    <form>                                                       

                                        <div class="form-group">
                                            <label>Picture's url</label>
                                            <input type="text" class="form-control" name="pic_url" id="pic_url" value="<?php echo $profile->pic_url; ?>" placeholder="เช่น http://www.example.com/pic.jpg">

                                        </div>                                       
                                        <div class="form-group">
                                            <label>Profile picture</label>
                                            <div id="show-pic">
                                                <img src="<?php echo $profile->pic_url; ?>">
                                            </div>
                                        </div> 
                                        <script>
                                            $(function () {
                                                $("#pic_url").blur(function () {
                                                    var pic_url = $("#pic_url").val();
                                                    $("#show-pic").html("<img src=\"" + pic_url + "\" style=\"max-width: 100%; height: auto;\">");
                                                });

                                            });
                                        </script>

                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.col-md-2 -->

                <div class="col-xs-10 col-sm-10 col-md-10">
                    <p><strong>ชื่อ:</strong> <?php echo $profile->title_th . $profile->firstname_th . ' ' . $profile->lastname_th; ?></p>
                    <p><strong>Name:</strong> <?php echo $profile->title_en . $profile->firstname_en . ' ' . $profile->lastname_en; ?></p>
                    <p><strong>วันเกิด (Date of birth):</strong> 
                        <?php
                        if (!empty($profile->dob)):
                            echo date("F j, Y.", $profile->dob);
                        endif;
                        ?>
                    </p>
                    <p><strong>เพศ (gender) :</strong> 
                        <?php
                        if ($profile->gender == 'male'):
                            echo 'ชาย (male)';
                        elseif ($profile->gender == 'female'):
                            echo 'หญิง (female)';
                        else:
                            echo '';
                        endif;
                        ?>
                    </p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editBasic">Edit ข้อมูลพื้นฐาน</button>
                </div>

                <!-- #editBasic Modal -->
                <div class="modal fade" id="editBasic" tabindex="-1" role="dialog" aria-labelledby="editBasic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit ข้อมูลพื้นฐาน</h4>
                            </div>

                            <form class="form-horizontal" role="form" method="post" action="profile/edit_profile_process">

                                <div class="modal-body">                                

                                    <input type="hidden" name="researcher_id" value="<?php echo $profile->researcher_id; ?>">

                                    <div class="form-group">
                                        <label class="col-md-2 col-lg-2 control-label">Date of birth</label>
                                        <div class="col-md-10 col-lg-10">
                                            <input type="text" class="dob form-date" name="dob" 
                                                   value="<?php
                                                   if (!empty($profile->dob)) :
                                                       echo date("m/d/Y", $profile->dob);
                                                   endif;
                                                   ?>" placeholder=" Month/Date/Year">                        
                                            <script>
                                                $(function () {
                                                    // Date Picker                               
                                                    $(".dob").datepicker();
                                                }); /* END jQuery */
                                            </script>
                                            <span class="help-block">สามารถกรอกวันเกิด ในรูปแบบ เดือน/วัน/ปี (ค.ศ.) เช่น 11/25/1960 หมายถึง 25 November 1960 </span>                        
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="title_th" class="col-md-2 col-lg-2 control-label">คำนำหน้าชื่อ (Thai)</label>
                                        <div class="col-md-10 col-lg-10">
                                            <input type="text" class="form-control" name="title_th" id="title_th" value="<?php echo $profile->title_th; ?>" placeholder="เช่น ดร., ผศ.ดร., ศ.ดร., นพ., ร.ต., นาย เป็นต้น">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="firstname_th" class="col-md-2 col-lg-2 control-label">ชื่อ (Thai)</label>
                                        <div class="col-md-10 col-lg-10">
                                            <input type="text" class="form-control" name="firstname_th" id="firstname_th" value="<?php echo $profile->firstname_th; ?>" placeholder="ชื่อ">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lastname_th" class="col-md-2 col-lg-2 control-label">สกุล (Thai)</label>
                                        <div class="col-md-10 col-lg-10">
                                            <input type="text" class="form-control" name="lastname_th" id="lastname_th" value="<?php echo $profile->lastname_th; ?>" placeholder="นามสกุล">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="title_en" class="col-md-2 col-lg-2 control-label">Title (English)</label>
                                        <div class="col-md-10 col-lg-10">
                                            <input type="text" class="form-control" name="title_en" id="title_en" value="<?php echo $profile->title_en; ?>" placeholder="Dr., Prof.Dr., Mr., Ms. etc.">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="firstname_en" class="col-md-2 col-lg-2 control-label">First name<span style="color: red;">**</span></label>
                                        <div class="col-md-10 col-lg-10">
                                            <input type="text" class="form-control" name="firstname_en" id="firstname_en" required value="<?php echo $profile->firstname_en; ?>" placeholder="first name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lastname_en" class="col-md-2 col-lg-2 control-label">Last name<span style="color: red;">**</span></label>
                                        <div class="col-md-10 col-lg-10">
                                            <input type="text" class="form-control" name="lastname_en" id="lastname_en" required value="<?php echo $profile->lastname_en; ?>" placeholder="last name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 col-lg-2 control-label">เพศ (gender)</label>
                                        <div class="col-md-10 col-lg-10">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" id="male" value="male"<?php
                                                    if ($profile->gender == 'male') {
                                                        echo ' checked';
                                                    }
                                                    ?>>
                                                    ชาย (male)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" id="female" value="female"<?php
                                                    if ($profile->gender == 'female') {
                                                        echo ' checked';
                                                    }
                                                    ?>>
                                                    หญิง (female)
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <p>แก้ไขข้อมูลครั้งล่าสุดเมื่อ <?php
                                        if (!empty($profile->updated)) {
                                            echo date("M j, Y. H:i:s", $profile->updated);
                                        }
                                        ?>
                                    </p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Confirm edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- END Modal -->

            </div> <!-- /.row -->
        <?php endforeach; ?>  

    <?php endif; ?>



</div> <!-- /.container -->

<p>&nbsp;</p>
