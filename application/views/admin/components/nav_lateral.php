<nav id="nav-lateral">
    <div>
        <a href="<?php echo site_url('admin/profile') ?>" class="photo-user" style="<?php echo $userdata['photo'] != "" ? "background-image: url('" . site_url() . 'files/users/thumbnail/'. thumb_image($userdata['photo']) . "'" : '' ?>">
        <?php if ($userdata['photo'] == ""): ?>
            <img src="<?php echo site_url('img/profile.png') ?>" class="img-responsive" />
        <?php endif ?>
        </a>
    </div>
    <div>
       <a href="<?php echo site_url('admin/dashboard') ?>" <?php echo $title == 'Dashboard' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-home"></a>
    </div>
    <div>
        <a href="<?php echo site_url('admin/setting') ?>" <?php echo $title == 'Settings' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-cog"></a>
    </div>
</nav>