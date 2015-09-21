<!DOCTYPE html>
<title>
IITH Media Council Admin Login
</title>
<head>
<link type = "text/css" rel = "stylesheet" href = "admin_login_css.css">
</head>
<body>
<div class="msg">
<?php 
    $message = "";
	if($message != "")
		echo $message;
?>
</div>
   <div class="header">
   <img src="login.png" width="100" height="100" id="image">
</div>   
<div class="form">
<form name="frmUser" method="post" action="login_check.php">
	<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
		<tr class="tableheader">
			<td align="center" colspan="2">Enter Login Details</td>
		</tr>
		<tr class="tablerow">
			<td align="right">Username : </td>
			<td><input type="text" name="userName"></td>
		</tr>
		<tr class="tablerow">
			<td align="right">Password : </td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr class="tablefooter">
			<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>
</div>
</body>
</html>