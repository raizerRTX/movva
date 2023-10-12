<?php
    //created new connection file, i'm having an error within directory so i do this magic
    include($_SERVER['DOCUMENT_ROOT'] . '/traffic_offense/admin/inc/DBConnection.php');

    $check_id = "";

    $violation_count = array();
    $date = array();
    $converted_date = array();

    $select_date = "SELECT DATE(date_created) AS `date` FROM `offense_items` ORDER BY `date_created` ASC";
    $result = $conn->query($select_date);

    $previous = "";
    while($row = mysqli_fetch_assoc($result)) {
        if ($row['date'] != $previous) {
            $previous = $row['date'];
            $date[] = $row['date'];
        }
    }

    $size = count($date);
    for ($i = 0; $i < $size; $i++) {
        $get_violation_count = "SELECT * FROM `offense_items` WHERE DATE(date_created) = '" . $date[$i] . "'";
        $result_count = $conn->query($get_violation_count);

        $violation_count[] = mysqli_num_rows($result_count);
    }

    for($i = 0; $i < $size; $i++) {
        $converted_date[] = date('F d, Y', strtotime($date[$i]));
    }

    echo json_encode(array('date' => $converted_date, 'count' => $violation_count, 'data' => $size));
?>