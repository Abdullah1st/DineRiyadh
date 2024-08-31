<?php
// Validations.

//  Type declaration:
//  not mantadory, it is type declaration for preventing more errors from
//  happening such as entering wrong type of data.
declare(strict_types= 1);

// inputs check
function isEmpty(string $username, string $password):bool {   
    if(empty($username) || empty($password)) return true;
    else return false;
}

function isUsernameValid(null|array $user):bool{
    return $user == true;
}

function isPasswordValid(string $password, array $user):bool{
    return $user["password"] === $password;
}