<?php
	require '../settings.php';
	session_start();

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	 	echo "failed";
	}

	$num = $_POST['m'];
	$current_year = date("Y");
	
	$sql = "SELECT * FROM data
	 		WHERE MONTH(imerominia) = ". $num .
	 		" AND YEAR(imerominia) =". $current_year . " AND user='" . $_SESSION['user'] ."'
                            ORDER BY imerominia DESC";
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
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1>Δεν υπάρχουν δεδομένα για τον επιλεγμένο μήνα.</h1>
            </div>
            <div class="col-md-2"></div>';
    }
?>