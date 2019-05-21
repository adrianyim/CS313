<?PHP
try
{
  $dbUrl = getenv('postgres://nzayuizcbkeynl:5c612bb1c51fb4276956ad2e5ab7249a396e016221493ee52ee12ef3b9e156a4@ec2-184-72-238-22.compute-1.amazonaws.com:5432/dedj1e8umcitpk');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["ec2-184-72-238-22.compute-1.amazonaws.com"];
  $dbPort = $dbOpts["5432"];
  $dbUser = $dbOpts["nzayuizcbkeynl"];
  $dbPassword = $dbOpts["5c612bb1c51fb4276956ad2e5ab7249a396e016221493ee52ee12ef3b9e156a4"];
  $dbName = ltrim($dbOpts["dedj1e8umcitpk"],'/');

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
    <title>Team Week05</title>
</head>
<body>
    <?PHP
    foreach ($db->query('SELECT book, chapter, verse, content FROM Scripture') as $row)
    {
      echo 'Scripture: <\br>' . $row['book'] . ' ' . $row['chapter'] . ': ' . $row['verse'] . ' - ' .$row['content'] . '\br';
    }
    ?>
</body>
</html>