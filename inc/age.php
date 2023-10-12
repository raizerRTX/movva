<?php
    include('DBConnection.php');

    $count = array();

    $select_age1 = "SELECT DISTINCT (ol.driver_id), dm.meta_value FROM `offense_list` AS ol
    LEFT JOIN drivers_meta dm ON dm.driver_id = ol.driver_id
    WHERE dm.meta_field = 'age' AND dm.meta_value >= 18 AND dm.meta_value <= 20";
    $result1 = $conn->query($select_age1);

    $count[0]=mysqli_num_rows($result1);

    $select_age2 = "SELECT DISTINCT (ol.driver_id), dm.meta_value FROM `offense_list` AS ol
    LEFT JOIN drivers_meta dm ON dm.driver_id = ol.driver_id
    WHERE dm.meta_field = 'age' AND dm.meta_value >= 21 AND dm.meta_value <= 39";
    $result2 = $conn->query($select_age2);

    $count[1]=mysqli_num_rows($result2);

    $select_age3 = "SELECT DISTINCT (ol.driver_id), dm.meta_value FROM `offense_list` AS ol
    LEFT JOIN drivers_meta dm ON dm.driver_id = ol.driver_id
    WHERE dm.meta_field = 'age' AND dm.meta_value >= 40 AND dm.meta_value <= 59";
    $result3 = $conn->query($select_age3);

    $count[2]=mysqli_num_rows($result3);

    $select_age4 = "SELECT DISTINCT (ol.driver_id), dm.meta_value FROM `offense_list` AS ol
    LEFT JOIN drivers_meta dm ON dm.driver_id = ol.driver_id
    WHERE dm.meta_field = 'age' AND dm.meta_value >= 60";
    $result4 = $conn->query($select_age4);

    $count[3]=mysqli_num_rows($result4);


    echo json_encode($count);
 
?>