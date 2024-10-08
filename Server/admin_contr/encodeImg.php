<?php


function encode_logo($logo, $conn){
    //encode the logo image
    $itemLogo = file_get_contents($logo);
    $itemLogo = $conn->real_escape_string($itemLogo);
    return $itemLogo;
}
