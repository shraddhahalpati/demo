<?php            
    $hostname='localhost';
    $username='root';
    $password='';
    $db_name='user_registration';
    $con = mysqli_connect($hostname,$username,$password) or die(mysql_error());  
    mysqli_select_db($con, $db_name) or die("cannot select DB");
?>