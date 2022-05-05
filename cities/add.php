<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add City</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <h1>Add City</h1>
    <form action="add_process.php" method="POST">
        <div id="input-box">
            <label for="_name">
                <p>Name</p>
            </label>
            <input type="text" name="_name" id="_name" placeholder="Please enter city's name" required>
        </div>
        <div id="input-box">
            <label for="country">
                <p>Country</p>
            </label>
            <input type="text" name="country" id="country" placeholder="Please enter your last name" required>
        </div>
        <div id="input-box">
            <label for="_description">
                <p>Description</p>
            </label>
            <textarea name="_description" id="_description" cols="30" rows="10" required></textarea>
            <!-- <input type="text" name="_description" id="_description" placeholder="Please enter your middle name" required> -->
        </div>
        <br>
        <input type="submit" name="submit" value="Add City">
    </form>
</body>

</html>