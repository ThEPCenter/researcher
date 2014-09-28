
<div class="container">
    <div class="row well">
        <h2 style="text-align: center;">Education <span class="glyphicon glyphicon-book"></span></h2>
        <h4 style="text-align: center;">(ข้อมูลประวัติการศึกษา)</h4>

        <?php if (!$query) : ?>
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6 alert alert-warning text-center"><strong style="color: red;">ขออภัย ไม่พบข้อมูลประวัติการศึกษา</strong></div>
                <div class="col-md-3">&nbsp;</div>
            </div>
            <form method="post" action="<?php echo site_url(); ?>/admin/add_education">
                <div style="text-align: center;">
                    <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                    <button class="btn btn-default">กรอกข้อมูลประวัติการศึกษา</button>
                </div>
            </form>
        <?php else: ?>

            <table class="table table-bordered">
                <tr>
                    <th style="text-align: center;">ลำดับ</th><th style="text-align: center;">ปีที่จบ</th><th style="text-align: center;">ระดับการศึกษา (degree)</th><th  style="text-align: center;">สาขา (major)</th><th  style="text-align: center;">&nbsp;</th>
                </tr>

                <?php
                $i = 1;
                foreach ($query as $row) :
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $i; ?></td>
                        <td style="text-align: center;"><?php echo $row->grad_year; ?></td>
                        <td style="text-align: center;"><?php echo ucfirst($row->degree) . "'s degree"; ?></td>
                        <td style="text-align: center;"><?php echo $row->major; ?></td>
                        <td style="text-align: center;">
                            <form role="form" method="post" action="<?php echo site_url(); ?>/admin/edit_education">
                                <input type="hidden" name="education_id" value="<?php echo $row->education_id; ?>">
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
            </table>

            <form role="form" method="post" action="<?php echo site_url(); ?>/admin/add_education">
                <input type="hidden" name="researcher_id" value="<?php echo $row->researcher_id; ?>">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add</button>
            </form>

            <p>&nbsp;</p>

        <?php endif; ?>



    </div>
</div>
