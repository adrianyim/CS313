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
include $_SERVER['DOCUMENT_ROOT'].'/assignment/Week02/header.php';
?>
    
    <div class="div-info">
        <p>Your cart lists:</p>

        <table>
            <tr><th>Items:</th><th>&nbsp;</th><th>Cost:</th></tr>

            <?php for ($i = 0; $i < count($_SESSION["ITEMS"]); $i++) { ?>
            <tr>
                <td><?php echo($_SESSION["ITEMS"][$i]); ?></td>
                <td><img src="<?php echo($_SESSION["image"][$i]); ?>" class="img-paper-cutting"></td>
                <td>$<?php echo($_SESSION["amounts"][$i]); ?></td>
            </tr>

            <?php $total = $total + $_SESSION["amounts"][$i]; } 
                $_SESSION["TOTAL"] = $total;
            ?>

            <tr><td></td><td></td><td><td>Total : <?php echo($_SESSION["TOTAL"]); ?></td></td></tr>
            <tr><td>&nbsp;</td><td><a href="assign03.php"><input type="button" value="Continue Shopping"></a><a href="checkout.php"><input type="button" value="Checkout"></a></td><td>&nbsp;</td></tr>
        </table>
    </div>

    <?php
    include $_SERVER['DOCUMENT_ROOT'].'/assignment/Week02/footer.php';
    ?>
</body>
</html>