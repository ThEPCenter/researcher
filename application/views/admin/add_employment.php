<div class="container">
    <div class="row well">

        <h2 style="text-align: center;">Add Employment Position <span class="glyphicon glyphicon-briefcase"></span></h2>
        <p>&nbsp;</p>

        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>/admin/add_employment_process">
            <fieldset>

                <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">

                <div class="form-group">
                    <label for="academic" class="col-lg-2 control-label">Academic position</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="academic" id="academic" placeholder="Lecturer, Asst.Prof., Assoc.Prof., Prof., ...">
                    </div>
                </div>

                <div class="form-group">
                    <label for="administrative" class="col-lg-2 control-label">Administrative position</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="administrative" id="administrative">
                    </div>
                </div>

                <div class="form-group">
                    <label for="research" class="col-lg-2 control-label">Research position</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="research" id="research">
                    </div>
                </div>

                <div class="form-group">
                    <label for="institute" class="col-lg-2 control-label">Affiliated University/Institute<span style="color: red;">**</span></label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="institute" id="institute" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="faculty" class="col-lg-2 control-label">Faculty/College/ Center</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="faculty" id="faculty">
                    </div>
                </div>

                <div class="form-group">
                    <label for="department" class="col-lg-2 control-label">Department/School/ Division</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="department" id="department">
                    </div>
                </div>

                <div class="form-group">
                    <label for="street_en" class="col-lg-2 control-label">Office's address</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="street_en" id="street_en">
                    </div>
                </div>

                <div class="form-group">
                    <label for="sub_district_en" class="col-lg-2 control-label">แขวง/ตำบล</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="sub_district_en" id="sub_district_en">
                    </div>
                </div>

                <div class="form-group">
                    <label for="district_en" class="col-lg-2 control-label">เขต/อำเภอ</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="district_en" id="district_en">
                    </div>
                </div>

                <div class="form-group">
                    <label for="province_en" class="col-lg-2 control-label">Province</label>
                    <div class="col-lg-10">
                        <?php
                        include 'province.php';
                        ?>
                        <select class="form-control" name="province_en" id="province_en">
                            <option value="">---- Select Province ----</option>
                            <?php foreach ($province_en as $value): ?>                                    
                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                            <?php endforeach; ?>
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
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" name="email" id="email" multiple>
                    </div>
                </div>

                <div class="form-group">
                    <label for="website" class="col-lg-2 control-label">Website</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="website" id="website">
                    </div>
                </div>

                <div class="form-group">
                    <label for="thep_lab_code" class="col-lg-2 control-label">ThEP Lab Code</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="thep_lab_code" id="thep_lab_code">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-default">Submit</button> &nbsp;
                        <a href="<?php echo site_url() . "/admin/employment/" . $researcher_id; ?>">Cancel</a>
                    </div>
                </div>
            </fieldset>
        </form>

        <script>
            $(function () {
                $("#academic").focus();
            });
        </script>



    </div>

</div> <!-- /.container -->
