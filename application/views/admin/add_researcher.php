
<div class="container">
    <div class="row well">

        <h2 style="text-align: center;"><span class="glyphicon glyphicon-plus"></span> Add Researcher</h2>
        <h4 style="text-align: center;">&nbsp;</h4>

        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>admin/add_researcher_process">
            <fieldset>
                <div class="form-group">
                    <label for="firstname_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Firstname<span style="color: red;">**</span></label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <input type="text" class="form-control" name="firstname_en" id="firstname_en" required placeholder="Firstname">
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="lastname_en" class="col-sm-2 col-md-2 col-lg-2 control-label">Lastname<span style="color: red;">**</span></label>
                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <input type="text" class="form-control" name="lastname_en" id="lastname_en" required placeholder="Lastname">
                        <span id="check_name" class="help-block">Check Firstname and Lastname.</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <a class="btn btn-default" href="<?php echo site_url(); ?>admin">Cancel</a> &nbsp;
                        <button type="submit" class="btn btn-primary">Confirm Add</button>
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

