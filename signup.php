<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <h1>Sign Up</h1>
			<form action="includes/signup_process.php" method="POST">
				<div id="input-box">
					<label for="first_name"><p>First Name</p></label>
					<input type="text" name="first_name" id="first_name" placeholder="Please enter your first name" required>
				</div>
				<div id="input-box">
					<label for="last_name"><p>Last Name</p></label>
					<input type="text" name="last_name" id="last_name" placeholder="Please enter your last name" required>
				</div>
				<div id="input-box">
					 <label for="username"><p>Username</p></label>
					 <input type="text" name="username" id="username" placeholder="Please enter your middle name" required>
				</div>
				<div id="input-box">
					<p>Role</p>
					<input type="radio" name="role" id="administrator" value="administrator" required><label for="administrator"><p>Administrator</p></label>
					<input type="radio" name="role" id="ordinary_user"  value="ordinary_user"><label for="ordinary_user"><p>Ordinary User</p></label>	
				</div>
				<div id="input-box">
					<label for="salt"><p>Salt</p></label>
					<input type="text" name="salt" id="salt" placeholder="Please enter your salt">
				</div>
				<div id="input-box">
					<label for="password"><p>Password</p></label>
					<input type="password" name="password" id="password" placeholder="Please enter password" required>
				</div>
				<div id="input-box">
					<label for="cpassword"><p>Confirm Password</p></label>
					<input type="password" name="cpassword" id="cpassword" placeholder="Please re-enter password" required>
				</div>
                <br>
				<input type="submit" name="submit" value="Create Account">
                <h5>Already have an account? <strong><a href="index.php">Sign In</a></strong></h5>
			</form>
    </body>
</html>