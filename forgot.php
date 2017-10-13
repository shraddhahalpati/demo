<!doctype html>  
<html>  
<head>  
<title>Forgot Password</title>  
    <style>   
        body{  
              
		margin-top: 100px;  
		margin-bottom: 100px;  
		margin-right:200px;  
		margin-left: 200px;  
		background-color: #DDDCDC;  
		color: black;  
		font-family: verdana;  
		font-size: 100%;  
      
        }  
            h1 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
}  
        h3 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
} </style>  
</head>  
<body>  
     <!--<center><h1>CREATE REGISTRATION AND LOGIN FORM USING PHP AND MYSQL</h1></center>  -->
   <center><p><a href="register.html">Register</a> | <a href="login.html">Login</a></p></center>
<center><h3>Forgot Password Form</h3></center>
<center>
<form action="" method="POST">    
    <fieldset style="width: auto; max-width: 500px;">  
		Enter your Email ID : <input type="text" name="email"><br><br>
		<input type="submit" name="submit" value="OK">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Clear">
	</fieldset>
</form>  
</center>

<?php 
    include 'connection.php';
    if(isset($_POST["submit"]))
    {	
        $email=$_POST['email'];	
        if(empty($email)){	
            echo '<center><h3 style="color: red;">Email Id is required.</center>';
        }else{	  
            $query=mysqli_query($con, "SELECT username,pwd FROM login WHERE email='".$email."'");  
            $numrows=mysqli_num_rows($query);  
            if($numrows!=0)  
            {
                while($row=mysqli_fetch_assoc($query))
                {
                    $username=$row['username'];
                    $pwd=$row['pwd'];

                    echo "<script type='text/javascript'>alert('Your username is : $username AND your password is : $pwd');</script>";
                }
            }else{
                    echo '<h3 style="color: red;">No such user exist.';
            }
        }
    }
?>

</body>
</html>