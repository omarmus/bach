<?php $this->load->view('admin/components/header'); ?>
<body>
    <div class="spinner"></div>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div id="wrap">
        <header id="header" class="navbar navbar-inverse navbar-fixed-top">
            <!-- <span class="trigger" id="slide-toggle-bar"><strong style="opacity: 1;"></strong><em></em></span> -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <h1><a class="brand" href="<?php echo site_url('admin/dashboard') ?>"><span>Bach PHP</span></a></h1>
                    <nav class="nav-collapse collapse">
                        <?php echo get_menu($menu); ?>
                        <form class="navbar-form pull-right">
                            <input class="input-large" style="display: none; margin-right: 14px;" type="text" placeholder="Search">
                            <button type="submit" class="btn btn-inverse" ><i class="icon-search icon-white"></i></button>
                            <button type="submit" class="btn btn-inverse" ><i class="icon-question-sign icon-white"></i></button>
                            <a href="<?php echo site_url('logout') ?>" class="btn btn-danger" style="margin-right: -19px;" ><i class="icon-off icon-white"></i></a>
                        </form>
                    </nav><!--/.nav-collapse -->
                </div>
            </div>
        </header><!-- /header -->
        <nav id="nav-left">
            <div class="profile">
                <a href="<?php echo site_url('admin/profile') ?>">
                    <img src="<?php echo site_url('img/profile.png') ?>" alt="Foto">
                </a>
            </div>
            <div>
               <a href="#" id="dashboard" class="active"></a>
            </div>
            <div>
                <a href="#" id="settings"></a>
            </div>
        </nav>
        <div id="container-main">
            <ul class="breadcrumb">
            <?php if (count($page)) : ?>
                <li><a href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a> <span class="divider">/</span></li>
            <?php endif ?>
                <li class="active"><?php echo $title ?></li>
            </ul>
            <div class="container">
                <section class="row-fluid">
                    <?php $this->load->view($subview); ?>
                </section>
            </div>
        </div>
<?php $this->load->view('admin/components/footer'); ?>