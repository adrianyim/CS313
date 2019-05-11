<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment 03</title>
    <link rel="stylesheet" href="../Week02/home.css">
</head>
<body>
<?php
include 'header.php';
?>

    <div class="div-info">
        <h3>Chinese Paper Cutting online shipping</h3>

        <form method="post" action="cart.php" >
            <input type="checkbox" name="item[]" value="Plan of Salvation"><img src="artwork1.png" class="img-paper-cutting"> Plan of Salvation $500<br>
            <input type="checkbox" name="item[]" value="Five Loaves and Two Fishes"><img src="artwork2.png" class="img-paper-cutting"> Five Loaves and Two Fishes $250<br>
            <input type="checkbox" name="item[]" value="Consider the Lilies"><img src="artwork3.png" class="img-paper-cutting"> Consider the Lilies $300<br>
            <input type="checkbox" name="item[]" value="Tiger"><img src="artwork4.png" class="img-paper-cutting"> Tiger $150<br>
            <input type="checkbox" name="item[]" value="House"><img src="artwork5.png" class="img-paper-cutting"> House $150<br>

            <input type="submit" value="View Cart">
        </form>
    </div>
    
    <?php
        include 'footer.php';
    ?>
</body>
</html>