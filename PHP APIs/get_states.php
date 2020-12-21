<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

require_once "config.php";
$res = array();
$country = $_GET['country'];
$sql = "SELECT * FROM info_tbl where country='" . $country . "'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if (!in_array($row['state'], $res)) {
            array_push($res, $row['state']);
        }
    }
    sort($res);
    print_r(json_encode($res));
}
