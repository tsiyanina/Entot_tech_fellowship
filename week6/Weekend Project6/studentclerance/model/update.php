<?php
 include_once '../controller/dblogin.php';

if(isset($_POST['user']) && isset($_POST['newpas'])){
  $user=$_POST['user']; 
 
   $newpas=$_POST['newpas'];
 
  
   $db=new dblogin();
   $result=$db->updatepass($user,$newpas);
   
   if($result =='1'){
   //echo '';
   header('location:../view/setting.html');
      echo'<script> alert("Password changed succesfully") window.location.href="../view/setting.html"</script> ';
      
       }else{
           echo'<script>alert("incorrect usernsme or password")</script>';
       }
       
} else {
    echo 'errorrr';
    
}


