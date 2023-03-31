<?php 

if(isset($_POST['submit'])){
    $uid=$_POST['uid'];
    $pwd=$_POST['pwd'];
    $pwdrepeat=$_POST['pwdrepeat'];
    $email=$_POST['email'];
}
include_once "../classes/dbhclass.php";
include_once "../classes/singupclass.php";
include_once "../classes/singupcontrolclass.php";
$singup=new singupControll($uid,$pwd,$pwdrepeat,$email);
$singup->singUpUser();

header("location:../index.php?error=none");