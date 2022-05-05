<?php

session_start();

if (isset($_POST['submit'])) {
    include_once '../includes/db_connect.php';

    $comment = $_POST['comment'];
    $city_id = $_POST['city_id'];
    $_user_id = $_SESSION['$id'];
    $created_date = date("Y-m-d H:i:s");
    $modified_date = date("Y-m-d H:i:s");

    //Error Handlers
    //Check for empty fields
    if (empty($comment) || empty($city_id) || empty($_user_id)) {
        header("Location: add.php?add=empty");
        exit();
    } else {
        // preparing a statement
        $stmt = $db->prepare("INSERT INTO cities_comments (comment, city_id, _user_id, created_date, modified_date) VALUES (?, ?, ?, ?, ?);");

        // execute/run the statement. 
        $stmt->execute(array($comment, $city_id, $_user_id, $created_date, $modified_date));

        header("Location: ../cities/view.php");
        exit();
    }
} else {
    header("Location: add.php");
    exit();
}
