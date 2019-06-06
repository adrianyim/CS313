<?php
    session_start();
    $_SESSION["NAME"] = $_POST["name"];
    $_SESSION["ADDRESS"] = $_POST["address"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation</title>
    <link rel="stylesheet" href="../assignment/home.css">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/header.php';
?>

    <div class="div-info">
        <p>Confirmation Order</p>

        <p>Name: <?php echo $_SESSION["NAME"] ?>
        <p>Shipping to: <?php echo $_SESSION["ADDRESS"] ?></p>
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
            <tr><td>&nbsp;</td><td><a href="checkout.php"><input type="button" value="Back"></a></td><td>&nbsp;</td></tr>
        </table>
    </div>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/footer.php';
?>
</body>
</html>