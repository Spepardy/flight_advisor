<?php

session_start();

if (isset($_POST['submit'])) {
    include 'db_connect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    //$hashedPwd = md5(password);

    //Error Handlers
    //Check for empty fields
    if (empty($username) || empty($password)) {
        header("Location: ../index.php?login=empty");
        exit();
    } else {
        /*$query = "SELECT * FROM student WHERE username='$username' AND password='$hashedPwd'";
			$result = mysqli_query($connect, $query);
			$resultChecker = mysqli_num_rows($result);
			if ($resultChecker == 1) {
				//header("Location: ../student_main.php");
				echo "$resultChecker";
				echo "$password";
				echo "$hashedPwd";
				exit();*/

        // $query = "SELECT * FROM student WHERE username='$username'";
        // $result = mysqli_query($connect, $query);
        // $resultChecker = mysqli_num_rows($result);

        // preparing a statement
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");

        // execute/run the statement. 
        $stmt->execute(array($username));

        // fetch the result. 
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($result);
        $resultChecker = count($result);


        if ($resultChecker < 1) {
            header("Location: ../index.php?login=error");
            exit();
        } else {
            if ($row = $result[0]) {
                // echo $row['_password'];
                // exit();
                //Dehashing the password
                $hashedPwdCheck = password_verify($password, $row['_password']);
                // echo $hashedPwdCheck;
                // exit();
                // if ($hashedPwdCheck == false) {
                if ($hashedPwdCheck != 1) {
                    header("Location: ../index.php?login=error");
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //Log in user
                    $_SESSION['$id'] = $row['id'];
                    //$_SESSION['$title'] = $row['title'];
                    $_SESSION['$firstname'] = $row['first_name'];
                    $_SESSION['$lastname'] = $row['last_name'];
                    $_SESSION['$role'] = $row['user_role'];
                    $_SESSION['$username'] = $row['username'];

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
    }
} else {
    header("Location: ../index.php?login=error");
    exit();
}
