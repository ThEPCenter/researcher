<?php foreach ($q_publication as $pub): ?>
    <div class="container">
        <h3 id="publication">Publication (ผลงานตีพิมพ์)</h3>

        <div><?php echo htmlspecialchars_decode($pub->content); ?></div>
        <p>&nbsp;</p>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Edit Publication</button>
    </div> <!-- /.container -->

    <!-- Large modal -->
    <div id="editPub" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="editPub" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Publication</h4>
                </div>

                <form role="form" method="post" action="<?php echo site_url(); ?>/admin/edit_publication_process">
                    <div class="modal-body">
                        <input type="hidden" name="publication_id" value="<?php echo $pub->publication_id; ?>">
                        <input type="hidden" name="researcher_id" value="<?php echo $pub->researcher_id; ?>">

                        <div class="form-group">
                            <label for="content">International Publication <span style="color: red;">**</span> (in the last 10 years in order of most recent work)</label>                        
                            <textarea name="content" id="content" class="form-control" rows="4" required><?php echo htmlspecialchars_decode($pub->content); ?></textarea>
                            <script>
                                CKEDITOR.replace('content');
                            </script>
                        </div>

                    </div> <!-- /.modal-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Confirm Edit</button>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- END Large modal -->

<?php endforeach; ?> 
<p>&nbsp;</p>
