<?php $this->load->view('admin/components/header'); ?>
<body>
    <div class="spinner"></div>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <div id="wrap">
        <?php $this->load->view('admin/components/nav_main'); ?>
        <?php $this->load->view('admin/components/nav_lateral'); ?>
        <div class="container">
            <ul class="breadcrumb">
            <?php if (count($page)) : ?>
                <li><a href="<?php echo site_url('admin/dashboard') ?>">Dashboard</a> <span class="divider">/</span></li>
            <?php endif ?>
                <li class="active"><?php echo $title ?></li>
            </ul>
            <?php $this->load->view($subview); ?>
        </div>
    <?php $this->load->view('admin/components/footer'); ?>