<?php
    //created new connection file, i'm having an error within directory so i do this magic
    include($_SERVER['DOCUMENT_ROOT'] . '/traffic_offense/admin/inc/DBConnection.php');

    $top_vehicle = "";

    $vehicle_type = "SELECT vehicle_type, COUNT(*) COUNT FROM offense_list GROUP BY vehicle_type HAVING COUNT > 1 LIMIT 1";
    $result = $conn->query($vehicle_type);

    while($row = mysqli_fetch_assoc($result)) {
        $top_vehicle = $row['vehicle_type'];
    }

    echo json_encode($top_vehicle);
?>