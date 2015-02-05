<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="">
        <title>Upload Success - please confirm</title>
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
            <h3>Your file was successfully uploaded!</h3>

            <ul>
                <?php foreach ($upload_data as $item => $value): ?>
                    <li><?php echo $item; ?>: <?php echo $value; ?></li>
                <?php endforeach; ?>
            </ul>

            <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>

            <p>&nbsp;</p>

            <p><strong>File name: </strong><?php echo $upload_data['file_name']; ?></p>
            <p>&nbsp;</p>
            <?php $new_pic_url = base_url() . 'picture_upload/' . $upload_data['file_name']; ?>
            <img src="<?php echo $new_pic_url; ?>">
            <p>&nbsp;</p>

            <form method="post" action="<?php echo site_url(); ?>profile/edit_pic_url">
                <input type="hidden" name="researcher_id" value="<?php echo $researcher_id; ?>">
                <input type="hidden" name="pic_url" value="<?php echo $new_pic_url; ?>">
                <a href="<?php echo site_url(); ?>profile#basic" type="button" class="btn btn-default">Cancel</a> &nbsp;
                <button type="submit" class="btn btn-primary">Save change</button>
            </form>

        </div>

    </body>
</html>