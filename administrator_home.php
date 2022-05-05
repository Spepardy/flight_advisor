<!DOCTYPE html>
<html lang="en">

<head>
    <title>Administrator Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <section class="student-main-container">
        <div class="student-main-wrapper">
            <!--<h2>Home</h2>-->
            <h2>You'r welcome,
                <?php
                echo "<strong>" . $_SESSION['$role'] . "<span> </span>" . $_SESSION['$lastname'] . "</strong>";
                //<div><h3>Welcome <?php echo '<strong>'.$_SESSION['username'].'</strong>'; </h3></div>
                ?>
            </h2>
        </div>
        <div class="initial-main-buttons">
            <form>
                <!-- <input type="button" name="quiz" value="Write Quiz" onclick="window.location.href='write_quiz.php'"> -->
                <!--<button name="quiz" onclick="window.location.href='write_quiz.php'">Write Quiz</button>-->
            </form>
        </div>
    </section>
    <?php include 'includes/footer.php'; ?>
</body>

</html>