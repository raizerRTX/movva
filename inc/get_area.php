<?php
    //created new connection file, i'm having an error within directory so i do this magic
    include('DBConnection.php');

    $area = array();
    $unique_area = array();
    $area_violator = array();

    $select_driver = "SELECT DISTINCT(`driver_id`) FROM `offense_list` LIMIT 4";
    $result = $conn->query($select_driver);

    while($row = mysqli_fetch_assoc($result)) {

        $get_area_name = "SELECT `meta_value` FROM `drivers_meta` WHERE driver_id = {$row['driver_id']} AND `meta_field` = 'present_city' ";
        $result_area = $conn->query($get_area_name);

        while($r = mysqli_fetch_array($result_area)) {
            $area[] = $r['meta_value'];
        }


    }

    $unique_area[] = array_count_values($area);
    $area_violator[] = mysqli_num_rows($result);


    echo json_encode(array ('area' => $area, 'violatorCount' => $unique_area));
    



?>