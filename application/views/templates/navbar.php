
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url(); ?>home">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo site_url(); ?>profile"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
                        Profile
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo site_url(); ?>user/setting"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        User Setting
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a style="color: red;" title="ออกจากระบบ" href="<?php echo site_url(); ?>logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                        Logout
                    </a>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
