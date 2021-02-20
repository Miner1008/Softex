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

if (isset($_POST['create'])) {
    $data = array(
        'name'=> $_POST['name'],
        'product'=> $_POST['product'],
        'amount'=> $_POST['amount'],            
        'status'=> $_POST['status'],
        'employee'=> $_POST['employee'],
        'start_date'=> $_POST['start_date'],
        'requester'=> $_POST['associate'],
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    );
    $query = Insert('deals', $data);
    header("Location:deals.php");
}
else
{
    $query_userlist = "SELECT * FROM users ORDER BY id DESC";
    $result_userlist = mysqli_query($mysql, $query_userlist);

    $query_productlist = "SELECT * FROM products ORDER BY id DESC";
    $result_productlist = mysqli_query($mysql, $query_productlist);

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    
    $no_of_records_per_page = 5;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM deals";
    $result = mysqli_query($mysql,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    $sql = "SELECT * FROM deals LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($mysql,$sql);
}

?>

<html lang="en">
    <head>
        <?php include("include/view/css.php"); ?>
        <title>Softex - Deals</title>
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
                            <a href="#!" class="dropdown-item">
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
                            <a class="nav-link " href="companies.php">
                            <i class="ni ni-building text-primary"></i> Companies
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="deals.php">
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
                    <h5 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">Deals</h5>
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
                                <h3 class="mb-0">Deals</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Deal Name</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Deal Stage</th>
                                            <th scope="col">Employee</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">Observations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; while($deal = mysqli_fetch_array($res_data)) { ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="assets/img/brand/icontasks.jpg">
                                                    </a>
                                                    <div class="media-body">
                                                        <span class="mb-0 text-sm"><?php  echo $deal['name'];?></span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td>
                                                <?php  echo "$". $deal['amount'] ." USD";?>
                                            </td>
                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                <i class="<?php echo get_status_led($deal['status']); ?>"></i> 
                                                <?php echo $deal['status'];?>
                                                </span>
                                            </td>
                                            <td>
                                                <div class="avatar-group">
                                                    <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="<?php echo $deal['employee']; ?>">
                                                    <img alt="Image placeholder" src="<?php echo get_avatar_path($deal['employee']); ?>" class="rounded-circle">
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <?php  echo $deal['start_date'];?>
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
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer py-4">
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="<?php if($pageno <= 1){ echo 'page-item disabled';}else{echo 'page-item active';} ?>">
                                            <a class="page-link" href="<?php if($pageno<=1){echo '#';}else{ echo "?pageno=".($pageno-1); } ?>" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <?php $i = 1; while($i <= $total_pages) { ?>
                                        <li class="<?php if($pageno == $i){ echo 'page-item active';}else{echo 'page-item';} ?>">
                                            <a class="page-link" href="<?php echo "?pageno=".$i;?>"><?php echo $i;?></a>
                                        </li>
                                        <?php $i++; } ?>
                                        <li class="<?php if($pageno >= $total_pages){ echo 'page-item disabled';}else{echo 'page-item active';} ?>">
                                            <a class="page-link" href="<?php if($pageno >= $total_pages){echo '#';}else{ echo "?pageno=".($pageno+1); } ?>">
                                            <i class="fas fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    New Order
                                    </button>
                                    <!-- *** Modal New Order *** -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">New Order</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- *** FORM *** -->
                                                    <form class="new_deal" method="POST">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Order Name</label>
                                                            <input type="text" class="form-control" name="name" id="name" placeholder="Curacao Market" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Product</label>
                                                            <select class="form-control" name="product" id="product" required>
                                                                <?php $i = 0; while($reg_product = mysqli_fetch_array($result_productlist)) { ?>
                                                                <option><?php  echo $reg_product['name'];?></option>
                                                                <?php $i++; } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputAmount">Amount $</label>
                                                            <input type="text" class="form-control" name="amount" id="amount" aria-label="Dollar amount (with dot and two decimal places)" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Status</label>
                                                            <select class="form-control" name="status" id="status" required>
                                                                <option>pending</option>
                                                                <option>completed</option>
                                                                <option>delayed</option>
                                                                <option>on schedule</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Employee</label>
                                                            <select class="form-control" name="employee" id="employee" required>
                                                                <?php $i = 0; while($reg_user = mysqli_fetch_array($result_userlist)) { ?>
                                                                <option><?php  echo $reg_user['name'];?></option>
                                                                <?php $i++; } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Start Date</label>
                                                            <input type="date" name="start_date" id="start_date" min="1000-01-01" max="3000-12-31" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Requested by:</label>
                                                            <input type="text" class="form-control" name="associate" id="associate" placeholder="Jorge Ruiz - CEO" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary" name="create" id="create">Create Order</button>
                                                        </div>
                                                    </form>
                                                    <!-- *** END FORM *** -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal-->
                                </nav>
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