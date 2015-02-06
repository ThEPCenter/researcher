<div class="container">
    <div class="row well">       

        <?php if (!$query) : redirect('admin/index'); ?>

        <?php else: ?>

            <?php foreach ($query as $row) : ?>

                <h2 style="text-align: center;"><span class="glyphicon glyphicon-user"></span> <?php echo $row->firstname_en . ' ' . $row->lastname_en; ?>'s Profile</h2>
                <h4 style="text-align: center;">&nbsp;</h4>
                <?php if (!empty($row->pic_url)): ?>
                    <div class="col-md-2">&nbsp;</div>                
                    <div class="col-md-10">                    
                        <img title="Profile's picture" src="<?php echo $row->pic_url; ?>">                    
                    </div>
                <?php endif; ?>
                <div class="col-sm-2 col-md-2"><strong style="color: #89919c;">Name: </strong></div>
                <div class="col-sm-10 col-md-10" style="margin-top: 5px;">
                    <?php
                    if (!empty($row->title_en)) {
                        echo $row->title_en;
                    } echo $row->firstname_en . ' ' . $row->lastname_en;
                    ?>
                </div>
                <?php if (!empty($row->firstname_th)) : ?>
                    <div class="col-sm-2 col-md-2"><strong style="color: #89919c;">ชื่อ-นามสกุล</strong></div>
                    <div class="col-sm-10 col-md-10">
                        <?php
                        if ($row->title_th) {
                            echo $row->title_th;
                        } echo $row->firstname_th . ' ' . $row->lastname_th;
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($row->dob)): ?>
                    <div class="col-sm-2 col-md-2"><strong style="color: #89919c;">วันเกิด  (date of birth)</strong></div>
                    <div class="col-sm-10 col-md-10">
                        <?php echo date("M d, Y", $row->dob); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($age)): ?>
                    <div class="col-sm-2 col-md-2"><strong style="color: #89919c;">อายุ (age)</strong></div>
                    <div class="col-sm-10 col-md-10">
                        <?php echo $age; ?>
                    </div>
                <?php endif; ?>    


                <?php if (!empty($row->province_th)) : ?>
                    <div class="col-md-2"><strong style="color: #89919c;">ที่อยู่/ที่ติดต่อส่วนตัว</strong></div>
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

                <p>&nbsp;</p>

                <div class="row" id="user_properties" style="border: solid 1px blue; padding-left: 15px;">
                    <h4>User properties</h4>
                    <?php if ($q_user == FALSE): ?>
                        <p class="bg-warning" style="padding: 15px;">-- ไม่พบข้อมูล user ของนักวิจัยท่านนี้ --</p>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addUser"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add User</button>
                        <!-- addUser Modal -->
                        <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Add user of <?php echo $row->firstname_en . ' ' . $row->lastname_en; ?></h4>
                                    </div>
                                    <form method="post" action="<?php echo site_url(); ?>admin/add_user_process">
                                        <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" required name="username">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" class="form-control" required name="password">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Confirm Add User</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- END addUser  Modal -->
                        <p>&nbsp;</p>
                    <?php else: ?>
                        <?php foreach ($q_user as $user): ?>
                            <p><strong>Username: </strong>
                                <?php echo $user->username; ?>
                            </p>
                            <p><strong>Password: </strong> <span id="show_pw" style="display: none;">**********</span> 
                                &nbsp;<a id="view_pw" href="#">View password</a>
                            </p>
                            <script>
                                $(function () {
                                    $("#view_pw").click(function () {
                                        $("#show_pw").html('<span style="border: solid 1px black; padding: 8px 15px;"><?php echo $user->password; ?></span>');
                                        $("#show_pw").toggle();
                                    });
                                });
                            </script>

                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUser">Edit Username / Password</button>
                            <!-- editUser Modal -->
                            <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUserLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Edit User of <?php echo $row->firstname_en . ' ' . $row->lastname_en; ?></h4>
                                        </div>
                                        <form method="post" action="<?php echo site_url(); ?>admin/edit_user_process">
                                            <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                                            <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                                            <div class="modal-body">                                                
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" name="username" value="<?php echo $user->username; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="text" class="form-control" name="password" value="<?php echo $user->password; ?>" placeholder="Password">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- END Modal -->

                            <p>&nbsp;</p>


                        <?php endforeach; /* END User */ ?>
                    <?php endif; ?>
                </div> <!-- /.row -->

            <?php endforeach; ?>

            <p>&nbsp;</p>


            <form role="form" method="post" action="<?php echo site_url(); ?>admin/edit_profile">
                <input type="hidden" name="researcher_id" value="<?php echo $row->researcher_id; ?>">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Edit profile</button> &nbsp;

            </form>


            <p>&nbsp;</p>
            <a title="Education" href="<?php echo site_url(); ?>admin/education/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-book"></span></a>
            <a title="Employment" href="<?php echo site_url(); ?>admin/employment/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-briefcase"></span></a>
            <a title="Training" href="<?php echo site_url(); ?>admin/training/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-fire"></span></a>
            <a title="Expertise" href="<?php echo site_url(); ?>admin/expertise/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-flash"></span></a>
            <a title="Publication" href="<?php echo site_url(); ?>admin/publication/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-globe"></span></a>
            <p>&nbsp;</p>

        <?php endif; ?>



    </div>



</div> <!-- /.container -->

