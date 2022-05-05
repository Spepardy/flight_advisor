<?php

session_start();

if (isset($_POST['submit'])) {
    include_once '../includes/db_connect.php';

    $_name = $_POST['_name'];
    $country = $_POST['country'];
    $_description = $_POST['_description'];

    //Error Handlers
    //Check for empty fields
    if (empty($_name) || empty($country) || empty($_description)) {
        header("Location: add.php?add=empty");
        exit();
    } else {
        // preparing a statement
        $stmt = $db->prepare("INSERT INTO cities (_name, country, _description) VALUES (?, ?, ?);");

        // execute/run the statement. 
        $stmt->execute(array($_name, $country, $_description));

        header("Location: ../administrator_home.php");
        exit();
    }
} else {
    header("Location: add.php");
    exit();
}
