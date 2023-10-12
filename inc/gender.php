<?php
    include('DBConnection.php');

    $count = array();
    $male = 0;
    $female = 0;

    $select_gender = "SELECT DISTINCT(ol.driver_id), dm.meta_value FROM `offense_list` AS ol
    LEFT JOIN drivers_meta dm ON dm.driver_id = ol.driver_id
    WHERE dm.meta_field = 'sex'";
    $result = $conn->query($select_gender);

    while($row = mysqli_fetch_assoc($result)) {
        if ($row['meta_value'] == "male") {
            $male = $male + 1;
        }

        if ($row['meta_value'] == "female") {
            $female = $female + 1;
        }

    }

    $count[0] = $male;
    $count[1] = $female;

    echo json_encode($count);
    



?>