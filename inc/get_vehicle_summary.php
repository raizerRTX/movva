<?php
    //created new connection file, i'm having an error within directory so i do this magic
    include($_SERVER['DOCUMENT_ROOT'] . '/traffic_offense/admin/inc/DBConnection.php');

    $vehicle = array();
    $year = $_POST['year'];
    $vehicle_count = array();
    $vehicle_color = array();

    if ($year == "all") {
        $vehicle_type = "SELECT ol.vehicle_type, COUNT(*) COUNT, vc.color FROM offense_list AS ol
        LEFT JOIN vehicle_color vc ON vc.vehicle_type = ol.vehicle_type
        GROUP BY vehicle_type HAVING COUNT >= 1";
        $result = $conn->query($vehicle_type);

        while($row = mysqli_fetch_assoc($result)) {
            $vehicle[] = $row['vehicle_type'];
            $vehicle_count[] = $row['COUNT'];
            $vehicle_color[] = $row['color'];
        }

        $total = count($vehicle_count);

        echo json_encode(array("vehicle" => $vehicle, "count" => $vehicle_count, "total" => $total, "color" => $vehicle_color));
    } else {
        $vehicle_type = "SELECT ol.vehicle_type, COUNT(*) COUNT, vc.color FROM offense_list AS ol
        LEFT JOIN vehicle_color vc ON vc.vehicle_type = ol.vehicle_type
        WHERE DATE_FORMAT(ol.date_created, '%Y%') = {$year}
        GROUP BY vehicle_type HAVING COUNT >= 1";
        $result = $conn->query($vehicle_type);

        while($row = mysqli_fetch_assoc($result)) {
            $vehicle[] = $row['vehicle_type'];
            $vehicle_count[] = $row['COUNT'];
            $vehicle_color[] = $row['color'];
        }

        $total = count($vehicle_count);

        echo json_encode(array("vehicle" => $vehicle, "count" => $vehicle_count, "total" => $total, "color" => $vehicle_color));
    }
    
?>