<?php
include_once '../includes/db_connect.php';


// preparing a statement
$stmt = $db->prepare("SELECT cities.*, cities_comments.id as comment_id, cities_comments.comment, users.id as _user_id, cities_comments.created_date, cities_comments.modified_date, users.username
FROM cities 
LEFT JOIN cities_comments ON cities.id = cities_comments.city_id
LEFT JOIN users ON cities_comments._user_id= users.id
"); //GROUP BY cities.id //FOR JSON AUTO

// execute/run the statement. 
$stmt->execute();

// fetch the result. 
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($result);
//var_dump($result[0]);
$resultChecker = count($result);

//Grouping cities and comments joined rows by cities.id
foreach ($result as $city) {
    $cities[$city["id"]][] = $city;
}

// echo "<br><br><br><br><br><br><br><br>";
// var_dump($cities);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Cities</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <br>
    <a href="../ordinary_user_home.php">Home</a>
    <h1>View Cities</h1>
    <!-- <button onclick='confirm(`Are you sure you want to delete this? \n It is irreversible`) ? alert(`I will delete if for you wai`) : ``;'>Delete</button> -->
    <form action="search_process.php" method="POST">
        City 
        <input type="text" name="_name" id="_name" placeholder="Please enter city's name" required> 
        <input type="submit" name="submit" value="Search City">
    </form>
    <br>
    <?php

    // echo "<br><br><br>";

    // Creating the cities table
    print "<table border=5>";

    print "<tr>
    <th>id </th>
    <th> Name </th>
    <th> Country </th>
    <th> Description </th>
    <th> Actions </th>
    </tr>";

    // $result = $db->query("SELECT * FROM cities");

    foreach ($cities as $key => $city) {
        # Populating the cities table
        print "<tr><td>" . $city[0]['id'] . "</td>";
        print "<td>" . $city[0]['_name'] . "</td>";
        print "<td>" . $city[0]['country'] . "</td>";
        print "<td>" . $city[0]['_description'] . "</td>";
        print "<td>" .
            "<button onclick='location.href = `update.php?city_id=" . $city[0]['id'] . "`;'>Edit</button>" .
            "<button onclick='confirm(`Are you sure you want to delete this city and all its comments? \n It is irreversible`) ? location.href = `delete_process.php?city_id=" . $city[0]['id'] . "` : ``;'>Delete</button>" .
            "<button onclick='location.href = `../comments/add.php?city_id=" . $city[0]['id'] . "`;'>Add Comment</button>" .
            "</td></tr>";

        //Creating the comments table
        print "<tr><td colspan='5'><table border=1>";

        print "<tr>
        <th>id </th>
        <th> Comment </th>
        <th> Commenter </th>
        <th> Created Date </th>
        <th> Modified Date </th>
        <th> Actions </th>
        </tr>";

        // $result = $db->query("SELECT * FROM cities");

        foreach ($city as $key => $comment){
            # Populating the cities table
            print "<tr><td>" . $comment['comment_id'] . "</td>";
            print "<td>" . $comment['comment'] . "</td>";
            print "<td>" . $comment['username'] . "</td>";
            print "<td>" . $comment['created_date'] . "</td>";
            print "<td>" . $comment['modified_date'] . "</td>";
            print "<td>" .
                "<button onclick='location.href = `../comments/update.php?comment_id=" . $comment['comment_id'] . "`;'>Edit</button>" .
                "<button onclick='confirm(`Are you sure you want to delete this comment? \n It is irreversible`) ? location.href = `../comments/delete_process.php?comment_id=" . $comment['comment_id'] . "` : ``;'>Delete</button>" .
                "<button onclick='location.href = `../comments/add.php?city_id=" . $comment['id'] . "`;'>Add</button>" .
                "</td></tr>";
        }

        print "</table></td></tr>";
        //End tag for comments table
    }

    print "</table>";
    //End tag for cities table
    ?>

</body>

</html>