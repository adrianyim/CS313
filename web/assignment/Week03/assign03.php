<?php
    session_start();

    //Define the items and cost
    $Items = array("Plan of Salvation", "Consider the Lilies", "Five Loaves and Two Fishes", "Tiger", "House");
    $cost = array("500", "300", "250", "150", "150");

    //Load up session
    if (!isset($_SESSION["TOTAL"])) {
        $_SESSION["TOTAL"] = 0;
        for ($i = 0; $i < count($Items); $i++) {
            $_SESSION["QTY"] [$i] = 0;
            $_SESSION["COST"] [$i] = 0;
        }
    }

    //Reset
    if (isset($_POST["reset"])) {
        if ($_POST["reset"] == "true") {
            unset($_SESSION["QTY"]);
            unset($_SESSION["COST"]);
            unset($_SESSION["TOTAL"]);
            unset($_SESSION["CART"]);
        }
    }

    //Add
    if (isset($_POST["add"])) {
        $i = $_POST["add"];
        $qty = $_SESSION["QTY"][$i] + 1;
        $_SESSION["COST"][$i] = $cost[$i] * $qty;
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
        $_SESSION["COST"][$i] = $cost[$i] * $qty;
    }
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

<h2>Chinese Paper Cutting online shipping</h2>
<table>
    <tr><th>Items:</th><th>&nbsp;</th><th>Cost:</th><th>&nbsp;</th><th>Action</th></tr>
    <?php for ($i=0; $i< count($Items); $i++) { ?>
    <tr><td><?php echo($Items[$i]); ?></td><td>&nbsp;</td><td><?php echo($cost[$i]); ?></td><td>&nbsp;</td>
    <td><a href="?add=<?php echo($i); ?>">Add to cart</a></td></tr>
    <?php } ?>
    <tr><td colspan="5"></td></tr>
    <tr><td colspan="5"><a href="?reset=true">Reset Cart</a></td></tr>
</table>
 
<?php if ( isset($_SESSION["CART"]) ) { ?>
 <br/><br/><br/>
 
 <h2>Cart</h2>
 <table>
 <tr><th>Item</th><th>&nbsp;</th><th>Qty</th><th>&nbsp;</th><th>Cost</th><th>&nbsp;</th><th>Action</th></tr>
 <?php
 $total = 0;

 foreach ( $_SESSION["cart"] as $i ) {
 ?>
 
 <tr><td><?php echo( $Items[$_SESSION["CART"][$i]] ); ?></td><td>&nbsp;</td><td><?php echo( $_SESSION["QTY"][$i] ); ?></td><td>&nbsp;</td><td><?php echo( $_SESSION["COST"][$i] ); ?></td><td>&nbsp;</td><td><a href="?delete=<?php echo($i); ?>">Delete from cart</a></td></tr>
 
 <?php
 $total = $total + $_SESSION["COST"][$i];
 }

 $_SESSION["TOTAL"] = $total;
 ?>
 <tr><td colspan="7">Total : <?php echo($total); ?></td></tr>
 </table>
 <?php
 }
 ?>

    <div class="div-info">
        <h2>Chinese Paper Cutting online shipping</h2>

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