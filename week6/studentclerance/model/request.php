<?php
 include_once '../controller/dblogin.php';

if(isset($_POST['date']) && isset($_POST['type']) && isset($_POST['reason'])){
  $date=$_POST['date']; 
  $type=$_POST['type'];
  $reason=$_POST['reason'];
 
  
   $db=new dblogin();
   $result=$db->request($date, $type, $reason);
   
   if($result =='1'){
   //echo '';
      
       }else{
           echo'<script>alert("incorrect usernsme or password")</script>';
       }
       
} else {
    echo 'errorrr';
    
}


