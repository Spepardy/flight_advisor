<?php
include_once '../includes/db_connect.php';

if (isset($_GET['comment_id'])) {
    $comment_id = $_GET['comment_id'];
    
    //Deleting City's Comment
    // preparing a statement
    $stmt = $db->prepare("DELETE FROM cities_comments WHERE id = ?");

    // execute/run the statement. 
    $stmt->execute(array($comment_id));
    
    header("Location: ../cities/view.php");
    exit();
} else {
    // Fallback behaviour goes here
    header("Location: ../cities/view.php");
    exit();
}
?>