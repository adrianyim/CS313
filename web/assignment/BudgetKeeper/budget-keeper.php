<?php
session_start();

require('connectDB.php');
$db = getDB();

//DB commands
$users = $db->query('SELECT user_id, user_name, gender FROM users');
$items = $db->query('SELECT item_id, item, item_type, cost, cost_type, remark FROM items');
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
  <div class="div-info">
    <div>
      <table class="table-insert">
        <form method="post" action="insertDB.php">
          <!-- <tr><td><input type="text" name="User" placeholder="User name"></td>
          <td><label>Gender:</label><input type="radio" name="Gender" value="M">Male
          <input type="radio" name="Gender" value="F">Female</td></tr> -->
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
          <td><label>Cost Type:</label><input type="radio" name="Cost-type" value="Income">Income
          <input type="radio" name="Cost-type" value="Expense">Expense</td></tr>
          <tr><td><textarea name="Remark" placeholder="Remark"></textarea></td></tr>
          <tr><td colspan="2"><input type="submit" value="Submit"></td></tr>
        </form>      
      </table>
    </div>

    <!-- <form method="get" id="showform" action="">
      <input type="radio" name="filter" value="Income">
      <input type="radio" name="filter" value="Income">Income
      <input type="radio" name="filter" value="Expense">Expense<br>
      <input type="submit" value="Show">
    </form> -->

    <!-- Show users table -->
    <table><tr><th>User Name</th><th>Gender</th></tr>
      <?php
      foreach ($users as $user)
      {
      echo "<tr><td>" . $user['user_name'] . "</td><td>" . $user['gender'] . "</td></tr>";
      }
      ?>
    </table>

  
    <!-- Show items table -->
    <table><tr><th>Item</th><th>Item Type</th><th>Cost</th><th>Cost Type</th><th>Remark</th></tr>
    <?php
    foreach ($items as $item)
    {
      $item_id = $item['item_id'];
      // $item = $item['item'];
      // $item_type = $item['item_type'];
      // $cost = $item['cost'];
      // $cost_type = $item['cost_type'];
      // $remark = $item['remark'];
      // $_SESSION['item'] = $item['item'];
      // $_SESSION['item_type'] = $item['item_type'];
      // $_SESSION['cost'] = $item['cost'];
      // $_SESSION['cost_type'] = $item['cost_type'];
      // $_SESSION['remark'] = $item['remark'];

      // echo "<tr><td>" . $item_id . $item . $item_type . $cost . $cost_type . $remark . "</td></tr>";

      echo "<tr><td>" . $item . "</td><td>" . $item_type . "</td><td>" . $cost . "</td><td>" . $cost_type . "</td><td>". $remark . "</td><td><a href='item-update.php?id=" . $item_id . "'>Edit</a></td><td><a href='deleteDB.php?item_id=" . $item_id . "'>Delete</a></td></tr>";
    }
    ?>
    </table>
  </div>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/footer.php';
?>
</body>
</html>