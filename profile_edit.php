<?php   
    session_start();  
    if(!isset($_SESSION["sess_user"])){ 
        header("location:login.html");  
    } else {  	
        include 'connection.php';
        include 'functions.php';
  
        $user = new User();
        $row = $user->fetchAlldata($_SESSION['sess_user']);
            
        if(empty($row)){
            echo 'No user found';
        }else{
            $User_id=$row['user_id'];
?>  
<html>  
<head>  
<title>Profile</title> 
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<!-- <style>   
    body{          
		margin-right:200px;  
		margin-left: 170px;  
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
		min-width: 1162px;
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
		min-width: 1162px;
		min-height: 1000px;
                
	}
</style>  -->
</head>
  
<body>
<div class="header">    
    <h2><div class="lhs" style='padding: 5px; width: 60px; height: 60px;'><a href="member.php"><img src="HomePageIcon.png" width="50px" height="50px"></img></a></div>
<div class="rhs"><a href="logout.php">Logout</a></div></h2>  
</div>
<div class="content">
    <h2 style="margin-left: 50px; margin-top: 50px;" class="lhs">Profile Details</h2><a href="profile_edit.php?id=<?=$User_id?>"><img src="edit1.png" style="width: 100px; margin-top: 40px; margin-left: 900px;" width="70px" height="70px" class="rhs"/></a>
    <!--<a href="profile_edit.php"><img src="edit1.png" class="rhs" style="margin-top: 60px; margin-left: 950px; width: 40px; height: 40px; border: 0px solid black;"/></a> -->
	
    <form action="" method="POST">			
    <?php 
        if(isset($_GET['id']))
        {
    ?>
        <table border=0px cellspacing=20px cellpadding=10px align=center style="position: absolute; margin-top: 100px; margin-left: 150px; align: center;">
	<tr><td>First Name: </td><td colspan="2"><input type="text" name="firstname" value="<?=$row['firstname']?>"></td></tr>
	<tr><td>Last Name: </td><td colspan="2"><input type="text" name="lastname" value="<?=$row['lastname']?>"></td></tr>
        <tr><td>Email: </td><td colspan="2"><input type="text" name="email" value="<?=$row['email']?>"></td></tr>
	<tr><td>Address: </td><td colspan="2"><input type="text" name="address" value="<?=$row['address']?>"></td></tr>
        <tr><td>Username: </td><td colspan="2"><label name="username"><?=$row['username']?></label></td></tr>
	<tr><td>Password: </td><td colspan="2"><input type="text" name="pwd" value="<?=$row['pwd']?>"></td></tr>
	<tr><td>Date of Birth: </td><td colspan="2"><input type="date" name="d_o_b" value="<?=$row['d_o_b']?>"></td></tr>
	<tr><td>Contact No.: </td><td colspan="2"><input type="text" name="contact_no" value="<?=$row['contact_no']?>"></td></tr>
	<tr><td>Picture: </td><td><img src="<?=$row['photo']?>" width="175" height="200"/></td><td><input type="file" name="photo" /></td></tr>
	<tr><td colspan="3" align="center"><input type="submit" value="Save" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset" name="reset"></tr>
        </table>
        
    <?php
        
	if(isset($_POST["submit"]))
	{  
            $Firstname=$_POST['firstname'];
            $Lastname=$_POST['lastname'];
            $Email=$_POST['email'];
            $Address=$_POST['address'];
            /*$Username=$_POST['username'];  
            $Pwd=$_POST['pwd'];*/
            $Dob=$_POST['d_o_b'];
            $Cno=$_POST['contact_no'];
            $Photo=$_POST['photo'];

            if(is_numeric($Cno))
            {
            if(!empty($_POST['photo']))
            {
                $fields=['firstname'=>$Firstname,'lastname'=>$Lastname,'email'=>$Email,'address'=>$Address,'d_o_b'=>$Dob,'contact_no'=>$Cno,'photo'=>$Photo];
                //$values=[$Firstname,$Lastname,$Email,$Address,$Dob,$Cno,$Photo];
                $row = $user->editAlldata($User_id, $fields);
            }else{
                $fields=['firstname'=>$Firstname,'lastname'=>$Lastname,'email'=>$Email,'address'=>$Address,'d_o_b'=>$Dob,'contact_no'=>$Cno];

                $row= $user->editAlldata($User_id, $fields);
            }
            }else{
                echo "<h3 style='color: red;'>Please enter valid Contact No.";
            }
        }        
    }else{
    ?>
            <table border=0px cellspacing=20px cellpadding=10px align=center style="position: absolute; margin-top: 100px; margin-left: 150px; align: center;">
            <tr><td>First Name: </td><td colspan="2"><!--<input type="text" name="firstname" value="<?=$row['firstname']?>">--><?=$row['firstname']?></td></tr>
            <tr><td>Last Name: </td><td colspan="2"><!--<input type="text" name="lastname" value="<?=$row['lastname']?>">--><?=$row['lastname']?></td></tr>
            <tr><td>Email: </td><td colspan="2"><!--<input type="text" name="email" value="<?=$row['email']?>">--><?=$row['email']?></td></tr>
            <tr><td>Address: </td><td colspan="2"><!--<input type="text" name="address" value="<?=$row['address']?>">--><?=$row['address']?></td></tr>
            <tr><td>Username: </td><td colspan="2"><label name="username"><?=$row['username']?></label></td></tr>
            <tr><td>Password: </td><td colspan="2"><!--<input type="text" name="pwd" value="<?=$row['pwd']?>">--><?=$row['pwd']?></td></tr>
            <tr><td>Date of Birth: </td><td colspan="2"><!--<input type="date" name="d_o_b" value="<?=$row['d_o_b']?>">--><?=$row['d_o_b']?></td></tr>
            <tr><td>Contact No.: </td><td colspan="2"><!--<input type="text" name="contact_no" value="<?=$row['contact_no']?>">--><?=$row['contact_no']?></td></tr>
            <tr><td>Picture: </td><td><img src="<?=$row['photo']?>" width="175" height="200"/></td><td><!--<input type="file" name="photo" />--></td></tr>
            <!--<tr><td colspan="3" align="center"><input type="submit" value="Save" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset" name="reset"></tr>-->
            </table>

    <?php
        }
    }
    ?>
</div>
</form> 
</body>  
</html>  
<?php  
}  
?> 