<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="ThEP Researcher Database Management System, ระบบจัดการฐานข้อมูลนักวิจัย">
        <meta name="author" content="Thailand Center of Excellence in Physics. ศูนย์ความเป็นเลิศด้านฟิสิกส์">
        <link rel="shortcut icon" href="">
        <title><?php echo $title; ?></title>
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
