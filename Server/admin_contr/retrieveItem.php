<?php

declare(strict_types=1);


if ($_SERVER["REQUEST_METHOD"] === "GET") {
    require_once '../db_connection/connect.php';
    return getResturants($conn);
}

function getResturants(mysqli $connection){
    $query = "SELECT name, description, logo FROM resturant";
    $result = $connection->query($query);
    $resturants = $result->fetch_all(MYSQLI_ASSOC);
    $length = sizeof($resturants);
    // making the blob image readable to json encoder.
    for($i = 0; $i < $length; $i++){
        $blob_base64_encoded = base64_encode($resturants[$i]['logo']);
        $resturants[$i]['logo'] = $blob_base64_encoded;
    }
    // $blobLogo = $resturants['logo'];
    // $blob_base64_encoded = base64_encode($blobLogo);
    // $resturants['logo'] = $blob_base64_encoded;

    header("HTTP/1.0 200 success");
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type');

    echo json_encode($resturants);
}
