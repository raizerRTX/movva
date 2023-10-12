<?php
    //created new connection file, i'm having an error within directory so i do this magic
    include('DBConnection.php');

    $check_id = 0;

    $arr = array();

    $select_offense = "SELECT `offense_id` FROM `offense_items`";
    $result = $conn->query($select_offense);

    while($row = mysqli_fetch_assoc($result)) {


        $get_offense_name = "SELECT `name` FROM `offenses` WHERE id = {$row['offense_id']}";
        $result_name = $conn->query($get_offense_name);

        while($r = mysqli_fetch_array($result_name)) {
            $arr[] = $r['name'];
        }


    }

    echo json_encode($arr);
    



?>