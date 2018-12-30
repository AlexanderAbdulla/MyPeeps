<?php
    include 'ServiceClasses.php'; 
    $dbops = new dbops();
    session_start();
   
   if($dbops->checkUsernamePwd($_POST["username"], $_POST["password"])) {
        $_SESSION['errorMsg'] = '';
        $_SESSION['username'] = $_POST["username"];
        header('Location: /MyPeeps/pplist.php');
   } else {
       $_SESSION['errorMsg'] = 'Username / Pwd combo is invalid';
        header('Location: /MyPeeps/');
   }
?>