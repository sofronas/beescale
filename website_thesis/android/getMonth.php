<?php  
    require '../settings.php';

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $current_year = date("Y");
    
    $sql = "SELECT * FROM data
            WHERE MONTH(imerominia) = ". $_GET['m'] .
            " AND YEAR(imerominia) =". $current_year . " AND user='" . "sof" ."'
                            ORDER BY imerominia DESC";

    $monday = strtotime('monday this week');
    $sunday = strtotime('sunday this week');
    $start = date("d/m/Y",$monday);
    $last = date("d/m/Y",$sunday);

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<table>
              <tbody>
                ';
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>".$row['imerominia']."</td>";
                echo "<td>".$row['thermokrasia']."</td>";
                echo "<td>".$row['ugrasia']."</td>";
                echo "<td>".$row['baros']."</td>";
            echo "</tr>";
        }
        echo "</tbody>
              </table>";
    }
	mysqli_close($conn);

?>