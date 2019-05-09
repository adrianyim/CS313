<?php 
$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>

<header>
	<h2>Think.</h2>
		<ul>
			<li><a href="/team/Week02/home.php" <?php if ($file === "home") echo 'active' ?>>Home</a></li>
			<li><a href="/team/Week02/about-us.php" <?php if ($file === "about-us") echo 'active' ?>>About Us</a></li>
			<li><a href="/team/Week02/login.php" <?php if ($file === "home") echo 'active' ?>>logout</a></li>
		</ul>
	</header>