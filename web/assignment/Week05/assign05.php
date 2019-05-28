<?PHP
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment 05</title>
    <link rel="stylesheet" href="../Week02/home.css">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/Week02/header.php';
?>
    <div class="div-info">
        <form action="" id="insertForm" method="post">
            <table>
                <tr><td><input type="text" name="User" placeholder="User name"></td>
                <td><input type="radio" name="Gender" value="M">Male
                <input type="radio" name="Gender" value="F">Female</td></tr>
            <tr><td><input type="text" name="Item" placeholder="Item"></td><td><select name="Item-type">
                <option value="empty">Item Type</option>
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
            <tr><td><input type="button" name="Submit" value="Submit"></td></tr></table>
        </form>
        <form>
            <>
            <input type="button" name="Show" value="Show">
        </form>
    <?PHP
    foreach ($db->query('SELECT * FROM item') as $row)
    {
      echo $row['item_id'] . ' ' . $row['item'] . ' ' . $row['cost'] . ' ' . $row['cost_type'] . ' '. $row['remark'] . '<br>';
    }
    ?>
    </div>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/Week02/footer.php';
?>
</body>
</html>