<div class="container">
    <div class="row well">

        <h2 style="text-align: center;">Researcher List</h2>
        <h4 style="text-align: center;">(รายชื่อนักวิจัย)</h4>

        <?php if (!$query) : redirect('admin/index'); ?>

        <?php else: ?>

            <?php foreach ($query as $row) : ?>
        <p><a href="<?php echo site_url(); ?>/admin/profile/<?php echo $row->researcher_id; ?>"><?php echo $row->firstname_en . ' ' . $row->lastname_en; ?></a></p>
            <?php endforeach; ?>

        <?php endif; ?>
    </div>
</div>
