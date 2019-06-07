<?php
session_start();

$item_id = $_GET['$Item_id'];
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
            <input type="hidden" name="Item-id" value="<?php echo $item_id?>">
            <tr><td>Item: <input type="text" name="Item" value="<?php echo $_SESSION['item'] ?>"></td></tr>
            <tr><td>Item Type: <select name="Item-type">
            <option value="<?php echo $_SESSION['item_type'] ?>"><?php echo $_SESSION['item_type'] ?></option>
            <option value="Salaries and wages">Salaries and wages</option>
            <option value="Utility expenses">Utility expenses</option>
            <option value="Administration expenses">Administration expenses</option>
            <option value="Finance costs">Finance costs</option>
            <option value="Depreciation">Depreciation</option>
            <option value="Impairment losses">Impairment losses</option>
            <option value="Food">Food</option>
            <option value="Others">Others</option>
            </select></td></tr>
            <tr><td>Cost: <input type="text" name="Cost" value="<?php echo $_SESSION['cost'] ?>"></td></tr>
            <tr><td>Cost Type: <?php echo $_SESSION['cost_type'] ?><input type="radio" name="Cost-type" value="Income">Income
          <input type="radio" name="Cost-type" value="Expense">Expense</td></tr>
            <tr><td>Remark: <textarea name="Remark" value="<?php echo $_SESSION['remark'] ?>"></textarea></td></tr>
            <tr><td><input type="submit" value="Update"></td></tr>
        </form>
    </table>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/footer.php';
?>
</body>
</html>