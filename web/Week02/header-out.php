<?php 
$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>

<header>
	<h2>Think.</h2>
		<ul>
			<li><a href="/home.php" <?php if ($file === "home") echo 'active' ?>>Home</a></li>
			<li><a href="/about-us.php" <?php if ($file === "about-us") echo 'active' ?>>About Us</a></li>
			<li><a href="/login.php" <?php if ($file === "home") echo 'active' ?>>logout</a></li>
		</ul>
	</header>