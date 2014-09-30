
<div class="container">
    <div class="row well">
        <h2 style="text-align: center;"><?php echo $title; ?> <span class="glyphicon glyphicon-globe"></span></h2>
        <p>&nbsp;</p>

        <form role="form" method="post" action="<?php echo site_url(); ?>/admin/edit_publication_process">
            <fieldset>
                <?php foreach ($query as $row) : ?>

                    <input type="hidden" name="publication_id" value="<?php echo $row->publication_id; ?>">
                    <input type="hidden" name="researcher_id" value="<?php echo $row->researcher_id; ?>">

                    <div class="form-group">
                        <label for="content">International Publication <span style="color: red;">**</span> (in the last 10 years in order of most recent work)</label>                        
                        <textarea name="content" id="content" class="form-control" rows="4" required><?php echo htmlspecialchars_decode($row->content); ?></textarea>
                        <script>
                            CKEDITOR.replace('content');
                        </script>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button> &nbsp;
                    <a href="<?php echo site_url(); ?>/admin/publication/<?php echo $row->researcher_id; ?>">Cancel</a>

                <?php endforeach; ?>
            </fieldset>
        </form>


    </div>
</div>

