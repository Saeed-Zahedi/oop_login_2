<?php 

if(isset($_POST['submit'])){
    $uid=$_POST['uid'];
    $pwd=$_POST['pwd'];
}
include_once "../classes/dbhclass.php";
include_once "../classes/loginclass.php";
include_once "../classes/logincontrolclass.php";
$login=new loginControll($uid,$pwd);
$login->login_user($uid,$pwd);

header("location:../index.php?error=none");