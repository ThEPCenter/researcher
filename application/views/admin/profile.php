<div class="container">
    <div class="row well">       

        <?php if (!$query) : redirect('admin/index'); ?>

        <?php else: ?>

            <?php foreach ($query as $row) : ?>

                <h2 style="text-align: center;"><span class="glyphicon glyphicon-user"></span> <?php echo $row->firstname_en . ' ' . $row->lastname_en; ?>'s Profile</h2>
                <h4 style="text-align: center;">(ข้อมูลประวัติส่วนตัว)</h4>
                <?php if (!empty($row->pic_url)): ?>
                <div class="col-md-2">&nbsp;</div>                
                <div class="col-md-10">                    
                    <img title="Profile's picture" src="<?php echo $row->pic_url; ?>">                    
                </div>
                <?php endif; ?>
                <div class="col-md-2"><strong style="color: #89919c;">Name: </strong></div>
                <div class="col-md-10">
                    <?php
                    if (!empty($row->title_en)) {
                        echo $row->title_en;
                    } echo $row->firstname_en . ' ' . $row->lastname_en;
                    ?>
                </div>
                <?php if (!empty($row->firstname_th)) : ?>
                    <div class="col-md-2"><strong style="color: #89919c;">ชื่อ-นามสกุล</strong></div>
                    <div class="col-md-10">
                        <?php
                        if ($row->title_th) {
                            echo $row->title_th;
                        } echo $row->firstname_th . ' ' . $row->lastname_th;
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($row->province_th)) : ?>
                    <div class="col-md-2"><strong style="color: #89919c;">ที่อยู่ที่ติดต่อได้</strong></div>
                    <?php
                    if ($row->province_th == "กรุงเทพมหานคร") {
                        $sub_didt_th = $row->sub_district_th;
                        $dist_th = $row->district_th;
                        $prov_th = $row->province_th;
                    } else {
                        $sub_didt_th = 'ต.' . $row->sub_district_th;
                        $dist_th = 'อ.' . $row->district_th;
                        $prov_th = 'จ.' . $row->province_th;
                    }

                    if ($row->district_th == 'พัทยา') {
                        $dist_th = $row->district_th;
                    }
                    ?>
                    <div class="col-md-10">
                        <?php
                        echo $row->street_th . ' ' . $sub_didt_th . ' ' . $dist_th . ' ' . $prov_th . ' ' . $row->postal_code;
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($row->phone)) : ?>
                    <div class="col-md-2"><strong style="color: #89919c;">โทรศัพท์</strong></div>
                    <div class="col-md-10"><?php echo $row->phone; ?></div>
                <?php endif; ?>

                <?php if (!empty($row->mobile_phone)) : ?>
                    <div class="col-md-2"><strong style="color: #89919c;">โทรศัพท์มือถือ</strong></div>
                    <div class="col-md-10"><?php echo $row->mobile_phone; ?></div>
                <?php endif; ?>

                <?php if (!empty($row->emaile)) : ?>
                    <div class="col-md-2"><strong style="color: #89919c;">Email</strong></div>
                    <div class="col-md-10"><?php echo $row->email; ?></div>
                <?php endif; ?>

                <?php if (!empty($row->website)) : ?>
                    <div class="col-md-2">
                        <strong style="color: #89919c;">Website</strong>
                    </div>
                    <div class="col-md-10">
                        <?php echo $row->website; ?>
                    </div>
                <?php endif; ?>                    

            <?php endforeach; ?>

            <p>&nbsp;</p>
            <form role="form" method="post" action="<?php echo site_url(); ?>/admin/edit_profile">
                <input type="hidden" name="researcher_id" value="<?php echo $row->researcher_id; ?>">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Edit profile</button>
            </form>



        <?php endif; ?>



    </div>



</div> <!-- /.container -->

