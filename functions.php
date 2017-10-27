<?php

class User{
 
   function fetchAlldata($user_name=null)
   {
        include 'connection.php';
        if($user_name)
        {
            $row = [];

            $sql="select * from login where username = '$user_name';";

            $result= mysqli_query($con, $sql);
            $numrows= mysqli_num_rows($result);
            if($numrows==0)
            {
                echo 'No data available';
            }else{
                $row = mysqli_fetch_assoc($result);
            } 
        }else{
           $row= []; 
        }
        return $row;
    }

    function putAlldata($fields = array(), $values = array()) 
    {
        include 'connection.php';

        $fields = implode ( ',', $fields );
        $values = "'" . implode ( "','", $values ) . "'";
        $sql = "insert into login($fields) values($values);";
        //echo $sql;
        $result= mysqli_query($con, $sql);
        if($result){ 
            echo 'Account Successfully Created';
            header("location:register.html");
        } else {  
            return 0;
        }
    }

    function editAlldata($user_id, $fields = array()) 
    {
        include 'connection.php';
        //print_r($fields);
        //print_r($values);

        $sql = "UPDATE login SET ";
        $sets = array();
        foreach($fields as $column => $value)
        {

            //print_r($column);
            //print_r($values); 
            $sets[] = "".$column." = '".$value."'";
        }
        $sql .= implode(', ', $sets);
        $sql .= " WHERE user_id='".$user_id."'";
            
        $result= mysqli_query($con, $sql);
      
        if($result){ 
            echo 'Account Successfully Updated';
            header("location:profile_edit.php");
            echo mysqli_affected_rows($result).' rows updated successfully.';
        }else {  
            echo "<h3 style='color: red;'>Please try again!";  
        }
        //mysqli_close($con); 
    } 
}
  
?>