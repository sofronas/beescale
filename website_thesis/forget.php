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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <title>Register | Sofron Honey</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body style="background-color: #eee; margin-top: 100px;">
      <div class="container" style="background-color: white;border-top-left-radius: 20px;border-top-right-radius: 20px;">
          <div class="row">
              <div class="col"><a href="index.php"><img src="images/fav.png" alt="Logo" width="90px"></a></div>
              <div class="col align-items-center">
                <h1 style="text-align:right;"><font face="Pacifico">Sofron Honey</font></h1>
              </div>
          </div>
          <br>
          <div class="row">
            <hr>
          </div>
      </div>
      <div class="container" style="background-color: white;">
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <form method="post" id="forgotForm" name="forgotForm" style="text-align: center;" onSubmit="return false;">
              <h2>Ξέχασες τον κωδικό πρόσβασης?</h2>
              <br>
              <p>Συμπλήρωσε το email που έκανες εγγραφή στην πλατφόρμα.</p>
              <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-mail-bulk"></i></span>
                <input type="email" class="form-control" name="femail" id="femail" aria-label="Email" aria-describedby="addon-wrapping" required>
              </div>
              <br>
              <br>
              <a class="btn btn-warning" type="button" onclick="reset();">Επαναφορά κωδικού πρόσβασης <i class="fas fa-fingerprint"></i></a>
              <br>
              <p class="text-center text-muted mt-5">Επιστροφή στην <a href="index.php" class="fw-bold text-body"><u>Αρχική</u></a></p>
            </form>
          </div>
          <div class="col-lg-3"></div>
        </div>
      </div>
      <div class="container" style="background-color: white;border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;">
        <div class="row">
          <hr>
            <footer>
                  <div class="text-center">
                    <p style="text-align: center">Copyright &copy; 
                      <b><a href="index.php" target="_blank">Sofron Honey</a></b> 
                      | Designed By: <a href="https://sofronas.github.io/" target="_blank">Sofronas Konstantinos Sotirios</a>  
                      2020 - <?php echo date('Y'); ?> | All Rights Reserved.
                    </p>
                  </div>
              </footer>
        </div>
      </div>



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script type="text/javascript">
        function reset(){
          var email = document.getElementById("femail").value;
          var good = true;
          if(email == ""){
            $('#noemail').modal('show');
            good = false;
          }
          var x = email.indexOf('@');
          if (x == -1)
          {
            $('#noat').modal('show');
            good = false;
          }
          if(good == true){
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() { 
              if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
              {
                // alert(xmlHttp.responseText);
                if(xmlHttp.responseText == "1"){
                  // Email found on db and redirect after some time
                  $('#emailsuccess').modal('show');
                } else if(xmlHttp.responseText == "0") {
                  // Email not found please try again pop up
                  $('#emailfailed').modal('show');
                  // alert(xmlHttp.responseText);
                }
              }
            }
            var url = "searchemail.php";
            var link = url + "?email=" + email;
            // alert(link);
            xmlHttp.open("GET", link, false); // true for asynchronous 
            xmlHttp.send(null);
          }
        }
      </script>

      <!-- Modal section -->

      <div class="modal fade" id="noemail" tabindex="-1" role="dialog" aria-labelledby="noemail" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="text-align: center;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">ΠΡΟΣΟΧΗ <i class="fas fa-exclamation-triangle"></i></h5>
            </div>
            <div class="modal-body">
              <h3>Δεν έχει συμπληρωθεί το email.</h3>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Κλείσιμο</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="noat" tabindex="-1" role="dialog" aria-labelledby="noat" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="text-align: center;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">ΠΡΟΣΟΧΗ <i class="fas fa-exclamation-triangle"></i></h5>
            </div>
            <div class="modal-body">
              <h3>Δεν είναι σωστό το email.</h3>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Κλείσιμο</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="emailsuccess" tabindex="-1" role="dialog" aria-labelledby="emailsuccess" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="text-align: center;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">ΕΠΙΤΥΧΙΑ <i class="fas fa-check-circle"></i></h5>
            </div>
            <div class="modal-body">
              <h3>Ο κωδικός πρόσβασης στάλθηκε στο email σας.</h3>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.replace('index.php');">Κλείσιμο</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="emailfailed" tabindex="-1" role="dialog" aria-labelledby="emailfailed" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="text-align: center;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">ΑΠΟΤΥΧΙΑ <i class="fas fa-check-circle"></i></h5>
            </div>
            <div class="modal-body">
              <h3>Λάθος email.</h3>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Κλείσιμο</button>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>