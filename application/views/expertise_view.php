
<div class="container">
    <h3 id="expertise">ความเชี่ยวชาญ (Field of Expertise / Competency)</h3>
    <?php if (!empty($q_expertise)): ?>
        <?php foreach ($q_expertise as $ex): ?>
            <p>
                <?php if (!empty($ex->topic)): ?>
                    <?php echo $ex->topic; ?><br>
                <?php endif; ?>

                <?php if (!empty($ex->specific_topic)): ?>
                    - <?php echo $ex->specific_topic; ?>
                <?php endif; ?>
            </p>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editExpert">Edit Expertise</button>
            <!-- #editExpert Modal -->
            <div class="modal fade" id="editExpert" tabindex="-1" role="dialog" aria-labelledby="editExpert" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Expertise</h4>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-warning">Confirm edit</button>
                        </div>
                    </div>
                </div>
            </div> <!-- END Modal -->

        <?php endforeach; ?>
    <?php else: ?>
        <p>- ขออภัย ไม่พบข้อมูล -</p>
    <?php endif; ?>
</div>
<p>&nbsp;</p>
