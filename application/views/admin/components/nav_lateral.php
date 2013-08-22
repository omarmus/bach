<nav id="nav-lateral">
    <?php if (isset($permisions_['profile']) && $permisions_['profile']['READ'] == "YES"): ?>
    <div>
        <a href="<?php echo site_url('admin/profile') ?>" class="photo-user" style="<?php echo $userdata_['photo'] != "" ? "background-image: url('" . site_url() . 'files/users/thumbnail/'. thumb_image($userdata_['photo']) . "'" : '' ?>">
        <?php if ($userdata_['photo'] == ""): ?>
            <img src="<?php echo site_url('img/profile.png') ?>" class="img-responsive" />
        <?php endif ?>
        </a>
    </div> 
    <?php endif ?>
    <div>
       <a href="<?php echo site_url('admin/dashboard') ?>" <?php echo $title_ == 'Dashboard' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-home"></a>
    </div>  
    <?php if (isset($permisions_['setting']) && $permisions_['setting']['READ'] == "YES"): ?>
    <div>
        <a href="<?php echo site_url('admin/setting') ?>" <?php echo $title_ == 'Settings' ? 'class="active"' : '' ?>><span class="glyphicon glyphicon-cog"></a>
    </div>    
    <?php endif ?>
</nav>