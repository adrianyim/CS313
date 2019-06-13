<?php
session_start();

$item_id = htmlspecialchars($_GET['id']);
$item = htmlspecialchars($_GET['item']);
$item_type = htmlspecialchars($_GET['item_type']);
$cost = htmlspecialchars($_GET['cost']);
$cost_type = htmlspecialchars($_GET['cost_type']);
$remark = htmlspecialchars($_GET['remark']);
$date = htmlspecialchars($_GET['date']);

if ($cost_type == "income")
{
    $income = "checked";
}
else 
{
    $income = " ";
}

if ($cost_type == "expense")
{
    $expense = "checked";
}
else 
{
    $expense = " ";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Budget Keeper | Update</title>
    <link rel="stylesheet" href="/assignment/home.css">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/header.php';
?>

<div>
    <table>
        <form method="get" action="updateDB.php">
            <?php echo "<input type='hidden' name='Item_id' value='$item_id'>"; ?>
            <tr><td><input type="text" name="Item" placeholder="Item" value="<?php echo $item; ?>"></td><td>
            <select name="Item-type">
            <option value="<?php echo $item_type; ?>"><?php echo $item_type; ?></option>
            <option value="Salaries and wages">Salaries and wages</option>
            <option value="Utility expenses">Utility expenses</option>
            <option value="Administration expenses">Administration expenses</option>
            <option value="Finance costs">Finance costs</option>
            <option value="Depreciation">Depreciation</option>
            <option value="Impairment losses">Impairment losses</option>
            <option value="Food">Food</option>
            <option value="Others">Others</option>
            </select></td></tr>
            <tr><td><input type="text" name="Cost" placeholder="Cost" value="<?php echo $cost; ?>"></td>
            <td><label>Cost Type:</label>
                <input type="radio" name="Cost-type" value="Income" <?php echo $income; ?>>Income
                <input type="radio" name="Cost-type" value="Expense" <?php echo $expense; ?>>Expense</td></tr>
            <tr><td><textarea name="Remark" placeholder="Remark"><?php echo $remark; ?></textarea></td>
            <td><input type="date" name="Date" placeholder="MM/DD/YYYY" value="<?php echo $date; ?>"></td></tr>
            <tr><td colspan="2"><input type="submit" value="Submit"></td></tr>
        </form>   
    </table>
    <label class="links"><a href="/assignment/BudgetKeeper/budget-keeper.php">Back</a></label>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/footer.php';
?>
</body>
</html>