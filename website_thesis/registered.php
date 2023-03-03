<!-- 
    Name: Ptixiaki Ergasia
	Owner:  Sofronas Konstantinos Sotirios
	AM: 2022201600167
	Email: dit16167@uop.gr
-->
<?php
    //Initialize the session
    session_start();
    if (isset($_SESSION['log'])){
      if($_SESSION['log'] == TRUE){
        header("Location: index.php");
      }
    }
?>

<!DOCTYPE html>
<html lang="el">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Sofronas Konstantinos Sotirios">
		<link rel="shortcut icon" href="images/fav.png"/>
		<link href="css/sofron.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

		<title>Thank You! | Sofron Honey</title>
	</head>
	<body>
		<div class="container">
			<!-- Top Logo Container -->
			<div class="container">
				<!-- Logo -->
				<header class="blog-header py-3">
					<div class="row flex-nowrap justify-content-between align-items-center">
						<div class="col">
							<a href="index.php"><img src="images/fav.png" width="90px" class="rounded float-left" alt="Sofron Logo"></a>
						</div>
						<div class="col text-center">
							<h1 class="blog-header-logo text-dark"><font face="Pacifico">Sofron Honey</font></h1>
						</div>
					</div>
					<hr>
				</header>
			</div>
			<!-- Navigation Container -->
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
				  <div class="container-fluid">
				    <a class="navbar-brand" href="index.php"><img src="images/fav.png" width="30px" height="30px">&nbsp;Sofron Honey</a>
				    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				      <span class="navbar-toggler-icon"></span>
				    </button>
				    <div class="collapse navbar-collapse" id="navbarSupportedContent">
				      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
				        <li class="nav-item">
				          <a class="nav-link" aria-current="page" href="index.php"><i class="fas fa-home"></i> Αρχική</a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link" aria-current="page" href="info.php"><i class="fas fa-info"></i> Πληροφορίες</a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link" aria-current="page" href="contact.php"><i class="fas fa-phone-volume"></i> Επικοινωνία</a>
				        </li>
				    </div>
				  </div>
				</nav>
			</div>
			<br>
			<?php
				require 'settings.php';

                $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                $user = $_GET['username'];
                $sql = "SELECT * FROM users
                        WHERE username = '" . $user . "'";
                $result = mysqli_query($conn, $sql);
			?>
			<!-- Body Container -->
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="jumbotron text-center">
						  <h3>Σας ευχαριστούμε για την εγγραφή σας!</h3>
						  <?php
							  $row = mysqli_fetch_array($result);
							  if ($row) {
		                            echo '<table class="table table-striped table-bordered table-hover" style="text-align: center">
		                                  <thead class="thead-dark">
		                                    <tr>
		                                      <th>#</th>
		                                      <th>Username</th>
		                                      <th>Τηλέφωνο</th>
		                                      <th>Όνομα</th>
		                                      <th>Επώνυμο</th>
		                                      <th>Email</th>
		                                    <tr>
		                                  </thead>
		                                  <tbody>
		                                    ';
		                            echo "<tr>";
		                                echo "<th scope='row'>".$row['id']."</th>";
		                                echo "<td>".$row['username']."</td>";
		                                echo "<td>".$row['phone']."</td>";
		                                echo "<td>".$row['name']."</td>";
		                                echo "<td>".$row['surname']."</td>";
		                                echo "<td>".$row['email']."</td>";
		                            echo "</tr>
		                            	</tbody>
		                              </table>";


									$subject = 'Εγγραφή στο site: Sofron Honey';

									$headers = "From: sofronas.konstantinos@gmail.com" . "\r\n";
									$headers .= "Reply-To: sofronas.konstantinos@gmail.com" . "\r\n";
									$headers .= "MIME-Version: 1.0\r\n";
									$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
									$message = '<table style="text-align: center">
		                                  <thead>
		                                    <tr>
		                                      <th>id</th>
		                                      <th>Username</th>
		                                      <th>Password</th>
		                                      <th>Τηλέφωνο</th>
		                                      <th>Όνομα</th>
		                                      <th>Επώνυμο</th>
		                                      <th>Email</th>
		                                    <tr>
		                                  </thead>
		                                  <tbody>
		                                    ';
		                            $message .= "<tr><th scope='row'>".$row['id']."</th>";
		                            $message .= "<td>".$row['username']."</td>";
		                            $message .= "<td>".$row['password']."</td>";
		                            $message .= "<td>".$row['phone']."</td>";
		                            $message .= "<td>".$row['name']."</td>";
		                            $message .= "<td>".$row['surname']."</td>";
		                            $message .= "<td>".$row['email']."</td>";
		                            $message .= "</tr>
		                            	</tbody>
		                              </table>";
									// $message = '<p><strong>This is strong text</strong> while this is not.</p>';


									mail($row['email'], $subject, $message, $headers);
	                          }
                          ?>              
						  <div class="row">
						  	<div class="col"></div>
						  	<div class="col-lg-6"><hr></div>
						  	<div class="col"></div>
						  </div>
						</div>
					</div>
				</div>
				
				<br>
			</div>
			<!-- Footer Container -->
			<div class="container">
                <footer class="py-5">
                	<hr>
                    <div class="text-center">
                        <p style="text-align: center">Copyright &copy; 
                            <b><a class="no_a" href="index.php" target="_blank">Sofron Honey</a></b> 
                            | Designed By: <a class="no_a" href="https://sofronas.github.io/" target="_blank"><b>Sofronas Konstantinos Sotirios</b></a>  
                            2020 - <?php echo date('Y'); ?> | All Rights Reserved.
                        </p>
                        <button class="btn btn-success rounded" onclick="topFunction()" id="gotopbutton" title="Πηγαίνε με στην αρχή"><i class="fas fa-arrow-circle-up"></i></button>
                    </div>
                </footer>
			</div>
		</div>
		<!-- Javascirpt Session -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="js/gotop.js"></script>

        <script type="text/javascript">
        	$(document).ready(function () {
			    window.setTimeout(function () {
			        location.replace("index.php");
			    }, 5000);
			});
        </script>
	</body>
</html>
