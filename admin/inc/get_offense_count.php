<?php

    //created new connection file, i'm having an error within directory so i do this magic
    include('DBConnection.php');

    $names_array = $_POST['names'];
    $new_array = array();
    $offense_count = array();
    $color_array = array();
    
    foreach ($names_array as $values) {
        $select_offense = "SELECT `id` FROM `offenses` WHERE name = '{$values}'";
        $result = $conn->query($select_offense);

        while ($row = mysqli_fetch_array($result)) {
            $new_array[] = $row['id'];
        }

    }

    //get color
    foreach ($names_array as $values) {
        $color = "SELECT `color` FROM `offenses` WHERE name = '{$values}'";
        $result = $conn->query($color);

        while ($row = mysqli_fetch_array($result)) {
            $color_array[] = $row['color'];
        }

    }

    //get the offense count per offense id

    foreach ($new_array as $values) {
        $get_count = "SELECT * FROM `offense_items` WHERE offense_id = {$values}";
        $result_count = $conn -> query($get_count);

        $count = mysqli_num_rows($result_count);
        $offense_count[] = $count;

    }


    echo json_encode(array('offenseCount' => $offense_count, 'color' => $color_array));

    
    



?>