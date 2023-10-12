<?php
    //created new connection file, i'm having an error within directory so i do this magic
    include('DBConnection.php');

    $check_id = "";

    $driver_count = array();
    $date = array();

    $select_date = "SELECT DATE(`date_created`) AS `date` FROM `drivers_list` ORDER BY `date_created` ASC";
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
        $get_drivers_count = "SELECT * FROM `drivers_list` WHERE DATE(`date_created`) = '" . $date[$i] . "'";
        $result_count = $conn->query($get_drivers_count);

        $driver_count[] = mysqli_num_rows($result_count);
    }

    echo json_encode(array('date' => $date, 'count' => $driver_count, 'data' => $size));

    



?>