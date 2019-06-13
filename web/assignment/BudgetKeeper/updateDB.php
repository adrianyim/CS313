<?php
$item_id = htmlspecialchars($_GET['Item_id']);
$item = htmlspecialchars($_GET['Item']);
$item_type = htmlspecialchars($_GET['Item-type']);
$cost = htmlspecialchars($_GET['Cost']);
$cost_type = htmlspecialchars($_GET['Cost-type']);
$remark = htmlspecialchars($_GET['Remark']);
$date = htmlspecialchars($_GET['Date']);

require('connectDB.php');
$db = getDB();

//Update items table
$statement = $db->prepare('UPDATE items SET item=:item, item_type=:item_type, cost=:cost, cost_type=:cost_type, remark=:remark, date=to_date(:date, "MM-DD-YYYY") WHERE item_id=:id;');
$statement->bindValue(':id', $item_id);
$statement->bindValue(':item', $item);
$statement->bindValue(':item_type', $item_type);
$statement->bindValue(':cost', $cost);
$statement->bindValue(':cost_type', $cost_type);
$statement->bindValue(':remark', $remark);
$statement->bindValue(':date', $date);
$statement->execute();

header("Location: budget-keeper.php");
exit;
?>