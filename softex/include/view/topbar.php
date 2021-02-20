<!-- Form -->
<?php
    $avatar_path = $profile['avatar'];
    if ($avatar_path == NULL) {
        $avatar_path = "assets/img/theme/default.png";
    }
?>

<form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
    <div class="form-group mb-0">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Search" type="text">
        </div>
    </div>
</form>
<!-- User -->
<ul class="navbar-nav align-items-center d-none d-md-flex">
    <li class="nav-item dropdown">
        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="<?php echo $avatar_path;?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $profile['name'];?></span>
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="profile.php" class="dropdown-item">
            <i class="ni ni-single-02"></i>
            <span>My profile</span>
            </a>
            <a href="logout.php" class="dropdown-item">
            <i class="ni ni-user-run"></i>
            <span>Logout</span>
            </a>
        </div>
    </li>
</ul>