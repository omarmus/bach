<nav id="nav-left">
    <div class="profile">
        <a href="<?php echo site_url('admin/profile') ?>" class="photo-user">
        <?php if ($userdata['photo'] != ""): ?>
            <img src="<?php echo site_url('files/users') . '/'.$userdata['photo'] ?>" alt="user image" class="img-responsive" />
        <?php else: ?>
            <img src="<?php echo site_url('img/profile.png') ?>" class="img-responsive" />
        <?php endif ?>
        </a>
    </div>
    <div>
       <a href="<?php echo site_url('admin/dashboard') ?>" id="dashboard" <?php echo $this->uri->segment(2) == 'dashboard' ? 'class="active"' : '' ?>></a>
    </div>
    <div>
        <a href="#" id="settings"></a>
    </div>
</nav>