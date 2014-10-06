
<div class="container">
    <div class="row well">

        <h2 style="text-align: center;"><span class="glyphicon glyphicon-plus"></span> Add Researcher</h2>
        <h4 style="text-align: center;">&nbsp;</h4>

        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>/admin/add_researcher_process">
            <fieldset>
                <div class="form-group">
                    <label for="firstname_en" class="col-lg-2 control-label">Firstname<span style="color: red;">**</span></label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="firstname_en" id="firstname_en" required placeholder="Firstname">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastname_en" class="col-lg-2 control-label">Lastname<span style="color: red;">**</span></label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="lastname_en" id="lastname_en" required placeholder="Lastname">
                        <span id="check_name" class="help-block">Check Firstname and Lastname.</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-success">Submit</button> &nbsp;<a href="index">Cancel</a>
                    </div>
                </div>
            </fieldset>
        </form>

        <script>
            $(function () {
                $("#firstname_en").focus();
            });
        </script>

    </div>

</div> <!-- /.container -->

