<?php

//check that the user id isn't blank
function ValidateUserId($userId) {
    if ($userId == "") {
        return 1;
    }
}

//ensure passwords match and has minimum of each required character
function ValidatePassword($password, $passwordAgain) {
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    if (!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
        return 1;
    }
    if ($password != $passwordAgain) {
        return 2;
    }
}

//returns credentials to access database
function getPDO() {
    $dbConnection = parse_ini_file("db_connection.ini");
    extract($dbConnection);
    return new PDO($dsn, $scriptUser, $scriptPassword);
}

?>