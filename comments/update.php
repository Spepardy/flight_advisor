<?php
include_once '../includes/db_connect.php';

if (isset($_GET['comment_id'])) {
    $comment_id = $_GET['comment_id'];

    // preparing a statement
    $stmt = $db->prepare("SELECT * FROM cities_comments WHERE id = ?");

    // execute/run the statement. 
    $stmt->execute(array($comment_id));

    // fetch the result. 
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($result);
    $resultChecker = count($result);
    if ($resultChecker == 1) {
        $comment = $result[0];
    }

    // preparing a statement
    $stmt = $db->prepare("SELECT * FROM cities WHERE id = ?");

    // execute/run the statement. 
    $stmt->execute(array($comment['city_id']));

    // fetch the result. 
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($result);
    $resultChecker = count($result);
    if ($resultChecker == 1) {
        $city = $result[0];
    }
} else {
    // Fallback behaviour goes here
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Comment</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <h1>Update Comment</h1>
    <form action="update_process.php" method="POST">
        <div id="input-box">
            <label for="_name">
                <p>City Name</p>
            </label>
            <?php
            echo '<input type="text" name="_name" id="_name" value="' . $city['_name'] . '" placeholder="Please enter name" readonly>'
            ?>
        </div>
        <div id="input-box">
            <label for="country">
                <p>City Country</p>
            </label>
            <?php
            echo '<input type="text" name="country" id="country" value="' . $city['country'] . '"  placeholder="Please enter country" readonly>'
            ?>
        </div>
        <div id="input-box">
            <label for="comment">
                <p>Comment</p>
            </label>
            <?php
            echo '<textarea name="comment" id="comment" cols="30" rows="10" required>' . $comment['comment'] . '</textarea>'
            ?>
            
            <!-- <input type="text" name="comment" id="comment" placeholder="Please enter your middle name" required> -->

            <?php
            echo '<input type="hidden" name="comment_id" value="' . $comment_id . '">'
            ?>
        </div>
        <br>
        <input type="submit" name="submit" value="Update Comment">
    </form>
</body>

</html>