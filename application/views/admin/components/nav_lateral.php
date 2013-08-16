<nav id="nav-lateral">
    <div class="profile">
        <a href="<?php echo site_url('admin/profile') ?>" class="photo-user" style="<?php echo $userdata['photo'] != "" ? "background-image: url('" . site_url() . 'files/users/thumbnail/'. thumb_image($userdata['photo']) . "'" : '' ?>">
        <?php if ($userdata['photo'] == ""): ?>
            <img src="<?php echo site_url('img/profile.png') ?>" />
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