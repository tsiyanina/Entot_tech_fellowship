<?php
 include_once '../controller/dblogin.php';

if(isset($_POST['user'])and isset($_POST['pass'])){
  $user=$_POST['user']; 
   $pass=$_POST['pass'];
   
//   echo $user;
//   echo $pass;
   $db=new dblogin();
   $result=$db->userlogin($user,$pass);
   if($result =='1'){
   //echo '';
        header('location:../view/viewer.php');
       }else{
           echo'<script>alert("incorrect usernsme or password")</script>';
       }
       
} else {
    echo 'error';
    
}


