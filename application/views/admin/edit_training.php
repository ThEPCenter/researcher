
<div class="container">
    <div class="row well">
        <h2 style="text-align: center;"><?php echo $title; ?> <span class="glyphicon glyphicon-fire"></span></h2>
        <p>&nbsp;</p>

        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>/admin/edit_training_process">

            <?php

            function option_select($value, $data) {
                if ($value == $data) {
                    echo ' selected';
                }
            }

            foreach ($query as $row) :
                ?>
                <fieldset>
                    <input type="hidden" name="training_id" value="<?php echo $row->training_id; ?>">
                    <input type="hidden" name="researcher_id" value="<?php echo $row->researcher_id; ?>">

                    <div class="form-group">
                        <label for="training_type" class="col-lg-2 control-label">Training type<span style="color: red;">**</span></label>
                        <div class="col-lg-10">
                            <select class="form-control" name="training_type" id="training_type">
                                <option value=""<?php option_select('', $row->training_type); ?>>---- Select Training ----</option>
                                <option value="postdoc"<?php option_select('postdoc', $row->training_type); ?>>Postdoctoral Training</option>
                                <option value="short"<?php option_select('short', $row->training_type); ?>>Research Training : Short Term (<3 months)</option>
                                <option value="long"<?php option_select('long', $row->training_type); ?>>Research Training : Long Term (>3 months)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="institute" class="col-lg-2 control-label">Institute<span style="color: red;">**</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="institute" id="institute" required value="<?php echo $row->institute; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Period</label>
                        <div class="col-lg-10">
                            <input type="text" class="training_start form-date" name="training_start" 
                                   value="<?php if (!empty($row->training_start)) { echo date("m/d/Y", strtotime($row->training_start));} ?>"> - 
                            <input type="text" class="training_end form-date" name="training_end" 
                                   value="<?php if (!empty($row->training_end)) { echo date("m/d/Y", strtotime($row->training_end)); } ?>">
                            <script>
                                $(function () {
                                    // Date Picker
                                    $(".training_start").datepicker();
                                    $(".training_end").datepicker();
                                }); /* END jQuery */
                            </script>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="supervisor" class="col-lg-2 control-label">Supervisor</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="supervisor" id="supervisor" value="<?php echo $row->supervisor; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-success">Submit</button> &nbsp;
                            <a href="<?php echo site_url(); ?>/admin/training/<?php echo $row->researcher_id; ?>">Cancel</a>
                        </div>
                    </div>

                </fieldset>
            <?php endforeach; ?>

        </form>

    </div>

</div> <!-- /.container -->
