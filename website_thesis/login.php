<!-- 
  Name: Ptixiaki Ergasia
  Owner:  Sofronas Konstantinos Sotirios
  AM: 2022201600167
  Email: dit16167@uop.gr
  -->
<?php 
    session_start();
    if (isset($_SESSION['log'])){
      if($_SESSION['log'] == TRUE){
        header("Location: index.php");
      }
    }
?>
<html lang="el">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Sofronas Konstantinos Sotirios">
    <link rel="shortcut icon" href="images/fav.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sofron.css">
    <title>Login | Sofron Honey</title>
  </head>
  <body>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col"><a href="index.php"><img src="images/fav.png" alt="Logo" width="90px"></a></div>
          <div class="col align-items-center">
            <h1 style="text-align:right;"><font face="Pacifico">Sofron Honey</font></h1>
          </div>
        </div>
      </div>

      <div class="container">
        <hr>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="images/hexagons.png" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6 contents">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="mb-4">
                  <h3>Φόρμα Εισόδου</h3>
                  <p class="mb-4">Στοιχεία σύνδεσης:</p>
                </div>
                <form method="post" name="login_form" id="login_form">
                    <div class="form-group first">
                      <label for="username">Όνομα χρήστη</label>
                      <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group last mb-4">
                      <label for="password">Κωδικός πρόσβασης</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="d-flex mb-5 align-items-center">
                      <label class="control control--checkbox mb-0">
                        <span class="caption">Να με θυμάσαι</span>
                        <input type="checkbox" checked="checked"/>
                        <div class="control__indicator"></div>
                      </label>
                    </div>
                    <input type="button" onclick="checkUser();" value="Είσοδος" class="btn btn-block btn-warning">
                    <p class="text-center text-muted mt-5">Δεν έχετε λογαριασμό? <a href="register.php" class="fw-bold text-body"><u>Κάντε εγγραφή!</u></a></p>
                    <p class="text-center text-muted mt-5">Ξεχάσατε τον κωδικό σας? <a href="forget.php" class="fw-bold text-body"><u>Πατήστε εδώ</u></a></p>
                    <br>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer Container -->
      <div class="container">
        <hr>
        <footer class="py-5">
          <div class="container">
            <div class="text-center">
              <p style="text-align: center">Copyright &copy; 
                <b><a href="index.php" target="_blank">Sofron Honey</a></b> 
                | Designed By: <a href="https://sofronas.github.io/" target="_blank">Sofronas Konstantinos Sotirios</a>  
                2020 - <?php echo date('Y'); ?> | All Rights Reserved.
              </p>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <!-- Javascript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script type="text/javascript">
      function checkUser(){
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var final_url = "getinfo.php";
        var final_link = final_url + '?username=' + username + '&password=' + password;

        var url = "check_login.php";
        var link = url + '?username=' + username + '&password=' + password;


        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function() { 
          if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
          {
            // alert(xmlHttp.responseText);
            if(xmlHttp.responseText == "1"){
              window.location.replace(final_link);
            } else {
              $('#wrong').modal('show');
            }
          }
        }
        // alert(link);
        xmlHttp.open("GET", link, false); // true for asynchronous 
        xmlHttp.send(null);

      }
    </script>

    <!-- Modal section -->

    <div class="modal fade" id="wrong" tabindex="-1" role="dialog" aria-labelledby="wrong" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="text-align: center;">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ΠΡΟΣΟΧΗ <i class="fas fa-exclamation-triangle"></i></h5>
          </div>
          <div class="modal-body">
            <h3>Ελέξτε τα στοιχεία που δώσατε.</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Κλείσιμο</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
