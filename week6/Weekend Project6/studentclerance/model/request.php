<?php
 include_once '../controller/dblogin.php';

if(isset($_POST['date']) && isset($_POST['reason']) && isset($_POST['type'])){
 
  $date=$_POST['date']; 
  $reason=$_POST['reason'];
  
 
  
   $db=new dblogin();
   $result=$db->request($date,$reason,$type);
   if($result =='1'){
       echo '<script></script>';
       }
       
       
} else {
    echo 'error';
    }
