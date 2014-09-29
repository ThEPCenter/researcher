<div class="container">
    <div class="row well">

        <?php foreach ($profile as $pro) : ?>
            <h2 style="text-align: center;"><span class="glyphicon glyphicon-briefcase"></span> <?php echo $pro->firstname_en . ' ' . $pro->lastname_en; ?>'s Employment Position</h2>
            <p>&nbsp;</p>
        <?php endforeach; ?>

        <?php if (!$query) : ?>
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6 alert alert-warning text-center"><strong style="color: red;">ขออภัย ไม่พบข้อมูล employment position</strong></div>
                <div class="col-md-3">&nbsp;</div>
            </div>
            <form method="post" action="<?php echo site_url(); ?>/admin/add_employment">
                <div style="text-align: center;">
                    <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                    <button class="btn btn-default">กรอกข้อมูล Employment Position</button>
                </div>
            </form>

        <?php else: ?>

            <?php foreach ($query as $row) : ?>

                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">Academic position</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo ucfirst($row->academic); ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">Administrative position</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo ucfirst($row->administrative); ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">Research position</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo ucfirst($row->research); ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">Affiliated University/Institute</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo $row->institute; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">Faculty/College/Center</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo $row->faculty; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">Department/School/Division</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo $row->department; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">ที่ติดต่อที่ทำงาน (Office's address)</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo $row->street_en; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">แขวง/ตำบล</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo $row->sub_district_en; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">เขต/อำเภอ</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo $row->district_en; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">จังหวัด</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo $row->province_en; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">รหัสไปรษณีย์</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo $row->postal_code; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">โทรศัพท์</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo $row->phone; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">โทรศัพท์มือถือ</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo $row->mobile_phone; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">Email</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo $row->email; ?></div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">Website</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo $row->website; ?></div>
                </div>

            <?php endforeach; ?>

            <p>&nbsp;</p>

            <form role="form" method="post" action="<?php echo site_url(); ?>/admin/edit_employment">
                <input type="hidden" name="employment_id" value="<?php echo $row->employment_id; ?>">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Edit</button>
            </form>



        <?php endif; ?>


    </div>

</div> <!-- /.container -->

