<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'db_login.php';

if(isset($_POST['user']) and isset($_POST['pass'])){
    $userr =$_POST['user'];
    $passr =$_POST['pass'];
            echo $userr;
            echo $passr;
    $db = new db_login();
    $result=$db-> userlogin($userr, $passr);
    {
        if($result=='1'){
            echo'successfully';
            
        }
        else{
            echo'incorect';
        }
}
    
}

