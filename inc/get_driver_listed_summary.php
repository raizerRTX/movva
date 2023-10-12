<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/traffic_offense/admin/inc/DBConnection.php');

    $year = $_POST['year'];

    $type_count = array();
    $professional = 0;
    $non_professional = 0;
    $student = 0;
    $type = array();

    if ($year == "all") {
        $select = "SELECT DISTINCT(OL.driver_id), dm.meta_field, dm.meta_value FROM offense_list AS OL 
        LEFT JOIN drivers_meta dm ON dm.driver_id = OL.driver_id
        WHERE dm.meta_field = 'license_type'";
        $result = $conn->query($select);

        while($row = mysqli_fetch_assoc($result)) {
            if ($row['meta_value'] == 'Professional') {
                $professional = $professional + 1;
            } else if ($row['meta_value'] == 'Non-Professional') {
                $non_professional = $non_professional + 1;
            } else {
                $student = $student + 1;
            }
        }

        $type_count[0] = $professional;
        $type_count[1] = $non_professional;
        $type_count[2] = $student;

        echo json_encode(array('count' => $type_count, 'data' => array_sum($type_count)));

    } else {
        $select = "SELECT DISTINCT(OL.driver_id), dm.meta_field, dm.meta_value FROM offense_list AS OL 
        LEFT JOIN drivers_meta dm ON dm.driver_id = OL.driver_id
        WHERE dm.meta_field = 'license_type'
        AND DATE_FORMAT(OL.date_created, '%Y%') = {$year}";
        $result = $conn->query($select);

        while($row = mysqli_fetch_assoc($result)) {
            if ($row['meta_value'] == 'Professional') {
                $professional = $professional + 1;
            } else if ($row['meta_value'] == 'Non-Professional') {
                $non_professional = $non_professional + 1;
            } else {
                $student = $student + 1;
            }
        }

        $type_count[0] = $professional;
        $type_count[1] = $non_professional;
        $type_count[2] = $student;

        echo json_encode(array('count' => $type_count, 'data' => array_sum($type_count)));
    }

?>