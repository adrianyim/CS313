<?php
    session_start();
    $_SESSION["ITEMS"] = $_POST["item"]; 
    $total = 0;   
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

        <table>
            <tr><th>Items:</th><th>&nbsp;</th><th>Cost:</th></tr>

            <?php for ($i = 0; $i < count($_SESSION["ITEMS"]); $i++) { ?>
            <tr>
                <td><?php echo($_SESSION["ITEMS"][$i]); ?></td>
                <td><img src="<?php echo($_SESSION["image"][$i]); ?>" class="img-paper-cutting"></td>
                <td>$<?php echo($_SESSION["amount"][$i]); ?></td>
            </tr>
            <?php $_SESSION["TOTAL"] = $total + $_SESSION["COST"][$i]; } ?>

            <tr><td></td><td></td><td><td>Total : <?php echo($_SESSION["TOTAL"]); ?></td></td></tr>
            <tr><td>&nbsp;</td><td><a href="assign03.php"><input type="button" value="Continue Shopping"></a><a href="checkout.php"><input type="button" value="Checkout"></a></td><td>&nbsp;</td></tr>
        </table>
    </div>

    <?php
    include 'footer.php';
    ?>
</body>
</html>