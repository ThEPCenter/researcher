
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
                        <div style="width: 60px; height: 80px;">
                            <img style="max-width: 60px" src="<?php echo $row->pic_url; ?>">
                        </div>                        
                        <?php echo '<strong>' . $row->firstname_en . ' ' . $row->lastname_en . '</strong>'; ?>
                    </a>
                    <br>
                    <a title="Education" href="<?php echo site_url(); ?>/admin/education/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-book"></span></a>
                    <a title="Employment" href="<?php echo site_url(); ?>/admin/employment/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-briefcase"></span></a>
                    <a title="Training" href="<?php echo site_url(); ?>/admin/training/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-fire"></span></a>
                    <a title="Expertise" href="<?php echo site_url(); ?>/admin/expertise/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-flash"></span></a>
                    <a title="Publication" href="<?php echo site_url(); ?>/admin/publication/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-globe"></span></a>
                    <p>&nbsp;</p>
                </div>

                <?php
                $i++;
            endforeach;
            ?>

        <?php endif; ?>       
        
    </div>
    
    <p>จำนวนนักวิจัยทั้งหมด <?php echo --$i; ?> คน</p>
</div>
