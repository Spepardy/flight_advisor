<?php

session_start();

if (isset($_POST['submit'])) {
    include_once '../includes/db_connect.php';


    try {
        /**
         *  Dijkstra's algorithm in PHP by zairwolf
         * 
         *  Demo: http://www.you4be.com/dijkstra_algorithm.php
         *
         *  Source: https://github.com/zairwolf/Algorithms/blob/master/dijkstra_algorithm.php
         *
         *  Author: Hai Zheng @ https://www.linkedin.com/in/zairwolf/
         *
         */

        //set the distance array
        // $routes_prices_array = array();
        // $routes_prices_array[1][2] = 7;
        // $routes_prices_array[1][3] = 9;
        // $routes_prices_array[1][6] = 14;
        // $routes_prices_array[2][1] = 7;
        // $routes_prices_array[2][3] = 10;
        // $routes_prices_array[2][4] = 15;
        // $routes_prices_array[3][1] = 9;
        // $routes_prices_array[3][2] = 10;
        // $routes_prices_array[3][4] = 11;
        // $routes_prices_array[3][6] = 2;
        // $routes_prices_array[4][2] = 15;
        // $routes_prices_array[4][3] = 11;
        // $routes_prices_array[4][5] = 6;
        // $routes_prices_array[5][4] = 6;
        // $routes_prices_array[5][6] = 9;
        // $routes_prices_array[6][1] = 14;
        // $routes_prices_array[6][3] = 2;
        // $routes_prices_array[6][5] = 9;


        //the start and the end
        // $source_airport = 1;
        // $destination_airport = 5;



        // preparing a statement
        $stmt = $db->prepare("SELECT DISTINCT source_airport, destination_airport, price FROM routes");

        // execute/run the statement. 
        $stmt->execute();

        // fetch the result. 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($result);
        $resultChecker = count($result);

        if ($resultChecker > 0) {
            //$routes = $result[0];
            $routes = $result;
        }
        //var_dump($routes);

        //set the distance/prices array (Route and prices graph)
        $routes_prices_array = array();
        foreach ($routes as $key => $value) {
            $routes_prices_array[$value['source_airport']][$value['destination_airport']] = $value['price'];
        }
        //var_dump($routes_prices_array);
        //exit();

        //the start and the end
        $source_airport = $_POST['source_airport']; //'KBP'; //'AER';
        $destination_airport = $_POST['destination_airport']; //'TGD';
        // $_description = $_POST['_description'];
        // $city_id = $_POST['city_id'];


        //initialize the array for storing
        $S = array(); //the nearest path with its parent and weight
        $Q = array(); //the left nodes without the nearest path
        foreach (array_keys($routes_prices_array) as $val) $Q[$val] = 99999;
        $Q[$source_airport] = 0;

        //start calculating
        while (!empty($Q)) {
            $min = array_search(min($Q), $Q); //the most min weight
            if ($min == $destination_airport) break;
            foreach ($routes_prices_array[$min] as $key => $val) if (!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
                $Q[$key] = $Q[$min] + $val;
                $S[$key] = array($min, $Q[$key]);
            }
            unset($Q[$min]);
        }

        //list the path
        $path = array();
        $pos = $destination_airport;
        while ($pos != $source_airport) {
            $path[] = $pos;
            $pos = $S[$pos][0];
        }
        $path[] = $source_airport;
        $path = array_reverse($path);

        //print result
        //echo "<img src='http://www.you4be.com/dijkstra_algorithm.png'>";
        print '<a href="../ordinary_user_home.php">Home</a>';
        echo "<br /> <h1>Cheapest Route</h1>";
        echo "<br />From <strong> $source_airport </strong> to <strong> $destination_airport </strong>";
        echo "<br />";
        echo "<br />The price is <strong>" . $S[$destination_airport][1] . "</strong>";
        echo "<br />";
        //var_dump($S);
        echo "<br />Path/route is <strong>" . implode(' => ', $path) . "</strong>";
        echo "<br />";
        //var_dump($path);
        exit();
    } catch (Throwable $th) {
        //throw $th;
        echo 'No route/path found';
    }
} else {
    header("Location: find.php");
    exit();
}
