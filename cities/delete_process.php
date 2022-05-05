<?php
include_once '../includes/db_connect.php';

if (isset($_GET['city_id'])) {
    $city_id = $_GET['city_id'];
    
    //Deleting all City's Comments first
    // preparing a statement
    $stmt = $db->prepare("DELETE FROM cities_comments WHERE city_id = ?");

    // execute/run the statement. 
    $stmt->execute(array($city_id));

    //Deleting City
    // preparing a statement
    $stmt = $db->prepare("DELETE FROM cities WHERE id = ?");

    // execute/run the statement. 
    $stmt->execute(array($city_id));
    
    header("Location: view.php");
    exit();
} else {
    // Fallback behaviour goes here
}
?>