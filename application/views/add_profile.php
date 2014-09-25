<div class="container">
    <div class="row well">

        <h2 style="text-align: center;">Add Profile <span class="glyphicon glyphicon-user"></span></h2>
        <h4 style="text-align: center;">&nbsp;</h4>

        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>index.php/profile/add_process">
            <fieldset>
                
                <div class="form-group">
                    <label for="title_th" class="col-lg-2 control-label">คำนำหน้าชื่อ</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="title_th" id="title_th" placeholder="เช่น ดร., ผศ.ดร., ศ.ดร., นพ., ร.ต., นาย เป็นต้น">
                    </div>
                </div>

                <div class="form-group">
                    <label for="firstname_th" class="col-lg-2 control-label">ชื่อ<span style="color: red;">**</span></label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="firstname_th" id="firstname_th" required placeholder="ชื่อ">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname_th" class="col-lg-2 control-label">นามสกุล<span style="color: red;">**</span></label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="lastname_th" id="lastname_th" required placeholder="นามสกุล">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title_en" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Dr., Prof.Dr., Mr., Ms. etc.">
                    </div>
                </div>

                <div class="form-group">
                    <label for="firstname_en" class="col-lg-2 control-label">Firstname<span style="color: red;">**</span></label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="firstname_en" id="firstname_en" required placeholder="Firstname">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname_en" class="col-lg-2 control-label">Lastname<span style="color: red;">**</span></label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="lastname_en" id="lastname_en" required placeholder="Lastname">
                    </div>
                </div>                

                <div class="form-group">
                    <label class="col-lg-2 control-label">Gender</label>
                    <div class="col-lg-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" id="male" value="male" checked>
                                Male
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" id="female" value="female">
                                Female
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="street_th" class="col-lg-2 control-label">ที่อยู่ที่ติดต่อได้</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="street_th" id="street_th" placeholder="เลขที่ อาคาร ซอย ถนน หมู่บ้าน">
                    </div>
                </div>

                <div class="form-group">
                    <label for="sub_district_th" class="col-lg-2 control-label">แขวง/ตำบล</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="sub_district_th" id="sub_district_th">
                    </div>
                </div>

                <div class="form-group">
                    <label for="district_th" class="col-lg-2 control-label">เขต/อำเภอ</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="district_th" id="district_th">
                    </div>
                </div>

                <div class="form-group">
                    <label for="province_th" class="col-lg-2 control-label">จังหวัด</label>
                    <div class="col-lg-10">
                        <?php include 'province.php'; ?> 
                        <select class="form-control" name="province_th" id="province_th">
                            <?php echo $province; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="postal_code" class="col-lg-2 control-label">รหัสไปรษณีย์</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="postal_code" id="postal_code">
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="col-lg-2 control-label">โทรศัพท์</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="phone" id="phone">
                    </div>
                </div>

                <div class="form-group">
                    <label for="mobile_phone" class="col-lg-2 control-label">โทรศัพท์มือถือ</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="mobile_phone" id="mobile_phone">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email<span style="color: red;">**</span></label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" name="email" id="email" multiple required placeholder="email1@example.com, email2@example.com">
                        <span class="help-block">Email กรอกหลายอันได้โดยใช้เคริ่องหมาย comma (,) คั่น เช่น email1@sample.com, email2@sample.com เป็นต้น</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="website" class="col-lg-2 control-label">Website</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="website" id="website" placeholder="http://www.example.com">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-default">Submit</button> &nbsp;<a href="index">Cancel</a>
                    </div>
                </div>
            </fieldset>
        </form>

        <script>
            $(function () {
                $("#title_th").focus();
            });
        </script>

    </div>

</div> <!-- /.container -->

