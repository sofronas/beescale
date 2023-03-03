<?php
	require '../settings.php';
	session_start();

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	 	echo "failed";
	}

	$num = $_POST['d'];
	
	$sql = "SELECT * FROM data
            WHERE imerominia = '".$num."'
            AND user = '".$_SESSION['user']."'";
	$result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result);
        $today_therm = $row[3];
        $today_ygras = $row[4];
        $today_baros = $row[5];
        if (is_null($row)) {
            echo '
                <div class="col-2"></div>
                <div class="col-8">
                    <h1>Δεν υπάρχουν δεδομένα.</h1>
                </div>
                <div class="col-2"></div>';
      
        } else {
            echo '
                <div class="col-md-4" style="width=18rem;">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title" style="text-align:center;"><i class="fas fa-thermometer-three-quarters"></i> Θερμοκρασία</h5>
                        <hr>
                        <h2 class="card-text" style="text-align:center;">' . $today_therm . ' &#8451;</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="width=18rem;">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title" style="text-align:center;"><i class="fas fa-signal"></i> Υγρασία</h5>
                        <hr>
                        <h2 class="card-text" style="text-align:center;">' . $today_ygras . ' %</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" style="width=18rem;">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title" style="text-align:center;"><i class="fas fa-balance-scale-right"></i> Βάρος</h5>
                        <hr>
                        <h2 class="card-text" style="text-align:center;">' . $today_baros . ' &#13199;</h2>
                        </div>
                    </div>
                </div>';
        } 
    } else {
         echo '
            <div class="col-4"></div>
            <div class="col-4">
                <h1>Δεν υπάρχουν δεδομένα.</h1>
            </div>
            <div class="col-4"></div>';
    }
?>