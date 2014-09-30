
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
                        <td  style="text-align: center; min-width: 138px;">
                            <a href="<?php echo site_url() ?>/admin/edit_education/<?php echo $row->education_id; ?>"
                               class="btn btn-primary">
                                Edit
                            </a>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#myModal">Delete</a>
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
            
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Delete <?php echo $title; ?>!</h4>
                        </div>
                        <div class="modal-body">
                            Do you really want to delete the <?php echo $title; ?> data?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>                            
                            <button type="button" class="btn btn-primary" onclick="window.location = '<?php echo site_url(); ?>/admin/delete_education/<?php echo $row->education_id; ?>'">Confirm</button>
                        </div>
                    </div>
                </div>
            </div> <!-- END Modal -->

    </div>
</div>
