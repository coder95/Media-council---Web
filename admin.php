<!DOCTYPE html>
<head>
<style>
body {
	background-image : url("bg.jpg");
	background-repeat : no-repeat;
}
</style>
</head>
<body>
<a href="logout.php" />Log Out
<?php
  session_start();
  $user = 'root';
  $pw = '';
  $server = 'localhost';
  $db = 'math';
  
  $conn = new mysqli($server,$user,$pw,$db);
  if($conn->connect_error)
  {
	  echo "connection error.Try to Upload later.";
	  die(":\(");  
  }
  else
  {  	  
	$target_dir = getcwd() . "\\images\\";
	$target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br/>";
		header('Location:admin_login.php');	
        $uploadOk = 0;
    }
   }
   if ($uploadOk == 0) 
    {
		echo "Sorry, your file was not uploaded.";
		header('Location:admin_login.php');	
		die();
	}
	else 
		{
		 if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) 
		 {
			 	//$path = mysql_real_escape_string($target_file);
			$path = $_FILES["fileUpload"]["name"];
			if(isset($_POST["title"]))			//Adding post title to the database
				$title = $_POST["title"];
			else
				die("Enter the title of the post.");
			
			if(isset($_POST["info"]))		//adding post info to the database
				$info = $_POST["info"];
			else
				echo "Enter something about the post.";
				die();
				
			$qry = "INSERT INTO posts (title,info,path) VALUES ('$title','$info','$path')";	
			if($conn->query($qry) === TRUE)			//Add the post to the db
				echo "The post was uploaded successfully.Check the site for updation.";
				header('Location:admin_login.php');	
			else
			   echo "Sorry..Unable to add the post.";
		  }  //Redirect to the same page to add another article
		 else
			die("Sorry, there was an error uploading your file.");
		}
	}
?>
</body>
</html>