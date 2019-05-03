<?php 
$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
?>

<header>
    <a href="http://www.byui.edu"><img src="byui-logo.jpg" class="byui-logo"></a>
    <div class="div-header">
        <a href="/Week02/assignment/home.php" <?php if ($file === "home") echo 'active' ?> class="a-header">Home</a>
        <a href="/Week02/assignment/assignment.php" <?php if ($file === "assignment") echo 'active' ?> class="a-header">Assignment</a>
        <!-- <span id='time'>  -->
            <?php
            date_default_timezone_set("America/Denver");
            echo "Mountain Time " . date("l, Y-m-d"); 
            ?>
        <!-- </span> -->
    </div>
    <hr>
    <script src="home.js"></script>
</header>