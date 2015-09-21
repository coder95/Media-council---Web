<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="admin_css.css">
</head>
<body>
<div class="topic">
Welcome Admin..
<a href="logout.php"><span>logout</span></a>
</div>
<div class="form">
<form action="admin.php" method="post" enctype="multipart/form-data">
	Select the title of the post:
	<br/>
	<textarea rows="2" cols="87" name = "title" spellcheck="true" required></textarea>
	<br/><br/>
	Enter the info:
	<br/>
	<textarea rows="7" cols="87" name = "info" spellcheck="true" required></textarea>
	<br/><br/>
    Select image to upload:
	<br/><br/>
    <input type = "file" name = "fileUpload">
	<br/>
	<br/>
    <input type = "submit" value = "Upload Image" name = "submit">
</form>
</div>
</body>
</html>