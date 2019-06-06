<?php
    session_start();

    //Define the products, cost, and images
    $_SESSION["products"] = array("Plan of Salvation", "Consider the Lilies", "Five Loaves and Two Fishes", "Tiger", "House");
    $_SESSION["amounts"] = array("500", "300", "250", "150", "150");
    $_SESSION["image"] = array("artwork1.png", "artwork2.png", "artwork3.png", "artwork4.png", "artwork5.png");

    //Load up session
    if (!isset($_SESSION["TOTAL"])) {
        $_SESSION["TOTAL"] = 0;
        for ($i = 0; $i < count($_SESSION["products"]); $i++) {
            $_SESSION["QTY"] [$i] = 0;
            $_SESSION["amounts"] [$i] = 0;
        }
    }

    //Reset
    if (isset($_POST["reset"])) {
        if ($_POST["reset"] == "true") {
            unset($_SESSION["QTY"]);
            unset($_SESSION["amounts"]);
            unset($_SESSION["TOTAL"]);
            unset($_SESSION["CART"]);
        }
    }

    //Add
    if (isset($_POST["add"])) {
        $i = $_POST["add"];
        $qty = $_SESSION["QTY"][$i] + 1;
        $_SESSION["amounts"][$i] = $_SESSION["amounts"][$i] * $qty;
        $_SESSION["CART"][$i] = $i;
        $_SESSION["QTY"][$i] = $qty;
    }

    //Delete
    if (isset($_POST["delete"])) {
        $i = $_POST["delete"];
        $qty = $_SESSION["QTY"][$i];
        $qty--;
        $_SESSION["QTY"][$i] = $qty;
    } else {
        $_SESSION["amounts"][$i] = $_SESSION["amounts"][$i] * $qty;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment 03</title>
    <link rel="stylesheet" href="/assignment/home.css">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/header.php';
?>

<div class="div-info">
    <h2>Chinese Paper Cutting online shipping</h2>

    <form method="post" action="cart.php" >
        <table>
            <tr><th>Items:</th><th>&nbsp;</th><th>Cost:</th><th>&nbsp;</th><th>Action</th></tr>

            <?php for ($i = 0; $i < count($_SESSION["products"]); $i++) { ?>
            <tr>
                <td><?php echo($_SESSION["products"][$i]); ?></td>
                <td><img src="<?php echo($_SESSION["image"][$i]); ?>" class="img-paper-cutting"></td>
                <td>$<?php echo($_SESSION["amounts"][$i]); ?></td>
                <td>&nbsp;</td>
                <td><input type="checkbox" name="item[]" value="<?php echo($_SESSION["products"][$i]); ?>"></td>
                <!-- <td><a href="?add=<?php //echo($i); ?>">Add to cart</a></td> -->
            </tr>
            <?php } ?>

            <tr><td></td></tr>
            <!-- <tr><td><a href="?reset=true">Reset Cart</a></td></tr> -->
        </table>
        <input type="submit" value="View Cart">
    </form>

    <!-- Doesn't work now -->
    <?php if (isset($_SESSION["CART"]) ) { ?> <br/><br/><br/>
        <h2>Cart</h2>
        <table>
            <tr><th>Item:</th><th>&nbsp;</th><th>Qty:</th><th>&nbsp;</th><th>Cost:</th><th>&nbsp;</th><th>Action:</th></tr>
            <?php
            $total = 0;

            foreach ( $_SESSION["CART"] as $i ) { ?>
            
                <tr><td><?php echo( $_SESSION["products"][$_SESSION["CART"][$i]] ); ?></td><td>&nbsp;</td><td><?php echo( $_SESSION["QTY"][$i] ); ?></td><td>&nbsp;</td><td><?php echo( $_SESSION["amounts"][$i] ); ?></td><td>&nbsp;</td><td><a href="?delete=<?php echo($i); ?>">Delete from cart</a></td></tr>
                
                <?php
                $total = $total + $_SESSION["amounts"][$i];
            }

            $_SESSION["TOTAL"] = $total;
            ?>
            <tr><td>Total : <?php echo($total); ?></td></tr>
        </table>
    <?php }?>
    <!-- Doesn't work now -->
</div>

<?php
    include $_SERVER['DOCUMENT_ROOT'].'/assignment/footer.php';
?>
</body>
</html>