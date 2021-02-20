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
?>

<html lang="en">
    <head>
        <?php include("include/view/css.php"); ?>
        <title>Softex - Products N.V.</title>
    </head>
    <body class="">
        <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand pt-0">
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
                                <img alt="Image placeholder" src="assets/img/theme/perfil.jpg">
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
                        <li class="nav-item active" >
                            <a class="nav-link active" href="index.php"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
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
                            <a class="nav-link " href="profile.php">
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
                    <h5 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Dashboard</h5>
                    <?php include("include/view/topbar.php"); ?>
                </div>
            </nav>
            <!-- End Navbar -->
            <!-- Header -->
            <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
                <div class="container-fluid">
                    <div class="header-body">
                    </div>
                </div>
            </div>
            <div class="container-fluid mt--7">
                <div class="row">
                    <div class="col-xl-8 mb-5 mb-xl-0">
                        <div class="card bg-gradient-default shadow">
                            <div class="card-header bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                        <h2 class="text-white mb-0">Deals Closed</h2>
                                    </div>
                                    <div class="col">
                                        <ul class="nav nav-pills justify-content-end">
                                            <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                                <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                                <span class="d-none d-md-block">Month</span>
                                                <span class="d-md-none">M</span>
                                                </a>
                                            </li>
                                            <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                                                <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                                <span class="d-none d-md-block">Week</span>
                                                <span class="d-md-none">W</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Chart -->
                                <div class="chart">
                                    <!-- Chart wrapper -->
                                    <canvas id="chart-sales" class="chart-canvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card shadow">
                            <div class="card-header bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                        <h2 class="mb-0">Productivity</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Chart -->
                                <div class="chart">
                                    <canvas id="chart-orders" class="chart-canvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pages visit COL -->
                <div class="row mt-5">
                    <div class="col-xl-8 mb-5 mb-xl-0">
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0">Deal Forecast</h3>
                                    </div>
                                    <div class="col text-right">
                                        <a href="#!" class="btn btn-sm btn-primary">See all</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <!-- Projects table -->
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Deal name</th>
                                            <th scope="col">Amounts in Company Currency</th>
                                            <th scope="col">Closed Date</th>
                                            <th scope="col">Deal Owner</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                Deal 01
                                            </th>
                                            <td>
                                                $4,569
                                            </td>
                                            <td>
                                                08/15/2019
                                            </td>
                                            <td>
                                                Chequita Altenberg
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Deal 02
                                            </th>
                                            <td>
                                                $3,985
                                            </td>
                                            <td>
                                                08/20/2019
                                            </td>
                                            <td>
                                                Daniel Dhers
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Deal 03
                                            </th>
                                            <td>
                                                $3,513
                                            </td>
                                            <td>
                                                08/25/2019
                                            </td>
                                            <td>
                                                Jessie Vera
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Deal 04
                                            </th>
                                            <td>
                                                $12,050
                                            </td>
                                            <td>
                                                08/25/2019
                                            </td>
                                            <td>
                                                Jesús Hlal
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Deal 05
                                            </th>
                                            <td>
                                                $21,795
                                            </td>
                                            <td>
                                                08/25/2019
                                            </td>
                                            <td>
                                                Daniel Dhers
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0">Team Activity</h3>
                                    </div>
                                    <div class="col text-right">
                                        <a href="#!" class="btn btn-sm btn-primary">See all</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <!-- Projects table -->
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                Chequita Altenberg
                                            </th>
                                            <td>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-2">60%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Daniel Dhers
                                            </th>
                                            <td>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-2">70%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Jesús Hlal
                                            </th>
                                            <td>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-2">80%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Jessie Vera
                                            </th>
                                            <td>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-2">75%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                Jesús Hlal
                                            </th>
                                            <td>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-2">30%</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                                        </div>
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
                <!-- Footer -->
                <?php include("include/view/footer.php"); ?>
            </div>
        </div>
        <!--   Core   -->
        <script src="./assets/js/plugins/jquery/dist/jquery.min.js"></script>
        <!--   Optional JS   -->
        <script src="./assets/js/plugins/chart.js/dist/Chart.min.js"></script>
        <script src="./assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
        <!--   Argon JS   -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoEO9aw47qzjUTo8rj0osoczNIfopRBwM&callback=initMap"
            async defer></script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnmLO14SOC3-bqk-rF9A79qOehh02MtVY&callback=initMap"></script>
        <?php include("include/view/js.php"); ?>
    </body>
</html>