
<div class="container">
    <div class="row well">

        <h2 style="text-align: center;"><span class="glyphicon glyphicon-list"></span> Researcher List</h2>
        <h4 style="text-align: center;">(รายชื่อนักวิจัย)</h4>

        <?php if (!$query) : redirect('admin/index'); ?>

        <?php else: ?>            
            <?php
            $i = 1;
            foreach ($query as $row) :
                ?>
                <p><?php echo $i . '. ' . $row->firstname_en . ' ' . $row->lastname_en; ?> &nbsp;
                    <a href="<?php echo site_url(); ?>/admin/profile/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-user"></span> Profile</a> | 
                    <a href="<?php echo site_url(); ?>/admin/education/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-book"></span> Education</a> | 
                    <a href="<?php echo site_url(); ?>/admin/employment/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-briefcase"></span> Employment</a> | 
                    <a href="<?php echo site_url(); ?>/admin/research_training/<?php echo $row->researcher_id; ?>"><span class="glyphicon glyphicon-fire"></span> Research training</a> | 
                </p>
                <?php
                $i++;
            endforeach;
            ?>

        <?php endif; ?>
    </div>
</div>
