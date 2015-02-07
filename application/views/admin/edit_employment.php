<div class="container">
    <div class="row well">

        <h2 style="text-align: center;"><?php echo $title; ?> <span class="glyphicon glyphicon-briefcase"></span></h2>

        <p>&nbsp;</p>

        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>admin/edit_employment_process">
            <fieldset>
                <legend> </legend>

                <?php foreach ($query as $row) : ?>

                    <input type="hidden" name="employment_id" value="<?php echo $row->employment_id; ?>">
                    <input type="hidden" name="researcher_id" value="<?php echo $row->researcher_id; ?>">

                    <div class="form-group">
                        <label for="academic" class="col-sm-2 col-md-2 col-lg-2 control-label">Academic position</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="academic" id="academic" value="<?php echo $row->academic; ?>" placeholder="Lecturer, Asst.Prof., Assoc.Prof., Prof., ...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="administrative" class="col-sm-2 col-md-2 col-lg-2 control-label">Administrative position</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="administrative" id="administrative" value="<?php echo $row->administrative; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="research" class="col-sm-2 col-md-2 col-lg-2 control-label">Research position</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="research" id="research" value="<?php echo $row->research; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="institute" class="col-sm-2 col-md-2 col-lg-2 control-label">Affiliated University/Institute<span style="color: red;">**</span></label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="institute" id="institute" required value="<?php echo $row->institute; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="faculty" class="col-sm-2 col-md-2 col-lg-2 control-label">Faculty/College/ Center</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="faculty" id="faculty" value="<?php echo $row->faculty; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="department" class="col-sm-2 col-md-2 col-lg-2 control-label">Department/School/ Division</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="department" id="department" value="<?php echo $row->department; ?>">
                        </div>
                    </div>

                    <h3>ที่ติดต่อที่ทำงาน</h3>

                    <div class="form-group">
                        <label for="street_th" class="col-sm-2 col-md-2 col-lg-2 control-label">ที่อยู่ที่ทำงาน (Thai)</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="street_th" id="street_th" value="<?php echo $row->street_th; ?>" placeholder="เลขที่, อาคาร, ตรอก, ซอย, ถนน, ...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sub_district_th" class="col-sm-2 col-md-2 col-lg-2 control-label">แขวง / ตำบล (Thai)</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="sub_district_th" id="sub_district_th" value="<?php echo $row->sub_district_th; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="district_th" class="col-sm-2 col-md-2 col-lg-2 control-label">เขต / อำเภอ (Thai)</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="district_th" id="district_th" value="<?php echo $row->district_th; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="province_th" class="col-sm-2 col-md-2 col-lg-2 control-label">จังหวัด (Thai)</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <?php
                            include 'province.php';
                            echo pro_list_th($row->province_th);
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="street_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Office's address (English)</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="street_en" id="street_en" value="<?php echo $row->street_en; ?>" placeholder="Room No., Building / House No., Lane / Alley, Street / Road, ...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sub_district_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Sub-area / Sub-district (English)</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="sub_district_en" id="sub_district_en" value="<?php echo $row->sub_district_en; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="district_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Area / District (English)</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="district_en" id="district_en" value="<?php echo $row->district_en; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="province_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Province (English)</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <?php
                            if ($row->province_en == 'Bangkok') {
                                $pro_en = $row->province_en; // "Krung Thep Mahanakhon";
                            } else {
                                $pro_en = $row->province_en;
                            }
                            ?>
                            <select class="form-control" name="province_en" id="province_en">
                                <option value="">---- Select Province ----</option>
                                <?php foreach ($province_en as $value): ?>                                    
                                    <option value="<?php echo $value; ?>"<?php echo pro_select($value, $pro_en); ?>><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="postal_code" class="col-sm-2 col-md-2 col-lg-2 control-label">รหัสไปรษณีย์ (Postal code)</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="postal_code" id="postal_code" value="<?php echo $row->postal_code; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-sm-2 col-md-2 col-lg-2 control-label">โทรศัพท์ (Phone)</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $row->phone; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile_phone" class="col-sm-2 col-md-2 col-lg-2 control-label">โทรศัพท์มือถือ (Mobile phone)</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="mobile_phone" id="mobile_phone" value="<?php echo $row->mobile_phone; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-2 col-md-2 col-lg-2 control-label">Email</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="email" class="form-control" name="email" id="email" multiple value="<?php echo $row->email; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="website" class="col-sm-2 col-md-2 col-lg-2 control-label">Website</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="website" id="website" value="<?php echo $row->website; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="thep_lab_code" class="col-sm-2 col-md-2 col-lg-2 control-label">ThEP Lab Code</label>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <input type="text" class="form-control" name="thep_lab_code" id="thep_lab_code" value="<?php echo $row->thep_lab_code; ?>">
                        </div>
                    </div>

                <?php endforeach; ?>                

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">                        
                        <a class="btn btn-default" href="<?php echo site_url() . "admin/employment/" . $row->researcher_id; ?>"><strong>Cancel</strong></a> &nbsp;
                        <button type="submit" class="btn btn-primary">Confirm Edit</button>
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
