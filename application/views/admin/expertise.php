
<div class="container">
    <div class="row well">

        <?php foreach ($profile as $pro) : ?>
            <h2 style="text-align: center;"><span class="glyphicon glyphicon-flash"></span> <?php echo $pro->firstname_en . ' ' . $pro->lastname_en; ?>'s <?php echo $title; ?></h2>
            <p>&nbsp;</p>
        <?php endforeach; ?>

        <?php if (!$query) : ?>
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6 alert alert-warning text-center"><strong style="color: red;">ขออภัย ไม่พบข้อมูล <?php echo $title; ?></strong></div>
                <div class="col-md-3">&nbsp;</div>
            </div>
            <form method="post" action="<?php echo site_url(); ?>/admin/add_expertise">
                <div style="text-align: center;">
                    <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                    <button class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> เพิ่มข้อมูล <?php echo $title; ?></button>
                </div>
            </form>

        <?php else: ?>

            <table class="table table-bordered">
                <tr>
                    <td style="width: 230px;"><strong>Field of Expertise/ Competency</strong></td>
                    <?php foreach ($query as $r) : ?>
                        <td>
                            <?php echo $r->topic; ?>
                        </td>
                        <td style="text-align: center; width: 90px;">
                            <form role="form" method="post" action="<?php echo site_url(); ?>/admin/edit_expertise">
                                <input type="hidden" name="expertise_id" value="<?php echo $r->expertise_id; ?>">
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                            </form>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>



        <?php endif; ?>


    </div>

</div> <!-- /.container -->
