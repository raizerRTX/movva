<?php
    //created new connection file, i'm having an error within directory so i do this magic
    include($_SERVER['DOCUMENT_ROOT'] . '/traffic_offense/admin/inc/DBConnection.php');

    $top_prone_place = "";

    $prone_place = "SELECT prone_places, COUNT(*) COUNT FROM offense_list GROUP BY prone_places HAVING COUNT > 1 LIMIT 1";
    $result = $conn->query($prone_place);

    while($row = mysqli_fetch_assoc($result)) {
        $top_prone_place = $row['prone_places'];
    }

    echo json_encode($top_prone_place);
?>