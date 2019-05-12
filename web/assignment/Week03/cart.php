<?php
    session_start();
    $_SESSION["ITEMS"] = $_POST["item"];    
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
?>
    
    <div class="div-info">
        <p>Your cart lists:</p>
        <ul>
        <?php
            foreach ($_SESSION["ITEMS"] as $item) {
                echo ("<li><p>$item</p></li>");
            }
        ?>
        </ul>

        <table>
            <tr><th>Items:</th><th>&nbsp;</th><th>Cost:</th><th>&nbsp;</th></tr>

            <?php for ($i = 0; $i < count($_SESSION["ITEMS"]); $i++) { ?>
            <tr>
                <td><?php echo($Items[$i]); ?></td>
                <td><img src="<?php echo($image[$i]); ?>" class="img-paper-cutting"></td>
                <td>$<?php echo($cost[$i]); ?></td>
            </tr>
            <?php } ?>
        </table>

        <a href="assign03.php"><input type="button" value="Continue Shopping"></a>
        <a href="checkout.php" <?php echo htmlspecialchars(SID); ?>><input type="button" value="Checkout"></a>
    </div>

    <?php
    include 'footer.php';
    ?>
</body>
</html>