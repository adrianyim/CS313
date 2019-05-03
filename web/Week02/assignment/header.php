<?php 
$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>

<header>
    <a href="http://www.byui.edu"><img src="byui-logo.jpg" class="byui-logo"></a>
    <div class="div-header">
        <a href="/Week02/assignment/home.php" <?php if ($file === "home") echo 'active' ?> class="a-header">Home</a>
        <a href="/Week02/assignment/assignment.php" <?php if ($file === "assignment") echo 'active' ?> class="a-header">Assignment</a>
        <?php
        date_default_timezone_set("Mountain");
        $timestamp = time();
        echo(date("H:i:s a, m/d/Y", $timestamp)); 
        ?> 
    </div>
    <hr>
</header>