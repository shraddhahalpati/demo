<?php  
    include 'connection.php';
    
    if(isset($_POST["submit"])){  
    
    $Username=$_POST['username'];  
    $Pwd=$_POST['pwd']; 
  
    $query=mysqli_query($con, "SELECT * FROM login WHERE username='".$Username."' AND pwd='".$Pwd."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
        $dbusername=$row['username'];  
        $dbpassword=$row['pwd'];  
    }  
  
    if($Username == $dbusername && $Pwd == $dbpassword)  
    {  
        session_start();  
        $_SESSION['sess_user']=$Username;  

        /* Redirect browser */  
        header("Location: member.php");  
    }  
    } else {  
    echo "<h3 style='color: red;'>Invalid username or password!";  
    }  
}   
?>