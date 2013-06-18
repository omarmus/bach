<?php $this->load->view('admin/components/header'); ?>
<header id="header" class="navbar navbar-inverse navbar-fixed-top">
    <span class="trigger" id="slide-toggle-bar"><strong style="opacity: 1;"></strong><em></em></span>
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <h1><a class="brand" href="index.html"><span>Bach PHP</span></a></h1>
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
                    <button type="submit" class="btn btn-danger" style="margin-right: -3px;" ><i class="icon-off icon-white"></i></button>
                </form>
            </nav><!--/.nav-collapse -->
        </div>
    </div>
</header><!-- /header -->
<nav id="nav-left">
    <div class="profile">
        <label>Omar</label>
        <img src="" alt="Foto">
        
    </div>
    <div>
       
    </div>
    <div>
        
    </div>
</nav>
<div class="container" id="container-main">
    <?php //$this->load->view($subview); ?>
</div>
<?php $this->load->view('admin/components/footer'); ?>