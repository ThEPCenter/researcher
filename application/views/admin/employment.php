<div class="container">
    <div class="row well">


        <h2 style="text-align: center;"><span class="glyphicon glyphicon-briefcase"></span> <?php echo $title; ?></h2>
        <p>&nbsp;</p>


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

                <h4>ที่ติดต่อที่ทำงาน</h4>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">ที่อยู่ที่ทำงาน (Thai)</strong></div>
                    <div class="col-sm-9 col-md-9">
                        <?php echo $row->street_th; ?>
                        <?php echo $row->sub_district_th; ?>
                        <?php echo $row->district_th; ?>
                        <?php echo $row->province_th; ?>
                        <?php echo $row->postal_code; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">Office's address (English)</strong></div>
                    <div class="col-sm-9 col-md-9">
                        <?php echo $row->street_en; ?>
                        <?php echo $row->sub_district_en; ?>
                        <?php echo $row->district_en; ?>
                        <?php echo $row->province_en; ?>
                        <?php echo $row->postal_code; ?>
                    </div>
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
                <div class="row">
                    <div class="col-sm-3 col-md-3"><strong style="color: #89919c;">ThEP Lab code</strong></div>
                    <div class="col-sm-9 col-md-9"><?php echo $row->thep_lab_code; ?></div>
                </div>

            <?php endforeach; ?>

            <p>&nbsp;</p>

            <form role="form" method="post" action="<?php echo site_url(); ?>/admin/edit_employment">
                <input type="hidden" name="employment_id" value="<?php echo $row->employment_id; ?>">
                <input type="hidden" name="researcher_id" value="<?php echo $row->researcher_id; ?>">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Edit</button>
            </form>
        <?php endif; ?>
    </div>

    <a class="btn btn-default" href="<?php echo site_url(); ?>/admin/profile/<?php echo $researcher_id; ?>"><span class="glyphicon glyphicon-arrow-left"></span> Back to Profile</a>

</div> <!-- /.container -->

