<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="">
        <title>Edit Picture</title>
        <!-- Bootstrap core CSS -->
        <?php echo link_tag('bootstrap/css/bootstrap.css', 'stylesheet', 'text/css'); ?>

        <?php echo link_tag('bootstrap/css/bootstrap-theme.css', 'stylesheet', 'text/css'); ?>
        <?php echo link_tag('jquery-ui/jquery-ui.css', 'stylesheet', 'text/css'); ?>
        <?php echo link_tag('style.css', 'stylesheet', 'text/css'); ?>

        <script src="<?php echo base_url(); ?>jquery.js"></script>
        <script src="<?php echo base_url(); ?>jquery-ui/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>script.js"></script> 
        <script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
    </head>

    <body>

        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">                    
                    <a class="navbar-brand" href="<?php echo site_url(); ?>home">Home</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo site_url(); ?>profile">Profile</a></li>
                    </ul>            
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo site_url(); ?>logout">Logout</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container">

            <h3>- คุณสามารถเปลี่ยนรูปโดย upload รูปจากคอมพิวเตอร์ได้โดยตรง</h3>

            <p>&nbsp;</p>

            <div style="color: red;"><?php echo $error; ?></div>
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?php echo site_url(); ?>upload/do_upload">
                <input type="file" name="userfile" required style="border: solid 1px #aaa;">
                <p class="help-block">**ควร ใช้รูปแนวตั้ง และ มีความกว้าง (width) ไม่เกิน 600 พิกเซล (pixel), ความสูง (height) ไม่เกิน 800 พิกเซล และขนาดไฟล์ไม่เกิน 400 kB
                    <br>**ไฟล์ภาพต้องมีสกุลเป็น jpg, png หรือ gif เท่านั้น
                    <br>**จำกัดการ upload ไฟล์ ไม่เกิน 5 ไฟล์ต่อท่าน หากต้องการ upload ไฟล์เพิ่มเติมกรุณาติตต่อผู้ดูแลระบบ
                </p>

                <a href="<?php echo site_url(); ?>profile#basic" class="btn btn-default">Cancel</a> &nbsp;
                <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
            </form>

            <hr>        

            <h3>หรือ</h3>
            <h3>- เปลี่ยนรูปโดยกรอกที่อยู่ของไฟล์รูป (picture's url) ในอินเทอร์เน็ต</h3>
            <form method="post" action="<?php echo site_url(); ?>profile/edit_pic_url">

                <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">

                <div class="form-group">
                    <label>Picture's url:</label>
                    <input type="text" class="form-control" name="pic_url" id="pic_url" required value="<?php echo $pic_url; ?>" placeholder="เช่น http://www.example.com/pic.jpg">                
                </div>                                       
                <div class="form-group">
                    <label>Picture sample:</label>
                    <div id="show-pic">
                        <img src="<?php echo $pic_url; ?>" >
                    </div>
                </div> 
                <script>
                    $(function () {
                        $("#pic_url").blur(function () {
                            var pic_url = $("#pic_url").val();
                            $("#show-pic").html("<img src=\"" + pic_url + "\" style=\"max-width: 100%; height: auto;\">");
                        });

                    });
                </script>

                <a href="<?php echo site_url(); ?>profile#basic" class="btn btn-default">Cancel</a> &nbsp;
                <button type="submit" class="btn btn-primary">Save change</button>
            </form>

            <p>&nbsp;</p>
        </div> <!-- /.container -->
