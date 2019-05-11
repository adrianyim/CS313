<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="../Week02/home.css">
</head>
<body>
<?php
include 'header.php';

$_SESSION["ITEMS"] = $_POST["item"];
    
?>
    
    <div>
        <p>Your cart lists:</p><br>
        <ul>
        <?php
            foreach ($_SESSION["ITEMS"] as $item) {
                echo ("<li><p>$item</p></li>");
            }
        ?>
        </ul>
        <a href="assign03.php"><input type="button" value="Continue Shopping"></a>
        <a href="checkout.php"><input type="button" value="Checkout"></a>
    </div>

    <?php
    include 'footer.php';
    ?>
</body>
</html>