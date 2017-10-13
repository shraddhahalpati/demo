<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:login.html");  
} else {  
?>  
<!doctype html>  
<html>  
<head>  
<title>Profile</title>  
<style>   
    body{          
		margin-right:200px;  
		margin-left: 80px;  
		background-color: #DDDCDC;  
		color: black;  
		font-family: verdana;  
		font-size: 100%;  
	}  
            
	h2 {  
		color: indigo;  
		font-family: verdana;  
		font-size: 100%;
		margin-left: 20px;
		margin-top: 25px;
	}  
	
	h1 {  
		color: indigo;  
		font-family: verdana;  
		font-size: 100%;
		margin-left: 20px;
	}  
              
    .header	{
		margin-top:-7px;
		background-color: white;
		font-family: verdana;  
		font-size: 100%;
		position: absolute;
		min-height: 70px;
		min-width: 1100px;
		box-shadow: 0px 5px 20px 0px #BDB9B9;
	}
	
	.lhs{
		position: absolute;
		max-width: 500px;
		margin-top: -22px;
	}
	
	.rhs{
		position: absolute;
		margin-left: 1000px;
		max-width: 500px;
	}
	
	.content{
		position: absolute;
		margin-top: 75px;
		background-color: white;
		min-width: 1100px;
		min-height: 700px;
	}
	
	.page{
		position: relative;
		min-width: 1330px;
		min-height: 800px;
		
	}
</style>  
</head>
  
<body>
<form action="profile.php" method="POST">
<div class="page" style="align: center; margin-left: 110px;">
<div class="header">    
<h2><div class="lhs" style='padding: 5px;'><a href='profile.php' style='text-decoration: none;'><table><tr><td><img src="user-icon-32327.png" width="50px" height="50px"></td><td><i><?=$_SESSION['sess_user'];?></i></td></tr></table></a></div>
<div class="rhs"><a href="logout.php">Logout</a></div></h2>  
</div>
<div class="content">
	<h2 style="margin-left: 50px; margin-top: 50px;" class="lhs">Profile Details</h2>
	<!--<a href="profile_edit.php"><img src="edit1.png" class="rhs" style="margin-top: 60px; margin-left: 950px; width: 40px; height: 40px; border: 0px solid black;"/></a> -->
	
<?php  	
    include 'connection.php';  
    include 'functions.php';
    $user = new User();
    
    $row = $user->fetchAlldata($_SESSION['sess_user']);
?>	
    <table border='1px' cellspacing='0px' cellpadding='8px' style='position: relative; margin-top: 90px; margin-left: 80px;'>
	
    <tr><td align='center'>First Name</td><td align='center'>Last Name</td><td align='center'>Email</td><td align='center'>Contact No.</td><td align='center'>Photo</td><td align='center'>Action</td></tr>

    <td align='center'><?=$row['firstname']?></td><td align='center'><?=$row['lastname']?></td><td align='center'><?=$row['email']?></td><td align='center'><?=$row['contact_no']?></td><td><img src="<?=$row['photo']?>" width="75px" height="100px" /><td align="center"><a href="profile_edit.php"><img src="edit1.png" style="width:25px"/>
    </a></td></tr></table>
</div>
</div>
</form>
</body>  
</html>  
<?php  
}
?> 