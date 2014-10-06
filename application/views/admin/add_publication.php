
<div class="container">
    <div class="row well">
        <h2 style="text-align: center;"><?php echo $title; ?><span class="glyphicon glyphicon-flash"></span></h2>
        <p>&nbsp;</p>


        <form role="form" method="post" action="<?php echo site_url(); ?>/admin/add_publication_process">
            <fieldset>

                <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">

                <div class="form-group">
                    <label for="content">International Publication <span style="color: red;">**</span> (in the last 10 years in order of most recent work)</label>                        
                    <textarea name="content" id="content" class="form-control" rows="10" required></textarea>
                    <script>
                        CKEDITOR.replace('content');
                    </script>
                </div>
                <button type="submit" class="btn btn-default">Submit</button> &nbsp;
                <a href="<?php echo site_url(); ?>/admin/publication/<?php echo $researcher_id; ?>">Cancel</a>

            </fieldset>
        </form>


    </div>
</div>

