<?php
include_once '../includes/db_connect.php';

if (isset($_GET['city_id'])) {
    $city_id = $_GET['city_id'];

    // preparing a statement
    $stmt = $db->prepare("SELECT * FROM cities WHERE id = ?");

    // execute/run the statement. 
    $stmt->execute(array($city_id));

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
    <title>Update City</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <h1>Update City</h1>
    <form action="update_process.php" method="POST">
        <div id="input-box">
            <label for="_name">
                <p>Name</p>
            </label>
            <?php
            echo '<input type="text" name="_name" id="_name" value="' . $city['_name'] . '" placeholder="Please enter name" required>'
            ?>
        </div>
        <div id="input-box">
            <label for="country">
                <p>Country</p>
            </label>
            <?php
            echo '<input type="text" name="country" id="country" value="' . $city['country'] . '"  placeholder="Please enter country" required>'
            ?>
        </div>
        <div id="input-box">
            <label for="_description">
                <p>Description</p>
            </label>
            <?php
            echo '<textarea name="_description" id="_description" cols="30" rows="10" required>' . $city['_description'] . '</textarea>'
            ?>
            
            <!-- <input type="text" name="_description" id="_description" placeholder="Please enter your middle name" required> -->

            <?php
            echo '<input type="hidden" name="city_id" value="' . $city_id . '">'
            ?>
        </div>
        <br>
        <input type="submit" name="submit" value="Update City">
    </form>
</body>

</html>