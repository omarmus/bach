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
                    <h1><a class="brand" href="<?php echo site_url('admin/user/login') ?>"><span>Bach PHP</span></a></h1>
                    <nav class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Nav header</li>
                                    <li><a href="#">Separated link</a></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>
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
                <a href="#">
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
                <li><a href="#">Dashboard</a> <span class="divider">/</span></li>
                <li><a href="#">Library</a> <span class="divider">/</span></li>
                <li class="active">Data</li>
            </ul>
            <div class="container">
                <?php $error = $this->session->flashdata('error'); ?>
                <?php if ($error): ?>
                <div class="msg msg-alert"><?php echo $error ?></div>   
                <?php endif ?>
                <?php $success = $this->session->flashdata('success'); ?>
                <?php if ($success): ?>
                <div class="msg msg-success"><?php echo $success ?></div>   
                <?php endif ?>
                <?php $this->load->view($subview); ?>
            </div>
        </div>
<?php $this->load->view('admin/components/footer'); ?>