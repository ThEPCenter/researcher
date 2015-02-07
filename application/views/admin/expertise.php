
<div class="container">
    <div class="row well">
        <h2 style="text-align: center;"><span class="glyphicon glyphicon-flash"></span> <?php echo $title; ?></h2>
        <p>&nbsp;</p>

        <?php if (!$query) : ?>
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6 alert alert-warning text-center"><strong style="color: red;">ขออภัย ไม่พบข้อมูล <?php echo $title; ?></strong></div>
                <div class="col-md-3">&nbsp;</div>
            </div>
            <form method="post" action="<?php echo site_url(); ?>admin/add_expertise">
                <div style="text-align: center;">
                    <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                    <button class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> เพิ่มข้อมูล Expertise</button>
                </div>
            </form>

        <?php else: ?>

            <table class="table table-bordered">
                <?php foreach ($query as $r) : ?>
                    <tr>
                        <td style="width: 230px;"><strong>Field of Expertise / Competency</strong></td>
                        <td>
                            <?php echo $r->topic; ?>
                        </td>
                        <td rowspan="2" style="text-align: center; width: 90px;">
                            <form role="form" method="post" action="<?php echo site_url(); ?>admin/edit_expertise">
                                <input type="hidden" name="expertise_id" value="<?php echo $r->expertise_id; ?>">
                                <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Specific</strong></td>
                        <td><?php echo $r->specific_topic; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

    <a class="btn btn-default" href="<?php echo site_url(); ?>admin/profile/<?php echo $researcher_id; ?>"><span class="glyphicon glyphicon-arrow-left"></span> Back to Profile</a>

</div> <!-- /.container -->
