<?php
if (!isset($_SESSION)) {
	session_start();
}
?>
<header>
	<nav>
		<div class="header-wrapper">
			<a href="index.php">
				<h1>Home</h1>
			</a>
			<!--<ul>
				<li><a href="index.php">Home</a></li>
			</ul>-->
			<div class="profile">
				<?php
				if (isset($_SESSION['$std_id'])) {
					# code...
					#Had wanted to write a log out code here
					// That would have been echo 'html codes here';
				}
				?>
				<h3><a href="includes/logout.php">Logout</a></h3>

				<ul>
					<?php
					if ($_SESSION['$role'] == 'administrator') {
						echo '<li><a href="/flight_advisor/cities/add.php">Add City</a></li>';
					}
					?>
					<?php
					if ($_SESSION['$role'] == 'ordinary_user') {
						echo '<li><a href="/flight_advisor/cities/view.php">View Cities</a></li>';
						echo '<li><a href="/flight_advisor/routes/find.php">Find Cheapest Route</a></li>';
					}
					?>
				</ul>
			</div>
		</div>
	</nav>
</header>