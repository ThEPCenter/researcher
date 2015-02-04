
<?php

function expertise_select($value, $data) {
    if ($value == $data) {
        echo ' selected';
    }
}
?>
<div class="container" id="expertise">
    <h3>ความเชี่ยวชาญ (Field of Expertise / Competency)</h3>

    <?php if (empty($q_expertise)): ?>

        <p class="bg-warning" style="padding: 15px;">ขออภัย ไม่พบข้อมูลความเชี่ยวชาญ</p>

        <button title="Add Expertise" type="button" class="btn btn-default" data-toggle="modal" data-target="#addExp"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มข้อมูลความเชี่ยวชาญ</button>
        <!-- #addExp Modal -->
        <div class="modal fade" id="addExp" tabindex="-1" role="dialog" aria-labelledby="addExp" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel">เพิ่มข้อมูลความเชี่ยวชาญ (Add Field of Expertise / Competency)</h3>
                    </div>
                    <form method="post" action="profile/add_expertise_process">
                        <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">

                        <div class="modal-body">
                            <div class="form-group">
                                <h4>คุณสามารถเลือก Field of Expertise / Competency จาก list</h4>                        
                                <?php include 'expertise_array.php'; ?>
                                <select class="form-control" id="expertise" name="topic">
                                    <option value="">---- Select Field of Expertise ----</option>

                                    <option disabled>General physics</option>
                                    <?php foreach ($expertise['General physics'] as $value) : ?>
                                        <option value="<?php echo $value; ?>">&nbsp; &nbsp; <?php echo $value; ?></option>
                                    <?php endforeach; ?>

                                    <option disabled>The Physics of Elementary Particles and Fields</option>
                                    <?php foreach ($expertise['The Physics of Elementary Particles and Fields'] as $value) : ?>
                                        <option value="<?php echo $value; ?>">&nbsp; &nbsp; <?php echo $value; ?></option>
                                    <?php endforeach; ?>

                                    <option disabled>Nuclear Physics</option>
                                    <?php foreach ($expertise['Nuclear Physics'] as $value) : ?>
                                        <option value="<?php echo $value; ?>">&nbsp; &nbsp; <?php echo $value; ?></option>
                                    <?php endforeach; ?>

                                    <option disabled>Atomic and Molecular Physics</option>
                                    <?php foreach ($expertise['Atomic and Molecular Physics'] as $value) : ?>
                                        <option value="<?php echo $value; ?>">&nbsp; &nbsp; <?php echo $value; ?></option>
                                    <?php endforeach; ?>

                                    <option disabled>Electromagnetism, Optics, Acoustics, Fluid dynamics etc.</option>
                                    <?php foreach ($expertise['Electromagnetism, Optics, Acoustics, Fluid dynamics etc.'] as $value) : ?>
                                        <option value="<?php echo $value; ?>">&nbsp; &nbsp; <?php echo $value; ?></option>
                                    <?php endforeach; ?>

                                    <option disabled>Physics of Gases plasmas etc.</option>
                                    <?php foreach ($expertise['Physics of Gases plasmas etc.'] as $value) : ?>
                                        <option value="<?php echo $value; ?>">&nbsp; &nbsp; <?php echo $value; ?></option>
                                    <?php endforeach; ?>

                                    <option disabled>Condensed Matter: Structure, mechanical and thermal properties</option>
                                    <?php foreach ($expertise['Condensed Matter: Structure, mechanical and thermal properties'] as $value) : ?>
                                        <option value="<?php echo $value; ?>">&nbsp; &nbsp; <?php echo $value; ?></option>
                                    <?php endforeach; ?>

                                    <option disabled>Condensed Matter: Electronic structure, electrical, magnetic and optical properties</option>
                                    <?php foreach ($expertise['Condensed Matter: Electronic structure, electrical, magnetic and optical properties'] as $value) : ?>
                                        <option value="<?php echo $value; ?>">&nbsp; &nbsp; <?php echo $value; ?></option>
                                    <?php endforeach; ?>

                                    <option disabled>Interdisciplinary physics and others</option>
                                    <?php foreach ($expertise['Interdisciplinary physics and others'] as $value) : ?>
                                        <option value="<?php echo $value; ?>">&nbsp; &nbsp; <?php echo $value; ?></option>
                                    <?php endforeach; ?>

                                    <option disabled>Geophysics, Astronomy, Astrophysics</option>
                                    <?php foreach ($expertise['Geophysics, Astronomy, Astrophysics'] as $value) : ?>
                                        <option value="<?php echo $value; ?>">&nbsp; &nbsp; <?php echo $value; ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>

                            <h4>หรือ</h4>

                            <div class="form-group">
                                <h4>ระบุความเชี่ยวชาญเฉพาะตามที่ต้องการ</h4>
                                <textarea class="form-control" name="specific_topic" id="specific_topic" rows="4"></textarea>                                    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Confirm Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- END Modal --> 

    <?php else: ?>

        <?php foreach ($q_expertise as $r): ?>
            <p>
                <?php if (!empty($r->topic)): ?>
                    <?php echo $r->topic; ?><br>
                <?php endif; ?>

                <?php if (!empty($r->specific_topic)): ?>
                    - <?php echo $r->specific_topic; ?>
                <?php endif; ?>
            </p>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editExpert">Edit Expertise</button>
            <!-- #editExpert Modal -->
            <div class="modal fade" id="editExpert" tabindex="-1" role="dialog" aria-labelledby="editExpert" aria-hidden="true">
                <div class="modal-dialog modal-lg">                  
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3  id="myModalLabel">Edit Field of Expertise / Competency</h3>
                        </div>
                        <form method="post" action="profile/edit_expertise_process">
                            <div class="modal-body">                         

                                <input type="hidden" name="expertise_id" value="<?php echo $r->expertise_id; ?>">
                                <input type="hidden" name="researcher_id" value="<?php echo $r->researcher_id; ?>">

                                <div class="form-group">
                                    <h4>คุณสามารถเลือก Field of Expertise / Competency จาก list</h4>                        
                                    <?php include 'expertise_array.php'; ?>
                                    <select class="form-control" id="expertise" name="topic">
                                        <option value="">---- Select Field / No Select ----</option>

                                        <option disabled>General physics</option>
                                        <?php foreach ($expertise['General physics'] as $value) : ?>
                                            <option value="<?php echo $value; ?>"<?php expertise_select($value, $r->topic); ?>>&nbsp; &nbsp; <?php echo $value; ?></option>
                                        <?php endforeach; ?>

                                        <option disabled>The Physics of Elementary Particles and Fields</option>
                                        <?php foreach ($expertise['The Physics of Elementary Particles and Fields'] as $value) : ?>
                                            <option value="<?php echo $value; ?>"<?php expertise_select($value, $r->topic); ?>>&nbsp; &nbsp; <?php echo $value; ?></option>
                                        <?php endforeach; ?>

                                        <option disabled>Nuclear Physics</option>
                                        <?php foreach ($expertise['Nuclear Physics'] as $value) : ?>
                                            <option value="<?php echo $value; ?>"<?php expertise_select($value, $r->topic); ?>>&nbsp; &nbsp; <?php echo $value; ?></option>
                                        <?php endforeach; ?>

                                        <option disabled>Atomic and Molecular Physics</option>
                                        <?php foreach ($expertise['Atomic and Molecular Physics'] as $value) : ?>
                                            <option value="<?php echo $value; ?>"<?php expertise_select($value, $r->topic); ?>>&nbsp; &nbsp; <?php echo $value; ?></option>
                                        <?php endforeach; ?>

                                        <option disabled>Electromagnetism, Optics, Acoustics, Fluid dynamics etc.</option>
                                        <?php foreach ($expertise['Electromagnetism, Optics, Acoustics, Fluid dynamics etc.'] as $value) : ?>
                                            <option value="<?php echo $value; ?>"<?php expertise_select($value, $r->topic); ?>>&nbsp; &nbsp; <?php echo $value; ?></option>
                                        <?php endforeach; ?>

                                        <option disabled>Physics of Gases plasmas etc.</option>
                                        <?php foreach ($expertise['Physics of Gases plasmas etc.'] as $value) : ?>
                                            <option value="<?php echo $value; ?>"<?php expertise_select($value, $r->topic); ?>>&nbsp; &nbsp; <?php echo $value; ?></option>
                                        <?php endforeach; ?>

                                        <option disabled>Condensed Matter: Structure, mechanical and thermal properties</option>
                                        <?php foreach ($expertise['Condensed Matter: Structure, mechanical and thermal properties'] as $value) : ?>
                                            <option value="<?php echo $value; ?>"<?php expertise_select($value, $r->topic); ?>>&nbsp; &nbsp; <?php echo $value; ?></option>
                                        <?php endforeach; ?>

                                        <option disabled>Condensed Matter: Electronic structure, electrical, magnetic and optical properties</option>
                                        <?php foreach ($expertise['Condensed Matter: Electronic structure, electrical, magnetic and optical properties'] as $value) : ?>
                                            <option value="<?php echo $value; ?>"<?php expertise_select($value, $r->topic); ?>>&nbsp; &nbsp; <?php echo $value; ?></option>
                                        <?php endforeach; ?>

                                        <option disabled>Interdisciplinary physics and others</option>
                                        <?php foreach ($expertise['Interdisciplinary physics and others'] as $value) : ?>
                                            <option value="<?php echo $value; ?>"<?php expertise_select($value, $r->topic); ?>>&nbsp; &nbsp; <?php echo $value; ?></option>
                                        <?php endforeach; ?>

                                        <option disabled>Geophysics, Astronomy, Astrophysics</option>
                                        <?php foreach ($expertise['Geophysics, Astronomy, Astrophysics'] as $value) : ?>
                                            <option value="<?php echo $value; ?>"<?php expertise_select($value, $r->topic); ?>>&nbsp; &nbsp; <?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <h4>หรือ</h4>

                                <div class="form-group">
                                    <h4>ระบุความเชี่ยวชาญเฉพาะตามที่ต้องการ</h4>
                                    <textarea class="form-control" name="specific_topic" id="specific_topic" rows="4"><?php echo $r->specific_topic; ?></textarea>                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- END Modal -->

        <?php endforeach; ?>

    <?php endif; ?>

</div>

<p>&nbsp;</p>
