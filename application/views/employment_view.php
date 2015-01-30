
<div class="container">
    <h3 id="employment">ข้อมูลการทำงาน (employment)</h3>        

    <?php foreach ($q_employment as $em) : ?>
        <p><strong>Academic position:</strong> <?php echo $em->academic; ?></p>
        <p><strong>Administrative position:</strong> <?php echo $em->administrative; ?></p>
        <p><strong>Research position:</strong> <?php echo $em->research; ?></p>
        <p><strong>Affiliated University / Institute:</strong> <?php echo $em->institute; ?></p>
        <p><strong>Faculty / College / Center:</strong> <?php echo $em->faculty; ?></p>
        <p><strong>Department / School / Division:</strong> <?php echo $em->department; ?></p>

        <p><strong>ที่ติดต่อที่ทำงาน:</strong>
            <?php if (!empty($em->street_th)): ?>                                
                <?php echo $em->street_th; ?>
            <?php endif; ?>

            <?php
            if (!empty($em->sub_district_th)):
                if ($em->province_th == 'กรุงเทพมหานคร'):
                    echo 'แขวง';
                else:
                    echo 'ตำบล';
                endif;
                echo $em->sub_district_th;
            endif;
            ?>

            <?php
            if (!empty($em->district_th)):
                if ($em->province_th == 'กรุงเทพมหานคร'):
                    echo 'เขต';
                else:
                    echo 'อำเภอ';
                endif;
                echo $em->district_th;
            endif;
            ?>

            <?php
            if (!empty($em->province_th)):
                if ($em->province_th != 'กรุงเทพมหานคร'):
                    echo 'จังหวัด';
                endif;
                echo $em->province_th;
            endif;
            ?>

            <?php echo $em->postal_code; ?>

        </p>

        <p>
            <strong>โทรศัพท์:</strong> 
            <?php
            if (!empty($em->phone)) {
                echo $em->phone;
            }
            ?>
        </p>

        <?php if (!empty($em->mobile_phone)): ?>
            <p><strong>โทรศัพท์มือถือ: </strong><?php echo $em->mobile_phone; ?></p>
        <?php endif; ?>

        <p>
            <strong>Email:</strong> 
            <?php
            if (!empty($em->email)) {
                echo $em->email;
            }
            ?>
        </p>
        <p>
            <strong>Website:</strong>
            <?php if (!empty($em->website)) : ?>
                <a target="_blank" href="<?php echo $em->website; ?>"><?php echo $em->website; ?></a>
            <?php endif; ?>
        </p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editEmp">Edit Employment</button>
        <!-- #editEmp Modal -->
        <div class="modal fade" id="editEmp" tabindex="-1" role="dialog" aria-labelledby="editEmp" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Employment</h4>
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
</div>

<p>&nbsp;</p>
