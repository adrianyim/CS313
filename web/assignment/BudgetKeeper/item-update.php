<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Budget Keeper - Update</title>
    <link rel="stylesheet" href="/assignment/home.css">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/header.php';
?>

<div>
    <table>
        <form method="post" action="updateDB.php">
            <tr><td>Item: <input type="text" name="Item" placeholder="Item" value="<?php echo $_SESSION['item'] ?>"></td></tr>
            <tr><td>Item Type: <?php echo $_SESSION['item_type'] ?><select name="Item-type">
            <option value="empty">--Item Type--</option>
            <option value="Salaries and wages">Salaries and wages</option>
            <option value="Utility expenses">Utility expenses</option>
            <option value="Administration expenses">Administration expenses</option>
            <option value="Finance costs">Finance costs</option>
            <option value="Depreciation">Depreciation</option>
            <option value="Impairment losses">Impairment losses</option>
            <option value="Food">Food</option>
            <option value="Others">Others</option>
            </select></td></tr>
            <tr><td>Cost: <?php echo $_SESSION['cost'] ?><input type="text" name="Cost" placeholder="Cost"></td></tr>
            <tr><td>Cost Type: <?php echo $_SESSION['cost_type'] ?><input type="radio" name="Cost-type" value="Income">Income
          <input type="radio" name="Cost-type" value="Expense">Expense</td></tr>
            <tr><td>Remark: <?php echo $_SESSION['remark'] ?><textarea name="Remark" placeholder="Remark"></textarea></td></tr>
            <tr><td><input type="submit" value="Submit"></td></tr>
        </form>
    </table>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/footer.php';
?>
</body>
</html>