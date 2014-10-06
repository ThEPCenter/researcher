
<div class="container">
    <div class="row well">
        <h2 style="text-align: center;"><?php echo $title; ?> <span class="glyphicon glyphicon-flash"></span></h2>
        <p>&nbsp;</p>


        <form role="form" method="post" action="<?php echo site_url(); ?>/admin/add_expertise_process">
            <fieldset>

                <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">

                <div class="form-group">
                    <label for="expertise">Field of Expertise/ Competency</label>                        
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

                <div class="form-group">
                    <label for="specific_topic">Specific</label>                        
                    <input class="form-control" type="text" name="specific_topic" id="specific_topic">
                </div>

                <button type="submit" class="btn btn-default">Submit</button> &nbsp;
                <a href="<?php echo site_url(); ?>/admin/expertise/<?php echo $researcher_id; ?>">Cancel</a>


            </fieldset>
        </form>


    </div>
</div>

