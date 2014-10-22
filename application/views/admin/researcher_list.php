
<div class="container">
    <div class="row well">

        <h2 style="text-align: center;"><span class="glyphicon glyphicon-list"></span> Researcher List</h2>
        <h4 style="text-align: center;">&nbsp;</h4>

        <?php if (!$query_list) : redirect('admin/index'); ?>

        <?php else: ?>            
            <?php
            $i = 1;
            foreach ($query_list as $row) :
                ?>
                <div class="col-xs-6 col-sm-4 col-md-3">

                    <a href="<?php echo site_url(); ?>/admin/profile/<?php echo $row->researcher_id; ?>">
                        <div style="max-width: 60px; height: 80px;">
                            <img alt="profile's picture" style="max-width: 60px;" src="<?php echo $row->pic_url; ?>">
                        </div>                        
                        <div style="margin-top: 5px;"><?php echo $row->firstname_en . ' ' . $row->lastname_en; ?></div>
                    </a>
                </div>

                <?php
                $i++;
            endforeach;
            ?>

        <?php endif; ?>       

    </div>

    <p>จำนวนนักวิจัยทั้งหมด <?php echo --$i; ?> คน</p>
</div>
