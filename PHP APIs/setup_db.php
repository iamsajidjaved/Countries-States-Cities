<?php
require_once "config.php";
$file = fopen("countries_states_cities_list_of_world.csv", "r");
while (($data = fgetcsv($file))) {
    $country = $data[2];
    $state = $data[1];
    $city = $data[0];
    $sql = "INSERT INTO info_tbl (country, state, city) VALUES ('" . $country . "', '" . $state . "', '" . $city . "')";
    if (mysqli_query($conn, $sql)) {
        echo "Row Inserted <br/>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
fclose($file);
