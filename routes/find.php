<?php
include_once '../includes/db_connect.php';

// preparing a statement
$stmt = $db->prepare("SELECT DISTINCT source_airport FROM routes");

// execute/run the statement. 
$stmt->execute();

// fetch the result. 
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($result);
$resultChecker = count($result);

if ($resultChecker > 0) {
    //$routes_source_airports = $result[0];
    $routes_source_airports = $result;
}
//var_dump($routes_source_airports);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Find Cheapest Route</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <a href="../ordinary_user_home.php">Home</a>
    <h1>Find Cheapest Route</h1>
    <form action="find_process.php" method="POST">
        <div id="input-box">
            <label for="source_airport">
                <p>Source Airport</p>
            </label>
            <select name="source_airport" id="source_airport" required>
                <option value="">Select Source Airport</option>
                <?php
                foreach ($routes_source_airports as $key => $value) {
                    echo '<option value="'. $value['source_airport'] .'">'. $value['source_airport'] .'</option>';
                }
                ?>
            </select>
        </div>
        <div id="input-box">
            <label for="destination_airport">
                <p>Destination Airport</p>
            </label>
            <select name="destination_airport" id="destination_airport" required>
                <option value="">Select Destination Airport</option>
                <?php
                foreach ($routes_source_airports as $key => $value) {
                    echo '<option value="'. $value['source_airport'] .'">'. $value['source_airport'] .'</option>';
                }
                ?>
            </select>
        </div>
        <br>
        <input type="submit" name="submit" value="Find Route">
    </form>
</body>

</html>