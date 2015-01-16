   
<div class="container">
    <div class="row well">
        <h2> <?php echo $username; ?>'s profile.</h2>        
        <?php
        if (isset($researcher_id)) {
            echo $firstname_en . '<br /><a href="profile/edit">Edit Profile.</a>';
        } else {
            if (isset($no_user)) {
                echo "<h3>$no_user</h3>";
            } else {
                echo 'ยังไม่ได้กรอกข้อมูล<br /><a href="profile/add">Add Profile.</a>';
            }
        }
        ?>
    </div>
</div>