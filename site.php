<!DOCTYPE html>
<title>
site
</title>
<head>
<link rel="stylesheet" type="text/css" href="custom.css">
</head>
<?php
  $user = 'root';
  $pw = '';
  $server = 'localhost';
  $db = 'math';
  
  $conn = new mysqli($server,$user,$pw,$db);
  if($conn->connect_error)
  {
	  die("connection error.Try to Upload later.");
  }
  else
  {  
	$qry = "SELECT * FROM posts ORDER BY time_stamp DESC LIMIT 6;";
	$result = $conn->query($qry);
	$path = "images\\";
	$value = array();
	$i = 0;
	if ($result->num_rows > 0) 
	{
		// output data of each rows
		while($row = $result->fetch_assoc()) 
		{
			$value[$i] = '<div class="post"><div class="title">' . $row["title"] . '<br/></div><div class="info">' . $row["info"] . '<br/></div><img src="'. $path . $row["path"].  '"/></div>';
			$i++;
		} 
	}
    $count = count($value);	
  }
?>

<body>
<div class="top">
Welcome to IITH media Council Site
</div>
<div class="headlines">
New things about IITH using slider
</div>
<div class="col">
<div class="col1">
Column 1
<?php
	$i = 0;
	while($i < 2 && $i < $count)
	{
		echo $value[$i];
		$i++;
	}
	$counter = $i;
?>	
</div>
<div class="col2">
Column 2
<?php
	if($counter == 2)
	{
		$i = $counter;
		while($i < $count && $i < 4)
		{
			echo $value[$i];
			$i++;
		}
		$counter = $i;
	}
?>
</div>
<div class="col3">
Column 3
<?php
	if($counter == 4)
	{
		$i = $counter;
		while($i < $count && $i < 6)
		{
			echo $value[$i];
			$i++;
		}
		$counter = $i;
	}
?>
</div>
</div>
</body>
</html>