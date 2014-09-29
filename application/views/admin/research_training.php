
<div class="container">
    <div class="row well">
        <?php foreach ($profile as $pro) : ?>
            <h2 style="text-align: center;">
                <span class="glyphicon glyphicon-fire"></span> <?php echo $pro->firstname_en . ' ' . $pro->lastname_en; ?>'s Research training
            </h2>
        <?php endforeach; ?>

        <p>&nbsp;</p>

        <?php if (!$query) : ?>
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6 alert alert-warning text-center"><strong style="color: red;">ขออภัย ไม่พบข้อมูล research training</strong></div>
                <div class="col-md-3">&nbsp;</div>
            </div>

            <form method="post" action="<?php echo site_url(); ?>/admin/add_research_training">
                <div style="text-align: center;">
                    <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                    <button class="btn btn-default">กรอกข้อมูล Research</button>
                </div>
            </form>

        <?php else: ?>

            <table class="table table-bordered">

                <tr><th style="text-align: center;">Training type</th><th style="text-align: center;">Institute</th><th style="text-align: center;">Period</th><th style="text-align: center;">Supervisor</th><th>&nbsp;</th></tr>

                <?php

                function training_type($type) {
                    switch ($type) {
                        case 'postdoc':
                            echo 'Postdoctoral Training';
                            break;
                        case 'short':
                            echo 'Research Training : Short Term (<3 months)';
                            break;
                        case 'long':
                            echo 'Research Training : Long Term (>3 months)';
                            break;
                        default:
                            echo '';
                            break;
                    }
                }

                foreach ($query as $row) :
                    ?>
                    <tr>
                        <td><strong><?php training_type($row->training_type); ?></strong></td>
                        <td><?php echo $row->institute; ?></td>
                        <td><?php echo date("F j, Y", strtotime($row->training_start)) . ' - ' . date("F j, Y", strtotime($row->training_end)); ?></td>
                        <td><?php echo $row->supervisor; ?></td>
                        <td style="text-align: center; min-width: 150px;">                            
                            <a href="<?php echo site_url() ?>/admin/edit_research_training/<?php echo $row->training_id; ?>"
                               class="btn btn-primary">
                                Edit
                            </a>
                            <a href="#"
                               onclick="return deleteResearchTraining(<?php echo $row->training_id; ?>)"
                               class="btn btn-danger">
                                Delete
                            </a>                            
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>

            <script>
                function deleteResearchTraining(training_id) {
                    if (confirm("ต้องการลบข้อมูลการ training?") === true) {
                        window.location = "<?php echo site_url() ?>/admin/delete_trainging/" + training_id;
                    }
                }
            </script>

            <form role="form" method="post" action="<?php echo site_url(); ?>/admin/add_research_training">
                <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add</button>
            </form>

        <?php endif; ?> 



    </div>

</div> <!-- /.container -->
