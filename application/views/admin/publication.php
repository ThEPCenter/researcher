
<div class="container">
    <div class="row well">

        <?php foreach ($profile as $pro) : ?>
            <h2 style="text-align: center;"><span class="glyphicon glyphicon-globe"></span> <?php echo $pro->firstname_en . ' ' . $pro->lastname_en; ?>'s <?php echo $title; ?></h2>
            <p>&nbsp;</p>
        <?php endforeach; ?>

        <?php if (!$query) : ?>
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6 alert alert-warning text-center"><strong style="color: red;">ขออภัย ไม่พบข้อมูล <?php echo $title; ?></strong></div>
                <div class="col-md-3">&nbsp;</div>
            </div>
            <form method="post" action="<?php echo site_url(); ?>/admin/add_publication">
                <div style="text-align: center;">
                    <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                    <button class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> เพิ่มข้อมูล <?php echo $title; ?></button>
                </div>
            </form>

        <?php else: ?>

            <?php foreach ($query as $row) : ?>

                <h4>Publication</h4>
                <p>(in the last 10 years in order of most recent work)</p>
                <div><?php echo htmlspecialchars_decode($row->content); ?></div>

                <form role="form" method="post" action="<?php echo site_url(); ?>/admin/edit_publication">
                    <input type="hidden" name="publication_id" value="<?php echo $row->publication_id; ?>">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                </form>

            <?php endforeach; ?>

        <?php endif; ?>


    </div>

</div> <!-- /.container -->
