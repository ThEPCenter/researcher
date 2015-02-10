
<?php include 'province.php'; ?>
<div class="container" id="employment">
    <h3>ข้อมูลการทำงาน (employment)</h3>
    <?php if (empty($q_employment)): ?>
        <p class="bg-warning" style="padding: 15px;">ขออภัย ไม่พบข้อมูลการทำงาน</p>
        <button title="Add Basic Profile" type="button" class="btn btn-default" data-toggle="modal" data-target="#addEmp"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มข้อมูลการทำงาน</button>
        <!-- #addEmp Modal -->
        <div class="modal fade" id="addEmp" tabindex="-1" role="dialog" aria-labelledby="addEmp" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">เพิ่มข้อมูลการทำงาน</h4>
                    </div>
                    <form class="form-horizontal" role="form" method="post" action="profile/add_employment_process">
                        <div class="modal-body">
                            <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                            <div class="form-group">
                                <label for="academic" class="col-sm-2 col-md-2 col-lg-2 control-label">Academic position</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="academic" id="academic" placeholder="Lecturer, Asst.Prof., Assoc.Prof., Prof., ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="administrative" class="col-sm-2 col-md-2 col-lg-2 control-label">Administrative position</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="administrative" id="administrative">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="research" class="col-sm-2 col-md-2 col-lg-2 control-label">Research position</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="research" id="research">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="institute" class="col-sm-2 col-md-2 col-lg-2 control-label">Affiliated University / Institute<span style="color: red;">**</span></label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="institute" id="institute" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="faculty" class="col-sm-2 col-md-2 col-lg-2 control-label">Faculty / College / Center</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="faculty" id="faculty">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="department" class="col-sm-2 col-md-2 col-lg-2 control-label">Department / School / Division</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="department" id="department">
                                </div>
                            </div>

                            <h3>ที่ติดต่อที่ทำงาน</h3>
                            <div class="form-group">
                                <label for="street_th" class="col-sm-2 col-md-2 col-lg-2 control-label">ที่อยู่ที่ทำงาน (Thai)</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="street_th" id="street_th" placeholder="เลขที่, อาคาร, ตรอก, ซอย, ถนน, ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sub_district_th" class="col-sm-2 col-md-2 col-lg-2 control-label">แขวง / ตำบล (Thai)</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="sub_district_th" id="sub_district_th">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="district_th" class="col-sm-2 col-md-2 col-lg-2 control-label">เขต / อำเภอ (Thai)</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="district_th" id="district_th">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="province_th" class="col-sm-2 col-md-2 col-lg-2 control-label">จังหวัด (Thai)</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">

                                    <select class="form-control" name="province_th">
                                        <?php echo $province; ?>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="street_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Office address (English)</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="street_en" id="street_en" placeholder="Room No., Building / House No., Lane / Alley, Street / Road, ...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sub_district_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Sub-area / Sub-district (English)</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="sub_district_en" id="sub_district_en">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="district_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Area / District (English)</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="district_en" id="district_en">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="province_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Province (English)</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <select class="form-control" name="province_en" id="province_en">
                                        <option value="">---- Select Province ----</option>
                                        <?php foreach ($province_en as $value): ?>                                    
                                            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="postal_code" class="col-sm-2 col-md-2 col-lg-2 control-label">รหัสไปรษณีย์ (Postal code)</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="postal_code" id="postal_code">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-2 col-md-2 col-lg-2 control-label">โทรศัพท์ (Telephone)</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mobile_phone" class="col-sm-2 col-md-2 col-lg-2 control-label">โทรศัพท์มือถือ (Mobile phone)</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="mobile_phone" id="mobile_phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 col-md-2 col-lg-2 control-label">Email</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="email" class="form-control" name="email" id="email" multiple>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="website" class="col-sm-2 col-md-2 col-lg-2 control-label">Website</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="website" id="website">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="thep_lab_code" class="col-sm-2 col-md-2 col-lg-2 control-label">ThEP Lab Code</label>
                                <div class="col-sm-10 col-md-10 col-lg-10">
                                    <input type="text" class="form-control" name="thep_lab_code" id="thep_lab_code">
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

        <?php foreach ($q_employment as $em) : ?>
            <p><strong>Academic position:</strong> <?php echo $em->academic; ?></p>
            <p><strong>Administrative position:</strong> <?php echo $em->administrative; ?></p>
            <p><strong>Research position:</strong> <?php echo $em->research; ?></p>
            <p><strong>Affiliated University / Institute:</strong> <?php echo $em->institute; ?></p>
            <p><strong>Faculty / College / Center:</strong> <?php echo $em->faculty; ?></p>
            <p><strong>Department / School / Division:</strong> <?php echo $em->department; ?></p>
            <p><strong>ที่ติดต่อที่ทำงาน:</strong>
                <?php
                if (!empty($em->street_th)):
                    echo $em->street_th . ' ';
                endif;
                if (!empty($em->sub_district_th)):
                    if ($em->province_th == 'กรุงเทพมหานคร'):
                        echo 'แขวง';
                    else:
                        echo 'ตำบล';
                    endif;
                    echo $em->sub_district_th . ' ';
                endif;
                if (!empty($em->district_th)):
                    if ($em->province_th == 'กรุงเทพมหานคร'):
                        echo 'เขต';
                    else:
                        echo 'อำเภอ';
                    endif;
                    echo $em->district_th . ' ';
                endif;
                if (!empty($em->province_th)):
                    if ($em->province_th != 'กรุงเทพมหานคร'):
                        echo 'จังหวัด';
                    endif;
                    echo $em->province_th . ' ';
                endif;
                echo $em->postal_code;
                ?>
            </p>
            <!-- Office address (English) -->
            <p><strong>Office address:</strong>
                <?php
                if (!empty($em->street_en)):
                    echo $em->street_en . ', ';
                endif;
                if (!empty($em->sub_district_en)):
                    echo $em->sub_district_en . ', ';
                endif;
                if (!empty($em->district_en)):
                    echo $em->district_en . ', ';
                endif;
                if (!empty($em->province_en)):
                    echo $em->province_en . ', ';
                endif;
                if (!empty($em->postal_code)):
                    echo $em->postal_code;
                endif;
                ?>
            </p> <!-- END Office address (English) -->
            <p><strong>โทรศัพท์ (telephone): </strong> 
                <?php
                if (!empty($em->phone)) {
                    echo $em->phone;
                }
                ?>
            </p>
            <?php if (!empty($em->mobile_phone)): ?>
                <p><strong>โทรศัพท์มือถือ (mobile phone): </strong><?php echo $em->mobile_phone; ?></p>
            <?php endif; ?>
            <p><strong>Email: </strong> 
                <?php
                if (!empty($em->email)) {
                    echo $em->email;
                }
                ?>
            </p>
            <p><strong>Website: </strong>
                <?php if (!empty($em->website)) : ?>
                    <a target="_blank" href="<?php echo $em->website; ?>"><?php echo $em->website; ?></a>
                <?php endif; ?>
            </p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editEmp">Edit Employment</button>
            <!-- #editEmp Modal -->
            <div class="modal fade" id="editEmp" tabindex="-1" role="dialog" aria-labelledby="editEmp" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Employment</h4>
                        </div>
                        <form class="form-horizontal" role="form" method="post" action="profile/edit_employment_process">
                            <div class="modal-body">
                                <input type="hidden" name="employment_id" value="<?php echo $em->employment_id; ?>">
                                <input type="hidden" name="researcher_id" value="<?php echo $em->researcher_id; ?>">
                                <div class="form-group">
                                    <label for="academic" class="col-sm-2 col-md-2 col-lg-2 control-label">Academic position</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="academic" id="academic" value="<?php echo $em->academic; ?>" placeholder="Lecturer, Asst.Prof., Assoc.Prof., Prof., ...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="administrative" class="col-sm-2 col-md-2 col-lg-2 control-label">Administrative position</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="administrative" id="administrative" value="<?php echo $em->administrative; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="research" class="col-sm-2 col-md-2 col-lg-2 control-label">Research position</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="research" id="research" value="<?php echo $em->research; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="institute" class="col-sm-2 col-md-2 col-lg-2 control-label">Affiliated University / Institute<span style="color: red;">**</span></label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="institute" id="institute" required value="<?php echo $em->institute; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="faculty" class="col-sm-2 col-md-2 col-lg-2 control-label">Faculty / College / Center</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="faculty" id="faculty" value="<?php echo $em->faculty; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="department" class="col-sm-2 col-md-2 col-lg-2 control-label">Department / School / Division</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="department" id="department" value="<?php echo $em->department; ?>">
                                    </div>
                                </div>

                                <h3>ที่ติดต่อที่ทำงาน</h3>
                                <div class="form-group">
                                    <label for="street_th" class="col-sm-2 col-md-2 col-lg-2 control-label">ที่อยู่ที่ทำงาน (Thai)</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="street_th" id="street_th" value="<?php echo $em->street_th; ?>" placeholder="เลขที่, อาคาร, ตรอก, ซอย, ถนน, ...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sub_district_th" class="col-sm-2 col-md-2 col-lg-2 control-label">แขวง / ตำบล (Thai)</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="sub_district_th" id="sub_district_th" value="<?php echo $em->sub_district_th; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="district_th" class="col-sm-2 col-md-2 col-lg-2 control-label">เขต / อำเภอ (Thai)</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="district_th" id="district_th" value="<?php echo $em->district_th; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="province_th" class="col-sm-2 col-md-2 col-lg-2 control-label">จังหวัด (Thai)</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <?php
                                        echo pro_list_th($em->province_th);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="street_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Office address (English)</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="street_en" id="street_en" value="<?php echo $em->street_en; ?>" placeholder="Room No., Building / House No., Lane / Alley, Street / Road, ...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sub_district_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Sub-area / Sub-district (English)</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="sub_district_en" id="sub_district_en" value="<?php echo $em->sub_district_en; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="district_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Area / District (English)</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="district_en" id="district_en" value="<?php echo $em->district_en; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="province_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Province (English)</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <?php
                                        if ($em->province_en == 'Bangkok') {
                                            $pro_en = $em->province_en; // "Krung Thep Mahanakhon";
                                        } else {
                                            $pro_en = $em->province_en;
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
                                        <input type="text" class="form-control" name="postal_code" id="postal_code" value="<?php echo $em->postal_code; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-2 col-md-2 col-lg-2 control-label">โทรศัพท์ (Telephone)</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $em->phone; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile_phone" class="col-sm-2 col-md-2 col-lg-2 control-label">โทรศัพท์มือถือ (Mobile phone)</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="mobile_phone" id="mobile_phone" value="<?php echo $em->mobile_phone; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 col-md-2 col-lg-2 control-label">Email</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="email" class="form-control" name="email" id="email" multiple value="<?php echo $em->email; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="website" class="col-sm-2 col-md-2 col-lg-2 control-label">Website</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="website" id="website" value="<?php echo $em->website; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="thep_lab_code" class="col-sm-2 col-md-2 col-lg-2 control-label">ThEP Lab Code</label>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <input type="text" class="form-control" name="thep_lab_code" id="thep_lab_code" value="<?php echo $em->thep_lab_code; ?>">
                                    </div>
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
        <?php endforeach; ?>
    <?php endif; ?>
</div> <!-- /.container -->
<p>&nbsp;</p>
