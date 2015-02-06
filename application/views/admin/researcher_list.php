
<div class="container">
    <div class="row well">

        <h2 style="text-align: center;"><span class="glyphicon glyphicon-list"></span> Researcher List</h2>
        <h4 style="text-align: center;">&nbsp;</h4>

        <?php if (!$query_list) : redirect('admin/index'); ?>

        <?php else: ?>            
            <?php
            $i = 1;
            foreach ($query_list as $row) :
                $c_num[$i] = $row->researcher_id;
                ?>
                <div class="col-xs-6 col-sm-4 col-md-3">

                    <a title="<?php echo $row->firstname_en . ' ' . $row->lastname_en; ?>" href="<?php echo site_url(); ?>admin/profile/<?php echo $row->researcher_id; ?>">
                        <div style="max-width: 60px; height: 80px;">
                            <img alt="profile's picture" style="max-width: 60px;" src="<?php echo $row->pic_url; ?>">
                        </div>                        
                        <div style="margin-top: 5px;"><?php echo $row->firstname_en . ' ' . $row->lastname_en; ?></div>
                    </a>
                    <p>&nbsp;</p>

                </div>
                <?php
                $i++;
            endforeach;
            ?>

        <?php endif; ?>

    </div>

    <p>แสดงข้อมูลลำดับที่ <?php echo $c_num[1]; ?> - 
        <?php
        $last_order = $c_num[1] + $per_page - 1;
        if ($last_order > $num):
            echo $num;
        else:
            echo $last_order;
        endif;
        ?> 
        จากจำนวนนักวิจัยทั้งหมด <?php echo $num; ?> คน</p>
    <nav>
        <ul class="pagination">
            <?php echo $pagination_data; ?>
        </ul>
    </nav>

</div>
