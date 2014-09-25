<div class="container">
    <div class="row well">
        <h2>สวัสดีคุณ <?php echo $username; ?></h2>
        <p>เข้าใช้งานครั้งล่าสุด: <?php echo $recent_login; ?></p>
        <p>เข้าใช้งานครั้งก่อน: <?php echo $last_login; ?></p>
        <ul>
            <li><a href="<?php echo site_url(); ?>/admin/search"><span class="glyphicon glyphicon-search"></span> Search Researcher</a></li>
            <li><a href="<?php echo site_url(); ?>/admin/researcher_list"><span class="glyphicon glyphicon-list"></span> Researcher List</a></li>
            <li><a href="<?php echo site_url(); ?>/admin/add_researcher"><span class="glyphicon glyphicon-plus"></span> Add Researcher</a>
        </ul>
    </div>
</div>