<!-- 
    Name: Ptixiaki Ergasia
    Owner:  Sofronas Konstantinos Sotirios
    AM: 2022201600167
    Email: dit16167@uop.gr
-->
<?php
    //Initialize the session
    session_start();
    if(!isset($_SESSION["log"]) || $_SESSION["log"] !== true)
    {
      header("Location: ../index.php");
      die();
    }
?>

<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Sofronas Konstantinos Sotirios">
    <link rel="shortcut icon" href="../images/fav.png"/>
    <link href="../css/sofron.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <title>Sofron Honey</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-bug"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Διαχείριση</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Αρχική</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Μετρήσεις
            </div>

            <li class="nav-item">
                <a class="nav-link" href="yesterday.php"><i class="fas fa-history"></i>
                    <span>Χθεσινές</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="week.php"><i class="fas fa-calendar-week"></i>
                    <span>Εβδομάδας</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="month.php"><i class="fas fa-calendar-alt"></i>
                    <span>Μηνιαίες</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="search.php"><i class="fas fa-search"></i>
                    <span>Αναζήτηση</span>
                </a>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <a class="navbar-brand" href="index.php"><img src="../images/fav.png" width="30px" height="30px">&nbsp;<font face="Pacifico">Sofron Honey</font></a>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Γειά σου, <?php echo $_SESSION['user']; ?></span>
                                <img class="img-profile rounded-circle"src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../index.php">
                                    <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i> Κεντρική Σελίδα
                                </a>
                                <a class="dropdown-item" href="profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Προφίλ
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Αποσύνδεση
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <?php
                    require '../settings.php';

                    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    $today = date("Y-m-d");
                    $sql = "SELECT * FROM data
                            WHERE YEARWEEK(imerominia,1) = YEARWEEK(NOW())
                            AND user = '".$_SESSION['user']."'
                            ORDER BY imerominia DESC";
                    // debug purpose only
                    // echo $sql;
                    $monday = strtotime('monday this week');
                    $sunday = strtotime('sunday this week');
                    $start = date("d/m/Y",$monday);
                    $last = date("d/m/Y",$sunday);
                    
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Προβολή Εβδομάδας: <strong><?php echo $start . " - " . $last;?></strong></h1>
                        <hr>
                    </div>

                    
                    <div class="row">
                        <div class="col" style="overflow-x:auto;">
                            <?php
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    echo '<table class="table table-striped table-bordered table-hover" style="text-align: center">
                                          <thead class="thead-dark">
                                            <tr>
                                              <th>#</th>
                                              <th>Ημερομηνία</th>
                                              <th>Θερμοκρασία</th>
                                              <th>Υγρασία</th>
                                              <th>Βάρος</th>
                                            <tr>
                                          </thead>
                                          <tbody>
                                            ';
                                    $counter = 1;
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<th scope='row'>".$counter."</th>";
                                            echo "<td>".$row['imerominia']."</td>";
                                            echo "<td>".$row['thermokrasia']."</td>";
                                            echo "<td>".$row['ugrasia']."</td>";
                                            echo "<td>".$row['baros']."</td>";
                                        echo "</tr>";
                                        $counter = $counter + 1;
                                    }
                                    echo "</tbody>
                                          </table>";
                                } else {
                                    echo '
                                        <div class="col-2"></div>
                                        <div class="col-8">
                                            <h1>Δεν υπάρχουν δεδομένα για την τρέχουσα εβδομάδα.</h1>
                                        </div>
                                        <div class="col-2"></div>';
                                }
                            ?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="py-5">
              <hr>
              <div class="text-center">
                <p style="text-align: center">Copyright &copy; 
                  <b><a class="no_a" href="../index.php" target="_blank">Sofron Honey</a></b> 
                  | Designed By: <a class="no_a" href="https://sofronas.github.io/" target="_blank"><b>Sofronas Konstantinos Sotirios</b></a>  
                  2020 - <?php echo date('Y'); ?> | All Rights Reserved.
                </p>
              </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Αποσύνδεση</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Είσαι σίγουρος ότι θέλεις να κάνεις Αποσύνδεση;</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fas fa-times"></i> Ακύρωση</button>
                    <a class="btn btn-primary" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Αποσύνδεση</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script type="text/javascript" src="js/logoutsystem.js"></script>
</body>

</html>