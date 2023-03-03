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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sofron.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Register | Sofron Honey</title>

    <style type="text/css">
      .vs_ks{
        visibility: hidden;
      }
    </style>
  </head>
  <body style="background-color: #eee;">
      <section class="vh-100" >
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
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
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Εγγραφή Χρήστη</p>
                    <form class="row g-3 needs-validation" novalidate method="post" id="form_register" name="form_register">
                      <div class="col-md-12">
                        <label for="name" class="form-label">Όνομα</label>
                        <input type="text" class="form-control" id="name_id" value="" required>
                        <div class="invalid-feedback vs_ks" id="name_id_error">
                            Συμπλήρωσε το όνομα
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label for="surname" class="form-label">Επώνυμο</label>
                        <input type="text" class="form-control" id="surname_id" value="" required>
                        <div class="invalid-feedback vs_ks" id="surname_id_error">
                            Συμπλήρωσε το επώνυμο
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group has-validation">
                          <input type="text" class="form-control" id="username_id" required>
                          <div class="invalid-feedback vs_ks" id="username_id_error">
                            Διάλεξε όνομα χρήστη
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text">@</span>
                          <input type="text" class="form-control" id="email_id" required>
                          <div class="invalid-feedback vs_ks" id="email_id_error">
                            Συμπλήρωσε το email
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label for="password" class="form-label">Κωδικός Πρόσβασης</label>
                        <input type="password" class="form-control" id="password_id" required>
                        <input class="form-check-input" type="checkbox" onclick="togglerPass()">
                        Προβολή Κωδικού
                        <div class="invalid-feedback vs_ks" id="password_id_error">
                          Συμπλήρωσε κωδικό
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label for="phone" class="form-label">Κινητό</label>
                        <input type="text" class="form-control" id="phone_id" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        <div class="invalid-feedback vs_ks" id="phone_id_error">
                          Συμπλήρωσε το κινητό
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label" for="invalidCheck">
                            Συμφωνώ <a href="#" data-toggle="modal" data-target="#terms">με τους όρους χρήσης.</a> 
                          </label>
                          <div class="invalid-feedback vs_ks" id="terms_id_error">
                            Πρέπει να συμφωνήσεις πρώτα με τους όρους χρήσης.
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-warning" type="button" id="form_submit" onclick="Validate();">Εγγραφή <i class="fas fa-signature"></i></button>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                    <!-- <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image"> -->
                    <img src="images/hexagons.png" alt="Image" class="img-fluid">

                  </div>
                </div>
                <div class="container">
                <hr>
              </div>
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
          </div>
        </div>
      </div>
    </section>

    <!-- Javascript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Modal Terms Section -->
    <div id="terms" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Όροι Χρήσης</h4>
          </div>
          <div class="modal-body">
            <p>Ο παρών ιστοχώρος αναγνωρίζει και σέβεται το δικαίωμα προστασίας των προσωπικών δεδομένων των χρηστών του διαδικτύου, σύμφωνα με τον Ευρωπαϊκό Κανονισμό 2016/679.Το παρόν κείμενο πολιτικής περιγράφει τη συλλογή και επεξεργασία δεδομένων των χρηστών κατά την επίσκεψη ή χρήση των παρεχόμενων υπηρεσιών του Ιστοχώρου μας. Με την επίσκεψη και πλοήγησή σας στον ιστοχώρο μας, αποδέχεστε τους όρους που περιγράφονται στην πολιτική αυτή.
            <br>
            Ο επισκέπτης του Ιστοχώρου μας ή/και χρήστης των υπηρεσιών μας οφείλει να διαβάσει προσεκτικά τους όρους και τις προϋποθέσεις προστασίας των προσωπικών του πληροφοριών που αναφέρονται εδώ. Ενδέχεται να προβούμε σε τροποποίηση των όρων προστασίας των προσωπικών σας δεδομένων. Για αυτό παρακαλούμε, να ελέγχετε τακτικά τους εν λόγω όρους για τυχόν αλλαγές, καθ’ όσον με την επίσκεψή σας αποδέχεστε τους παρόντες όρους και τις τροποποιήσεις τους.
            <br>
            Τι είναι δεδομένα προσωπικού χαρακτήρα
            <br>
            Σύμφωνα με τον νόμο, είναι κάθε πληροφορία που αφορά ταυτοποιημένο ή ταυτοποιήσιμο φυσικό πρόσωπο («υποκείμενο των δεδομένων»), όπως είναι ονοματεπώνυμο, ηλεκτρονική διεύθυνση, ΑΦΜ κ.ά. Ως ταυτοποιήσιμο ορίζεται το φυσικό πρόσωπο εκείνο του οποίου η ταυτότητα μπορεί να εξακριβωθεί, άμεσα ή έμμεσα, ιδίως μέσω αναφοράς σε αναγνωριστικό στοιχείο ταυτότητας, όπως όνομα, σε αριθμό ταυτότητας, σε δεδομένα θέσης, σε επιγραμμικό αναγνωριστικό ταυτότητας (διεύθυνση ΙΡ, e-mail κλπ.) ή σε έναν ή περισσότερους παράγοντες που προσιδιάζουν στη σωματική, φυσιολογική, γενετική, ψυχολογική, οικονομική, πολιτιστική ή κοινωνική ταυτότητά του.
            <br>
            Τι είναι επεξεργασία προσωπικών δεδομένων
            <br>
            Επεξεργασία δεδομένων προσωπικού χαρακτήρα είναι κάθε πράξη ή σειρά πράξεων που πραγματοποιείται με ή χωρίς τη χρήση αυτοματοποιημένων μέσων, σε δεδομένα προσωπικού χαρακτήρα, όπως η συλλογή, καταχώρηση, οργάνωση, διάρθρωση, αποθήκευση, προσαρμογή, μεταβολή, ανάκτηση, αναζήτηση πληροφοριών, χρήση, διαβίβαση σε τρίτους, διάδοση, συσχέτιση, συνδυασμός, περιορισμός, διαγραφή και καταστροφή προσωπικών δεδομένων.
            <br>
            Ποια προσωπικά δεδομένα συλλέγουμε και για ποιο σκοπό
            <br>
            Κατά την επίσκεψη και πλοήγηση στον Ιστοχώρο μας συλλέγουμε τα παρακάτω προσωπικά δεδομένα:
            <br>
            α) δεδομένα πλοήγησης
            <br>
            Ο ιστοχώρος μας συγκεντρώνει στοιχεία αναγνώρισης των χρηστών του χρησιμοποιώντας τεχνολογίες, όπως τα cookies ή/και την παρακολούθηση διευθύνσεων Πρωτοκόλλου Internet (IP). Τα cookies είναι μικρά αρχεία κειμένου που αποθηκεύονται στο σκληρό δίσκο κάθε επισκέπτη/ χρήστη και δεν λαμβάνουν γνώση οποιουδήποτε εγγράφου ή αρχείου από τον υπολογιστή του. Επιπλέον, συλλέγονται αυτόματα πληροφορίες σχετικά με τις τοποθεσίες που επισκέπτεται ο επισκέπτης και σχετικά με τους συνδέσμους σε ιστοχώρους τρίτων που ενδέχεται να επιλέξει ο χρήστης. Η επεξεργασία των παραπάνω δεδομένων γίνεται με σκοπό να σας παρέχουμε απρόσκοπτη πρόσβαση στις πληροφορίες του Ιστοχώρου μας.
            <br>
            β) Φόρμα επικοινωνίας

            Εφόσον χρησιμοποιείτε τη φόρμα επικοινωνίας μας για να επικοινωνήσετε με τον ιστοχώρο μας, συλλέγουμε το όνομά σας, τη διεύθυνση ηλεκτρονικής αλληλογραφίας σας και το τηλέφωνό σας με τη συγκατάθεσή σας, ώστε να επικοινωνήσουμε μαζί σας.
            <br>
            Νόμιμη βάση επεξεργασίας των προσωπικών δεδομένων
            <br>
            H νόμιμη βάση επεξεργασίας των προσωπικών δεδομένων είναι η συγκατάθεση κατά την επίσκεψη της ιστοσελίδας μας.
            <br>
            Αποδέκτες των δεδομένων
            <br>
            Τα προσωπικά δεδομένα των επισκεπτών ή/και χρηστών των υπηρεσιών του Ιστοχώρου μας δεν διαβιβάζονται σε τρίτους αποδέκτες, με εξαίρεση την περίπτωση όπου παρέχετε τη συγκατάθεσή σας για το σκοπό αυτό ή για τη θεμελίωση, άσκηση ή υποστήριξη νομικών αξιώσεων ή εάν αυτό είναι απαραίτητο για τη συμμόρφωση με έννομη υποχρέωσή μας.
            <br>
            Χρόνος διατήρησης των δεδομένων
            <br>
            Τα προσωπικά δεδομένα που αφορούν τους επισκέπτες του Ιστοχώρου ή/και χρήστες των ηλεκτρονικών μας υπηρεσιών συλλέγονται και διατηρούνται για τον απολύτως απαραίτητο χρόνο και μετά διαγράφονται.
            <br>
            Cookies
            <br>
            Κατά την πλοήγηση στον παρόντα ιστότοπο, όπως προαναφέρθηκε, ενδέχεται να συγκεντρώνονται στοιχεία αναγνώρισης των χρηστών με τη χρήση cookies. Η χρήση των cookies διευκολύνει τον ιστοχώρο μας να αποθηκεύει πληροφορίες σχετικά με την επίσκεψη του χρήστη, την ασφαλή αναζήτηση, τον υπολογισμό του αριθμού των επισκεπτών ή τη διευκόλυνση της εγγραφής στις  υπηρεσίες μας.
            <br>
            Μπορείτε να διαγράψετε τα cookies, αν το επιλέξετε. Σχετικά δείτε εδώ: www.aboutcookies.org   Μπορείτε να διαγράψετε όλα τα cookies που βρίσκονται ήδη στον υπολογιστή σας, όπως και να ρυθμίσετε τους περισσότερους browsers, ώστε που να μην επιτρέπουν την εγκατάσταση cookies. Ωστόσο, εάν επιλέξετε να διαγράψετε ή να καταργήσετε ορισμένα cookies, ενδέχεται να επηρεαστεί η λειτουργία του ιστοχώρου μας.
            <br>

            Ασφάλεια δεδομένων
            <br>
            Για την προστασία των προσωπικών δεδομένων των χρηστών και επισκεπτών του Ιστοχώρου μας χρησιμοποιούμε ασφαλή σύνδεση και μέτρα ασφαλείας δεδομένων για την αποτροπή του κινδύνου απώλειας, κακής χρήσης, μη εξουσιοδοτημένης πρόσβασης και κοινοποίησης των προσωπικών σας πληροφοριών.
            <br>
            Τα δικαιώματα σας
            <br>
            Όσον αφορά την προστασία των δεδομένων προσωπικού χαρακτήρα που σας αφορούν, έχετε τα εξής δικαιώματα:
            α) δικαίωμα πρόσβασης, δηλ. το δικαίωμα να πληροφορηθείτε εάν προσωπικά δεδομένα που σας αφορούν υφίστανται επεξεργασία,
            β) δικαίωμα διόρθωσης, δηλ. το δικαίωμα να απαιτήσετε τη διόρθωση ανακριβών δεδομένων προσωπικού χαρακτήρα,
            γ) δικαίωμα διαγραφής, δηλ. το δικαίωμα να ζητήσετε να διαγραφούν τα προσωπικά δεδομένα που σας αφορούν,
            δ) δικαίωμα περιορισμού της επεξεργασίας όταν η ακρίβεια των δεδομένων αμφισβητείται, είναι παράνομη ή για άλλους λόγους
            ε) δικαίωμα φορητότητας, δηλ. το δικαίωμα να ζητήσετε να λάβετε τα δεδομένα που σας αφορούν σε δομημένο, κοινώς χρησιμοποιούμενο και αναγνώσιμο από μηχανήματα μορφότυπο, καθώς και να διαβιβασθούν τα εν λόγω δεδομένα σε άλλον υπεύθυνο επεξεργασίας και
            στ) δικαίωμα εναντίωσης στην επεξεργασία των προσωπικών δεδομένων σας, εκτός αν υφίστανται επιτακτικοί και νόμιμοι λόγοι για την επεξεργασία οι οποίοι υπερισχύουν των συμφερόντων, των δικαιωμάτων και των ελευθεριών σας.</p>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      function togglerPass(){
        var t = document.getElementById('password_id').type;
        if(t === "password") {
          document.getElementById('password_id').type = "text";
        }
        if(t === "text"){
          document.getElementById('password_id').type = "password";
        }
      }
      function Validate(){
          var email = document.getElementById('email_id').value;
          var username = document.getElementById('username_id').value;
          var phone = document.getElementById('phone_id').value;
          var name = document.getElementById('name_id').value;
          var surname = document.getElementById('surname_id').value;
          var password = document.getElementById('password_id').value;
          var terms = document.getElementById('invalidCheck').checked;

          var email_error = document.getElementById('email_id_error');
          var username_error = document.getElementById('username_id_error');
          var phone_error = document.getElementById('phone_id_error');
          var name_error = document.getElementById('name_id_error');
          var surname_error = document.getElementById('surname_id_error');
          var password_error = document.getElementById('password_id_error');
          var terms_error = document.getElementById('terms_id_error');

          var ins = true;

          if(email == ""){
            //empty email
            email_error.style.visibility = "visible";
            ins = false;
          }
          if(username == ""){
            //empty username
            username_error.style.visibility = "visible";
            ins = false;
          }
          if(phone == ""){
            //empty phone
            phone_error.style.visibility = "visible";
            ins = false;
          }
          if(name == ""){
            //empty name
            name_error.style.visibility = "visible";
            ins = false;
          }
          if(surname == ""){
            //empty surname
            surname_error.style.visibility = "visible";
            ins = false;
          }
          if(password == ""){
            //empty password
            password_error.style.visibility = "visible";
            ins = false;
          }
          if(terms == false){
            //empty terms
            terms_error.style.visibility = "visible";
            ins = false;
          }
          var okay = false;
          if(ins == true){
            // call insertion fuction
            okay = checkUserData(email,phone,username);
            if(okay == true){
              var k = insertNewUser(email,phone,username,name,surname,password);
              // happend error
              // alert("k= " + k);
              if(k == false){
                $('#data_error').modal('show');    
              } else if(typeof(k) === 'undefined') {
                $('#data_error').modal('show');
              } else if(k == true) {
                var url = "registered.php";
                var link = url + "?username=" + username;
                window.location.replace(link);
              }
            } else {
              $('#data_exists').modal('show');
            }
          } else {
            $('#data_error').modal('show');
          }
      }
      function checkUserData(email,phone,username){
        var http = new XMLHttpRequest();
        var val;
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              if(http.responseText >= 1){
                val = false;
              } else {
                // alert("checkUserData= true");
                val = true;
              }
            }
        };
        http.open("POST", "checkuser.php", false);  
        http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        http.send("username=" + username + "&phone=" + phone + "&email=" + email);
        return val;
      }
      function insertNewUser(email,phone,username,name,surname,password){
        var http = new XMLHttpRequest();
        var x;
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              // alert(http.responseText);
              if(http.responseText == "email_exists"){
                x = false;
              } else if(http.responseText == "phone_exists"){
                x = false;
              }else if(http.responseText == "username_exists"){
                x = false;
              } else {
                x = true;
              }
            }
        };
        http.open("POST", "insertuser.php", false);  
        http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        http.send("username=" + username + "&phone=" + phone + "&email=" + email + "&name=" + name + "&surname=" + surname + "&password=" + password);
        return x;
      }
    </script>


    <!-- Modal section -->

    <div class="modal fade" id="data_error" tabindex="-1" role="dialog" aria-labelledby="data_error" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="text-align: center;">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ΠΡΟΣΟΧΗ <i class="fas fa-exclamation-triangle"></i></h5>
          </div>
          <div class="modal-body">
            <h3>Δεν έχουν συμπληρωθεί όλα τα στοιχεία.</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Κλείσιμο</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="data_exists" tabindex="-1" role="dialog" aria-labelledby="data_exists" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" style="text-align: center;">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ΠΡΟΣΟΧΗ <i class="fas fa-exclamation-triangle"></i></h5>
          </div>
          <div class="modal-body">
            <h3>Τα στοιχεία που δήλωσες υπάρχουν ήδη.</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Κλείσιμο</button>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
