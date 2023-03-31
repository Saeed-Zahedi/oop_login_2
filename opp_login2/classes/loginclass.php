<?php

class Login extends Dbh{

    protected function getUser($uid,$pwd){
        $state=$this->connect()->prepare("SELECT pwd FROM users WHERE uid= ?");
            if(!$state->execute(array($uid))){
                $state=null;
                header("location:../index.php?error=statefailed");
                exit();
            }
            if($state->rowCount()==0){
                $state=null;
                header("location:../index.php?error=usernotfound");
                exit();
            }
            $pwdhashed=$state->fetch(PDO::FETCH_ASSOC);
            $checked=password_verify($pwd,$pwdhashed[0]["pwd"]);
            if(!$checked){
                $state=null;
                header("location:../index.php?error=wrongpassword");
                exit();
            }
            elseif($checked){
                $state=$this->connect()->prepare("SELECT * FROM users WHERE uid= ?");
                if(!$state->execute($uid)){
                $state=null;
                header("location:../index.php?error=statefailed");
                exit();
                }
                if($state->rowCount()==0){
                $state=null;
                header("location:../index.php?error=usernotfound");
                exit();
                }
                $user=$state->fetch(PDO::FETCH_ASSOC);
                session_start();
                $_SESSION["user_id"]=$user[0]["user_id"];
                $_SESSION["uid"]=$user[0]["uid"];
            }
            $state=null;
        }

}
