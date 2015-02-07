<div class="container">
    <div class="row well">

        <h2 style="text-align: center;"><span class="glyphicon glyphicon-search"></span> Search Researcher</h2>
        <h4 style="text-align: center;">(ค้นหานักวิจัย)</h4>

        <form class="form-horizontal" role="form" method="post" action="">
            <div class="form-group">
                <label> คำค้นหา (keyword) </label>
                <input name="keyword" required
                       value="<?php
                       if (!empty($keyword)):
                           echo $keyword;
                       endif;
                       ?>">    
                <button type="submit">Search</button>
                <p>หมายเหตุ ค้นหาจากชื่อหรือนามสกุล</p>
            </div>
        </form>

        <?php if (isset($query)): ?>
            <h4>Search result</h4>
            <p>คำค้นหา: <strong><?php echo $keyword; ?></strong></p>

            <?php if (empty($query)): ?>
                <strong>ขออภัย ไม่พบข้อมูล</strong>
            <?php else: ?>
                <p>พบทั้งหมด <strong><?php echo $search_num_rows; ?></strong> คน</p>

                <table class="table table-bordered">
                    <tr><th>No.</th><th>Name</th>
                        <?php $i = 0; ?>
                        <?php foreach ($query as $row) : ?>
                            <?php $i++; ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                <a href="<?php echo site_url() . "admin/profile/$row->researcher_id"; ?>">
                                    <?php echo $row->firstname_en . ' ' . $row->lastname_en; ?> 
                                    <?php
                                    if (!empty($row->firstname_th)):
                                        echo ', ' . $row->firstname_th . ' ' . $row->lastname_th;
                                    endif;
                                    ?>
                                </a>
                            </td>                        
                        </tr>

                    <?php endforeach; ?>

                </table>
                
            <?php endif; ?>

        <?php endif; ?>

    </div>
</div>