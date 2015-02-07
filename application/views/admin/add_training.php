
<div class="container">
    <div class="row well">
        <h2 style="text-align: center;"><?php echo $title; ?> <span class="glyphicon glyphicon-fire"></span></h2>
        <p>&nbsp;</p>        

        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>admin/add_training_process">

            <fieldset>

                <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">

                <div class="form-group">
                    <label for="training_type" class="col-lg-2 control-label">Training type<span style="color: red;">**</span></label>
                    <div class="col-lg-10">
                        <select class="form-control" name="training_type" id="training_type">
                            <option value="">---- Select Training Type ----</option>
                            <option value="postdoc">Postdoctoral Training</option>
                            <option value="short">Research Training : Short Term (<3 months)</option>
                            <option value="long">Research Training : Long Term (>3 months)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="institute" class="col-lg-2 control-label">Institute<span style="color: red;">**</span></label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="institute" id="institute" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Period</label>
                    <div class="col-lg-10">
                        <input type="text" class="training_start form-date" name="training_start"> - 
                        <input type="text" class="training_end form-date" name="training_end">
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
                        <input type="text" class="form-control" name="supervisor" id="supervisor">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label"></label>
                    <div class="col-lg-10">
                        <a class="btn btn-default" href="<?php echo site_url() . 'admin/training/' . $researcher_id; ?>">Cancel</a> &nbsp;
                        <button type="submit" class="btn btn-primary">Confirm Add</button>
                    </div>
                </div>

            </fieldset>

        </form>

    </div>

</div> <!-- /.container -->
