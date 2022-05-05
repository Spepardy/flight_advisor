<?php

session_start();

if (isset($_POST['submit'])) {
    include_once 'db_connect.php';

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $salt = $_POST['salt'];

    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    //Error Handlers
    //Check for empty fields
    if (empty($first_name) || empty($last_name) || empty($role) || empty($salt) || empty($username) || empty($password) || empty($cpassword)) {
        header("Location: ../signup.php?signup=empty");
        exit();
    } else {
        //Check if input characters are valid
        /*if (!preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $last_name) || !preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $salt) || !preg_match("/^[a-zA-Z]*$/", $email) || !preg_match("/^[a-zA-Z]*$/", $username)) {
				header("Location: ../signup.php?signup=invalid");
				exit();
			}else{*/
        //Check if email is valid
        // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (false) {
            header("Location: ../signup.php?signup=email");
            exit();
        } else {
            // $query = "SELECT * FROM users WHERE username='$username'";
            // $result = mysqli_query($connect, $query);
            // $resultChecker = mysqli_num_rows($result);

            // preparing a statement
            $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");

            // execute/run the statement. 
            $stmt->execute(array($username));

            // fetch the result. 
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($cars);
            $resultChecker = count($result);


            if ($resultChecker > 0) {
                header("Location: ../signup.php?signup=username_taken");
                exit();
            } else {
                //Checking to confirm password
                if ($password != $cpassword) {
                    header("Location: ../signup.php?signup=password_inmatch");
                    exit();
                } else {
                    //Hashing password
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    //$hashedPwd = md5(password);
                    //Insert the user into the database
                    // $query = "INSERT INTO users (first_name, last_name, user_role, salt, username, _password) VALUES ('$first_name','$last_name', '$role', '$salt', '$username', '$hashedPwd');";
                    // mysqli_query($connect, $query);

                    // preparing a statement
                    $stmt = $db->prepare("INSERT INTO users (first_name, last_name, user_role, salt, username, _password) VALUES (?, ?, ?, ?, ?, ?);");

                    // execute/run the statement. 
                    $stmt->execute(array($first_name, $last_name, $role, $salt, $username, $hashedPwd));


                    //Log in user
                    //$_SESSION['$std_id'] = $row['std_id'];
                    $_SESSION['$firstname'] = $first_name;
                    $_SESSION['$lastname'] = $last_name;
                    $_SESSION['$role'] = $role;
                    $_SESSION['$username'] = $username;
                    
                    if ($row['user_role'] == 'administrator') {
                        header("Location: ../administrator_home.php");
                    } else {
                        # $row['user_role'] == 'ordinary_user'
                        header("Location: ../ordinary_user_home.php");
                    }
                    exit();
                }
            }
        }
        //}
    }
} else {
    header("Location: ../signup.php");
    exit();
}
