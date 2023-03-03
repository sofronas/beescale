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
    <link rel="shortcut icon" href="../images/fav.png"/>
    <link href="../css/sofron.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>Sofron Honey</title>
  </head>
  <body>
    <div class="container">
      <!-- Top Logo Container -->
      <div class="container">
        <!-- Logo -->
        <header class="blog-header py-3">
          <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col">
              <a href="../index.php"><img src="../images/fav.png" width="90px" class="rounded float-left" alt="Sofron Logo"></a>
            </div>
            <div class="col text-center">
              <h1 class="blog-header-logo text-dark"><font face="Pacifico">Sofron Honey</font></h1>
            </div>
            <?php
              // Check if the user is logged in, if not then show page unloged
              if(!isset($_SESSION["log"]) || $_SESSION["log"] !== true)
              {
                  header("Location: ../index.php");
                  die();
              }
              elseif($_SESSION['log'] == TRUE)
              {
                echo '<div class="col" style="text-align:right">
                                <div class="dropdown show">
                  <a class="btn btn-outline-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                     '. '<i class="fas fa-user-alt"></i>&nbsp;Γειά σου, '. $_SESSION["user"] .' <span class="caret"></span>
                  </a>
              
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="index.php"><i class="fas fa-tasks"></i>&nbsp;Διαχείριση</a>
                  <a class="dropdown-item" href="profile.php"><i class="far fa-id-card"></i>&nbsp;Προφίλ</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Αποσύνδεση</a>
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
            <a class="navbar-brand" href="../index.php"><img src="../images/fav.png" width="30px" height="30px">&nbsp;Sofron Honey</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../index.php"><i class="fas fa-home"></i> Αρχική</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../info.php"><i class="fas fa-info"></i> Πληροφορίες</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../contact.php"><i class="fas fa-phone-volume"></i> Επικοινωνία</a>
              </li>
            </div>
          </div>
        </nav>
      </div>
      <br>
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a style="text-decoration: none;" href="../index.php">Αρχική</a></li>
            <li class="breadcrumb-item active" aria-current="page">Προφίλ Χρήστη</li>
          </ol>
          <hr>
        </nav>
        <div class="main-body">
          <div class="row">
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../images/fav.png" alt="Admin" class="rounded-circle p-1 bg-danger" width="110">
                    <div class="mt-3">
                      <h4><?php echo $_SESSION['name'] . ' ' .$_SESSION['surname']; ?></h4>
                      <p class="text-secondary mb-1">Bee Keeper</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <form name="profile_form" id="profile_form" method="post">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Username</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <input type="text" name="username" id="profile_username" class="form-control" value="<?php echo $_SESSION['username']; ?>" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Όνομα</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <input type="text" name="name" id="profile_name" class="form-control" value="<?php echo $_SESSION['name']; ?>" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Επώνυμο</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <input type="text" name="surname" id="profile_surname" class="form-control" value="<?php echo $_SESSION['surname']; ?>" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Κινητό</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <input type="text" name="phone" id="profile_phone" class="form-control" value="<?php echo $_SESSION['phone']; ?>" maxlength="10" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <input type="email" name="email" id="profile_email" class="form-control" value="<?php echo $_SESSION['email']; ?>" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                    <div class="row">
                      <div class="col-sm-3"></div>
                      <div class="col-sm-9 text-secondary">
                        <a class="btn btn-primary" id="liveToastBtn" type="button" onclick="updateProfile();">Αποθήκευση Αλλαγών <i class="fas fa-save"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
      <!-- Footer Container -->
      <div class="container">
        <footer class="py-5">
          <hr>
          <div class="text-center">
            <p style="text-align: center">Copyright &copy; 
              <b><a class="no_a" href="../index.php" target="_blank">Sofron Honey</a></b> 
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
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
    <script src="../js/gotop.js"></script>

    <!-- AJAX -->
    <script type="text/javascript">
      function updateProfile(event) {
        var http = new XMLHttpRequest();
        var url = 'update_profile.php';
        var username = document.getElementById('profile_username').value;
        var name = document.getElementById('profile_name').value;
        var surname = document.getElementById('profile_surname').value;
        var phone = document.getElementById('profile_phone').value;
        var email = document.getElementById('profile_email').value;

        var params = 'username=' + username + '&name=' + name + '&surname=' + surname + '&phone=' + phone + '&email=' + email;
        var link = url + "?" + params;
        http.open('GET', link, false);

        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {
            if(http.readyState == 4 && http.status == 200) {
              // alert(http.responseText);
                if(http.responseText == "username"){
                  // open modal of username and prevent
                  $('#username_error').modal('show');
                } else if(http.responseText == "phone"){
                  // open modal of phone
                  $('#phone_error').modal('show');
                } else if(http.responseText == "email"){
                  //open modal of email
                  $('#email_error').modal('show');
                } else {
                  $('#success').modal('show');
                }
            }
        }
        http.send(null);
      }
    </script>
    <script type="text/javascript" src="js/logoutsystem.js"></script>

    <div class="modal fade" id="email_error" tabindex="-1" role="dialog" aria-labelledby="email_error" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="text-align: center;">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ΠΡΟΣΟΧΗ <i class="fas fa-exclamation-triangle"></i></h5>
          </div>
          <div class="modal-body">
            <h3>Το email χρησιμοποείται από άλλο χρήστη.</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Κλείσιμο</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="phone_error" tabindex="-1" role="dialog" aria-labelledby="phone_error" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="text-align: center;">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ΠΡΟΣΟΧΗ <i class="fas fa-exclamation-triangle"></i></h5>
          </div>
          <div class="modal-body">
            <h3>Το τηλέφωνο χρησιμοποείται από άλλο χρήστη.</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Κλείσιμο</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="username_error" tabindex="-1" role="dialog" aria-labelledby="username_error" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="text-align: center;">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ΠΡΟΣΟΧΗ <i class="fas fa-exclamation-triangle"></i></h5>
          </div>
          <div class="modal-body">
            <h3>Το όνομα χρήστη χρησιμοποείται ήδη από άλλο χρήστη.</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Κλείσιμο</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="success" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="text-align: center;">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ΕΠΙΤΥΧΙΑ <i class="fas fa-check-circle"></i></h5>
          </div>
          <div class="modal-body">
            <h3>Οι αλλαγές πραγματοποιήθηκαν με επιτυχία.</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.reload();">Κλείσιμο</button>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
