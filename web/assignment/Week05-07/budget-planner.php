<?php
require('connectDB.php');
$db = getDB();
$items = $db->query('SELECT item_id, item, item_type, cost, cost_type, remark FROM item');

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
    <form action="insertDB.php" id="insertForm" method="post">
      <table>
        <tr><td><input type="text" name="User" placeholder="User name"></td>
        <td><input type="radio" name="Gender" value="M">Male
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
        <td><input type="radio" name="Cost-type" value="Income">Income
        <input type="radio" name="Cost-type" value="Expense">Expense</td></tr>
        <tr><td><textarea name="Remark" placehodler="Remark"></textarea></td></tr>
        <tr><td><input type="button" name="Submit" value="Submit"></td></tr>
      </table>
    </form>


    <form method="get" id="showform" action="">
      <input type="radio" name="filter" value="Income">
      <input type="radio" name="filter" value="Income">Income
      <input type="radio" name="filter" value="Expense">Expense<br>
      <input type="button" name="Show" value="Show">
    </form>
  <?PHP
  echo "<table><tr><th>item_id</th><th>item</th><th>cost</th><th>cost_type</th><th>remark</th></tr>";

  foreach ($items as $item)
  {
    echo "<tr><td>" . $item['item_id'] . '</td><td>' . $item['item'] . '</td><td>' . $item['cost'] . '</td><td>' . $item['cost_type'] . '</td><td>'. $item['remark'] . '</td></tr>';
  }

  echo "</table>";
  ?>
  </div>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/Week02/footer.php';
?>
</body>
</html>