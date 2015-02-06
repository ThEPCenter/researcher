
<div class="container">
    <h2>สวัสดีคุณ <?php echo $firstname_en . ' ' . $lastname_en; ?></h2>
    <p>เข้าใช้งานครั้งล่าสุด: <?php echo $recent_login; ?></p>
    <p>เข้าใช้งานครั้งก่อน: <?php echo $last_login; ?></p>

    <a class="btn btn-info" href="<?php echo site_url(); ?>profile">Profile</a> &nbsp;
</div> <!-- /.container -->
