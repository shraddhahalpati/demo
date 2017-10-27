<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.html");  
} else {  
?>  
<!doctype html>  
<html>  
<head>  
<title>Welcome</title> 
<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
<form action="" method="POST">
<?php
    include 'connection.php';
  
    $sql=mysqli_query($con, "SELECT firstname,lastname FROM login WHERE username='".$_SESSION['sess_user']."'");
	
    $row=mysqli_fetch_assoc($sql);
	
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];	
?>

<div class="header">    
<h2><div class="lhs" style='padding: 5px;'><a href='profile_edit.php' style='text-decoration: none;'><table><tr><td><img src="user-icon-32327.png" width="50px" height="50px"></td><td><i><?=$_SESSION['sess_user'];?></i></td></tr></table></a></div>
<div class="rhs"><a href="logout.php">Logout</a></div></h2>  
</div>
<div class="content"><center>
	<h1 style="position: relative; margin-top: 300px; font-size: 200%;">Welcome!</h1>
	<h2 style="position: relative; margin-top: 0px; font-size: 100%;"><i><?php echo ''.$firstname.' '.$lastname.'';?></i></h2></center>
</div>
</form>
</body>  
</html>  
<?php  
}  
?> 