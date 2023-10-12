<?php
    include('DBConnection.php');

    $year = $_POST['year'];
    $top_prone_place = array();
    $count = array();

    if ($year == "all") {
        $prone_place = "SELECT prone_places, COUNT(*) `COUNT` FROM offense_list GROUP BY prone_places HAVING COUNT >= 1";
        $result = $conn->query($prone_place);

        while($row = mysqli_fetch_assoc($result)) {
            $top_prone_place[] = $row['prone_places'];
            $count[] = $row['COUNT'];
        }

        $size = count($top_prone_place);

        echo json_encode(array('prone_place' => $top_prone_place, 'num' => $count, 'size' => $size));
    } else {
        $prone_place = "SELECT prone_places, COUNT(*) `COUNT` FROM offense_list
        WHERE DATE_FORMAT(date_created, '%Y%') = {$year} 
        GROUP BY prone_places HAVING COUNT >= 1";
        $result = $conn->query($prone_place);

        while($row = mysqli_fetch_assoc($result)) {
            $top_prone_place[] = $row['prone_places'];
            $count[] = $row['COUNT'];
        }

        $size = count($top_prone_place);

        echo json_encode(array('prone_place' => $top_prone_place, 'num' => $count, 'size' => $size));
    }
?>