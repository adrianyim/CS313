<?php
require('connectDB.php');
$db = getDB();

//Select tables
$users = $db->query('SELECT user_id, user_name, gender FROM users');
$items = $db->query('SELECT item_id, item, item_type, cost, cost_type, remark FROM items');

// *********** Example of reading the query from the DB ***********
// $query = 'SELECT item_id, item, item_type, cost, cost_type, remark FROM item';
// $statement = $db->prepare($query);
// $statement->execute();
// $items = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Budget Planner</title>
    <link rel="stylesheet" href="../Week02/home.css">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/Week02/header.php';
?>
  <div class="div-info">
    <form method="post" id="insertForm" action="insertDB.php">
      <table>
        <tr><td><input type="text" name="User" placeholder="User name"></td>
        <td>Gender: <input type="radio" name="Gender" value="M">Male
        <input type="radio" name="Gender" value="F">Female</td></tr>
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
        <td>Cost Type: <input type="radio" name="Cost-type" value="Income">Income
        <input type="radio" name="Cost-type" value="Expense">Expense</td></tr>
        <tr><td><textarea name="Remark" placeholder="Remark"></textarea></td></tr>
        <tr><td><input type="submit" value="Submit"></td></tr>
      </table>
    </form>


    <!-- <form method="get" id="showform" action="">
      <input type="radio" name="filter" value="Income">
      <input type="radio" name="filter" value="Income">Income
      <input type="radio" name="filter" value="Expense">Expense<br>
      <input type="submit" value="Show">
    </form> -->
  <?php
  //users table
  echo "<table><tr><th>user_id</th><th>user_name</th><th>gender</th></tr>";

  foreach ($users as $user)
  {
    echo "<tr><td>" . $user['user_id'] . '</td><td>' . $user['user_name'] . '</td><td>' . $user['gender'] . '</td></tr>';
  }

  echo "</table>";

  //items table
  echo "<table><tr><th>item_id</th><th>item</th><th>item_type</th><th>cost</th><th>cost_type</th><th>remark</th></tr>";

  foreach ($items as $item)
  {
    echo "<tr><td>" . $item['item_id'] . '</td><td>' . $item['item'] . '</td><td>' . $item['item_type'] . '</td><td>' . $item['cost'] . '</td><td>' . $item['cost_type'] . '</td><td>'. $item['remark'] . '</td></tr>';
  }

  echo "</table>";
  ?>
  </div>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/Week02/footer.php';
?>
</body>
</html>