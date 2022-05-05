<?php

session_start();

if (isset($_POST['submit'])) {
    include_once '../includes/db_connect.php';

    $_name = $_POST['_name'];
    $country = $_POST['country'];
    $_description = $_POST['_description'];
    $city_id = $_POST['city_id'];

    //Error Handlers
    //Check for empty fields
    if (empty($_name) || empty($country) || empty($_description)) {
        header("Location: view.php?view=empty");
        exit();
    } else {
        // preparing a statement
        $stmt = $db->prepare("UPDATE cities SET _name = ?, country = ?, _description = ? WHERE id = ?;");

        // execute/run the statement. 
        $stmt->execute(array($_name, $country, $_description, $city_id));

        header("Location: view.php");
        exit();
    }
} else {
    header("Location: view.php");
    exit();
}
