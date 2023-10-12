<?php

    include ("admin/inc/DBConnection.php");

    $id = 0;
    $offense_id = 0;
    $drivers_id = 0;
    $prone_place = "";
    $violation = array();
    $place = "";
    $date = "";
    $age = "";
    $code = "";
    $first_name = "";
    $last_name = "";
    $middle_name = "";
    $fine = 0;
    $vehicle_type = "";
    $gender = "";

    $ticket = $_POST['ticket'];

    $getTicket = "SELECT * FROM `offense_list` WHERE ticket_no = '" . $ticket . "'";

    $sql = $conn -> query($getTicket);

    while($row = mysqli_fetch_assoc($sql)) {

        $prone_place = $row['prone_places'];
        $date = $row['date_created'];
        $id = $row['id'];
        $drivers_id = $row['driver_id'];
        $fine = $row['total_amount'];
        $vehicle_type = $row['vehicle_type'];
        $vehicle_class = $row['public_or_private'];

    }

    $getData = "SELECT * FROM offense_items WHERE driver_offense_id = '". $id ."'";

    $sql2 = $conn -> query($getData);

    while ($row2 = mysqli_fetch_assoc($sql2)) {

        $offense_id = $row2['offense_id'];

        $getOffenseName = "SELECT `name` FROM offenses WHERE id = '" . $offense_id . "'";

        $getName = $conn -> query($getOffenseName);

        while ($name = mysqli_fetch_assoc($getName)) {
            $violation[] = $name['name'];
        }

    } 

    $getDriverLicense = "SELECT `meta_value` FROM drivers_meta WHERE driver_id = '" . $drivers_id . "' AND meta_field = 'age'";

    $sql3 = $conn -> query($getDriverLicense);

    while ($row3 = mysqli_fetch_assoc($sql3)) {
        $age = $row3['meta_value'];
    }

    $getDriverAddr = "SELECT `meta_value` FROM drivers_meta WHERE driver_id = '" . $drivers_id . "' AND meta_field = 'present_city'";

    $sql4 = $conn -> query($getDriverAddr);

    while ($row4 = mysqli_fetch_assoc($sql4)) {
        $place = $row4['meta_value'];
    }

    $getDriverFname = "SELECT `meta_value` FROM drivers_meta WHERE driver_id = '" . $drivers_id . "' AND meta_field = 'firstname'";

    $sql5 = $conn -> query($getDriverFname);

    while ($row5 = mysqli_fetch_assoc($sql5)) {
        $first_name = $row5['meta_value'];
    }

    $getDriverLname = "SELECT `meta_value` FROM drivers_meta WHERE driver_id = '" . $drivers_id . "' AND meta_field = 'lastname'";

    $sql6 = $conn -> query($getDriverLname);

    while ($row6 = mysqli_fetch_assoc($sql6)) {
        $last_name = $row6['meta_value'];
    }

    $getDriverMname = "SELECT `meta_value` FROM drivers_meta WHERE driver_id = '" . $drivers_id . "' AND meta_field = 'middlename'";

    $sql7 = $conn -> query($getDriverMname);

    while ($row7 = mysqli_fetch_assoc($sql7)) {
        $middle_name = $row7['meta_value'];
    }

    $getDriverGender = "SELECT `meta_value` FROM drivers_meta WHERE driver_id = '" . $drivers_id . "' AND meta_field = 'sex'";

    $sql8 = $conn -> query($getDriverGender);

    while ($row8 = mysqli_fetch_assoc($sql8)) {
        $gender = $row8['meta_value'];
    }

    $newDate = date("M d, Y h:i a", strtotime($date));

    $output = array (
        'prone' => ucfirst($prone_place), 
        'date' => $newDate, 
        'violation' => $violation, 
        'age' => $age, 
        'gender' => ucfirst($gender),
        'address' => $place,
        'fname' => ucfirst($first_name),
        'lname' => ucfirst($last_name),
        'mname' => ucfirst($middle_name),
        'vehicle' => ucfirst($vehicle_type),
        'class' => ucfirst($vehicle_class),
        'fine' => number_format($fine)
    );

    echo json_encode($output);


    
   
    

?>