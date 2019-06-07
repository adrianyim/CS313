<?php
session_start();

$_SESSION['item_id'] = $_GET['item_id'];
$_SESSION['item'] = htmlspecialchars($_GET['item']);
$_SESSION['item_type'] = htmlspecialchars($_GET['item_type']);
$_SESSION['cost'] = htmlspecialchars($_GET['cost']);
$_SESSION['cost_type'] = htmlspecialchars($_GET['cost_type']);
$_SESSION['remark'] = htmlspecialchars($_GET['remark']);

$item_id = $_GET['item_id'];
$item = htmlspecialchars($_GET['item']);
$item_type = htmlspecialchars($_GET['item_type']);
$cost = htmlspecialchars($_GET['cost']);
$cost_type = htmlspecialchars($_GET['cost_type']);
$remark = htmlspecialchars($_GET['remark']);

require('connectDB.php');
$db = getDB();

//Update items table
$statement = $db->prepare('UPDATE items SET item=:item, item_type=:item_type, cost=:cost, cost_type=:cost_type, remark=:remark WHERE item_id=:id;');
$statement->bindValue(':id', $item_id);
$statement->bindValue(':item', $item);
$statement->bindValue(':item_type', $item_type);
$statement->bindValue(':cost', $cost);
$statement->bindValue(':cost_type', $cost_type);
$statement->bindValue(':remark', $remark);
$statement->execute();
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
                <input type="radio" name="Cost-type" value="Income">Income
                <input type="radio" name="Cost-type" value="Expense">Expense</td></tr>
            <tr><td><textarea name="Remark" placeholder="Remark"><?php echo $remark; ?></textarea></td></tr>
            <tr><td colspan="2"><input type="submit" value="Submit"></td></tr>
        </form>   
    </table>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/footer.php';
?>
</body>
</html>