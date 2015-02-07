
<div class="container">
    <h2>สวัสดีคุณ <?php echo $firstname_en . ' ' . $lastname_en; ?></h2>
    <p>เข้าใช้งานครั้งล่าสุด: <?php echo $recent_login; ?></p>
    <p>เข้าใช้งานครั้งก่อน: 
        <?php
        $origin_last_login = date("Y-m-d H:i:s", strtotime($last_login));
        if ($origin_last_login != '1970-01-01 07:00:00'):
            echo $last_login;
        else:
            echo '-';
        endif;
        ?>
    </p>

    <a class="btn btn-info" href="<?php echo site_url(); ?>profile">Profile</a> &nbsp;
</div> <!-- /.container -->
