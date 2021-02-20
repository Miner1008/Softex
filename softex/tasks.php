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
        <title>Softex - Stock</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
                            </a>
                        </li>
                        <!-- Icons -->
                        <li class="nav-item">
                            <a class="nav-link " href="">
                            <i class="ni ni-pin-3 text-primary"></i> Visit
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="companies.php">
                            <i class="ni ni-building text-primary"></i> Companies
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="deals.php">
                            <i class="ni ni-chart-bar-32 text-primary"></i> Deals
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="">
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
                    <h5 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Stock</h5>
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
                <!-- Table -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <h3 class="mb-0">Products</h3>
                            </div>
                            <div class="table-responsive py-4">
                                <table class="table table-flush" id="datatable-basic">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Item</th>
                                            <th>Item ID</th>
                                            <th>Sheets</th>
                                            <th>Ply</th>
                                            <th>Package</th>
                                            <th>Quantity / Pallet</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Softex Kitchen Towel</td>
                                            <td>- -</td>
                                            <td>80 Hojas/11’’x8’’</td>
                                            <td>2 ply</td>
                                            <td>30 Rollos</td>
                                            <td>- -</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Beginnings Paper Towel</td>
                                            <td>KT3085B01</td>
                                            <td>85 Hojas/11’’x8.8’’</td>
                                            <td>2 ply</td>
                                            <td>30 Rollos</td>
                                            <td>24 Cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Swave Satin Ultra Strong Paper Towel</td>
                                            <td>KT SWAVE SATIN</td>
                                            <td>96 Hojas/11’’x5.5’’</td>
                                            <td>2 ply</td>
                                            <td>30/1</td>
                                            <td>24 Cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Beginnings Super Premium Paper Towel</td>
                                            <td>KT BEG 24/1</td>
                                            <td>135 Hojas/11’’x5.5’’</td>
                                            <td>2 ply</td>
                                            <td>24/1</td>
                                            <td>24 Cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Swave Kitchen Towel</td>
                                            <td> - -</td>
                                            <td>80 sheets/11’’x8.8’’</td>
                                            <td>2 ply</td>
                                            <td> - -</td>
                                            <td> - -</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Softex Kitchen Towel</td>
                                            <td>- -</td>
                                            <td>160 11"x8”</td>
                                            <td>2 ply</td>
                                            <td>- -</td>
                                            <td>30 Cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Servilletas Dispenser</td>
                                            <td>DN 50/200</td>
                                            <td>200 ct/6’’x13’’</td>
                                            <td>1 ply</td>
                                            <td>50/200</td>
                                            <td>30 cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Dinner Napkin</td>
                                            <td>DN 20/150</td>
                                            <td>150 ct/17’’x15’’</td>
                                            <td>1 ply</td>
                                            <td>8/500</td>
                                            <td>30 cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Swave Beverage Napkin</td>
                                            <td>CN P/8/500</td>
                                            <td>500 ct/9.5’’x9.5’’</td>
                                            <td>1 ply</td>
                                            <td>8/500</td>
                                            <td>30 cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Swave LN 300 Servilletas</td>
                                            <td>LN 12/300 Swav</td>
                                            <td>300 ct/11’’x13’’</td>
                                            <td>1 ply</td>
                                            <td>12/300</td>
                                            <td>24 cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Swave 400 Papel Higiénico</td>
                                            <td>TT 12/4 Swa 400sh</td>
                                            <td>400 Hojas/4’’x3.8’’</td>
                                            <td>2 ply</td>
                                            <td>12/4</td>
                                            <td>50 Bultos</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Swave 200 Papel Higiénico</td>
                                            <td>TT 12/4 Swa 200</td>
                                            <td>200 Hojas/4’’x3.8’’</td>
                                            <td>2 ply</td>
                                            <td>12/4</td>
                                            <td>50 Bultos</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Swave Satin 4-pk Mega</td>
                                            <td>BT-SATIN 12/4</td>
                                            <td>310/95 ft. per roll</td>
                                            <td>2 ply</td>
                                            <td>12/4</td>
                                            <td>50 Bultos</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Swave Satin 12-pk Mega</td>
                                            <td>BT-SATIN 12/1</td>
                                            <td>310/95 ft. per roll</td>
                                            <td>2 ply</td>
                                            <td>12/1</td>
                                            <td>200 paquetes</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Jumbo Roll Tissue Institucional</td>
                                            <td>JRT 12/1</td>
                                            <td>3.3” x 1,000 feet</td>
                                            <td>2 ply</td>
                                            <td>12 Roll/Caja</td>
                                            <td>36 Cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>C fold Institucional</td>
                                            <td>CF C 12/200</td>
                                            <td>200 Hojas/12”x10”</td>
                                            <td>1 ply</td>
                                            <td>12 Paquetes</td>
                                            <td>50 Cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>RT 12/350 White</td>
                                            <td>RT 12/350 White-PR</td>
                                            <td>7.87”x350 Feet</td>
                                            <td>1 ply</td>
                                            <td>12 rollos</td>
                                            <td>40 Cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>RT 12/350 Natural</td>
                                            <td>RT 12/350 NAT-PR</td>
                                            <td>7.87”x350 Feet</td>
                                            <td>1 ply</td>
                                            <td>12 rollos</td>
                                            <td>40 Cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>RT 12/600 White</td>
                                            <td>RT 12/600 White-PR</td>
                                            <td>7.87”x600 Feet</td>
                                            <td>1 ply</td>
                                            <td>12 rollos</td>
                                            <td>28 Cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>RT 12/600 Natural</td>
                                            <td>RT 12/600 N-PR</td>
                                            <td>7.87”x600 Feet</td>
                                            <td>1 ply</td>
                                            <td>12 rollos</td>
                                            <td>28 Cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>RT 6/800 White</td>
                                            <td>RT 6/800 W-PR</td>
                                            <td>7.87”x800 Feet</td>
                                            <td>1 ply</td>
                                            <td>16 rollos</td>
                                            <td>40 Cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Softex Kitchen Towel</td>
                                            <td>- -</td>
                                            <td>80 Hojas/11’’x8’’</td>
                                            <td>2 ply</td>
                                            <td>30 rollos</td>
                                            <td>- -</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Beginnings Paper Towel</td>
                                            <td>KT3085B01</td>
                                            <td>85 Hojas/11’’x8.8’’</td>
                                            <td>2 ply</td>
                                            <td>30 rollos</td>
                                            <td>24 Cajas</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>Softex Kitchen Towel</td>
                                            <td>- -</td>
                                            <td>80 Hojas/11’’x8’’</td>
                                            <td>2 ply</td>
                                            <td>30 rollos</td>
                                            <td>- -</td>
                                            <td>0</td>
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
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Add Item
                                </button>
                                <!-- *** Modal New Order *** -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- *** FORM *** -->
                                                <form action="{{ route('deals.new') }}" method="POST">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Item Name</label>
                                                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Napkins Softex">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Item ID</label>
                                                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="KT3085B01">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Sheets</label>
                                                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="80 Hojas/11’’x8’’">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Ply</label>
                                                        <select class="form-control" name="stage" id="exampleFormControlSelect1">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Package</label>
                                                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="12/4 Rollos">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Quantity Pallet</label>
                                                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="30 Cajas">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Quantity (unit)</label>
                                                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="100">
                                                    </div>
                                                </form>
                                                <!-- *** END FORM *** -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Modal-->
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
        <?php include("include/view/js.php"); ?>
    </body>
</html>