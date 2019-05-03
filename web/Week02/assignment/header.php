<?php 
$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>

<header>
    <a href="http://www.byui.edu"><img src="byui-logo.jpg" class="byui-logo"></a>
    <div class="div-header">
        <a href="/Week02/assignment/home.php" <?php if ($file === "home") echo 'active' ?>>Home</a>
        <a href="/Week02/assignment/assignment.php" <?php if ($file === "assignment") echo 'active' ?>>Assignment</a>
    </div>
    <hr>
</header>