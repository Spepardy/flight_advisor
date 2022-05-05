<?php
// echo phpinfo();

try {
    //code...
    $db = new PDO('sqlite:flight_advisor_db.sqlite');

    // Creating Users Table
    $db->exec("CREATE TABLE IF NOT EXISTS users(
        id INTEGER PRIMARY KEY AUTOINCREMENT, 
        first_name VARCHAR, 
        last_name VARCHAR, 
        username VARCHAR, 
        -- email TEXT,
        _password VARCHAR, 
        salt VARCHAR, 
        user_role VARCHAR --administrator/ordinary_user
        )");

    // Creating Cities Table
    $db->exec("CREATE TABLE IF NOT EXISTS cities(
        id INTEGER PRIMARY KEY AUTOINCREMENT, 
        _name VARCHAR, 
        country VARCHAR, 
        _description TEXT
        )");

    // Creating Cities_Comments Table
    $db->exec("CREATE TABLE IF NOT EXISTS cities_comments(
        id INTEGER PRIMARY KEY AUTOINCREMENT, 
        comment TEXT, 
        city_id INTEGER, --References city.id
        _user_id INTEGER, --References user.id,  ie. commenter
        created_date DATETIME,
        modified_date DATETIME
        )");

    // Creating Airports Table
    $db->exec("CREATE TABLE IF NOT EXISTS airports(
        -- id INTEGER PRIMARY KEY AUTOINCREMENT, 
        airport_id INTEGER, 
        _name VARCHAR(3), 
        city VARCHAR,
        country VARCHAR,  
        iata VARCHAR(3),  
        icao VARCHAR(4),
        latitude DECIMAL(18,15),
        longitude DECIMAL(18,15),
        altitude INTEGER, 
        timezone INTEGER,   
        dst VARCHAR(2), 
        tz_database_timezone TEXT, 
        _type VARCHAR, 
        source VARCHAR
        )");

    // Creating Routes Table
    $db->exec("CREATE TABLE IF NOT EXISTS routes(
        -- id INTEGER PRIMARY KEY AUTOINCREMENT, 
        airline VARCHAR(3), 
        airline_id INTEGER, 
        source_airport VARCHAR(4),
        source_airport_id INTEGER,  
        destination_airport VARCHAR(4),
        destination_airport_id INTEGER, 
        codeshare VARCHAR(1),
        stops INTEGER,
        equipment VARCHAR,
        price DECIMAL(5,2)
        )");
} catch (PDOException $e) {
    //throw $e;
    echo $e->getMessage();
}
?>



<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Flight Advisor</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <h1>Login</h1>
    <form action="includes/login_process.php" method="POST">
        <label for="username">
            <p>Username</p>
        </label>
        <input type="text" name="username" id="username" placeholder="Please enter username" required>
        <label for="password">
            <p>Password</p>
        </label>
        <input type="password" name="password" id="password" placeholder="Please enter password" required>
        <input type="submit" name="submit" value="Login">
        <h5>Don't have an account? <strong><a href="signup.php">Sign Up</a></strong></h5>
    </form>
</body>

</html>