<div class="container">
    <div class="row well">
        <?php foreach ($query as $row) : ?>
            <h2 style="text-align: center;">Edit Profile : <?php echo $row->firstname_en . ' ' . $row->lastname_en; ?></h2>
            <p>&nbsp;</p>       

            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>/admin/edit_profile_process">

                <input type="hidden" name="researcher_id" value="<?php echo $row->researcher_id; ?>">

                <div class="form-group">
                    <label class="col-md-2 col-lg-2 control-label">Profile picture</label>
                    <div class="col-md-10 col-lg-10">
                        <div id="show-pic">
                            <img src="<?php echo $row->pic_url; ?>">
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
                        <input type="text" class="form-control" name="pic_url" id="pic_url" value="<?php echo $row->pic_url; ?>" placeholder="เช่น http://www.example.com/pic.jpg">
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-2 col-lg-2 control-label">Date of birth</label>
                    <div class="col-md-10 col-lg-10">
                        <input type="text" class="dob form-date" name="dob" 
                               value="<?php
                               if (!empty($row->dob)) :
                                   echo date("m/d/Y", $row->dob);
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
                        <input type="text" class="form-control" name="title_th" id="title_th" value="<?php echo $row->title_th; ?>" placeholder="เช่น ดร., ผศ.ดร., ศ.ดร., นพ., ร.ต., นาย เป็นต้น">
                    </div>
                </div>

                <div class="form-group">
                    <label for="firstname_th" class="col-md-2 col-lg-2 control-label">ชื่อ (Thai)</label>
                    <div class="col-md-10 col-lg-10">
                        <input type="text" class="form-control" name="firstname_th" id="firstname_th" value="<?php echo $row->firstname_th; ?>" placeholder="ชื่อ">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname_th" class="col-md-2 col-lg-2 control-label">สกุล (Thai)</label>
                    <div class="col-md-10 col-lg-10">
                        <input type="text" class="form-control" name="lastname_th" id="lastname_th" value="<?php echo $row->lastname_th; ?>" placeholder="นามสกุล">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title_en" class="col-md-2 col-lg-2 control-label">Title (English)</label>
                    <div class="col-md-10 col-lg-10">
                        <input type="text" class="form-control" name="title_en" id="title_en" value="<?php echo $row->title_en; ?>" placeholder="Dr., Prof.Dr., Mr., Ms. etc.">
                    </div>
                </div>

                <div class="form-group">
                    <label for="firstname_en" class="col-md-2 col-lg-2 control-label">First name<span style="color: red;">**</span></label>
                    <div class="col-md-10 col-lg-10">
                        <input type="text" class="form-control" name="firstname_en" id="firstname_en" required value="<?php echo $row->firstname_en; ?>" placeholder="first name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname_en" class="col-md-2 col-lg-2 control-label">Last name<span style="color: red;">**</span></label>
                    <div class="col-md-10 col-lg-10">
                        <input type="text" class="form-control" name="lastname_en" id="lastname_en" required value="<?php echo $row->lastname_en; ?>" placeholder="last name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 col-lg-2 control-label">เพศ (gender)</label>
                    <div class="col-md-10 col-lg-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" id="male" value="male"<?php
                                if ($row->gender == 'male') {
                                    echo ' checked';
                                }
                                ?>>
                                ชาย (male)
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" id="female" value="female"<?php
                                if ($row->gender == 'female') {
                                    echo ' checked';
                                }
                                ?>>
                                หญิง (female)
                            </label>
                        </div>
                    </div>
                </div>
                <p>&nbsp;</p>

                <div class="form-group">
                    <div class="col-md-10 col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span> Submit</button> &nbsp;
                        <a href="<?php echo site_url() . '/admin/profile/' . $row->researcher_id; ?>"><strong>Cancel</strong></a>
                    </div>
                </div>

                <p>แก้ไขข้อมูลครั้งล่าสุดเมื่อ <?php
                    if (!empty($row->updated)) {
                        echo date("M j, Y. H:i:s", $row->updated);
                    }
                    ?></p>

                <fieldset>
                    <legend class="text-center">ที่อยู่/ที่ติดต่อส่วนตัว (ไม่จำเป็นต้องกรอก)</legend>
                    <div class="form-group">
                        <label for="street_th" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="street_th" id="street_th" value="<?php echo $row->street_th; ?>" placeholder="เลขที่ อาคาร ซอย ถนน">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sub_district_th" class="col-md-2 col-lg-2 control-label">แขวง/ตำบล</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="sub_district_th" id="sub_district_th" value="<?php echo $row->sub_district_th; ?>" placeholder="แขวง/ตำบล">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="district_th" class="col-md-2 col-lg-2 control-label">เขต/อำเภอ</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="district_th" id="district_th" value="<?php echo $row->district_th; ?>" placeholder="เขต/อำเภอ">
                        </div>
                    </div>

                            <?php include 'province.php'; ?>
                    <div class="form-group">
                        <label for="province_th" class="col-md-2 col-lg-2 control-label">จังหวัด</label>
                        <div class="col-md-10 col-lg-10">
                            <?php echo pro_list_th($row->province_th); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="postal_code" class="col-md-2 col-lg-2 control-label">รหัสไปรษณีย์</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="postal_code" id="postal_code" value="<?php echo $row->postal_code; ?>" placeholder="รหัสไปรษณีย์">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-md-2 col-lg-2 control-label">โทรศัพท์</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $row->phone; ?>" placeholder="โทรศัพท์">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile_phone" class="col-md-2 col-lg-2 control-label">โทรศัพท์มือถือ</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="mobile_phone" id="mobile_phone" value="<?php echo $row->mobile_phone; ?>" placeholder="โทรศัพท์มือถือ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-2 col-lg-2 control-label">Email</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="email" class="form-control" name="email" id="email" multiple value="<?php echo $row->email; ?>" placeholder="email1@example.com, email2@example">
                            <span class="help-block">สามารถกรอก email ได้หลาย email โดยใช้เครื่องหมาย comma (,) คั่น เช่น email1@example.com, email2@example เป็นต้น</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="website" class="col-md-2 col-lg-2 control-label">Website</label>
                        <div class="col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="website" id="website" value="<?php echo $row->website; ?>" placeholder="http://www.example.com">
                        </div>
                    </div>
                </fieldset>

            </form>

<?php endforeach; ?>

        <script>
            $(function () {
                $("#title_th").focus();
            });
        </script>

    </div>

</div> <!-- /.container -->

