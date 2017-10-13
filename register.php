<?php  
if(isset($_POST["submit"]))
{  	
    $Firstname=$_POST['firstname'];
    $Lastname=$_POST['lastname'];
    $Email=$_POST['email'];
    $Address=$_POST['address'];
    $Username=$_POST['username']; 
    $Pwd=$_POST['pwd'];
    $Dob=$_POST['d_o_b'];
    $Cno=$_POST['contact_no'];
    $Photo=$_POST['photo'];
	
    if(empty($Firstname) || empty($Lastname) || empty($Email) || empty($Address) || empty($Username) || empty($Pwd) || empty($Dob) || empty($Cno) || empty($Photo))
    {
	echo "<h3 style='color: red;'>All fields required";
    }else{
    	if(is_numeric($Cno))
        {		  
            include 'connection.php';
            include 'functions.php';
            
            $user = new User();
            $row = $user->fetchAlldata($Username);
            
            if(empty($row))
            {  
                $fields=['firstname','lastname','email','address','username','pwd','d_o_b','contact_no','photo'];
                $values=[$Firstname,$Lastname,$Email,$Address,$Username,$Pwd,$Dob,$Cno,$Photo];
                $row = $user->putAlldata($fields, $values);
            } else { 
                echo "<h3 style='color: red;'> Username or already exists!";   
            }
            }else{
                echo "<h3 style='color: red;'>Please enter appropriate Contact No.";
            }
	}
    }
?>