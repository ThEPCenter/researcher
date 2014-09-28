
<div class="container">
    <div class="row well">

        <h2 style="text-align: center;">Researcher List</h2>
        <h4 style="text-align: center;">(รายชื่อนักวิจัย)</h4>

        <?php if (!$query) : redirect('admin/index'); ?>

        <?php else: ?>            
            <?php
            $i = 1;
            foreach ($query as $row) :
                ?>
                <p><?php echo $i . '. ' . $row->firstname_en . ' ' . $row->lastname_en; ?> 
                    <a href="<?php echo site_url(); ?>/admin/profile/<?php echo $row->researcher_id; ?>">Profile</a> 
                    <a href="<?php echo site_url(); ?>/admin/education/<?php echo $row->researcher_id; ?>">Education</a>
                </p>
                <?php
                $i++;
            endforeach;
            ?>

        <?php endif; ?>
    </div>
</div>
