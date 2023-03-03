<!-- 
    Name: Ptixiaki Ergasia
	Owner:  Sofronas Konstantinos Sotirios
	AM: 2022201600167
	Email: dit16167@uop.gr
-->
<?php
    //Initialize the session
    session_start();
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
                        <?php
			                // Check if the user is logged in, if not then show page unloged
			                if(!isset($_SESSION["log"]) || $_SESSION["log"] !== true)
			                {
			                    echo '<div class="col">
                                    <div class="row" id="buttonsTopRight">
                                        <div class="col d-flex justify-content-end">
                                            <a type="button" class="btn btn-outline-dark rounded" href="login.php">Login <i class="fas fa-sign-in-alt"></i></a>
                                        </div>
                                        <div class="col d-flex justify-content-end">
                                            <a type="button" class="btn btn-outline-dark rounded" href="register.php">Sign In <i class="fas fa-pencil-alt"></i></a>
                                        </div>
                                    </div>
                                </div>';
			                }
			                elseif($_SESSION['log'] == TRUE)
			                {
			                	echo '<div class="col" style="text-align:right">
                                    		<div class="dropdown show">
									  			<a class="btn btn-outline-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
									   				 '. '<i class="fas fa-user-alt"></i>&nbsp;Γειά σου, '. $_SESSION["user"] .' <span class="caret"></span>
									  			</a>

											  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
											    <a class="dropdown-item" href="managment/index.php"><i class="fas fa-tasks"></i>&nbsp;Διαχείριση</a>
											    <a class="dropdown-item" href="managment/profile.php"><i class="far fa-id-card"></i>&nbsp;Προφίλ</a>
											    <div class="dropdown-divider"></div>
											    <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Αποσύνδεση</a>
											  </div>
											</div>
									</div>
			                	';
			                }
			                else{
			                    echo "Something fucked them all...";
			                }
		                ?>
						
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
			<!-- Body Container -->
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="jumbotron text-center">
						  <h1 class="display-3">Σας ευχαριστούμε!</h1>
						  <p class="lead"><strong>Θα σας απαντήσουμε όσο πιο σύντομα γίνεται στο email!</strong></p>
						  <div class="row">
						  	<div class="col"></div>
						  	<div class="col-lg-6"><hr></div>
						  	<div class="col"></div>
						  </div>
						  
						  <p class="lead">
						    <a class="btn btn-primary" href="index.php" role="button"><i class="fas fa-home"></i> Συνέχεια στην Αρχική</a>
						  </p>
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

        <!-- Cookies -->
	    <script type="text/javascript" id="cookieinfo" src="//cookieinfoscript.com/js/cookieinfo.min.js" data-bg="#645862" data-fg="#FFFFFF" 
	    data-message="Χρησιμοποιούμε cookies για να βελτιώσουμε την εμπειρία σας. Συνεχίζοντας να επισκέπτεστε αυτόν τον ιστότοπο, αποδέχεστε τη χρήση των cookies. " data-linkmsg="Περισσότερες Πληροφορίες" data-link="#F1D600" data-cookie="CookieInfoScript" data-text-align="left" data-close-text="Εντάξει!"></script>
	    <script type="text/javascript" src="js/logoutsystem.js"></script>
	</body>
</html>
