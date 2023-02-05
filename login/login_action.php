<?php
include "../admin/db_connection.php";
   session_start();
   if(isset($_POST['login']))
   {
   
   
    $username=$_POST['username'];
    $pass=md5($_POST['password']);
    $select_data=mysqli_query($connect,"SELECT * FROM register WHERE username ='$username' and password ='$pass'");
    if($row=mysqli_fetch_array($select_data))
    {
        // print_r($row);
      $_SESSION["login"]="1";
     $_SESSION['username']=$row['username'];
     echo "success";
    }
    else
    {
     echo "fail";
    }
    
   }