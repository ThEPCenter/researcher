
<div class="container" id="publication">
    <h3>Publication (ผลงานตีพิมพ์)</h3>

    <?php if (empty($q_publication)): ?>

        <p class="bg-warning" style="padding: 15px;">ขออภัย ไม่พบข้อมูล Publication</p>
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addPub"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Publication</button> &nbsp;
        <a target="_blank" title="Help" href="<?php echo site_url() . 'help/add_publication'; ?>" style="font-size: 18px;"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>
        
        <!-- #addPub modal -->
        <div id="addPub" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addPub" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Publication</h4>
                    </div>
                    <form role="form" method="post" action="profile/add_publication_process">
                        <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="content">International Publication <span style="color: red;">**</span> (in the last 10 years in order of most recent work)</label>                        
                                <textarea name="content" id="add_content" class="form-control" rows="4" required><ol><li>&nbsp;</li></ol></textarea>
                                <script>
                                    CKEDITOR.replace('add_content');
                                </script>
                            </div>                                    
                            <p><a target="_blank" href="profile"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> วิธีการกรอก</a></p>
                        </div> <!-- /.modal-body -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Confirm Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- END Large modal -->

    <?php else: ?>

        <?php foreach ($q_publication as $pub): ?>

            <div><?php echo htmlspecialchars_decode($pub->content); ?></div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Edit Publication</button> &nbsp;
            
            <a target="_blank" title="Help" href="<?php echo site_url() . 'help/edit_publication'; ?>" style="font-size: 18px;"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>
            <!-- Large modal -->
            <div id="editPub" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="editPub" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Publication</h4>
                        </div> <!-- /.modal-header -->
                        <form method="post" action="profile/edit_publication_process">
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
                                <button type="submit" class="btn btn-primary">Confirm Edit</button>
                            </div> <!-- /.modal-footer -->
                        </form>
                    </div> <!-- /.modal-content -->
                </div> <!-- /.modal-dialog -->
            </div> <!-- END Large modal -->

        <?php endforeach; ?>

    <?php endif; ?>

</div> <!-- /.container -->

<p>&nbsp;</p>
