
<div class="container">
    <div class="row well">
        <?php foreach ($profile as $pro) : ?>
            <h2 style="text-align: center;">Edit <?php echo $pro->firstname_en . ' ' . $pro->lastname_en; ?>'s Education <span class="glyphicon glyphicon-book"></span></h2>
        <?php endforeach; ?>
        <p>&nbsp;</p>

        <div class="col-md-12">
            <?php

            function option_select($value, $data) {
                if ($value == $data) {
                    return ' selected';
                }
            }

            if (empty($query)) {
                redirect('admin');
            }
            ?>

            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url(); ?>/admin/edit_education_process">
                <fieldset>
                    <?php foreach ($query as $row) : ?>                    
                        <input type="hidden" name="education_id" value="<?php echo $row->education_id; ?>">
                        <input type="hidden" name="researcher_id" value="<?php echo $row->researcher_id; ?>">

                        <div class="form-group">
                            <label for="grad_year" class="col-lg-2 control-label">ปีที่จบการศึกษา<span style="color: red;">**</span></label>
                            <div class="col-lg-10">
                                <select class="form-control" name="grad_year" id="grad_year" required>
                                    <option value=""<?php echo option_select('', $row->grad_year); ?>>---- Select Year ----</option>
                                    <?php for ($y = 1950; $y <= date("Y"); $y++) : ?>
                                        <option value="<?php echo $y; ?>"<?php echo option_select($y, $row->grad_year); ?>><?php echo $y; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="degree" class="col-lg-2 control-label">ระดับการศึกษา (degree)<span style="color: red;">**</span></label>
                            <div class="col-lg-10">
                                <select class="form-control" name="degree" id="degree" required>
                                    <option value=""<?php echo option_select('', $row->degree); ?>>---- Select Degree ----</option>
                                    <option value="bachelor"<?php echo option_select('bachelor', $row->degree); ?>>Bachelor's degree</option>
                                    <option value="master"<?php echo option_select('master', $row->degree); ?>>Master's degree</option>
                                    <option value="doctoral"<?php echo option_select('doctoral', $row->degree); ?>>Doctoral's degree</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="institute" class="col-lg-2 control-label">สถาบันการศึกษา<span style="color: red;">**</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="institute" id="institute" required value="<?php echo $row->institute; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="major" class="col-lg-2 control-label">สาขาวิชา (major)<span style="color: red;">**</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="major" id="major" required value="<?php echo $row->major; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="country" class="col-lg-2 control-label">ประเทศ<span style="color: red;">**</span></label>
                            <div class="col-lg-10">
                                <?php include 'country_array.php'; ?>
                                <select class="form-control" name="country" id="country" required>
                                    <option value="">---- Select Country ----</option>
                                    <?php foreach ($country as $key => $value): ?>                                    
                                        <option value="<?php echo $value; ?>"<?php echo option_select($value, $row->country); ?>><?php echo $value; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="thesis_title" class="col-lg-2 control-label">หัวข้อวิทยานิพนธ์</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="thesis_title" id="thesis_title" value="<?php echo $row->thesis_title; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keyword" class="col-lg-2 control-label">Keywords วิทยานิพนธ์</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="keyword" rows="3" id="keyword"><?php echo $row->keyword; ?></textarea>
                                <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                            </div>
                        </div>

                    <?php endforeach; ?>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-success">Submit</button> &nbsp;
                            <a href="<?php echo site_url(); ?>/admin/education/<?php echo $row->researcher_id; ?>"><strong>Cancel</strong></a>                            
                        </div>
                    </div>

                </fieldset>
            </form>

        </div>

    </div>

</div> <!-- /.container -->
