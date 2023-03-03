<?php  
	require '../settings.php';

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $d = $_GET['day'];
    $sql = "SELECT * FROM data
        WHERE imerominia = '".$d."'
        AND user = '"."sof"."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_row($result);
        echo $row[3];
        echo "<br>";
        echo $row[4];
        echo "<br>";
        echo $row[5];
    } else {
        $row = NULL;
    }

	mysqli_close($conn);

?>