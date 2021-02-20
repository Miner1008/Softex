<?php
session_start();
if(!isset($_SESSION["id"])){
    header("Location:login.php");
}

require("include/core/connection.php");
require("include/core/function.php");
$query = "SELECT * FROM users WHERE id = '".$_SESSION["id"]."'";
$profile_result = mysqli_query($mysql, $query);
$profile = mysqli_fetch_assoc($profile_result);

if ($profile['avatar'] != NULL) {
    $avatar_path = $profile['avatar'];
}

if (isset($_POST['update'])) {
    if ($_POST['password']/* == $_POST['repeatPassword']*/) {

        $completed_avatar = false;

        $query = "SELECT id FROM users WHERE name = '".$_POST['name']."'";
        $select_user_result = mysqli_query($mysql, $query);
        $selectUser = mysqli_fetch_assoc($select_user_result);
        if ($_FILES['avatar']['name'] != NULL) {

            $avatar_path = $mysql->real_escape_string('assets/img/avatar/'.$_FILES['avatar']['name']);
            if (preg_match("!image!", $_FILES['avatar']['type'])) {

                if (copy($_FILES['avatar']['tmp_name'], $avatar_path)) {
                    $completed_avatar = true;
                }
            }
        }

        if ($completed_avatar == false) {
           // $avatar_path = "";
        }

        $data = array(
            'name'=> $_POST['name'],
            'email'=> $_POST['email'],
            'password'=> $_POST['password'],
            'nationality'=> $_POST['nationality'],
            'address'=> $_POST['address'],
            'birthday'=> $_POST['birthday'],
            'hobby'=> $_POST['talent'],
            'avatar'=> $avatar_path,
            'description'=> $_POST['description'],
            'level'=> $_POST['position'],
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $query = Update('users', $data, "WHERE id = '".$_SESSION["id"]."'");
        header("Location:profile.php");


    }
}
?>

<script type="text/javascript">
    var img_src = "<?php echo $profile['avatar'];?>";
</script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("include/view/css.php"); ?>
        <title>Softex - Profile</title>
    </head>
    <body class="">
        <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand pt-0" href="index.php">
                <img src="assets/img/brand/Logo1.png" class="navbar-brand-img" alt="...">
                </a>
                <!-- User -->
                <ul class="nav align-items-center d-md-none">
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-bell-55"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="<?php echo $profile['avatar'];?>">
                                </span>
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
                            <a href="profile.php" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Settings</span>
                            </a>
                            <a href="profile.php" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Activity</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="logout.php" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Collapse header -->
                    <div class="navbar-collapse-header d-md-none">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="index.php">
                                <img src="./assets/img/brand/Logo1.png">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Form -->
                    <form class="mt-4 mb-3 d-md-none">
                        <div class="input-group input-group-rounded input-group-merge">
                            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fa fa-search"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " href="index.php"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
                            </a>
                        </li>
                        <!-- Icons -->
                        <li class="nav-item">
                            <a class="nav-link " href="">
                            <i class="ni ni-pin-3 text-primary"></i> Visit
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="companies.php">
                            <i class="ni ni-building text-primary"></i> Companies
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="deals.php">
                            <i class="ni ni-chart-bar-32 text-primary"></i> Deals
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="stock.php">
                            <i class="ni ni-box-2 text-primary"></i> Stock
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="tasks.php">
                            <i class="ni ni-bullet-list-67 text-primary"></i> Tasks
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="fullcalendar.php">
                            <i class="ni ni-calendar-grid-58 text-primary"></i> Calendar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="maps.php">
                            <i class="ni ni-square-pin text-primary"></i> Maps & Routes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="profile.php">
                            <i class="ni ni-single-02 text-primary"></i> User Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="main-content">
            <!-- Navbar -->
            <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
                <div class="container-fluid">
                    <!-- Brand -->
                    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="index.php">User Profile</a>
                    <?php include("include/view/topbar.php"); ?>
                </div>
            </nav>
            <!-- End Navbar -->
            <!-- Header -->
            <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(assets/img/theme/back.jpeg); background-size: cover; background-position: center top;">
                <!-- Mask -->
                <span class="mask bg-gradient-default opacity-8"></span>
                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center">
                    <div class="row">
                        <div class="col-lg-7 col-md-10">
                            <h1 class="display-2 text-white"><?php echo "Hello " .$profile['name'];?></h1>
                            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
                            <!--<a href="#!" class="btn btn-info">Edit profile</a>-->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Edit profile
                            </button>
                            <!-- *** Modal New Order *** -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- *** FORM *** -->
                                            <form class="edit_profile" id="edit_profile" method="post" enctype="multipart/form-data">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-3 order-lg-2">
                                                        <div class="card-profile-image"><!--alex-->
                                                            <input type="file" id="avatar" name="avatar" accept="image/*" onchange="showLogo()" hidden>
                                                            <img id="avatar_image" name="avatar_image" class="rounded-circle" src="<?php echo $avatar_path;?>" alt>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 pt-md-4">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="card-profile-stats d-flex justify-content-center mt-md-5"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Name</label>
                                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $profile['name'];?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Birthday</label>
                                                    <input type="date" name="birthday" id="birthday" min="1000-01-01" max="3000-12-31" class="form-control" value="<?php echo $profile['birthday'];?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputAmount">Nationality</label>
                                                    <input type="text" class="form-control" name="nationality" id="nationality" value="<?php echo $profile['nationality'];?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $profile['email'];?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-user" id="password" name="password" value="<?php echo $profile['password'];?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Job position</label>
                                                    <select class="form-control" name="position" id="position" value="<?php echo $profile['level'];?>" required>
                                                        <option>Administrator</option>/*alex will add data from database*/
                                                        <option>Manager</option>
                                                        <option>Producter</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Address</label>
                                                    <input type="text" class="form-control" name="address" id="address" value="<?php echo $profile['address'];?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Talent</label>
                                                    <input type="text" class="form-control" name="talent" id="talent" value="<?php echo $profile['hobby'];?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Description</label>
                                                    <input type="text" class="form-control" name="description" id="description" value="<?php echo $profile['description'];?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="btn_close_modal" class="btn btn-secondary">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="update" id="update">Save</button>
                                                </div>
                                            </form>
                                            <!-- *** END FORM *** -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Modal-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page content -->
            <div class="container-fluid mt--7">
                <div class="row">
                    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                        <div class="card card-profile shadow">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 order-lg-2">
                                    <div class="card-profile-image">
                                        <a href="#">
                                        <img src="<?php echo $avatar_path;?>" class="rounded-circle">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                                    <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                                </div>
                            </div>
                            <div class="card-body pt-0 pt-md-4">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                            <div>
                                                <span class="heading">22</span>
                                                <span class="description">Tasks Completed</span>
                                            </div>
                                            <div>
                                                <span class="heading">10</span>
                                                <span class="description">Contact Assigned</span>
                                            </div>
                                            <div>
                                                <span class="heading">89</span>
                                                <span class="description">Tasks Worked</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h3>
                                        <?php echo $profile['name'];?><span class="font-weight-light">, <?php echo get_user_age($profile['birthday']); ?></span>
                                    </h3>
                                    <div class="h5 font-weight-300">
                                        <i class="ni location_pin mr-2"></i>San German, Puerto Rico
                                    </div>
                                    <div class="h5 mt-4">
                                        <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Softex Officer
                                    </div>
                                    <div>
                                        <i class="ni education_hat mr-2"></i>University of Computer Science
                                    </div>
                                    <hr class="my-4" />
                                    <p>Lorem ipsum sit amet, consectetur adipiscing elit. Morbi at interdum ipsum, in tincidunt.</p>
                                    <a href="#">Show more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 order-xl-1">
                        <div class="card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Overview</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <h6 class="heading-small text-muted mb-4"><i class="ni ni-chart-bar-32"></i> My Deasl</h6>
                                    <!-- DARK TABLE DEALS -->
                                    <div class="row mt-5">
                                        <div class="col">
                                            <div class="card bg-default shadow">
                                                <div class="table-responsive">
                                                    <table class="table align-items-center table-dark table-flush">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="media align-items-center">
                                                                        <a href="#" class="avatar rounded-circle mr-3">
                                                                        <img alt="" src="assets/img/theme/deal1.png">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <span class="mb-0 text-sm">Deal 1</span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    $2,500 USD
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-dot mr-4">
                                                                    <i class="bg-success"></i> Completed
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <div class="avatar-group">
                                                                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-placement="right" data-original-title="Jessica Doe">
                                                                        <img alt="Image placeholder" src="assets/img/theme/team-2-800x800.jpg" class="rounded-circle">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="mr-2">100%</span>
                                                                        <div>
                                                                            <div class="progress">
                                                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="media align-items-center">
                                                                        <a href="#" class="avatar rounded-circle mr-3">
                                                                        <img alt="" src="assets/img/theme/deal1.png">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <span class="mb-0 text-sm">Deal 2</span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    $1,800 USD
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-dot">
                                                                    <i class="bg-success"></i> Completed
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <div class="avatar-group">
                                                                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-placement="right" data-original-title="Ryan Tompson">
                                                                        <img alt="Image placeholder" src="assets/img/theme/team-1-800x800.jpg" class="rounded-circle">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="mr-2">100%</span>
                                                                        <div>
                                                                            <div class="progress">
                                                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="media align-items-center">
                                                                        <a href="#" class="avatar rounded-circle mr-3">
                                                                        <img alt="" src="assets/img/theme/deal1.png">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <span class="mb-0 text-sm">Deal 3</span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    $3,150 USD
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-dot mr-4">
                                                                    <i class="bg-danger"></i> delayed
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <div class="avatar-group">
                                                                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-placement="right" data-original-title="Alexander Smith">
                                                                        <img alt="Image placeholder" src="assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="mr-2">80%</span>
                                                                        <div>
                                                                            <div class="progress">
                                                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="media align-items-center">
                                                                        <a href="#" class="avatar rounded-circle mr-3">
                                                                        <img alt="" src="assets/img/theme/deal1.png">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <span class="mb-0 text-sm">Deal 4</span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    $4,400 USD
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-dot">
                                                                    <i class="bg-info"></i> on schedule
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <div class="avatar-group">
                                                                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-placement="right" data-original-title="Jessica Doe">
                                                                        <img alt="Image placeholder" src="assets/img/theme/team-4-800x800.jpg">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="mr-2">90%</span>
                                                                        <div>
                                                                            <div class="progress">
                                                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="media align-items-center">
                                                                        <a href="#" class="avatar rounded-circle mr-3">
                                                                        <img alt="" src="assets/img/theme/deal1.png">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <span class="mb-0 text-sm">Deal 5</span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    $2,200 USD
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-dot mr-4">
                                                                    <i class="bg-success"></i> completed
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <div class="avatar-group">
                                                                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-placement="right" data-original-title="Alexander Smith">
                                                                        <img alt="Image placeholder" src="assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="mr-2">100%</span>
                                                                        <div>
                                                                            <div class="progress">
                                                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <!-- Address -->
                                    <h6 class="heading-small text-muted mb-4"><i class="ni ni-bullet-list-67"></i> My Tasks</h6>
                                    <div class="pl-lg-4">
                                        <!-- TASKS -->
                                        <div class="col-lg-12 col-md-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                <input type="checkbox" name="optionsCheckboxes" checked=""><span class="checkbox-material"><span class="check"></span></span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td style="align=left">Task 01</td>
                                                                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                                                                        <!-- TASKS 
                                                                            <td class="td-actions text-right">
                                                                              <button type="button" rel="tooltip" title="" class="btn btn-primary btn-simple btn-xs" data-original-title="Edit Task">
                                                                                <i class="material-icons">edit</i>
                                                                              </button>
                                                                              <button type="button" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Remove">
                                                                                <i class="material-icons">close</i>
                                                                              </button>
                                                                            </td>-->
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                <input type="checkbox" name="optionsCheckboxes" checked=""><span class="checkbox-material"><span class="check"></span></span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td>Tasks 02</td>
                                                                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                <input type="checkbox" name="optionsCheckboxes" checked=""><span class="checkbox-material"><span class="check"></span></span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td>Tasks 03</td>
                                                                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                <input type="checkbox" name="optionsCheckboxes" checked=""><span class="checkbox-material"><span class="check"></span></span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td>Tasks 04</td>
                                                                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="checkbox">
                                                                                <label>
                                                                                <input type="checkbox" name="optionsCheckboxes" checked=""><span class="checkbox-material"><span class="check"></span></span>
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td>Tasks 05</td>
                                                                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                                                                        <th></th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane" id="messages">
                                                        </div>
                                                        <div class="tab-pane" id="settings">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- FIN DE TASKS -->
                                    </div>
                                    <hr class="my-4" />
                                    <!-- Description -->
                                    <h6 class="heading-small text-muted mb-4"><i class="ni ni-pin-3 "></i>My Routes</h6>
                                    <!-- TABLA DE RUTAS -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="card shadow">
                                                <div class="table-responsive">
                                                    <table class="table align-items-center table-flush">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">Routes</th>
                                                                <th scope="col">Start Date</th>
                                                                <th scope="col">Route Stage</th>
                                                                <th scope="col">Clouse Date</th>
                                                                <th scope="col">Observations</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-body">
                                                                            <span class="mb-0 text-sm">Route 01</span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    SEP 25, 2019
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-dot mr-4">
                                                                    <i class="bg-warning"></i> pending
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    - - - - -
                                                                </td>
                                                                <td></td>
                                                                <td class="text-right">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-body">
                                                                            <span class="mb-0 text-sm">Route 02</span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    SEP 25, 2019
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-dot">
                                                                    <i class="bg-success"></i> completed
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    SEP 26, 2019
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-body">
                                                                            <span class="mb-0 text-sm">Route 03</span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    SEP 25, 2019
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-dot mr-4">
                                                                    <i class="bg-danger"></i> delayed
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    - - - - -
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-body">
                                                                            <span class="mb-0 text-sm">Route 04</span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    SEP 25, 2019
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-dot">
                                                                    <i class="bg-info"></i> on schedule
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    - - - - -
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="media align-items-center">
                                                                        <div class="media-body">
                                                                            <span class="mb-0 text-sm">Route 05</span>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                                <td>
                                                                    SEP 25, 2019
                                                                </td>
                                                                <td>
                                                                    <span class="badge badge-dot mr-4">
                                                                    <i class="bg-success"></i> completed
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    SEP 25, 2019
                                                                </td>
                                                                <td>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="fas fa-ellipsis-v"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                            <a class="dropdown-item" href="#">Action</a>
                                                                            <a class="dropdown-item" href="#">Another action</a>
                                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-footer py-4">
                                                    <nav aria-label="...">
                                                        <ul class="pagination justify-content-end mb-0">
                                                            <li class="page-item disabled">
                                                                <a class="page-link" href="#" tabindex="-1">
                                                                <i class="fas fa-angle-left"></i>
                                                                <span class="sr-only">Previous</span>
                                                                </a>
                                                            </li>
                                                            <li class="page-item active">
                                                                <a class="page-link" href="#">1</a>
                                                            </li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#">
                                                                <i class="fas fa-angle-right"></i>
                                                                <span class="sr-only">Next</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <?php include("include/view/footer.php"); ?>
            </div>
        </div>
        <!--   Core   -->
        <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
        <script src="js/app/profile.js"></script>
        <?php include("include/view/js.php"); ?>
    </body>
</html>