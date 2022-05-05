<?php
// echo phpinfo();

try {
    //code...
    $db = new PDO('sqlite:flight_advisor_db.sqlite');
    
    $db->exec("CREATE TABLE IF NOT EXISTS users(id INTEGER PRIMARY KEY, first_name TEXT, email TEXT)");
    
    // $db->exec("INSERT INTO users(id, first_name, email) VALUES(7, 'Opardy', 'opardy@gmail.com');");
    // $db->exec("INSERT INTO users(id, first_name, email) VALUES(8, 'Kwame', 'kwame@gmail.com');");
    // $db->exec("INSERT INTO users(id, first_name, email) VALUES(9, 'Ablorde', 'ablorde@gmail.com');");

    print "<table border=1>";

    print "<tr><td>id </td><td> Name </td><td> Email</td></tr>";

    $result = $db->query("SELECT * FROM users");

    foreach ($result as $key => $row) {
        # code...
        print "<tr><td>" . $row['id'] . "</td>";
        print "<td>" . $row['first_name'] . "</td>";
        print "<td>" . $row['email'] . "</td></tr>";
    }

    print "</table>";



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

//$results = $db->query("SELECT * FROM routes");
// print $results;

print "<br>";

print "<table border=1>";

    print "<tr><td>Price </td><td> Airline </td><td> Airline ID</td></tr>";

    $results = $db->query("SELECT * FROM routes");

    foreach ($results as $key => $row) {
        # code...
        print "<tr><td>" . $row['price'] . "</td>";
        print "<td>" . $row['airline'] . "</td>";
        print "<td>" . $row['airline_id'] . "</td></tr>";
    }

    print "</table>";


} catch (PDOException $e) {
    //throw $e;
    echo $e->getMessage();
}
?>