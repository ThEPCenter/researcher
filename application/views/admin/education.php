
<div class="container">
    <div class="row well">

        <?php foreach ($profile as $pro) : ?>
            <h2 style="text-align: center;"><span class="glyphicon glyphicon-book"></span> <?php echo $pro->firstname_en . ' ' . $pro->lastname_en; ?>'s Education</h2>
            <h4 style="text-align: center;">(ข้อมูลประวัติการศึกษา)</h4>
        <?php endforeach; ?>


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
                            <a href="<?php echo site_url() ?>/admin/edit_education/<?php echo $row->education_id; ?>"
                               class="btn btn-primary">
                                Edit
                            </a>
                            <a href="#"
                               onclick="return deleteEducation(<?php echo $row->education_id; ?>)"
                               class="btn btn-danger">
                                Delete
                            </a>                            
                        </td>
                    </tr>
                    <?php
                    $i++;
                endforeach;
                ?>
            </table>
            <script>
                function deleteEducation(education_id) {
                    if (confirm("ต้องการลบข้อมูลการศึกษา?") === true) {
                        window.location = "<?php echo site_url() ?>/admin/delete_education/" + education_id;
                    }
                }
            </script>
            <form role="form" method="post" action="<?php echo site_url(); ?>/admin/add_education">
                <input type="hidden" name="researcher_id" value="<?php echo $row->researcher_id; ?>">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add</button>
            </form>

            <p>&nbsp;</p>

        <?php endif; ?>

    </div>
</div>
