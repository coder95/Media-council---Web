<?php
  session_start();
  $user = 'root';
  $pw = '';
  $server = 'localhost';
  $db = 'math';
  $message = "";
  
  $conn = new mysqli($server,$user,$pw,$db);
  if($conn->connect_error)
  {
	  $message = 'Connection error.Try to connect later.';
	  session_unset();
	  session_destroy();
	  header('Location:admin_login.php');
	  die();
  }
  else
  {
	if(isset($_POST["userName"]) && isset($_POST["password"]))
	{
		$u_name = $_POST["userName"];	 
		$pw = $_POST["password"];
		$qry = "SELECT * FROM login WHERE username = '" . $u_name . "' AND password = '" . $pw ."';";
		$result = $conn->query($qry);
		if ($result->num_rows > 0) 
		{
			$row = mysqli_fetch_assoc($result); 
			$_SESSION["un"] = $row["username"];
			header('Location:admin_form.php');
		} 
		else
		{
			$message = 'User name or password invalid.';
			session_unset();
			session_destroy();
			header('Location:admin_login.php');				
			die();
		} 
	}
	else
	{
		$message = "Enter both user name and password.";
		session_unset();
		session_destroy();
		header('Location:admin_login.php');
		die();
	}
  }
?>