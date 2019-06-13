<?php
session_start();
require('connectDB.php');
$db = getDB();

//DB commands
$statement = $db->prepare('SELECT item_id, item, item_type, cost, cost_type, remark, date, i.user_name FROM items i LEFT JOIN users u ON i.user_name=u.user_name WHERE u.user_name=:username ORDER BY date');
$statement->bindValue(':username', $_SESSION['username']);
$statement->execute();
// $items = $statement->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Budget Keeper</title>
    <link rel="stylesheet" href="/assignment/home.css">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/header.php';
?>
<label>User: <?php echo $_SESSION['username']; ?></label><label class="links"><a href="login.php"> Log Out</a></label>
  <div class="div-info">
    <div>
      <table class="table-insert">
        <form method="post" action="insertDB.php">
          <tr><td><input type="text" name="Item" placeholder="Item"></td><td>
          <select name="Item-type">
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
          <tr><td><input type="text" name="Cost" placeholder="Cost"></td>
          <td><label>Cost Type:</label><br><input type="radio" name="Cost-type" value="Income">Income
          <input type="radio" name="Cost-type" value="Expense">Expense</td></tr>
          <tr><td><textarea name="Remark" placeholder="Remark"></textarea></td></tr>
          <tr><td colspan="2"><input type="submit" value="Submit"></td></tr>
        </form>      
      </table>
    </div>
    <!-- Show items table -->
    <table><tr><th>Item</th><th>Item Type</th><th>Cost</th><th>Cost Type</th><th>Remark</th><th>Date</th></tr>
    <?php
    foreach ($statement as $item)
    {
      echo "<tr><td>" . $item['item'] . "</td><td>" . $item['item_type'] . "</td><td>" . $item['cost'] . "</td><td>" . $item['cost_type'] . "</td><td>". $item['remark'] . "</td><td>". $item['date'] . "</td><td><label class='links'><a href='item-update.php?id=" . $item['item_id'] . "&item=" . $item['item'] . "&item_type=" . $item['item_type'] . "&cost=" . $item['cost'] . "&cost_type=" . $item['cost_type'] . "&remark=" . $item['remark'] . "&date=" . $item['date'] . "'>Edit</a></label></td><td><label class='links'><a href='deleteDB.php?item_id=" . $item['item_id'] . "'>Delete</a></label></td></tr>";
    }
    ?>
    </table>
  </div>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/footer.php';
?>
</body>
</html>