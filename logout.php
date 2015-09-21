<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
session_unset(); 
session_destroy(); 
$message = "you have successfully logged out.";
header("Location:admin_login.php");
?>

</body>
</html>