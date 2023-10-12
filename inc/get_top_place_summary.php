<?php
    include('DBConnection.php');

    $year = $_POST['year'];
    $area = array();
    $unique_area = array();
    $area_violator = array();

    if ($year == "all") {
        $select_driver = "SELECT DISTINCT(`driver_id`) FROM `offense_list`";
        $result = $conn->query($select_driver);

        while($row = mysqli_fetch_assoc($result)) {

            $get_area_name = "SELECT `meta_value` FROM `drivers_meta` WHERE driver_id = {$row['driver_id']} AND `meta_field` = 'present_city'";
            $result_area = $conn->query($get_area_name);

            while($r = mysqli_fetch_array($result_area)) {
                $area[] = $r['meta_value'];
            }

        }

        $unique_area[] = array_count_values($area);
        $area_violator[] = mysqli_num_rows($result);


        echo json_encode(array ('area' => $area, 'violatorCount' => $unique_area));
        
    } else {
        $select_driver = "SELECT DISTINCT(OL.driver_id), dm.meta_field, dm.meta_value FROM offense_list AS OL LEFT JOIN drivers_meta dm ON dm.driver_id = OL.driver_id 
        WHERE dm.meta_field = 'present_city'
        AND DATE_FORMAT(OL.date_created, '%Y%') = {$year}";
        $result = $conn->query($select_driver);

        while ($row = mysqli_fetch_assoc($result)) {
            $area_name = "SELECT `meta_value` FROM `drivers_meta` WHERE driver_id = {$row['driver_id']} AND `meta_field` = 'present_city'";
            $result_area = $conn->query($area_name);

            while($r = mysqli_fetch_array($result_area)) {
                $area[] = $r['meta_value'];
            }

        }   

        $unique_area[] = array_count_values($area);
        $area_violator[] = mysqli_num_rows($result);

        echo json_encode(array ('area' => $area, 'violatorCount' => $unique_area)); 
    }


?>