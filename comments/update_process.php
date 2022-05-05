<?php

session_start();

if (isset($_POST['submit'])) {
    include_once '../includes/db_connect.php';

    $comment = $_POST['comment'];
    $comment_id = $_POST['comment_id'];
    $modified_date = date("Y-m-d H:i:s");

    //Error Handlers
    //Check for empty fields
    if (empty($comment) || empty($comment_id)) {
        header("Location: ../cities/view.php?view=empty");
        exit();
    } else {
        // preparing a statement
        $stmt = $db->prepare("UPDATE cities_comments SET comment = ?, modified_date = ? WHERE id = ?;");

        // execute/run the statement. 
        $stmt->execute(array($comment, $modified_date, $comment_id));

        header("Location: ../cities/view.php");
        exit();
    }
} else {
    header("Location: ../cities/view.php");
    exit();
}
