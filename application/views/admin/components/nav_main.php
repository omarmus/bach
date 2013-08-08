<header class="navbar navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo site_url('admin/dashboard') ?>"><?php echo $site_name ?></a>
        <nav class="nav-collapse collapse">
            <?php echo get_menu($menu); ?>
            <form class="navbar-form form-inline pull-right">
                <input class="form-control" style="display: none; margin-right: 14px;" type="text" placeholder="Search">
                <button type="submit" class="btn btn-inverse hide" ><i class="icon-search icon-white"></i></button>
                <button type="submit" class="btn btn-inverse hide" ><i class="icon-question-sign icon-white"></i></button>
                <a href="<?php echo site_url('logout') ?>" class="btn btn-danger"><i class="icon-off icon-white">Log out</i></a>
            </form>
        </nav><!--/.nav-collapse -->
    </div>
</header><!-- /header -->