<?php
//  MODEL:
//  Qureying into database.

//  Type declaration:
//  not mantadory, it is type declaration for preventing more errors from
//  happening such as entering wrong type of data.
declare(strict_types= 1);

function getUser(mysqli $connection, string $username):array|null{
    
    $query = sprintf("SELECT * FROM administrators
                     WHERE username= '%s';", $username);

    $result = $connection->query($query);
    $user = $result->fetch_assoc();

    return $user;
}