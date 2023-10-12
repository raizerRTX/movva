<?php
    include('DBConnection.php');

    $count = array();
    $public = 0;
    $private = 0;

    $select_class = "SELECT public_or_private FROM `offense_list`";
    $result = $conn->query($select_class);

    while($row = mysqli_fetch_assoc($result)) {
        if ($row['public_or_private'] == "public") {
            $public = $public + 1;
        }

        if ($row['public_or_private'] == "private") {
            $private = $private + 1;
        }

    }

    $count[0] = $public;
    $count[1] = $private;

    echo json_encode($count);
    



?>