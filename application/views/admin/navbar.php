<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo site_url(); ?>home">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url(); ?>admin/search"><span class="glyphicon glyphicon-search"></span> Search</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url() ?>admin/researcher_list"><span class="glyphicon glyphicon-list"></span> List</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url(); ?>admin/add_researcher"><span class="glyphicon glyphicon-plus"></span> Add researcher</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url(); ?>logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>