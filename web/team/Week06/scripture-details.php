<?php
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

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Scripture Details</title>
</head>
<body>
  <?php
  $book = $_GET['book'];
  $chapter = $_GET['chapter'];
  $verse = $_GET['verse'];
  $content = $_GET['content'];

  echo $book . ' ' . $chapter . ':' . $verse . ' - ' . $content;
  // foreach ($db->query("SELECT * FROM Scripture WHERE chapter = $chapter AND verse = $verse") as $row)
  // {
  //   $result = '<b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b><br>' . $row['content'];

  //   echo $result . '</br>';
  // }
  ?>
</body>
</html>