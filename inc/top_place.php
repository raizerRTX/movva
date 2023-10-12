<?php
    //created new connection file, i'm having an error within directory so i do this magic
    include($_SERVER['DOCUMENT_ROOT'] . '/traffic_offense/admin/inc/DBConnection.php');

    $check_id = "";

    $violation_count = array();
    $area = array();

    $select = "SELECT OL.driver_id, dm.meta_field, dm.meta_value FROM offense_list AS OL LEFT JOIN drivers_meta dm ON dm.driver_id = OL.driver_id WHERE dm.meta_field = 'present_address'";
    $result = $conn->query($select);

    $previous = "";
    while($row = mysqli_fetch_assoc($result)) {
        if ($row['meta_value'] != $previous) {
            $previous = $row['meta_value'];
            $area[] = $row['meta_value'];
        }
    }

    $size = count($area);
    for ($i = 0; $i < $size; $i++) {
        $get_violation_count = "SELECT * FROM `offense_items` WHERE DATE_FORMAT(date_created,'%Y%-%m') = '" . $date[$i] . "'";
        $result_count = $conn->query($get_violation_count);

        $violation_count[] = mysqli_num_rows($result_count);
    }

    for($i = 0; $i < $size; $i++) {
        $converted_date[] = date('F Y', strtotime($date[$i]));
    }

    echo json_encode(array('date' => $converted_date, 'count' => $violation_count, 'data' => $size));
?>